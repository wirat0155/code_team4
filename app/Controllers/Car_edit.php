<?php namespace App\Controllers;
use App\Models\M_cdms_car;
use App\Models\M_cdms_car_type;
use App\Models\M_cdms_province;

/*
* Car_edit
* show car edit page, update car information
* @author Nattanan, Tadsawan
* @Create Date 2021-08-06
* @Update Date 2021-08-06
*/

class Car_edit extends Cdms_controller {
    /*
    * car_edit
    * show car edit page
    * @input car_id
    * @output show car edit page
    * @author Nattanan, Tadsawan
    * @Create Date 2021-08-06
    * @Update Date 2021-08-06
    */
    public function car_edit($car_id) {
        $_SESSION['menu'] = 'Car_show';
        // call car edit view
        $m_car = new M_cdms_car();
        $data['arr_car'] = $m_car->get_by_id($car_id);

        // car province
        $m_car_prov = new M_cdms_province();
        $data['arr_car_prov'] = $m_car_prov->get_all();

        // car type
        $m_cart = new M_cdms_car_type();
        $data['arr_car_type'] = $m_cart->get_all();

        $this->output('v_car_edit', $data);
    }

    /*
    * car_update
    * update car information
    * @input car information
    * @output update car information
    * @author Nattanan, Tadsawan
    * @Create Date 2021-08-06
    * @Update Date 2021-08-06
    */
    public function car_update() {
        // load car model
        $m_car = new M_cdms_car();

        // get car information from car edit page
        $car_id = $this->request->getPost('car_id');
        $car_code = $this->request->getPost('car_code');
        $car_number = $this->request->getPost('car_number');
        $car_chassis_number = $this->request->getPost('car_chassis_number');
        $car_brand = $this->request->getPost('car_brand');
        $car_register_year = $this->request->getPost('car_register_year');
        $car_weight = $this->request->getPost('car_weight');
        $car_branch = $this->request->getPost('car_branch');
        $car_fuel_type = $this->request->getPost('car_fuel_type');

        // user not change car image
        if ($this->request->getFile('car_image') != NULL) {
            if (!$this->request->getFile('car_image')->isValid()) {
                $car_image = '';
            }
            else {
                // upload image
                $file = $this->request->getFile('car_image');
                if ($file->isValid() && !$file->hasMoved()) {
                    $imageName = $file->getRandomName();
                    $file->move('./car_image', $imageName);
                }
                $car_image = $imageName;
            }
        }

        $car_status = $this->request->getPost('car_status');
        $car_prov_id = $this->request->getPost('car_prov_id');
        $car_cart_id = $this->request->getPost('car_cart_id');

        // updating car information
        $m_car->car_update($car_id,$car_code, $car_number, $car_chassis_number, $car_brand, $car_register_year, $car_weight, $car_branch, $car_fuel_type, $car_image, $car_status,$car_prov_id, $car_cart_id);

        $this->response->redirect(base_url() . '/Car_show/car_show_ajax');
    }
}

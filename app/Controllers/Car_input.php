<?php
namespace App\Controllers;
use App\Models\M_cdms_car;
use App\Models\M_cdms_car_type;
use App\Models\M_cdms_province;

/*
* Car_input
* show car input page, insert car
* @author   Tadsawan
* @Create Date  2564-08-06
*/

class Car_input extends Cdms_controller {
    /*
    * car_input
    * show car input page
    * @input    -
    * @output   show car input page
    * @author   Tadsawan
    * @Create Date  2564-08-06
    */
    public function car_input() {
        $_SESSION['menu'] = 'Car_show';
        // call car input view
        $data = [];

        // car province
        $m_car_prov = new M_cdms_province();
        $data['arr_car_prov'] = $m_car_prov->get_all();

        // car type
        $m_cart = new M_cdms_car_type();
        $data['arr_car_type'] = $m_cart->get_all();

        $this->output('v_car_input', $data);
    }

    /*
    * car_insert
    * insert car
    * @input    car information
    * @output   insert car
    * @author   Tadsawan
    * @Create Date  2564-08-06
    */
    public function car_insert() {
        $m_car = new M_cdms_car();
        $obj = $this->request->getPost();

        // upload image
        $file = $this->request->getFile('car_image');
        if($file->isValid() && ! $file->hasMoved()){
            $imageName = $file->getRandomName();
            $file->move('./car_image', $imageName);
        }

        $car_image = $imageName;

        // inserting car
        $m_car->insert($obj["car_code"], $obj["car_number"], $obj["car_chassis_number"], $obj["car_brand"], $obj["car_register_year"], $obj["car_weight"], $obj["car_branch"], $obj["car_fuel_type"], $car_image, $obj["car_prov_id"], $obj["car_cart_id"], $obj["car_status"]);
        $this->response->redirect(base_url() . '/Car_show/car_show_ajax');
    }
}
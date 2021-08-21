<?php namespace App\Controllers;
use App\Models\M_cdms_car;
use App\Models\M_cdms_car_type;
use App\Models\M_cdms_province;

/*
* Car_input
* เรียกหน้าจอเพิ่มรถ และเพิ่มรถ
* @author Tadsawan
* @Create Date 2564-08-06
* @Update Date 2564-08-08
*/
class Car_input extends Cdms_controller {
    /*
    * car_input
    * เรียกหน้าจอเพิ่มรถ
    * @input -
    * @output  แสดงหน้าจอเพิ่มรถ
    * @author Tadsawan
    * @Create Date 2564-08-06
    * @Update Date 2564-08-08
    */
    public function car_input() {
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
    * เพิ่มรถ
    * @input ข้อมูลรถ
    * @output เพิ่มรถ
    * @author Tadsawan
    * @Create Date 2564-08-06
    * @Update Date 2564-08-08
    */
    public function car_insert() {
        $m_car = new M_cdms_car();

        // car information
        $car_code = $this->request->getPost('car_code');
        $car_number = $this->request->getPost('car_number');
        $car_chassis_number = $this->request->getPost('car_chassis_number');
        $car_brand = $this->request->getPost('car_brand');
        $car_register_year = $this->request->getPost('car_register_year');
        $car_weight = $this->request->getPost('car_weight');
        $car_branch = $this->request->getPost('car_branch');
        $car_fuel_type = $this->request->getPost('car_fuel_type');

        $car_prov_id = $this->request->getPost('car_prov_id');
        $car_cart_id = $this->request->getPost('car_cart_id');
        
        // upload image
        $file = $this->request->getFile('car_image');
        if($file->isValid() && ! $file->hasMoved()){
            $imageName = $file->getRandomName();
            $file->move('./car_image', $imageName);
        }
        
        $car_image = $imageName;

        // เพิ่มข้อมูลรถ
        $m_car->insert($car_code, $car_number, $car_chassis_number, $car_brand, $car_register_year, $car_weight, $car_branch, $car_fuel_type, $car_image, $car_prov_id, $car_cart_id);
        $this->response->redirect(base_url() . '/public/Car_show/car_show_ajax');
    }
}
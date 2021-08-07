<?php namespace App\controllers;
use App\Models\M_cdms_car;

/*
* Car_edit
* แสดงและแก้ไขรถ
* @author Nattanan Tadsawan
* @Create Date 2021-08-06
* @Update Date
*/
class Car_edit extends Cdms_controller
{
    /*
    * car_edit
    * เรียกหน้าแก้ไขรถพร้อมดึงข้อมูลของรถที่เลือก
    * @author Nattanan Tadsawan
    * @Create Date 2021-08-06
    * @Update Date
    */
    public function car_edit($car_id)
    {
        // call car edit view
        $M_car = new M_cdms_car;
        $data['arr_car']=$M_car->get_by_id($car_id);
        $this->output('v_car_edit', $data);
    }

    /*
    * car_update
    * แก้ไขข้อมูลรถ
    * @author Nattanan Tadsawan
    * @Create Date 2021-08-06
    * @Update Date
    */
    public function car_update() {
        $M_car = new M_cdms_car;

        // car information
        $car_id = $this->request->getPost('car_id');
        $car_code = $this->request->getPost('car_code');
        $car_number = $this->request->getPost('car_number');
        $car_chassis_number = $this->request->getPost('car_chassis_number');
        $car_brand = $this->request->getPost('car_brand');
        $car_register_year = $this->request->getPost('car_register_year');
        $car_weight = $this->request->getPost('car_weight');
        $car_branch = $this->request->getPost('car_branch');
        $car_fuel_type = $this->request->getPost('car_fuel_type');
        $car_status = $this->request->getPost('car_status');
        
        // other information
        $car_cart_id = $this->request->getPost('car_cart_id');
        $car_prov_id = $this->request->getPost('car_prov_id');

        // upload image
        $car_image = $this->request->getPost('car_image');

        $M_car->car_update($car_id, $car_code, $car_number, $car_chassis_number, $car_brand, $car_register_year, $car_weight, $car_branch, $car_fuel_type, $car_status, $car_cart_id ,$car_prov_id ,$car_image);
        return $this->response->redirect(base_url('/public/Car_show/car_show_ajax'));
    }
}
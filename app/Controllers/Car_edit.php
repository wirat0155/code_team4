<?php
namespace App\controllers;
use App\Models\M_cdms_car;
use App\Models\M_cdms_car_type;
use App\Models\M_cdms_province;

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
    * แก้ไขข้อมูลรถ
    * @author Nattanan Tadsawan
    * @Create Date 2021-08-06
    * @Update Date
    */
    public function car_update()
    {
        $m_car = new M_cdms_car();

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

        // upload image
        $file = $this->request->getFile('car_image');
        if ($file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getName();
            $file->move('./car_image', $imageName);
        }
        $car_image = $imageName;

        $car_status = $this->request->getPost('car_status');
        $car_prov_id = $this->request->getPost('car_prov_id');
        $car_cart_id = $this->request->getPost('car_cart_id');

        // เพิ่มข้อมูลรถ
        $m_car->car_update($car_id,$car_code, $car_number, $car_chassis_number, $car_brand, $car_register_year, $car_weight, $car_branch, $car_fuel_type, $car_image, $car_status,$car_prov_id, $car_cart_id);
        
        print_r($this->request->getPost());
        $this->response->redirect(base_url() . '/public/Car_show/car_show_ajax');
    }
}

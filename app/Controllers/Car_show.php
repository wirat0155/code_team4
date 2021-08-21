<?php

namespace App\Controllers;

use App\Models\M_cdms_car;
use App\Models\M_cdms_province;
use App\Models\M_cdms_car_type;

/*
* Car_show
* แสดงรายชื่อพนักงานขับรถ และลบรายชื่อพนักงานขับรถ
* @author Warisara
* @Create Date 2564-07-30
* @Update Date 2564-08-13
*/
class Car_show extends Cdms_controller {
    /*
    * car_show_ajax
    * แสดงรายชื่อพนักงานขับรถ
    * @input -
    * @output array of driver
    * @author Warisara
    * @Create Date 2564-07-30
    * @Update Date 2564-08-02
    */
    public function car_show_ajax() {
        $_SESSION['menu'] = 'Car_show';
        $m_car = new M_cdms_car();
        $data['arr_car'] = $m_car->get_all();
        $this->output('v_car_showlist', $data);
    }

    /*
    * car_delete
    * ลบรายชื่อเอเย่นต์
    * @input car_id
    * @output ลบรถ
    * @author Warisara
    * @Create Date 2564-07-30
    * @Update Date 2564-08-02
    */
    public function car_delete() {
        $m_car = new M_cdms_car();
        $m_car->delete($this->request->getPost('car_id'));
        return $this->response->redirect(base_url('/public/Car_show/car_show_ajax'));
    }

    /*
    * car_deteail
    * ดูข้อมูลพนักงานขับรถ
    * @input car_id
    * @output แสดงหน้าจอข้อมูลรถ
    * @author Warisara
    * @Create Date 2564-08-12
    * @Update Date 2564-08-13
    */
    public function car_detail($car_id) {
        $m_car = new M_cdms_car();
        $data['arr_car'] = $m_car->get_by_id($car_id);

        $m_car_prov = new M_cdms_province();
        $data['arr_car_prov'] = $m_car_prov->get_all();

        $m_cart = new M_cdms_car_type();
        $data['arr_car_type'] = $m_cart->get_all();

        $this->output('v_car_show_information', $data);
    }
}

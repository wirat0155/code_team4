<?php

namespace App\Controllers;

use App\Models\M_cdms_driver;

/*
* Driver_show
* แสดงรายการพนักงานขับรถ และลบพนักงานขับรถ
* @author Thanatip
* @Create Date 2564-08-06
* @Update Date
*/

class Driver_input extends Cdms_controller
{
    /*
    * driver_input
    * แสดงรายการพนักงานขับรถ
    * @input -
    * @output array of container
    * @author Thanatip 
    * @Create Date 2564-08-06
    * @Update Date
    */
    public function driver_input()
    {

        $data = [];
        $this->output('v_driver_input', $data);
    }



    /*
    * driver_insert
    * เพิ่มข้อมูลลูกค้า
    * @author  Thanatip
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
    */
    public function driver_insert()
    {
        $M_dri = new M_cdms_driver();
        $arr_driver = $M_dri->get_all();

        // เก็บข้อมูลพนักงานขับรถ
        $dri_name = $this->request->getPost('dri_name');
        $dri_tel = $this->request->getPost('dri_tel');
        $dri_card_number = $this->request->getPost('dri_card_number');
        $dri_license = $this->request->getPost('dri_license');
        $dri_license_type = $this->request->getPost('dri_license_type');
        $dri_profile_image = $this->request->getPost('dri_profile_image');
        $dri_status = $this->request->getPost('dri_status');
        $dri_date_start = $this->request->getPost('dri_date_start');
        $dri_date_end = $this->request->getPost('dri_date_end');
        $dri_car_id = $this->request->getPost('dri_car_id');

        $M_dri->insert($dri_name, $dri_tel, $dri_card_number, $dri_license, $dri_license_type, $dri_profile_image, $dri_status, $dri_date_start, $dri_date_end, $dri_car_id);

        return $this->response->redirect(base_url('/public/Driver_show/driver_show_ajax'));
    }
}

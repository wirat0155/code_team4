<?php

namespace App\Controllers;

use App\Models\M_cdms_driver;
use App\Models\M_cdms_car;


/*
* Driver_show
* แสดงรายการพนักงานขับรถ และลบพนักงานขับรถ
* @author Thanatip
* @Create Date 2564-08-06
* @Update Date 2564-08-07
*/

class Driver_input extends Cdms_controller {
    /*
    * driver_input
    * แสดงหน้าจอเพิ่มพนักงานขับรถ
    * @input -
    * @outpu แสดงหน้าจอเพิ่มพนักงานขับรถ
    * @author Thanatip 
    * @Create Date 2564-08-06
    * @Update Date 2564-08-06
    */
    public function driver_input() {
        $_SESSION['menu'] = 'Driver_show';
        $m_car = new M_cdms_car();
        $data['arr_car'] = $m_car->get_all();
        $this->output('v_driver_input', $data);
    }

    /*
    * driver_insert
    * เพิ่มข้อมูลพนักงานขับรถ
    * @input dri information
    * @output เพิ่มพนักงานขับรถ
    * @author  Thanatip
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
    */
    public function driver_insert() {
        $m_dri = new M_cdms_driver();

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

        // upload image
        $file = $this->request->getFile('dri_profile_image');
        if($file->isValid() && ! $file->hasMoved()){
            $imageName = $file->getRandomName();
            $file->move('./dri_profile_image', $imageName);
        }

        $dri_profile_image = $imageName;


        // เพิ่มข้อมูลพนักงาน
        $m_dri->insert($dri_name, $dri_tel, $dri_card_number, $dri_license, $dri_license_type, $dri_profile_image, $dri_status, $dri_date_start, $dri_date_end, $dri_car_id);

        $this->response->redirect(base_url('/Driver_show/driver_show_ajax'));
    }
}

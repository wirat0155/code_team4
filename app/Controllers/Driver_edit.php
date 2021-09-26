<?php

namespace App\Controllers;

use App\Models\M_cdms_driver;
use App\Models\M_cdms_car;

/*
* Driver_update
* แสดงหน้าจอเเก้ไขข้อมูลพนักงาน 
* @author  Warisara
* @Create Date 2564-08-07
* @Update Date 2564-08-07
*/

class Driver_edit extends Cdms_controller {
    /*   
    * driver_update
    * แสดงหน้าจอ driver_update
    * @input dri_id
    * @output แสดงหน้าจอแก้ไขพนักงานขับรถ
    * @author  Warisara
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
    */
    public function driver_edit($dri_id) {
        $_SESSION['menu'] = 'Driver_show';
        $m_dri = new M_cdms_driver;
        $data['arr_driver'] = $m_dri->get_by_id($dri_id);

        $m_car = new M_cdms_car();
        $data['arr_car'] = $m_car->get_all();
        $this->output('v_driver_edit', $data);
    }

    /*
    * driver_update
    * เเก้ไขข้อมูลพนักงานขับรถ
    * @input dri information
    * @output แก้ไขพนักงานขับรถ
    * @author  Warisara
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
    */
    public function driver_update() {
        $m_dri = new M_cdms_driver();
        //driver information
        $dri_id = $this->request->getPost('dri_id');
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

        //ถ้าไม่เปลี่ยน รูปจะใช้รูปเดิม
        if (!$this->request->getFile('dri_profile_image')->isValid()) {
            $dri_profile_image = $this->request->getPost('old_dri_profile_image');
        } else {
            // upload image
            $file = $this->request->getFile('dri_profile_image');
            if ($file->isValid() && !$file->hasMoved()) {
                $imageName = $file->getRandomName();
                $file->move('./dri_profile_image', $imageName);
            }
            $dri_profile_image = $imageName;
        }

        echo $dri_profile_image;

        //แก้ไขข้อมูลพนักงาน
        $m_dri->driver_update($dri_id, $dri_name, $dri_tel,  $dri_card_number,  $dri_license, $dri_license_type, $dri_profile_image,  $dri_status, $dri_date_start,  $dri_date_end, $dri_car_id);

        //print_r($this->request->getFile('dri_profile_image'));
        //print_r($this->request->getPost());

        return $this->response->redirect(base_url('/Driver_show/driver_show_ajax'));
    }
}

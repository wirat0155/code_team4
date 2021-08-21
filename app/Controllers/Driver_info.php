<?php namespace App\Controllers;
use App\Models\M_cdms_driver;

/*
    * Driver_update
    * แสดงหน้าจอเข้อมูลพนักงาน 
    * @author  Warisara
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
*/
class Driver_info extends Cdms_controller {
/*   
    * driver_info
    * แสดงหน้าจอ driver_update
    * @input dri_id
    * @output แสดงหน้าจอข้อมูลพนักงานขับรถ
    * @author  Warisara
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
*/
    public function driver_info($dri_id) {   
        $m_dri=new M_cdms_driver;
        $data['arr_driver']=$m_dri->get_by_id($dri_id);
        $this->output('v_driver_info',$data);  
    }

    /*
    * driver_show_info
    * แสดงหน้าจอข้อมูลพนักงานขับรถ
    * @input dri_id
    * @output แสดงหน้าจอข้อมูลพนักงานขับรถ
    * @author  Warisara
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
    */
    public function driver_show_info() {
        $m_dri=new M_cdms_driver();
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
        if(!$this->request->getFile('dri_profile_image')->isValid()){
            $dri_profile_image = $this->request->getPost('old_dri_profile_image');
        }else{
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
        $m_dri->driver_show_info($dri_id, $dri_name, $dri_tel,  $dri_card_number,  $dri_license, $dri_license_type, $dri_profile_image,  $dri_status, $dri_date_start,  $dri_date_end, $dri_car_id);

        //print_r($this->request->getFile('dri_profile_image'));
        //print_r($this->request->getPost());

        return $this->response->redirect(base_url('/public/Driver_show/driver_show_ajax'));
    }   
}
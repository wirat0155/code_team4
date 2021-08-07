<?php namespace App\Controllers;
use App\Models\M_cdms_driver;

/*
    * Driver_update
    * แสดงหน้าจอเเก้ไขข้อมูลพนักงาน 
    * @author  Warisara
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
*/
class driver_edit extends Cdms_controller
{
/*   
    * driver_update
    * แสดงหน้าจอ driver_update
    * @author  Warisara
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
*/
    public function driver_edit($dri_id)
    {   
        $M_dri=new M_cdms_driver;
        $data['arr_driver']=$M_dri->get_by_id($dri_id);
        $this->output('v_driver_edit',$data);  
    }

 /*
    * driver_update
    * เเก้ไขข้อมูลพนักงานขับรถ
    * @author  Warisara
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
*/
public function driver_update(){
    $M_dri=new M_cdms_driver;
    $dri_name = $this->request->getPost('dri_name');
    $dri_tel = $this->request->getPost('dri_tel');
    $dri_card_number = $this->request->getPost('dri_card_number');
    $dri_license = $this->request->getPost(' dri_license');
    $dri_license_type = $this->request->getPost('dri_license_type');
    $dri_profile_image = $this->request->getPost('dri_profile_image');
    $dri_status = $this->request->getPost('dri_status');
    $dri_date_start = $this->request->getPost('dri_date_start');
    $dri_date_end = $this->request->getPost('dri_date_end');
    $M_dri->driver_update($dri_name, $dri_tel,  $dri_card_number,  $dri_license, $dri_license_type, $dri_profile_image,  $dri_status, $dri_date_start,  $dri_date_end);
    return $this->response->redirect(base_url('/public/Driver_show/driver_show_ajax'));
}   
}
<?php namespace App\Controllers;
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

    public function driver_insert() {
        $M_dri = new M_cdms_driver();
        $arr_driver = $M_dri->get_all();

        // เก็บข้อมูลของ ลูกค้า
        $dri_name = $this->request->getPost('input_name');
        $dri_tel = $this->request->getPost('input_tel');
        $dri_card_number = $this->request->getPost('input_card_number');
        $dri_license = $this->request->getPost('input_license');
        $dri_license_type = $this->request->getPost('input_license_type');
        $dri_profile_image = $this->request->getPost('null');
        $dri_status = $this->request->getPost('null');
        $dri_date_start = $this->request->getPost('input_date_start');
        $dri_date_end = $this->request->getPost('input_date_end');
        $dri_car_id = $this->request->getPost('null');

        $M_dri->insert($dri_name, $dri_tel, $dri_card_number, $dri_license, $dri_license_type, $dri_profile_image, $dri_status, $dri_date_start, $dri_date_end, $dri_car_id );

        return $this->response->redirect(base_url('/public/Driver_show/driver_show_ajax'));
       
    }
}
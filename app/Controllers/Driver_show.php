<?php

namespace App\Controllers;

use App\Models\M_cdms_driver;

/*
* Driver_show
* แสดงรายการพนักงานขับรถ และลบพนักงานขับรถ
* @author Thanatip , Warisara
* @Create Date 2564-07-30
* @Update Date
*/
class Driver_show extends Cdms_controller {

    /*
    * driver_show_ajax
    * แสดงพนักงานขับรถทั้งหมด
    * @input -
    * @output array of driver
    * @author Thanatip
    * @Create Date 2564-07-30
    * @Update Date 2564-07-30
    */
    public function driver_show_ajax() {
        $_SESSION['menu'] = 'Driver_show';
        $m_dri = new M_cdms_driver();
        $data['arr_driver'] = $m_dri->get_all();
        $this->output('v_driver_showlist', $data);
    }

    /*
    * driver_delete
    * ลบรายการพนักงานขับรถ
    * @input dri_id
    * @output ลบพนักงานขับรถ
    * @author Thanatip
    * @Create Date 2564-07-30
    * @Update Date 2564-07-30
    */
    public function driver_delete() {
        $m_dri = new M_cdms_driver();
        $dri_id = $this->request->getPost('dri_id');
        $m_dri->delete($dri_id);
        return $this->response->redirect(base_url('/public/driver_show/driver_show_ajax'));
    }

    public function get_driver_ajax() {
        $m_dri = new M_cdms_driver();
        $ser_dri = $this->request->getPost('ser_dri');
        $dri_information = $m_dri->get_by_id($ser_dri);

        echo json_encode($dri_information);
    }
    /*
    * driver_delete
    * ดูข้อมูลพนักงานขับรถ
    * @input dri_id
    * @output แสดงหน้าจอข้อมูลพนักงานขับรถ
    * @author Thanatip
    * @Create Date 2564-08-12
    * @Update Date 2564-08-17
    */
    public function driver_detail($dri_id) {
        $_SESSION['menu'] = 'Driver_show';
        $m_dri = new M_cdms_driver();
        $data['arr_driver'] = $m_dri->get_by_id($dri_id);
        $this->output('v_driver_show_information', $data);
    }
}
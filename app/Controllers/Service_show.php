<?php

namespace App\Controllers;

use App\Models\M_cdms_service;

/*
    * Service_show
    * แสดงรายการบริการ และลบบริการ
    * @author Natdanai Worarat
    * @Create Date 2564-07-29
    * @Update Date 2564-07-30
*/
class Service_show extends Cdms_controller
{
    /*
        * service_show_ajax
        * เรียกข้อมูลจากฐานข้อมูลผ่านไฟล์ M_cdms_service และ แสดง view รายการบริการ
        * @author Natdanai
        * @Create Date 2564-07-29
        * @Update Date
    */
    public function service_show_ajax()
    {
        $_SESSION['menu'] = 'Service_show';
        $m_ser = new M_cdms_service();
        $data['arr_service'] = $m_ser->get_all();

        $this->output('v_service_showlist', $data);
    }
    /*
        * service_delete
        * ลบรายการบริการ  
        * @author Worarat
        * @Create Date 2564-07-30
        * @Update Date
    */
    public function service_delete()
    {
        $m_ser = new M_cdms_service();
        $m_ser->delete($this->request->getPost('ser_id'));
        return $this->response->redirect(base_url('/public/Service_show/service_show_ajax'));
    }
}

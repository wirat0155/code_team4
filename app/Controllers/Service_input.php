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

class Service_input extends Cdms_controller
{
    /*
        * service_show_ajax
        * เรียกข้อมูลจากฐานข้อมูลผ่านไฟล์ M_cdms_service และ แสดง view รายการบริการ
        * @author Natdanai
        * @Create Date 2564-07-29
        * @Update Date
    */
    public function service_input()
    {
        $this->output('v_service_input');
    }

    public function service_insert()
    {
        $M_ser = new M_cdms_service();

        // service information
        $ser_dri_id_in = $this->request->getPost('ser_dri_id_in');



        $M_ser->insert($ser_dri_id_in);
        return $this->response->redirect(base_url('/public/Service_show/service_show_ajax'));
    }
}
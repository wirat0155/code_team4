<?php

namespace App\Controllers;

use App\Models\M_cdms_size;
use App\Models\M_cdms_container_type;
use App\Models\M_cdms_status_container;
use App\Models\M_cdms_service;
use App\Models\M_cdms_customer;
use App\Models\M_cdms_container;
use App\Models\M_cdms_driver;
use App\Models\M_cdms_car;
use App\Models\M_cdms_agent;


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

    /*
        * service_detail
        * แสดงหน้าจอข้อมูลบริการ
        * @author Tadsawan
        * @Create Date 2564-08-12
        * @Update Date
    */
    public function service_detail($ser_id)
    {
        // size name
        $m_size = new M_cdms_size();
        $data['arr_size'] = $m_size->get_all();

        // first size information
        $data['first_size'] = $m_size->get_first();

        // container type
        $m_cont = new M_cdms_container_type();
        $data['arr_container_type'] = $m_cont->get_all();

        // status container
        $m_stac = new M_cdms_status_container();
        $data['arr_status_container'] = $m_stac->get_all();

        // driver name
        $m_dri = new M_cdms_driver();
        $data['arr_driver'] = $m_dri->get_all();

        // car name
        $m_car = new M_cdms_car();
        $data['arr_car'] = $m_car->get_all();

        $m_ser = new M_cdms_service();
        $data['obj_service'] = $m_ser->get_by_id($ser_id);

        // get customer
        $m_cus = new M_cdms_customer();
        $data['obj_customer'] = $m_cus->get_by_id($data['obj_service'][0]->ser_cus_id);

        // get container 
        $m_con = new M_cdms_container();
        $data['obj_container'] = $m_con->get_by_id($data['obj_service'][0]->ser_con_id);

        // get agent agent
        $m_agn = new M_cdms_agent();
        $data['obj_agent'] = $m_agn->get_by_id($data['obj_container'][0]->con_agn_id);
        // call service input view
        $this->output('v_service_show_information', $data);
    }
}
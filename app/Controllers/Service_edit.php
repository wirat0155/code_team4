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

class Service_edit extends Cdms_controller
{
    /*
        * service_show_ajax
        * เรียกข้อมูลจากฐานข้อมูลผ่านไฟล์ M_cdms_service และ แสดง view รายการบริการ
        * @author Worarat
        * @Create Date 2564-07-29
        * @Update Date
    */
    public function service_edit($ser_id)
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
        $data['arr_service'] = $m_ser->get_by_id($ser_id);

        // get agent agent
        $m_agn = new M_cdms_agent();
        $data['arr_agent'] = $m_agn->get_by_id($data['obj_container']->con_agn_id);

        // call service input view
        $this->output('v_service_edit', $data);
    }

    public function service_update()
    {
        $m_ser = new M_cdms_service();
        $m_cus = new M_cdms_customer();
        $m_con = new M_cdms_container();
        $m_agn = new M_cdms_agent();

        // customer information
        $cus_company_name = $this->request->getPost('cus_company_name');
        $cus_firstname = $this->request->getPost('cus_firstname');
        $cus_lastname = $this->request->getPost('cus_lastname');
        $cus_branch = $this->request->getPost('cus_branch');
        $cus_tel = $this->request->getPost('cus_tel');
        $cus_address = $this->request->getPost('cus_address');
        $cus_tax = $this->request->getPost('cus_tax');
        $cus_email = $this->request->getPost('cus_email');
        $ser_cus_id = $this->request->getPost('ser_cus_id');

        // container information
        $con_number = $this->request->getPost('con_number');
        $con_max_weight = $this->request->getPost('con_max_weight');
        $con_tare_weight = $this->request->getPost('con_tare_weight');
        $con_net_weight = $this->request->getPost('con_net_weight');
        $con_cube = $this->request->getPost('con_cube');
        $con_size_id = $this->request->getPost('con_size_id');
        $con_cont_id = $this->request->getPost('con_cont_id');
        $con_agn_id = $this->request->getPost('con_agn_id');
        $con_stac_id = $this->request->getPost('con_stac_id');
        $ser_con_id = $this->request->getPost('ser_con_id');

        // service information
        $ser_type = $this->request->getPost('ser_type');
        $ser_departure_date = $this->request->getPost('ser_departure_date');
        $ser_arrivals_date = $this->request->getPost('ser_arrivals_date');
        $ser_dri_id_in = $this->request->getPost('ser_dri_id_in');
        $ser_car_id_in = $this->request->getPost('ser_car_id_in');
        $ser_actual_departure_date = $this->request->getPost('ser_actual_departure_date');
        $ser_dri_id_out = $this->request->getPost('ser_dri_id_out');
        $ser_car_id_out = $this->request->getPost('ser_car_id_out');
        $ser_arrivals_location = $this->request->getPost('ser_arrivals_location');
        $ser_departure_location = $this->request->getPost('ser_departure_location');
        $ser_weight = $this->request->getPost('ser_weight');
        $ser_id = $this->request->getPost('ser_id');

        // agent information
        $agn_company_name = $this->request->getPost('agn_company_name');
        $agn_firstname = $this->request->getPost('agn_firstname');
        $agn_lastname = $this->request->getPost('agn_lastname');
        $agn_tel = $this->request->getPost('agn_tel');
        $agn_address = $this->request->getPost('agn_address');
        $agn_tax = $this->request->getPost('agn_tax');
        $agn_email = $this->request->getPost('agn_email');
        $con_agn_id = $this->request->getPost('con_agn_id');


        $m_agn->agent_update($con_agn_id, $agn_company_name, $agn_firstname, $agn_lastname, $agn_tel, $agn_address, $agn_tax, $agn_email);
        $m_cus->customer_update($ser_cus_id, $cus_company_name, $cus_firstname, $cus_lastname, $cus_branch, $cus_tel, $cus_address, $cus_tax, $cus_email);
        $m_con->container_update($ser_con_id, $con_number, $con_max_weight, $con_tare_weight, $con_net_weight, $con_cube, $con_size_id, $con_cont_id, $con_agn_id, $con_stac_id);
        $m_ser->service_update($ser_id, $ser_type, $ser_departure_date, $ser_car_id_in, $ser_arrivals_date, $ser_dri_id_in, $ser_actual_departure_date, $ser_dri_id_out, $ser_car_id_out, $ser_arrivals_location, $ser_departure_location, $ser_weight, $ser_con_id, $ser_cus_id);
        return $this->response->redirect(base_url('/public/Service_show/service_show_ajax'));
    }
}
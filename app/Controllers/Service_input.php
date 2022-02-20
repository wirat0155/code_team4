<?php

namespace App\Controllers;

use App\Models\M_cdms_size;
use App\Models\M_cdms_container_type;
use App\Models\M_cdms_status_container;
use App\Models\M_cdms_status_container_log;
use App\Models\M_cdms_service;
use App\Models\M_cdms_customer;
use App\Models\M_cdms_container;
use App\Models\M_cdms_driver;
use App\Models\M_cdms_car;
use App\Models\M_cdms_agent;

/*
* Service_input
* show service input page, insert service
* @author   Natdanai
* @Create Date  2564-08-06
*/
class Service_input extends Cdms_controller {
    /*
    * service_input
    * show service input page
    * @input    -
    * @output   show service input page
    * @author   Natdanai
    * @Create Date  2564-08-06
    */
    public function service_input($section_error = '') {
        if (!isset($_SESSION['service_input_error'])) {
            $_SESSION['service_input_error'] = false;
        }
        $_SESSION['menu'] = 'Service_show';
        if (!isset($_SESSION['con_number_error']) || $_SESSION['con_number_error'] == '') {
            $_SESSION['con_number_error'] = '';
        }
        if (!isset($_SESSION['agn_company_name_error']) || $_SESSION['agn_company_name_error'] == '') {
            $_SESSION['agn_company_name_error'] = '';
        }
        if (!isset($_SESSION['cus_company_name_error']) || $_SESSION['cus_company_name_error'] == '') {
            $_SESSION['cus_company_name_error'] = '';
        }
        if (!isset($_SESSION['cus_branch_error']) || $_SESSION['cus_branch_error'] == '') {
            $_SESSION['cus_branch_error'] = '';
        }

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

        // service
        $m_ser = new M_cdms_service();
        $data['arr_ser'] = $m_ser->get_all();

        // get container only export status
        $m_con = new M_cdms_container();
        $data['arr_con'] = $m_con->get_all(3);

        // agent
        $m_agn = new M_cdms_agent();
        $data['arr_agn'] = $m_agn->get_all(2);

        // customer
        $m_cus = new M_cdms_customer();
        $data['arr_cus'] = $m_cus->get_all(2);

        // Return service input page with section_error
        // 2 = Container number dubplicate
        // 3 = Agent duplicate
        // 4 = Customer dublicate
        $data['section_error'] = $section_error;

        // call service input view
        $this->output('v_service_input', $data);
    }

    /*
    * service_insert
    * insert service
    * @input    service, customer, agent, contaienr information
    * @output   insert service, customer, agent, contaienr information
    * @author   Natdanai
    * @Create Date  2564-08-06
    */
    public function service_insert() {
        $m_ser = new M_cdms_service();
        $m_cus = new M_cdms_customer();
        $m_con = new M_cdms_container();
        $m_agn = new M_cdms_agent();
        $m_dri = new M_cdms_driver();

        // customer information
        $cus_id = $this->request->getPost('cus_id');
        $cus_company_name = $this->request->getPost('cus_company_name');
        $cus_firstname = $this->request->getPost('cus_firstname');
        $cus_lastname = $this->request->getPost('cus_lastname');
        $cus_branch = $this->request->getPost('cus_branch');
        $cus_tel = $this->request->getPost('cus_tel');
        $cus_address = $this->request->getPost('cus_address');
        $cus_tax = $this->request->getPost('cus_tax');
        $cus_email = $this->request->getPost('cus_email');

        // container information
        $con_id = $this->request->getPost('con_id');
        $con_number = $this->request->getPost('con_number');
        $con_max_weight = $this->request->getPost('con_max_weight');
        $con_tare_weight = $this->request->getPost('con_tare_weight');
        $con_net_weight = $this->request->getPost('con_net_weight');
        $con_cube = $this->request->getPost('con_cube');
        $con_size_id = $this->request->getPost('con_size_id');
        $con_cont_id = $this->request->getPost('con_cont_id');
        $con_agn_id = $this->request->getPost('con_agn_id');
        $con_stac_id = $this->request->getPost('con_stac_id');
        $size_width_out = $this->request->getPost('size_width_out');
        $size_length_out = $this->request->getPost('size_length_out');
        $size_height_out = $this->request->getPost('size_height_out');

        // service status same as container status
        $ser_stac_id = $con_stac_id;

        // agent information
        $agn_id = $this->request->getPost('agn_id');
        $agn_company_name = $this->request->getPost('agn_company_name');
        $agn_firstname = $this->request->getPost('agn_firstname');
        $agn_lastname = $this->request->getPost('agn_lastname');
        $agn_tel = $this->request->getPost('agn_tel');
        $agn_address = $this->request->getPost('agn_address');
        $agn_tax = $this->request->getPost('agn_tax');
        $agn_email = $this->request->getPost('agn_email');

        // service information
        $ser_departure_date = $this->request->getPost('ser_departure_date');
        $ser_arrivals_date = $this->request->getPost('ser_arrivals_date');
        $ser_dri_id_in = $this->request->getPost('ser_dri_id_in');
        $ser_car_id_in = $this->request->getPost('ser_car_id_in');
        if($ser_car_id_in == ''){
            $get_ser_car_id_in = $m_dri->get_by_id($ser_dri_id_in);
            $ser_car_id_in = $get_ser_car_id_in[0]->dri_car_id;
        }
        $ser_dri_id_out = $this->request->getPost('ser_dri_id_out');
        $ser_car_id_out = $this->request->getPost('ser_car_id_out');
        if($ser_car_id_out == ''){
            $get_ser_car_id_out = $m_dri->get_by_id($ser_dri_id_out);
            $ser_car_id_out = $get_ser_car_id_out[0]->dri_car_id;
        }
        $ser_arrivals_location = $this->request->getPost('ser_arrivals_location');
        $ser_departure_location = $this->request->getPost('ser_departure_location');
        $ser_weight = $this->request->getPost('ser_weight');

        // set service information
        $_SESSION['ser_departure_date'] = $ser_departure_date;
        $_SESSION['ser_arrivals_date'] = $ser_arrivals_date;
        $_SESSION['ser_dri_id_in'] = $ser_dri_id_in;
        $_SESSION['ser_car_id_in'] = $ser_car_id_in;
        $_SESSION['ser_dri_id_out'] = $ser_dri_id_out;
        $_SESSION['ser_car_id_out'] = $ser_car_id_out;
        $_SESSION['ser_arrivals_location'] = $ser_arrivals_location;
        $_SESSION['ser_departure_location'] = $ser_departure_location;

        // set container information
        $_SESSION['con_id'] = $con_id;
        $_SESSION['con_number'] = $con_number;
        $_SESSION['con_max_weight'] = $con_max_weight;
        $_SESSION['con_tare_weight'] = $con_tare_weight;
        $_SESSION['con_net_weight'] = $con_net_weight;
        $_SESSION['con_cube'] = $con_cube;
        $_SESSION['con_size_id'] = $con_size_id;
        $_SESSION['con_cont_id'] = $con_cont_id;
        $_SESSION['con_agn_id'] = $con_agn_id;
        $_SESSION['con_stac_id'] = $con_stac_id;
        $_SESSION['ser_weight'] = $ser_weight;
        $_SESSION['size_width_out'] = $size_width_out;
        $_SESSION['size_length_out'] = $size_length_out;
        $_SESSION['size_height_out'] = $size_height_out;

        // set agent information
        $_SESSION['agn_id'] = $agn_id;
        $_SESSION['agn_company_name'] = $agn_company_name;
        $_SESSION['agn_firstname'] = $agn_firstname;
        $_SESSION['agn_lastname'] = $agn_lastname;
        $_SESSION['agn_tel'] = $agn_tel;
        $_SESSION['agn_address'] = $agn_address;
        $_SESSION['agn_tax'] = $agn_tax;
        $_SESSION['agn_email'] = $agn_email;

        // set customer information
        $_SESSION['cus_id'] = $cus_id;
        $_SESSION['cus_company_name'] = $cus_company_name;
        $_SESSION['cus_firstname'] = $cus_firstname;
        $_SESSION['cus_lastname'] = $cus_lastname;
        $_SESSION['cus_branch'] = $cus_branch;
        $_SESSION['cus_tel'] = $cus_tel;
        $_SESSION['cus_address'] = $cus_address;
        $_SESSION['cus_tax'] = $cus_tax;
        $_SESSION['cus_email'] = $cus_email;

        // select customer form dropdown
        // then update customer
        if ($cus_id != 'new'){
            $ser_cus_id = $cus_id;

            // get customer company name
            $cus_company_name = $m_cus->get_by_id($cus_id);

            // update the customer
            $m_cus->customer_update($cus_id, $cus_company_name[0]->cus_company_name, $cus_firstname, $cus_lastname, $cus_branch, $cus_tel, $cus_address, $cus_tax, $cus_email);
        }

        // new customer
        // then check duplicate customer company name
        else {
            $get_ser_cus_id = $m_cus->get_by_name($cus_company_name, $cus_branch);

            // not duplicate cus_company_name nor cus_branch
            // then insert the customer
            if (count($get_ser_cus_id) == 0) {
                $is_new_customer = true;
            }
            // duplicate cus_company_name & cus_branch
            // go to add service page with customer error
            else {

                $is_new_customer = false;
                // not input cus_branch
                if ($cus_branch == '') {
                    $_SESSION['cus_company_name_error'] = 'The customer has already used';
                }
                // input cus_branch
                else {
                    $_SESSION['cus_branch_error'] = 'The branch has already used';
                }
            }
        }

        //check agent
        if($agn_company_name == ''){
            $con_agn_id = $agn_id;
            $agn_company_name = $m_agn->get_by_id($agn_id);
            $m_agn->agent_update($agn_id, $agn_company_name[0]->agn_company_name, $agn_firstname, $agn_lastname, $agn_tel, $agn_address, $agn_tax, $agn_email);
        }else{
            $get_ser_agn_id = $m_agn->get_by_company_name($agn_company_name);
            if (count($get_ser_agn_id)  == 0) {
                $is_new_agent = true;
            } else {
                $is_new_agent = false;
                $_SESSION['agn_company_name_error'] = 'The agent has already used';
            }
        }

        // Select container form dropdown
        if($con_id != 'new'){
            $ser_con_id = $con_id;
            $con_number = $m_con->get_by_id($con_id);
            $m_con->container_update($con_id, $con_number[0]->con_number, $con_max_weight, $con_tare_weight, $con_net_weight, $con_cube, $con_size_id, $con_cont_id, $con_agn_id, $con_stac_id);
        }
        // New container
        else {
            $get_ser_con_id = $m_con->get_by_con_number($con_number);
            // New container not duplicate with database
            // Insert container
            if (count($get_ser_con_id)  == 0) {
                $is_new_container = true;
            }
            // New container duplicate
            // Set session error
            // return to add service page
            else {
                $is_new_container = false;
                $_SESSION['con_number_error'] = 'The container number has already used';
            }
        }

        // check service input error
        if ($_SESSION['con_number_error'] != '') {
            $_SESSION['service_input_error'] = true;
            $this->service_input(2);
            exit(0);
        }
        if ($_SESSION['agn_company_name_error'] != ''){
            $_SESSION['service_input_error'] = true;
            $this->service_input(3);
            exit(0);
        }
        else if ($_SESSION['cus_company_name_error'] != '' || $_SESSION['cus_branch_error'] != '') {
            $_SESSION['service_input_error'] = true;
            $this->service_input(4);
            exit(0);
        }

        // set free to section error session
        $_SESSION['con_number_error'] = '';
        $_SESSION['agn_company_name_error'] = '';
        $_SESSION['cus_company_name_error'] = '';
        $_SESSION['cus_branch_error'] = '';
        unset($_SESSION['service_input_error']);

        // unset service information
        unset($_SESSION['ser_departure_date']);
        unset($_SESSION['ser_arrivals_date']);
        unset($_SESSION['ser_dri_id_in']);
        unset($_SESSION['ser_car_id_in']);
        unset($_SESSION['ser_dri_id_out']);
        unset($_SESSION['ser_car_id_out']);
        unset($_SESSION['ser_arrivals_location']);
        unset($_SESSION['ser_departure_location']);

        // unset container information
        unset($_SESSION['con_id']);
        unset($_SESSION['con_number']);
        unset($_SESSION['con_max_weight']);
        unset($_SESSION['con_tare_weight']);
        unset($_SESSION['con_net_weight']);
        unset($_SESSION['con_cube']);
        unset($_SESSION['con_size_id']);
        unset($_SESSION['con_cont_id']);
        unset($_SESSION['con_agn_id']);
        unset($_SESSION['con_stac_id']);
        unset($_SESSION['ser_weight']);
        unset($_SESSION['size_width_out']);
        unset($_SESSION['size_length_out']);
        unset($_SESSION['size_height_out']);

        // unset agent information
        unset($_SESSION['agn_id']);
        unset($_SESSION['agn_company_name']);
        unset($_SESSION['agn_firstname']);
        unset($_SESSION['agn_lastname']);
        unset($_SESSION['agn_tel']);
        unset($_SESSION['agn_address']);
        unset($_SESSION['agn_tax']);
        unset($_SESSION['agn_email']);

        // unset customer information
        unset($_SESSION['cus_id']);
        unset($_SESSION['cus_company_name']);
        unset($_SESSION['cus_firstname']);
        unset($_SESSION['cus_lastname']);
        unset($_SESSION['cus_branch']);
        unset($_SESSION['cus_tel']);
        unset($_SESSION['cus_address']);
        unset($_SESSION['cus_tax']);
        unset($_SESSION['cus_email']);

        if ($is_new_customer) {
            // insert customer
            $m_cus->insert($cus_company_name, $cus_firstname, $cus_lastname, $cus_branch, $cus_tel, $cus_address, $cus_tax, $cus_email);

            //get new cus_id
            $get_ser_cus_id = $m_cus->get_by_name($cus_company_name, $cus_branch);
            $ser_cus_id = $get_ser_cus_id[0]->cus_id;
        }

        if ($is_new_agent) {
            //insert new agent
            $m_agn->insert($agn_company_name, $agn_firstname, $agn_lastname, $agn_tel, $agn_address, $agn_tax, $agn_email);
            //get new agn_id
            $get_ser_agn_id = $m_agn->get_by_company_name($agn_company_name);
            $con_agn_id = $get_ser_agn_id[0]->agn_id;
        }

        if ($is_new_container) {
            //insert new container
            $m_con->insert($con_number, $con_max_weight, $con_tare_weight, $con_net_weight, $con_cube, $con_size_id, $con_cont_id, $con_agn_id, $con_stac_id);

            // Get new con_id
            $get_ser_con_id = $m_con->get_by_con_number($con_number);
            $ser_con_id = $get_ser_con_id[0]->con_id;
        }

        //insert service
        $m_ser->service_insert($ser_departure_date, $ser_car_id_in, $ser_arrivals_date, $ser_dri_id_in,$ser_dri_id_out, $ser_car_id_out, $ser_arrivals_location, $ser_departure_location, $ser_weight, $ser_con_id, $ser_stac_id, $ser_cus_id);

        $max_ser_id = $m_ser->get_max_id();

        $m_scl = new M_cdms_status_container_log();
        $m_scl->insert($max_ser_id->max_ser_id, $ser_stac_id);

        if($max_ser_id->max_ser_id < 100){
            $format_invoice = "0" . $max_ser_id->max_ser_id;
        }else if($max_ser_id->max_ser_id < 10){
            $format_invoice = "0" . "0" . $max_ser_id->max_ser_id;
        }else{
            $format_invoice = $max_ser_id->max_ser_id;
        }
        $today = date("ymd");
        $ser_receipt = "RE" . $today . $format_invoice;
        $ser_invoice = "INV" . $today . $format_invoice;
       
        // print_r($ser_receipt);
        // print_r($ser_invoice);
        $m_ser->service_update_invoice($max_ser_id->max_ser_id, $ser_receipt, $ser_invoice);
        // go to service list page
        return $this->response->redirect(base_url('/Service_show/service_show_ajax'));
    }
}
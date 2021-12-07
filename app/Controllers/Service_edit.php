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
use App\Models\M_cdms_change_container_log;

/*
* Service_edit
* show service edit page, update service information
* @author   Natdanai, Worarat
* @Create Date  2564-07-29
*/
class Service_edit extends Cdms_controller
{
    /*
    * service_edit
    * show service edit page
    * @input    ser_id
    * @output   show service edit page
    * @author   Worarat
    * @Create Date  2564-07-29
    */
    public function service_edit($ser_id)
    {
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
        // size name
        $m_size = new M_cdms_size();
        $data['arr_size'] = $m_size->get_all();

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
        $data['arr_cus'] = $m_cus->get_all();

        // get container
        $m_con = new M_cdms_container();
        $data['obj_container'] = $m_con->get_by_id($data['obj_service'][0]->ser_con_id);
        $data['arr_con'] = $m_con->get_all();

        // get agent agent
        $m_agn = new M_cdms_agent();
        $data['obj_agent'] = $m_agn->get_by_id($data['obj_container'][0]->con_agn_id);
        $data['arr_agn'] = $m_agn->get_all();

        // call service input view
        $this->output('v_service_edit', $data);
    }

    /*
    * service_update
    * update service information
    * @input    service, customer, agent, container information
    * @output   update service information
    * @author   Worarat
    * @Create Date  2564-07-29
    */
    public function service_update()
    {
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
        $ser_id = $this->request->getPost('ser_id');
        $ser_departure_date = $this->request->getPost('ser_departure_date');
        $ser_arrivals_date = $this->request->getPost('ser_arrivals_date');
        $ser_dri_id_in = $this->request->getPost('ser_dri_id_in');
        $ser_car_id_in = $this->request->getPost('ser_car_id_in');
        if ($ser_car_id_in == '') {
            $get_ser_car_id_in = $m_dri->get_by_id($ser_dri_id_in);
            $ser_car_id_in = $get_ser_car_id_in[0]->dri_car_id;
        }
        $ser_actual_departure_date = $this->request->getPost('ser_actual_departure_date');
        if ($ser_actual_departure_date == '') {
            $ser_actual_departure_date = NULL;
        }
        $ser_dri_id_out = $this->request->getPost('ser_dri_id_out');
        $ser_car_id_out = $this->request->getPost('ser_car_id_out');
        if ($ser_car_id_out == '') {
            $get_ser_car_id_out = $m_dri->get_by_id($ser_dri_id_out);
            $ser_car_id_out = $get_ser_car_id_out[0]->dri_car_id;
        }
        $ser_arrivals_location = $this->request->getPost('ser_arrivals_location');
        $ser_departure_location = $this->request->getPost('ser_departure_location');
        $ser_weight = $this->request->getPost('ser_weight');

        // select customer form dropdown
        // then update customer
        if ($cus_id != 'new') {
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

                // insert customer
                $m_cus->insert($cus_company_name, $cus_firstname, $cus_lastname, $cus_branch, $cus_tel, $cus_address, $cus_tax, $cus_email);

                //get new cus_id
                $get_ser_cus_id = $m_cus->get_by_name($cus_company_name, $cus_branch);
                $ser_cus_id = $get_ser_cus_id[0]->cus_id;
            }

            // duplicae cus_company_name & cus_branch
            // go to add service page with customer error
            else {
                // not input cus_branch
                if ($cus_branch == '') {
                    $_SESSION['cus_company_name_error'] = 'The customer has already used';
                }

                // input cus_branch
                else {
                    $_SESSION['cus_branch_error'] = 'The branch has already used';
                }
                $this->service_edit($ser_id);
                exit(0);
            }
        }

        //check agent
        if ($agn_company_name == '') {
            $con_agn_id = $agn_id;
            $agn_company_name = $m_agn->get_by_id($agn_id);
            $m_agn->agent_update($agn_id, $agn_company_name[0]->agn_company_name, $agn_firstname, $agn_lastname, $agn_tel, $agn_address, $agn_tax, $agn_email);
        } else {
            $get_ser_agn_id = $m_agn->get_by_company_name($agn_company_name);
            if (count($get_ser_agn_id)  == 0) {
                //new agent
                //insert new agent
                $m_agn->insert($agn_company_name, $agn_firstname, $agn_lastname, $agn_tel, $agn_address, $agn_tax, $agn_email);
                //get new agn_id
                $get_ser_agn_id = $m_agn->get_by_company_name($agn_company_name);
                $con_agn_id = $get_ser_agn_id[0]->agn_id;
            } else {
                $_SESSION['agn_company_name_error'] = 'The agent has already used';
                $this->service_edit($ser_id);
                exit(0);
            }
        }

        // Select container form dropdown
        if ($con_id != 'new') {
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
                //insert new container
                $m_con->insert($con_number, $con_max_weight, $con_tare_weight, $con_net_weight, $con_cube, $con_size_id, $con_cont_id, $con_agn_id, $con_stac_id);

                // Get new con_id
                $get_ser_con_id = $m_con->get_by_con_number($con_number);
                $ser_con_id = $get_ser_con_id[0]->con_id;
            }

            // New container duplicate
            // Set session error
            // return to add service page
            else {
                $_SESSION['con_number_error'] = 'The container number has already used';
                $this->service_edit($ser_id);
                exit(0);
            }
        }

        // set free to section error session
        $_SESSION['con_number_error'] = '';
        $_SESSION['agn_company_name_error'] = '';
        $_SESSION['cus_company_name_error'] = '';
        $_SESSION['cus_branch_error'] = '';

        //update service
        $m_ser->service_update($ser_id, $ser_stac_id, $ser_departure_date, $ser_car_id_in, $ser_arrivals_date, $ser_dri_id_in, $ser_actual_departure_date, $ser_dri_id_out, $ser_car_id_out, $ser_arrivals_location, $ser_departure_location, $ser_weight, $ser_con_id, $ser_cus_id);

        // insert status container log
        $m_scl = new M_cdms_status_container_log();
        $scl_stac_id = $m_scl->get_max_by_scl_ser_id($ser_id);
        if ($scl_stac_id->scl_stac_id != $ser_stac_id) {
            $m_scl->insert($ser_id, $ser_stac_id);
        }

        $new_ser_id = $this->request->getPost('chl_ser_id');
        $this->change_container($ser_id, $new_ser_id);
        // go to service list page
        return $this->response->redirect(base_url('/Service_show/service_show_ajax'));
    }

    /*
    * change_container
    * insert changing container in service
    * @input    old_ser_id, new_ser_id
    * @output   insert changing container in servicen
    * @author   Wirat
    * @Create Date  2564-12-07
    */
    private function change_container($old_ser_id = NULL, $new_ser_id = NULL) {
        // insert changecontainer log
        if ($old_ser_id != NULL && $new_ser_id != NULL) {
            $m_chl = new M_cdms_change_container_log();
            $m_chl->insert($old_ser_id, $new_ser_id);
        }
    }
}

<?php
namespace App\Controllers;
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
    public function service_input($section_error = '', $data = []) {
        // First set error to ""
        if (count($data) == 0) {
            $data["service_input_error"] = false;
            $data["con_number_error"] = "";
            $data["agn_company_name_error"] = "";
            $data["cus_company_name_error"] = "";
            $data["cus_branch_error"] = "";
        }

        $data['arr_size'] = $this->m_size->get_all();
        $data['first_size'] = $this->m_size->get_first();
        $data['arr_container_type'] = $this->m_cont->get_all();
        $data['arr_status_container'] = $this->m_stac->get_all();
        $data['arr_driver'] = $this->m_dri->get_all();
        $data['arr_car'] = $this->m_car->get_all();
        $data['arr_ser'] = $this->m_ser->get_all();
        $data['arr_con'] = $this->m_con->get_all(3);
        $data['arr_agn'] = $this->m_agn->get_all(2);
        $data['arr_cus'] = $this->m_cus->get_all(2);

        // print_r($data['arr_cus']);
        // Return service input page with section_error
        // 2 = Container number dubplicate
        // 3 = Agent company name duplicate
        // 4 = Customer company name dublicate
        $data['section_error'] = $section_error;

        // echo "<pre>"; print_r($data); echo "</pre>";

        // show service input view
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
        $obj = $this->request->getPost();
        $data = $obj;
        if($obj["ser_car_id_in"] == ''){
            $get_ser_car_id_in = $this->m_dri->get_by_id($obj["ser_dri_id_in"]);
            $obj["ser_car_id_in"] = $get_ser_car_id_in->dri_car_id;
        }
        if($obj["ser_car_id_out"] == ''){
            $get_ser_car_id_out = $this->m_dri->get_by_id($obj["ser_dri_id_out"]);
            $obj["ser_car_id_out"] = $get_ser_car_id_out->dri_car_id;
        }

        if ($obj["cus_id"] != 'new'){
            $obj["ser_cus_id"] = $obj["cus_id"];
            $obj["cus_company_name"] = $this->m_cus->get_by_id($obj["cus_id"]);
            $obj["cus_company_name"] = $obj["cus_company_name"]->cus_company_name;

            $this->m_cus->customer_update(
                $obj["cus_id"],
                $obj["cus_company_name"],
                $obj["cus_firstname"],
                $obj["cus_lastname"],
                $obj["cus_branch"],
                $obj["cus_tel"],
                $obj["cus_address"],
                $obj["cus_tax"],
                $obj["cus_email"]
            );
        }
        else {
            $get_ser_cus_id = $this->m_cus->get_by_name($obj["cus_company_name"], $obj["cus_branch"]);
            if (count($get_ser_cus_id) == 0) {
                $is_new_customer = true;
            }
            else {
                $is_new_customer = false;
                if ($obj["cus_branch"] == '') $data['cus_company_name_error'] = "The customer has already used";
                else $data['cus_branch_error'] = "The branch has already used";
            }
        }

        if($obj["agn_id"] != ''){
            $obj["con_agn_id"] = $obj["agn_id"];
            $obj["agn_company_name"] = $this->m_agn->get_by_id($obj["agn_id"]);
            $obj["agn_company_name"] = $obj["agn_company_name"]->agn_company_name;

            $this->m_agn->agent_update(
                $obj["agn_id"],
                $obj["agn_company_name"],
                $obj["agn_firstname"],
                $obj["agn_lastname"],
                $obj["agn_tel"],
                $obj["agn_address"],
                $obj["agn_tax"],
                $obj["agn_email"]
            );
        }
        else{
            $get_ser_agn_id = $this->m_agn->get_by_company_name($obj["agn_company_name"]);
            if (count($get_ser_agn_id)  == 0) {
                $is_new_agent = true;
            } else {
                $is_new_agent = false;
                $data['agn_company_name_error'] = 'The agent has already used';
            }
        }

        if ($obj["con_id"] != 'new'){
            $obj["ser_con_id"] = $obj["con_id"];
            $obj["con_number"] = $this->m_con->get_by_id($obj["con_id"]);
            $obj["con_number"] = $obj["con_number"]->con_number;
            $container_action = "update";
        }
        else {
            $get_ser_con_id = $this->m_con->get_by_con_number($obj["con_number"]);
            if (count($get_ser_con_id) == 0) {
                $is_new_container = true;
            }
            else {
                $is_new_container = false;
                $data['con_number_error'] = 'The container number has already used';
            }
        }

        if ($data['con_number_error'] != '') {
            $data['service_input_error'] = true;
            $this->service_input(2, $data);
            exit(0);
        }
        if ($data['agn_company_name_error'] != ''){
            $data['service_input_error'] = true;
            $this->service_input(3, $data);
            exit(0);
        }
        else if ($data['cus_company_name_error'] != '' || $data['cus_branch_error'] != '') {
            $data['service_input_error'] = true;
            $this->service_input(4, $data);
            exit(0);
        }
        
        if ($is_new_customer) {
            $this->m_cus->insert(
                $obj["cus_company_name"],
                $obj["cus_firstname"],
                $obj["cus_lastname"],
                $obj["cus_branch"],
                $obj["cus_tel"],
                $obj["cus_address"],
                $obj["cus_tax"],
                $obj["cus_email"]
            );
            $obj["ser_cus_id"] = $this->m_cus->get_by_name($obj["cus_company_name"], $obj["cus_branch"]);
            $obj["ser_cus_id"] = $obj["ser_cus_id"]->cus_id;
        }

        if ($is_new_agent) {
            $this->m_agn->insert(
                $obj["agn_company_name"],
                $obj["agn_firstname"],
                $obj["agn_lastname"],
                $obj["agn_tel"],
                $obj["agn_address"],
                $obj["agn_tax"],
                $obj["agn_email"]
            );
            $get_ser_agn_id = $this->m_agn->get_by_company_name($obj["agn_company_name"]);
            $obj["con_agn_id"] = $get_ser_agn_id->agn_id;
        }

        if ($is_new_container) {
            $this->m_con->insert(
                $obj["con_number"],
                $obj["con_max_weight"],
                $obj["con_tare_weight"],
                $obj["con_net_weight"],
                $obj["con_cube"],
                $obj["con_size_id"],
                $obj["con_cont_id"],
                $obj["con_agn_id"],
                $obj["con_stac_id"]
            );

            $obj["ser_con_id"] = $this->m_con->get_by_con_number($obj["con_number"]);
            $obj["ser_con_id"] =$obj["ser_con_id"]->con_id;
        }

        if($container_action == "update") {
            $this->m_con->container_update(
                $obj["con_id"],
                $obj["con_number"],
                $obj["con_max_weight"],
                $obj["con_tare_weight"],
                $obj["con_net_weight"],
                $obj["con_cube"],
                $obj["con_size_id"],
                $obj["con_cont_id"],
                $obj["con_agn_id"],
                $obj["con_stac_id"]
            );
        }

        //insert service
        $this->m_ser->service_insert(
            $obj["ser_departure_date"],
            $obj["ser_car_id_in"],
            $obj["ser_arrivals_date"],
            $obj["ser_dri_id_in"],
            $obj["ser_dri_id_out"],
            $obj["ser_car_id_out"],
            $obj["ser_arrivals_location"],
            $obj["ser_departure_location"],
            $obj["ser_weight"],
            $obj["ser_con_id"],
            $obj["con_stac_id"],
            $obj["ser_cus_id"],
        );

        $max_ser_id = $this->m_ser->get_max_id();

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
        $this->m_ser->service_update_invoice($max_ser_id->max_ser_id, $ser_receipt, $ser_invoice);
        // go to service list page
        return $this->response->redirect(base_url('/Service_show/service_show_ajax'));
    }

}
<?php
namespace App\Controllers;
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
    public function service_edit($ser_id, $data = []) {
        // First set error to ""
        if (count($data) == 0) {
            $data["service_edit_error"] = false;
            $data["con_number_error"] = "";
            $data["agn_company_name_error"] = "";
            $data["cus_company_name_error"] = "";
            $data["cus_branch_error"] = "";
        }
        $_SESSION['menu'] = 'Service_show';

        $data['arr_size'] = $this->m_size->get_all();
        $data['arr_container_type'] = $this->m_cont->get_all();
        $data['arr_status_container'] = $this->m_stac->get_all();
        $data['arr_driver'] = $this->m_dri->get_all();
        $data['arr_car'] = $this->m_car->get_all();
        $data['obj_service'] = $this->m_ser->get_by_id($ser_id);
        $data['obj_customer'] = $this->m_cus->get_by_id($data['obj_service'][0]->ser_cus_id);
        $data['arr_cus'] = $this->m_cus->get_all();
        $data['obj_container'] = $this->m_con->get_by_id($data['obj_service'][0]->ser_con_id);
        $data['arr_con'] = $this->m_con->get_all();
        $data['obj_agent'] = $this->m_agn->get_by_id($data['obj_container'][0]->con_agn_id);
        $data['arr_agn'] = $this->m_agn->get_all();
        $obj_container = $data['obj_container'];

        $data['opt_service'] = $this->m_ser->get_change_service_option(
            $obj_container[0]->con_cont_id,
            $obj_container[0]->con_size_id,
            $obj_container[0]->con_agn_id,
            $ser_id
        );

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
    public function service_update() {
        $obj = $this->request->getPost();
        $data = $obj;
        
        // if ($obj["ser_actual_departure_date"] == '') {
        //     $obj["ser_actual_departure_date"] = NULL;
        // }

        // if($obj["ser_car_id_in"] == ''){
        //     $get_ser_car_id_in = $this->m_dri->get_by_id($obj["ser_dri_id_in"]);
        //     $obj["ser_car_id_in"] = $get_ser_car_id_in[0]->dri_car_id;
        // }
        // if($obj["ser_car_id_out"] == ''){
        //     $get_ser_car_id_out = $this->m_dri->get_by_id($obj["ser_dri_id_out"]);
        //     $obj["ser_car_id_out"] = $get_ser_car_id_out[0]->dri_car_id;
        // }

        if ($obj["cus_id"] != 'new') {
            $obj["ser_cus_id"] = $obj["cus_id"];
            if ($obj["old_cus_branch"] == $obj["cus_branch"]) {
                // get customer company name
                $obj["cus_company_name"] = $this->m_cus->get_by_id($obj["cus_id"]);
                $obj["cus_company_name"] = $obj["cus_company_name"][0]->cus_company_name;

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
                $obj["obj_customer"] = $this->m_cus->get_by_id($obj["cus_id"]);
                $obj["obj_customer"] = $obj["obj_customer"][0]->cus_company_name;
                $obj["obj_customer_branch"] = $this->m_cus->get_by_name($obj["obj_customer"], $obj["cus_branch"]);

                if (count($obj["obj_customer_branch"]) > 0) {
                    $data['service_edit_error'] = true;
                    $data['cus_branch_error'] = "The branch has already used";
                }
                else {
                    // get customer company name
                    $obj["cus_company_name"] = $this->m_cus->get_by_id($obj["cus_id"]);

                    $this->m_cus->customer_update(
                        $obj["cus_id"],
                        $obj["obj_customer"],
                        $obj["cus_firstname"],
                        $obj["cus_lastname"],
                        $obj["cus_branch"],
                        $obj["cus_tel"],
                        $obj["cus_address"],
                        $obj["cus_tax"],
                        $obj["cus_email"]
                    );
                }
            }
        }
        else {
            $get_ser_cus_id = $this->m_cus->get_by_name($obj["cus_company_name"], $obj["cus_branch"]);
            if (count($get_ser_cus_id) == 0) {
                $is_new_customer = true;
            }

            else {
                $data['service_edit_error'] = true;
                // not input cus_branch
                if ($obj["cus_branch"] == '') {
                    $data['cus_company_name_error'] = 'The customer has already used';
                }
                // input cus_branch
                else {
                    $data['cus_branch_error'] = 'The branch has already used';
                }
            }
        }

        //check agent
        if ($obj["agn_id"] != '') {
            $obj["con_agn_id"] = $obj["agn_id"];
            $obj["agn_company_name"] = $this->m_agn->get_by_id($obj["agn_id"]);
            $obj["agn_company_name"] = $obj["agn_company_name"][0]->agn_company_name;

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
        else {
            $get_ser_agn_id = $this->m_agn->get_by_company_name($obj["agn_company_name"]);
            if (count($get_ser_agn_id)  == 0) {
                $is_new_agent = true;
            } else {
                $data['service_edit_error'] = true;
                $data['agn_company_name_error'] = 'The agent has already used';
            }
        }

        // Select container form dropdown
        if ($obj["con_id"] != 'new') {
            $is_update_container = true;
            if($obj["con_id"] == $obj["old_con_id"]){
                $is_update_container = true;
            }else{
                $is_change_container = true;
            }
        }
        else {
            $get_ser_con_id = $this->m_con->get_by_con_number($obj["con_number"]);
            if (count($get_ser_con_id)  == 0) {
                $is_new_container = true;
            }
            else {
                $data['service_edit_error'] = true;
                $data['con_number_error'] = 'The container number has already used';
            }
        }

        if ($data['service_edit_error']) {
            $this->service_edit($obj["ser_id"], $data);
            exit(0);
        }

        // if ($is_new_customer) {
        //     // insert customer
        //     $m_cus->insert($cus_company_name, $cus_firstname, $cus_lastname, $cus_branch, $cus_tel, $cus_address, $cus_tax, $cus_email);

        //     // get new cus_id
        //     $get_ser_cus_id = $m_cus->get_by_name($cus_company_name, $cus_branch);
        //     $ser_cus_id = $get_ser_cus_id[0]->cus_id;
        // }
        // if ($is_new_agent) {
        //     // insert new agent
        //     $m_agn->insert($agn_company_name, $agn_firstname, $agn_lastname, $agn_tel, $agn_address, $agn_tax, $agn_email);
        //     // get new agn_id
        //     $get_ser_agn_id = $m_agn->get_by_company_name($agn_company_name);
        //     $con_agn_id = $get_ser_agn_id[0]->agn_id;
        // }
        // if ($is_new_container) {
        //     // insert new container
        //     $m_con->insert($con_number, $con_max_weight, $con_tare_weight, $con_net_weight, $con_cube, $con_size_id, $con_cont_id, $con_agn_id, $con_stac_id);

        //     // get new con_id
        //     $get_ser_con_id = $m_con->get_by_con_number($con_number);
        //     $ser_con_id = $get_ser_con_id[0]->con_id;
        // }
        // if ($is_update_container) {
        //     $ser_con_id = $con_id;
        //     $con_number = $m_con->get_by_id($con_id);
        //     $m_con->container_update($con_id, $con_number[0]->con_number, $con_max_weight, $con_tare_weight, $con_net_weight, $con_cube, $con_size_id, $con_cont_id, $con_agn_id, $con_stac_id);
        // }

        // if($is_change_container){
        //     $m_ser->service_insert($ser_departure_date, $ser_car_id_in, $ser_arrivals_date, $ser_dri_id_in,$ser_dri_id_out, $ser_car_id_out, $ser_arrivals_location, $ser_departure_location, $ser_weight, $con_id, $ser_stac_id, $ser_cus_id);
        //     $max_ser_id = $m_ser->get_max_id();

        //     if($max_ser_id->max_ser_id < 100){
        //         $format_invoice = "0" . $max_ser_id->max_ser_id;
        //     }else if($max_ser_id->max_ser_id < 10){
        //         $format_invoice = "0" . "0" . $max_ser_id->max_ser_id;
        //     }else{
        //         $format_invoice = $max_ser_id->max_ser_id;
        //     }
        //     $today = date("ymd");
        //     $ser_receipt = "RE" . $today . $format_invoice;
        //     $ser_invoice = "INV" . $today . $format_invoice;

        //     $m_ser->service_update_invoice($max_ser_id->max_ser_id, $ser_receipt, $ser_invoice);

        //     $this->change_container($ser_id, $max_ser_id->max_ser_id);
        //     $m_ser->change_status_replace($ser_id);
        // }else{
        //     //update service
        //     $m_ser->service_update($ser_id, $ser_stac_id, $ser_departure_date, $ser_car_id_in, $ser_arrivals_date, $ser_dri_id_in, $ser_actual_departure_date, $ser_dri_id_out, $ser_car_id_out, $ser_arrivals_location, $ser_departure_location, $ser_weight, $ser_con_id, $ser_cus_id);
        // }
        
        // return $this->response->redirect(base_url('/Service_show/service_show_ajax'));
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
        session_start();
        $chl_user_id = $_SESSION['user_name']->user_id;

        // insert change container log
        if ($old_ser_id != NULL && $new_ser_id != NULL) {
            $this->m_chl->insert($old_ser_id, $new_ser_id, $chl_user_id);
        }
    }
}
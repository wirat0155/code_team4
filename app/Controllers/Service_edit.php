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

            $data['obj_service'] = $this->m_ser->get_by_id($ser_id);
            $data["ser_id"] = $data["obj_service"]->ser_id;
            $data["ser_arrivals_date"] = $data["obj_service"]->ser_arrivals_date;
            $data["ser_departure_date"] = $data["obj_service"]->ser_departure_date;
            $data["ser_actual_departure_date"] = $data["obj_service"]->ser_actual_departure_date;
            $data["ser_dri_id_in"] = $data["obj_service"]->ser_dri_id_in;
            $data["ser_dri_id_out"] = $data["obj_service"]->ser_dri_id_out;
            $data["ser_car_id_in"] = $data["obj_service"]->ser_car_id_in;
            $data["ser_car_id_out"] = $data["obj_service"]->ser_car_id_out;
            $data["ser_arrivals_location"] = $data["obj_service"]->ser_arrivals_location;
            $data["ser_departure_location"] = $data["obj_service"]->ser_departure_location;
            $data["ser_weight"] = $data["obj_service"]->ser_weight;
            $data["ser_stac_id"] = $data["obj_service"]->ser_stac_id;
            
            $data["con_id"] = $data["obj_service"]->con_id;
            $data["con_number"] = $data["obj_service"]->con_number;
            $data["con_stac_id"] = $data["obj_service"]->ser_stac_id;
            $data["con_cont_id"] = $data["obj_service"]->con_cont_id;
            $data["con_max_weight"] = $data["obj_service"]->con_max_weight;
            $data["con_tare_weight"] = $data["obj_service"]->con_tare_weight;
            $data["con_net_weight"] = $data["obj_service"]->con_net_weight;
            $data["con_cube"] = $data["obj_service"]->con_cube;
            $data["con_size_id"] = $data["obj_service"]->con_size_id;
            $data["size_width_out"] = $data["obj_service"]->size_width_out;
            $data["size_length_out"] = $data["obj_service"]->size_length_out;
            $data["size_height_out"] = $data["obj_service"]->size_height_out;        
            $data["con_agn_id"] = $data["obj_service"]->con_agn_id;

            $data["cus_id"] = $data["obj_service"]->cus_id;
            $data["cus_company_name"] = $data["obj_service"]->cus_company_name;
            $data["cus_firstname"] = $data["obj_service"]->cus_firstname;
            $data["cus_lastname"] = $data["obj_service"]->cus_lastname;
            $data["cus_branch"] = $data["obj_service"]->cus_branch;
            $data["old_cus_branch"] = $data["obj_service"]->cus_branch;
            $data["cus_tel"] = $data["obj_service"]->cus_tel;
            $data["cus_address"] = $data["obj_service"]->cus_address;
            $data["cus_tax"] = $data["obj_service"]->cus_tax;
            $data["cus_email"] = $data["obj_service"]->cus_email;

            $data["agn_id"] = $data["obj_service"]->agn_id;
            $data["agn_company_name"] = $data["obj_service"]->agn_company_name;
            $data["agn_firstname"] = $data["obj_service"]->agn_firstname;
            $data["agn_lastname"] = $data["obj_service"]->agn_lastname;
            $data["agn_tel"] = $data["obj_service"]->agn_tel;
            $data["agn_address"] = $data["obj_service"]->agn_address;
            $data["agn_tax"] = $data["obj_service"]->agn_tax;
            $data["agn_email"] = $data["obj_service"]->agn_email;
        }
        $_SESSION['menu'] = 'Service_show';
        $data['arr_size'] = $this->m_size->get_all();
        $data['arr_container_type'] = $this->m_cont->get_all();
        $data['arr_status_container'] = $this->m_stac->get_all();
        $data['arr_driver'] = $this->m_dri->get_all();
        $data['arr_car'] = $this->m_car->get_all();
        $data['arr_cus'] = $this->m_cus->get_all();
        $data['arr_con'] = $this->m_con->get_all();
        $data['arr_agn'] = $this->m_agn->get_all();
        
        $data['opt_service'] = $this->m_ser->get_change_service_option(
            $data["con_cont_id"],
            $data["con_size_id"],
            $data["con_agn_id"],
            $data["ser_id"]
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
        
        if ($obj["ser_actual_departure_date"] == '') {
            $obj["ser_actual_departure_date"] = NULL;
        }

        if($obj["ser_car_id_in"] == ''){
            $get_ser_car_id_in = $this->m_dri->get_by_id($obj["ser_dri_id_in"]);
            $obj["ser_car_id_in"] = $get_ser_car_id_in->dri_car_id;
        }
        if($obj["ser_car_id_out"] == ''){
            $get_ser_car_id_out = $this->m_dri->get_by_id($obj["ser_dri_id_out"]);
            $obj["ser_car_id_out"] = $get_ser_car_id_out->dri_car_id;
        }

        if ($obj["cus_id"] != 'new') {
            $obj["ser_cus_id"] = $obj["cus_id"];
            if ($obj["old_cus_branch"] == $obj["cus_branch"]) {
                // get customer company name
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
        if ($obj["agn_id"] != '' && $obj["agn_id"] != "new") {
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
        else {
            echo "new agent";
            $get_ser_agn_id = $this->m_agn->get_by_company_name($obj["agn_company_name"]);
            if (count($get_ser_agn_id) == 0) {
                $is_new_agent = true;
                echo "insert";
            } else {
                $data['service_edit_error'] = true;
                $data['agn_company_name_error'] = 'The agent has already used';
                echo $data['agn_company_name_error'];
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

            // get new cus_id
            $get_ser_cus_id = $this->m_cus->get_by_name($obj["cus_company_name"], $obj["cus_branch"]);
            $obj["ser_cus_id"] = $get_ser_cus_id->cus_id;
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
            // get new agn_id
            $get_ser_agn_id = $this->m_agn->get_by_company_name($obj["agn_company_name"]);
            $obj["con_agn_id"] = $get_ser_agn_id[0]->agn_id;
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

            // get new con_id
            $get_ser_con_id = $this->m_con->get_by_con_number($obj["con_number"]);
            $obj["ser_con_id"] = $get_ser_con_id[0]->con_id;
        }
        if ($is_update_container) {
            $obj["ser_con_id"] = $obj["con_id"];
            $obj["con_number"] = $this->m_con->get_by_id($obj["con_id"]);
            $obj["con_number"] =  $obj["con_number"]->con_number;
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

        if($is_change_container){
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
                $obj["con_id"],
                $obj["con_stac_id"],
                $obj["ser_cus_id"]
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

            $this->m_ser->service_update_invoice($max_ser_id->max_ser_id, $ser_receipt, $ser_invoice);

            $this->change_container($obj["ser_id"], $max_ser_id->max_ser_id);
            $this->m_ser->change_status_replace($obj["ser_id"]);
        }else{
            //update service
            $this->m_ser->service_update(
                $obj["ser_id"],
                $obj["con_stac_id"],
                $obj["ser_departure_date"],
                $obj["ser_car_id_in"],
                $obj["ser_arrivals_date"],
                $obj["ser_dri_id_in"],
                $obj["ser_actual_departure_date"],
                $obj["ser_dri_id_out"],
                $obj["ser_car_id_out"],
                $obj["ser_arrivals_location"],
                $obj["ser_departure_location"],
                $obj["ser_weight"],
                $obj["ser_con_id"],
                $obj["ser_cus_id"]
            );
        }
        
        return $this->response->redirect(base_url('/Service_show/service_show_ajax'));
        // echo "<pre>"; print_r($this->request->getPost()); echo "</pre>";
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
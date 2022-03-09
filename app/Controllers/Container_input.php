<?php

namespace App\Controllers;


/*
* Container_input
* show container input page, insert container
* @author   Wirat
* @Create Date  2564-08-06
*/
class Container_input extends Cdms_controller
{
    /*
    * container_input
    * show container input page
    * @input    -
    * @output   show container input page
    * @author   Wirat
    * @Create Date  2564-08-06
    * @Editor Kittipod
    * @Update Date 2564-03-09
    */
    public function container_input($section_error = '', $data = NULL)
    {
        $_SESSION['menu'] = 'Container_show';
        if (!isset($_SESSION['con_number_error']) || $_SESSION['con_number_error'] == '') {
            $_SESSION['con_number_error'] = '';
        }
        if (!isset($_SESSION['agn_company_name_error']) || $_SESSION['agn_company_name_error'] == '') {
            $_SESSION['agn_company_name_error'] = '';
        }
        // get dropdown
        // container size
        $data['arr_size'] = $this->m_size->get_all();

        // first size information
        $data['first_size'] = $this->m_size->get_first();

        // container type
        $data['arr_container_type'] = $this->m_cont->get_all();

        // status container
        $data['arr_status_container'] = $this->m_stac->get_all();

        // agent
        $data['arr_agn'] = $this->m_agn->get_all();

        // Section error
        // 1 = duplicate con_number
        // 2 = duplicate agn_company_name
        // 3 = duplicate con_number and agn_company_name
        $data['section_error'] = $section_error;

        // call container input view
        $this->output('v_container_input', $data);
    }

    /*
    * container_insert
    * insert container
    * @input    container, agent information
    * @output   insert container, agent
    * @author   Wirat
    * @Create Date  2564-08-06
    * @Editor Kittipod
    * @Update Date 2564-03-09
    */
    public function container_insert() {

        // get Post data
        $obj_con = $this->request->getPost();
        $data = $obj_con;

        // get container by con_number
        $arr_container = $this->m_con->get_by_con_number($obj_con["con_number"]);

        // duplicate con_number
        // then go to add container form with error
        if (count($arr_container) >= 1) {
            $_SESSION['con_number_error'] = 'The container number has already used';
            if($obj_con["agn_id"] == 'new'){
                // get agent by agent company name
                $arr_agent = $this->m_agn->get_by_company_name($obj_con["agn_company_name"]);
                // if duplicate agent company name
                // then go to add agent page
                // exit function
                if (count($arr_agent) >= 1 ) {
                    $_SESSION['agn_company_name_error'] = 'The agent has already used';
                    $this->container_input(3, $data);
                    exit;
                }
            }
            $this->container_input(1, $data);
            exit;
        }

        // not duplicate con_number
        else {

            // select agent from dropdown
            // then update agent
            if ($obj_con["agn_id"] != 'new') {
                $obj_con["con_agn_id"] = $obj_con["agn_id"];
                $this->m_agn->agent_update($obj_con["agn_id"], NULL, $obj_con["agn_firstname"], $obj_con["agn_lastname"], 
                $obj_con["agn_tel"], $obj_con["agn_address"], $obj_con["agn_tax"], $obj_con["agn_email"]);
            }

            // new agent
            // then check duplicate agent or not
            else {

                // get agent by agent company name
                $arr_agent = $this->m_agn->get_by_company_name($obj_con["agn_company_name"]);

                // if duplicate agent company name
                // then go to add agent page
                // exit function
                if (count($arr_agent) >= 1 ) {
                    $_SESSION['agn_company_name_error'] = 'The agent has already used';
                    $this->container_input(2,$data);
                    exit;
                }

                // if agent company name is unique
                // then insert the agent
                else {
                    // insert new agent
                    $this->m_agn->insert($obj_con["agn_company_name"], $obj_con["agn_firstname"], $obj_con["agn_lastname"], 
                    $obj_con["agn_tel"], $obj_con["agn_address"], $obj_con["agn_tax"], $obj_con["agn_email"]);

                    // get agn_id back
                    $max_id_agent = $this->m_agn->get_max_id();
                    $obj_con["con_agn_id"] = $max_id_agent[0]->agn_id;
                }
            }
        }

        $_SESSION['con_number_error'] = '';
        $_SESSION['agn_company_name_error'] = '';

        // insert container
        $this->m_con->insert($obj_con["con_number"], $obj_con["con_max_weight"], $obj_con["con_tare_weight"], $obj_con["con_net_weight"], 
        $obj_con["con_cube"], $obj_con["con_size_id"], $obj_con["con_cont_id"], $obj_con["con_agn_id"], $obj_con["con_stac_id"]);

        $this->response->redirect(base_url() . '/Container_show/container_show_ajax');
    }

}

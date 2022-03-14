<?php

namespace App\Controllers;

/*
* container_edit
* show container edit page, update container information
* @author   Wirat
* @Create Date  2564-08-06
*/
class Container_edit extends Cdms_controller {
    /*
    * container_input
    * show container edit page
    * @input    con_id
    * @output   show container edit page
    * @author   Wirat
    * @Create Date  2564-08-06
    * @Editor Kittipod
    * @Update Date 2564-03-09
    */
    public function container_edit($con_id = NULL, $data = NULL) {
        $_SESSION['menu'] = 'Container_show';
        if (!isset($_SESSION['con_number_error']) || $_SESSION['con_number_error'] == '') {
            $_SESSION['con_number_error'] = '';
        }
        if (!isset($_SESSION['agn_company_name_error']) || $_SESSION['agn_company_name_error'] == '') {
            $_SESSION['agn_company_name_error'] = '';
        }

        // get container data
        $data['obj_container'] = $this->m_con->get_by_id($con_id);

        // get agent agent
        $data['obj_agent'] = $this->m_agn->get_by_id($data['obj_container']->con_agn_id);
        // print_r($data['arr_agent']);
        $data['arr_agn'] = $this->m_agn->get_all();

        // get dropdown
        // container size
        $data['arr_size'] = $this->m_size->get_all();

        // size information
        $data['obj_con_size'] = $this->m_size->get_by_id($data['obj_container']->con_size_id);

        // container type
        $data['arr_container_type'] = $this->m_cont->get_all();

        // status container
        $data['arr_status_container'] = $this->m_stac->get_all();

        // call container input view

        // echo "<pre>"; print_r($data); echo "</pre>";

        $this->output('v_container_edit', $data);
    }

    /*
    * container_update
    * update container information
    * @input    contianer information, agent information
    * @output   update container, agent information
    * @author   Wirat
    * @Create Date  2564-08-06
    * @Editor Kittipod
    * @Update Date 2564-03-09
    */
    public function container_update() {

        // get Post data
        $obj_con = $this->request->getPost();
        $data = $obj_con;

        if ($obj_con["con_number"] != $obj_con["con_old_number"]) {
            // edit con_number
            $arr_con_number = $this->m_con->is_con_number_exist($obj_con["con_number"]);
            if (count($arr_con_number) >= 1) {
                // duplicate con_number
                $_SESSION['con_number_error'] = 'The container has already used';
                $this->container_edit($obj_con["con_id"], $data);
                exit(0);
            }
        }

        // new agent
        if ($obj_con["agn_id"] == 'new') {
            // check agent duplicate
            $arr_agent = $this->m_agn->get_by_company_name($obj_con["agn_company_name"]);

            // duplicate agent company name
            if (count($arr_agent) > 0) {
                $_SESSION['agn_company_name_error'] = 'The agent has already used';
                $this->container_edit($obj_con["con_id"], $data);
                exit(0);
            }
            // insert agent
            $this->m_agn->insert($obj_con["agn_company_name"], $obj_con["agn_firstname"], $obj_con["agn_lastname"], 
            $obj_con["agn_tel"], $obj_con["agn_address"], $obj_con["agn_tax"], $obj_con["agn_email"]);

            // get agn_id back
            $max_id_agent = $this->m_agn->get_max_id();
            $obj_con["con_agn_id"] = $max_id_agent->agn_id;
        }
        //  select old agent
        else {
            $obj_con["con_agn_id"] = $obj_con["agn_id"];
            $this->m_agn->agent_update($obj_con["agn_id"], NULL, $obj_con["agn_firstname"], $obj_con["agn_lastname"], 
            $obj_con["agn_tel"], $obj_con["agn_address"], $obj_con["agn_tax"], $obj_con["agn_email"]);
        }

        $_SESSION['con_number_error'] = '';
        $_SESSION['agn_company_name_error'] = '';
        
        // update container
        $this->m_con->container_update($obj_con["con_id"], $obj_con["con_number"], $obj_con["con_max_weight"], $obj_con["con_tare_weight"], 
        $obj_con["con_net_weight"], $obj_con["con_cube"], $obj_con["con_size_id"], $obj_con["con_cont_id"], $obj_con["con_agn_id"], $obj_con["con_stac_id"]);

        unset($data);

        $this->response->redirect(base_url() . '/Container_show/container_show_ajax');
    }
}
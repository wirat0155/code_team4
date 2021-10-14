<?php

namespace App\Controllers;

use App\Models\M_cdms_agent;
use App\Models\M_cdms_container;
use App\Models\M_cdms_size;
use App\Models\M_cdms_container_type;
use App\Models\M_cdms_status_container;

/*
* Container_input
* เรียกหน้าจอเพิ่มตู้คอนเทนเนอร์ และเพิ่มตู้คอนเทนเนอร์
* @author Wirat
* @Create Date 2564-08-06
* @Update Date 2564-10-14
*/

class Container_input extends Cdms_controller
{
    /*
    * container_input
    * เรียกหน้าจอเพิ่มตู้คอนเทนเนอร์
    * @input -
    * @output หน้าจอเพิ่มตู้คอนเทนเนอร์
    * @author Wirat
    * @Create Date 2564-08-06
    * @Update Date 2564-10-14
    */
    public function container_input($section_error = '')
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
        
        // agent
        $m_agn = new M_cdms_agent();
        $data['arr_agn'] = $m_agn->get_all();

        // Section error
        // 1 = duplicate con_number
        // 2 = duplicate agn_company_name
        $data['section_error'] = $section_error;

        // call container input view
        $this->output('v_container_input', $data);
    }

    /*
    * container_insert
    * เพิ่มตู้คอนเทนเนอร์
    * @input ข้อมูลตู้คอนเทนเนอร์ ข้อมูลเอเย่นต์
    * @output เพิ่มตู้คอนเทนเนอร์ เพิ่มเอเย่นต์ หรือแก้ไขเอเย่นต์
    * @author Wirat
    * @Create Date 2564-08-06
    * @Update Date 2564-10-14
    */
    public function container_insert() {
        // get post value container form
        $con_number = $this->request->getPost('con_number');
        $con_max_weight = $this->request->getPost('con_max_weight');
        $con_tare_weight = $this->request->getPost('con_tare_weight');
        $con_net_weight = $this->request->getPost('con_net_weight');
        $con_cube = $this->request->getPost('con_cube');
        $con_size_id = $this->request->getPost('con_size_id');
        $con_cont_id = $this->request->getPost('con_cont_id');
        $con_stac_id = $this->request->getPost('con_stac_id');
        $con_image = $this->request->getPost('con_image');

        // load container model
        $m_con = new M_cdms_container();

        // get container by con_number
        $arr_container = $m_con->get_by_con_number($con_number);

        // duplicate con_number
        // then go to add container form with error
        if (count($arr_container) >= 1) {
            $_SESSION['con_number_error'] = 'The container number has already used';
            $this->container_input(1);
            exit;
        }
        
        // not duplicate con_number
        else {
            // get post value agent form
            $agn_id = $this->request->getPost('agn_id');
            $agn_company_name = $this->request->getPost('agn_company_name');
            $agn_firstname = $this->request->getPost('agn_firstname');
            $agn_lastname = $this->request->getPost('agn_lastname');
            $agn_tel = $this->request->getPost('agn_tel');
            $agn_address = $this->request->getPost('agn_address');
            $agn_tax = $this->request->getPost('agn_tax');
            $agn_email = $this->request->getPost('agn_email');

            // load agent model
            $m_agn = new M_cdms_agent();

            // select agent from dropdown
            // then update agent
            if ($agn_id != '') {
                $agn_name = $this->request->getPost('agn_name');
                $arr_agent = $m_agn->get_by_company_name($agn_name);
                $con_agn_id = $arr_agent[0]->agn_id;
                
                $m_agn->agent_update($agn_id, NULL, $agn_firstname, $agn_lastname, $agn_tel, $agn_address, $agn_tax, $agn_email);
            }

            // new agent
            // then check duplicate agent or not
            else {
                // load agent model
                $m_agn = new M_cdms_agent();

                // get agent by agent company name
                $arr_agent = $m_agn->get_by_company_name($agn_company_name);

                // if duplicate agent company name
                // then go to add agent page
                // exit function
                if (count($arr_agent) >= 1 ) {
                    $_SESSION['agn_company_name_error'] = 'The agent has already used';
                    $this->container_input(2);
                    exit;
                }

                // if agent company name is unique
                // then insert the agent
                else {
                    // insert new agent
                    $m_agn->insert($agn_company_name, $agn_firstname, $agn_lastname, $agn_tel, $agn_address, $agn_tax, $agn_email);

                    // get agn_id back
                    $max_id_agent = $m_agn->get_max_id();
                    $con_agn_id = $max_id_agent[0]->agn_id;
                }
            }
        }

        // insert container
        $_SESSION['con_number_error'] = '';
        $_SESSION['agn_company_name_error'] = '';
        $m_con->insert($con_number, $con_max_weight, $con_tare_weight, $con_net_weight, $con_cube, $con_size_id, $con_cont_id, $con_agn_id, $con_stac_id);
        $this->response->redirect(base_url() . '/Container_show/container_show_ajax');
    }
    
}
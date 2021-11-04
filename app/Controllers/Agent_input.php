<?php
namespace App\Controllers;
use App\Models\M_cdms_agent;

/*
* Agent_input
* show agent input page, insert agent
* @author Klayuth
* @Create Date 2564-08-06
* @Update Date 2564-08-06
*/
class Agent_input extends Cdms_controller {
    /*
    * agent_input
    * แสดงหน้าจอเพิ่มเอเย่นต์
    * @input -
    * @output show agent input page
    * @author Klayuth
    * @Create Date 2564-08-06
    * @Update Date 2564-08-06
    */
    public function agent_input() {
        $_SESSION['menu'] = 'Agent_show';
        if (!isset($_SESSION['agn_company_name_error']) || $_SESSION['agn_company_name_error'] == '') {
            $_SESSION['agn_company_name_error'] = '';
        }

        $this->output('v_agent_input');
    }

    /*
    * agent_insert
    * insert agent
    * @input agn information
    * @output insert agent
    * @author Klayuth
    * @Create Date 2564-08-06
    * @Update Date 2564-10-14
    */
    public function agent_insert() {

        // get post value from agent_input form
        $agn_company_name = $this->request->getPost('agn_company_name');
        $agn_firstname = $this->request->getPost('agn_firstname');
        $agn_lastname = $this->request->getPost('agn_lastname');
        $agn_tel = $this->request->getPost('agn_tel');
        $agn_address = $this->request->getPost('agn_address');
        $agn_tax = $this->request->getPost('agn_tax');
        $agn_email = $this->request->getPost('agn_email');

        // load agent model
        $m_agn = new M_cdms_agent();

        // Get agent by agent company name
        $arr_agent = $m_agn->get_by_company_name($agn_company_name);

        // if duplicate agent company name
        // then go to add agent page
        // exit function
        if (count($arr_agent) >= 1 ) {
            $_SESSION['agn_company_name_error'] = 'The agent has already used';
            $this->agent_input();
            exit;
        }
        // if agent company name is unique
        // then insert the agent
        else {
            $m_agn->insert($agn_company_name, $agn_firstname, $agn_lastname, $agn_tel, $agn_address, $agn_tax, $agn_email);
            return $this->response->redirect(base_url('/Agent_show/agent_show_ajax'));
        }
    }
}

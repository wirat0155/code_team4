<?php
namespace App\Controllers;
use App\Models\M_cdms_agent;

/*
* Agent_edit
* Show agent edit page, update agent information
* @author Klayuth, Preechaya
* @Create Date 2021-08-06
* @Update Date 2021-08-06
*/
class Agent_edit extends Cdms_controller {

    /*
    * agent_edit
    * Show agent edit page
    * @input agn_id
    * @output agent edit page with agent information
    * @author Klayuth, Preechaya
    * @Create Date 2021-08-06
    * @Update Date 2021-08-06
    */
    public function agent_edit($agn_id = '') {
        $_SESSION['menu'] = 'Agent_show';

        // get agent information
        $m_agn = new M_cdms_agent();
        $data['arr_agent'] = $m_agn->get_by_id($agn_id);

        // show agent edit page
        $this->output('v_agent_edit', $data);
    }

    /*
    * agent_update
    * update agent information
    * @input agent information
    * @output เพิ่มข้อมูลเอเย่นต์
    * @author Klayuth Preechaya
    * @Create Date 2021-08-06
    * @Update Date 2021-10-17
    */
    public function agent_update() {
        // load agent model
        $m_agn = new M_cdms_agent();

        // get agent information form agent edit page
        $agn_id = $this->request->getPost('agn_id');
        $agn_company_name = $this->request->getPost('agn_company_name');
        $agn_firstname = $this->request->getPost('agn_firstname');
        $agn_lastname = $this->request->getPost('agn_lastname');
        $agn_tel = $this->request->getPost('agn_tel');
        $agn_address = $this->request->getPost('agn_address');
        $agn_tax = $this->request->getPost('agn_tax');
        $agn_email = $this->request->getPost('agn_email');

        // check agent duplicate company name
        $arr_agent = $m_agn->get_by_company_name($agn_company_name);
        if (count($arr_agent) >= 1 && $arr_agent[0]->agn_id != $agn_id) {
            $_SESSION['agn_company_name_error'] = 'The agent has already used';
            
            // if duplicate
            // then go to agent edit page
            $_SESSION['agn_company_name'] = $agn_company_name;
            $_SESSION['agn_firstname'] = $agn_firstname;
            $_SESSION['agn_lastname'] = $agn_lastname;
            $_SESSION['agn_tel'] = $agn_tel;
            $_SESSION['agn_address'] = $agn_address;
            $_SESSION['agn_tax'] = $agn_tax;
            $_SESSION['agn_email'] = $agn_email;

            $this->agent_edit($agn_id);
            exit(0);
        }
        
        // if agent company name is unique
        // then updaet the agent
        $_SESSION['agn_company_name_error'] = '';
        unset($_SESSION['agn_id']);
        unset($_SESSION['agn_company_name']);
        unset($_SESSION['agn_firstname']);
        unset($_SESSION['agn_lastname']);
        unset($_SESSION['agn_tel']);
        unset($_SESSION['agn_address']);
        unset($_SESSION['agn_tax']);
        unset($_SESSION['agn_email']);
        $m_agn->agent_update($agn_id, $agn_company_name, $agn_firstname, $agn_lastname, $agn_tel, $agn_address, $agn_tax, $agn_email);
        return $this->response->redirect(base_url('/Agent_show/agent_show_ajax'));
        
    }
}

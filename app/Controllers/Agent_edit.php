<?php
namespace App\Controllers;
use App\Models\M_cdms_agent;

/*
* Agent_edit
* Show agent edit page, update agent information
* @author Klayuth, Preechaya
* @Create Date 2021-08-06
*/
class Agent_edit extends Cdms_controller {

    /*
    * agent_edit
    * Show agent edit page
    * @input     agn_id, data
    * @output   agent edit page with object agent
    * @author   Klayuth, Preechaya
    * @Create Date  2021-08-06
    */
    public function agent_edit($agn_id = NULL, $data = []) {
        $_SESSION['menu'] = 'Agent_show';

        if (count($data) == 0) {
            // get agent information
            $m_agn = new M_cdms_agent();
            $data["obj_agent"] = $m_agn->get_by_id($agn_id);

            $data['agn_id'] = $data["obj_agent"]->agn_id;
            $data['agn_company_name'] = $data["obj_agent"]->agn_company_name;
            $data['agn_firstname'] = $data["obj_agent"]->agn_firstname;
            $data['agn_lastname'] = $data["obj_agent"]->agn_lastname;
            $data['agn_tel'] = $data["obj_agent"]->agn_tel;
            $data['agn_address'] = $data["obj_agent"]->agn_address;
            $data['agn_tax'] = $data["obj_agent"]->agn_tax;
            $data['agn_email'] = $data["obj_agent"]->agn_email;
        }

        // show agent edit page
        $this->output('v_agent_edit', $data);
    }

    /*
    * agent_update
    * update agent information
    * @input    agent information
    * @output   updating agent information
    * @author   Klayuth Preechaya
    * @Create Date  2021-08-06
    */
    public function agent_update() {
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
        $arr_agent = $this->get_by_company_name($agn_company_name);

        // Duplicate name and not same agn id
        // Then error
        if ($this->check_agent_company_name_duplicate($arr_agent) && $arr_agent[0]->agn_id != $agn_id) {
            // if duplicate
            // then go to agent edit page
            $data['agn_company_name_error'] = 'The agent has already used';
            $data['agn_company_name'] = $agn_company_name;
            $data['agn_firstname'] = $agn_firstname;
            $data['agn_lastname'] = $agn_lastname;
            $data['agn_tel'] = $agn_tel;
            $data['agn_address'] = $agn_address;
            $data['agn_tax'] = $agn_tax;
            $data['agn_email'] = $agn_email;

            $this->agent_edit($agn_id, $data);
            exit(0);
        }
        else {
            $this->update_agent_to_db(
                $agn_id,
                $agn_company_name,
                $agn_firstname,
                $agn_lastname,
                $agn_tel,
                $agn_address,
                $agn_tax,
                $agn_email);
        }

        return $this->response->redirect(base_url('/Agent_show/agent_show_ajax'));
    }

     /*
    * get_by_company_name
    * get agent information by agent company name
    * @input     agn company name
    * @output   array of agent
    * @author   Wirat
    * @Create Date  2565-02-20
    */
    private function get_by_company_name($agn_company_name) {
        $m_agn = new M_cdms_agent();
        $arr_agent = $m_agn->get_by_company_name($agn_company_name);
        return $arr_agent;
    }

    /*
    * check_agent_company_name_duplicate
    * check agent company name duplication
    * @input     array of agent
    * @output   true | false
    * @author   Wirat
    * @Create Date  2565-02-20
    */
    private function check_agent_company_name_duplicate($arr_agent) {
        return count($arr_agent) >= 1;
    }

     /*
    * update_agent_to_db
    * updating agent data in database
    * @input     agent onformation
    * @output   updating agent information
    * @author   Wirat
    * @Create Date  2565-02-20
    */
    private function update_agent_to_db(
        $agn_id,
        $agn_company_name,
        $agn_firstname,
        $agn_lastname,
        $agn_tel,
        $agn_address,
        $agn_tax,
        $agn_email) {
        $m_agn = new M_cdms_agent();
        $m_agn->agent_update($agn_id, $agn_company_name, $agn_firstname, $agn_lastname, $agn_tel, $agn_address, $agn_tax, $agn_email);
    }
}

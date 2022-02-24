<?php
namespace App\Controllers;
use App\Models\M_cdms_agent;

/*
* Agent_input
* show agent input page, insert agent
* @author   Klayuth
* @Create Date  2564-08-06
*/
class Agent_input extends Cdms_controller {
    /*
    * agent_input
    * go to add agent page
    * @input    -
    * @output   show add agent page
    * @author   Klayuth
    * @Create Date  2564-08-06

    */
    public function agent_input($data = []) {
        $_SESSION['menu'] = 'Agent_show';

        // First set error to ""
        if (count($data) == 0) $data["agn_company_name_error"] = "";
        
        $this->output('v_agent_input', $data);
    }

    /*
    * agent_insert
    * insert agent
    * @input    agn information
    * @output   insert agent
    * @author   Klayuth
    * @Create Date  2564-08-06

    */
    public function agent_insert() {
        // get post value from agent_input form
        // $agn_company_name = $this->request->getPost('agn_company_name');
        // $agn_firstname = $this->request->getPost('agn_firstname');
        // $agn_lastname = $this->request->getPost('agn_lastname');
        // $agn_tel = $this->request->getPost('agn_tel');
        // $agn_address = $this->request->getPost('agn_address');
        // $agn_tax = $this->request->getPost('agn_tax');
        // $agn_email = $this->request->getPost('agn_email');

        $obj_agn = $this->request->getPost();

        // Get agent by agent company name
        $arr_agent = $this->get_by_company_name($obj_agn["agn_company_name"]);

        // if duplicate
        // then go to add agent page
        if ($this->check_agent_company_name_duplicate($arr_agent) ) {
            // if duplicate
            // then go to agent input page
            $data = $obj_agn;
            $data['agn_company_name_error'] = "The agent has already used";
            // $data['agn_company_name'] = $agn_company_name;
            // $data['agn_firstname'] = $agn_firstname;
            // $data['agn_lastname'] = $agn_lastname;
            // $data['agn_tel'] = $agn_tel;
            // $data['agn_address'] = $agn_address;
            // $data['agn_tax'] = $agn_tax;
            // $data['agn_email'] = $agn_email;

            // Send agent data back to agent input
            $this->agent_input($data);
            exit(0);
        }
        else {
            // if agent company name is unique
            // then insert the agent
            $this->insert_agent_to_db(
                $obj_agn["agn_company_name"],
                $obj_agn["agn_firstname"],
                $obj_agn["agn_lastname"],
                $obj_agn["agn_tel"],
                $obj_agn["agn_address"],
                $obj_agn["agn_tax"],
                $obj_agn["agn_email"]);
            
            // Return to agent list page
            return $this->response->redirect(base_url('/Agent_show/agent_show_ajax'));
        }
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
    * insert_agent_to_db
    * insert agent to database
    * @input     agent information
    * @output   inserting agent to database
    * @author   Wirat
    * @Create Date  2565-02-20
    */
    protected function insert_agent_to_db(
        $agn_company_name,
        $agn_firstname,
        $agn_lastname,
        $agn_tel,
        $agn_address,
        $agn_tax,
        $agn_email
    ) {
        $m_agn = new M_cdms_agent();
        $m_agn->insert($agn_company_name, $agn_firstname, $agn_lastname, $agn_tel, $agn_address, $agn_tax, $agn_email);
    }
}
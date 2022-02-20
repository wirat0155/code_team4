<?php
namespace App\Controllers;

use App\Models\M_cdms_agent;
use App\Models\M_cdms_container;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

/*
* Agent_show
* show agent list, delete anget
* @author   Klayuth, Preechaya
* @Create Date  2564-07-30
*/
class Agent_show extends Cdms_controller {
    /*
    * agent_show_ajax
    * show agent list
    * @input    -
    * @output   array of agent
    * @author   Klayuth
    * @Create Date  2564-07-30
    */
    public function agent_show_ajax() {
        $_SESSION["menu"] = "Agent_show";

        // load agent model
        $m_agn = new M_cdms_agent();

        // Get agent with number of use container
        $data["arr_agent"] = $m_agn->get_all(3);

        $this->output('v_agent_showlist', $data);
    }

    /*
    * agent_delete
    * delete agent
    * @input    agn_id
    * @output   delete agent
    * @author   Preechaya
    * @Create Date  2564-07-30
    */
    public function agent_delete() {
        $m_agn = new M_cdms_agent();
        $m_agn->delete($this->request->getPost("agn_id"));

        return $this->response->redirect(base_url("/Agent_show/agent_show_ajax"));
    }

    /*
    * get_agent_ajax
    * get agent information
    * @input    agn_id
    * @output   agent information
    * @author   Preechaya
    * @Create Date  2564-08-07
    */
    public function get_agent_ajax() {
        $m_agn = new M_cdms_agent();
        $agn_id = $this->request->getPost("agn_id");
        $obj_agent = $m_agn->get_by_id($agn_id);
        echo json_encode($obj_agent);
    }

    /*
    * agent_detail
    * show agent detail page
    * @input    agn_id
    * @output   agent information
    * @author   Nattanan
    * @Create Date  2564-08-12
    */
    public function agent_detail($agn_id) {
        $_SESSION["menu"] = 'Agent_show';

        $m_agn = new M_cdms_agent;
        $data["obj_agent"] = $m_agn->get_by_id($agn_id);

        $data['agn_id'] = $data["obj_agent"]->agn_id;
        $data['agn_company_name'] = $data["obj_agent"]->agn_company_name;
        $data['agn_firstname'] = $data["obj_agent"]->agn_firstname;
        $data['agn_lastname'] = $data["obj_agent"]->agn_lastname;
        $data['agn_tel'] = $data["obj_agent"]->agn_tel;
        $data['agn_address'] = $data["obj_agent"]->agn_address;
        $data['agn_tax'] = $data["obj_agent"]->agn_tax;
        $data['agn_email'] = $data["obj_agent"]->agn_email;

        $this->output('v_agent_show_information', $data);
    }
}

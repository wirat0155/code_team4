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
        $_SESSION['menu'] = 'Agent_show';

        // load agent model
        $m_agn = new M_cdms_agent();
        $data['arr_agent'] = $m_agn->get_all(3);
        // echo '<pre>';
        // print_r($data['arr_agent']);
        // echo '</pre>';

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
        $m_agn->delete($this->request->getPost('agn_id'));

        return $this->response->redirect(base_url('/Agent_show/agent_show_ajax'));
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
        $agn_id = $this->request->getPost('agn_id');
        $agn_information = $m_agn->get_by_id($agn_id);

        echo json_encode($agn_information);
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
        $_SESSION['menu'] = 'Agent_show';
        $m_agn = new M_cdms_agent;
        $data['arr_agent'] = $m_agn->get_by_id($agn_id);
        $this->output('v_agent_show_information', $data);
    }
}

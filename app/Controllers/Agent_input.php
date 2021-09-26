<?php
namespace App\Controllers;
use App\Models\M_cdms_agent;

    /*
    * Agent_input
    * แสดงหน้าจอเพิ่มข้อมูลเอเย่นต์
    * @author Klayuth
    * @Create Date 2564-08-06
    * @Update Date 2564-08-06
    */

class Agent_input extends Cdms_controller {
    /*
    * agent_input
    * แสดงหน้าจอเพิ่มเอเย่นต์
    * @input -
    * @output แสดงหน้าจอเพิ่มเอเย่นต์
    * @author Klayuth
    * @Create Date 2564-08-06
    * @Update Date 2564-08-06
    */
    public function agent_input() {
        $_SESSION['menu'] = 'Agent_show';

        $this->output('v_agent_input');
    }

    /*
    * agent_insert
    * เพิ่มข้อมูลเอเย่นต์
    * @input agn information
    * @output เพิ่มเอเย่นต์
    * @author Klayuth
    * @Create Date 2564-08-06
    * @Update Date 2564-08-06
    */
    public function agent_insert() {
        $m_agn = new M_cdms_agent();
        $arr_agn = $m_agn->get_all();

        $agn_company_name = $this->request->getPost('agn_company_name');
        $agn_firstname = $this->request->getPost('agn_firstname');
        $agn_lastname = $this->request->getPost('agn_lastname');
        $agn_tel = $this->request->getPost('agn_tel');
        $agn_address = $this->request->getPost('agn_address');
        $agn_tax = $this->request->getPost('agn_tax');
        $agn_email = $this->request->getPost('agn_email');

        // duplicate agn_company_name
        // then back to v_agent_showlist
        for ($i = 0; $i < count($arr_agn); $i++) {
            if ($arr_agn[$i]->agn_company_name == $agn_company_name) {
                return $this->response->redirect(base_url('/Agent_show/agent_show_ajax'));
            }
        }

        $m_agn->insert($agn_company_name, $agn_firstname, $agn_lastname, $agn_tel, $agn_address, $agn_tax, $agn_email);
        return $this->response->redirect(base_url('/Agent_show/agent_show_ajax'));
    }
}

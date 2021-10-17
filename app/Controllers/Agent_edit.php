<?php
namespace App\Controllers;
use App\Models\M_cdms_agent;

/*
* Agent_edit
* แสดงหน้าจอแก้ไขเอเย่นต์ และแก้ไขเอเย่นต์
* @author Klayuth Preechaya
* @Create Date 2021-08-06
* @Update Date 2021-08-06
*/
class Agent_edit extends Cdms_controller {

    /*
    * agent_edit
    * แสดงหน้าจอแก้ไขเอเย่นต์
    * @input agn_id
    * @output แสดงข้อมูลหน้าที่จะแก้ไข
    * @author Klayuth Preechaya
    * @Create Date 2021-08-06
    * @Update Date 2021-08-06
    */
    public function agent_edit($agn_id) {
        $_SESSION['menu'] = 'Agent_show';
        
        $m_agn = new M_cdms_agent();
        $data['arr_agent'] = $m_agn->get_by_id($agn_id);

        $this->output('v_agent_edit', $data);
    }

    /*
    * agent_update
    * แก้ไขข้อมูลเอเย่นต์
    * @input agent information
    * @output เพิ่มข้อมูลเอเย่นต์
    * @author Klayuth Preechaya
    * @Create Date 2021-08-06
    * @Update Date 2021-10-17
    */
    public function agent_update() {
        $m_agn = new M_cdms_agent();

        $agn_id = $this->request->getPost('agn_id');
        $agn_company_name = $this->request->getPost('agn_company_name');
        $agn_firstname = $this->request->getPost('agn_firstname');
        $agn_lastname = $this->request->getPost('agn_lastname');
        $agn_tel = $this->request->getPost('agn_tel');
        $agn_address = $this->request->getPost('agn_address');
        $agn_tax = $this->request->getPost('agn_tax');
        $agn_email = $this->request->getPost('agn_email');

        // ค้นหาเอเย่นต์ที่มีชื่อซ้ำ
        $arr_agent = $m_agn->get_by_company_name($agn_company_name);

        // Check เอเย่นซ้ำหรือไม่
        if (count($arr_agent) >= 1 && $arr_agent[0]->agn_id != $agn_id) {
            $_SESSION['agn_company_name_error'] = 'The agent has already used';
            $this->agent_edit($agn_id);
            exit;
        } else {
            $m_agn->agent_update($agn_id, $agn_company_name, $agn_firstname, $agn_lastname, $agn_tel, $agn_address, $agn_tax, $agn_email);
            return $this->response->redirect(base_url('/Agent_show/agent_show_ajax'));
        }
    }
}

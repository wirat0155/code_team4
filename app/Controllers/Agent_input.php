<?php namespace App\Controllers;
use App\Models\M_cdms_agent;

    /*
        * Agent_input
        * แสดงหน้าจอเพิ่มข้อมูลเอเย่นต์
        * @author Klayuth
        * @Create Date 2564-08-06
        * @Update Date 2564-08-06
    */
class Agent_input extends Cdms_controller
{
    /*
        * agent_input
        * แสดงหน้าจอ agent_input
        * @author Klayuth
        * @Create Date 2564-08-06
        * @Update Date 2564-08-06
    */
    public function agent_input()
    {
        $this->output('v_agent_input');
    }

    /*
        * agent_insert
        * เพิ่มข้อมูลเอเย่นต์
        * @author Klayuth
        * @Create Date 2564-08-06
        * @Update Date 2564-08-06
    */
    public function agent_insert() {
        $M_agent = new M_cdms_agent();
        $arr_agent = $M_agent->get_all();

        $agn_company_name = $this->request->getPost('agn_company_name');
        $agn_firstname = $this->request->getPost('agn_firstname');
        $agn_lastname = $this->request->getPost('agn_lastname');
        $agn_tel = $this->request->getPost('agn_tel');
        $agn_address = $this->request->getPost('agn_address');
        $agn_status = $this->request->getPost('agn_status');
        $agn_tax = $this->request->getPost('agn_tax');
        $agn_email = $this->request->getPost('agn_email');
        
        for ($i = 0; $i < count($arr_agent); $i++){
            if($arr_agent[$i]->agn_company_name == $agn_company_name){
                return $this->response->redirect(base_url('/public/Agent_show/agent_show_ajax'));
            }
        }
        
        $M_agent->insert($agn_company_name, $agn_firstname, $agn_lastname, $agn_tel, $agn_address,$agn_tax, $agn_email);
        return $this->response->redirect(base_url('/public/Agent_show/agent_show_ajax'));
    }
    
}
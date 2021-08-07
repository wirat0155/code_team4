<?php

namespace App\controllers;

use App\Models\M_cdms_agent;

/*
        * Agent_edit
        * แสดงและแก้ไขรายชื่อเอเย่นต์
        * @author Klayuth,Preechaya
        * @Create Date 2021-08-06
        * @Update Date
    */

class Agent_edit extends Cdms_controller
{
    /*
        * agent_edit
        * แสดงหน้าจอ agent_input
        * @input -
        * @output 
        * @author Klayuth,Preechaya
        * @Create Date 2021-08-06
        * @Update Date
    */

    public function agent_edit($agn_id)
    {
        $m_agn = new M_cdms_agent;
        $data['arr_agent'] = $m_agn->get_by_id($agn_id);
        $this->output('v_agent_edit', $data);
    }

    /*
        * agent_update
        * แก้ไขข้อมูลเอเย่นต์
        * @input -
        * @output 
        * @author Klayuth,Preechaya
        * @Create Date 2021-08-06
        * @Update Date
    */

    public function agent_update()
    {
        $m_agn = new M_cdms_agent;
        $agn_id = $this->request->getPost('agn_id');
        $agn_company_name = $this->request->getPost('agn_company_name');
        $agn_firstname = $this->request->getPost('agn_firstname');
        $agn_lastname = $this->request->getPost('agn_lastname');
        $agn_tel = $this->request->getPost('agn_tel');
        $agn_address = $this->request->getPost('agn_address');
        $agn_tax = $this->request->getPost('agn_tax');
        $agn_email = $this->request->getPost('agn_email');
        $m_agn->agent_update($agn_id, $agn_company_name, $agn_firstname, $agn_lastname, $agn_tel, $agn_address, $agn_tax, $agn_email);
        return $this->response->redirect(base_url('/public/Agent_show/agent_show_ajax'));
    }
}

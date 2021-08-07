<?php

namespace App\Controllers;

use App\Models\M_cdms_agent;
use App\Models\M_cdms_container;

/*
* Agent_show
* แสดงรายชื่อเอเย่นต์ และลบรายชื่อเอเย่นต์
* @author Klayuth,Preechaya
* @Create Date 2564-07-30
* @Update Date 2564-08-02
*/

class Agent_show extends Cdms_controller
{
    /*
    * agent_show_ajax
    * แสดงรายชื่อเอเย่นต์
    * @author Klayuth
    * @Create Date 2564-07-30
    * @Update Date 2564-08-02
    */
    public function agent_show_ajax()
    {
        $_SESSION['menu'] = 'Agent_show';
        $m_agn = new M_cdms_agent();
        $data['arr_agent'] = $m_agn->get_all();

        $m_con = new M_cdms_container();
        $data['arr_container'] = $m_con->get_all();

        $this->output('v_agent_showlist', $data);
    }
    /*
    * agent_delete
    * ลบรายชื่อเอเย่นต์
    * @author Preechaya
    * @Create Date 2564-07-30
    * @Update Date 2564-08-02
    */
    public function agent_delete()
    {
        $m_agn = new M_cdms_agent();
        $m_agn->delete($this->request->getPost('agn_id'));
        return $this->response->redirect(base_url('/public/Agent_show/agent_show_ajax'));
    }

    public function get_agent_ajax()
    {
        $m_agn = new M_cdms_agent();
        $agn_company_name = $this->request->getPost('agn_company_name');
        $agn_information = $m_agn->get_by_company_name($agn_company_name);
        echo json_encode($agn_information);
    }
}

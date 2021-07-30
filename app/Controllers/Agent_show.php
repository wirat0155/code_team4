<?php namespace App\Controllers;
use App\Models\M_cdms_agent;
use App\Models\M_cdms_container;

class Agent_show extends Cdms_controller
{
    public function agent_show_ajax()
    {
        $_SESSION['menu'] = 'Agent_show';
        $M_agent = new M_cdms_agent();
        $data['arr_agent'] = $M_agent->get_all();
        
        $M_con = new M_cdms_container();
        $data['arr_container'] = $M_con->get_all();

        $this->output('v_agent_showlist', $data);
    }

    public function agent_delete() {
        $M_agn = new M_cdms_agent();
        $M_agn->delete($this->request->getPost('agn_id'));
        return $this->response->redirect(base_url('/public/Agent_show/agent_show_ajax'));
    }
}
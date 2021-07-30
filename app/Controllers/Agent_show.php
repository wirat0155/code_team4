<?php namespace App\Controllers;
use App\Models\M_cdms_agent;

class Agent_show extends Cdms_controller
{
    public function index()
    {
        $M_agent = new M_cdms_agent();
        $data['arr_agent'] = $M_agent->get_all();
        $this->output('v_agent_show', $data);
    }
}
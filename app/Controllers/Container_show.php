<?php namespace App\Controllers;
use App\Models\M_cdms_container;

class Container_show extends Cdms_controller
{
    public function container_show_ajax()
    {
        $_SESSION['menu'] = 'Container_show';
        $M_cus = new M_cdms_container();
        $data['arr_container'] = $M_cus->get_all();
        $this->output('v_container_showlist', $data);
    }
    public function container_delete($con_id) {
        $M_cus = new M_cdms_container();
        $M_cus->delete($con_id);
        return $this->response->redirect(base_url('/public/Container_show/container_show_ajax'));
    }
}
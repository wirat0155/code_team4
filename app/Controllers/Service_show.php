<?php

namespace App\Controllers;

use App\Models\M_cdms_service;

class Service_show extends Cdms_controller
{
    public function service_show_ajax()
    {
        $_SESSION['menu'] = 'Service_show';
        $M_ser = new M_cdms_service();
        $data['arr_service'] = $M_ser->get_all();

        $this->output('v_service_showlist', $data);
    }
    public function service_delete()
    {
        $M_ser = new M_cdms_service();
        $M_ser->delete($this->request->getPost('ser_id'));
        return $this->response->redirect(base_url('/public/Service_show/service_show_ajax'));
    }
}
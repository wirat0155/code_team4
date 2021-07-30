<?php namespace App\Controllers;
use App\Models\M_cdms_customer;
use App\Models\M_cdms_service;

class Customer_show extends Cdms_controller
{
    public function customer_show_ajax()
    {
        $_SESSION['menu'] = 'Customer_show';
        $M_cus = new M_cdms_customer();
        $data['arr_customer'] = $M_cus->get_all();
        $M_ser = new M_cdms_service();
        $data['arr_service'] = $M_ser->get_all();

        $this->output('v_customer_showlist', $data);
    }
    public function customer_delete() {
        $M_ctm = new M_cdms_customer();
        $M_ctm->delete($this->request->getPost('cus_id'));
        return $this->response->redirect(base_url('/public/Customer_show/customer_show_ajax'));
    }

}
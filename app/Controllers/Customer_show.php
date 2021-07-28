<?php namespace App\Controllers;
use App\Models\M_cdms_customer;

class Customer_show extends Cdms_controller
{
    public function index()
    {
        $M_cus = new M_cdms_customer();
        $data['arr_customer'] = $M_cus->get_all();

        $this->output('v_customer_show', $data);
    }

}
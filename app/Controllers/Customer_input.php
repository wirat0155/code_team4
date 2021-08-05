<?php namespace App\Controllers;
use App\Models\M_cdms_customer;

/*
    * Customer_input
    * แสดงหน้าจอเพิ่มข้อมูล และเพิ่มลูกค้า
    * @author  Kittipod
    * @Create Date 2564-08-05
    * @Update Date 2564-08-05
*/
class Customer_input extends Cdms_controller
{
    /*
    * customer_input
    * แสดงหน้าจอ customer_input
    * @author  Kittipod
    * @Create Date 2564-08-05
    * @Update Date 2564-08-05
*/
    public function customer_input()
    {
        $this->output('v_customer_input');
    }

/*
* customer_show_ajax
* เพิ่มข้อมูลลูกค้า
* @author  Kittipod
* @Create Date 2564-08-05
* @Update Date 2564-08-05
*/
    public function customer_insert() {
        $M_cus = new M_cdms_customer();
    
        $cus_company_name = $this->request->getPost('input_company');
        $cus_firstname = $this->request->getPost('input_fname');
        $cus_lastname = $this->request->getPost('input_lname');
        $cus_branch = $this->request->getPost('input_branch');
        $cus_tel = $this->request->getPost('input_tel');
        $cus_address = $this->request->getPost('input_address');
        $cus_tax = $this->request->getPost('input_tax');
        $cus_email = $this->request->getPost('input_email');

        $M_cus->insert($cus_company_name, $cus_firstname, $cus_lastname, $cus_branch, $cus_tel, $cus_address, $cus_tax, $cus_email);
        return $this->response->redirect(base_url('/public/Customer_show/customer_show_ajax'));
    }

}
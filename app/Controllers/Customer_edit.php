<?php

namespace App\Controllers;

use App\Models\M_cdms_customer;

/*
    * Customer_edit
    * แสดงหน้าจอเเก้ไขข้อมูลลูกค้า 
    * @author  Benapon
    * @Create Date 2564-08-06
    * @Update Date 2564-08-06
*/

class Customer_edit extends Cdms_controller {
    /*   
    * customer_edit
    * แสดงหน้าจอ customer_edit
    * @author  Benjapon
    * @Create Date 2564-08-06
    * @Update Date 2564-08-06
*/
    public function customer_edit($cus_id) {
        $_SESSION['menu'] = 'Customer_show';
        $m_cus = new M_cdms_customer;
        $data['arr_customer'] = $m_cus->get_by_id($cus_id);
        $this->output('v_customer_edit', $data);
    }
    /*
    * customer_update
    * เเก้ไขข้อมูลลูกค้า
    * @author  Benjapon
    * @Create Date 2564-08-06
    * @Update Date 2564-08-06
*/
    public function customer_update() {
        $m_cus = new M_cdms_customer;
        $cus_id = $this->request->getPost('cus_id');
        $cus_company_name = $this->request->getPost('cus_company_name');
        $cus_firstname = $this->request->getPost('cus_firstname');
        $cus_lastname = $this->request->getPost('cus_lastname');
        $cus_branch = $this->request->getPost('cus_branch');
        $cus_tel = $this->request->getPost('cus_tel');
        $cus_address = $this->request->getPost('cus_address');
        $cus_tax = $this->request->getPost('cus_tax');
        $cus_email = $this->request->getPost('cus_email');
        $m_cus->customer_update($cus_id, $cus_company_name, $cus_firstname, $cus_lastname, $cus_branch, $cus_tel, $cus_address, $cus_tax, $cus_email);
        return $this->response->redirect(base_url('/public/Customer_show/customer_show_ajax'));
    }
}

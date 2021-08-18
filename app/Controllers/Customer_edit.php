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

        // เก็บข้อมูลของ ลูกค้า
        $cus_id = $this->request->getPost('cus_id');
        $cus_company_name = $this->request->getPost('cus_company_name');
        $old_cus_company_name = $this->request->getPost('old_cus_company_name');
        $cus_firstname = $this->request->getPost('cus_firstname');
        $cus_lastname = $this->request->getPost('cus_lastname');
        $cus_branch = $this->request->getPost('cus_branch');
        $old_cus_branch = $this->request->getPost('old_cus_branch');
        $cus_tel = $this->request->getPost('cus_tel');
        $cus_address = $this->request->getPost('cus_address');
        $cus_tax = $this->request->getPost('cus_tax');
        $cus_email = $this->request->getPost('cus_email');

        $count_cus = 0;
        if($old_cus_company_name != $cus_company_name || $old_cus_branch != $cus_branch){
            $arr_customer = $m_cus->is_cus_branch_exist($cus_company_name);
            
            for($i = 0; $i < count($arr_customer);$i++){
                if($arr_customer[$i]->cus_branch == $cus_branch){
                    $count_cus++;
                }
            }
        }

        if ($count_cus >= 1) {
            if($cus_branch == '')
                $_SESSION['cus_company_name_error'] = 'มีชื่อบริษัทอยู่แล้ว';
            else
                $_SESSION['cus_branch_error'] = 'มีสาขาอยู่แล้ว';

            $this->customer_edit($cus_id);
        } else {
            // แก้ไขข้อมูลลูกค้า
            $m_cus->customer_update($cus_id, $cus_company_name, $cus_firstname, $cus_lastname, $cus_branch, $cus_tel, $cus_address, $cus_tax, $cus_email);
            $_SESSION['cus_branch_error'] = '';
            $_SESSION['cus_company_name_error'] = '';

            return $this->response->redirect(base_url('/public/Customer_show/customer_show_ajax'));
        }
    }
}

<?php

namespace App\Controllers;

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
        $_SESSION['menu'] = 'Customer_show';
        if (!isset($_SESSION['cus_branch_error']) || $_SESSION['cus_branch_error'] == '') {
            $_SESSION['cus_branch_error'] = '';
        }

        $this->output('v_customer_input');
    }

    /*
    * customer_insert
    * เพิ่มข้อมูลลูกค้า
    * @author  Kittipod
    * @Create Date 2564-08-05
    * @Update Date 2564-08-05
*/
    public function customer_insert()
    {
        $m_cus = new M_cdms_customer();
        $arr_customer = $m_cus->get_all();

        // เก็บข้อมูลของ ลูกค้า
        $cus_company_name = $this->request->getPost('cus_company_name');
        $cus_firstname = $this->request->getPost('cus_firstname');
        $cus_lastname = $this->request->getPost('cus_lastname');
        $cus_branch = $this->request->getPost('cus_branch');
        $cus_tel = $this->request->getPost('cus_tel');
        $cus_address = $this->request->getPost('cus_address');
        $cus_tax = $this->request->getPost('cus_tax');
        $cus_email = $this->request->getPost('cus_email');

        $arr_cus = $m_cus->is_cus_branch_exist($cus_company_name, $cus_branch);
        if (count($arr_cus) >= 1) {
            $_SESSION['cus_branch_error'] = 'มีสาขาอยู่แล้ว';
            $this->customer_input();
        } else {
            // เพิ่มข้อมูลลูกค้า
            $m_cus->insert($cus_company_name, $cus_firstname, $cus_lastname, $cus_branch, $cus_tel, $cus_address, $cus_tax, $cus_email);
            $_SESSION['cus_branch_error'] = '';

            return $this->response->redirect(base_url('/public/Customer_show/customer_show_ajax'));
        }
    }
}

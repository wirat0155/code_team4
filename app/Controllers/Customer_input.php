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
class Customer_input extends Cdms_controller {
    /*
    * customer_input
    * แสดงหน้าจอ customer_input
    * @input -
    * @output แสดงหน้าจอเพิ่มลูกค้า
    * @author  Kittipod
    * @Create Date 2564-08-05
    * @Update Date 2564-08-05
    */
    public function customer_input() {
        $_SESSION['menu'] = 'Customer_show';
        if (!isset($_SESSION['cus_branch_error']) || $_SESSION['cus_branch_error'] == '') {
            $_SESSION['cus_branch_error'] = '';
        }
        if (!isset($_SESSION['cus_company_name_error']) || $_SESSION['cus_company_name_error'] == '') {
            $_SESSION['cus_company_name_error'] = '';
        }

        $this->output('v_customer_input');
    }

    /*
    * customer_insert
    * เพิ่มข้อมูลลูกค้า
    * @input cus information
    * @output เพิ่มลูกค้า
    * @author  Kittipod
    * @Create Date 2564-08-05
    * @Update Date 2564-08-05
    */
    public function customer_insert() {
        
        // get post value from customer_input form
        $cus_company_name = $this->request->getPost('cus_company_name');
        $cus_firstname = $this->request->getPost('cus_firstname');
        $cus_lastname = $this->request->getPost('cus_lastname');
        $cus_branch = $this->request->getPost('cus_branch');
        $cus_tel = $this->request->getPost('cus_tel');
        $cus_address = $this->request->getPost('cus_address');
        $cus_tax = $this->request->getPost('cus_tax');
        $cus_email = $this->request->getPost('cus_email');

        // load customer model
        $m_cus = new M_cdms_customer();

        // get customer by cus_company_name & cus_branch
        $arr_customer = $m_cus->is_cus_branch_exist($cus_company_name);
        $count_cus = 0;
        
        // cout number of customer that duplicate cus_company_name & cus_branch
        for($i = 0; $i < count($arr_customer);$i++){
            if($arr_customer[$i]->cus_branch == $cus_branch){
                $count_cus++;
            }
        }
        
        // duplicate cus_company_name & cus_branch
        if ($count_cus >= 1) {

            // duplicate cus_compamny_name
            if($cus_branch == '') {
                $_SESSION['cus_company_name_error'] = 'The company has already used';
            }

            // duplicate cus_company_name & cus_branch
            else {
                $_SESSION['cus_branch_error'] = 'The branch has already used';
            }

            // if duplicate
            // then go to add customer page
            $this->customer_input();
            exit;
        }
        
        // not duplicate
        else {
            
            // insert the customer
            $m_cus->insert($cus_company_name, $cus_firstname, $cus_lastname, $cus_branch, $cus_tel, $cus_address, $cus_tax, $cus_email);

            // set '' to session error
            $_SESSION['cus_branch_error'] = '';
            $_SESSION['cus_company_name_error'] = '';

            // go to customer list page
            return $this->response->redirect(base_url('/Customer_show/customer_show_ajax'));
        }
    }
}

<?php

namespace App\Controllers;

use App\Models\M_cdms_customer;

/*
* Customer_input
* show customer input page, insert customer
* @author   Kittipod
* @Create Date  2564-08-05
*/
class Customer_input extends Cdms_controller {
    /*
    * customer_input
    * show customer input page
    * @input    -
    * @output   show customer input page
    * @author   Kittipod
    * @Create Date  2564-08-05
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
    * insert customer
    * @input    cus information
    * @output   insert customer
    * @author   Kittipod
    * @Create Date  2564-08-0 
    */
    public function customer_insert() {
        // load customer model
        $m_cus = new M_cdms_customer();

        // get customer information from customer input page
        $cus_company_name = $this->request->getPost('cus_company_name');
        $cus_firstname = $this->request->getPost('cus_firstname');
        $cus_lastname = $this->request->getPost('cus_lastname');
        $cus_branch = $this->request->getPost('cus_branch');
        $cus_tel = $this->request->getPost('cus_tel');
        $cus_address = $this->request->getPost('cus_address');
        $cus_tax = $this->request->getPost('cus_tax');
        $cus_email = $this->request->getPost('cus_email');


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
            // return to customer edit page
            $_SESSION['cus_company_name'] = $cus_company_name;
            $_SESSION['cus_firstname'] = $cus_firstname;
            $_SESSION['cus_lastname'] = $cus_lastname;
            $_SESSION['cus_branch'] = $cus_branch;
            $_SESSION['cus_tel'] = $cus_tel;
            $_SESSION['cus_address'] = $cus_address;
            $_SESSION['cus_tax'] = $cus_tax;
            $_SESSION['cus_email'] = $cus_email;

            $this->customer_input();
            exit(0);
        }
        
        // insert the customer
        $m_cus->insert($cus_company_name, $cus_firstname, $cus_lastname, $cus_branch, $cus_tel, $cus_address, $cus_tax, $cus_email);

        // set '' to session error
        $_SESSION['cus_branch_error'] = '';
        $_SESSION['cus_company_name_error'] = '';
        unset($_SESSION['cus_id']);
        unset($_SESSION['cus_company_name']);
        unset($_SESSION['cus_firstname']);
        unset($_SESSION['cus_lastname']);
        unset($_SESSION['cus_branch']);
        unset($_SESSION['cus_tel']);
        unset($_SESSION['cus_address']);
        unset($_SESSION['cus_tax']);
        unset($_SESSION['cus_email']);

        // go to customer list page
        return $this->response->redirect(base_url('/Customer_show/customer_show_ajax'));
    }
}

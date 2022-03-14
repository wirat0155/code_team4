<?php

namespace App\Controllers;

/*
* Customer_edit
* show customer edit page, update customer
* @author   Benjapon
* @Create Date  2564-08-06
*/
class Customer_edit extends Cdms_controller {
    /*
    * customer_edit
    * show customer edit page
    * @input    -
    * @output   show customer edit page
    * @author   Benjapon
    * @Create Date  2564-08-06
    */
    public function customer_edit($cus_id) {

        $_SESSION['menu'] = 'Customer_show';
        if (!isset($_SESSION['cus_branch_error']) || $_SESSION['cus_branch_error'] == '') {
            $_SESSION['cus_branch_error'] = '';
        }
        if (!isset($_SESSION['cus_company_name_error']) || $_SESSION['cus_company_name_error'] == '') {
            $_SESSION['cus_company_name_error'] = '';
        }

        $data['obj_customer'] = $this->m_cus->get_by_id($cus_id);
        $this->output('v_customer_edit', $data);
    }
    /*
    * customer_update
    * update customer information
    * @input    customer information
    * @output   update customer information
    * @author   Benjapon
    * @Create Date  2564-08-06
    */
    public function customer_update() {

        // get customer information from edit form
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

        // user change cus_company_name and cus_branch
        if (!($cus_company_name == $old_cus_company_name && $cus_branch == $old_cus_branch)) {
            $obj_customer = $this->m_cus->get_by_name($cus_company_name, $cus_branch);
            if (count($obj_customer)) {
                // duplicate by cus_company_name
                if ($cus_branch == '') {
                    $_SESSION['cus_company_name_error'] = 'The customer has already used';
                }
                // duplicate by cus_branch
                else {
                    $_SESSION['cus_branch_error'] = 'The branch has already used';
                }

                // return to customer edit page
                $_SESSION['cus_id'] = $cus_id;
                $_SESSION['cus_company_name'] = $cus_company_name;
                $_SESSION['old_cus_company_name'] = $old_cus_company_name;
                $_SESSION['cus_firstname'] = $cus_firstname;
                $_SESSION['cus_lastname'] = $cus_lastname;
                $_SESSION['cus_branch'] = $cus_branch;
                $_SESSION['old_cus_branch'] = $old_cus_branch;
                $_SESSION['cus_tel'] = $cus_tel;
                $_SESSION['cus_address'] = $cus_address;
                $_SESSION['cus_tax'] = $cus_tax;
                $_SESSION['cus_email'] = $cus_email;
                
                $this->customer_edit($cus_id);
                exit();
            }
        }

        // updating customer
        $this->m_cus->customer_update($cus_id, $cus_company_name, $cus_firstname, $cus_lastname, $cus_branch, $cus_tel, $cus_address, $cus_tax, $cus_email);
        $_SESSION['cus_branch_error'] = '';
        $_SESSION['cus_company_name_error'] = '';
        unset($_SESSION['cus_id']);
        unset($_SESSION['cus_company_name']);
        unset($_SESSION['old_cus_company_name']);
        unset($_SESSION['cus_firstname']);
        unset($_SESSION['cus_lastname']);
        unset($_SESSION['cus_branch']);
        unset($_SESSION['old_cus_branch']);
        unset($_SESSION['cus_tel']);
        unset($_SESSION['cus_address']);
        unset($_SESSION['cus_tax']);
        unset($_SESSION['cus_email']);

        return $this->response->redirect(base_url('/Customer_show/customer_show_ajax'));
    }
}

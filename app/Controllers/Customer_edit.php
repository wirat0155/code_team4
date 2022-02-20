<?php

namespace App\Controllers;

use App\Models\M_cdms_customer;

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
    public function customer_edit($cus_id = NULL, $data = []) {
        if (count($data) == 0) {
            // load customer model
            $m_cus = new M_cdms_customer;
            $data["obj_customer"] = $m_cus->get_by_id($cus_id);

            $data["cus_company_name_error"] = "";
            $data["cus_branch_error"] = "";
            $data["cus_id"] = $data["obj_customer"]->cus_id;
            $data["cus_company_name"] = $data["obj_customer"]->cus_company_name;
            $data["cus_firstname"] = $data["obj_customer"]->cus_firstname;
            $data["cus_lastname"] = $data["obj_customer"]->cus_lastname;
            $data["cus_branch"] = $data["obj_customer"]->cus_branch;
            $data["cus_tel"] = $data["obj_customer"]->cus_tel;
            $data["cus_address"] = $data["obj_customer"]->cus_address;
            $data["cus_tax"] = $data["obj_customer"]->cus_tax;
            $data["cus_email"] = $data["obj_customer"]->cus_email;
        }
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
        $cus_firstname = $this->request->getPost('cus_firstname');
        $cus_lastname = $this->request->getPost('cus_lastname');
        $cus_branch = $this->request->getPost('cus_branch');
        $cus_tel = $this->request->getPost('cus_tel');
        $cus_address = $this->request->getPost('cus_address');
        $cus_tax = $this->request->getPost('cus_tax');
        $cus_email = $this->request->getPost('cus_email');

        $data["cus_id"] = $cus_id;
        $data["cus_company_name"] = $cus_company_name;
        $data["cus_firstname"] = $cus_firstname;
        $data["cus_lastname"] = $cus_lastname;
        $data["cus_branch"] = $cus_branch;
        $data["cus_tel"] = $cus_tel;
        $data["cus_address"] = $cus_address;
        $data["cus_tax"] = $cus_tax;
        $data["cus_email"] = $cus_email;

        // get customer by cus_company_name & cus_branch
        $arr_customer = $this->get_by_company_name($cus_company_name);

        // user input customer branch
        if ($cus_branch != "") {
            if ($this->find_cus_branch_cus_id($arr_customer, $cus_branch, $cus_id)) {
                $data["cus_branch_error"] = 'The branch has already used';
                $this->customer_edit($cus_id, $data);
                exit(0);
            }
        }
        else {
            if ($this->find_cus_branch_cus_id($arr_customer, $cus_branch, $cus_id)) {
                $data["cus_company_name_error"] = 'The company has already used';
                $this->customer_edit($cus_id, $data);
                exit(0);
            }
        }

        $this->update_customer_to_db(
            $cus_id,
            $cus_company_name,
            $cus_firstname,
            $cus_lastname,
            $cus_branch,
            $cus_tel,
            $cus_address,
            $cus_tax,
            $cus_email);

        return $this->response->redirect(base_url('/Customer_show/customer_show_ajax'));
    }

    /*
    * get_by_company_name
    * get customer information by customer company name
    * @input     customer company name
    * @output   array of customer
    * @author   Wirat
    * @Create Date  2565-02-20
    */
    private function get_by_company_name($cus_company_name) {
        $m_cus = new M_cdms_customer();
        return $m_cus->get_by_company_name($cus_company_name);
    }

    /*
    * find_cus_branch_cus_id
    * find customer branch and id in array
    * @input     array of customer, customer branch, customer id
    * @output   true | false
    * @author   Wirat
    * @Create Date  2565-02-20
    */
    private function find_cus_branch_cus_id($arr_customer, $cus_branch, $cus_id) {
        $found_branch = false;
        $found_id = false;
        foreach ($arr_customer as $customer) {
            if ($customer->cus_branch == $cus_branch && $customer->cus_id == $cus_id) return false;
            if ($customer->cus_branch == $cus_branch) $found_branch = true;
            if ($customer->cus_id == $cus_id) $found_id = true;
        }
        return $found_branch && $found_id;
    }

    /*
    * update_customer_to_db
    * updating customer information in database
    * @input     customer information
    * @output   updating customer information
    * @author   Wirat
    * @Create Date  2565-02-20
    */
    private function update_customer_to_db(
        $cus_id,
        $cus_company_name,
        $cus_firstname,
        $cus_lastname,
        $cus_branch,
        $cus_tel,
        $cus_address,
        $cus_tax,
        $cus_email) {
        $m_cus = new M_cdms_customer();
        $m_cus->customer_update($cus_id, $cus_company_name, $cus_firstname, $cus_lastname, $cus_branch, $cus_tel, $cus_address, $cus_tax, $cus_email);
    }
}

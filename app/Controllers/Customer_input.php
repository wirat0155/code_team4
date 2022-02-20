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
    public function customer_input($data = []) {
        $_SESSION["menu"] = "Customer_show";
        
        if (count($data) == 0) {
            $data["cus_company_name_error"] = "";
            $data["cus_branch_error"] = "";
        }

        $this->output("v_customer_input", $data);
    }

    /*
    * customer_insert
    * insert customer
    * @input    cus information
    * @output   insert customer
    * @author   Kittipod
    * @Create Date  2564-08-10
    */
    public function customer_insert() {
        // get customer information from customer input page
        $cus_company_name = $this->request->getPost('cus_company_name');
        $cus_firstname = $this->request->getPost('cus_firstname');
        $cus_lastname = $this->request->getPost('cus_lastname');
        $cus_branch = $this->request->getPost('cus_branch');
        $cus_tel = $this->request->getPost('cus_tel');
        $cus_address = $this->request->getPost('cus_address');
        $cus_tax = $this->request->getPost('cus_tax');
        $cus_email = $this->request->getPost('cus_email');

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
            if ($this->find_cus_branch($arr_customer, $cus_branch)) {
                $data["cus_branch_error"] = 'The branch has already used';
                $this->customer_input($data);
                exit(0);
            }
        }
        else {
            if ($this->find_cus_branch($arr_customer, $cus_branch)) {
                $data["cus_company_name_error"] = 'The company has already used';
                $this->customer_input($data);
                exit(0);
            }
        }

        // insert the customer
        $this->insert_customer_to_db(
            $cus_company_name,
            $cus_firstname,
            $cus_lastname,
            $cus_branch,
            $cus_tel,
            $cus_address,
            $cus_tax,
            $cus_email);
        // go to customer list page
        return $this->response->redirect(base_url('/Customer_show/customer_show_ajax'));
        echo "insert";
    }

    /*
    * insert_customer_to_db
    * insert customer to database
    * @input     customer information
    * @output   insert customer to database
    * @author   Wirat
    * @Create Date  2565-02-20
    */
    public function insert_customer_to_db(
        $cus_company_name,
        $cus_firstname,
        $cus_lastname,
        $cus_branch,
        $cus_tel,
        $cus_address,
        $cus_tax,
        $cus_email) {
        $m_cus = new M_cdms_customer();
        $m_cus->insert($cus_company_name, $cus_firstname, $cus_lastname, $cus_branch, $cus_tel, $cus_address, $cus_tax, $cus_email);
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
    * find_cus_branch
    * find customer branch in array
    * @input     array of customer, customer branch
    * @output   true | false
    * @author   Wirat
    * @Create Date  2565-02-20
    */
    private function find_cus_branch($arr_customer, $cus_branch) {
        foreach ($arr_customer as $customer) {
            if ($customer->cus_branch == $cus_branch) return true;
        }
        return false;
    }
}

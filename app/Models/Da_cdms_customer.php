<?php

namespace App\Models;

use CodeIgniter\Model;

/*
* Da_cdms_customer_show
* insert update delete customer
* @author  Kittipod
* @Create Date  2564-07-29
*/
class Da_cdms_customer extends Model {
    protected $table = 'cdms_customer';
    protected $primaryKey = 'cus_id ';
    protected $allowedFields = [
        'cus_company_name', 'cus_firstname', 'cus_lastname', 'cus_branch',
        'cus_tel', 'cus_address', 'cus_status', 'cus_tax', 'cus_email'
    ];

    /*
    * delete
    * delete customer
    * @input    cus_id
    * @output   delete customer
    * @author   Benjapon
    * @Create Date  2564-07-29
    */
    public function delete($cus_id = NULL, bool $purge = false) {
        $sql = "UPDATE $this->table SET cus_status=2 WHERE cus_id='$cus_id'";
        $this->db->query($sql);
    }

    /*
    * insert
    * insert customer
    * @input    customer information
    * @output   insert customer
    * @author   Kittipod
    * @Create Date  2564-08-05
    */
    public function insert($cus_company_name = NULL, $cus_firstname = NULL, $cus_lastname = NULL, $cus_branch = NULL, $cus_tel = NULL, $cus_address = NULL, $cus_tax = NULL, $cus_email = NULL) {
        if ($cus_branch != '') {
            $sql = "INSERT INTO $this->table(cus_company_name, cus_firstname, cus_lastname, cus_branch,
            cus_tel, cus_address, cus_tax, cus_email)
            VALUES ('$cus_company_name','$cus_firstname','$cus_lastname','$cus_branch','$cus_tel','$cus_address','$cus_tax','$cus_email')";
        } else {
            $sql = "INSERT INTO $this->table(cus_company_name, cus_firstname, cus_lastname, cus_branch,
            cus_tel, cus_address, cus_tax, cus_email)
            VALUES ('$cus_company_name','$cus_firstname','$cus_lastname',NULL,'$cus_tel','$cus_address','$cus_tax','$cus_email')";
        }

        $this->db->query($sql);
    }

    /*
    * customer_update
    * update customer
    * @input    customer information
    * @output   update customer
    * @author   Benjapon
    * @Create Date  2564-08-06
    */
    public function customer_update($cus_id = NULL, $cus_company_name = NULL, $cus_firstname = NULL, $cus_lastname = NULL, $cus_branch = NULL, $cus_tel = NULL, $cus_address = NULL, $cus_tax = NULL, $cus_email = NULL) {
        $sql = "UPDATE $this->table SET cus_company_name='$cus_company_name',cus_firstname='$cus_firstname',cus_lastname='$cus_lastname',
    cus_branch='$cus_branch',cus_tel='$cus_tel',cus_address='$cus_address',cus_tax='$cus_tax',cus_email='$cus_email'
    WHERE cus_id='$cus_id' ";
        $this->db->query($sql);
    }
}

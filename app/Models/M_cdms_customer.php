<?php

namespace App\Models;

use App\Models\Da_cdms_customer;

/*
* M_cdms_customer_show
* get customer
* @author  วรรัตน์
* @Create Date 2564-07-29
* @Update Date 2564-10-13
*/
class M_cdms_customer extends Da_cdms_customer {
    /*
    * get_all
    * get all customer
    * @input
    * @output array of customer
    * @author Kittipod, Wirat
    * @Create Date 2564-07-30
    * @Update Date 2564-10-13
    */
    public function get_all($type = 1) {

        // Sort by cus_id descending
        if ($type == 1) {
            $sql = "SELECT * FROM $this->table
                    WHERE cus_status = 1
                    ORDER BY cus_id DESC";
        }
        // Sort by cus_company_name ascending
        else if ($type == 2) {
            $sql = "SELECT * FROM $this->table
                    WHERE cus_status = 1
                    ORDER BY CONVERT(cus_company_name USING tis620) ASC";
        }
        // get all customer with each number of service
        else if ($type == 3) {
            $sql = "SELECT cus_id, cus_company_name, cus_branch, cus_firstname, cus_lastname, cus_tel, cus_address, cus_tax, cus_email, 
                    COUNT(ser_id) AS num_service FROM $this->table
                    LEFT JOIN `cdms_service` ON cus_id = ser_cus_id
                    WHERE cus_status = 1 GROUP BY cus_id ORDER BY cus_id DESC";
        }
        
        // return as array
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_by_id
    * get customer by cus_id
    * @input cus_id
    * @output array of customer
    * @author Benjapon
    * @Create Date 2564-08-02
    * @Update Date 2564-08-02
    */
    public function get_by_id($cus_id) {
        $sql = "SELECT * FROM $this->table

                WHERE cus_id='$cus_id'";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_by_name
    * get customer by cus_company_name
    * @input cus_company_name, cus_branch
    * @output array of customer
    * @author Nathadanai, Kittipod
    * @Create Date 2564-08-08
    * @Update Date 2564-08-08
    */
    public function get_by_name($cus_company_name, $cus_branch) {
        if ($cus_branch == '') {
            $sql = "SELECT * FROM $this->table
                    WHERE cus_company_name = '$cus_company_name'";
        } else {
            $sql = "SELECT * FROM $this->table
                    WHERE cus_company_name = '$cus_company_name' AND cus_branch = '$cus_branch'";
        }
        
        // return as array
        return $this->db->query($sql)->getResult();
    }

    /*
    * is_cus_branch_exist
    * search customer by cus_branch
    * @input cus_company_name
    * @output cus_company_name cus_branch or null
    * @author Kittipod
    * @Create Date 2564-08-18
    * @Update Date 2564-08-18
    */
    public function is_cus_branch_exist($cus_company_name = NULL) {
        $sql = "SELECT cus_id , cus_company_name, cus_branch FROM $this->table WHERE cus_company_name = '$cus_company_name'";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_by_date
    * search customer that use service in date
    * @input start_date end_date
    * @output Customer and Servive or null
    * @author Kittipod
    * @Create Date 2564-09-10
    * @Update Date 2564-09-10
    */
    public function get_by_date($start_date = NULL, $end_date = NULL) {
        $sql = "SELECT * FROM $this->table
                LEFT JOIN cdms_service
                on cus_id = ser_cus_id
                WHERE ser_status = 1
                AND ser_departure_date BETWEEN '$start_date' AND '$end_date'
                GROUP BY cus_id
                ORDER BY cus_id DESC";
        return $this->db->query($sql)->getResult();
    }
}

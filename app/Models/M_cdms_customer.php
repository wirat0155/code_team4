<?php

namespace App\Models;

use App\Models\Da_cdms_customer;

/*
* M_cdms_customer_show
* ดึงข้อมูลลูกค้า
* @author  วรรัตน์
* @Create Date 2564-07-29
* @Update Date 2564-08-13
*/
class M_cdms_customer extends Da_cdms_customer {
    /*
    * get_all
    * ดึงข้อมูล ชื่อบริษัท สาขา ผู้รับผิดชอบ จำนวนตู้ที่กำลังใช้ เบอร์โทรศัพท์ สถานะ และอีเมล
    * @input
    * @output array of customer
    * @author Kittipod
    * @Create Date 2564-07-30
    * @Update Date 2564-08-02
    */
    public function get_all() {
        $sql = "SELECT * FROM $this->table
                WHERE cus_status = 1";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_by_id
    * ค้นหาลูกค้าด้วย ID
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
    * ค้นหาลูกค้าด้วยชื่อ
    * @input cus_company_name, cus_branch
    * @output array of customer
    * @author Nathadanai, Kittipod
    * @Create Date 2564-08-08
    * @Update Date 2564-08-08
    */
    public function get_by_name($cus_company_name, $cus_branch) {
        if ($cus_branch == '') {
            $sql = "SELECT * FROM $this->table
                WHERE cus_company_name='$cus_company_name' AND cus_branch IS NULL";
        } else {
            $sql = "SELECT * FROM $this->table
                WHERE cus_company_name='$cus_company_name' AND cus_branch='$cus_branch'";
        }
        return $this->db->query($sql)->getResult();
    }

    /*
    * is_cus_branch_exist
    * ค้นหาชื่อ
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
}
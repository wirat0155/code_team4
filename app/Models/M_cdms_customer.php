<?php

namespace App\Models;

use App\Models\Da_cdms_customer;

/*
    * M_cdms_customer_show
    * แสดงรายการลูกค้า และลบลูกค้า
    * @author  XXXX
    * @Create Date 2564-07-29
    * @Update Date 2564-08-02
*/

class M_cdms_customer extends Da_cdms_customer
{
    /*
        * get_all
        * ดึงข้อมูล ชื่อบริษัท สาขา ผู้รับผิดชอบ จำนวนตู้ที่กำลังใช้ เบอร์โทรศัพท์ สถานะ และอีเมล
        * @input
        * @output array of customer
        * @author  XXXX
        * @Create Date 2564-07-30
        * @Update Date 2564-08-02
    */
    public function get_all()
    {
        $sql = "SELECT * FROM $this->table
                WHERE cus_status = 1";
        return $this->db->query($sql)->getResult();
    }
    public function get_by_id($cus_id)
    {
        $sql = "SELECT * FROM $this->table
            
                WHERE cus_id='$cus_id'";
        return $this->db->query($sql)->getResult();
    }

    public function get_by_name($cus_company_name, $cus_branch)
    {
        if ($cus_branch == '') {
            $sql = "SELECT * FROM $this->table
                WHERE cus_company_name='$cus_company_name' AND cus_branch IS NULL";
        } else {
            $sql = "SELECT * FROM $this->table
                WHERE cus_company_name='$cus_company_name' AND cus_branch='$cus_branch'";
        }
        return $this->db->query($sql)->getResult();
    }
}

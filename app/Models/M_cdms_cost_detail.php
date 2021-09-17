<?php

namespace App\Models;

use App\Models\Da_cdms_cost_detail;

/*
* M_cdms_cost_detail
* ดึงข้อมูลค่าใช้จ่าย
* @author Nattdanai
* @Create Date 2564-09-16
* @Update Date 2564-09-17
*/
class M_cdms_cost_detail extends Da_cdms_cost_detail
{

    /*
    * get_by_ser_id
    * ดึงข้อมูลค่าใช้จ่ายของบริการ
    * @input ser_id
    * @output array of cosd
    * @author Nattdanai
    * @Create Date 2564-09-16
    * @Update Date 2564-09-16
    */
    public function get_by_ser_id($ser_id){
        $sql = "SELECT * FROM $this->table  
                WHERE cosd_ser_id='$ser_id' and cosd_status=1
                ORDER BY cosd_id DESC";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_by_id
    * ดึงข้อมูลค่าใช้จ่ายตาม id
    * @input cosd_id
    * @output array of cosd
    * @author Nattdanai
    * @Create Date 2564-09-16
    * @Update Date 2564-09-16
    */
    public function get_by_id($cosd_id) {
        $sql = "SELECT * FROM $this->table  
                WHERE cosd_id='$cosd_id' and cosd_status=1
                ORDER BY cosd_id DESC";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_last
    *ดึงข้อมูลค่าใช้จ่าย รายการล่าสุด
    * @input -
    * @output array of cosd
    * @author Nattdanai
    * @Create Date 2564-09-17
    * @Update Date 2564-09-17
    */
    public function get_last() {
        $sql = "SELECT * FROM $this->table ORDER BY cosd_id DESC LIMIT 1";
        return $this->db->query($sql)->getResult();
    }
}

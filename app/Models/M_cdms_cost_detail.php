<?php

namespace App\Models;

use App\Models\Da_cdms_cost_detail;

/*
* M_cdms_cost_detail
* ดึงข้อมูลตู้คอนเทนเนอร์
* @author Wirat
* @Create Date 2564-07-29
* @Update Date 2564-08-07
*/

class M_cdms_cost_detail extends Da_cdms_cost_detail
{

    /*
    * get_all
    * ดึงข้อมูลตู้คอนเทนเนอร์ทั้งหมด
    * @input - 
    * @output array of container
    * @author Wirat
    * @Create Date 2564-07-29
    * @Update Date
    */
    public function get_by_ser_id($ser_id)
    {
        $sql = "SELECT * FROM $this->table  
                WHERE cosd_ser_id='$ser_id' and cosd_status=1
                ORDER BY cosd_id DESC";
        return $this->db->query($sql)->getResult();
    }
    public function get_by_id($cosd_id)
    {
        $sql = "SELECT * FROM $this->table  
                WHERE cosd_id='$cosd_id' and cosd_status=1
                ORDER BY cosd_id DESC";
        return $this->db->query($sql)->getResult();
    }
    public function get_last() {
        $sql = "SELECT * FROM $this->table ORDER BY cosd_id DESC LIMIT 1";
        return $this->db->query($sql)->getResult();
    }
}

<?php

namespace App\Models;

use App\Models\Da_cdms_status_container;

/*
* M_cdms_status_container
* ดึงข้อมูลสถานะตู้
* @author Wirat
* @Create Date 2564-08-06
* @Update Date 2564-08-06
*/
class M_cdms_status_container extends Da_cdms_status_container {
    /*
    * get_all
    * ดึงข้อมูลสถานะตู้ทั้งหมด
    * @input  -
    * @output array of status_container
    * @author Wirat
    * @Create Date 2564-08-06
    * @Update Date 2564-08-06
    */
    public function get_all() {
        $sql = "SELECT stac_id, stac_name FROM $this->table WHERE stac_status = 1";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_by_id
    * ดึงข้อมูลสถานะตู้คอนเทนเนอร์ตาม id
    * @input  stac_id
    * @output ข้อมูลสถานะตู้คอนเทนเนอร์
    * @author Taddsawan
    * @Create Date 2564-08-13
    * @Update Date 2564-08-13
    */
    public function get_by_id($stac_id) {
        $sql = "SELECT * FROM $this->table

                WHERE stac_id='$stac_id'";
        return $this->db->query($sql)->getResult();
    }
}
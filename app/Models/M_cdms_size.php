<?php

namespace App\Models;

use App\Models\Da_cdms_size;
/*
* M_cdms_size
* ดึงข้อมูลขนาดตู้
* @author Wirat
* @Create Date 2564-08-06
* @Update Date 2564-08-07
*/

class M_cdms_size extends Da_cdms_size {
    /*
    * get_all
    * ดึงข้อมูลขนาดตู้ทั้งหมด
    * @input  -
    * @output array of size
    * @author Wirat
    * @Create Date 2564-08-06
    * @Update Date 2564-08-06
    */
    public function get_all() {
        $sql = "SELECT * FROM $this->table WHERE size_status = 1 ORDER BY size_id DESC";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_first
    * ดึงข้อมูลขนาดตู้แรก
    * @input  -
    * @output first size information
    * @author Wirat
    * @Create Date 2564-08-06
    * @Update Date 2564-08-06
    */
    public function get_first() {
        $sql = "SELECT * FROM $this->table ORDER BY size_id ASC LIMIT 1";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_last
    * ดึงข้อมูลขนาดตู้ล่าสุด
    * @input  -
    * @output last size information
    * @author Wirat
    * @Create Date 2564-09-10
    * @Update Date 2564-09-10
    */
    public function get_last() {
        $sql = "SELECT * FROM $this->table ORDER BY size_id DESC LIMIT 1";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_by_id
    * ดึงข้อมูลขนาดตู้ตาม id
    * @input  size_id
    * @output size information
    * @author Wirat
    * @Create Date 2564-08-06
    * @Update Date 2564-08-06
    */
    public function get_by_id($size_id) {
        $sql = "SELECT * FROM $this->table WHERE size_id = '$size_id'";
        return $this->db->query($sql)->getResult();
    }
}

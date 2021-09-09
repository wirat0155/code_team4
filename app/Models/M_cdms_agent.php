<?php

namespace App\Models;

use App\Models\Da_cdms_agent;
/*
        * M_cdms_agent
        * นำเข้าข้อมูลรายชื่อเอเย่นต์
        * @author Klayuth
        * @Create Date 2564-07-30
        * @Update Date 2564-08-07
    */

class M_cdms_agent extends Da_cdms_agent {
    /*
        * get_all
        * ดึงข้อมูลเอเย่นต์
        * @input
        * @output array of agent
        * @author Klayuth
        * @Create Date 2564-07-30
        * @Update Date 2564-08-02
    */
    public function get_all() {
        $sql = "SELECT * FROM $this->table
                WHERE agn_status = 1
                ORDER BY agn_id DESC" ;
        return $this->db->query($sql)->getResult();
    }
    /*
        * get_by_id
        * ดึงข้อมูลจากไอดีเอเย่นต์ 
        * @input ไอดีเอเย่นต์
        * @output ข้อมูลของไอดีเอเย่นต์ที่นำเข้า
        * @author Klayuth
        * @Create Date 2564-07-30
        * @Update Date 2564-08-02
    */
    public function get_by_id($agn_id) {
        $sql = "SELECT * FROM $this->table
                WHERE agn_id='$agn_id'";
        return $this->db->query($sql)->getResult();
    }

    /*
        * get_by_company_name
        * ดึงข้อมูลเอเย่นต์จากชื่อบริษัท 
        * @input  agn_company_name
        * @output agent information
        * @author Wirat
        * @Create Date 2564-08-07
        * @Update Date 2564-08-07
    */
    public function get_by_company_name($agn_company_name = NULL) {
        $sql = "SELECT * FROM $this->table WHERE agn_company_name = '$agn_company_name' AND agn_status = 1";
        return $this->db->query($sql)->getResult();
    }

    /*
        * get_max_id
        * ดึงไอดีที่มากที่สุด
        * @input  -
        * @output max agn_id
        * @author Wirat
        * @Create Date 2564-08-07
        * @Update Date 2564-08-07
    */
    public function get_max_id() {
        $sql = "SELECT MAX(agn_id) AS agn_id FROM $this->table";
        return $this->db->query($sql)->getResult();
    }
}

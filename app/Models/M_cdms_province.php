<?php
namespace App\Models;
use App\Models\Da_cdms_province;

/*
    * M_cdms_province
    * ดึงข้อมูลจังหวัด
    * @author Tadsawan
    * @Create Date 2564-08-09
    * @Update Date 2564-08-09
*/
class M_cdms_province extends Da_cdms_province {

    /*
        * get_all
        * ดึงข้อมูลจังหวัดทั้งหมด
        * @input  -
        * @output array of car_type
        * @author Tadsawan
        * @Create Date 2564-08-09
        * @Update Date 2564-08-09
    */
    public function get_all() {
        $sql = "SELECT * FROM $this->table";
        return $this->db->query($sql)->getResult();
    }   
}
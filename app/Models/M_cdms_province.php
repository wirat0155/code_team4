<?php
namespace App\Models;
use App\Models\Da_cdms_province;

/*
* M_cdms_province
* ดึงข้อมูลจังหวัด
* @author Tadsawan
* @Create Date 2564-08-09
* @Update Date 2564-09-17
*/
class M_cdms_province extends Da_cdms_province {

    /*
    * get_all
    * ดึงข้อมูลจังหวัดทั้งหมด
    * @input  -
    * @output array of car_type
    * @author Tadsawan
    * @Create Date 2564-08-09
    * @Update Date 2564-09-17
    */
    public function get_all() {
        $sql = "SELECT * FROM $this->table ORDER BY CONVERT (prov_name USING tis620) ASC";
        return $this->db->query($sql)->getResult();
    }   
}
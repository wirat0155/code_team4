<?php
namespace App\Models;
use App\Models\Da_cdms_car_type;

/*
    * M_cdms_car_type
    * ดึงข้อมูลประเภทรถ
    * @author Wirat
    * @Create Date 2564-07-28
    * @Update Date 2564-08-12
*/
class M_cdms_car_type extends Da_cdms_car_type {
    // M get_all get_by_id

    /*
        * get_all
        * ดึงข้อมูลประเภทรถทั้งหมด
        * @input  -
        * @output array of car_type
        * @author Wirat
        * @Create Date 2564-07-28
        * @Update Date 2564-08-12
    */
    public function get_all() {
        $sql = "SELECT * FROM $this->table WHERE cart_status = 1";
        return $this->db->query($sql)->getResult();
    }   
}

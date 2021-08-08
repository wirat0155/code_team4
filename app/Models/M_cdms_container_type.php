<?php
namespace App\Models;
use App\Models\Da_cdms_container_type;

/*
    * M_cdms_container_type
    * ดึงข้อมูลประเภทตู้คอนเทนเนอร์
    * @author Wirat
    * @Create Date 2564-08-06
    * @Update Date 2564-08-06
*/
class M_cdms_container_type extends Da_cdms_container_type {
    // M get_all get_by_id

    /*
        * get_all
        * ดึงข้อมูลประเภทตู้คอนเทนเนอร์ทั้งหมด
        * @input  -
        * @output array of container_type
        * @author Wirat
        * @Create Date 2564-08-06
        * @Update Date 2564-08-06
    */
    public function get_all() {
        $sql = "SELECT cont_id, cont_name FROM $this->table WHERE cont_status = 1";
        return $this->db->query($sql)->getResult();
    }
}



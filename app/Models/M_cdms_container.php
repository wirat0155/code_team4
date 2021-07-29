<?php
namespace App\Models;
use App\Models\Da_cdms_container;

/*
* M_cdms_container
* ดึงข้อมูลตู้คอนเทนเนอร์
* @author Wirat
* @Create Date 2564-07-29
* @Update Date
*/
class M_cdms_container extends Da_cdms_container {
    
    /*
    * get_all
    * ดึงข้อมูลตู้คอนเทนเนอร์ทั้งหมด
    * @input
    * @output array of container
    * @author Wirat
    * @Create Date 2564-07-29
    * @Update Date
    */
    public function get_all()
    {
        $sql = "SELECT * FROM $this->table WHERE con_status=1";
        return $this->db->query($sql)->getResult();
    }   
}

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
        $sql = "SELECT * FROM $this->table LEFT JOIN cdms_size ON con_size_id = size_id LEFT JOIN cdms_container_type ON con_cont_id = cont_id LEFT JOIN cdms_agent ON con_agn_id = agn_id LEFT JOIN cdms_status_container ON con_stac_id = stac_id WHERE con_status=1";
        return $this->db->query($sql)->getResult();
    }   
}

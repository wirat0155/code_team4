<?php
namespace App\Models;
use App\Models\Da_cdms_container;

/*
* M_cdms_container
* ดึงข้อมูลตู้คอนเทนเนอร์
* @author Wirat
* @Create Date 2564-07-29
* @Update Date 2564-08-07
*/
class M_cdms_container extends Da_cdms_container {
    
    /*
    * get_all
    * ดึงข้อมูลตู้คอนเทนเนอร์ทั้งหมด
    * @input - 
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

    /*
    * is_con_number_exist
    * ค้นหาหมายเลขตู้คอนเทนเนอร์
    * @input con_number
    * @output con_number or null
    * @author Wirat
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
    */
    public function is_con_number_exist($con_number = NULL) {
        $sql = "SELECT con_number FROM $this->table WHERE con_number = '$con_number'";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_by_con_number
    * ดึงข้อมูลตามหมายเลขตู้
    * @input con_number
    * @output container information
    * @author Wirat
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
    */
    public function get_by_con_number($con_number) {
        $sql = "SELECT * FROM $this->table WHERE con_number = '$con_number'";
        return $this->db->query($sql)->getResult();
    }
}

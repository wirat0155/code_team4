<?php
namespace App\Models;
use App\Models\Da_cdms_driver;

/*
* M_cdms_driver
* ดึงข้อมูลพนักงานขับรถ
* @author Thaanatip
* @Create Date 2564-07-30
* @Update Date
*/

class M_cdms_driver extends Da_cdms_driver {

    /*
    * get_all
    * ดึงข้อมูลพนักงานขับรถทั้งหมด
    * @input -
    * @output array of driver
    * @author Thanatip
    * @Create Date 2564-07-30
    * @Update Date
    */
    public function get_all()
    {
        $sql = "SELECT * FROM $this->table 
                LEFT JOIN cdms_car_type 
                ON dri_car_id = cart_id
                WHERE dri_status = 1";
        return $this->db->query($sql)->getResult();
    }   

    // public function get_by_id($dri_id){
    //     $sql = "SELECT * FROM $this->table
    //             on dri_id
    //             WHERE dri_id";
    //      return $this->db->query($sql)->getResult();
    // }

}
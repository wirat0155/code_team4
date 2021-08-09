<?php
namespace App\Models;
use App\Models\Da_cdms_driver;

/*
* M_cdms_driver
* ดึงข้อมูลพนักงานขับรถ
* @author Thanatip
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
    * @lastest author Wirat
    * @Create Date 2564-07-30
    * @Update Date 2564-08-30
    */
    public function get_all()
    {
        $sql = "SELECT * FROM cdms_driver 
                LEFT JOIN cdms_car 
                ON dri_car_id = car_id 
                LEFT JOIN cdms_car_type 
                ON cart_id = car_cart_id
                WHERE NOT dri_status = 4";
        return $this->db->query($sql)->getResult();
    }   

    public function get_by_id($dri_id){
        $sql = "SELECT * FROM $this->table
                WHERE dri_id='$dri_id'";
        return $this->db->query($sql)->getResult();
    }

}
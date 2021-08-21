<?php

namespace App\Models;

use App\Models\Da_cdms_car;

/*
* M_cdms_container
* ดึงข้อมูลรถ
* @author Nattanan Tadsawan
* @Create Date 2564-07-30
* @Update Date
*/

class M_cdms_car extends Da_cdms_car {
    /*
    * get_all
    * ดึงข้อมูลรถทั้งหมด
    * @input -
    * @output array of car
    * @author Nattanan Tadsawan
    * @Create Date 2564-07-30
    * @Update Date
    */
    public function get_all() {
        $sql = "SELECT *
        FROM $this->table
        LEFT JOIN cdms_province
        ON car_prov_id = prov_id

        LEFT JOIN cdms_car_type 
        ON car_cart_id = cart_id
        WHERE NOT car_status = 4";
        return $this->db->query($sql)->getResult();
    }

    public function get_by_id($car_id) {
        $sql = "SELECT * FROM $this->table

                WHERE car_id='$car_id'";
        return $this->db->query($sql)->getResult();
    }
}

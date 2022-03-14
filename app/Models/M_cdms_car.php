<?php

namespace App\Models;

use App\Models\Da_cdms_car;

/*
* M_cdms_car
* get car
* @author   Nattanan, Tadsawan
* @Create Date  2564-07-30
*/
class M_cdms_car extends Da_cdms_car {

    /*
    * get_all
    * get all car
    * @input    -
    * @output   array of car
    * @author   Nattanan, Tadsawan
    * @Create Date  2564-07-30
    */
    public function get_all() {
        $sql = "SELECT *
        FROM $this->table
        LEFT JOIN cdms_province
        ON car_prov_id = prov_id

        LEFT JOIN cdms_car_type
        ON car_cart_id = cart_id
        WHERE NOT car_status = 4
        ORDER BY car_id DESC" ;

        // return as array
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_by_id
    * get car by car_id
    * @input    car_id
    * @output   car_information
    * @author   Nattanan
    * @Create Date  2564-07-30
    */
    public function get_by_id($car_id) {
        $sql = "SELECT * FROM $this->table
                LEFT JOIN `cdms_province` ON car_prov_id = prov_id
                LEFT JOIN `cdms_car_type` ON car_cart_id = cart_id
                WHERE car_id = '$car_id'";

        // return as array
        return $this->db->query($sql)->getRow();
    }
}

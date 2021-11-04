<?php
namespace App\Models;
use App\Models\Da_cdms_car_type;

/*
* M_cdms_car_type
* get cat type
* @author Wirat
* @Create Date 2564-07-28
* @Update Date 2564-09-10
*/
class M_cdms_car_type extends Da_cdms_car_type {

    /*
    * get_all
    * get all car type
    * @input  -
    * @output array of car_type
    * @author Wirat
    * @Create Date 2564-07-28
    * @Update Date 2564-08-12
    */
    public function get_all() {
        $sql = "SELECT * FROM $this->table WHERE cart_status = 1 ORDER BY cart_id DESC";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_last
    * get last car type
    * @input -
    * @output cart information
    * @author Wirat
    * @Create Date 2564-09-10
    * @Update Date 2564-09-10
    */
    public function get_last() {
        $sql = "SELECT * FROM $this->table ORDER BY cart_id DESC LIMIT 1";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_all_status
    * get all car type all status
    * @input  -
    * @output array of car type
    * @author Tadsawan
    * @Create Date 2564-10-23
    * @Update Date 2564-10-23
    */
    public function get_all_status() {
        $sql = "SELECT * FROM $this->table ORDER BY cart_id DESC";
        return $this->db->query($sql)->getResult();
    }
}

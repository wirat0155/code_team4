<?php

namespace App\Models;

use App\Models\Da_cdms_size;
/*
* M_cdms_size
* get size
* @author   Wirat
* @Create Date  2564-08-06
*/
class M_cdms_size extends Da_cdms_size {
    /*
    * get_all
    * get all size
    * @input    -
    * @output   array of size
    * @author   Wirat
    * @Create Date  2564-08-06
    */
    public function get_all() {
        $sql = "SELECT * FROM $this->table WHERE size_status = 1 ORDER BY size_id DESC";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_first
    * get first size information
    * @input    -
    * @output   first size information
    * @author   Wirat
    * @Create Date  2564-08-06
    */
    public function get_first() {
        $sql = "SELECT * FROM $this->table ORDER BY size_id ASC LIMIT 1";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_last
    * get last size information
    * @input    -
    * @output   last size information
    * @author   Wirat
    * @Create Date  2564-09-10
    */
    public function get_last() {
        $sql = "SELECT * FROM $this->table ORDER BY size_id DESC LIMIT 1";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_by_id
    * get size by size_id
    * @input    size_id
    * @output   size information
    * @author   Wirat
    * @Create Date  2564-08-06
    */
    public function get_by_id($size_id) {
        $sql = "SELECT * FROM $this->table WHERE size_id = '$size_id'";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_all_status
    * get size that all status
    * @input    -
    * @output   array of size
    * @author   Tadsawan
    * @Create Date  2564-10-22
    */
    public function get_all_status() {
        $sql = "SELECT * FROM $this->table WHERE size_status != 3 ORDER BY size_id DESC";
        return $this->db->query($sql)->getResult();
    }
}
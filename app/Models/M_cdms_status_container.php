<?php

namespace App\Models;

use App\Models\Da_cdms_status_container;

/*
* M_cdms_status_container
* get status container
* @author   Wirat
* @Create Date  2564-08-06
*/
class M_cdms_status_container extends Da_cdms_status_container {
    /*
    * get_all
    * get all status container
    * @input    -
    * @output   array of status container
    * @author   Wirat
    * @Create Date  2564-08-06
    */
    public function get_all() {
        $sql = "SELECT stac_id, stac_name FROM $this->table WHERE stac_status = 1 ORDER BY stac_id DESC";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_by_id
    * get status container information
    * @input    stac_id
    * @output   status container information
    * @author   Taddsawan
    * @Create Date  2564-08-13
    */
    public function get_by_id($stac_id) {
        $sql = "SELECT * FROM $this->table WHERE stac_id = '$stac_id'";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_last
    * get last status container information
    * @input    -
    * @output   status container information
    * @author   Wirat
    * @Create Date  2564-09-10
    */
    public function get_last() {
        $sql = "SELECT * FROM $this->table ORDER BY stac_id DESC LIMIT 1";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_all_status
    * get all status container all status
    * @input    -
    * @output   array of status container
    * @author   Tadsawan
    * @Create Date  2564-10-22
    */
    public function get_all_status() {
        $sql = "SELECT * FROM $this->table WHERE stac_status != 3 ORDER BY stac_id DESC";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_all_status_damaged
    * get all container damaged
    * @input    -
    * @output   array of container damaged
    * @author   Benjapon
    * @Create Date  2564-10-22
    */
    public function get_all_status_damaged($stac_id) {
        $sql = "SELECT * FROM $this->table WHERE stac_id = 5 OR stac_id = 6";
        return $this->db->query($sql)->getResult();
    }
}
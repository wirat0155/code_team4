<?php
namespace App\Models;
use App\Models\Da_cdms_status_container_log;

/*
* M_cdms_status_container_log
* manage changing status container log
* @author   Wirat
* @Create Date  2564-11-14
*/
class M_cdms_status_container_log extends Da_cdms_status_container_log {
    public function get_all() {
        // code
    }
    public function get_by_id($scl_id = '') {
        // code
    }
    
    /*
    * get_max_by_scl_ser_id
    * get latest changing status contianer log by scl_ser_id
    * @Input    scl_ser_id
    * @Output   scl_stac_id
    * @author   Wirat
    * @Create Date  2564-11-14
    */
    public function get_max_by_scl_ser_id($scl_ser_id = '') {
        $sql = "SELECT scl_stac_id FROM $this->table WHERE scl_ser_id = '$scl_ser_id' ORDER BY scl_id DESC LIMIT 1";

        // return as object
        return $this->db->query($sql)->getRow();;
    }
}

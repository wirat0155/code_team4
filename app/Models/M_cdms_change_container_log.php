<?php

namespace App\Models;
use App\Models\Da_cdms_change_container_log;

/*
* M_cdms_change_container_log
* get change container log
* @author   Wirat
* @Create Date  2564-12-07
*/
class M_cdms_change_container_log extends Da_cdms_change_container_log {
    /*
    * get_by_ser_id
    * search next change container line
    * @input    chl_old_ser_id
    * @output   object of change container
    * @author   Wirat
    * @Create Date  2564-12-07
    */
    public function get_next_ser_id($chl_old_ser_id = NULL) {
        $sql = "SELECT chl_old_ser_id, chl_new_ser_id, chl_date, con_number  FROM $this->table
                LEFT JOIN cdms_service ON ser_id = chl_new_ser_id
                LEFT JOIN cdms_container ON con_id = ser_con_id
                WHERE chl_old_ser_id = '$chl_old_ser_id' LIMIT 1";
        return $this->db->query($sql)->getRow();
    }

    /*
    * get_prev_ser_id
    * search prev change container line
    * @input    chl_old_ser_id
    * @output   object of change container
    * @author   Wirat
    * @Create Date  2564-12-07
    */
    public function get_prev_ser_id($chl_new_ser_id = NULL) {
        $sql = "SELECT chl_old_ser_id, chl_new_ser_id, chl_date, con_number FROM $this->table
                LEFT JOIN cdms_service ON ser_id = chl_old_ser_id
                LEFT JOIN cdms_container ON con_id = ser_con_id
                WHERE chl_new_ser_id = '$chl_new_ser_id' LIMIT 1";
        return $this->db->query($sql)->getRow();
    }
}

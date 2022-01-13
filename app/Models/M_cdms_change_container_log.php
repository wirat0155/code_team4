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
        $sql = "SELECT chl_old_ser_id, chl_new_ser_id, chl_date, con_number, user_id, user_name_th FROM $this->table
                LEFT JOIN cdms_service ON ser_id = chl_new_ser_id
                LEFT JOIN cdms_container ON con_id = ser_con_id
                LEFT JOIN cdms_user ON user_id = chl_user_id
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
        $sql = "SELECT chl_old_ser_id, chl_new_ser_id, chl_date, con_number, user_id, user_name_th FROM $this->table
                LEFT JOIN cdms_service ON ser_id = chl_old_ser_id
                LEFT JOIN cdms_container ON con_id = ser_con_id
                LEFT JOIN cdms_user ON user_id = chl_user_id
                WHERE chl_new_ser_id = '$chl_new_ser_id' LIMIT 1";
        return $this->db->query($sql)->getRow();
    }

    public function get_history_all() {
        $sql = "SELECT table1.con_number AS old_con_number, table2.con_number AS new_con_number, table1.chl_date ,table1.ser_id AS old_ser_id,table2.ser_id AS new_ser_id, table1.user_name_th AS user_name_th
        FROM
        (SELECT * FROM cdms_change_container_log
        LEFT JOIN cdms_service ON chl_old_ser_id = ser_id
        LEFT JOIN cdms_container ON ser_con_id = con_id
        LEFT JOIN cdms_user ON chl_user_id = user_id) AS table1
        LEFT JOIN
        (SELECT * FROM cdms_change_container_log
        LEFT JOIN cdms_service ON chl_new_ser_id = ser_id
        LEFT JOIN cdms_container ON ser_con_id = con_id) AS table2
        
        ON table1.chl_id = table2.chl_id;";
        return $this->db->query($sql)->getResult();
    }
    public function get_chl_new_ser_id() {
        $sql = "SELECT chl_new_ser_id FROM cdms_change_container_log";
        return $this->db->query($sql)->getResult();
    }
    public function get_chl_old_ser_id() {
        $sql = "SELECT chl_old_ser_id FROM cdms_change_container_log";
        return $this->db->query($sql)->getResult();
    }


}
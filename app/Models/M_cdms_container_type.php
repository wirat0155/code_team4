<?php

namespace App\Models;

use App\Models\Da_cdms_container_type;

/*
* M_cdms_container_type
* get container type
* @author Wirat
* @Create Date 2564-08-06
* @Update Date 2564-09-10
*/

class M_cdms_container_type extends Da_cdms_container_type {

    /*
    * get_all
    * get container type
    * @input  -
    * @output array of container type
    * @author Wirat
    * @Create Date 2564-08-06
    * @Update Date 2564-08-06
    */
    public function get_all($type = 1) {
        if($type == 1){
            $sql = "SELECT cont_id, cont_name FROM $this->table WHERE cont_status = 1 ORDER BY cont_id DESC";
        }else if($type == 2){
            $sql = "SELECT cont_id, cont_name FROM $this->table ORDER BY cont_id DESC";
        }
        return $this->db->query($sql)->getResult();
    }

     /*
    * get_all_type
    * get all container
    * @input  -
    * @output array of container type
    * @author Tadsawan
    * @Create Date 2564-10-04
    * @Update Date 2564-10-04
    */
    public function get_all_type() {
        $sql = "SELECT * FROM $this->table ORDER BY cont_id DESC";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_by_id
    * get container type by cont_id
    * @input  cont_id
    * @output container type information
    * @author Wirat
    * @Create Date 2564-08-06
    * @Update Date 2564-08-06
    */
    public function get_by_id($cont_id) {
        $sql = "SELECT * FROM $this->table WHERE cont_id='$cont_id'";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_last
    * get last container type
    * @input -
    * @output container type information
    * @author Wirat
    * @Create Date 2564-09-10
    * @Update Date 2564-09-10
    */
    public function get_last() {
        $sql = "SELECT * FROM $this->table ORDER BY cont_id DESC LIMIT 1";
        return $this->db->query($sql)->getResult();
    }
}

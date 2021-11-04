<?php

namespace App\Models;

use App\Models\Da_cdms_container;

/*
* M_cdms_container
* get container
* @author Wirat
* @Create Date 2564-07-29
* @Update Date 2564-10-13
*/

class M_cdms_container extends Da_cdms_container {

    /*
    * get_all
    * get all cdms_container_type
    * @input -
    * @output array of container
    * @author Wirat
    * @Create Date 2564-07-29
    * @Update Date 2564-10-13
    */
    public function get_all($type = 1) {

        // Sort by con_id descending
        if ($type == 1) {
            $sql = "SELECT * FROM $this->table
                    LEFT JOIN cdms_size
                    ON con_size_id = size_id
                    LEFT JOIN cdms_container_type
                    ON con_cont_id = cont_id
                    LEFT JOIN cdms_agent
                    ON con_agn_id = agn_id
                    LEFT JOIN cdms_status_container
                    ON con_stac_id = stac_id
                    WHERE con_status = 1
                    ORDER BY con_id DESC" ;
        }
        // Sort by con_number ascending
        else if ($type == 2) {
            $sql = "SELECT * FROM $this->table
                    LEFT JOIN cdms_size
                    ON con_size_id = size_id
                    LEFT JOIN cdms_container_type
                    ON con_cont_id = cont_id
                    LEFT JOIN cdms_agent
                    ON con_agn_id = agn_id
                    LEFT JOIN cdms_status_container
                    ON con_stac_id = stac_id
                    WHERE con_status=1
                    ORDER BY CONVERT(con_number USING tis620) ASC" ;
        }
        return $this->db->query($sql)->getResult();
    }

    /*
    * is_con_number_exist
    * search for container by container number
    * @input con_number
    * @output container information
    * @author Wirat
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
    */
    public function is_con_number_exist($con_number = NULL) {
        $sql = "SELECT con_id, con_number FROM $this->table WHERE con_number = '$con_number'";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_by_con_number
    * get container information by con number
    * @input con_number
    * @output container information
    * @author Wirat
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
    */
    public function get_by_con_number($con_number = NULL) {
        $sql = "SELECT * FROM $this->table WHERE con_number = '$con_number' AND con_status = 1";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_by_id
    * get container information by con_id
    * @input con_id
    * @output container information
    * @author Wirat
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
    */
    public function get_by_id($con_id = NULL) {
        $sql = "SELECT * FROM $this->table WHERE con_id = '$con_id'";
        return $this->db->query($sql)->getResult();
    }
}

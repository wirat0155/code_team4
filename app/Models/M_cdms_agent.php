<?php

namespace App\Models;

use App\Models\Da_cdms_agent;
/*
* M_cdms_agent
* get agent
* @author Klayuth, Wirat
* @Create Date 2564-07-30
* @Update Date 2564-10-13
*/

class M_cdms_agent extends Da_cdms_agent {
    /*
    * get_all
    * get all agent
    * @input
    * @output array of agent
    * @author Klayuth, Wirat
    * @Create Date 2564-07-30
    * @Update Date 2564-10-13
    */
    public function get_all($type = 1) {

        // Sort by agn_id descending
        if ($type == 1) {
            $sql = "SELECT * FROM $this->table
                    WHERE agn_status = 1
                    ORDER BY agn_id DESC" ;
        }
        // Sort by agn_company_name ascending
        else if ($type == 2) {
            $sql = "SELECT * FROM $this->table
                    WHERE agn_status = 1
                    ORDER BY CONVERT(agn_company_name USING tis620) ASC" ;
        }
        return $this->db->query($sql)->getResult();
    }
    /*
    * get_by_id
    * get agent by id
    * @input agn_id
    * @output agent information
    * @author Klayuth
    * @Create Date 2564-07-30
    * @Update Date 2564-08-02
    */
    public function get_by_id($agn_id) {
        $sql = "SELECT * FROM $this->table
                WHERE agn_id='$agn_id'";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_by_company_name
    * get agent by company name
    * @input  agn_company_name
    * @output agent information
    * @author Wirat
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
    */
    public function get_by_company_name($agn_company_name = NULL) {
        $sql = "SELECT * FROM $this->table WHERE agn_company_name = '$agn_company_name' AND agn_status = 1";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_max_id
    * get agent that has max agn id
    * @input  -
    * @output agent information
    * @author Wirat
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
    */
    public function get_max_id() {
        $sql = "SELECT MAX(agn_id) AS agn_id FROM $this->table";
        return $this->db->query($sql)->getResult();
    }
}

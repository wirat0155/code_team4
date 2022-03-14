<?php
namespace App\Models;
use App\Models\Da_cdms_agent;

/*
* M_cdms_agent
* get agent
* @author   Klayuth, Wirat
* @Create Date  2564-07-30
*/
class M_cdms_agent extends Da_cdms_agent {
    /*
    * get_all
    * get all agent
    * @input    type
    * @output   array of agent
    * @author   Klayuth, Wirat
    * @Create Date  2564-07-30
    */
    public function get_all($type = 1) {

        // Sort by agn_id descending
        if ($type == 1) {
            $sql = "SELECT * FROM $this->table
                    WHERE agn_status = 1 ORDER BY agn_id DESC" ;
        }
        // Sort by agn_company_name ascending
        else if ($type == 2) {
            $sql = "SELECT * FROM $this->table
                    WHERE agn_status = 1 ORDER BY CONVERT(agn_company_name USING tis620) ASC" ;
        }
        // get number of contianer each agent
        else if ($type == 3) {
            $sql = "SELECT agn_id, agn_company_name, agn_firstname, agn_lastname, agn_tel, agn_address, agn_tax, agn_email, COUNT(con_id) AS num_container 
                    FROM $this->table LEFT JOIN `cdms_container` ON agn_id = con_agn_id 
                    WHERE agn_status = 1 GROUP BY agn_id ORDER BY agn_id DESC";
        }
        // return as array
        return $this->db->query($sql)->getResult();
    }
    /*
    * get_by_id
    * get agent by id
    * @input    agn_id
    * @output   agent information
    * @author   Klayuth
    * @Create Date  2564-07-30
    */
    public function get_by_id($agn_id) {
        $sql = "SELECT * FROM $this->table
                WHERE agn_id='$agn_id'";
        return $this->db->query($sql)->getRow();
    }

    /*
    * get_by_company_name
    * get agent by company name
    * @input    agn_company_name
    * @output   agent information
    * @author   Wirat
    * @Create Date  2564-08-07
    */
    public function get_by_company_name($agn_company_name = NULL) {
        $sql = "SELECT * FROM $this->table WHERE agn_company_name = '$agn_company_name' AND agn_status = 1";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_max_id
    * get agent that has max agn id
    * @input    -
    * @output   agent information
    * @author   Wirat
    * @Create Date  2564-08-07
    */
    public function get_max_id() {
        $sql = "SELECT MAX(agn_id) AS agn_id FROM $this->table";
        return $this->db->query($sql)->getResult();
    }
}

<?php
namespace App\Models;
use App\Models\Da_cdms_agent;

class M_cdms_agent extends Da_cdms_agent {
    // M get_all get_by_id
    public function get_all()
    {
        $sql = "SELECT * FROM $this->table";
        return $this->db->query($sql)->getResult();
    }   
    //con_agn_id , agn_company_name , agn_firstname , agn_lastname ,'agn_tel'   INNER JOIN cdms_container ON con_agn_id = agn_id"
}
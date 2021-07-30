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

    public function get_by_id($agn_id){
        $sql = "SELECT * FROM $this->table
                on agn_id
                WHERE agn_id";
         return $this->db->query($sql)->getResult();
    }
}
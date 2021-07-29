<?php
namespace App\Models;
use App\Models\Da_cdms_container;

class M_cdms_container extends Da_cdms_container {
    // M get_all get_by_id
    public function get_all()
    {
        $sql = "SELECT * FROM $this->table WHERE con_status=1";
        return $this->db->query($sql)->getResult();
    }   
}

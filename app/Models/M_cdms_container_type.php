<?php
namespace App\Models;
use App\Models\Da_cdms_container_type;

class M_cdms_container_type extends Da_cdms_container_type {
    // M get_all get_by_id
    public function get_all() {
        $sql = "SELECT cont_id, cont_name FROM $this->table WHERE cont_status = 1";
        return $this->db->query($sql)->getResult();
    }
}



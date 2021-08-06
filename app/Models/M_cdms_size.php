<?php

namespace App\Models;

use App\Models\Da_cdms_size;

class M_cdms_size extends Da_cdms_size
{

    public function get_all()
    {
        $sql = "SELECT size_id, size_name FROM $this->table WHERE size_status = 1";
        return $this->db->query($sql)->getResult();
    }
}
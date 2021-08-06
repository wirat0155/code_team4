<?php

namespace App\Models;

use App\Models\Da_cdms_status_container;

class M_cdms_status_container extends Da_cdms_status_container
{

    public function get_all()
    {
        $sql = "SELECT stac_id, stac_name FROM $this->table WHERE stac_status = 1";
        return $this->db->query($sql)->getResult();
    }
}
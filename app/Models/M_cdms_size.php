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
    public function get_first() {
        $sql = "SELECT size_width_out, size_height_out, size_length_out FROM $this->table ORDER BY size_id ASC LIMIT 1";

        return $this->db->query($sql)->getResult();
    }
    public function get_by_id($size_id) {
        $sql = "SELECT * FROM $this->table WHERE size_id = '$size_id'";
        return $this->db->query($sql)->getResult();
    }
}
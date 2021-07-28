<?php
namespace App\Models;
use App\Models\Da_cdms_car_type;

class M_cdms_car_type extends Da_cdms_car_type {
    // M get_all get_by_id
    public function get_all()
    {
        $sql = "SELECT * FROM $this->table";
        return $this->db->query($sql)->getResult();
    }   
}

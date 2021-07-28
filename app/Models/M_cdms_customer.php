<?php
namespace App\Models;
use App\Models\Da_cdms_customer;

class M_cdms_customer extends Da_cdms_customer {
    // M get_all get_by_id
    public function get_all()
    {
        $sql = "SELECT * FROM $this->table";
        return $this->db->query($sql)->getResult();
    }   
}

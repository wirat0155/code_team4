<?php
namespace App\Models;
use App\Models\Da_cdms_customer;

class M_cdms_customer extends Da_cdms_customer {
    // M get_all get_by_id
    public function get_all()
    {
        $sql = "SELECT * FROM $this->table
                WHERE cus_status = 1";
        return $this->db->query($sql)->getResult();
    }   
    public function get_by_id($cus_id){
        $sql = "SELECT * FROM $this->table
                on cus_id
                WHERE cus_id";
         return $this->db->query($sql)->getResult();
    }
}
<?php
namespace App\Models;
use App\Models\Da_cdms_car;

class M_cdms_car extends Da_cdms_car {
    // M get_all get_by_id
    public function get_all()
    {
        $sql = "SELECT *
        FROM $this->table
        LEFT JOIN cdms_province
        ON car_prov_id = prov_id

        LEFT JOIN cdms_car_type 
        ON car_cart_id = cart_id
        WHERE NOT car_status = 4";
        return $this->db->query($sql)->getResult();
    }  


    public function get_by_id($car_id){
        $sql = "SELECT * FROM $this->table
                on car_id
                WHERE car_id";
        return $this->db->query($sql)->getResult();
    }
}



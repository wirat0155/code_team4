<?php
namespace App\Models;
use CodeIgniter\Model;

class Da_cdms_car extends Model {
    protected $table = 'cdms_car';
    protected $primaryKey = 'car_id ';
    protected $allowedFields = ['car_code', 'car_number', 'car_chassis_number', 'car_brand',
                                'car_register_year', 'car_weight', 'car_branch', 'car_fuel_type', 'car_image', 'car_status', 'car_prov_id', 'car_cart_id'];
    public function delete($car_id= NULL, bool $purge = false) {
        $sql = "UPDATE $this->table SET car_status=4 WHERE car_id='$car_id'";
                $this->db->query($sql);
    }
}
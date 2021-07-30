<?php
namespace App\Models;
use CodeIgniter\Model;

class Da_cdms_driver extends Model{
    protected $table = 'cdms_driver';
    protected $primaryKey = 'dri_id ';
    protected $allowedFields = ['dri_name', 'dri_tel', 'dri_card_number', 'dri_license', 'dri_license_type', 'dri_profile_image', 'dri_status', 'dri_date_start', 'dri_date_end', 'dri_car_id'];
   
    
    public function delete($dri_id = NULL, bool $purge = false){
        $sql = "UPDATE $this->table 
                SET dri_status=2 
                WHERE dri_id='$dri_id'";
        $this->db->query($sql);
    }
}
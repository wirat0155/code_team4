<?php
namespace App\Models;
use CodeIgniter\Model;


class Da_cdms_service extends Model {
    protected $table = 'cdms_service';
    protected $primaryKey = 'ser_id';
    protected $allowedFields = ['ser_arrivals_location', 'ser_arrivals_date', 'ser_departure_date', 
    'ser_actual_departure_date', 'ser_departure_location', 'ser_weight', 'ser_status', 'ser_con_id', 
    'ser_cus_id', 'ser_id_change', 'ser_dri_id_in', 'ser_dri_id_out', 'ser_car_id_in', 'ser_car_id_out'];

}
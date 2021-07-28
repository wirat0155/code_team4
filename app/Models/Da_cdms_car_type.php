<?php
namespace App\Models;
use CodeIgniter\Model;

class Da_cdms_car_type extends Model {
    protected $table = 'cdms_car_type';
    protected $primaryKey = 'cart_id';
    protected $allowedFields = ['cart_name', 'cart_status'];

    // insert update delete
}

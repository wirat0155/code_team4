<?php
namespace App\Models;
use CodeIgniter\Model;

/*
    * Da_cdms_car_type
    * เพิ่ม ลบ แก้ไขประเภทรถ
    * @author Wirat
    * @Create Date 2564-08-08
    * @Update Date 2564-08-08
*/
class Da_cdms_car_type extends Model {
    protected $table = 'cdms_car_type';
    protected $primaryKey = 'cart_id';
    protected $allowedFields = ['cart_name', 'cart_status'];

    // insert update delete
}

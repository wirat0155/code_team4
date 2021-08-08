<?php
namespace App\Models;
use CodeIgniter\Model;

/*
    * Da_cdnms_container_type
    * เพิ่ม ลบ แก้ไขประเภทตู้คอนเทนเนอร์
    * @author Wirat
    * @Create Date 2564-08-08
    * @Update Date 2564-08-08
*/
class Da_cdms_container_type extends Model {
    protected $table = 'cdms_container_type';
    protected $primaryKey = 'cont_id';
    protected $allowedFields = ['cont_name', 'cont_status'];
}
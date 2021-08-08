<?php

namespace App\Models;

use CodeIgniter\Model;

/*
    * Da_cdms_status_container
    * เพิ่ม ลบ แก้ไขสถานะตู้คอนเทนเนอร์
    * @author Wirat
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
*/
class Da_cdms_status_container extends Model
{
    protected $table = 'cdms_status_container';
    protected $primaryKey = 'stac_id';
    protected $allowedFields = [
        'stac_name', 'stac_status'
    ];
}
<?php

namespace App\Models;

use CodeIgniter\Model;

/*
    * Da_cdms_size
    * เพิ่ม ลบ แก้ไขขนาดตู้
    * @author Wirat
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
*/
class Da_cdms_size extends Model
{
    protected $table = 'cdms_size';
    protected $primaryKey = 'size_id';
    protected $allowedFields = [
        'size_name', 'size_width_in', 'size_length_in', 'size_height_in', 'size_width_out', 'size_length_out', 'size_height_out', 'size_status'
    ];

    // insert update delete

    public function delete($size_id = NULL, bool $purge = false) {
        $sql = "UPDATE $this->table SET size_status=2 WHERE size_id='$size_id'";
        $this->db->query($sql);
    }
}
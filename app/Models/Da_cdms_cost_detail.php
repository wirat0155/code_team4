<?php

namespace App\Models;

use CodeIgniter\Model;

/*
* Da_cdms_cost_detail
* เพิ่ม ลบ แก้ไขข้อมุลค่าบริการ
* @author Natdanai
* @Create Date 2564-09-16
* @Update 
*/

class Da_cdms_cost_detail extends Model {
    protected $table = 'cdms_cost_detail';
    protected $primaryKey = 'cosd_id';
    protected $allowedFields = ['cosd_name', 'cosd_cost', 'cosd_status', 'cosd_payment_date', 'cosd_actual_payment_date', 'cosd_ser_id', 'cosd_stap_id'];

    /*
    * insert
    * เพิ่มค่าบริการ
    * @input 
    * @output เพิ่มค่าบริการ
    * @author Natdanai
    * @Create Date 2564-09-16
    * @Update 
    */
    public function cost_insert($cosd_name = NULL, $cosd_cost = NULL, $cosd_payment_date = NULL, $cosd_ser_id = NULL) {
        $sql = "INSERT INTO $this->table VALUES (NULL, '$cosd_name', '$cosd_cost', '1', '$cosd_payment_date', NULL, '$cosd_ser_id', '1')";
        $this->db->query($sql);
    }

    public function cost_update($cosd_id = NULL, $cosd_name = NULL, $cosd_cost = NULL)
    {
        $sql = "UPDATE $this->table SET cosd_name = '$cosd_name', cosd_cost = '$cosd_cost' WHERE cosd_id = '$cosd_id'";
        $this->db->query($sql);
    }

    public function delete($cosd_id = NULL, bool $purge = false) {
        $sql = "UPDATE $this->table SET cosd_status=2 WHERE cosd_id='$cosd_id'";
        $this->db->query($sql);
    }
}

<?php
namespace App\Models;
use CodeIgniter\Model;

/*
* Da_cdms_car_type
* เพิ่ม ลบ แก้ไขประเภทรถ
* @author Wirat
* @Create Date 2564-08-08
* @Update Date 2564-08-12
*/
class Da_cdms_car_type extends Model {
    protected $table = 'cdms_car_type';
    protected $primaryKey = 'cart_id';
    protected $allowedFields = ['cart_name', 'cart_status'];

    /*
    * delete
    * ลบประเภทรถ
    * @input cart_id
    * @output ลบประเภทรถ
    * @author wirat
    * @Create Date 2564-08-12
    * @Update Date 2564-08-12
    */
    public function delete($cart_id = NULL, bool $purge = false) {
        $sql = "UPDATE $this->table SET cart_status=2 WHERE cart_id='$cart_id'";
        $this->db->query($sql);
    }
}
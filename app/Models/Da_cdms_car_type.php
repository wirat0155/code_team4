<?php
namespace App\Models;
use CodeIgniter\Model;

/*
* Da_cdms_car_type
* เพิ่ม ลบ แก้ไขประเภทรถ
* @author Wirat
* @Create Date 2564-08-08
* @Update Date 2564-09-10
*/
class Da_cdms_car_type extends Model {
    protected $table = 'cdms_car_type';
    protected $primaryKey = 'cart_id';
    protected $allowedFields = ['cart_name', 'cart_status'];

    /*
    * insert
    * เพิ่มประเภทรถ
    * @input cart_name
    * @output เพิ่มประเภทรถ
    * @author Wirat
    * @Create Date 2564-09-10
    * @Update Date 2564-09-10
    */
    public function insert($cart_name = NULL, bool $return_ID = true) {
        $sql = "INSERT INTO $this->table VALUES(NULL, '$cart_name', 1)";
        $this->db->query($sql);
    }

    /*
    * delete
    * ลบประเภทรถ
    * @input cart_id
    * @output ลบประเภทรถ
    * @author Wirat
    * @Create Date 2564-08-12
    * @Update Date 2564-08-12
    */
    public function delete($cart_id = NULL, bool $purge = false) {
        $sql = "UPDATE $this->table SET cart_status = 2 WHERE cart_id='$cart_id'";
        $this->db->query($sql);
    }
}
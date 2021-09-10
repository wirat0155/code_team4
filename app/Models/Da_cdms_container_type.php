<?php
namespace App\Models;
use CodeIgniter\Model;

/*
* Da_cdnms_container_type
* เพิ่ม ลบ แก้ไขประเภทตู้คอนเทนเนอร์
* @author Wirat
* @Create Date 2564-09-10
* @Update Date 2564-09-10
*/
class Da_cdms_container_type extends Model {
    protected $table = 'cdms_container_type';
    protected $primaryKey = 'cont_id';
    protected $allowedFields = ['cont_name', 'cont_status'];

    /*
    * insert
    * เพิ่มประเภทตู้คอนเทนเนอร์
    * @input cont_name
    * @output เพิ่มประเภทตู้คอนเทนเนอร์
    * @author Wirat
    * @Create Date 2564-09-10
    * @Update Date  2564-09-10
    */
    public function insert($cont_name = NULL, bool $return_ID = true) {
        $sql = "INSERT INTO $this->table VALUES(NULL, '$cont_name', 1)";
        $this->db->query($sql);
    }

    /*
    * delete
    * ลบประเภทตู้คอนเทนเนอร์
    * @input cont_id
    * @output ลบประเภทตู้คอนเทนเนอร์
    * @author Benjapon
    * @Create Date 2564-08-06
    * @Update Date 2564-08-06
    */
    public function delete($cont_id = NULL, bool $purge = false) {
        $sql = "UPDATE $this->table SET cont_status=2 WHERE cont_id='$cont_id'";
        $this->db->query($sql);
    }
}
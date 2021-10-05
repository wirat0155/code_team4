<?php
namespace App\Models;
use CodeIgniter\Model;

/*
* Da_cdnms_container_type
* เพิ่ม ลบ แก้ไขประเภทตู้คอนเทนเนอร์
* @author Wirat
* @Create Date 2564-09-10
* @Update Date 2564-09-12
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
    * container_type_update
    * แก้ไขประเภทตู้คอนเทนเนอร์
    * @input cont_id, cont_name
    * @output แก้ไจประเภทตู้คอนเทนเนอร์
    * @author Wirat
    * @Create Date 2564-09-12
    * @Update Date  2564-09-12
    */
    public function container_type_update($cont_id = NULL, $cont_name = NULL) {
        $sql = "UPDATE $this->table SET cont_name = '$cont_name' WHERE cont_id = '$cont_id'";
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
        $sql = "UPDATE $this->table SET cont_status = 2 WHERE cont_id = '$cont_id'";
        $this->db->query($sql);
    }

     /*
    * restore
    * ลบประเภทตู้คอนเทนเนอร์
    * @input cont_id
    * @output restore ประเภทตู้คอนเทนเนอร์
    * @author Tadsawan
    * @Create Date 2564-10-04
    * @Update Date 2564-10-04
    */
    public function restore($cont_id = NULL) {
        $sql = "UPDATE $this->table SET cont_status = 1 WHERE cont_id = '$cont_id'";
        $this->db->query($sql);
    }
}
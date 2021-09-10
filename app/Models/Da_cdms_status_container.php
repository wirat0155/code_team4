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
class Da_cdms_status_container extends Model {
    protected $table = 'cdms_status_container';
    protected $primaryKey = 'stac_id';
    protected $allowedFields = [
        'stac_name', 'stac_status'
    ];

    /*
    * insert
    * เพิ่มสถานะตู้คอนเทนเนอร์
    * @input stac_name
    * @output เพิ่มสถานะตู้คอนเทนเนอร์
    * @author Wirat
    * @Create Date 2564-09-10
    * @Update Date 2564-09-10
    */
    public function insert($stac_name = NULL, bool $return_ID = true) {
        $sql = "INSERT INTO $this->table VALUES(NULL, '$stac_name', 1)";
        $this->db->query($sql);
    }

    /*
    * delete
    * ลบสถานะตู้
    * @input stac_id
    * @output ลบสถานะตู้
    * @author Klayuth
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
    */
    public function delete($stac_id = NULL, bool $purge = false) {
        $sql = "UPDATE $this->table SET stac_status=2 WHERE stac_id='$stac_id'";
        $this->db->query($sql);
    }
}
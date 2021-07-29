<?php
namespace App\Models;
use CodeIgniter\Model;

/*
* Da_cdms_container
* เพิ่ม ลบ แก้ไขข้อมุลตู้คอนเทนเนอร์
* @author Wirat
* @Create Date 2564-07-29
* @Update Date
*/
class Da_cdms_container extends Model {
    protected $table = 'cdms_container';
    protected $primaryKey = 'con_id';
    protected $allowedFields = ['con_number', 'con_max_weight', 'con_tare_weight', 'con_net_weight', 'con_cube', 'con_image', 'con_status', 'con_size_id', 'con_cont_id', 'con_agn_id', 'con_stac_id'];

    /*
    * delete
    * ลบตู้คอนเทนเนอร์
    * @input con_id
    * @output ลบตู้คอนเทนเนอร์
    * @author Wirat
    * @Create Date 2564-07-29
    * @Update Date
    */
    public function delete($con_id = NULL, bool $purge = false) {
        $sql = "UPDATE $this->table SET con_status=2 WHERE con_id='$con_id'";
        $this->db->query($sql);
    }
}

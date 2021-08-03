<?php
namespace App\Models;
use CodeIgniter\Model;

/*
* Da_cdms_driver
* เพิ่ม ลบ แก้ไขข้อมูลพนักงานขับรถ
* @author Warisara
* @Create Date 2564-07-30
* @Update Date
*/

class Da_cdms_driver extends Model{
    protected $table = 'cdms_driver';
    protected $primaryKey = 'dri_id ';
    protected $allowedFields = ['dri_name', 'dri_tel', 'dri_card_number', 'dri_license', 'dri_license_type', 'dri_profile_image', 'dri_status', 'dri_date_start', 'dri_date_end', 'dri_car_id'];
   
/*
    * delete
    * ลบพนักงานขับรถ
    * @input dri_id
    * @output ลบพนักงานขับรถ
    * @author Warisara
    * @latest author Wirat
    * @Create Date 2564-07-30
    * @Update Date 2564-08-03
    */
    public function delete($dri_id = NULL, bool $purge = false){
        $sql = "UPDATE $this->table 
                SET dri_status = 4 
                WHERE dri_id='$dri_id'";
        $this->db->query($sql);
    }
}
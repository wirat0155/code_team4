<?php
namespace App\Models;
use CodeIgniter\Model;

/*
    * Da_cdms_agent
    * เพิ่ม ลบ รายชื่อเอเย่นต์
    * @author Klayuth,Preechaya
    * @Create Date 2564-07-30
    * @Update Date 2564-08-02
*/

class Da_cdms_agent extends Model
{
    protected $table = 'cdms_agent';
    protected $primaryKey = 'agn_id';
    protected $allowedFields = ['agn_company_name', 'agn_firstname'
    ,'agn_lastname','agn_tel','agn_address','agn_status','agn_tax','agn_email'];

    /*
        * delete
        * ลบรายชื่อเอเย่นต์
        * @author Preechaya
        * @Create Date 2564-07-30
        * @Update Date 2564-08-02
    */

    public function delete($agn_id = NULL, bool $purge = false)
    {
        $sql = "UPDATE $this->table SET agn_status=2 
                WHERE agn_id='$agn_id'";
        $this->db->query($sql);
    }
}

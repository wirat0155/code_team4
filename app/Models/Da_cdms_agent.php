<?php
namespace App\Models;
use CodeIgniter\Model;

class Da_cdms_agent extends Model
{
    protected $table = 'cdms_agent';
    protected $primaryKey = 'agn_id';
    protected $allowedFields = ['agn_company_name', 'agn_firstname'
    ,'agn_lastname','agn_tel','agn_address','agn_status','agn_tax','agn_email'];

    // insert update delete
    public function delete($agn_id = NULL, bool $purge = false)
    {
        $sql = "UPDATE $this->table SET agn_status=2 
                WHERE agn_id='$agn_id'";
        $this->db->query($sql);
    }
}

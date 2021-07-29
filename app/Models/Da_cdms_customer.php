<?php
namespace App\Models;
use CodeIgniter\Model;

class Da_cdms_customer extends Model {
    protected $table = 'cdms_customer';
    protected $primaryKey = 'cus_id ';
    protected $allowedFields = ['cus_company_name', 'cus_firstname', 'cus_lastname', 'cus_branch',
                                'cus_tel', 'cus_address', 'cus_status', 'cus_tax', 'cus_email'];
    public function delete($cus_id= NULL, bool $purge = false) {
        $sql = "UPDATE $this->table SET cus_status=2 WHERE cus_id='$cus_id'";
                $this->db->query($sql);
    }
}
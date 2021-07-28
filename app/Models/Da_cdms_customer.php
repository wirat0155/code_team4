<?php
namespace App\Models;
use CodeIgniter\Model;

class Da_cdms_customer extends Model {
    protected $table = 'cdms_customer';
    protected $primaryKey = 'cus_id ';
    protected $allowedFields = ['cus_company_name', 'cus_firstname', 'cus_lastname', 'cus_branch',
                                'cus_tel', 'cus_address', 'cus_status', 'cus_tax', 'cus_email'];
}

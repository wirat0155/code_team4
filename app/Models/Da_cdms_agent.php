<?php
namespace App\Models;
use CodeIgniter\Model;

class Da_cdms_agent extends Model {
    protected $table = 'cdms_agent';
    protected $primaryKey = 'agn_id';
    protected $allowedFields = ['agn_company_name', 'agn_firstname','agn_lastname','agn_tel','agn_address','agn_status','agn_tax','agn_email'];

    // insert update delete
}

<?php
namespace App\Models;
use CodeIgniter\Model;

/*
    * Da_cdms_province
    * จังหวัด
    * @author Tadsawan
    * @Create Date 2564-08-09
    * @Update Date 2564-08-09
*/
class Da_cdms_province extends Model {
    protected $table = 'cdms_province';
    protected $primaryKey = 'prov_id';
    protected $allowedFields = ['prov_name', 'prov_status'];
}
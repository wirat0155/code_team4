<?php

namespace App\Models;

use CodeIgniter\Model;

/*
* Da_cdms_bank
* insert update delete bank
* @author   Kittipod
* @Create Date  2564-12-27
*/
class Da_cdms_bank extends Model
{
    protected $table = 'cdms_bank';
    protected $primaryKey = 'bnk_id';
    protected $allowedFields = [
        'bnk_name'
    ];

}
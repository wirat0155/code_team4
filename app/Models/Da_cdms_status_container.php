<?php

namespace App\Models;

use CodeIgniter\Model;

class Da_cdms_status_container extends Model
{
    protected $table = 'cdms_status_container';
    protected $primaryKey = 'stac_id';
    protected $allowedFields = [
        'stac_name', 'stac_status'
    ];
}
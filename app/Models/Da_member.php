<?php
namespace App\Models;
use CodeIgniter\Model;

class Da_member extends Model {
    protected $table = 't4mng_member';
    protected $primaryKey = 'mem_id';
    protected $allowedFields = ['mem_firstname', 'mem_lastname', 'mem_pos_id', 'mem_is_active'];
}

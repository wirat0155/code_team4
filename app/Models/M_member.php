<?php
namespace App\Models;
use App\Models\Da_member;

class M_member extends Da_member {
    protected $table = 't4mng_member';
    protected $primaryKey = 'mem_id';
    protected $allowedFields = ['mem_firstname', 'mem_lastname', 'mem_pos_id', 'mem_is_active'];

    public function get_all()
    {
        $sql = "SELECT * FROM t4mng_member LEFT JOIN t4mng_position ON mem_pos_id = pos_id WHERE mem_is_active = 1 ORDER BY mem_pos_id ASC";
        return $this->db->query($sql)->getResult();
    }
}

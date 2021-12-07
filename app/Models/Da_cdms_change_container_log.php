<?php
namespace App\Models;
use CodeIgniter\Model;

/*
* Da_cdms_change_container_log
* insert changing container in service log
* @author   Wirat
* @Create Date  2564-12-07
*/
class Da_cdms_change_container_log extends Model {
    protected $table = 'cdms_change_container_log';
    protected $primaryKey = 'chl_id';
    protected $allowedFields = ['chl_old_ser_id', 'chl_new_ser_id', 'chl_date'];

    /*
    * insert
    * insert changing container in service log
    * @input    chl_old_ser_id, chl_new_ser_id
    * @output   insert changing container log
    * @author   Wirat
    * @Create Date  2564-12-07
    */
    public function insert($chl_old_ser_id = NULL, $chl_new_ser_id = NULL) {
        $sql = "INSERT INTO $this->table(chl_old_ser_id, chl_new_ser_id) VALUES('$chl_old_ser_id', '$chl_new_ser_id')";
        $this->db->query($sql);
    }
}
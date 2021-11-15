<?php
namespace App\Models;
use CodeIgniter\Model;

/*
* Da_cdms_status_container_log
* insert changing status container log
* @author   Wirat
* @Create Date  2564-11-14
*/
class Da_cdms_status_container_log extends Model {
    protected $table = 'cdms_status_container_log';
    protected $primaryKey = 'scl_id';
    protected $allowedFields = ['scl_ser_id', 'scl_stac_id', 'scl_date'];

    /*
    * Da_cdms_status_container_log
    * insert changing status container log
    * @Input    scl_ser_id, scl_stac_id
    * @Output   inserting status container log
    * @author   Wirat
    * @Create Date  2564-11-14
    */
    public function insert($scl_ser_id = '', $scl_stac_id = '') {
        $sql = "INSERT INTO $this->table(scl_ser_id, scl_stac_id) VALUES('$scl_ser_id', '$scl_stac_id')";

        // query
        $this->db->query($sql);
    }
}

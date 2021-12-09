<?php

namespace App\Models;

use CodeIgniter\Model;

/*
* Da_cdms_status_container
* insert update delete status container
* @author   Wirat
* @Create Date  2564-08-07
*/
class Da_cdms_status_container extends Model {
    protected $table = 'cdms_status_container';
    protected $primaryKey = 'stac_id';
    protected $allowedFields = [
        'stac_name', 'stac_status'
    ];

    /*
    * insert
    * insert status container
    * @input    stac_name
    * @output   insert status container
    * @author   Wirat
    * @Create Date  2564-09-10
    */
    public function insert($stac_name = NULL, bool $return_ID = true) {
        $sql = "INSERT INTO $this->table VALUES(NULL, '$stac_name', 1)";
        $this->db->query($sql);
    }

    /*
    * status_container_update
    * update status container
    * @input    stac_id, stac_name
    * @output   update status container
    * @author   Wirat
    * @Create Date  2564-09-12
    */
    public function status_container_update($stac_id = NULL, $stac_name = NULL) {
        $sql = "UPDATE $this->table SET stac_name = '$stac_name' WHERE stac_id = '$stac_id'";
        $this->db->query($sql);
    }
    /*
    * delete
    * delete status container
    * @input    stac_id
    * @output   delete status container
    * @author   Klayuth
    * @Create Date  2564-08-07
    */
    public function delete($stac_id = NULL, bool $purge = false) {
        $sql = "UPDATE $this->table SET stac_status = 2 WHERE stac_id = '$stac_id'";
        $this->db->query($sql);
    }

    /*
    * restore
    * restore status container
    * @input    stac_id
    * @output   restore status container
    * @author   Tadsawan
    * @Create Date  2564-10-22
    */
    public function restore($stac_id = NULL) {
        $sql = "UPDATE $this->table SET stac_status = 1 WHERE stac_id = '$stac_id'";
        $this->db->query($sql);
    }

    /*
    * status_container_delete
    * delete status container
    * @input    stac_id
    * @output   delete status container
    * @author   Tadsawan
    * @Create Date  2564-12-08
    */
    public function status_container_delete($stac_id = NULL, bool $purge = false) {
        $sql = "UPDATE $this->table SET stac_status = 3 WHERE stac_id = '$stac_id'";
        $this->db->query($sql);
    }
}
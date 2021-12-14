<?php

namespace App\Models;

use CodeIgniter\Model;

/*
* Da_cdms_cost_detail
* insert update delete cost in service
* @author   Natdanai
* @Create Date  2564-09-16
*/
class Da_cdms_cost_detail extends Model {
    protected $table = 'cdms_cost_detail';
    protected $primaryKey = 'cosd_id';
    protected $allowedFields = ['cosd_name', 'cosd_cost', 'cosd_status', 'cosd_payment_date', 'cosd_actual_payment_date', 'cosd_ser_id', 'cosd_stap_id', 'cosd_quantity', 'cosd_status_vat'];

    /*
    * cost_insert
    * insert cost
    * @input    cosd_name, cosd_cost, cosd_payment_date, cosd_ser_id
    * @output   insert cost
    * @author   Natdanai
    * @Create Date  2564-09-16
    */
    public function cost_insert($cosd_name = NULL, $cosd_cost = NULL, $cosd_payment_date = NULL, $cosd_ser_id = NULL, $cosd_quantity = NULL, $cosd_status_vat = NULL) {
        $sql = "INSERT INTO $this->table VALUES (NULL, '$cosd_name', '$cosd_cost', '1', '$cosd_payment_date', NULL, '$cosd_ser_id', '1', '$cosd_quantity', '$cosd_status_vat')";
        $this->db->query($sql);
    }

    /*
    * cost_update
    * update cost
    * @input    cosd_id, cosd_name, cosd_cost
    * @output   update cost
    * @author   Natdanai
    * @Create Date  2564-09-16
    */
    public function cost_update($cosd_id = NULL, $cosd_name = NULL, $cosd_cost = NULL, $cosd_quantity = NULL, $cosd_status_vat = NULL)
    {
        $sql = "UPDATE $this->table SET cosd_name = '$cosd_name', cosd_cost = '$cosd_cost', cosd_quantity = '$cosd_quantity', cosd_status_vat = '$cosd_status_vat' WHERE cosd_id = '$cosd_id'";
        $this->db->query($sql);
    }

    /*
    * delete
    * delete cost
    * @input    cosd_i
    * @output   delete cost
    * @author   Natdanai
    * @Create Date  2564-09-16
    */
    public function delete($cosd_id = NULL, bool $purge = false) {
        $sql = "UPDATE $this->table SET cosd_status=2 WHERE cosd_id='$cosd_id'";
        $this->db->query($sql);
    }
}

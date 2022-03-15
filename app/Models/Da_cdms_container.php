<?php

namespace App\Models;

use CodeIgniter\Model;

/*
* Da_cdms_container
* insert update delete container
* @author   Wirat
* @Create Date  2564-07-29
*/
class Da_cdms_container extends Model {
    protected $table = 'cdms_container';
    protected $primaryKey = 'con_id';
    protected $allowedFields = ['con_number', 'con_max_weight', 'con_tare_weight', 'con_net_weight', 'con_cube', 'con_image', 'con_status', 'con_size_id', 'con_cont_id', 'con_agn_id', 'con_stac_id'];

    /*
    * insert
    * insert container
    * @input    $con_number, $con_max_weight, $con_tare_weight, $con_net_weight, $con_cube, $con_size_id, $con_cont_id, $con_agn_id, $con_stac_id
    * @output   insert container
    * @author   Wirat
    * @Create Date  2564-08-06
    */
    public function insert($con_number = NULL, $con_max_weight = NULL, $con_tare_weight = NULL, $con_net_weight = NULL, $con_cube = NULL, $con_size_id = NULL, $con_cont_id = NULL, $con_agn_id = NULL, $con_stac_id = NULL) {
        $sql = "INSERT INTO $this->table VALUES (NULL, '$con_number', '$con_max_weight', '$con_tare_weight', '$con_net_weight', '$con_cube', NULL, '1', '$con_size_id', '$con_cont_id', '$con_agn_id', '$con_stac_id')";
        $this->db->query($sql);
    }


    /*
    * delete
    * delete container
    * @input    con_id
    * @output   delete container
    * @author   Wirat
    * @Create Date  2564-07-29
    */
    public function delete($con_id = NULL, bool $purge = false) {
        $sql = "UPDATE $this->table SET con_status=2 WHERE con_id='$con_id'";
        $this->db->query($sql);
    }

    /*
    * container_update
    * update container
    * @input    container information
    * @output   update container
    * @author   Wirat
    * @Create Date  2564-08-07
    */
    public function container_update($con_id = NULL, $con_number = NULL, $con_max_weight = NULL, $con_tare_weight = NULL, $con_net_weight = NULL, $con_cube = NULL, $con_size_id = NULL, $con_cont_id = NULL, $con_agn_id = NULL, $con_stac_id = NULL)
    {
        $sql = "UPDATE $this->table SET con_number = '$con_number', con_max_weight = '$con_max_weight', con_tare_weight = '$con_tare_weight', con_net_weight = '$con_net_weight', con_cube = '$con_cube', con_size_id = '$con_size_id', con_cont_id = '$con_cont_id', con_agn_id = '$con_agn_id', con_stac_id = '$con_stac_id' WHERE con_id = '$con_id'";
        $this->db->query($sql);
    }

    /*
    * change_con_stac_id
    * change con stac id by ser stac id
    * @input    today
    * @output   changing con stac id by ser stac id
    * @author   Wirat
    * @Create Date  2564-11-11
    */
    public function change_con_stac_id($today) {
        $sql = "UPDATE $this->table
                LEFT JOIN cdms_service ON ser_con_id = con_id
                SET con_stac_id = ser_stac_id
                WHERE (ser_actual_departure_date > '$today' OR ser_actual_departure_date LIKE '$today%' OR ser_actual_departure_date IS NULL)
                AND ser_status = 1
                ORDER BY ser_id DESC";
        
        // query
        $this->db->query($sql);
    }

    public function update_con_stac_id_by_con_id($con_id, $con_stac_id) {
        $sql = "UPDATE $this->table
                    SET con_stac_id = '$con_stac_id'
                    WHERE con_id = '$con_id'";
        $this->db->query($sql);
    }
}

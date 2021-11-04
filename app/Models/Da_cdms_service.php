<?php

namespace App\Models;

use CodeIgniter\Model;

/*
* Da_cdms_service
* insert update delete service
* @author Natdanai Worarat
* @Create Date 2564-07-29
* @Update Date 2564-08-08
*/

class Da_cdms_service extends Model {
    protected $table = 'cdms_service';
    protected $primaryKey = 'ser_id';
    public $allowedFields = [
        'ser_arrivals_location', 'ser_arrivals_date', 'ser_departure_date',
        'ser_actual_departure_date', 'ser_departure_location', 'ser_weight', 'ser_status', 'ser_con_id', 'ser_stac_id',
        'ser_cus_id', 'ser_id_change', 'ser_dri_id_in', 'ser_dri_id_out', 'ser_car_id_in', 'ser_car_id_out'
    ];
    /*
    * delete
    * delete service
    * @input ser_id
    * @output delete service
    * @author Worarat
    * @Create Date 2564-07-30
    * @Update Date 2564-07-30
    */
    public function delete($ser_id = NULL, bool $purge = false) {
        $sql = "UPDATE $this->table SET ser_status=2 WHERE ser_id='$ser_id'";
        $this->db->query($sql);
    }

    /*
    * service_insert
    * insert service
    * @input $ser_stac_id, $ser_departure_date, $ser_car_id_in, $ser_arrivals_date, $ser_dri_id_in, $ser_actual_departure_date,$ser_dri_id_out, $ser_car_id_out, $ser_arrivals_location, $ser_departure_location, $ser_weight, $ser_con_id, $ser_cus_id
    * @output insert service
    * @author Natdanai
    * @Create Date 2564-08-06
    * @Update Date 2564-08-08
    */
    public function service_insert($ser_departure_date = NULL, $ser_car_id_in = NULL, $ser_arrivals_date = NULL, $ser_dri_id_in = NULL, $ser_dri_id_out = NULL, $ser_car_id_out = NULL, $ser_arrivals_location = NULL, $ser_departure_location = NULL, $ser_weight = NULL, $ser_con_id = NULL, $ser_stac_id = NULL, $ser_cus_id = NULL) {
        $sql = "INSERT INTO $this->table(ser_arrivals_location, ser_arrivals_date, ser_departure_date, ser_actual_departure_date,
                ser_departure_location, ser_weight, ser_con_id, ser_stac_id, ser_cus_id, ser_id_change, ser_dri_id_in,
                ser_dri_id_out, ser_car_id_in, ser_car_id_out)
        VALUES ('$ser_arrivals_location', '$ser_arrivals_date', '$ser_departure_date', NULL,
                '$ser_departure_location', '$ser_weight', '$ser_con_id', '$ser_stac_id', '$ser_cus_id',
                 NULL, '$ser_dri_id_in', '$ser_dri_id_out', '$ser_car_id_in', '$ser_car_id_out')";
        $this->db->query($sql);
    }

    /*
    * service_update
    * ipdate service
    * @input $ser_id $ser_type, $ser_departure_date, $ser_car_id_in, $ser_arrivals_date, $ser_dri_id_in, $ser_actual_departure_date, $ser_dri_id_out, $ser_car_id_out, $ser_arrivals_location, $ser_departure_location, $ser_weight, $ser_con_id, $ser_cus_id
    * @output update service
    * @author Worarat
    * @Create Date 2564-08-06
    * @Update Date 2564-08-07
    */
    public function service_update($ser_id = NULL, $ser_stac_id = NULL, $ser_departure_date = NULL, $ser_car_id_in = NULL, $ser_arrivals_date = NULL, $ser_dri_id_in = NULL, $ser_actual_departure_date = NULL, $ser_dri_id_out = NULL, $ser_car_id_out = NULL, $ser_arrivals_location = NULL, $ser_departure_location = NULL, $ser_weight = NULL, $ser_con_id = NULL, $ser_cus_id = NULL) {
        $sql = "UPDATE  $this->table SET ser_arrivals_location ='$ser_arrivals_location', ser_arrivals_date ='$ser_arrivals_date', ser_departure_date='$ser_departure_date', ser_actual_departure_date='$ser_actual_departure_date',
                ser_departure_location='$ser_departure_location', ser_weight='$ser_weight', ser_con_id='$ser_con_id', ser_stac_id='$ser_stac_id', ser_cus_id='$ser_cus_id', ser_id_change= NULL, ser_dri_id_in='$ser_dri_id_in',
                ser_dri_id_out='$ser_dri_id_out', ser_car_id_in='$ser_car_id_in', ser_car_id_out='$ser_car_id_out'
                WHERE ser_id = '$ser_id' ";

        $this->db->query($sql);
    }

    /*
    * change_ser_stac_id
    * change ser stac id upon to date
    * @input to_ser_stac_id, yesterday, today_time
    * @output -
    * @author Wirat
    * @Create Date 2564-10-30
    * @Update Date 2564-10-31
    */
    public function change_ser_stac_id($to_ser_stac_id = 3, $yesterday = '', $today_time = '') {
        if ($to_ser_stac_id == 3) {
            $sql = "UPDATE $this->table SET ser_stac_id = 3
                    WHERE ser_arrivals_date < '$yesterday' AND ser_stac_id BETWEEN 1 AND 2";
        }
        else if ($to_ser_stac_id == 4) {
            $sql = "UPDATE $this->table SET ser_stac_id = 4
                    WHERE ser_actual_departure_date <= '$today_time' AND ser_stac_id BETWEEN 1 AND 3";
        }
        // query
        $this->db->query($sql);
    }
}

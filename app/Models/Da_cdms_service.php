<?php

namespace App\Models;

use CodeIgniter\Model;

/*
* Da_cdms_service
* เพิ่ม ลบ แก้ไขข้อมุลบริการ
* @author Natdanai Worarat
* @Create Date 2564-07-29
* @Update Date 2564-08-08
*/

class Da_cdms_service extends Model {
    protected $table = 'cdms_service';
    protected $primaryKey = 'ser_id';
    public $allowedFields = [
        'ser_arrivals_location', 'ser_arrivals_date', 'ser_departure_date',
        'ser_actual_departure_date', 'ser_departure_location', 'ser_weight', 'ser_status', 'ser_con_id', 'ser_type',
        'ser_cus_id', 'ser_id_change', 'ser_dri_id_in', 'ser_dri_id_out', 'ser_car_id_in', 'ser_car_id_out'
    ];
    /*
    * delete
    * ลบบริการ
    * @input $ser_type
    * @output ลบบริการ
    * @author Worarat
    * @Create Date 2564-07-30
    * @Update Date
    */
    public function delete($ser_id = NULL, bool $purge = false) {
        $sql = "UPDATE $this->table SET ser_status=2 WHERE ser_id='$ser_id'";
        $this->db->query($sql);
    }

    /*
    * service_insert
    * เพิ่มบริการ
    * @input $ser_type, $ser_departure_date, $ser_car_id_in, $ser_arrivals_date, $ser_dri_id_in, $ser_actual_departure_date,$ser_dri_id_out, $ser_car_id_out, $ser_arrivals_location, $ser_departure_location, $ser_weight, $ser_con_id, $ser_cus_id
    * @output เพิ่มบริการ
    * @author Natdanai
    * @Create Date 2564-08-06
    * @Update Date 2564-08-08
    */
    public function service_insert($ser_type = NULL, $ser_departure_date = NULL, $ser_car_id_in = NULL, $ser_arrivals_date = NULL, $ser_dri_id_in = NULL, $ser_actual_departure_date = NULL, $ser_dri_id_out = NULL, $ser_car_id_out = NULL, $ser_arrivals_location = NULL, $ser_departure_location = NULL, $ser_weight = NULL, $ser_con_id = NULL, $ser_cus_id = NULL) {
        $sql = "INSERT INTO $this->table(ser_arrivals_location, ser_arrivals_date, ser_departure_date, ser_actual_departure_date, 
                ser_departure_location, ser_weight, ser_con_id, ser_type, ser_cus_id, ser_id_change, ser_dri_id_in, 
                ser_dri_id_out, ser_car_id_in, ser_car_id_out) 
        VALUES ('$ser_arrivals_location', '$ser_arrivals_date', '$ser_departure_date', '$ser_actual_departure_date', 
                '$ser_departure_location', '$ser_weight', '$ser_con_id', '$ser_type', '$ser_cus_id', 
                 NULL, '$ser_dri_id_in', '$ser_dri_id_out', '$ser_car_id_in', '$ser_car_id_out')";
        $this->db->query($sql);
    }

    /*
    * service_update
    * แก้ไขบริการ
    * @input $ser_id $ser_type, $ser_departure_date, $ser_car_id_in, $ser_arrivals_date, $ser_dri_id_in, $ser_actual_departure_date, $ser_dri_id_out, $ser_car_id_out, $ser_arrivals_location, $ser_departure_location, $ser_weight, $ser_con_id, $ser_cus_id
    * @output แก้ไขบริการa
    * @author Worarat
    * @Create Date 2564-08-06
    * @Update Date 2564-08-07
    */
    public function service_update($ser_id = NULL, $ser_type = NULL, $ser_departure_date = NULL, $ser_car_id_in = NULL, $ser_arrivals_date = NULL, $ser_dri_id_in = NULL, $ser_actual_departure_date = NULL, $ser_dri_id_out = NULL, $ser_car_id_out = NULL, $ser_arrivals_location = NULL, $ser_departure_location = NULL, $ser_weight = NULL, $ser_con_id = NULL, $ser_cus_id = NULL) {
        $sql = "UPDATE  $this->table SET ser_arrivals_location ='$ser_arrivals_location', ser_arrivals_date ='$ser_arrivals_date', ser_departure_date='$ser_departure_date', ser_actual_departure_date='$ser_actual_departure_date', 
                ser_departure_location='$ser_departure_location', ser_weight='$ser_weight', ser_con_id='$ser_con_id', ser_type='$ser_type', ser_cus_id='$ser_cus_id', ser_id_change= NULL, ser_dri_id_in='$ser_dri_id_in', 
                ser_dri_id_out='$ser_dri_id_out', ser_car_id_in='$ser_car_id_in', ser_car_id_out='$ser_car_id_out' 
                WHERE ser_id = '$ser_id' ";

        $this->db->query($sql);
    }
}

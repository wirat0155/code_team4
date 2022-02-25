<?php

namespace App\Models;

use CodeIgniter\Model;

/*
* Da_cdms_service
* insert update delete service
* @author   Natdanai, Worarat
* @Create Date  2564-07-29
*/

class Da_cdms_service extends Model
{
    protected $table = 'cdms_service';
    protected $primaryKey = 'ser_id';
    public $allowedFields = [
        'ser_arrivals_location', 'ser_arrivals_date', 'ser_departure_date',
        'ser_actual_departure_date', 'ser_departure_location', 'ser_weight', 'ser_status', 'ser_con_id', 'ser_stac_id',
        'ser_cus_id', 'ser_id_change', 'ser_dri_id_in', 'ser_dri_id_out', 'ser_car_id_in', 'ser_car_id_out', 'ser_receipt',
        'ser_invoice', 'ser_due_date', 'ser_pay_by', 'ser_cheque', 'ser_bnk_id'
    ];

    /*
    * delete
    * delete service
    * @input    ser_id
    * @output   delete service
    * @author   Worarat
    * @Create Date  2564-07-30
    */
    public function delete($ser_id = NULL, bool $purge = false)
    {
        $sql = "UPDATE $this->table SET ser_status=2 WHERE ser_id='$ser_id'";
        $this->db->query($sql);
    }

    /*
    * delete
    * delete service
    * @input    ser_id
    * @output   delete service
    * @author   Worarat
    * @Create Date  2564-07-30
    */
    public function change_status_replace($ser_id = NULL, bool $purge = false)
    {
        $sql = "UPDATE $this->table SET ser_status=3 WHERE ser_id='$ser_id'";
        $this->db->query($sql);
    }
    /*
    * service_insert
    * insert service
    * @input    $ser_stac_id, $ser_departure_date, $ser_car_id_in, $ser_arrivals_date, $ser_dri_id_in, $ser_actual_departure_date,$ser_dri_id_out, $ser_car_id_out, $ser_arrivals_location, $ser_departure_location, $ser_weight, $ser_con_id, $ser_cus_id
    * @output   insert service
    * @author   Natdanai
    * @Create Date  2564-08-06
    */
    public function service_insert($ser_departure_date = NULL, $ser_car_id_in = NULL, $ser_arrivals_date = NULL, $ser_dri_id_in = NULL, $ser_dri_id_out = NULL, $ser_car_id_out = NULL, $ser_arrivals_location = NULL, $ser_departure_location = NULL, $ser_weight = NULL, $ser_con_id = NULL, $ser_stac_id = NULL, $ser_cus_id = NULL)
    {
        $sql = "INSERT INTO $this->table(ser_arrivals_location, ser_arrivals_date, ser_departure_date, ser_actual_departure_date,
                ser_departure_location, ser_weight, ser_con_id, ser_stac_id, ser_cus_id, ser_id_change, ser_dri_id_in,
                ser_dri_id_out, ser_car_id_in, ser_car_id_out, ser_due_date)
        VALUES ('$ser_arrivals_location', '$ser_arrivals_date', '$ser_departure_date', NULL,
                '$ser_departure_location', '$ser_weight', '$ser_con_id', '$ser_stac_id', '$ser_cus_id',
                NULL, '$ser_dri_id_in', '$ser_dri_id_out', '$ser_car_id_in', '$ser_car_id_out', NULL)";
        $this->db->query($sql);
    }

    /*
    * service_update
    * ipdate service
    * @input    $ser_id $ser_type, $ser_departure_date, $ser_car_id_in, $ser_arrivals_date, $ser_dri_id_in, $ser_actual_departure_date, $ser_dri_id_out, $ser_car_id_out, $ser_arrivals_location, $ser_departure_location, $ser_weight, $ser_con_id, $ser_cus_id
    * @output   update service
    * @author   Worarat
    * @Create Date  2564-08-06
    */
    public function service_update($ser_id = NULL, $ser_stac_id = NULL, $ser_departure_date = NULL, $ser_car_id_in = NULL, $ser_arrivals_date = NULL, $ser_dri_id_in = NULL, $ser_actual_departure_date = NULL, $ser_dri_id_out = NULL, $ser_car_id_out = NULL, $ser_arrivals_location = NULL, $ser_departure_location = NULL, $ser_weight = NULL, $ser_con_id = NULL, $ser_cus_id = NULL)
    {
        if ($ser_actual_departure_date == NULL) {
            $sql = "UPDATE  $this->table SET ser_arrivals_location ='$ser_arrivals_location', ser_arrivals_date ='$ser_arrivals_date', ser_departure_date='$ser_departure_date', 
                    ser_actual_departure_date = NULL, ser_departure_location='$ser_departure_location', ser_weight='$ser_weight', ser_con_id='$ser_con_id', ser_stac_id='$ser_stac_id', ser_cus_id='$ser_cus_id', ser_id_change= NULL, ser_dri_id_in='$ser_dri_id_in', ser_dri_id_out='$ser_dri_id_out', ser_car_id_in='$ser_car_id_in', ser_car_id_out='$ser_car_id_out'
                    WHERE ser_id = '$ser_id' ";
        } else {
            $sql = "UPDATE  $this->table SET ser_arrivals_location = '$ser_arrivals_location', ser_arrivals_date = '$ser_arrivals_date', ser_departure_date = '$ser_departure_date', 
                    ser_actual_departure_date = '$ser_actual_departure_date', ser_departure_location='$ser_departure_location', ser_weight='$ser_weight', ser_con_id='$ser_con_id', ser_stac_id='$ser_stac_id', ser_cus_id='$ser_cus_id', ser_id_change= NULL, ser_dri_id_in='$ser_dri_id_in', ser_dri_id_out='$ser_dri_id_out', ser_car_id_in='$ser_car_id_in', ser_car_id_out='$ser_car_id_out'
                    WHERE ser_id = '$ser_id' ";
        }
        $this->db->query($sql);
    }

    /*
    * service_update_invoice
    * update ser_receipt , ser_invoice
    * @input   $ser_receipt, $ser_invoice
    * @output   update service
    * @author   Natdanai
    * @Create Date  2564-12-22
    */
    public function service_update_invoice($ser_id = NULL, $ser_receipt = NULL, $ser_invoice = NULL)
    {
        $sql = "UPDATE  $this->table SET ser_receipt = '$ser_receipt', ser_invoice	= '$ser_invoice' 
            WHERE ser_id = '$ser_id' ";

        $this->db->query($sql);
    }
    /*
    * change_ser_stac_id
    * change ser stac id upon to date
    * @input    to_ser_stac_id, today, today_time
    * @output   change service status container
    * @author   Wirat
    * @Create Date  2564-10-30
    */
    public function change_ser_stac_id($to_ser_stac_id = 3, $today = '', $today_time = '')
    {
        if ($to_ser_stac_id == 3) {
            $sql = "UPDATE $this->table
                    INNER JOIN cdms_container ON cdms_service.ser_con_id = cdms_container.con_id
                    SET ser_stac_id = 3, con_stac_id = 3
                    WHERE ser_arrivals_date < '$today' AND ser_stac_id BETWEEN 1 AND 2;";
        } else if ($to_ser_stac_id == 4) {
            $sql = "UPDATE $this->table
                    INNER JOIN cdms_container ON cdms_service.ser_con_id = cdms_container.con_id
                    SET ser_stac_id = 4, con_stac_id = 4
                    WHERE ser_actual_departure_date <= '$today_time' AND ser_actual_departure_date != '0000-00-00 00:00:00' AND ser_stac_id BETWEEN 1 AND 3";
        }
        // query
        $this->db->query($sql);
    }

    /*
    * update_ser_pay
    * change ser pay
    * @input ser_id, ser_due_date, ser_pay_by, ser_cheque, ser_bank 
    * @output change service pay
    * @author Kittipod
    * @Create Date  2564-12-07
    */

    public function update_ser_pay($ser_id = NULL, $ser_due_date = NULL, $ser_pay_by = NULL, $ser_bnk_id = NULL, $ser_cheque = NULL)
    {
        if ($ser_due_date != '00/00/0000') {
            $sql = "UPDATE $this->table
                    SET ser_due_date = '$ser_due_date', ser_pay_by = '$ser_pay_by', ser_bnk_id = '$ser_bnk_id', ser_cheque = '$ser_cheque'
                    WHERE ser_id = '$ser_id' ";
        } else {
            $sql = "UPDATE $this->table
                    SET ser_due_date = NULL, ser_pay_by = '$ser_pay_by', ser_bnk_id = '$ser_bnk_id', ser_cheque = '$ser_cheque'
                    WHERE ser_id = '$ser_id' ";
        }
        $this->db->query($sql);
    }

    /*
    * update_payment_status
    * update status payment
    * @input ser_id, ser_stap_id
    * @output change status payment
    * @author Natdanai
    * @Create Date  2565-02-23
    */

    public function update_payment_status($ser_id = NULL, $ser_stap_id = NULL)
    {
        $sql = "UPDATE  $this->table SET ser_stap_id = '$ser_stap_id'
            WHERE ser_id = '$ser_id' ";

        $this->db->query($sql);
    }

    /*
    * check_overdue
    * update status payment
    * @input ser_id, ser_stap_id
    * @output change status payment
    * @author Natdanai
    * @Create Date  2565-02-23
    */

    public function check_payment_status($today)
    {
        $sql = "UPDATE $this->table SET ser_stap_id = CASE
                WHEN ser_due_date < '$today' THEN '3'
                ELSE '1'
                END";

        $this->db->query($sql);
    }
}

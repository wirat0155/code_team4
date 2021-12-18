<?php

namespace App\Models;

use App\Models\Da_cdms_service;

/*
* M_cdms_service
* get service
* @author   Natdanai Worarat
* @Create Date  2564-07-29
*/
class M_cdms_service extends Da_cdms_service {

    /*
    * get_all
    * get all service
    * @input    today
    * @output   array of service
    * @author   Natdanai
    * @Create Date  2564-07-30
    */
    public function get_all($today = '') {
        if ($today != '') {
            $sql = "SELECT * FROM $this->table
                    INNER JOIN cdms_customer ON ser_cus_id = cus_id
                    INNER JOIN cdms_container ON ser_con_id = con_id
                    INNER JOIN cdms_container_type ON con_cont_id = cont_id
                    INNER JOIN cdms_status_container ON ser_stac_id = stac_id
                    INNER JOIN cdms_agent ON con_agn_id = agn_id
                    WHERE (ser_actual_departure_date > '$today' OR ser_actual_departure_date LIKE '$today%' OR ser_actual_departure_date IS NULL)
                    AND ser_status = 1
                    ORDER BY ser_id DESC";
        }
        else {
            $sql = "SELECT * FROM $this->table
                    INNER JOIN cdms_customer ON ser_cus_id = cus_id
                    INNER JOIN cdms_container ON ser_con_id = con_id
                    INNER JOIN cdms_container_type ON con_cont_id = cont_id
                    INNER JOIN cdms_status_container ON ser_stac_id = stac_id
                    INNER JOIN cdms_agent ON con_agn_id = agn_id
                    WHERE  ser_status = 1
                    ORDER BY ser_id DESC";
        }
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_num_import
    * get number of import service
    * @input    arrivals_date
    * @output   import number
    * @author   Wirat
    * @Create Date  2564-10-30
    */
    public function get_num_import($arrivals_date = '', $end_date = NULL) {
        if ($end_date == NULL) {
            $sql = "SELECT COUNT(ser_id) AS num_import FROM $this->table
                    WHERE ser_arrivals_date LIKE '$arrivals_date%' AND ser_status = 1" ;
        }
        else {
            $sql = "SELECT COUNT(ser_id) AS num_import FROM $this->table
                    WHERE ser_arrivals_date LIKE '$arrivals_date%'
                    AND (ser_actual_departure_date NOT LIKE '$end_date%'
                    OR ser_actual_departure_date IS NULL)
                    AND ser_status = 1";
        }
        // return as object
        return $this->db->query($sql)->getRow();
    }

    /*
    * get_num_all
    * get number of all service
    * @input    today, yesterday_time
    * @output   all number
    * @author   Wirat
    * @Create Date  2564-10-30
    */
    public function get_num_all($today = '', $yesterday_time = '') {
        $sql = "SELECT COUNT(ser_id) AS num_all FROM $this->table
                WHERE ser_arrivals_date < '$today' AND (ser_actual_departure_date > '$yesterday_time' OR ser_actual_departure_date IS NULL) AND ser_status = 1";

        // return as object
        return $this->db->query($sql)->getRow();
    }

    /*
    * get_num_drop
    * get number of drop service
    * @input    date, date_time, is_today
    * @output   drop number
    * @author   Wirat
    * @Create Date  2564-10-30
    */
    public function get_num_drop($date = '', $date_time = '', $is_today = true) {
        if ($is_today) {
            $sql = "SELECT COUNT(ser_id) AS num_drop FROM $this->table
                    WHERE ser_arrivals_date < '$date'
                    AND (ser_actual_departure_date > '$date_time' 
                    OR ser_actual_departure_date IS NULL)
                    AND ser_status = 1";
        }
        else {
            $sql = "SELECT COUNT(ser_id) AS num_drop FROM $this->table
                    WHERE ser_arrivals_date < '$date' AND (ser_actual_departure_date > '$date_time' OR ser_actual_departure_date IS NULL) AND ser_status = 1";
        }

        // return as object
        return $this->db->query($sql)->getRow();
    }

    /*
    * get_num_drop_range
    * get number of drop service by range of date
    * @input    start date, end date
    * @output   drop number
    * @author   Wirat
    * @Create Date  2564-12-15
    */
    public function get_num_drop_range($start_date = NULL, $end_date = NULL) {
        $sql = "SELECT COUNT(ser_id) AS num_drop FROM $this->table
                WHERE (ser_arrivals_date < '$end_date' AND
                (ser_actual_departure_date IS NULL OR 
                (ser_actual_departure_date LIKE '$start_date%' OR ser_actual_departure_date > '$start_date') 
                AND ser_actual_departure_date NOT LIKE '$end_date%')) 
                AND ser_arrivals_date NOT LIKE '$start_date%'
                AND ser_arrivals_date NOT LIKE '$end_date%'
                AND ser_status = 1";

        // return as object
        return $this->db->query($sql)->getRow();
    }

    /*
    * get_num_export
    * get number of export service
    * @input    date, date_time
    * @output   export number
    * @author   Wirat
    * @Create Date  2564-10-30
    */
    public function get_num_export($date = '', $date_time = '', $is_today = true) {
        if ($is_today) {
            $sql = "SELECT COUNT(ser_id) AS num_export FROM $this->table
                    WHERE ser_actual_departure_date LIKE '$date%' AND ser_actual_departure_date <= '$date_time'
                    AND ser_status = 1";
        }
        else {
            $sql = "SELECT COUNT(ser_id) AS num_export FROM $this->table
                    WHERE ser_actual_departure_date LIKE '$date%' AND ser_status = 1";
        }
        // return as object
        return $this->db->query($sql)->getRow();
    }

    /*
    * get_by_id
    * get service by ser_id
    * @input    ser_id
    * @output   service information
    * @author   Worarat
    * @Create Date  2564-08-07
    */
    public function get_by_id($ser_id) {
        $sql = "SELECT * FROM $this->table
                LEFT JOIN cdms_customer ON ser_cus_id = cus_id
                LEFT JOIN cdms_container ON ser_con_id = con_id
                LEFT JOIN cdms_container_type ON con_cont_id = cont_id
                LEFT JOIN cdms_status_container ON con_stac_id = stac_id
                LEFT JOIN cdms_agent ON con_agn_id = agn_id
                WHERE ser_id ='$ser_id' ";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_by_date_customer
    * get service by customer and date
    * @input    start_date end_date
    * @output   service and caseustomer
    * @author   Kittipod
    * @Create Date  2564-09-10
    */
    public function get_by_date_customer($start_date = NULL, $end_date = NULL) {
        $sql = "SELECT * FROM $this->table
                INNER JOIN cdms_customer ON ser_cus_id = cus_id
                INNER JOIN cdms_container ON ser_con_id = con_id
                INNER JOIN cdms_container_type ON con_cont_id = cont_id
                INNER JOIN cdms_status_container ON con_stac_id = stac_id
                INNER JOIN cdms_agent ON con_agn_id = agn_id
                WHERE ser_status = 1
                AND ser_departure_date BETWEEN '$start_date' AND '$end_date'
                ORDER BY ser_id DESC";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_by_date
    * get service by date
    * @input    start_date, end_date
    * @output   array of service
    * @author   Kittipod
    * @Create Date  2564-09-10
    */
    public function get_by_date($start_date = NULL, $end_date = NULL) {
        $sql = "SELECT * FROM $this->table
                INNER JOIN cdms_customer ON ser_cus_id = cus_id
                INNER JOIN cdms_container ON ser_con_id = con_id
                INNER JOIN cdms_container_type ON con_cont_id = cont_id
                INNER JOIN cdms_status_container ON con_stac_id = stac_id
                INNER JOIN cdms_agent ON con_agn_id = agn_id
                WHERE ser_status = 1 AND (
                    ser_arrivals_date LIKE '$start_date%' OR
                    ser_actual_departure_date LIKE '$end_date%' OR
                    (ser_arrivals_date < '$end_date' AND (ser_actual_departure_date IS NULL OR 
                    (ser_actual_departure_date LIKE '$start_date%' OR ser_actual_departure_date > '$start_date') 
                    AND ser_actual_departure_date NOT LIKE '$end_date%')))
                ORDER BY ser_id DESC";
        // echo $sql;
        // return as array
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_by_id_change
    * get service that change
    * @input    ser_id_change
    * @output   ser_arrivals_date , con_number , agn_company_name , ser_id_change
    * @author   Warisara
    * @Create Date  2564-09-20
    */
    public function get_by_id_change($ser_id_change){
        $sql = "SELECT ser_arrivals_date , con_number , agn_company_name , ser_id_change FROM  cdms_service
        INNER JOIN cdms_container ON ser_con_id=con_id
        INNER JOIN cdms_agent ON agn_id=con_agn_id
        WHERE ser_id='$ser_id_change'";

        // return as object
        return $this->db->query($sql)->getRow();
    }

    /*
    * get_by_ser_con_id
    * get service that change
    * @input    ser_con_id
    * @output   service information
    * @author   Warisara
    * @Create Date  2564-09-20
    */
    public function get_by_ser_con_id($ser_con_id = '', $today = '') {
        $sql = "SELECT * FROM $this->table
                WHERE ser_con_id = '$ser_con_id' AND ser_status = 1 AND (ser_actual_departure_date IS NULL OR ser_actual_departure_date > '$today')
                LIMIT 1";
        // return as object
        return $this->db->query($sql)->getRow();
    }

    /*
    * get_max_id
    * get max ser id
    * @input    -
    * @output   max ser id
    * @author   Wirat
    * @Create Date  2564-11-14
    */
    public function get_max_id() {
        $sql = "SELECT MAX(ser_id) AS max_ser_id FROM $this->table WHERE ser_status = 1";

        // return as object
        return $this->db->query($sql)->getRow();
    }

    /*
    * get_change_service_option
    * get array service for make chamge container dropdown
    * @input    cont_id, con_size_id
    * @output   array of service
    * @author   Benjapon
    * @Create Date  2564-12-07
    */
    public function get_change_service_option($cont_id, $con_size_id){
        $sql = "SELECT con_number,cont_name,ser_id FROM cdms_container 
        INNER JOIN cdms_service ON ser_con_id=con_id 
        INNER JOIN cdms_status_container ON con_stac_id=stac_id 
        INNER JOIN cdms_container_type ON con_cont_id=cont_id 
        WHERE ser_stac_id = 1 OR ser_stac_id = 2 OR ser_stac_id = 3 
        AND ser_departure_date IS NULL AND ser_weight = 0 
        AND cont_id='$cont_id' AND con_size_id='$con_size_id'";
        return $this->db->query($sql)->getResult();
    }

    /*
    * get_arrivals_date_by_ser_id
    * get arrivals date for change container modal
    * @input    ser_id
    * @output   arrivals date in service
    * @author   Wirat
    * @Create Date  2564-12-09
    */
    public function get_arrivals_date_by_ser_id($ser_id) {
        $sql = "SELECT ser_arrivals_date FROM $this->table
                WHERE ser_id = '$ser_id'";
        return $this->db->query($sql)->getRow();
    }

    public function get_number_cont($cont_id = '', $date_time = '') {
        $sql = "SELECT COUNT(ser_id) AS num_cont FROM $this->table
                LEFT JOIN cdms_container ON con_id = ser_con_id
                LEFT JOIN cdms_container_type ON cont_id = con_cont_id
                WHERE cont_id = '$cont_id' AND ser_status = 1 
                AND (ser_actual_departure_date > '$date_time' OR ser_actual_departure_date IS NULL)
                GROUP BY '$cont_id'";
        return $this->db->query($sql)->getRow();
    }

    public function get_by_departure_date($date = NULL) {
        if ($date != NULL) {
                $sql = "SELECT con_number, ser_stac_id, stac_name, cont_name, ser_departure_date, ser_departure_location, dri_name,
                        car_number, cus_company_name FROM cdms_service
                        LEFT JOIN cdms_container ON con_id = ser_con_id
                        LEFT JOIN cdms_status_container ON stac_id = ser_stac_id
                        LEFT JOIN cdms_container_type ON con_cont_id = cont_id
                        LEFT JOIN cdms_driver ON dri_id = ser_dri_id_out
                        LEFT JOIN cdms_car ON car_id = ser_car_id_out
                        LEFT JOIN cdms_customer ON cus_id = ser_cus_id
                        WHERE (ser_departure_date LIKE '$date%' OR ser_departure_date < '$date') AND 
                        (ser_actual_departure_date IS NULL OR ser_actual_departure_date LIKE '$date%')";
            return $this->db->query($sql)->getResult();
        }

    }
    public function get_all_damaged($today = '') {
        if ($today != '') {
            $sql = "SELECT * FROM $this->table
                    INNER JOIN cdms_customer ON ser_cus_id = cus_id
                    INNER JOIN cdms_container ON ser_con_id = con_id
                    INNER JOIN cdms_container_type ON con_cont_id = cont_id
                    INNER JOIN cdms_status_container ON ser_stac_id = stac_id
                    INNER JOIN cdms_agent ON con_agn_id = agn_id
                    WHERE (ser_actual_departure_date > '$today' OR ser_actual_departure_date LIKE '$today%' OR ser_actual_departure_date IS NULL)
                    AND ser_status = 1 AND stac_id = 5 OR stac_id = 6
                    ORDER BY ser_id DESC";
        }
        else {
            $sql = "SELECT * FROM $this->table
                    INNER JOIN cdms_customer ON ser_cus_id = cus_id
                    INNER JOIN cdms_container ON ser_con_id = con_id
                    INNER JOIN cdms_container_type ON con_cont_id = cont_id
                    INNER JOIN cdms_status_container ON ser_stac_id = stac_id
                    INNER JOIN cdms_agent ON con_agn_id = agn_id
                    WHERE  ser_status = 1 AND stac_id = 5 OR stac_id = 6
                    ORDER BY ser_id DESC";
        }
        return $this->db->query($sql)->getResult();
    }

}
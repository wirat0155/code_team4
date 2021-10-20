<?php

namespace App\Models;

use App\Models\Da_cdms_service;

/*
* M_cdms_service
* ดึงข้อมูลบริการ
* @author Natdanai Worarat
* @Create Date 2564-07-29
* @Update Date 2564-09-20
*/

class M_cdms_service extends Da_cdms_service {

    /*
    * get_all
    * ดึงข้อมูลทั้งหมดของตารางบริการ
    * @input 
    * @output array of service
    * @author Natdanai
    * @Create Date 2564-07-30
    * @Update Date  2564-07-30
    */
    public function get_all() {
        $sql = "SELECT * FROM $this->table
                INNER JOIN cdms_customer ON ser_cus_id = cus_id 
                INNER JOIN cdms_container ON ser_con_id = con_id
                INNER JOIN cdms_container_type ON con_cont_id = cont_id
                INNER JOIN cdms_status_container ON ser_stac_id = stac_id
                INNER JOIN cdms_agent ON con_agn_id = agn_id
                WHERE ser_status=1
                ORDER BY ser_id DESC" ;
        return $this->db->query($sql)->getResult();
    }
    /*
    * get_by_id
    * ดึงข้อมูลตามรหัสบริการ
    * @input $ser_id
    * @output service information
    * @author Worarat
    * @Create Date 2564-08-07
    * @Update Date 2564-08-08
    */
    public function get_by_id($ser_id) {
        $sql = "SELECT * FROM $this->table 
                INNER JOIN cdms_customer ON ser_cus_id = cus_id 
                INNER JOIN cdms_container ON ser_con_id = con_id
                INNER JOIN cdms_container_type ON con_cont_id = cont_id
                INNER JOIN cdms_status_container ON con_stac_id = stac_id
                INNER JOIN cdms_agent ON con_agn_id = agn_id
                WHERE ser_id ='$ser_id' ";
        return $this->db->query($sql)->getResult();
    }
    
    /*
    *get_by_date_customer
    * ค้นหาตามวันที่ ของลูกค้า
    * @input start_date end_date
    * @output Servier and Customer or null
    * @author Kittipod
    * @Create Date 2564-09-10
    * @Update Date 2564-09-10
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
    *get_by_date
    * ค้นหาตามวันที่
    * @input start_date end_date
    * @output Servier or null
    * @author Kittipod
    * @Create Date 2564-09-10
    * @Update Date 2564-09-10
    */
    public function get_by_date($start_date = NULL, $end_date = NULL) {
        $sql = "SELECT * FROM $this->table
                INNER JOIN cdms_customer ON ser_cus_id = cus_id 
                INNER JOIN cdms_container ON ser_con_id = con_id
                INNER JOIN cdms_container_type ON con_cont_id = cont_id
                INNER JOIN cdms_status_container ON con_stac_id = stac_id
                INNER JOIN cdms_agent ON con_agn_id = agn_id
                WHERE ser_status=1
                AND ser_departure_date BETWEEN '$start_date' AND '$end_date'
                GROUP BY ser_id
                ORDER BY ser_id DESC";
        return $this->db->query($sql)->getResult();
    }

     /*
    *get_by_id_change
    * ดูประวัติการปลี่ยนตู้
    * @input ser_id_change
    * @output ser_arrivals_date , con_number , agn_company_name , ser_id_change
    * @author Warisara
    * @Create Date 2564-09-20
    * @Update Date 2564-09-20
    */
    public function get_by_id_change($ser_id_change){
        $sql = "SELECT ser_arrivals_date , con_number , agn_company_name , ser_id_change FROM  cdms_service 
        INNER JOIN cdms_container ON ser_con_id=con_id
        INNER JOIN cdms_agent ON agn_id=con_agn_id
        WHERE ser_id='$ser_id_change'";
        return $this->db->query($sql)->getRow();
    }
}
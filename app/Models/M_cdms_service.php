<?php

namespace App\Models;

use App\Models\Da_cdms_service;

/*
    * M_cdms_service
    * ดึงข้อมูลบริการ
    * @author Natdanai 
    * @Create Date 2564-07-29
    * @Update Date
*/
class M_cdms_service extends Da_cdms_service
{

    /*
        * get_all
        * ดึงข้อมูล รหัสบริการ เลขตู้ ชื่อสถานะตู้ ประเภทบริการ ชื่อประเภทตู้ วันที่ตู้ออก ชื่อบริษัทเอเย้นต์ ชื่อบริษัทลูกค้า
        * @input
        * @output array of service
        * @author Natdanai
        * @Create Date 2564-07-30
        * @Update Date
    */
    public function get_all()
    {
        $sql = "SELECT ser_id , con_number , stac_name , ser_type , cont_name , ser_departure_date , agn_company_name , cus_company_name FROM cdms_service 
                INNER JOIN cdms_customer ON ser_cus_id = cus_id 
                INNER JOIN cdms_container ON ser_con_id = con_id
                INNER JOIN cdms_container_type ON con_cont_id = cont_id
                INNER JOIN cdms_status_container ON con_stac_id = stac_id
                INNER JOIN cdms_agent ON con_agn_id = agn_id
                WHERE ser_status=1";
        return $this->db->query($sql)->getResult();
    }
}
<?php
namespace App\Models;
use App\Models\Da_cdms_agent;
    /*
        * M_cdms_agent
        * นำเข้าข้อมูลรายชื่อเอเย่นต์
        * @author Klayuth
        * @Create Date 2564-07-30
        * @Update Date
    */
class M_cdms_agent extends Da_cdms_agent
{
    /*
        * get_all
        * ดึงข้อมูล รหัสเอเย่นต์ ชื่อบริษัทเอเย่นต์ ชื่อเอเย่นต์ นามสกุลเอเย่นต์ เบอร์โทรเอเย่นต์ ที่อยู่เอเย่นต์ สถานะเอเย่นต์ หมายเลขประจำตัวของผู้เสียภาษีของเอเย่นต์ อีเมลเอเย่นต์ 
        * @input
        * @output array of agent
        * @author Klayuth
        * @Create Date 2564-07-30
        * @Update Date 2564-08-02
    */
    public function get_all()
    {
        $sql = "SELECT * FROM $this->table
                WHERE agn_status = 1";
        return $this->db->query($sql)->getResult();
    }   
    /*
        * get_by_id
        * ดึงข้อมูล ไอดีเอเย่นต์ ชื่อบริษัทเอเย่นต์ ชื่อเอเย่นต์ นามสกุลเอเย่นต์ เบอร์โทรเอเย่นต์ ที่อยู่เอเย่นต์ สถานะเอเย่นต์ หมายเลขประจำตัวของผู้เสียภาษีของเอเย่นต์ อีเมลเอเย่นต์ 
        * @input ไอดีเอเย่นต์
        * @output ข้อมูลของไอดีเอเย่นต์ที่นำเข้า
        * @author Klayuth
        * @Create Date 2564-07-30
        * @Update Date 2564-08-02
    */
    public function get_by_id($agn_id)
    {
        $sql = "SELECT * FROM $this->table
                ON agn_id
                WHERE agn_id";
         return $this->db->query($sql)->getResult();
    }
}
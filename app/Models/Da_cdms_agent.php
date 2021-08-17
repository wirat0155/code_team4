<?php

namespace App\Models;

use CodeIgniter\Model;

/*
    * Da_cdms_agent
    * เพิ่ม ลบ รายชื่อเอเย่นต์
    * @author Klayuth,Preechaya
    * @Create Date 2564-07-30
    * @Update Date 2564-08-02
*/

class Da_cdms_agent extends Model{
    protected $table = 'cdms_agent';
    protected $primaryKey = 'agn_id';
    protected $allowedFields = [
        'agn_company_name', 'agn_firstname', 'agn_lastname', 'agn_tel', 'agn_address', 'agn_status', 'agn_tax', 'agn_email'
    ];

    /*
        * delete
        * ลบรายชื่อเอเย่นต์
        * @author Preechaya
        * @Create Date 2564-07-30
        * @Update Date 2564-08-02
    */

    public function delete($agn_id = NULL, bool $purge = false){
        $sql = "UPDATE $this->table SET agn_status=2 
                WHERE agn_id='$agn_id'";
        $this->db->query($sql);
    }

    /*
        * agent_insert
        * เพิ่มรายชื่อข้อมูลเอเย่นต์
        * @author Klayuth
        * @Create Date 2564-08-07
        * @Update Date 2564-08-07
    */

    public function agent_insert($agn_company_name = NULL, $agn_firstname = NULL, $agn_lastname = NULL, $agn_tel = NULL, $agn_address = NULL, $agn_tax = NULL, $agn_email = NULL){
        $sql = "INSERT INTO $this->table(agn_company_name, agn_firstname, agn_lastname, 
        agn_tel, agn_address, agn_tax, agn_email) 
        VALUES ('$agn_company_name', '$agn_firstname', '$agn_lastname', '$agn_tel', '$agn_address', '$agn_tax', '$agn_email')";
        $this->db->query($sql);
    }
    /*
        * agent_update
        * แก้ไขข้อมูลเอเย่นต์
        * @author Klayuth
        * @Create Date 2564-08-07
        * @Update Date 2564-08-07
    */
    public function agent_update($agn_id = NULL, $agn_company_name = NULL, $agn_firstname = NULL, $agn_lastname = NULL, $agn_tel = NULL, $agn_address = NULL, $agn_tax = NULL, $agn_email = NULL){
        $sql = "UPDATE $this->table 
        SET agn_company_name='$agn_company_name',agn_firstname='$agn_firstname'
        ,agn_lastname='$agn_lastname',agn_tel='$agn_tel',agn_address='$agn_address',agn_tax='$agn_tax',agn_email='$agn_email'
        WHERE agn_id='$agn_id'";
        $this->db->query($sql);
    }
}

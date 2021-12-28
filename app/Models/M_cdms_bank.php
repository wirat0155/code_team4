<?php
namespace App\Models;
use App\Models\Da_cdms_user;

/*
* M_cdms_bank
* get bank
* @author   Kittipod
* @Create Date  2564-12-27
*/
class M_cdms_bank extends Da_cdms_bank {
    /*
    * get_all
    * get all bank
    * @input    type
    * @output   array of bank
    * @author   Kittipod
    * @Create Date  2564-12-27
    */
    public function get_all() {

        $sql = "SELECT * FROM `cdms_bank` " ;
        
        return $this->db->query($sql)->getResult();
    }
}

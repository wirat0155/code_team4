<?php

namespace App\Models;

use CodeIgniter\Model;

/*
* Da_cdms_driver
* insert update delete driver
* @author Warisara
* @Create Date 2564-07-30
* @Update Date
*/

class Da_cdms_driver extends Model {
    protected $table = 'cdms_driver';
    protected $primaryKey = 'dri_id ';
    protected $allowedFields = ['dri_name', 'dri_tel', 'dri_card_number', 'dri_license', 'dri_license_type', 'dri_profile_image', 'dri_status', 'dri_date_start', 'dri_date_end', 'dri_car_id'];

    /*
    * delete
    * delete driver
    * @input dri_id
    * @output delete driver
    * @author Warisara
    * @latest author Wirat
    * @Create Date 2564-07-30
    * @Update Date 2564-08-03
    */
    public function delete($dri_id = NULL, bool $purge = false) {
        $sql = "UPDATE $this->table
                SET dri_status = 4
                WHERE dri_id='$dri_id'";
        $this->db->query($sql);
    }

    /*
    * insert
    * insert driver
    * @input dri information
    * @output insert driver
    * @author Thanatip
    * @Create Date 2564-08-05
    * @Update Date 2564-08-05
    */
    public function insert($dri_name = NULL, $dri_tel = NULL, $dri_card_number = NULL, $dri_license = NULL, $dri_license_type = NULL, $dri_profile_image = NULL, $dri_status = NULL, $dri_date_start = NULL, $dri_date_end = NULL, $dri_car_id = NULL) {
        $sql = "INSERT INTO $this->table(dri_name, dri_tel, dri_card_number, dri_license,
            dri_license_type, dri_profile_image, dri_status, dri_date_start, dri_date_end, dri_car_id)
            VALUES ('$dri_name','$dri_tel','$dri_card_number','$dri_license','$dri_license_type','$dri_profile_image','$dri_status','$dri_date_start','$dri_date_end','$dri_car_id')";
        echo $sql;
        $this->db->query($sql);
    }

    /*
    * driver_update
    * update driver
    * @input driver information
    * @output update driver
    * @author Warisara
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
    */
    public function driver_update($dri_id = NULL, $dri_name = NULL, $dri_tel = NULL, $dri_card_number = NULL, $dri_license = NULL, $dri_license_type = NULL, $dri_profile_image = NULL, $dri_status = NULL, $dri_date_start = NULL, $dri_date_end = NULL, $dri_car_id = NULL) {
        if ($dri_profile_image != NULL) {
            $sql = "UPDATE $this->table
                    SET dri_name='$dri_name',
                        dri_tel='$dri_tel',
                        dri_card_number='$dri_card_number',
                        dri_license='$dri_license',
                        dri_license_type='$dri_license_type',
                        dri_profile_image='$dri_profile_image',
                        dri_status= '$dri_status',
                        dri_date_start='$dri_date_start',
                        dri_date_end='$dri_date_end',
                        dri_car_id= '$dri_car_id'
                    WHERE dri_id='$dri_id'";
        }
        else {
            $sql = "UPDATE $this->table
                    SET dri_name='$dri_name',
                        dri_tel='$dri_tel',
                        dri_card_number='$dri_card_number',
                        dri_license='$dri_license',
                        dri_license_type='$dri_license_type',
                        dri_status= '$dri_status',
                        dri_date_start='$dri_date_start',
                        dri_date_end='$dri_date_end',
                        dri_car_id= '$dri_car_id'
                    WHERE dri_id='$dri_id'";
        }

        // query
        $this->db->query($sql);
    }
}

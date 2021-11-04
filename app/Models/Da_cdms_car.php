<?php

namespace App\Models;

use CodeIgniter\Model;

/*
* Da_cdms_car
* insert update delete caพ
* @author Nattanan, Tadsawan, Warisara
* @Create Date 2564-07-29
* @Update Date 2564-10-01
*/

class Da_cdms_car extends Model {
        protected $table = 'cdms_car';
        protected $primaryKey = 'car_id ';
        protected $allowedFields = [
                'car_code', 'car_number', 'car_chassis_number', 'car_brand',
                'car_register_year', 'car_weight', 'car_branch', 'car_fuel_type', 'car_image', 'car_status', 'car_prov_id', 'car_cart_id'
        ];

        /*
        * insert
        * insert car
        * @input car information
        * @output insert
        * @author Nattanan, Tadsawan
        * @Create Date 2564-08-07
        * @Update Date 2564-08-09
        */
        function insert(
                $car_code = NULL,
                $car_number = NULL,
                $car_chassis_number = NULL,
                $car_brand = NULL,
                $car_register_year = NULL,
                $car_weight = NULL,
                $car_branch = NULL,
                $car_fuel_type = NULL,
                $car_image = NULL,
                $car_prov_id = NULL,
                $car_cart_id = NULL,
                $car_status = NULL
        ) {
                $sql = "INSERT INTO $this->table VALUES (NULL, '$car_code', '$car_number', '$car_chassis_number', '$car_brand', '$car_register_year','$car_weight', '$car_branch', '$car_fuel_type', '$car_image', '$car_status', '$car_prov_id', '$car_cart_id')";
                $this->db->query($sql);
        }

        /*
        * delete
        * delete car
        * @input car_id
        * @output delete car
        * @author Nattanan Tadsawan
        * @Create Date 2564-07-30
        * @Update Date 2564-07-30
        */
        public function delete($car_id = NULL, bool $purge = false) {
                $sql = "UPDATE $this->table 
                        SET car_status=4 
                        WHERE car_id='$car_id'";
                $this->db->query($sql);
        }

        /*
        * car_update
        * update car type
        * @input car information
        * @output update car
        * @author Nattanan Tadsawan
        * @Create Date 2564-08-06
        * @Update Date
        */
        public function car_update(
                $car_id = NULL,
                $car_code = NULL,
                $car_number = NULL,
                $car_chassis_number = NULL,
                $car_brand = NULL,
                $car_register_year = NULL,
                $car_weight = NULL,
                $car_branch = NULL,
                $car_fuel_type = NULL,
                $car_image = NULL,
                $car_status = NULL,
                $car_prov_id = NULL,
                $car_cart_id = NULL
        ) {
                $sql = "UPDATE $this->table
                                SET car_code = '$car_code', car_number = '$car_number', car_chassis_number = '$car_chassis_number', car_brand = '$car_brand'
                                        ,car_register_year = '$car_register_year', car_weight = '$car_weight', car_branch = '$car_branch', car_fuel_type = '$car_fuel_type'
                                        , car_image = '$car_image', car_status = '$car_status', car_prov_id = '$car_prov_id', car_cart_id = '$car_cart_id'
                                WHERE car_id = '$car_id' ";
                $this->db->query($sql);
        }
}

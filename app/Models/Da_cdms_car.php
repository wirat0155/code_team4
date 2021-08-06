<?php
namespace App\Models;
use CodeIgniter\Model;

/*
* Da_cdms_car
* เพิ่ม ลบ แก้ไขข้อมุลรถ
* @author Nattanan
* @Create Date 2564-07-29
* @Update Date
*/
class Da_cdms_car extends Model {
    protected $table = 'cdms_car';
    protected $primaryKey = 'car_id ';
    protected $allowedFields = ['car_code', 'car_number', 'car_chassis_number', 'car_brand',
                                'car_register_year', 'car_weight', 'car_branch', 'car_fuel_type', 'car_image', 'car_status', 'car_prov_id', 'car_cart_id'];

    /*
    * delete
    * ลบรถ
    * @input car_id
    * @output ลบรถ
    * @author Nattanan
    * @Create Date 2564-07-30
    * @Update Date
    */
    public function delete($car_id= NULL, bool $purge = false) {
        $sql = "UPDATE $this->table 
        SET car_status=4 
        WHERE car_id='$car_id'";
                $this->db->query($sql);
    }

    /*
    * update
    * แก้ไขรถ
    * @input car_id
    * @output แก้ไขรถ
    * @author Nattanan
    * @Create Date 2564-08-06
    * @Update Date
    */
    public function update($car_id= NULL, bool $purge = false){
        $sql = "UPDATE $this->table
                SET car_code = ?, car_number = ?, car_chassis_number = ?, car_brand = ?,
                        car_register_year = ?, car_weight = ?, car_branch = ?, car_fuel_type = ?, car_image = ?, car_status = ?, car_prov_id = ?, car_cart_id = ?
                WHERE car_id = '$car_id' "; // ? = ค่าที่เราจะใส่ไปอยู่แล้ว , อย่าใช้ " ' " เพราะอาจจะเออเร่อได้
        $this->db->query($sql, array($this->car_code ,$this->car_number ,$this->car_chassis_number ,$this->car_brand ,$this->car_register_year 
                                                                ,$this->car_weight ,$this->car_branch ,$this->car_fuel_type ,$this->car_image ,$this->car_status 
                                                                ,$this->car_prov_id ,$this->car_cart_id); //ถ้า SQL ที่เราใส่มี ? ต้องใส่ array ด้วย

    }

    
}
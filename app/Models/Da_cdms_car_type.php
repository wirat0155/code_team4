<?php
namespace App\Models;
use CodeIgniter\Model;

/*
* Da_cdms_car_type
* insert update delete car type
* @author   Wirat
* @Create Date  2564-08-08
*/
class Da_cdms_car_type extends Model {
    protected $table = 'cdms_car_type';
    protected $primaryKey = 'cart_id';
    protected $allowedFields = ['cart_name', 'cart_status'];

    /*
    * insert
    * insert car type
    * @input    cart_name
    * @output   insert car type
    * @author   Wirat
    * @Create Date  2564-09-10
    */
    public function insert($cart_name = NULL, $cart_image = NULL) {
        $sql = "INSERT INTO $this->table(cart_name, cart_status, cart_image) VALUES('$cart_name', 1, '$cart_image')";
        $this->db->query($sql);
    }

    /*
    * car_type_update
    * update car type
    * @input    cart_id, cart_name
    * @output   update car type
    * @author   Wirat
    * @Create Date  2564-09-12
    */
    public function car_type_update($cart_id = NULL, $cart_name = NULL) {
        $sql = "UPDATE $this->table SET cart_name = '$cart_name' WHERE cart_id = '$cart_id'";
        $this->db->query($sql);
    }

    /*
    * delete
    * delete car type
    * @input    cart_id
    * @output   delete car type
    * @author   Wirat
    * @Create Date  2564-08-12
    */
    public function delete($cart_id = NULL, bool $purge = false) {
        $sql = "UPDATE $this->table SET cart_status = 2 WHERE cart_id = '$cart_id'";
        $this->db->query($sql);
    }

    /*
    * restore
    * restore car type
    * @input    cart_id
    * @output   restore car type
    * @author   Tadsawan
    * @Create Date  2564-10-23
    */
    public function restore($cart_id = NULL) {
        $sql = "UPDATE $this->table SET cart_status = 1 WHERE cart_id = '$cart_id'";
        $this->db->query($sql);
    }

    /*
    * car_type_delete
    * delete car type
    * @input    cart_id
    * @output   delete car type
    * @author   Tadsawan
    * @Create Date  2564-12-08
    */
    public function car_type_delete($cart_id = NULL, bool $purge = false) {
        $sql = "UPDATE $this->table SET cart_status = 3 WHERE cart_id = '$cart_id'";
        $this->db->query($sql);
    }
}
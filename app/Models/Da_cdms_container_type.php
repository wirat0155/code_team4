<?php
namespace App\Models;
use CodeIgniter\Model;

/*
* Da_cdnms_container_type
* insert update delete container type
* @author   Wirat
* @Create Date  2564-09-10
*/
class Da_cdms_container_type extends Model {
    protected $table = 'cdms_container_type';
    protected $primaryKey = 'cont_id';
    protected $allowedFields = ['cont_name', 'cont_status', 'cont_image'];

    /*
    * insert
    * insert container type
    * @input    cont_name
    * @output   insert container type
    * @author   Wirat
    * @Create Date  2564-09-10
    */
    public function insert($cont_name = NULL, $cont_image = NULL) {
        $sql = "INSERT INTO $this->table(cont_name, cont_status, cont_image) VALUES('$cont_name', 1, '$cont_image')";
        $this->db->query($sql);
    }

    /*
    * container_type_update
    * update container type
    * @input    cont_id, cont_name
    * @output   update container type
    * @author   Wirat
    * @Create Date  2564-09-12
    */
    public function container_type_update($cont_id = NULL, $cont_name = NULL, $cont_image = NULL) {
        if ($cont_image == NULL) {
            $sql = "UPDATE $this->table SET cont_name = '$cont_name' WHERE cont_id = '$cont_id'";
        }
        else {
            $sql = "UPDATE $this->table SET cont_name = '$cont_name', cont_image = '$cont_image' WHERE cont_id = '$cont_id'";
        }
        $this->db->query($sql);
    }
    /*
    * delete
    * delete container type
    * @input    cont_id
    * @output   delete container type
    * @author   Benjapon
    * @Create Date  2564-08-06
    */
    public function change_status($cont_id = NULL, bool $purge = false) {
        $sql = "UPDATE $this->table SET cont_status = 2 WHERE cont_id = '$cont_id'";
        $this->db->query($sql);
    }

    /*
    * restore
    * restore container type
    * @input    cont_id
    * @output   restore container type
    * @author   Tadsawan
    * @Create Date  2564-10-04
    */
    public function restore($cont_id = NULL) {
        $sql = "UPDATE $this->table SET cont_status = 1 WHERE cont_id = '$cont_id'";
        $this->db->query($sql);
    }

    /*
    * container_type_delete
    * delete container type
    * @input    cont_id
    * @output   delete container type
    * @author   Tadsawan
    * @Create Date  2564-12-08
    */
    public function delete($cont_id = NULL, bool $purge = false) {
        $sql = "UPDATE $this->table SET cont_status = 3 WHERE cont_id = '$cont_id'";
        $this->db->query($sql);
    }

}
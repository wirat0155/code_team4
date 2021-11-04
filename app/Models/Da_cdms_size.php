<?php

namespace App\Models;

use CodeIgniter\Model;

/*
* Da_cdms_size
* insert update delete size
* @author Wirat
* @Create Date 2564-08-07
* @Update Date 2564-09-12
*/
class Da_cdms_size extends Model {
    protected $table = 'cdms_size';
    protected $primaryKey = 'size_id';
    protected $allowedFields = [
        'size_name', 'size_width_in', 'size_length_in', 'size_height_in', 'size_width_out', 'size_length_out', 'size_height_out', 'size_status'
    ];

    /*
    * insert
    * insert size
    * @input size_name, size_width_in, size_length_in, size_height_in, size_width_out, size_length_out, size_height_out, size_image
    * @output insert size
    * @author Wirat
    * @Create Date 2564-09-10
    * @Update Date 2564-09-10
    */
    public function insert($size_name = NULL, $size_width_in = NULL, $size_length_in = NULL, $size_height_in = NULL, $size_width_out = NULL, $size_length_out = NULL, $size_height_out = NULL, $size_image = NULL) {
        $sql = "INSERT INTO $this->table VALUES(NULL, '$size_name', '$size_width_in', '$size_length_in', '$size_height_in', '$size_width_out', '$size_length_out', '$size_height_out', 1,'$size_image')";
        $this->db->query($sql);
    }

    /*
    * size_update
    * update size
    * @input size_name, size_width_in, size_length_in, size_height_in, size_width_out, size_length_out, size_height_out
    * @output update size
    * @author Wirat
    * @Create Date 2564-09-12
    * @Update Date 2564-09-12
    */
    public function size_update($size_id = NULL, $size_name = NULL, $size_width_in = NULL, $size_length_in = NULL, $size_height_in = NULL, $size_width_out = NULL, $size_length_out = NULL, $size_height_out = NULL) {
        $sql = "UPDATE $this->table SET size_name = '$size_name', size_width_in = '$size_width_in', size_length_in = '$size_length_in', size_height_in = '$size_height_in', size_width_out = '$size_width_out', size_length_out = '$size_length_out', size_height_out = '$size_height_out' WHERE size_id = '$size_id'";
        $this->db->query($sql);
    }


    /*
    * delete
    * delete size
    * @input size_id
    * @output delete size
    * @author Natthadanai
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
    */
    public function delete($size_id = NULL, bool $purge = false) {
        $sql = "UPDATE $this->table SET size_status=2 WHERE size_id='$size_id'";
        $this->db->query($sql);
    }

    /*
    * restore
    * restore size
    * @input size_id
    * @output restore size
    * @author Tadsawan
    * @Create Date 2564-10-22
    * @Update Date 2564-10-22
    */
    public function restore($size_id = NULL) {
        $sql = "UPDATE $this->table SET size_status = 1 WHERE size_id = '$size_id'";
        $this->db->query($sql);
    }
}

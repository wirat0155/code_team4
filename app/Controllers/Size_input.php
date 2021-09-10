<?php

namespace App\Controllers;

use App\Models\M_cdms_size;

/*
* Size_input
* เพิ่มขนาดตู้คอนเทนเนอร์
* @author Wirat
* @Create Date 2564-09-10
* @Update Date 2564-09-10
*/

class Size_input extends Cdms_controller {
    /*
    * size_insert
    * เพิ่มตู้คอนเทนเนอร์
    * @input size_name, size_width_in, size_length_in, size_height_in, size_width_out, size_length_out, size_height_out
    * @output -
    * @author Wirat
    * @Create Date 2564-09-10
    * @Update Date 2564-09-10
    */
    public function size_insert() {
        $size_name = $this->request->getPost('size_name');
        $size_width_in = $this->request->getPost('size_width_in');
        $size_length_in = $this->request->getPost('size_length_in');
        $size_height_in = $this->request->getPost('size_height_in');
        $size_width_out = $this->request->getPost('size_width_out');
        $size_length_out = $this->request->getPost('size_length_out');
        $size_height_out = $this->request->getPost('size_height_out');

        $m_size = new M_cdms_size();
        $m_size->insert($size_name, $size_width_in, $size_length_in, $size_height_in, $size_width_out, $size_length_out, $size_height_out);

        $last_size = $m_size->get_last();
        echo json_encode($last_size);
    }
}

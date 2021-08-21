<?php

namespace App\Controllers;

use App\Models\M_cdms_size;

/*
* Size_show
* ดึงข้อมูลขนาดตู้
* @author Wirat
* @Create Date 2564-08-06
* @Update Date 2564-08-06
*/
class Size_show extends Cdms_controller {
    /*
    * get_size_ajax
    * ดึงข้อมูลขนาดตู้
    * @input cus information
    * @output ดึงข้อมูลขนาดตู้
    * @author Wirat
    * @Create Date 2564-08-06
    * @Update Date 2564-08-06
    */
    public function get_size_ajax() {
        $m_size = new M_cdms_size();
        $size_id = $this->request->getPost('size_id');
        $size_information = $m_size->get_by_id($size_id);
        echo json_encode($size_information);
    }
}
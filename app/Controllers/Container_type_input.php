<?php

namespace App\Controllers;
use App\Models\M_cdms_container_type;

/*
* Container_type_input
* เพิ่มประเภทตู้คอนเทนเนอร์
* @author Wirat
* @Create Date 2564-09-10
* @Update Date 2564-09-10
*/

class Container_type_input extends Cdms_controller {
    /*
    * container_type_insert
    * เพิ่มประเภทตู้คอนเทนเนอร์
    * @input cont_name
    * @output เพิ่มประเภทตู้คอนเทนเนอร์
    * @author Wirat
    * @Create Date 2564-09-10
    * @Update Date 2564-09-10
    */
    public function container_type_insert() {
        $cont_name = $this->request->getPost('cont_name');

        $m_cont = new M_cdms_container_type();
        $m_cont->insert($cont_name);
        $last_cont = $m_cont->get_last();
        echo json_encode($last_cont);
    }
}

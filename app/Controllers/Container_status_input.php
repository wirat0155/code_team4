<?php

namespace App\Controllers;
use App\Models\M_cdms_status_container;

/*
* Container_status_input
* เพิ่มสถานะตู้
* @author Wirat
* @Create Date 2564-09-10
* @Update Date 2564-09-10
*/

class Container_status_input extends Cdms_controller {
    /*
    * container_status_insert
    * เพิ่มสถานะตู้คอนเทนเนอร์
    * @input stac_name
    * @output เพิ่มสถานะตู้คอนเทนเนอร์
    * @author Wirat
    * @Create Date 2564-09-10
    * @Update Date 2564-09-10
    */
    public function container_status_insert() {
        $stac_name = $this->request->getPost('stac_name');

        $m_stac = new M_cdms_status_container();
        $m_stac->insert($stac_name);
        $last_stac = $m_stac->get_last();
        echo json_encode($last_stac);
    }
}

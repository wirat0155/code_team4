<?php

namespace App\Controllers;
use App\Models\M_cdms_container_type;

/*
* Container_type_edit
* แก้ไขประเภทตู้คอนเทนเนอร์
* @author Wirat
* @Create Date 2564-09-12
* @Update Date 2564-09-12
*/

class Container_type_edit extends Cdms_controller {
    /*
    * container_type_update
    * แก้ไขประเภทตู้คอนเทนเนอร์
    * @input cont_id, cont_name
    * @output แก้ไขประเภทตู้คอนเทนเนอร์
    * @author Wirat
    * @Create Date 2564-09-12
    * @Update Date 2564-09-12
    */
    public function container_type_update() {
        $cont_id = $this->request->getPost('cont_id');
        $cont_name = $this->request->getPost('cont_name');

        $m_cont = new M_cdms_container_type();
        $m_cont->container_type_update($cont_id, $cont_name);
        $this->response->redirect(base_url() . '/Dashboard/dashboard_show');
    }
}

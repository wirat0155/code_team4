<?php

namespace App\Controllers;
use App\Models\M_cdms_status_container;

/*
* Container_status_edit
* แก้ไขสถานะตู้
* @author Wirat
* @Create Date 2564-09-12
* @Update Date 2564-09-12
*/

class Container_status_edit extends Cdms_controller {
    /*
    * container_status_update
    * แก้ไขสถานะตู้คอนเทนเนอร์
    * @input stac_id, stac_name
    * @output แก้ไขสถานะตู้คอนเทนเนอร์
    * @author Wirat
    * @Create Date 2564-09-12
    * @Update Date 2564-09-12
    */
    public function container_status_update() {
        $stac_id = $this->request->getPost('stac_id');
        $stac_name = $this->request->getPost('stac_name');

        $m_stac = new M_cdms_status_container();
        $m_stac->status_container_update($stac_id, $stac_name);
        $this->response->redirect(base_url() . '/public/Dashboard/dashboard_show');
    }
}

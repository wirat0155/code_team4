<?php

namespace App\Controllers;

use App\Models\M_cdms_status_container;

/*
* Set_up_status_container
* manage status container
* @author Tadsawan
* @Create Date 2564-10-22
* @Update Date 2564-10-22
*/
class Set_up_status_container extends Cdms_controller
{
    /*
    * status_container_show
    * show status container
    * @input -
    * @output array of status_container
    * @author Tadsawan
    * @Create Date 2564-10-22
    * @Update Date 2564-10-22
    */
    public function status_container_show()
    {
        $_SESSION['menu'] = 'Set_up';
        $_SESSION['menu_set_up'] = 'status_container';

        // get status container
        $m_stac = new M_cdms_status_container();
        $data['arr_status_container'] = $m_stac->get_all_status();

        $this->output('v_set_up_status_container', $data);
    }

    /*
    * get_all_status_container
    * show status container
    * @input -
    * @output array of status container
    * @author Thanatip
    * @Create Date 2564-09-10
    * @Update Date 2564-09-10
    */
    public function get_all_status_container()
    {
        $m_stac = new M_cdms_status_container();
        $data['arr_status_container'] = $m_stac->get_all();
        return json_encode($data['arr_status_container']);
    }

    /*
    * status_container_delete
    * delete status container
    * @input stac_id
    * @output delete status container
    * @author Natadanai
    * @Create Date 2564-08-12
    * @Update Date 2564-08-12
    */
    public function status_container_delete()
    {
        $stac_id = $this->request->getPost('stac_id');
        $m_stac = new M_cdms_status_container();
        $m_stac->delete($stac_id);

        return json_encode('pass');
    }

     /*
    * status_container_restore
    * restore status container
    * @input cont_id
    * @output restore status container
    * @author Tadsawan
    * @Create Date 2564-22-04
    * @Update Date 2564-22-04
    */
    public function status_container_restore()
    {
        $stac_id = $this->request->getPost('stac_id');
        $m_stac = new M_cdms_status_container();
        $m_stac->restore($stac_id);

        return json_encode('pass');
    }

    /*
    * status_container_insert
    * insert status container
    * @input stac_name
    * @output insert status container
    * @author Tadsawan
    * @Create Date 2564-10-22
    * @Update Date 2564-10-22
    */
    public function status_container_insert() {
        $m_status_container = new M_cdms_status_container();

        // status container information
        $stac_name = $this->request->getPost('stac_name');

        // เพิ่มข้อมูลสถานะตู้
        $m_status_container->insert($stac_name);
        $this->response->redirect(base_url() . '/Set_up_status_container/status_container_show');
    }

}

<?php

namespace App\Controllers;

use App\Models\M_cdms_agent;
use App\Models\M_cdms_container;
use App\Models\M_cdms_size;
use App\Models\M_cdms_container_type;
use App\Models\M_cdms_status_container;

/*
* Container_show
* show container list, delete conainer
* @author Wirat
* @Create Date 2564-07-29
* @Update Date 2564-08-12
*/

class Container_show extends Cdms_controller
{
    /*
    * container_show_ajax
    * show container list
    * @input -
    * @output array of container
    * @author Wirat
    * @Create Date 2564-07-29
    * @Update Date 2564-07-29
    */
    public function container_show_ajax()
    {
        $_SESSION['menu'] = 'Container_show';
        $m_con = new M_cdms_container();
        $data['arr_container'] = $m_con->get_all();
        $this->output('v_container_showlist', $data);
    }

    public function get_container_ajax()
    {
        $m_con = new M_cdms_container();
        $con_id = $this->request->getPost('con_id');
        $con_information = $m_con->get_by_id($con_id);

        echo json_encode($con_information);
    }
    /*
    * container_detail
    * show container detain page
    * @input con_id
    * @output show container detain page
    * @author Preechaya
    * @Create Date 2564-08-12
    * @Update Date 2564-08-12
    */
    public function container_detail($con_id)
    {
        $_SESSION['menu'] = 'Container_show';

        // container id
        $m_con = new M_cdms_container();
        $data['arr_container'] = $m_con->get_by_id($con_id);

        // container type
        $m_size = new M_cdms_size();
        $data['arr_size'] = $m_size->get_by_id($data['arr_container'][0]->con_size_id);

        // container type
        $m_cont = new M_cdms_container_type();
        $data['arr_container_type'] = $m_cont->get_all();

        // status container
        $m_stac = new M_cdms_status_container();
        $data['arr_status_container'] = $m_stac->get_all();

        // data agent
        $m_agn = new M_cdms_agent();
        $data['arr_agent'] = $m_agn->get_by_id($data['arr_container'][0]->con_agn_id);

        $this->output('v_container_show_information', $data);
    }

    /*
    * container_delete
    * delete container
    * @input con_id
    * @output delete container
    * @author Wirat
    * @Create Date 2564-07-29
    * @Update Date 2564-07-29
    */
    public function container_delete()
    {
        $m_con = new M_cdms_container();
        $con_id = $this->request->getPost('con_id');
        $m_con->delete($con_id);
        return $this->response->redirect(base_url('/Container_show/container_show_ajax'));
    }

    /*
    * check_container_number
    * serch container vy container number
    * @input con_number
    * @output container information
    * @author Wirat
    * @Create Date 2564-08-07
    * @Update Date 2564-08-07
    */
    public function check_container_number()
    {
        $m_con = new M_cdms_container();
        $con_number = $this->request->getPost('con_number');
        $arr_container = $m_con->is_con_number_exist($con_number);
        if (count($arr_container) == 1) {
            return json_encode('found');
        } else {
            return json_encode('not found');
        }
    }
}

<?php

namespace App\Controllers;

use App\Models\M_cdms_agent;
use App\Models\M_cdms_container;
use App\Models\M_cdms_size;
use App\Models\M_cdms_container_type;
use App\Models\M_cdms_status_container;

/*
* Container_show
* แสดงรายการตู้คอนเนอร์ และลบตู้คอนเทนเนอร์
* @author Wirat
* @Create Date 2564-07-29
* @Update Date
*/

class Container_show extends Cdms_controller
{
    /*
    * container_show_ajax
    * แสดงรายการตู้คอนเทนเนอร์
    * @input -
    * @output array of container
    * @author Wirat
    * @Create Date 2564-07-29
    * @Update Date
    */
    public function container_show_ajax()
    {
        $_SESSION['menu'] = 'Container_show';
        $m_con = new M_cdms_container();
        $data['arr_container'] = $m_con->get_all();
        $this->output('v_container_showlist', $data);
    }

    /*
    * container_show_ajax
    * แสดงข้อมูลตู้คอนเทนเนอร์
    * @input -
    * @output array of container
    * @author Preechaya
    * @Create Date 2564-08-12
    * @Update Date
    */
    public function container_detail($con_id)
    {
        $_SESSION['menu'] = 'Container_show';
        $m_con = new M_cdms_container();
        $data['arr_container'] = $m_con->get_by_id($con_id);

        $m_size = new M_cdms_size();
        $data['arr_size'] = $m_size->get_by_id($data['arr_container'][0]->con_size_id);

        // container type
        $m_cont = new M_cdms_container_type();
        $data['arr_container_type'] = $m_cont->get_all();

        // status container
        $m_stac = new M_cdms_status_container();
        $data['arr_status_container'] = $m_stac->get_all();

        $m_agn = new M_cdms_agent();
        $data['arr_agent'] = $m_agn->get_by_id($data['arr_container'][0]->con_agn_id);

        $this->output('v_container_show_information', $data);
    }

    /*
    * container_delete
    * ลบตู้คอนเทนเนอร์
    * @input con_id
    * @output ลบตู้คอนเทนเนอร์ และกลับไปแสดงรายการตู้คอนเทนเนอร์
    * @author Wirat
    * @Create Date 2564-07-29
    * @Update Date
    */
    public function container_delete()
    {
        $m_con = new M_cdms_container();
        $con_id = $this->request->getPost('con_id');
        $m_con->delete($con_id);
        return $this->response->redirect(base_url('/public/Container_show/container_show_ajax'));
    }

    /*
    * check_container_number
    * ค้นหาหมายเลขตู้คอนเทนเนอร์
    * @input con_number
    * @output ค้นหาหมายเลขตู้คอนเทนเนอร์
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

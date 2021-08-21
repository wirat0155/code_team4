<?php

namespace App\Controllers;

use App\Models\M_cdms_agent;
use App\Models\M_cdms_container;
use App\Models\M_cdms_size;
use App\Models\M_cdms_container_type;
use App\Models\M_cdms_status_container;

/*
* Container_input
* เรียกหน้าจอเพิ่มตู้คอนเทนเนอร์ และเพิ่มตู้คอนเทนเนอร์
* @author Wirat
* @Create Date 2564-08-06
* @Update Date 2564-08-07
*/

class Container_edit extends Cdms_controller {
    /*
    * container_input
    * เรียกหน้าจอเพิ่มตู้คอนเทนเนอร์
    * @input con_id
    * @output หน้าจอเพิ่มตู้คอนเทนเนอร์
    * @author Wirat
    * @Create Date 2564-08-06
    * @Update Date 2564-08-07
    */
    public function container_edit($con_id = NULL) {
        $_SESSION['menu'] = 'Container_show';
        if (!isset($_SESSION['con_number_error']) || $_SESSION['con_number_error'] == '') {
            $_SESSION['con_number_error'] = '';
        }

        // get container data
        $m_con = new M_cdms_container();
        $data['arr_container'] = $m_con->get_by_id($con_id);

        // get agent agent
        $m_agn = new M_cdms_agent();
        $data['arr_agent'] = $m_agn->get_by_id($data['arr_container'][0]->con_agn_id);
        // print_r($data['arr_agent']);

        // get dropdown
        // container size
        $m_size = new M_cdms_size();
        $data['arr_size'] = $m_size->get_all();

        // size information
        $data['arr_con_size'] = $m_size->get_by_id($data['arr_container'][0]->con_size_id);

        // container type
        $m_cont = new M_cdms_container_type();
        $data['arr_container_type'] = $m_cont->get_all();

        // status container
        $m_stac = new M_cdms_status_container();
        $data['arr_status_container'] = $m_stac->get_all();

        // call container input view
        $this->output('v_container_edit', $data);
    }

    /*
    * container_update
    * แก้ไขตู้คอนเทนเนอร์
    * @input ข้อมูลตู้คอนเทนเนอร์ ข้อมูลเอเย่นต์
    * @output แก้ไขตู้คอนเทนเนอร์ เพิ่ม/แก้ไขเอเย่นต์ หรือชเพิ่ม/แก้ไขเอเย่นต์
    * @author Wirat
    * @Create Date 2564-08-06
    * @Update Date 2564-08-07
    */
    public function container_update() {
        // container information
        $con_id = $this->request->getPost('con_id');
        $con_number = $this->request->getPost('con_number');
        $con_old_number = $this->request->getPost('con_old_number');
        $con_max_weight = $this->request->getPost('con_max_weight');
        $con_tare_weight = $this->request->getPost('con_tare_weight');
        $con_net_weight = $this->request->getPost('con_net_weight');
        $con_cube = $this->request->getPost('con_cube');

        // other information
        $con_size_id = $this->request->getPost('con_size_id');
        $con_cont_id = $this->request->getPost('con_cont_id');
        $con_stac_id = $this->request->getPost('con_stac_id');

        // upload image
        $con_image = $this->request->getPost('con_image');
        // echo "hi";
        // print_r($this->request->getPost());

        $m_con = new M_cdms_container();

        // test data for statement coverage test
        // $con_id = 18;
        // $con_number = "ABCD 12345 0";
        // $con_old_number = "ABCD 12344 0";

        if ($con_number != $con_old_number) {
            // edit con_number
            $arr_con_number = $m_con->is_con_number_exist($con_number);
            if (count($arr_con_number) >= 1) {
                // duplicate con_number
                $_SESSION['con_number_error'] = 'หมายเลขตู้นี้ใช้แล้ว';
                $this->container_edit($con_id);
                exit();
            }
        }

        // agent information
        $agn_id = $this->request->getPost('agn_id');
        $agn_company_name = $this->request->getPost('agn_company_name');
        $agn_firstname = $this->request->getPost('agn_firstname');
        $agn_lastname = $this->request->getPost('agn_lastname');
        $agn_tel = $this->request->getPost('agn_tel');
        $agn_address = $this->request->getPost('agn_address');
        $agn_tax = $this->request->getPost('agn_tax');
        $agn_email = $this->request->getPost('agn_email');

        // load agent model
        $m_agn = new M_cdms_agent();
        if ($agn_id == '') {
            // new agent
            // insert agent
            $m_agn->insert($agn_company_name, $agn_firstname, $agn_lastname, $agn_tel, $agn_address, $agn_tax, $agn_email);
            // get agn_id back
            $max_id_agent = $m_agn->get_max_id();
            $con_agn_id = $max_id_agent[0]->agn_id;
        } else {
            // old agent
            // update agent
            $con_agn_id = $this->request->getPost('agn_id');
            $m_agn->agent_update($agn_id, $agn_company_name, $agn_firstname, $agn_lastname, $agn_tel, $agn_address, $agn_tax, $agn_email);
        }

        // update container
        $_SESSION['con_number_error'] = '';
        $m_con->container_update($con_id, $con_number, $con_max_weight, $con_tare_weight, $con_net_weight, $con_cube, $con_size_id, $con_cont_id, $con_agn_id, $con_stac_id);
        $this->response->redirect(base_url() . '/public/Container_show/container_show_ajax');
    }
}

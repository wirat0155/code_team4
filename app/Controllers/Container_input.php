<?php namespace App\Controllers;
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
class Container_input extends Cdms_controller
{
    /*
    * container_input
    * แสดงรายการตู้คอนเทนเนอร์
    * @input -
    * @output array of container
    * @author Wirat
    * @Create Date 2564-07-29
    * @Update Date
    */
    public function container_input()
    {
        $data = [];
        if (!isset($_SESSION['con_number_error']) || $_SESSION['con_number_error'] == '') {
            $_SESSION['con_number_error'] = '';
        }
        // get dropdown
        // container size
        $M_size = new M_cdms_size();
        $data['arr_size'] = $M_size->get_all();

        // first size information
        $data['first_size'] = $M_size->get_first();

        // container type
        $M_cont = new M_cdms_container_type();
        $data['arr_container_type'] = $M_cont->get_all();

        // status container
        $M_stac = new M_cdms_status_container();
        $data['arr_status_container'] = $M_stac->get_all();

        // call container input view
        $this->output('v_container_input', $data);
    }

    public function container_insert() {
        
        // container information
        $con_number = $this->request->getPost('con_number');
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
        
        $M_con = new M_cdms_container();
        // check con_number duplicate
        $arr_container = $M_con->is_con_number_exist($con_number);
        if (count($arr_container) >= 1) {
            $_SESSION['con_number_error'] = 'หมายเลขตู้นี้ใช้แล้ว';
            $this->container_input();
        } else {
            // new agent
            // insert agent
            // รอบิ๊ก แพรว
            // $con_agn_id = select กลับมา
            
            // old agent
            // update agent
            // รอบิ๊ก แพรว
            $con_agn_id = $this->request->getPost('agn_id');
            
            // get agn id
            
    
            // insert container
            $_SESSION['con_number_error'] = '';
            $M_con->insert($con_number, $con_max_weight, $con_tare_weight, $con_net_weight, $con_cube, $con_size_id, $con_cont_id, $con_agn_id, $con_stac_id);
            $this->response->redirect(base_url() . '/public/Container_show/container_show_ajax');
        }
    }
}
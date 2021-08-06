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
        // get dropdown
        // container size
        $M_size = new M_cdms_size();
        $data['arr_size'] = $M_size->get_all();

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
        $M_con = new M_cdms_container();

        // container information
        $con_number = $this->request->getPost('con_number');
        $con_max_weight = $this->request->getPost('con_max_weight');
        $con_tare_weight = $this->request->getPost('con_tare_weight');
        $con_net_weight = $this->request->getPost('con_net_weight');
        $con_cube = $this->request->getPost('con_cube');
        
        // other information
        $con_size_id = $this->request->getPost('con_size_id');
        $con_cont_id = $this->request->getPost('con_cont_id');
        $con_agn_id = $this->request->getPost('con_agn_id');
        $con_stac_id = $this->request->getPost('con_stac_id');

        // upload image
        $con_image = $this->request->getPost('con_image');

        // insert container
        $M_con->insert($con_number, $con_max_weight, $con_tare_weight, $con_net_weight, $con_cube, $con_size_id, $con_cont_id, $con_agn_id, $con_stac_id);
    }
}
<?php namespace App\Controllers;
use App\Models\M_cdms_Car;

/*
* Car_show
* แสดงรายการ
* @author 
* @Create Date 
* @Update Date
*/
class Car_input extends Cdms_controller
{
    /*
    * car_input
    * แสดงรายการ
    * @input -
    * @output array of 
    * @author 
    * @Create Date 
    * @Update Date
    */
    public function car_input()
    {
        // call car input view
        $data = [];
        $this->output('v_car_input', $data);
    }

    public function car_insert() {
        $M_con = new M_cdms_car();

        // car information
        $con_number = $this->request->getPost('con_number');
        $con_max_weight = $this->request->getPost('con_max_weight');
        $con_tare_weight = $this->request->getPost('con_tare_weight');
        $con_net_weight = $this->request->getPost('con_net_weight');
        $con_cube = $this->request->getPost('con_cube');
        $con_status = $this->request->getPost('con_status');
        
        // other information
        $con_size_id = $this->request->getPost('con_size_id');
        $con_cont_id = $this->request->getPost('con_cont_id');
        $con_agn_id = $this->request->getPost('con_agn_id');
        $con_stac_id = $this->request->getPost('con_stac_id');

        // upload image
        $con_image = $this->request->getPost('con_image');
    }
}
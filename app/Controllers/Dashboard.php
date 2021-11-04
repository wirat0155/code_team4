<?php

namespace App\Controllers;

use App\Models\M_cdms_car_type;
use App\Models\M_cdms_size;
use App\Models\M_cdms_status_container;
use App\Models\M_cdms_container_type;

/*
* Dashboard
* show dashboard page
* @author  Wirat, Klayuth, Natthadanai, Benjapon
* @Create Date 2564-08-12
* @Update Date 2564-09-12
*/
class Dashboard extends Cdms_controller
{
    /*
    * dashboard_show
    * show dashboard page
    * @input -
    * @output array of car_type, status_container, size, container_type
    * @author  Wirat, Klayuth, Natthadanai, Benjapon
    * @Create Date 2564-08-12
    * @Update Date 2564-08-12
    */
    public function dashboard_show()
    {
        $_SESSION['menu'] = 'Dashboard';

        // get all car type
        $m_cart = new M_cdms_car_type();
        $data['arr_car_type'] = $m_cart->get_all();
        // print_r($data['arr_cart_type']);
        // get container size

        $m_size = new M_cdms_size();
        $data['arr_size'] = $m_size->get_all();

        // get status container
        $m_stac = new M_cdms_status_container();
        $data['arr_status_container'] = $m_stac->get_all();

        // get container type
        $m_cont = new M_cdms_container_type();
        $data['arr_container_type'] = $m_cont->get_all();


        $this->output('v_dashboard', $data);
    }

}

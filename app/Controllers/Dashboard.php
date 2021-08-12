<?php

namespace App\Controllers;

use App\Models\M_cdms_car_type;
use App\Models\M_cdms_size;
use App\Models\M_cdms_status_container;
use App\Models\M_cdms_container_type;

class Dashboard extends Cdms_controller
{
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
        $m_cont = new M_cdms_status_container();
        $data['arr_container_type'] = $m_cont->get_all();

        // get container type
        $m_stac = new M_cdms_container_type();
        $data['arr_status_container'] = $m_stac->get_all();


        $this->output('v_dashboard', $data);
    }

    public function car_type_delete()
    {
        $cart_id = $this->request->getPost('cart_id');
        $m_cart = new M_cdms_car_type();
        $m_cart->delete($cart_id);

        return json_encode('pass');
    }

    public function size_delete()
    {
        $size_id = $this->request->getPost('size_id');
        $m_size = new M_cdms_size();
        $m_size->delete($size_id);

        return json_encode('pass');
    }

    public function container_type_delete()
    {
        $cont_id = $this->request->getPost('cont_id');
        $m_cont = new M_cdms_container_type();
        $m_cont->delete($cont_id);

        return json_encode('pass');
    }

    public function status_container_delete()
    {
        $stac_id = $this->request->getPost('stac_id');
        $m_stac = new M_cdms_status_container();
        $m_stac->delete($stac_id);

        return json_encode('pass');
    }
}

<?php namespace App\Controllers;
use App\Models\M_cdms_car_type;
class Dashboard extends Cdms_controller
{
    public function dashboard_show() {
        $_SESSION['menu'] = 'Dashboard';

        // get all car type
        $m_cart = new M_cdms_car_type();
        $data['arr_car_type'] = $m_cart->get_all();
        // print_r($data['arr_cart_type']);

        $this->output('v_dashboard', $data);
    }

    public function car_type_delete() {
        $cart_id = $this->request->getPost('cart_id');
        $m_cart = new M_cdms_car_type();
        $m_cart->delete($cart_id);

        return json_encode('pass');
    }
}
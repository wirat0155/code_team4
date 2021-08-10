<?php namespace App\Controllers;
use App\Models\M_cdms_car;

class Car_show extends Cdms_controller
{
    public function car_show_ajax()
    {
        $_SESSION['menu'] = 'Car_show';
        $m_car = new M_cdms_car();
        $data['arr_car'] = $m_car->get_all();
        $this->output('v_car_showlist', $data);
    }
    public function car_delete() {
        $m_car = new M_cdms_car();
        $m_car->delete($this->request->getPost('car_id'));
        return $this->response->redirect(base_url('/public/Car_show/car_show_ajax'));
    }

}
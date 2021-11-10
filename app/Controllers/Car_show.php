<?php

namespace App\Controllers;

use App\Models\M_cdms_car;
use App\Models\M_cdms_province;
use App\Models\M_cdms_car_type;

/*
* Car_show
* show car list, delete car
* @author   Warisara
* @Create Date  2564-07-30
*/
class Car_show extends Cdms_controller {
    /*
    * car_show_ajax
    * show car list
    * @input    -
    * @output   array of car
    * @author   Warisara
    * @Create Date  2564-07-30
    */
    public function car_show_ajax() {
        $_SESSION['menu'] = 'Car_show';
        $m_car = new M_cdms_car();
        $data['arr_car'] = $m_car->get_all();
        $this->output('v_car_showlist', $data);
    }

    /*
    * car_delete
    * delete car
    * @input    car_id
    * @output   delete car
    * @author   Warisara
    * @Create Date  2564-07-30
    */
    public function car_delete() {
        $m_car = new M_cdms_car();
        $m_car->delete($this->request->getPost('car_id'));
        return $this->response->redirect(base_url('/Car_show/car_show_ajax'));
    }

    /*
    * car_deteail
    * show car detail page
    * @input    car_id
    * @output   show car detail page
    * @author   Warisara
    * @Create Date  2564-08-12
    */
    public function car_detail($car_id) {
        $_SESSION['menu'] = 'Car_show';

        $m_car = new M_cdms_car();
        $data['arr_car'] = $m_car->get_by_id($car_id);

        $this->output('v_car_show_information', $data);
    }
}

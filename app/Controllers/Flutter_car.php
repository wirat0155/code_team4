<?php
namespace App\Controllers;

class Flutter_car extends Cdms_controller {
    public function get_all() {
        $arr_car = $this->m_car->get_all();
        echo json_encode($arr_car);
    }
    public function get_by_id($car_id = NULL) {
        $obj_car = $this->m_car->get_by_id($car_id);
        echo json_encode($obj_car);
    }
}

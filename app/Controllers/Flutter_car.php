<?php
namespace App\Controllers;

class Flutter_car extends Cdms_controller {
    public function get_all() {
        $arr_car = $this->m_car->get_all();
        echo json_encode($arr_car);
    }
}

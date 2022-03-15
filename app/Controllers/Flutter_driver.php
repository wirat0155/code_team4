<?php
namespace App\Controllers;

class Flutter_driver extends Cdms_controller {
    public function get_all() {
        $arr_dri = $this->m_dri->get_all();
        echo json_encode($arr_dri);
    }
}
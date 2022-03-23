<?php
namespace App\Controllers;

class Flutter_container_type extends Cdms_controller {
    public function get_all() {
        // 3 = get only status container is export 
        $arr_container_type = $this->m_cont->get_all();
        return json_encode($arr_container_type);
    }
}
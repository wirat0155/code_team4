<?php
namespace App\Controllers;

class Flutter_container extends Cdms_controller {
    public function get_all() {
        // 3 = get only status container is export 
        $arr_con = $this->m_con->get_all(3);
        return json_encode($arr_con);
    }
}
<?php
namespace App\Controllers;

class Flutter_size extends Cdms_controller {
    public function get_all() {
        // 3 = get only status container is export 
        $arr_size = $this->m_size->get_all();
        return json_encode($arr_size);
    }

}
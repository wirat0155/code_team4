<?php
namespace App\Controllers;

class Flutter_agent extends Cdms_controller {
    public function get_all() {
        // 2 = Sort by agn_company_name ascending
        $arr_agent = $this->m_agn->get_all(2);
        return json_encode($arr_agent);
    }

}
<?php
namespace App\Controllers;

class Flutter_customer extends Cdms_controller {
    public function get_all() {
        // 2 = Sort by agn_company_name ascending
        $arr_customer = $this->m_cus->get_all(2);
        return json_encode($arr_customer);
    }

}
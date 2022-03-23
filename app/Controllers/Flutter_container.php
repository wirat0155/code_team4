<?php
namespace App\Controllers;

class Flutter_container extends Cdms_controller {
    public function get_all() {
        // 3 = get only status container is export 
        $arr_con = $this->m_con->get_all(1);
        return json_encode($arr_con);
    }

    public function get_by_id($con_id) {
        $obj_con = $this->m_con->get_by_id($con_id);
        return json_encode($obj_con);
    }

    public function insert() {
        $obj = json_decode(file_get_contents('php://input'), true);
        $this->m_con->insert(
            $obj["con_number"],
            $obj["con_max_weight"],
            $obj["con_tare_weight"],
            $obj["con_net_weight"],
            $obj["con_cube"],
            $obj["con_size_id"],
            $obj["con_cont_id"],
            $obj["con_agn_id"],
            $obj["con_stac_id"],
        );
        return json_encode('insert success');
    }

    public function delete($con_id = NULL) {
        $this->m_con->delete($con_id);
        return json_encode($con_id);
    }
}
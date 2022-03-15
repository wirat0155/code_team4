<?php
namespace App\Controllers;

class Flutter_service extends Cdms_controller {
    public function get_all() {
        $arr_ser = $this->m_ser->get_all();
        echo json_encode($arr_ser);
    }

    public function get_by_id() {
        $ser_id = $this->request->getPost('ser_id');
        $obj_ser = $this->m_ser->get_by_id($ser_id);
        echo json_encode($obj_ser);
    }

    public function insert() {
        $obj = $this->request->getPost();
        $obj["ser_stac_id"] = '1'; // 1 = container status 'import'

            $this->m_ser->service_insert(
                $obj["ser_departure_date"],
                $obj["ser_car_id_in"],
                $obj["ser_arrivals_date"],
                $obj["ser_dri_id_in"],
                $obj["ser_dri_id_out"],
                $obj["ser_car_id_out"],
                $obj["ser_arrivals_location"],
                $obj["ser_departure_location"],
                $obj["ser_weight"],
                $obj["ser_con_id"],
                $obj["ser_stac_id"],
                $obj["ser_cus_id"]
            );
        $this->m_con->update_con_stac_id_by_con_id($obj["ser_con_id"], $obj["ser_stac_id"]);
        return json_encode("success");
    }
}
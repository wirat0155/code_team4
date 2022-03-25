<?php
namespace App\Controllers;

class Flutter_service extends Cdms_controller {
    public function get_all() {
        $arr_ser = $this->m_ser->get_all();
        echo json_encode($arr_ser);
    }

    public function get_by_id($ser_id) {
        $obj_ser = $this->m_ser->get_by_id($ser_id);
        echo json_encode($obj_ser);
    }

    public function insert() {
        $obj = json_decode(file_get_contents('php://input'), true);
        $con = [
            "con_stac_id" => $obj["ser_stac_id"]
        ];

        $this->m_con->update($obj['ser_con_id'], $con);
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

        $max_ser_id = $this->m_ser->get_max_id();

        if($max_ser_id->max_ser_id < 100){
            $format_invoice = "0" . $max_ser_id->max_ser_id;
        }else if($max_ser_id->max_ser_id < 10){
            $format_invoice = "0" . "0" . $max_ser_id->max_ser_id;
        }else{
            $format_invoice = $max_ser_id->max_ser_id;
        }
        $today = date("ymd");
        $ser_receipt = "RE" . $today . $format_invoice;
        $ser_invoice = "INV" . $today . $format_invoice;

        $this->m_ser->service_update_invoice($max_ser_id->max_ser_id, $ser_receipt, $ser_invoice);

        return json_encode("success");
    }

    public function update() {
        $obj = json_decode(file_get_contents('php://input'), true);
        $obj_service = $this->m_ser->where('ser_id', $obj['ser_id'])->first();

        $obj_container = [
            'con_stac_id' => '4'
        ];
        $obj_new_container = [
            'con_stac_id' => '1'
        ];
        $this->m_con->update($obj_service['ser_con_id'], $obj_container);
        $this->m_con->update($obj['ser_con_id'], $obj_new_container);
        $this->m_ser->update($obj['ser_id'], $obj);
        return json_encode($obj['ser_con_id']);
    }


    public function delete($ser_id) {
        $obj_service = $this->m_ser->where('ser_id', $ser_id)->first();
        $this->m_ser->delete($ser_id);
        
        $obj_con = [
            'con_stac_id' => '4'
        ];
        $this->m_con->update($obj_service['ser_con_id'], $obj_con);
        return json_encode('success');
    }
}
<?php

namespace App\Controllers;

use App\Models\M_cdms_car_type;
use App\Models\M_cdms_container_type;
use App\Models\M_cdms_size;
use App\Models\M_cdms_status_container;
use App\Models\M_cdms_service;

/*
* Dashboard
* show dashboard page
* @author  Wirat, Klayuth, Natthadanai, Benjapon
* @Create Date  2564-08-12
*/
class Dashboard extends Cdms_controller
{
    /*
    * dashboard_show
    * show dashboard page
    * @input    -
    * @output   array of car_type, status_container, size, container_type
    * @author   Wirat, Klayuth, Natthadanai, Benjapon
    * @Create Date  2564-08-12
    */
    public function dashboard_show()
    {
        $_SESSION['menu'] = 'Dashboard';

        // get all car type
        $m_cart = new M_cdms_car_type();
        $data['arr_car_type'] = $m_cart->get_all();
        // print_r($data['arr_cart_type']);
        // get container size

        $m_size = new M_cdms_size();
        $data['arr_size'] = $m_size->get_all();

        // get status container
        $m_stac = new M_cdms_status_container();
        $data['arr_status_container'] = $m_stac->get_all();

        // get container type
        $m_cont = new M_cdms_container_type();
        $data['arr_container_type'] = $m_cont->get_all();

        $number_of_day = 15;
        $data['arr_dates'] = $this->get_day($number_of_day);

        $data['arr_num_import'] = array();
        $data['arr_num_export'] = array();
        $data['arr_num_drop'] = array();

        // loop for get number of import in each day
        for ($i = 0; $i < $number_of_day; $i++) {
            $num_import = $this->get_number_import($data['arr_dates'][$i]);
            array_push($data['arr_num_import'], $num_import);
        }

        // loop for get number of export in each day
        for ($i = 0; $i < $number_of_day; $i++) {
            $num_export = $this->get_number_export($data['arr_dates'][$i]);
            array_push($data['arr_num_export'], $num_export);
        }

        // loop for get number of drop in each day
        for ($i = 0; $i < $number_of_day; $i++) {
            $num_drop = $this->get_number_drop($data['arr_dates'][$i]);
            array_push($data['arr_num_drop'], $num_drop);
        }

        $data['arr_num_cont'] = $this->get_number_cont();
        // echo array_sum($data['arr_num_cont']);
        // print_r($data['arr_num_cont']);
        $this->output('v_dashboard', $data);
    }

    public function get_day($number_of_day = 15) {
        date_default_timezone_set("Asia/Bangkok");
        $arr_dates = array();
        $arr_num_import = array();
        $arr_num_export = array();
        $arr_num_drop = array();
        for($i = 0; $i < $number_of_day; $i++) {
            array_push($arr_dates, date("Y-m-d", strtotime(($i * -1) . " day")));
        }
        return $arr_dates;
    }
    public function get_number_import($date) {
        $m_ser = new M_cdms_service();
        $num_import = $m_ser->get_num_import($date);
        return $num_import->num_import;
        // return $num_import->num_import;
    }

    public function get_number_export($date = NULL) {
        date_default_timezone_set("Asia/Bangkok");
        $m_ser = new M_cdms_service();
        $today = date('Y-m-d');
        $today_time = date('Y-m-d H:i:s');
        $num_export = $m_ser->get_num_export($date, $today_time, ($date == $today));
        return $num_export->num_export;
    }

    public function get_number_drop($date = NULL) {
        date_default_timezone_set("Asia/Bangkok");
        $today = date('Y-m-d');
        if ($date == $today) {
            $time = date("H:i:s");
            $date_time = $date . " " . $time;
        }
        else {
            $date_time = $date . " 23:59:59";
        }
        $m_ser = new M_cdms_service();
        $num_drop = $m_ser->get_num_drop($date, $date_time, ($date == $today));
        return $num_drop->num_drop;
    }

    public function get_number_cont() {
        $arr_num_cont = array();

        $today_time = date('Y-m-d H:i:s');
        $m_ser = new M_cdms_service();
        for ($i = 1; $i <= 6; $i++) {
            $num_cont = $m_ser->get_number_cont($i , $today_time);

            if ($num_cont->num_cont == NULL) {
                array_push($arr_num_cont, 0);
            }
            else {
                array_push($arr_num_cont, $num_cont->num_cont);
            }
        }
        return $arr_num_cont;
    }
}

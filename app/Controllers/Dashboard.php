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
        date_default_timezone_set("Asia/Bangkok");
        $_SESSION['menu'] = 'Dashboard';

        // get all car type
        $m_cart = new M_cdms_car_type();
        $data['arr_car_type'] = $m_cart->get_all();
        // get container size
            $m_size = new M_cdms_size();
        $data['arr_size'] = $m_size->get_all();

        // get status container
        $m_stac = new M_cdms_status_container();
        $data['arr_status_container'] = $m_stac->get_all();

        // get container type
        $m_cont = new M_cdms_container_type();
        $data['arr_container_type'] = $m_cont->get_all();

        $m_ser = new M_cdms_service();

        $today = date('Y-m-d');
        $today_time = date('Y-m-d H:i:s');
        $yesterday = date('Y-m-d', strtotime('-1 Days'));
        $yesterday_time = date('Y-m-d H:i:s', strtotime('-1 Days'));

        if (isset($_GET['date_range'])) {
            $date_range = $this->request->getGet('date_range');
            $start_date = substr($date_range, 6, 4) . '-' . substr($date_range, 3, 2) . '-' . (substr($date_range, 0, 2));
            $end_date = substr($date_range, 19, 4) . '-' . substr($date_range, 16, 2) . '-' . (substr($date_range, 13, 2));

            $data['arr_service'] = $m_ser->get_by_date($start_date, $end_date);

            $data['arrivals_date'] = $date_range;
        } else {
            // get service data upon by date
            $data['arr_service'] = $m_ser->get_all($today);
            // get all the time service
            $data['arr_service_temp'] = $m_ser->get_all();

            // no service data
            if (count($data['arr_service']) == 0) {
                $start = date('Y/m/d');
                $end = date('Y/m/d');
            }
            // has service data
            else {
                $index = count($data['arr_service_temp']) - 1;
                $start = $data['arr_service_temp'][$index]->ser_arrivals_date;
                $end = $data['arr_service_temp'][0]->ser_arrivals_date;
                $data['arrivals_date'] = substr($start, 8, 2) . '/' . substr($start, 5, 2) . '/' . (substr($start, 0, 4)) . ' - ' . date("d-m-Y");
            }

            $date['yesterday'] = $yesterday;
            $date['today'] = $today;

            // count import service
            // today and yesterday
            $obj_num_import = $m_ser->get_num_import($today);
            $obj_num_yesterday_import = $m_ser->get_num_import($yesterday);
            $data['num_import'] = $obj_num_import->num_import;
            $data['num_yesterday_import'] = $obj_num_yesterday_import->num_import;

            // count export service
            // today and yesterday
            $obj_num_export = $m_ser->get_num_export($today, $today_time, true);
            $obj_num_yesterady_export = $m_ser->get_num_export($yesterday, $yesterday_time, false);
            $data['num_export'] = $obj_num_export->num_export;
            $data['num_yesterday_export'] = $obj_num_yesterady_export->num_export;

            // count drop service
            // today and yesterday
            $obj_num_drop = $m_ser->get_num_drop($today, $today_time, true);
            $data['num_drop'] = $obj_num_drop->num_drop;
            $obj_num_yesterday_drop = $m_ser->get_num_drop($yesterday, $yesterday_time, false);
            $data['num_yesterday_drop'] = $obj_num_yesterday_drop->num_drop;

            // count all service yesterday
            $obj_num_yesterday_all = $m_ser->get_num_all($today, $yesterday_time);
            $data['num_yesterday_all'] = $obj_num_yesterday_all->num_all;
        }

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
        $data['today'] = date('Y-m-d');
        $data['arr_today_service'] = $this->get_today_service();

        $this->output('v_dashboard', $data);
    }

    /*
    * get_today_service
    * get today service
    * @input    -
    * @output   array of service
    * @author   Wirat
    * @Create Date  2564-12-11
    */
    public function get_today_service() {
        date_default_timezone_set("Asia/Bangkok");
        $today = date('Y-m-d');
        $m_ser = new M_cdms_service();
        $arr_today_service = $m_ser->get_by_departure_date($today);
        return $arr_today_service;
    }

    /*
    * get_day
    * get date
    * @input    number of day
    * @output   array of date
    * @author   Wirat
    * @Create Date  2564-12-11
    */
    public function get_day($number_of_day = 15) {
        date_default_timezone_set("Asia/Bangkok");
        $arr_dates = array();
        for($i = 0; $i < $number_of_day; $i++) {
            array_push($arr_dates, date("Y-m-d", strtotime(($i * -1) . " day")));
        }
        return $arr_dates;
    }

    /*
    * get_number_import
    * get number of import
    * @input    date
    * @output   number of import in the date
    * @author   Wirat
    * @Create Date  2564-12-11
    */
    public function get_number_import($date) {
        $m_ser = new M_cdms_service();
        $num_import = $m_ser->get_num_import($date);
        return $num_import->num_import;
    }

    /*
    * get_number_export
    * get number of export
    * @input    date
    * @output   number of export in the date
    * @author   Wirat
    * @Create Date  2564-12-11
    */
    public function get_number_export($date = NULL) {
        date_default_timezone_set("Asia/Bangkok");
        $m_ser = new M_cdms_service();
        $today = date('Y-m-d');
        $today_time = date('Y-m-d H:i:s');
        $num_export = $m_ser->get_num_export($date, $today_time, ($date == $today));
        return $num_export->num_export;
    }

    /*
    * get_number_drop
    * get number of drop
    * @input    date
    * @output   number of drop in the date
    * @author   Wirat
    * @Create Date  2564-12-11
    */
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

    /*
    * get_number_cont
    * get number of each container type
    * @input    -
    * @output   array of number each container type
    * @author   Wirat
    * @Create Date  2564-12-11
    */
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

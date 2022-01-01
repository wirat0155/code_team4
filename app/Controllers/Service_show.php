<?php

namespace App\Controllers;

use App\Models\M_cdms_size;
use App\Models\M_cdms_container_type;
use App\Models\M_cdms_status_container;
use App\Models\M_cdms_service;
use App\Models\M_cdms_customer;
use App\Models\M_cdms_container;
use App\Models\M_cdms_driver;
use App\Models\M_cdms_car;
use App\Models\M_cdms_agent;
use App\Models\M_cdms_cost_detail;
use App\Models\M_cdms_change_container_log;
use App\Models\M_cdms_bank;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;


/*
* Service_show
* show service list, delete service
* @author   Natdanai Worarat
* @Create Date  2564-07-29
*/
class Service_show extends Cdms_controller {
    /*
    * service_show_ajax
    * show service list
    * @input    -
    * @output   array of service
    * @author   Natdanai, Kittipod
    * @Create Date  2564-07-29
    */
    public function service_show_ajax() {
        date_default_timezone_set("Asia/Bangkok");

        //display the converted time
        $_SESSION['menu'] = 'Service_show';
        // load service model
        $m_ser = new M_cdms_service();
        // load container model
        $m_con = new M_cdms_container();

        $today = date('Y-m-d');
        $today_time = date('Y-m-d H:i:s');
        $yesterday = date('Y-m-d', strtotime('-1 Day'));
        $yesterday_time = date('Y-m-d H:i:s', strtotime('-1 Day'));
        $time = date('H:i:s');

        $data['arr_con'] = $m_con->get_all(1);

        if(isset($_GET['date_range'])){
            $_SESSION['set_date_picker_service'] = true;

            $date_range = $this->request->getGet('date_range');
            $start_date = substr($date_range,6,4).'-'.substr($date_range,3,2).'-'.(substr($date_range,0,2));
            $end_date = substr($date_range,19,4).'-'.substr($date_range,16,2).'-'.(substr($date_range,13,2));

            $end_date_time = $end_date . " " . $time;

            $data['arr_service'] = $m_ser->get_by_date($start_date, $end_date);
            $data['arr_service'] = $this->change_service_status_by_date($data['arr_service'], $start_date, $end_date);
            $data['arrivals_date'] = $date_range;

            // get data in service report card
            $obj_num_import = $m_ser->get_num_import($start_date, $end_date);
            $data['num_import'] = $obj_num_import->num_import;

            $obj_num_export = $m_ser->get_num_export($end_date, $end_date_time, $today == $end_date);
            $data['num_export'] = $obj_num_export->num_export;

            $obj_num_drop = $m_ser->get_num_drop_range($start_date, $end_date);
            $data['num_drop'] = $obj_num_drop->num_drop;
        }
        else{
            $_SESSION['set_date_picker_service'] = false;
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
                $data['arrivals_date'] = substr($start,8,2).'/'.substr($start,5,2).'/'.(substr($start,0,4)) . ' - '. date("d-m-Y");
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
        // print_r($data['arr_service']);

        // load Bank model
        $m_bnk = new M_cdms_bank();
        $data['arr_bank'] = $m_bnk->get_all();

        $this->output('v_service_showlist', $data);
    }

    /*
    * change_service_status_by_date
    * set service stac id, name in date
    * @input    arr_server, start_date, end_date
    * @output   set service stac id, name in date
    * @author   Wirat
    * @Create Date  2564-12-15
    */
    public function change_service_status_by_date($arr_service = [], $start_date = NULL, $end_date = NULL) {
        for ($i = 0; $i < count($arr_service); $i++) {
            if (substr($arr_service[$i]->ser_actual_departure_date, 0, 10) == $end_date) {
                $arr_service[$i]->ser_stac_id = 4;
                $arr_service[$i]->stac_name = "Export";
            }
            else if (substr($arr_service[$i]->ser_arrivals_date, 0, 10) == $start_date) {
               $arr_service[$i]->ser_stac_id = 1;
               $arr_service[$i]->stac_name = "Import";
            }
            else {
                $arr_service[$i]->ser_stac_id = 3;
                $arr_service[$i]->stac_name = "Ready";
            }
        }
        return $arr_service;
    }

    /*
    * service_delete
    * delete service
    * @input    ser_id
    * @output   delete service
    * @author   Worarat
    * @Create Date  2564-07-30
    */
    public function service_delete() {
        $m_ser = new M_cdms_service();
        $m_ser->delete($this->request->getPost('ser_id'));
        return $this->response->redirect(base_url('/Service_show/service_show_ajax'));
    }

    /*
    * service_detail
    * show service detail page
    * @input    ser_id
    * @output   show service detail page
    * @author   Tadsawan
    * @Create Date  2564-08-12
    */
    public function service_detail($ser_id) {
        $_SESSION['menu'] = 'Service_show';

        // get service
        $m_ser = new M_cdms_service();
        $data['obj_service'] = $m_ser->get_by_id($ser_id);

         // get container
        $m_con = new M_cdms_container();
        $data['obj_container'] = $m_con->get_by_id($data['obj_service'][0]->ser_con_id);

        // size name
        $m_size = new M_cdms_size();
        $data['arr_size'] = $m_size->get_by_id($data['obj_container'][0]->con_size_id);

        // container type
        $m_cont = new M_cdms_container_type();
        $data['arr_container_type'] = $m_cont->get_by_id($data['obj_container'][0]->con_cont_id);

        // status container
        $m_stac = new M_cdms_status_container();
        $data['arr_status_container'] = $m_stac->get_by_id($data['obj_container'][0]->con_stac_id);

        // driver name
        $m_dri = new M_cdms_driver();
        $data['arr_driver_in'] = $m_dri->get_by_id($data['obj_service'][0]->ser_dri_id_in);
        $data['arr_driver_out'] = $m_dri->get_by_id($data['obj_service'][0]->ser_dri_id_out);

         // car name
        $m_car = new M_cdms_car();
        $data['arr_car_in'] = $m_car->get_by_id($data['obj_service'][0]->ser_car_id_in);
        $data['arr_car_out'] = $m_car->get_by_id($data['obj_service'][0]->ser_car_id_out);

        // get customer
        $m_cus = new M_cdms_customer();
        $data['obj_customer'] = $m_cus->get_by_id($data['obj_service'][0]->ser_cus_id);

        // get agent agent
        $m_agn = new M_cdms_agent();
        $data['obj_agent'] = $m_agn->get_by_id($data['obj_container'][0]->con_agn_id);

        $data['arr_change_container'] = $this->get_change_container_log($ser_id);

        $data['index_ser_id'] = 0;
        for ($i = 0; $i < count($data['arr_change_container']); $i++) {
            if (gettype($data['arr_change_container'][$i]) == "string") {
                $data['index_ser_id'] = $i;
            }
        }
        
        if (gettype($data['arr_change_container'][0]) != "string") {
            $data['obj_original_container'] = $m_ser->get_arrivals_date_by_ser_id($data['arr_change_container'][0]->chl_old_ser_id);
        }
        $this->output('v_service_show_information', $data);
    }

    /*
    * get_cost_ajax
    * get cost in service
    * @input    ser_id
    * @output   get cost in service
    * @author   Wirat
    * @Create Date  2564-09-15
    */
    public function get_cost_ajax() {
        $m_cosd = new M_cdms_cost_detail();
        $ser_id = $this->request->getPost('ser_id');
        $arr_service_cost = $m_cosd->get_by_ser_id($ser_id);

        echo json_encode($arr_service_cost);
    }

    /*
    * cost_insert
    * insert cost in service
    * @input    cosd_ser_id, cosd_name, cosd_cost
    * @output   insert cost in service
    * @author   Natdanai
    * @Create Date  2564-09-15
    */
    public function cost_insert() {
        $m_cosd = new M_cdms_cost_detail();

        $cosd_ser_id = $this->request->getPost('cosd_ser_id');
        $cosd_name = $this->request->getPost('cosd_name');
        $cosd_cost = $this->request->getPost('cosd_cost');
        $cosd_quantity = $this->request->getPost('cosd_quantity');
        $cosd_status_vat = $this->request->getPost('cosd_status_vat');
        $cosd_payment_date = date("Y-m-d", strtotime("+7 day"));

        $m_cosd->cost_insert($cosd_name, $cosd_cost, $cosd_payment_date, $cosd_ser_id, $cosd_quantity, $cosd_status_vat);
        $last_cost = $m_cosd->get_last();

        echo json_encode($last_cost);
    }

    /*
    * cost_update
    * update cost in service
    * @input    cosd_id, cosd_name, cosd_cost
    * @output   update cost in service
    * @author   Natdanai
    * @Create Date  2564-09-15
    */
    public function cost_update() {
        $m_cosd = new M_cdms_cost_detail();

        $cosd_id = $this->request->getPost('cosd_id');
        $cosd_name = $this->request->getPost('cosd_name');
        $cosd_cost = $this->request->getPost('cosd_cost');
        $cosd_quantity = $this->request->getPost('cosd_quantity');
        $cosd_status_vat = $this->request->getPost('cosd_status_vat');

        $m_cosd->cost_update($cosd_id, $cosd_name, $cosd_cost, $cosd_quantity, $cosd_status_vat);

        echo json_encode('update complete');
    }

    /*
    * cost_delete
    * delete cost in service
    * @input    cosd_id
    * @output   delete cost in service
    * @author   Natdanai
    * @Create Date  2564-09-15
    */
    public function cost_delete() {
        $m_cosd = new M_cdms_cost_detail();

        $cosd_id = $this->request->getPost('cosd_id');

        $m_cosd->delete($cosd_id);

        echo json_encode('delete complete');
    }
    /*
    * export_customer
    * export service report
    * @input    array of customer
    * @output   download service report
    * @author   Kittipod
    * @Create Date  2564-09-15
    */
    public function export_service() {
        date_default_timezone_set("Asia/Bangkok");
        $m_ser = new M_cdms_service();

        $arr_service = $m_ser->get_all();
        $index = count($arr_service)-1;
        $start = $arr_service[$index]->ser_arrivals_date;
        $end = $arr_service[0]->ser_arrivals_date;
        $arrivals_date =  substr($start,8,2).'/'.substr($start,5,2).'/'.(substr($start,0,4)) .
                            ' - '. date("d-m-Y");

        $date_range = $this->request->getPost('date_range_excel');

        //ถ้าไม่ตรงแสดงว่าเลือก date
        if($date_range != $arrivals_date){

            $start = substr($date_range,6,4).'-'.substr($date_range,3,2).'-'.(substr($date_range,0,2));
            $end = substr($date_range,19,4).'-'.substr($date_range,16,2).'-'.(substr($date_range,13,2));
            $arr_service = $m_ser->get_by_date($start, $end);
            $arr_service = $this->change_service_status_by_date($arr_service, $start, $end);
            echo '<pre>';
            print_r($arr_service);
            echo '</pre>';
        }

        $file_name = 'service_report.xlsx';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $style = array(
            'alignment' => array(
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            )
        );

        $thead_report = array(
            'font' => [
                'name' => 'TH SarabunPSK',
                'bold' => true,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'CCFFFF',
                ],
                'endColor' => [
                    'argb' => 'CCFFFF',
                ],
            ],
        );

        $thead_cus = array(
            'font' => [
                'name' => 'TH SarabunPSK',
                'bold' => true,
            ],
            'alignment' => array(
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ),
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'CCFFFF',
                ],
                'endColor' => [
                    'argb' => 'CCFFFF',
                ],
            ],
        );

        $sheet->getStyle('A:Z')->getFont()->setName('TH SarabunPSK')->setSize (16);
        $sheet->getStyle('B')->getFont()->setBold(true);

        $sheet->getStyle("B2:B5")->applyFromArray($thead_report)->getFont()->setBold(true)->setSize (18);
        $sheet->getStyle("C2:C5")->applyFromArray($style)->getFont()->setBold(true)->setSize (18);

        $sheet->getStyle("D2:D5")->applyFromArray($thead_report)->getFont()->setBold(true)->setSize (18);
        $sheet->getStyle("E2:E5")->applyFromArray($style)->getFont()->setBold(true)->setSize (18);

        $sheet->getStyle("F2:F3")->applyFromArray($thead_report)->getFont()->setBold(true)->setSize (18);
        $sheet->getStyle("G2:G3")->applyFromArray($style)->getFont()->setBold(true)->setSize (18);

        $count_import = array_count_values(array_column($arr_service, 'stac_name'))['Import'];
        $sheet->setCellValue('B2', 'Import');
        $sheet->setCellValue('C2', ($count_import != 0) ? $count_import : '0');

        $count_export = array_count_values(array_column($arr_service, 'stac_name'))['Ready'];
        $sheet->setCellValue('B3', 'Drop');
        $sheet->setCellValue('C3', ($count_export != 0) ? $count_export : '0');

        $count_drop = array_count_values(array_column($arr_service, 'stac_name'))['Export'];
        $sheet->setCellValue('B4', 'Export');
        $sheet->setCellValue('C4', ($count_drop != 0) ? $count_drop : '0');

        $total = $count_import + $count_export + $count_drop;
        $sheet->setCellValue('B5', 'TOTAL');
        $sheet->setCellValue('C5', ($total != 0) ? $total : '0');

        $count_dry = array_count_values(array_column($arr_service, 'cont_name'))['Dry Container'];
        $sheet->setCellValue('D2', 'Dry Container');
        $sheet->setCellValue('E2', ($count_dry != 0) ? $count_dry : '0');

        $count_reefer = array_count_values(array_column($arr_service, 'cont_name'))['Reefer Container'];
        $sheet->setCellValue('D3', 'Reefer Container');
        $sheet->setCellValue('E3', ($count_reefer != 0) ? $count_reefer : '0');

        $count_iso = array_count_values(array_column($arr_service, 'cont_name'))['ISO Tank'];
        $sheet->setCellValue('D4', 'ISO Tank');
        $sheet->setCellValue('E4', ($count_iso != 0) ? $count_iso : '0');

        $count_open = array_count_values(array_column($arr_service, 'cont_name'))['Open-top'];
        $sheet->setCellValue('D5', 'Open-top');
        $sheet->setCellValue('E5', ($count_open != 0) ? $count_open : '0');

        $count_flat = array_count_values(array_column($arr_service, 'cont_name'))['Flat-rack'];
        $sheet->setCellValue('F2', 'Flat-rack');
        $sheet->setCellValue('G2', ($count_flat != 0) ? $count_flat : '0');

        $count_ven = array_count_values(array_column($arr_service, 'cont_name'))['Ventilated Container'];
        $sheet->setCellValue('F3', 'Ventilated Container');
        $sheet->setCellValue('G3', ($count_ven != 0) ? $count_ven : '0');

        $sheet->getStyle('B2:E5')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->getStyle('F2:G3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->getStyle('B2:B5')->applyFromArray($style);
        $sheet->getStyle('D2:D5')->applyFromArray($style);
        $sheet->getStyle('F2:F3')->applyFromArray($style);

        $sheet->getStyle("B7:H7")->applyFromArray($thead_cus)->getFont()->setSize (18);
        $sheet->setCellValue('B7', 'Container number');
        $sheet->setCellValue('C7', 'Container status');
        $sheet->setCellValue('D7', 'Container type');
        $sheet->setCellValue('E7', 'Cut-off');
        $sheet->setCellValue('F7', 'Actual departure');
        $sheet->setCellValue('G7', 'Agent');
        $sheet->setCellValue('H7', 'Customer');

        $count = 8;

        for ($i = 0; $i < count($arr_service); $i++)
		{

			$sheet->setCellValue('B' . $count, ' ' . $arr_service[$i]->con_number);
            $sheet->getStyle('B'.$count)->applyFromArray($style);

			$sheet->setCellValue('C' . $count, ' ' . $arr_service[$i]->stac_name);
            $sheet->getStyle('C'.$count)->applyFromArray($style);

            $sheet->setCellValue('D' . $count, ' ' . $arr_service[$i]->cont_name);

            $sheet->setCellValue('E' . $count, date_thai($arr_service[$i]->ser_departure_date));
            $sheet->getStyle('E'.$count)->applyFromArray($style);

            if($arr_service[$i]->ser_actual_departure_date != ''){
			    $sheet->setCellValue('F' . $count, date_thai($arr_service[$i]->ser_actual_departure_date));
            }else{
                $sheet->setCellValue('F' . $count, '-');
            }
            $sheet->getStyle('F'.$count)->applyFromArray($style);

            $sheet->setCellValue('G' . $count, ' ' . $arr_service[$i]->agn_company_name);

            $company_name = $arr_service[$i]->cus_company_name;
            if($arr_service[$i]->cus_branch != null) {
                $company_name = $company_name . ' (' . $arr_service[$i]->cus_branch . ') ';
            }
            $sheet->setCellValue('H' . $count, ' ' . $company_name);

			$count++;
		}

        $sheet->getStyle('B7:H'.($count-1))->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        foreach(range('B','H') as $columnID)
        {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);

		$writer->save($file_name);

		header("Content-Type: application/vnd.ms-excel");

		header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');

		header('Expires: 0');

		header('Cache-Control: must-revalidate');

		header('Pragma: public');

		header('Content-Length:' . filesize($file_name));

		flush();

		readfile($file_name);

		exit;
        return $this->response->redirect(base_url('/Customer_show/customer_show_ajax'));
    }

    /*
    * get_change_service
    * get change service
    * @input    ser_id_change
    * @output   array of service
    * @author   Tadsawan
    * @Create Date  2564-09-20
    */
    public function get_change_service(){
        $ser_id_change = $this->request->getPost('ser_id_change');
        $m_ser = new M_cdms_service();
        $data['obj_service'] = $m_ser->get_by_id_change($ser_id_change);
        $data['arr_service']=array();
        $i = 0;
        array_push($data['arr_service'], $data['obj_service']);
        while($data['arr_service'][$i]->ser_id_change){
            $data['obj_service'] = $m_ser->get_by_id_change($data['arr_service'][$i]->ser_id_change);
            array_push($data['arr_service'], $data['obj_service']);
            $i++;
        }
        echo json_encode($data['arr_service']);
    }

    /*
    * get_change_container_log
    * search change container line
    * @input    ser_id
    * @output   array of change container
    * @author   Wirat
    * @Create Date  2564-12-07
    */
    public function get_change_container_log($ser_id = NULL) {
        if ($ser_id != NULL) {

            $arr_change_container = array();
            $m_chl = new M_cdms_change_container_log();
            $old_ser_id = $ser_id;
            // find next service
            array_push($arr_change_container, $old_ser_id);
            do {
                $obj_change_container = $m_chl->get_next_ser_id($ser_id);
                $ser_id = $obj_change_container->chl_new_ser_id;
                array_push($arr_change_container, $obj_change_container);
            }while($obj_change_container != NULL);
            
            // find previous service
            do {
                $obj_change_container = $m_chl->get_prev_ser_id($old_ser_id);
                $ser_id = $obj_change_container->chl_old_ser_id;
                $old_ser_id = $ser_id;
                array_unshift($arr_change_container, $obj_change_container);
            }while($obj_change_container != NULL);

            array_pop($arr_change_container);
            array_shift($arr_change_container);

            return $arr_change_container;
        }
    }

    public function service_damaged_show_ajax() {
        //set timezone
        date_default_timezone_set('GMT');

        //display the converted time
        $_SESSION['menu'] = 'Service_show';
        // load service model
        $m_ser = new M_cdms_service();
        // load container model
        $m_con = new M_cdms_container();

        $today = date('Y-m-d', strtotime('+7 hour'));
        $today_time = date('Y-m-d H:i:s', strtotime('+7 hour'));
        $yesterday = date('Y-m-d', strtotime('-17 hour'));
        $yesterday_time = date('Y-m-d H:i:s', strtotime('-17 hour'));

        // it will be moved to login page when login was done
        // update ser_stac_id to ready (drop) depend on today
        $m_ser->change_ser_stac_id(3, $today);
        // update ser_stac_id to export depend on today
        $m_ser->change_ser_stac_id(4, $today, $today_time);

        $data['arr_con'] = $m_con->get_all(1);

        if(isset($_GET['date_range'])){
            $date_range = $this->request->getGet('date_range');
            $start_date = substr($date_range,6,4).'-'.substr($date_range,3,2).'-'.(substr($date_range,0,2));
            $end_date = substr($date_range,19,4).'-'.substr($date_range,16,2).'-'.(substr($date_range,13,2));

            $data['arr_service'] = $m_ser->get_by_date($start_date, $end_date);

            $data['arrivals_date'] = $date_range;
        }
        else{
            // get service data upon by date
            $data['arr_service'] = $m_ser->get_all_damaged($today);
            // get all the time service
            $data['arr_service_temp'] = $m_ser->get_all_damaged();

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
                $data['arrivals_date'] = substr($start,8,2).'/'.substr($start,5,2).'/'.(substr($start,0,4)) . ' - '. date("d-m-Y");
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
        // print_r($data['arr_service']);
        $this->output('v_damaged_container_showlist', $data);
    }
    public function service_damaged_detail($ser_id) {
        $_SESSION['menu'] = 'Service_show';

        // get service
        $m_ser = new M_cdms_service();
        $data['obj_service'] = $m_ser->get_by_id($ser_id);

         // get container
        $m_con = new M_cdms_container();
        $data['obj_container'] = $m_con->get_by_id($data['obj_service'][0]->ser_con_id);

        // size name
        $m_size = new M_cdms_size();
        $data['arr_size'] = $m_size->get_by_id($data['obj_container'][0]->con_size_id);

        // container type
        $m_cont = new M_cdms_container_type();
        $data['arr_container_type'] = $m_cont->get_by_id($data['obj_container'][0]->con_cont_id);

        // status container

        $m_stac = new M_cdms_status_container();
        $data['arr_status_container'] = $m_stac->get_all_status_damaged($data['obj_container'][0]->con_stac_id);

        // driver name
        $m_dri = new M_cdms_driver();
        $data['arr_driver_in'] = $m_dri->get_by_id($data['obj_service'][0]->ser_dri_id_in);
        $data['arr_driver_out'] = $m_dri->get_by_id($data['obj_service'][0]->ser_dri_id_out);

         // car name
        $m_car = new M_cdms_car();
        $data['arr_car_in'] = $m_car->get_by_id($data['obj_service'][0]->ser_car_id_in);
        $data['arr_car_out'] = $m_car->get_by_id($data['obj_service'][0]->ser_car_id_out);

        // get customer
        $m_cus = new M_cdms_customer();
        $data['obj_customer'] = $m_cus->get_by_id($data['obj_service'][0]->ser_cus_id);

        // get agent agent
        $m_agn = new M_cdms_agent();
        $data['obj_agent'] = $m_agn->get_by_id($data['obj_container'][0]->con_agn_id);

        $data['arr_change_container'] = $this->get_change_container_log($ser_id);

        $data['index_ser_id'] = 0;
        for ($i = 0; $i < count($data['arr_change_container']); $i++) {
            if (gettype($data['arr_change_container'][$i]) == "string") {
                $data['index_ser_id'] = $i;
            }
        }
        
        if (gettype($data['arr_change_container'][0]) != "string") {
            $data['obj_original_container'] = $m_ser->get_arrivals_date_by_ser_id($data['arr_change_container'][0]->chl_old_ser_id);
        }
        $this->output('v_service_show_information', $data);
    }

    /*
    * service_print_cost
    * print invoice service
    * @input    ser_id, vat
    * @output   PDF
    * @author   Natdanai
    * @Create Date  2564-12-18
    */
    public function service_print_cost($ser_id, $vat){
        //get information service + cost
        $m_ser = new M_cdms_service();
        $data['arr_service_cost'] = $m_ser->get_service_cost_all($ser_id);
        $data['vat'] = $vat;
        //date
        $data['date_today'] = date("Y-m-d H:i:s");
        //MPDF config
        $mpdf = new \Mpdf\Mpdf();
        $script = view('v_invoice_script', $data);
        $copy = view('v_invoice_copy', $data);
        $mpdf->WriteHTML($script); //page manuscript
        $mpdf->AddPage(); //add page
        $mpdf->WriteHTML($copy); //page copy
        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output('invoice.pdf','I'); // opens in browser
    }


    public function ser_pay_update(){
        $ser_id = $this->request->getPost('cosd_ser_id');
        $ser_due_date = $this->request->getPost('due_date');
        $ser_pay_by = $this->request->getPost('pay_by');
        $ser_cheque = $this->request->getPost('cheque_no');
        $ser_bnk_id = $this->request->getPost('bank'); 

        $ser_due_date = substr($ser_due_date,6,4).'-'.substr($ser_due_date,3,2).'-'.(substr($ser_due_date,0,2));

        $m_ser = new M_cdms_service();
        $m_ser->update_ser_pay($ser_id, $ser_due_date, $ser_pay_by, $ser_bnk_id ,$ser_cheque);
        echo json_encode($this->request->getPost());
    }
    

    public function show_history() {
        $_SESSION['menu'] = 'Service_show';
        $m_chl = new M_cdms_change_container_log();

        $data['arr_history'] = $m_chl->get_history_all();
        $arr_new_ser_id=array();
        $arr_old_ser_id=array();
        for($i=0;$i<count($data['arr_history']);$i++){
            array_push($arr_new_ser_id,$data['arr_history'][$i]->new_ser_id);
            array_push($arr_old_ser_id,$data['arr_history'][$i]->old_ser_id);
        }
        $result=array_values(array_diff($arr_new_ser_id,$arr_old_ser_id));

        $arr_change_container=array();
        for($i=0;$i<count($result);$i++){
            array_push($arr_change_container,$this->get_change_container_log($result[$i]));
        }
        $data['arr_change_container'] = $arr_change_container;


        // get latest container number
        $m_ser = new M_cdms_service();
        $arr_latest_con_number = array();
        for ($i = 0; $i < count($data['arr_change_container']); $i++) {
            // get latest ser_id
            $ser_id = $data['arr_change_container'][$i][count($data['arr_change_container'][$i]) - 1];

            // get container number
            $data['obj_service'] = $m_ser->get_con_number_by_ser_id($ser_id);
            array_push($arr_latest_con_number, $data['obj_service']);
        }
        $data['arr_latest_con_number'] = $arr_latest_con_number;
        $this->output('v_history_show', $data);
    }

}
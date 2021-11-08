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
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;


/*
* Service_show
* show service list, delete service
* @author Natdanai Worarat
* @Create Date 2564-07-29
* @Update Date 2564-07-30
*/
class Service_show extends Cdms_controller {
    /*
    * service_show_ajax
    * show service list
    * @input -
    * @output array of service
    * @author Natdanai, Kittipod
    * @Create Date 2564-07-29
    * @Update Date 2564-09-10
    */
    public function service_show_ajax() {
        //set timezone
        date_default_timezone_set('GMT');

        //set an date and time to work with
        $start = '2021-10-30 12:00:00';

        //display the converted time

        $_SESSION['menu'] = 'Service_show';
        $m_ser = new M_cdms_service();

        $today = date('Y-m-d', strtotime('+7 hour'));
        $today_time = date('Y-m-d H:i:s', strtotime('+7 hour'));
        $yesterday = date('Y-m-d', strtotime('-17 hour'));
        $yesterday_time = date('Y-m-d H:i:s', strtotime('-17 hour'));

        // update ser_stac_id to ready (drop) depend on today
        $m_ser->change_ser_stac_id(3, $yesterday);
        // update ser_stac_id to export depend on today
        $m_ser->change_ser_stac_id(4, $yesterday, $today_time);


        // container
        $m_con = new M_cdms_container();
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
            $obj_num_drop = $m_ser->get_num_drop();
            $data['num_drop'] = $obj_num_drop->num_drop;
            $obj_num_yesterday_drop = $m_ser->get_num_drop($yesterday, $yesterday_time, false);
            $data['num_yesterday_drop'] = $obj_num_yesterday_drop->num_drop;

            // count all service yesterday
            $obj_num_yesterday_all = $m_ser->get_num_all($today, $yesterday_time);
            $data['num_yesterday_all'] = $obj_num_yesterday_all->num_all;
        }
        // print_r($data['arr_service']);
        $this->output('v_service_showlist', $data);
    }

    /*
    * service_delete
    * delete service
    * @input ser_id
    * @output delete service
    * @author Worarat
    * @Create Date 2564-07-30
    * @Update Date 2564-07-30
    */
    public function service_delete() {
        $m_ser = new M_cdms_service();
        $m_ser->delete($this->request->getPost('ser_id'));
        return $this->response->redirect(base_url('/Service_show/service_show_ajax'));
    }

    /*
    * service_detail
    * show service detail page
    * @input ser_id
    * @output show service detail page
    * @author Tadsawan
    * @Create Date 2564-08-12
    * @Update Date
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
        // call service input view
        $this->output('v_service_show_information', $data);
    }

    /*
    * get_cost_ajax
    * get cost in service
    * @input ser_id
    * @output get cost in service
    * @author Wirat
    * @Create Date 2564-09-15
    * @Update Date 2564-09-15
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
    * @input cosd_ser_id, cosd_name, cosd_cost
    * @output insert cost in service
    * @author Natdanai
    * @Create Date 2564-09-15
    * @Update Date 2564-09-15
    */
    public function cost_insert() {
        $m_cosd = new M_cdms_cost_detail();

        $cosd_ser_id = $this->request->getPost('cosd_ser_id');
        $cosd_name = $this->request->getPost('cosd_name');
        $cosd_cost = $this->request->getPost('cosd_cost');
        $cosd_payment_date = date("Y-m-d", strtotime("+7 day"));

        $m_cosd->cost_insert($cosd_name, $cosd_cost, $cosd_payment_date, $cosd_ser_id);
        $last_cost = $m_cosd->get_last();

        echo json_encode($last_cost);
    }

    /*
    * cost_update
    * update cost in service
    * @input cosd_id, cosd_name, cosd_cost
    * @output update cost in service
    * @author Natdanai
    * @Create Date 2564-09-15
    * @Update Date 2564-09-15
    */
    public function cost_update() {
        $m_cosd = new M_cdms_cost_detail();

        $cosd_id = $this->request->getPost('cosd_id');
        $cosd_name = $this->request->getPost('cosd_name');
        $cosd_cost = $this->request->getPost('cosd_cost');

        $m_cosd->cost_update($cosd_id, $cosd_name, $cosd_cost);

        echo json_encode('update complete');
    }

    /*
    * cost_delete
    * delete cost in service
    * @input cosd_id
    * @output delete cost in service
    * @author Natdanai
    * @Create Date 2564-09-15
    * @Update Date 2564-09-15
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
    * @input array of customer
    * @output download service report
    * @author Kittipod
    * @Create Date 2564-09-15
    * @Update Date 2564-09-15
    */
    public function export_service() {

        $m_ser = new M_cdms_service();

        $arr_service = $m_ser->get_all();
        $index = count($arr_service)-1;
        $start = $arr_service[$index]->ser_arrivals_date;
        $end = $arr_service[0]->ser_arrivals_date;
        $arrivals_date =  substr($start,8,2).'/'.substr($start,5,2).'/'.(substr($start,0,4)) .
                            ' - '. date("d-m-Y");

        $date_range = $this->request->getPost('date_range_excel');

        if($date_range != $arrivals_date){

            $start = substr($date_range,6,4).'-'.substr($date_range,3,2).'-'.(substr($date_range,0,2)) . ' ' . '00:00:00';
            $end = substr($date_range,19,4).'-'.substr($date_range,16,2).'-'.(substr($date_range,13,2)) . ' ' . '23:59:59';
            $arr_service = $m_ser->get_by_date($start, $end);

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

        $sheet->getStyle("B2:B4")->applyFromArray($thead_report)->getFont()->setBold(true)->setSize (18);
        $sheet->getStyle("C2:C4")->applyFromArray($style)->getFont()->setBold(true)->setSize (18);

        $count_import = array_count_values(array_column($arr_service, 'ser_type'))[1];
        $sheet->setCellValue('B2', 'ตู้เข้า');
        $sheet->setCellValue('C2', ($count_import != 0) ? $count_import : '0');

        $count_export = array_count_values(array_column($arr_service, 'ser_type'))[2];
        $sheet->setCellValue('B3', 'ตู้ออก');
        $sheet->setCellValue('C3', ($count_export != 0) ? $count_export : '0');

        $count_drop = array_count_values(array_column($arr_service, 'ser_type'))[3];
        $sheet->setCellValue('B4', 'ตู้ดรอป');
        $sheet->setCellValue('C4', ($count_drop != 0) ? $count_drop : '0');

        $sheet->getStyle('B2:C4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        $sheet->getStyle("B6:H6")->applyFromArray($thead_cus)->getFont()->setSize (18);
        $sheet->setCellValue('B6', 'หมายเลขตู้');
        $sheet->setCellValue('C6', 'สถานะตู้');
        $sheet->setCellValue('D6', 'ประเภท');
        $sheet->setCellValue('E6', 'ประเภทตู้');
        $sheet->setCellValue('F6', 'CUT-OFF');
        $sheet->setCellValue('G6', 'เอเย่นต์');
        $sheet->setCellValue('H6', 'ลูกค้า');

        $count = 7;

        for ($i = 0; $i < count($arr_service); $i++)
		{

			$sheet->setCellValue('B' . $count, ' ' . $arr_service[$i]->con_number);

			$sheet->setCellValue('C' . $count, ' ' . $arr_service[$i]->stac_name);

            if ($arr_service[$i]->ser_type == '1') {
                $cont_stac ="ตู้เข้า";
            } else if ($arr_service[$i]->ser_type == '2') {
                $cont_stac = "ตู้ออก";
            } else if ($arr_service[$i]->ser_type == '3') {
                $cont_stac = "ตู้ดรอป";
            }
			$sheet->setCellValue('D' . $count, $cont_stac);

            $sheet->getStyle('D'.$count)->applyFromArray($style);

            $sheet->setCellValue('E' . $count, ' ' . $arr_service[$i]->cont_name);

			$sheet->setCellValue('F' . $count, date_thai($arr_service[$i]->ser_departure_date));
            $sheet->getStyle('F'.$count)->applyFromArray($style);

            $sheet->setCellValue('G' . $count, ' ' . $arr_service[$i]->agn_company_name);

            $company_name = $arr_service[$i]->cus_company_name;
            if($arr_service[$i]->cus_branch != null) {
                $company_name = $company_name . ' (' . $arr_service[$i]->cus_branch . ') ';
            }
            $sheet->setCellValue('H' . $count, ' ' . $company_name);

			$count++;
		}

        $sheet->getStyle('B6:H'.($count-1))->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

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
    * @input ser_id_change
    * @output  array of service
    * @author  Tadsawan
    * @Create Date 2564-09-20
    * @Update Date 2564-09-20
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

}

<?php

namespace App\Controllers;

use App\Models\M_cdms_customer;
use App\Models\M_cdms_service;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

    /*
    * Customer_show
    * แสดงรายชื่อลูกค้า และลบลูกค้า
    * @author  Kittipod
    * @Create Date 2564-07-29
    * @Update Date 2564-08-14
    */

class Customer_show extends Cdms_controller {
    /*
    * customer_show_ajax
    * เรียกข้อมูลจากฐานข้อมูลผ่านไฟล์ M_cdms_customer และ แสดง view รายชื่อ
    * @input -
    * @output array of customer
    * @author  Kittipod
    * @Create Date 2564-07-29
    * @Update Date 2564-09-10
    */
    public function customer_show_ajax() {
        $_SESSION['menu'] = 'Customer_show';
        $m_cus = new M_cdms_customer();
        $m_ser = new M_cdms_service();

        if(isset($_POST['date_range'])){
            $date_range = $this->request->getPost('date_range');
            $start = substr($date_range,6,4).'-'.substr($date_range,3,2).'-'.(substr($date_range,0,2)) . ' ' . '00:00:00';
            $end = substr($date_range,19,4).'-'.substr($date_range,16,2).'-'.(substr($date_range,13,2)) . ' ' . '23:59:59';
            //Data Customer
            $data['arr_customer'] = $m_cus->get_by_date($start, $end);
            //Data Service
            $data['arr_service'] = $m_ser->get_by_date($start, $end);
            
            $data['arrivals_date'] = $date_range;
        }else{

            //Data Customer
            $data['arr_customer'] = $m_cus->get_all();
            //Data Service
            $data['arr_service'] = $m_ser->get_all();

            $index = count($data['arr_service'])-1;
            $start = $data['arr_service'][$index]->ser_arrivals_date;
            $end = $data['arr_service'][0]->ser_arrivals_date;
            $data['arrivals_date'] =  substr($start,8,2).'/'.substr($start,5,2).'/'.(substr($start,0,4)) .
                                    ' - '. date("d-m-Y");
        }

        $this->output('v_customer_showlist', $data);
    }

    /*
    * customer_delete
    * ลบรายชื่อลูกค้าออกจากรายการ
    * @input cus_id
    * @output เพิ่มลูกค้า
    * @author  Benjapon
    * @Create Date 2564-07-29
    * @Update Date 2564-08-02
    */
    public function customer_delete() {
        $m_cus = new M_cdms_customer();
        $m_cus->delete($this->request->getPost('cus_id'));
        return $this->response->redirect(base_url('/Customer_show/customer_show_ajax'));
    }

    /*
    * customer_detail
    * ดูข้อมูลลูกค้า
    * @input cus_id
    * @output เพิ่มลูกค้า
    * @author  Natadanai
    * @Create Date 2564-08-14
    * @Update Date 2564-08-14
    */
    public function customer_detail($cus_id) {
        $_SESSION['menu'] = 'Customer_show';
        $m_cus = new M_cdms_customer;
        $data['arr_customer'] = $m_cus->get_by_id($cus_id);
        $this->output('v_customer_show_information', $data);
    }

    public function get_customer_ajax() {
        $m_cus = new M_cdms_customer();
        $cus_id = $this->request->getPost('cus_id');
        $cus_information = $m_cus->get_by_id($cus_id);

        echo json_encode($cus_information);
    }

    /*
    * export_customer
    * export รายงาน Customer
    * @input array_customer
    * @output File Report Customer
    * @author  Kittipod
    * @Create Date 2564-09-15
    * @Update Date 2564-09-15
    */
    public function export_customer() {
        $m_cus = new M_cdms_customer();
        $m_ser = new M_cdms_service();

        //Data Customer
        $arr_customer = $m_cus->get_all();
        //Data Service
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
            //Data Customer
            $arr_customer = $m_cus->get_by_date($start, $end);
            //Data Service
            $arr_service = $m_ser->get_by_date_customer($start, $end);

        }

        $file_name = 'customer_report.xlsx';
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

        $sheet->getStyle("E2:E4")->applyFromArray($thead_report)->getFont()->setBold(true)->setSize (18);
        $sheet->getStyle("F2:F4")->applyFromArray($style)->getFont()->setBold(true)->setSize (18);

        $count_Dry_Container  = array_count_values(array_column($arr_service, 'cont_name'))['Dry Container'];
        $sheet->setCellValue('E2', 'Dry Container');
        $sheet->setCellValue('F2', ($count_Dry_Container != 0) ? $count_Dry_Container : '0');

        $count_Reefer_container = array_count_values(array_column($arr_service, 'cont_name'))['Reefer Container'];
        $sheet->setCellValue('E3', 'Reefer Container');
        $sheet->setCellValue('F3', ($count_Reefer_container != 0) ? $count_Reefer_container : '0');

        $count_ISO_Tank_Container = array_count_values(array_column($arr_service, 'cont_name'))['ISO Tank'];
        $sheet->setCellValue('E4', 'ISO Tank Container');
        $sheet->setCellValue('F4', ($count_ISO_Tank_Container != 0) ? $count_ISO_Tank_Container : '0');

        $sheet->getStyle('E2:F4')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        $sheet->getStyle("B6:F6")->applyFromArray($thead_cus)->getFont()->setSize (18);
        $sheet->setCellValue('B6', 'บริษัท');
        $sheet->setCellValue('C6', 'ผู้รับผิดชอบ');
        $sheet->setCellValue('D6', 'จำนวนตู้ที่กำลังใช้');
        $sheet->setCellValue('E6', 'เบอร์โทรศัพท์');
        $sheet->setCellValue('F6', 'email');
        
        $count = 7;

        for ($i = 0; $i < count($arr_customer); $i++)
		{

            $company_name = $arr_customer[$i]->cus_company_name;
            if($arr_customer[$i]->cus_branch != null) { 
                $company_name = $company_name . ' (' . $arr_customer[$i]->cus_branch . ') ';
            }
			$sheet->setCellValue('B' . $count, $company_name);

			$sheet->setCellValue('C' . $count, $arr_customer[$i]->cus_firstname . ' ' . $arr_customer[$i]->cus_lastname);

            $count_container = 0;
            for ($j = 0; $j < count($arr_service); $j++) {
                if ($arr_customer[$i]->cus_company_name == $arr_service[$j]->cus_company_name) {
                    if ($arr_customer[$i]->cus_branch == $arr_service[$j]->cus_branch) {
                        $count_container++;
                    }
                }
            }

			$sheet->setCellValue('D' . $count, $count_container);
            $sheet->getStyle('D'.$count)->applyFromArray($style);

			$sheet->setCellValue('E' . $count, tel_format($arr_customer[$i]->cus_tel));
            $sheet->getStyle('E'.$count)->applyFromArray($style);

            $sheet->setCellValue('F' . $count, $arr_customer[$i]->cus_email);

			$count++;
		}

        $sheet->getStyle('B6:F'.($count-1))->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        foreach(range('B','F') as $columnID)
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
}

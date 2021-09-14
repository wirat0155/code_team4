<?php

namespace App\Controllers;

use App\Models\M_cdms_customer;
use App\Models\M_cdms_service;

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
            $data['arr_service'] = $m_ser->get_by_date_customer($start, $end);
            
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
        return $this->response->redirect(base_url('/public/Customer_show/customer_show_ajax'));
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
}

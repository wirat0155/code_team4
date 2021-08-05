<?php namespace App\Controllers;
use App\Models\M_cdms_customer;
use App\Models\M_cdms_service;

/*
    * Customer_show
    * แสดงรายชื่อลูกค้า และลบลูกค้า
    * @author  Kittipod
    * @Create Date 2564-07-29
    * @Update Date 2564-08-02
*/
class Customer_show extends Cdms_controller
{
    /*
    * customer_show_ajax
    * เรียกข้อมูลจากฐานข้อมูลผ่านไฟล์ M_cdms_customer และ แสดง view รายชื่อ
    * @author  Kittipod
    * @Create Date 2564-07-29
    * @Update Date 2564-08-02
*/
    public function customer_show_ajax()
    {
        $_SESSION['menu'] = 'Customer_show';
        $M_cus = new M_cdms_customer();
        $data['arr_customer'] = $M_cus->get_all();
        $M_ser = new M_cdms_service();
        $data['arr_service'] = $M_ser->get_all();

        $this->output('v_customer_showlist', $data);
    }

    /*
    * customer_delete
    * ลบรายชื่อลูกค้าออกจากรายการ
    * @author  XXXX
    * @Create Date 2564-07-29
    * @Update Date 2564-08-02
    */
    public function customer_delete() {
        $M_cus = new M_cdms_customer();
        $M_cus->delete($this->request->getPost('cus_id'));
        return $this->response->redirect(base_url('/public/Customer_show/customer_show_ajax'));
    }

}
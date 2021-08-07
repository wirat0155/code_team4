<?php namespace App\Controllers;
use App\Models\M_cdms_customer;

/*
    * Customer_input
    * แสดงหน้าจอเพิ่มข้อมูล และเพิ่มลูกค้า
    * @author  Kittipod
    * @Create Date 2564-08-05
    * @Update Date 2564-08-05
*/
class Customer_input extends Cdms_controller
{
/*
    * customer_input
    * แสดงหน้าจอ customer_input
    * @author  Kittipod
    * @Create Date 2564-08-05
    * @Update Date 2564-08-05
*/
    public function customer_input()
    {
        $this->output('v_customer_input');
    }

/*
    * customer_insert
    * เพิ่มข้อมูลลูกค้า
    * @author  Kittipod
    * @Create Date 2564-08-05
    * @Update Date 2564-08-05
*/
    public function customer_insert() {
        $M_cus = new M_cdms_customer();
        $arr_customer = $M_cus->get_all();

        // เก็บข้อมูลของ ลูกค้า
        $cus_company_name = $this->request->getPost('cus_company_name');
        $cus_firstname = $this->request->getPost('cus_firstname');
        $cus_lastname = $this->request->getPost('cus_lastname');
        $cus_branch = $this->request->getPost('cus_branch');
        $cus_tel = $this->request->getPost('cus_tel');
        $cus_address = $this->request->getPost('cus_address');
        $cus_tax = $this->request->getPost('cus_tax');
        $cus_email = $this->request->getPost('cus_email');

        // Check ชื่อ กับ สาขา ซ้ำ
        for ($i = 0; $i < count($arr_customer); $i++){
            if($arr_customer[$i]->cus_company_name == $cus_company_name){
                if($arr_customer[$i]->cus_branch == $cus_branch){
                    return $this->response->redirect(base_url('/public/Customer_show/customer_show_ajax'));
                }
            }
        }

        // เพิ่มข้อมูลลูกค้า
        $M_cus->insert($cus_company_name, $cus_firstname, $cus_lastname, $cus_branch, $cus_tel, $cus_address, $cus_tax, $cus_email);

        return $this->response->redirect(base_url('/public/Customer_show/customer_show_ajax'));
    }

}
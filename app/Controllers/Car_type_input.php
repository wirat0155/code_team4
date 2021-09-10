<?php

namespace App\Controllers;
use App\Models\M_cdms_car_type;

/*
* Car_type_input
* เพิ่มประเภทรถ
* @author Wirat
* @Create Date 2564-09-10
* @Update Date 2564-09-10
*/

class Car_type_input extends Cdms_controller {
    /*
    * car_type_insert
    * เพิ่มประเภทรถ
    * @input cart_name
    * @output เพิ่มประเภทรถ
    * @author Wirat
    * @Create Date 2564-09-10
    * @Update Date 2564-09-10
    */
    public function car_type_insert() {
        $cart_name = $this->request->getPost('cart_name');

        $m_cart = new M_cdms_car_type();
        $m_cart->insert($cart_name);
        $last_cart = $m_cart->get_last();
        echo json_encode($last_cart);
    }
}

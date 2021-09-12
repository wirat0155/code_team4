<?php

namespace App\Controllers;
use App\Models\M_cdms_car_type;

/*
* Car_type_edit
* แก้ไขประเภทรถ
* @author Wirat
* @Create Date 2564-09-12
* @Update Date 2564-09-12
*/

class Car_type_edit extends Cdms_controller {
    /*
    * car_type_update
    * แก้ไขประเภทรถ
    * @input cart_id, cart_name
    * @output แก้ไขประเภทรถ
    * @author Wirat
    * @Create Date 2564-09-12
    * @Update Date 2564-09-12
    */
    public function car_type_update() {
        $cart_id = $this->request->getPost('cart_id');
        $cart_name = $this->request->getPost('cart_name');

        $m_cart = new M_cdms_car_type();
        $m_cart->car_type_update($cart_id, $cart_name);
        $this->response->redirect(base_url() . '/public/Dashboard/dashboard_show');
    }
}

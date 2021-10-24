<?php

namespace App\Controllers;

use App\Models\M_cdms_car_type;

/*
    * Set_up_car_type
    * แสดงหน้าจอรายการประเภทรถ
    * @author Tadsawan
    * @Create Date 2564-10-23
    * @Update Date 2564-10-23
*/
class Set_up_car_type extends Cdms_controller
{
    /*
    * car_type_show
    * แสดงหน้าจอรายการประเภทรถ
    * @input -
    * @output array of car_type
    * @author Tadsawan
    * @Create Date 2564-10-23
    * @Update Date 2564-10-23
    */
    public function car_type_show()
    {
        $_SESSION['menu'] = 'Set_up';
        $_SESSION['menu_set_up'] = 'car_type';
        
        // get all car type
        $m_cart = new M_cdms_car_type();
        $data['arr_car_type'] = $m_cart->get_all_status();

        $this->output('v_set_up_car_type', $data);
    }

    /*
    * get_all_car_type
    * แสดงทั้งหมดของประเภทรถ
    * @input -
    * @output array of car_type
    * @author Thanatip
    * @Create Date 2564-09-10
    * @Update Date 2564-09-10
    */
    public function get_all_car_type()
    {
        $m_cart = new M_cdms_car_type();
        $data['arr_car_type'] = $m_cart->get_all();
        return json_encode($data['arr_car_type']);
    }

    /*
    * car_type_delete
    * ลบประเภทรถ
    * @input cart_id
    * @output ลบประเภทรถ
    * @author  Wirat
    * @Create Date 2564-08-12
    * @Update Date 2564-08-12
    */
    public function car_type_delete()
    {
        $cart_id = $this->request->getPost('cart_id');
        $m_cart = new M_cdms_car_type();
        $m_cart->delete($cart_id);

        return json_encode('pass');
    }

     /*
    * car_type_restore
    * ประเภทรถ
    * @input ct_idar
    * @output restore ประเภทรถ
    * @author Tadsawan
    * @Create Date 2564-10-23
    * @Update Date 2564-10-23
    */
    public function car_type_restore()
    {
        $cart_id = $this->request->getPost('cart_id');
        $m_cart = new M_cdms_car_type();
        $m_cart->restore($cart_id);

        return json_encode('pass');
    }

    /*
    * car_type_insert
    * เพิ่มประเภทรถ
    * @input ข้อมูลประเภทรถ
    * @output เพิ่มประเภทรถ
    * @author Tadsawan
    * @Create Date 2564-10-23
    * @Update Date 2564-10-23
    */
    public function car_type_insert() {
        $m_car_type = new M_cdms_car_type();

        // carr type information
        $cart_name = $this->request->getPost('cart_name');
        $cart_image = $this->request->getPost('cart_image');
        
        // upload image
        $file = $this->request->getFile('cart_image');
        if($file->isValid() && ! $file->hasMoved()){
            $imageName = $file->getRandomName();
            $file->move('./car_type_image', $imageName);
        }
        
        $cart_image = $imageName;

        // เพิ่มข้อมูลประเเภทรถ
        $m_car_type->insert($cart_name, $cart_image);
        $this->response->redirect(base_url() . '/Set_up_car_type/car_type_show');
    }

}
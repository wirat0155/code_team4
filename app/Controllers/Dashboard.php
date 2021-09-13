<?php

namespace App\Controllers;

use App\Models\M_cdms_car_type;
use App\Models\M_cdms_size;
use App\Models\M_cdms_status_container;
use App\Models\M_cdms_container_type;

/*
    * Dashboard
    * แสดงหน้าจอแดชบอร์ด
    * @author  Wirat, Klayuth, Natthadanai, Benjapon
    * @Create Date 2564-08-12
    * @Update Date 2564-09-12
*/
class Dashboard extends Cdms_controller
{
    /*
    * dashboard_show
    * แสดงหน้าจอแดชบอร์ด
    * @input -
    * @output array of car_type, status_container, size, container_type
    * @author  Wirat, Klayuth, Natthadanai, Benjapon
    * @Create Date 2564-08-12
    * @Update Date 2564-08-12
    */
    public function dashboard_show()
    {
        $_SESSION['menu'] = 'Dashboard';

        // get all car type
        $m_cart = new M_cdms_car_type();
        $data['arr_car_type'] = $m_cart->get_all();
        // print_r($data['arr_cart_type']);
        // get container size

        $m_size = new M_cdms_size();
        $data['arr_size'] = $m_size->get_all();

        // get status container
        $m_stac = new M_cdms_status_container();
        $data['arr_status_container'] = $m_stac->get_all();

        // get container type
        $m_cont = new M_cdms_container_type();
        $data['arr_container_type'] = $m_cont->get_all();


        $this->output('v_dashboard', $data);
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
    * size_delete
    * ลบขนาดตู้
    * @input size_id
    * @output ลบประเภทรถ
    * @author  Natadanai
    * @Create Date 2564-08-12
    * @Update Date 2564-08-12
    */
    public function size_delete()
    {
        $size_id = $this->request->getPost('size_id');
        $m_size = new M_cdms_size();
        $m_size->delete($size_id);

        return json_encode('pass');
    }

    /*
    * container_type_delete
    * ลบประเภทตู้
    * @input cont_id
    * @output ลบประเภทตู้
    * @author  Natadanai
    * @Create Date 2564-08-12
    * @Update Date 2564-08-12
    */
    public function container_type_delete()
    {
        $cont_id = $this->request->getPost('cont_id');
        $m_cont = new M_cdms_container_type();
        $m_cont->delete($cont_id);

        return json_encode('pass');
    }

    /*
    * status_container_delete
    * ลบสถานะตู้
    * @input stac_id
    * @output ลบสถานะตู้
    * @author  Natadanai
    * @Create Date 2564-08-12
    * @Update Date 2564-08-12
    */
    public function status_container_delete()
    {
        $stac_id = $this->request->getPost('stac_id');
        $m_stac = new M_cdms_status_container();
        $m_stac->delete($stac_id);

        return json_encode('pass');
    }

    /*
    * get_all_size
    * แสดงทั้งหมดของขนาดตู้
    * @input -
    * @output array of size
    * @author Thanatip
    * @Create Date 2564-09-10
    * @Update Date 2564-09-10
    */
    public function get_all_size()
    {
        $m_size = new M_cdms_size();
        $data['arr_size'] = $m_size->get_all();
        return json_encode($data['arr_size']);
    }

    /*
    * get_all_status_container
    * แสดงทั้งหมดของสถานะตู้
    * @input -
    * @output array of status_container
    * @author Thanatip
    * @Create Date 2564-09-10
    * @Update Date 2564-09-10
    */
    public function get_all_status_container()
    {
        $m_stac = new M_cdms_status_container();
        $data['arr_status_container'] = $m_stac->get_all();
        return json_encode($data['arr_status_container']);
    }

    /*
    * get_all_container_type
    * แสดงทั้งหมดของประเภทตู้
    * @input -
    * @output array of container_type
    * @author Thanatip
    * @Create Date 2564-09-10
    * @Update Date 2564-09-10
    */
    public function get_all_container_type()
    {
        $m_cont = new M_cdms_container_type();
        $data['arr_container_type'] = $m_cont->get_all();
        return json_encode($data['arr_container_type']);
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
    * get_size_by_id
    * ดึงข้อมูลขนาดตู้คอนเทนเนอร์
    * @input size_id
    * @output object size
    * @author Wirat
    * @Create Date 2564-09-12
    * @Update Date 2564-09-12
    */
    public function get_size_by_id() {
        $size_id = $this->request->getPost('size_id');

        $m_size = new M_cdms_size();
        $data['arr_size'] = $m_size->get_by_id($size_id);
        return json_encode($data['arr_size']);
    }
}

<?php namespace App\Controllers;
use App\Models\M_cdms_container;

/*
* Container_show
* แสดงรายการตู้คอนเนอร์ และลบตู้คอนเทนเนอร์
* @author Wirat
* @Create Date 2564-07-29
* @Update Date
*/
class Container_show extends Cdms_controller
{
    /*
    * container_show_ajax
    * แสดงรายการตู้คอนเทนเนอร์
    * @input -
    * @output array of container
    * @author Wirat
    * @Create Date 2564-07-29
    * @Update Date
    */
    public function container_show_ajax()
    {
        $_SESSION['menu'] = 'Container_show';
        $M_con = new M_cdms_container();
        $data['arr_container'] = $M_con->get_all();
        $this->output('v_container_showlist', $data);
    }

    /*
    * container_delete
    * ลบตู้คอนเทนเนอร์
    * @input con_id
    * @output ลบตู้คอนเทนเนอร์ และกลับไปแสดงรายการตู้คอนเทนเนอร์
    * @author Wirat
    * @Create Date 2564-07-29
    * @Update Date
    */
    public function container_delete() {
        $M_con = new M_cdms_container();
        $con_id = $this->request->getPost('con_id');
        $M_con->delete($con_id);
        return $this->response->redirect(base_url('/public/Container_show/container_show_ajax'));
    }
}
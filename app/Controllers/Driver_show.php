<?php namespace App\Controllers;
use App\Models\M_cdms_driver;


class Driver_show extends Cdms_controller{

   /*
    * driver_show_ajax
    * แสดงพนักงานขับรถทั้งหมด
    * @input -
    * @output array of driver
    * @author Thanatip
    * @Create Date 2564-07-30
    * @Update Date
    */
    public function driver_show_ajax(){
        $_SESSION['menu'] = 'Driver_show';
        $M_dri = new M_cdms_driver();
        $data['arr_driver'] = $M_dri->get_all();
        $this->output('v_driver_showlist', $data);
    }

    /*
    * driver_delete
    * ลบรายการพนักงานขับรถ
    * @input -
    * @output array of driver
    * @author Thanatip
    * @Create Date 2564-07-30
    * @Update Date
    */
    public function driver_delete(){
        $M_dri = new M_cdms_driver();
        $M_dri->delete($this->request->getPost('dri_id'));
        return $this->response->redirect(base_url('/public/driver_show/driver_show_ajax'));
    }

}
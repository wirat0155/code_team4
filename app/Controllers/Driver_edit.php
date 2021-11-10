<?php

namespace App\Controllers;

use App\Models\M_cdms_driver;
use App\Models\M_cdms_car;

/*
* Driver_update
* show driver edit page, update driver
* @author   Warisara
* @Create Date  2564-08-07
*/
class Driver_edit extends Cdms_controller {
    /*
    * driver_update
    * show driver edit page
    * @input    dri_id
    * @output   show driver edit page
    * @author   Warisara
    * @Create Date  2564-08-07
    */
    public function driver_edit($dri_id) {
        $_SESSION['menu'] = 'Driver_show';
        $m_dri = new M_cdms_driver;
        $data['arr_driver'] = $m_dri->get_by_id($dri_id);

        $m_car = new M_cdms_car();
        $data['arr_car'] = $m_car->get_all();
        $this->output('v_driver_edit', $data);
    }

    /*
    * driver_update
    * update driver
    * @input    driver information
    * @output   update driver
    * @author   Warisara
    * @Create Date  2564-08-07
    */
    public function driver_update() {
        $m_dri = new M_cdms_driver();
        //driver information
        $dri_id = $this->request->getPost('dri_id');
        $dri_name = $this->request->getPost('dri_name');
        $dri_tel = $this->request->getPost('dri_tel');
        $dri_card_number = $this->request->getPost('dri_card_number');
        $dri_license = $this->request->getPost('dri_license');
        $dri_license_type = $this->request->getPost('dri_license_type');
        $dri_profile_image = $this->request->getPost('dri_profile_image');
        $dri_status = $this->request->getPost('dri_status');
        $dri_date_start = $this->request->getPost('dri_date_start');
        $dri_date_end = $this->request->getPost('dri_date_end');
        $dri_car_id = $this->request->getPost('dri_car_id');

        // user not change driver image
        if ($this->request->getFile('dri_profile_image') != NULL) {
            if (!$this->request->getFile('dri_profile_image')->isValid()) {
                $dri_profile_image = '';
            }
            else {
                // upload image
                $file = $this->request->getFile('dri_profile_image');
                if ($file->isValid() && !$file->hasMoved()) {
                    $imageName = $file->getRandomName();
                    $file->move('./dri_profile_image', $imageName);
                }
                $dri_profile_image = $imageName;
            }
        }

        //updating driver information
        $m_dri->driver_update($dri_id, $dri_name, $dri_tel,  $dri_card_number,  $dri_license, $dri_license_type, $dri_profile_image,  $dri_status, $dri_date_start,  $dri_date_end, $dri_car_id);

        return $this->response->redirect(base_url('/Driver_show/driver_show_ajax'));
    }
}

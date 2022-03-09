<?php

namespace App\Controllers;

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
        $data['arr_driver'] = $this->m_dri->get_by_id($dri_id);

        $data['arr_car'] = $this->m_car->get_all();
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
        //get post data
        $obj_dri = $this->request->getPost();

        // user not change driver image
        if ($this->request->getFile('dri_profile_image') != NULL) {
            if (!$this->request->getFile('dri_profile_image')->isValid()) {
                $obj_dri["dri_profile_image"] = '';
            }
            else {
                // upload image
                $file = $this->request->getFile('dri_profile_image');
                if ($file->isValid() && !$file->hasMoved()) {
                    $imageName = $file->getRandomName();
                    $file->move('./dri_profile_image', $imageName);
                }
                $obj_dri["dri_profile_image"] = $imageName;
            }
        }

        //updating driver information
        $this->m_dri->driver_update($obj_dri["dri_id"], $obj_dri["dri_name"], $obj_dri["dri_tel"],  $obj_dri["dri_card_number"],  
        $obj_dri["dri_license"], $obj_dri["dri_license_type"], $obj_dri["dri_profile_image"],  $obj_dri["dri_status"], 
        $obj_dri["dri_date_start"], $obj_dri["dri_date_end"], $obj_dri["dri_car_id"]);

        return $this->response->redirect(base_url('/Driver_show/driver_show_ajax'));
    }
}

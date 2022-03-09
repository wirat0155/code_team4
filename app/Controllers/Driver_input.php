<?php

namespace App\Controllers;

/*
* Driver_show
* show driver input page, insert driver
* @author   Thanatip
* @Create Date  2564-08-06
*/
class Driver_input extends Cdms_controller {
    /*
    * driver_input
    * show driver input page
    * @input    -
    * @outpu    show driver input page
    * @author   Thanatip
    * @Create Date  2564-08-06
    */
    public function driver_input() {
        $_SESSION['menu'] = 'Driver_show';
        $data['arr_car'] = $this->m_car->get_all();
        $this->output('v_driver_input', $data);
    }

    /*
    * driver_insert
    * insert driver
    * @input    driver information
    * @output   insert driver
    * @author   Thanatip
    * @Create Date  2564-08-07
    */
    public function driver_insert() {
        //get post data
        $obj_dri = $this->request->getPost();

        // upload image
        $file = $this->request->getFile('dri_profile_image');
        if($file->isValid() && ! $file->hasMoved()){
            $imageName = $file->getRandomName();
            $file->move('./dri_profile_image', $imageName);
        }

        // set name image
        $obj_dri["dri_profile_image"] = $imageName;


        // inserting driver
        $this->m_dri->insert($obj_dri["dri_name"], $obj_dri["dri_tel"], $obj_dri["dri_card_number"], 
        $obj_dri["dri_license"], $obj_dri["dri_license_type"], $obj_dri["dri_profile_image"], 
        $obj_dri["dri_status"], $obj_dri["dri_date_start"], $obj_dri["dri_date_end"], $obj_dri["dri_car_id"]);

        $this->response->redirect(base_url('/Driver_show/driver_show_ajax'));
    }
}

<?php

namespace App\Controllers;

/*
* Set_up
* หน้าจอ Set up
* @author Kittipod
* @Create Date 2564-10-2
* @Update Date 2564-10-2
*/

class Set_up extends Cdms_controller {
    /*
    * set_up_show
    * แสดงหน้าจอ Set up
    * @input -
    * @output Set up
    * @author Kittipod
    * @Create Date 2564-10-2
    * @Update Date 2564-10-2
    */
    public function set_up_show() {
        $this->output('v_set_up');
    }
}

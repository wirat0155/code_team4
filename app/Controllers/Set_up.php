<?php

namespace App\Controllers;

/*
* Set_up
* show set up page
* @author   Kittipod
* @Create Date  2564-10-02
*/
class Set_up extends Cdms_controller {
    /*
    * set_up_show
    * show set up page
    * @input    -
    * @output   show set up page
    * @author   Kittipod
    * @Create Date  2564-10-02
    */
    public function set_up_show() {
        $_SESSION['menu'] = 'Set_up';
        $this->output('v_set_up');
    }
}

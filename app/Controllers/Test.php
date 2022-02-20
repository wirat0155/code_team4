<?php
namespace App\Controllers;

class Test extends Cdms_controller {
    public  $first_name;

    public function show_form() {
        $data["firstname"] = $this->first_name;
        $this->output("v_form", $data);
    }
    public function insert() {
        $this->first_name = $this->request->getPost("firstname");
    }
}

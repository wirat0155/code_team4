<?php
namespace App\Controllers;

class Flutter_login extends Cdms_controller {
   public function login() {
    $obj = json_decode(file_get_contents('php://input'), true);
    return json_encode('test');
   }
}
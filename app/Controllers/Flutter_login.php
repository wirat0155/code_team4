<?php
namespace App\Controllers;

class Flutter_login extends Cdms_controller {
   public function login() {
      $obj = json_decode(file_get_contents('php://input'), true);
      $username = $obj['user_username'];
      $password = $obj['user_password'];

      $user = $this->m_user->get_by_username($username);

      //check password
      if(password_verify($password, $user->user_password) && !empty($user) && !preg_match('/[^a-z0-9 _]+/i', $username)){
         return json_encode('success');
      }else{
         return json_encode('fail');
      }
   }
}
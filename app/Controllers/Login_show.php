<?php

namespace App\Controllers;

use App\Models\M_cdms_user;

/*
* Login_show
* show login
* @author   Kittipod
* @Create Date  2564-12-07
*/
class Login_show extends Cdms_controller {

    /*
    * login_show_ajax
    * show login
    * @input    -
    * @output   v_login
    * @author   Kittipod
    * @Create Date  2564-12-07
    */
    public function login_show_ajax() {
        echo view('v_login.php');
    }

    public function login(){
        session_start();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $m_user = new M_cdms_user();
        $user = $m_user->get_by_username($username);

        if(password_verify($password, $user->user_password) && !empty($user) && !preg_match('/[^a-z0-9 _]+/i', $username)){
            $_SESSION['invalid_password'] = false;
            $_SESSION['logged_in'] = true;
            return redirect()->to(base_url('/Dashboard/dashboard_show'));
        }else{
            $_SESSION['logged_in'] = false;
            $_SESSION['invalid_password'] = true;
            echo view('v_login.php');
        }

    }

    public function logout(){
        session_start();
        session_destroy();
        return $this->response->redirect(base_url('/Login_show/login_show_ajax'));
    }
}
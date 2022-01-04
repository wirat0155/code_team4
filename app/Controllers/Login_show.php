<?php

namespace App\Controllers;

use App\Models\M_cdms_user;
use App\Models\M_cdms_service;

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
        session_start();
        date_default_timezone_set("Asia/Bangkok");
        // load service model
        $m_ser = new M_cdms_service();
        // load container model

        $today = date('Y-m-d');
        $today_time = date('Y-m-d H:i:s');
        // it will be moved to login page when login was done
        // update ser_stac_id to ready (drop) depend on today
        $m_ser->change_ser_stac_id(3, $today);
        // update ser_stac_id to export depend on today
        $m_ser->change_ser_stac_id(4, $today, $today_time);
        echo view('v_login.php');
    }

    /*
    * login
    * check login
    * @input    username, password
    * @output   dashboard_show or login_show_ajax
    * @author   Kittipod
    * @Create Date  2564-12-07
    */
    public function login(){
        session_start();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $data['username'] = $username;

        $m_user = new M_cdms_user();
        $user = $m_user->get_by_username($username);

        if(password_verify($password, $user->user_password) && !empty($user) && !preg_match('/[^a-z0-9 _]+/i', $username)){
            $_SESSION['invalid_password'] = false;
            $_SESSION['logged_in'] = true;
            $_SESSION['user_name'] =  $user;
            unset($_SESSION['fail']);
            return $this->response->redirect(base_url('/Dashboard/dashboard_show'));
        }else{
            $_SESSION['logged_in'] = false;
            $_SESSION['invalid_password'] = true;
            $_SESSION['fail'] =  $username;
            return $this->response->redirect(base_url('/Login_show/login_show_ajax'));
        }

    }

     /*
    * logout
    * Logout
    * @input    -
    * @output   login_show_ajax
    * @author   Kittipod
    * @Create Date  2564-12-22
    */
    public function logout(){
        session_start();
        session_destroy();
        return $this->response->redirect(base_url('/Login_show/login_show_ajax'));
    }
}
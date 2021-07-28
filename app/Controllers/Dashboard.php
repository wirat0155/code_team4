<?php namespace App\Controllers;
use App\Models\M_member;

class Dashboard extends T4MNG_Controller
{
    public function index()
    {
        $_SESSION['menu'] = 'dashboard';

        $M_member = new M_member();
        $data = [];
        $data['arr_member'] = $M_member->get_all();
        // print_r($data['arr_member']);
        $this->output('v_dashboard', $data);
    }
}

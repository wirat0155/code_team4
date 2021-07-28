<?php namespace App\Controllers;
use App\Models\M_cdms_car_type;

class Car_type_show extends Cdms_controller
{
    public function index()
    {
        // ci 4
        $M_cart = new M_cdms_car_type();
        $data['arr_car_type'] = $M_cart->get_all();
        // print_r($data['arr_car_type']);


        $data['num'] = 10;
        $data['array'] = ['วิรัตน์' , 'สากร'];
        // echo view('v_car_type_show', $data);
        $this->output('v_car_type_show', $data);
    }
    public function say_hi($var, $var2) {
        echo "Hi " . $var . ' ' . $var2;
    }
}
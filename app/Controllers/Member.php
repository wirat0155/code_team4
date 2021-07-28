<?php namespace App\Controllers;
use App\Models\M_member;
use App\Models\Da_member;

class Member extends T4MNG_Controller
{
    public function index()
    {
        $_SESSION['menu'] = 'member';
        
        $M_member = new M_member();
        $data = [];
        $data['arr_member'] = $M_member->get_all();
        $this->output('v_member', $data);
    }
    public function delete($mem_id = '') {
        // echo 'delete';
        $Da_member = new M_member();
        $Da_member->mem_id = $mem_id;
        $data =[
            'mem_is_active'=> 0
        ]; 
        $Da_member->update($mem_id, $data);

        $this->response->redirect(base_url() . '/public/member');
    }
}

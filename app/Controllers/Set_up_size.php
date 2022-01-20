<?php

namespace App\Controllers;

use App\Models\M_cdms_size;

/*
* Set_up_size
* manage size
* @author   Tadsawan
* @Create Date  2564-10-22
*/
class Set_up_size extends Cdms_controller
{
    /*
    * size_show
    * show size
    * @input    -
    * @output   array of size
    * @author   Tadsawan
    * @Create Date  2564-10-22
    */
    public function size_show()
    {
        $_SESSION['menu'] = 'Set_up';
        $_SESSION['menu_set_up'] = 'container_size';

        // get size
        $m_size = new M_cdms_size();
        $data['arr_size'] = $m_size->get_all_status();

        $this->output('v_set_up_size', $data);
    }

    /*
    * get_all_size
    * get all size
    * @input    -
    * @output   array of size
    * @author   Thanatip
    * @Create Date  2564-09-10
    */
    public function get_all_size()
    {
        $m_size = new M_cdms_size();
        $data['arr_size'] = $m_size->get_all();
        return json_encode($data['arr_size']);
    }

    /*
    * size_delete
    * delete size
    * @input    size_id
    * @output   delete size
    * @author   Natadanai
    * @Create Date  2564-08-12
    */
    public function size_status()
    {
        $size_id = $this->request->getPost('size_id');
        $m_size = new M_cdms_size();
        $m_size->change_status($size_id);

        return json_encode('pass');
    }

    /*
    * size_restore
    * restore size
    * @input    size_id
    * @output   restore ขนาดตู้
    * @author   Tadsawan
    * @Create Date  2564-10-22
    */
    public function size_restore()
    {
        $size_id = $this->request->getPost('size_id');
        $m_size = new M_cdms_size();
        $m_size->restore($size_id);

        return json_encode('pass');
    }

    /*
    * size_insert
    * insert size
    * @input    size information
    * @output   insert contaioner size
    * @author   Tadsawan
    * @Create Date  2564-10-23
    */
    public function size_insert() {
        $m_size = new M_cdms_size();

        // size information
        $size_name = $this->request->getPost('size_name');
        $size_width_in = $this->request->getPost('size_width_in');
        $size_length_in = $this->request->getPost('size_length_in');
        $size_height_in = $this->request->getPost('size_height_in');
        $size_width_out = $this->request->getPost('size_width_out');
        $size_length_out = $this->request->getPost('size_length_out');
        $size_height_out = $this->request->getPost('size_height_out');
        $size_image = $this->request->getPost('size_image');

        // upload image
        $file = $this->request->getFile('size_image');
        if($file->isValid() && ! $file->hasMoved()){
            $imageName = $file->getRandomName();
            $file->move('./size_image', $imageName);
        }

        $size_image = $imageName;

        // inserting size
        $m_size->insert($size_name, $size_width_in, $size_length_in, $size_height_in, $size_width_out, $size_length_out, $size_height_out, $size_image);
        $this->response->redirect(base_url() . '/Set_up_size/size_show');
    }

    /*
    * delete
    * delete size
    * @input    size_id
    * @output   delete size
    * @author   Tadsawan
    * @Create Date  2564-12-08
    */
    public function size_delete() {
        $m_size = new M_cdms_size();
        $m_size->delete($this->request->getPost('size_id'));
        return $this->response->redirect(base_url('/Set_up_size/size_show'));
    }

    /*
    * edit_size
    * edit size
    * @input    size_id, size_name
    * @output   edit size
    * @author   Tadswan
    * @Create Date  2564-12-10
    */
    public function edit_size() {
        $size_id = $this->request->getPost('size_id');
        $size_name = $this->request->getPost('size_name');
        $size_width_in = $this->request->getPost('size_width_in');
        $size_length_in = $this->request->getPost('size_length_in');
        $size_height_in = $this->request->getPost('size_height_in');
        $size_width_out = $this->request->getPost('size_width_out');
        $size_length_out = $this->request->getPost('size_length_out');
        $size_height_out = $this->request->getPost('size_height_out');

        // upload image
        $file = $this->request->getFile('size_image_' . $size_id);
        if ($file->isValid() && !$file->hasMoved()) {
            $size_image = $file->getRandomName();
            $file->move('./size_image', $size_image);
        }
        $m_size = new M_cdms_size();
        $m_size->size_update($size_id, $size_name, $size_width_in, $size_length_in, $size_height_in, $size_width_out, $size_length_out, $size_height_out, $size_image);
        return $this->response->redirect(base_url('/Set_up_size/size_show'));
    }

}
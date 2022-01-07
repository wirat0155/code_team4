<?php

namespace App\Controllers;

use App\Models\M_cdms_container_type;

/*
* Set_up_container_type
* manage container type
* @author   Tadsawan
* @Create Date  2564-10-01
*/
class Set_up_container_type extends Cdms_controller
{
    /*
    * container_type_show
    * show container type
    * @input    -
    * @output   array of container type
    * @author   Tadsawan
    * @Create Date  2564-10-01
    */
    public function container_type_show()
    {
        $_SESSION['menu'] = 'Set_up';
        $_SESSION['menu_set_up'] = 'container_type';

        // get container type
        $m_cont = new M_cdms_container_type();
        $data['arr_container_type'] = $m_cont->get_all_type();

        $this->output('v_set_up_container_type', $data);
    }

    /*
    * get_all_container_type
    * get all container type
    * @input    -
    * @output   array of container type
    * @author   Tadsawan
    * @Create Date  2564-10-01
    */
    public function get_all_container_type()
    {
        $m_cont = new M_cdms_container_type();
        $data['arr_container_type'] = $m_cont->get_all();
        return json_encode($data['arr_container_type']);
    }

    /*
    * container_type_delete
    * delete container type
    * @input    cont_id
    * @output   delete container type
    * @author   Tadsawan
    * @Create Date  2564-10-04
    */
    public function container_type_delete()
    {
        $cont_id = $this->request->getPost('cont_id');
        $m_cont = new M_cdms_container_type();
        $m_cont->delete($cont_id);

        return json_encode('pass');
    }

    /*
    * container_type_restore
    * restore container type
    * @input    cont_id
    * @output   restore container type
    * @author   Tadsawan
    * @Create Date  2564-10-04
    */
    public function container_type_restore()
    {
        $cont_id = $this->request->getPost('cont_id');
        $m_cont = new M_cdms_container_type();
        $m_cont->restore($cont_id);

        return json_encode('pass');
    }

    /*
    * container_type_insert
    * insert container type
    * @input    cont_name, cont_image
    * @output   insert container type
    * @author   Tadsawan
    * @Create Date  2564-08-06
    */
    public function container_type_insert() {
        $m_cont = new M_cdms_container_type();

        // container type information
        $cont_name = $this->request->getPost('cont_name');
        $cont_image = $this->request->getPost('cont_image');

        // upload image
        $file = $this->request->getFile('cont_image');
        if($file->isValid() && ! $file->hasMoved()){
            $imageName = $file->getRandomName();
            $file->move('./container_type_image', $imageName);
        }

        $cont_image = $imageName;

        // เพิ่มข้อมูลประเเภทตู้
        $m_cont->insert($cont_name, $cont_image);
        $this->response->redirect(base_url() . '/Set_up_container_type/container_type_show');
    }

    /*
    * delete
    * delete container type
    * @input    cont_id
    * @output   delete container type
    * @author   Tadsawan
    * @Create Date  2564-12-08
    */
    public function delete() {
        $m_cont = new M_cdms_container_type();
        $m_cont->container_type_delete($this->request->getPost('cont_id'));
        return $this->response->redirect(base_url('/Set_up_container_type/container_type_show'));
    }

    /*
    * edit_container_type
    * edit contianer type
    * @input    cont_id, cont_name
    * @output   edit container type
    * @author   Wirat
    * @Create Date  2564-12-10
    */
    public function edit_container_type() {
        $cont_id = $this->request->getPost('cont_id');
        $cont_name = $this->request->getPost('cont_name');

        // upload image
        $file = $this->request->getFile('cont_image_' . $cont_id);
        if ($file->isValid() && !$file->hasMoved()) {
            $cont_image = $file->getRandomName();
            $file->move('./container_type_image', $cont_image);
        }
        $m_cont = new M_cdms_container_type();
        $m_cont->container_type_update($cont_id, $cont_name, $cont_image);
        return $this->response->redirect(base_url('/Set_up_container_type/container_type_show'));
    }


    public function check_container_type() {
        $m_cont = new M_cdms_container_type();
        $cont_id = $this->request->getPost('cont_id');
        $obj_container_type = $m_cont->check_container_type($cont_id);
        
        return json_encode($obj_container_type);
    }
}
<?php
namespace App\Controllers;

/*
* Container_show
* show container list, delete conainer
* @author   Wirat
* @Create Date  2564-07-29
*/
class Container_show extends Cdms_controller
{
    /*
    * container_show_ajax
    * show container list
    * @input    -
    * @output   array of container
    * @author   Wirat
    * @Create Date  2564-07-29
    * @Update Date 2564-03-09
    */
    public function container_show_ajax()
    {
        $_SESSION['menu'] = 'Container_show';
        $data['arr_container'] = $this->m_con->get_all();
        $this->output('v_container_showlist', $data);
    }

    public function get_container_ajax()
    {
        $con_id = $this->request->getPost('con_id');
        $con_information = $this->m_con->get_by_id($con_id);

        echo json_encode($con_information);
    }
    /*
    * container_detail
    * show container detain page
    * @input    con_id
    * @output   show container detain page
    * @author   Preechaya
    * @Create Date  2564-08-12
    * @Editor Kittipod
    * @Update Date 2564-03-09
    */
    public function container_detail($con_id)
    {
        $_SESSION['menu'] = 'Container_show';

        // container id
        $data['arr_container'] = $this->m_con->get_by_id($con_id);

        // container size
        $data['arr_size'] = $this->m_size->get_by_id($data['arr_container'][0]->con_size_id);

        // container type
        $data['arr_container_type'] = $this->m_cont->get_all();

        // status container
        $data['arr_status_container'] = $this->m_stac->get_all();

        // data agent
        $data['arr_agent'] = $this->m_agn->get_by_id($data['arr_container'][0]->con_agn_id);

        $this->output('v_container_show_information', $data);
    }

    /*
    * container_delete
    * delete container
    * @input    con_id
    * @output   delete container
    * @author   Wirat
    * @Create Date  2564-07-29
    * @Editor Kittipod
    * @Update Date 2564-03-09
    */
    public function container_delete()
    {
        $con_id = $this->request->getPost('con_id');
        $this->m_con->delete($con_id);
        return $this->response->redirect(base_url('/Container_show/container_show_ajax'));
    }

    /*
    * check_container_number
    * serch container by container number
    * @input    con_number
    * @output   container information
    * @author   Wirat
    * @Editor Kittipod
    * @Update Date 2564-03-09
    */
    public function check_container_number()
    {
        $con_number = $this->request->getPost('con_number');
        $arr_container = $this->m_con->is_con_number_exist($con_number);
        if (count($arr_container) == 1) {
            return json_encode('found');
        } else {
            return json_encode('not found');
        }
    }
}

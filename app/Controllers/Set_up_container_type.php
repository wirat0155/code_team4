<?php

namespace App\Controllers;

use App\Models\M_cdms_container_type;

/*
    * Set_up_container_type
    * แสดงหน้าจอรายการประเภทตู้
    * @author Tadsawan
    * @Create Date 2564-10-01
    * @Update Date 2564-10-04
*/
class Set_up_container_type extends Cdms_controller
{
    /*
    * container_type_show
    * แสดงหน้าจอรายการประเภทตู้
    * @input -
    * @output array of container_type
    * @author Tadsawan
    * @Create Date 2564-10-01
    * @Update Date 2564-10-04
    */
    public function container_type_show()
    {
        $_SESSION['menu'] = 'container_type';
        
        // get container type
        $m_cont = new M_cdms_container_type();
        $data['arr_container_type'] = $m_cont->get_all_type();

        $this->output('v_set_up_container_type', $data);
    }

    /*
    * get_all_container_type
    * แสดงทั้งหมดของประเภทตู้
    * @input -
    * @output array of container_type
    * @author Tadsawan
    * @Create Date 2564-10-01
    * @Update Date 2564-10-04
    */
    public function get_all_container_type()
    {
        $m_cont = new M_cdms_container_type();
        $data['arr_container_type'] = $m_cont->get_all();
        return json_encode($data['arr_container_type']);
    }

     /*
    * container_type_delete
    * ลบประเภทตู้
    * @input cont_id
    * @output ลบประเภทตู้
    * @author Tadsawan
    * @Create Date 2564-10-04
    * @Update Date 2564-10-04
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
    * ลบประเภทตู้
    * @input cont_id
    * @output restore ประเภทตู้
    * @author Tadsawan
    * @Create Date 2564-10-04
    * @Update Date 2564-10-04
    */
    public function container_type_restore()
    {
        $cont_id = $this->request->getPost('cont_id');
        $m_cont = new M_cdms_container_type();
        $m_cont->restore($cont_id);

        return json_encode('pass');
    }

}
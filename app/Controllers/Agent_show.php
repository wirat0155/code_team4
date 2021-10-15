<?php

namespace App\Controllers;

use App\Models\M_cdms_agent;
use App\Models\M_cdms_container;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

/*
* Agent_show
* แสดงรายชื่อเอเย่นต์ และลบรายชื่อเอเย่นต์
* @author Klayuth Preechaya
* @Create Date 2564-07-30
* @Update Date 2564-10-13
*/

class Agent_show extends Cdms_controller {
    /*
    * agent_show_ajax
    * แสดงรายชื่อเอเย่นต์
    * @input -
    * @output array of agent
    * @author Klayuth
    * @Create Date 2564-07-30
    * @Update Date 2564-08-02
    */
    public function agent_show_ajax() {
        $_SESSION['menu'] = 'Agent_show';

        $m_agn = new M_cdms_agent();
        $data['arr_agent'] = $m_agn->get_all();

        $m_con = new M_cdms_container();
        $data['arr_container'] = $m_con->get_all();

        $this->output('v_agent_showlist', $data);
    }

    /*
    * agent_delete
    * ลบรายชื่อเอเย่นต์
    * @input agn_id
    * @output ลบเอเย่นต์
    * @author Preechaya
    * @Create Date 2564-07-30
    * @Update Date 2564-08-02
    */
    public function agent_delete() {
        $m_agn = new M_cdms_agent();
        $m_agn->delete($this->request->getPost('agn_id'));

        return $this->response->redirect(base_url('/Agent_show/agent_show_ajax'));
    }

    /*
    * get_agent_ajax
    * ดึงข้อมูลเอเย่นต์ตามชื่อบริษัท
    * @input agn_company_name
    * @output agn_information
    * @author Preechaya
    * @Create Date 2564-08-07
    * @Update Date 2564-10-13
    */
    public function get_agent_ajax() {
        $m_agn = new M_cdms_agent();
        $agn_id = $this->request->getPost('agn_id');
        $agn_information = $m_agn->get_by_id($agn_id);

        echo json_encode($agn_information);
    }

    /*
    * agent_detail
    * ดูข้อมูลเอเย่นต์
    * @input agn_id
    * @output แสดงหน้าจอข้อมูลเอเย่นต์
    * @author Nattanan
    * @Create Date 2564-08-12
    * @Update Date 2564-08-17
    */
    public function agent_detail($agn_id) {
        $_SESSION['menu'] = 'Agent_show';
        $m_agn = new M_cdms_agent;
        $data['arr_agent'] = $m_agn->get_by_id($agn_id);
        $this->output('v_agent_show_information', $data);
    }
}

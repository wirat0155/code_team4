<?php

namespace App\Controllers;

use App\Models\M_cdms_size;


class Size_show extends Cdms_controller
{
    public function get_size_ajax()
    {
        $m_size = new M_cdms_size();
        $size_id = $this->request->getPost('size_id');
        $size_information = $m_size->get_by_id($size_id);
        echo json_encode($size_information);
    }
}
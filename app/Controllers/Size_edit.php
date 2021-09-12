<?php

namespace App\Controllers;
use App\Models\M_cdms_size;

/*
* Size_edit
* แก้ไขขนาดตู้
* @author Wirat
* @Create Date 2564-09-12
* @Update Date 2564-09-12
*/

class Size_edit extends Cdms_controller {
    /*
    * size_update
    * แก้ไขขนาดตู้
    * @input size_id, size_name, size_height_out, size_width_out, size_length_out, size_height_in, size_width_in, size_length_in
    * @output แก้ไขขนาดตู้
    * @author Wirat
    * @Create Date 2564-09-12
    * @Update Date 2564-09-12
    */
    public function size_update() {
        // รับข้อมูลขนาดตู้จากหน้า View
        $size_id = $this->request->getPost('size_id');
        $size_name = $this->request->getPost('size_name');

        // ขนาดตู้คอนเทนเนอร์ ด้านใน
        $size_width_in = $this->request->getPost('size_width_in');
        $size_length_in = $this->request->getPost('size_length_in');
        $size_height_in = $this->request->getPost('size_height_in');

        // ขนาดตู้คอนเทนเนอร์ ด้านนอก
        $size_width_out = $this->request->getPost('size_width_out');
        $size_length_out = $this->request->getPost('size_length_out');
        $size_height_out = $this->request->getPost('size_height_out');

        // อัปเดตข้อมูลขนาดตู้คอนเทนเนอร์
        $m_cart = new M_cdms_size();
        $m_cart->size_update($size_id, $size_name, $size_width_in, $size_length_in, $size_height_in, $size_width_out, $size_length_out, $size_height_out);

        // กลับไปหน้าจอแดชบอร์ด
        $this->response->redirect(base_url() . '/public/Dashboard/dashboard_show');
    }
}

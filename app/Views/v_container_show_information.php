<div class="container px-6 mx-auto grid">
    <!-- หัวข้อ -->
    <div class="flex items-center justify-between p-3 pl-4 my-8 text-sm font-semibold bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="items-center container">
            <h2 class=" text-2xl font-semibold float-left">
                ข้อมูลตู้คอนเทนเนอร์
            </h2>

            <!-- ปุ่มแก้ไข/ลบ -->
            <div class="float-right">
                <a href="<?php echo base_url() . '/public/Container_edit/container_edit/' . $arr_container[0]->con_id ?>" class="btn btn-warning px-2 mr-1 text-sm ">แก้ไขข้อมูล</a>
                <button type="button" class="btn btn-danger px-2 text-sm" data-toggle="modal" data-target="#exampleModalCenter" onclick="get_id(<?php echo $arr_container[0]->con_id ?>)">ลบข้อมูล </button>
            </div>
        </div>
    </div>

    <form id="update_container_form" action="<?php echo base_url() . '/public/Container_show/container_detail' ?>" method="POST">
        <div class="row">
            <div class="col-12 col-xl-7">
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md p-3">
                    <h2 class="my-6 text-2xl font-semibold dark:text-gray-200">ตู้คอนเทนเนอร์</h2>
                    <hr>

                    <div class="row">
                        <!-- container form left -->
                        <div class="col-12 col-md-6">
                            <!-- หมายเลขตู้ -->
                            <div class="row mt-3">

                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">หมายเลขตู้</span>
                                    </label>
                                </div>

                                <div class="col-12 col-sm-8 div_con_number_input">

                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400"><?php echo $arr_container[0]->con_number ?></span>
                                    </label>
                                </div>
                            </div>


                            <!-- ประเภทตู้ -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ประเภทตู้</span>
                                    </label>
                                </div>

                                <div class="col-12 col-sm-8">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            <?php for ($i = 0; $i < count($arr_container_type); $i++) { ?>
                                                <?php if ($arr_container[0]->con_cont_id == $arr_container_type[$i]->cont_id) {
                                                    echo $arr_container_type[$i]->cont_name;
                                                } ?>
                                            <?php } ?>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <!-- สถานะตู้ -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">สถานะตู้</span>
                                    </label>
                                </div>

                                <div class="col-12 col-sm-8">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            <?php for ($i = 0; $i < count($arr_status_container); $i++) { ?>
                                                <?php if ($arr_container[0]->con_stac_id == $arr_status_container[$i]->stac_id) {
                                                    echo $arr_status_container[$i]->stac_name;
                                                } ?>
                                            <?php } ?>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <!-- น้ำหนักตู้สูงสุดที่รับได้ (ตัน) -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-6">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">น้ำหนักตู้สูงสุดที่รับได้ (ตัน)</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            <?php echo $arr_container[0]->con_max_weight ?>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <!-- น้ำหนักตู้เปล่า (ตัน) -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-6">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">น้ำหนักตู้เปล่า (ตัน)</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            <?php echo $arr_container[0]->con_tare_weight ?>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <!-- น้ำหนักสินค้าสูงสุด (ตัน) -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-6">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">น้ำหนักสินค้าสูงสุด (ตัน)</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            <?php echo $arr_container[0]->con_net_weight ?>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <!-- น้ำหนักสินค้าปัจจุบัน (ตัน)
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">น้ำหนักสินค้าปัจจุบัน (ตัน)</span>
                            <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01">
                        </label> -->

                            <!-- ปริมาตรสุทธิ (คิกบิกเมตร) -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-6">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ปริมาตรสุทธิ (คิกบิกเมตร)</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            <?php echo $arr_container[0]->con_cube ?>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- end container form left -->


                        <!-- container form right -->
                        <div class="col-12 col-md-6">

                            <!-- ขนาดตู้ -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ขนาดตู้</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            <?php echo $arr_size[0]->size_name; ?>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <!-- ความสูงด้านนอก (เมตร) -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-6">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ความสูง (เมตร)</span>
                                    </label>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            <?php echo $arr_size[0]->size_height_out; ?>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <!-- ความกว้างด้านนอก (เมตร) -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-6">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ความกว้าง (เมตร)</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            <?php echo $arr_size[0]->size_width_out ?>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <!-- ความยาวด้านนอก (เมตร) -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-6">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ความยาว (เมตร)</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">

                                            <?php echo $arr_size[0]->size_length_out ?>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- end container form right -->
                    </div>
                    <!-- end container form row -->
                </div>
            </div>

            <!-- end container form -->

            <div class="col-12 col-xl-5">
                <!-- agent form -->
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md p-3">
                    <h2 class="my-6 text-2xl font-semibold dark:text-gray-200">เอเย่นต์</h2>
                    <hr>
                    <div class="row mt-3">
                        <input type="hidden" name="agn_id" value="<?php echo $arr_agent[0]->agn_id ?>">
                        <div class="col-12">

                            <!-- บริษัท -->
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">บริษัท</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            <?php echo $arr_agent[0]->agn_company_name ?>
                                        </span>
                                    </label>

                                </div>
                            </div>

                            <!-- ที่ตั้งบริษัท -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ที่ตั้งบริษัท</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            <?php echo $arr_agent[0]->agn_address ?>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <!-- หมายเลขผู้เสียภาษี -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">หมายเลขผู้เสียภาษี</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            <?php echo $arr_agent[0]->agn_tax ?>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <h4 class="mt-3">ผู้รับผิดชอบ (ตัวแทน)</h4>
                            <!-- ชื่อจริง -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ชื่อจริง</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            <?php echo $arr_agent[0]->agn_firstname ?>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <!-- นามสกุล -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">นามสกุล</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            <?php echo $arr_agent[0]->agn_lastname ?>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <!-- เบอร์ติดต่อ -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">เบอร์ติดต่อ</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            <?php echo $arr_agent[0]->agn_tel ?>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <!-- อีเมล์ -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">อีเมล</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            <?php echo $arr_agent[0]->agn_email ?>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end agent form -->
        </div>
        <!-- end row -->
    </form>
</div>

<!-- Modal ยืนยันการลบ -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการตู้คอนเทนเนอร์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url() . '/public/Container_show/container_delete' ?>" method="post">
                <div class="modal-body float-center">
                    <!-- เก็บ Container Id -->
                    <input name="con_id" id="con_id" type="hidden">
                    <center>คุณเเน่ใจหรือไม่ที่ต้องการลบ</center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <input type="submit" class="btn btn-danger" value="ลบ">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function get_id(con_id) {
        $('#con_id').val(con_id);
    }
</script>
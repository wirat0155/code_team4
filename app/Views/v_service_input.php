<div class="container px-6 mx-auto grid">

    <!-- หัวข้อ -->
    <di class="flex items-center justify-between p-3 pl-4 my-8 text-sm font-semibold bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <h2 class=" text-2xl font-semibold">
                เพิ่มบริการ
            </h2>
        </div>
    </di>

    <form id="add_service_form" action="<?php echo base_url() . '/public/Service_input/service_insert' ?>" method="POST">
        <div class="row">
            <!-- Start container form -->
            <div class="col-12 col-xl-7">
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md p-3">
                    <h2 class="my-6 text-2xl font-semibold dark:text-gray-200">ตู้คอนเทนเนอร์</h2>

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

                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="con_number" pattern="[A-Za-z]{4} [0-9]{5} 0" placeholder="ABCD 12345 0">
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
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="con_cont_id">
                                        <?php for ($i = 0; $i < count($arr_container_type); $i++) { ?>
                                            <option value="<?php echo $arr_container_type[$i]->cont_id ?>"><?php echo $arr_container_type[$i]->cont_name ?></option>
                                        <?php } ?>
                                    </select>
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
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="con_stac_id">
                                        <?php for ($i = 0; $i < count($arr_status_container); $i++) { ?>
                                            <option value="<?php echo $arr_status_container[$i]->stac_id ?>"><?php echo $arr_status_container[$i]->stac_name ?></option>
                                        <?php } ?>
                                    </select>
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_max_weight" placeholder="0.01">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_tare_weight" placeholder="0.01">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_net_weight" placeholder="0.01">
                                </div>
                            </div>
                            <!-- น้ำหนักสินค้าปัจจุบัน (ตัน) -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-7">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">น้ำหนักสินค้าปัจจุบัน (ตัน)</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-5">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="ser_weight" placeholder="0.01">
                                </div>
                            </div>

                            <!-- ปริมาตรสุทธิ (คิกบิกเมตร) -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-7">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ปริมาตรสุทธิ (คิกบิกเมตร)</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-5">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_cube" placeholder="0.01">
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
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="con_size_id" oninput="get_size_information()">
                                        <?php for ($i = 0; $i < count($arr_size); $i++) { ?>
                                            <option value="<?php echo $arr_size[$i]->size_id ?>"><?php echo $arr_size[$i]->size_name ?></option>
                                        <?php } ?>
                                    </select>
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="size_height_out" value="<?php echo $first_size[0]->size_height_out ?>" readonly>
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="size_width_out" value="<?php echo $first_size[0]->size_width_out ?>" readonly>
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="size_length_out" value="<?php echo $first_size[0]->size_length_out ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <!-- end container form right -->
                    </div>
                    <!-- end container form row -->
                </div>
            </div>
            <!-- end container form -->

            <!-- Start service form -->
            <div class="col-12 col-xl-5">
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md p-3">
                    <h2 class="my-6 text-2xl font-semibold dark:text-gray-200">บริการ</h2>

                    <div class="row mt-3">
                        <div class="col-12">
                            <!-- ประเภท -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ประเภท</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="ser_type">
                                        <option value="1">ตู้เข้า</option>
                                        <option value="2">ตู้ออก</option>
                                        <option value="3">ตู้ดรอป</option>
                                    </select>
                                </div>
                            </div>

                            <!-- วันที่ต้องออก cut off -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">วันที่ต้องออก (cut off)</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="datetime-local" name="ser_departure_date">
                                </div>
                            </div>

                            <!-- วันที่เข้าลาน -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">วันที่เข้าลาน</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="datetime-local" name="ser_arrivals_date">
                                </div>
                            </div>

                            <!-- พนักงานนำเข้าลาน -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">พนักงานนำเข้าลาน</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="ser_dri_id_in">
                                        <?php for ($i = 0; $i < count($arr_driver); $i++) { ?>
                                            <option value="<?php echo $arr_driver[$i]->dri_id ?>"><?php echo $arr_driver[$i]->dri_name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <!-- รถที่นำเข้า -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">รถที่นำเข้า</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="ser_car_id_in">
                                        <?php for ($i = 0; $i < count($arr_car); $i++) { ?>
                                            <option value="<?php echo $arr_car[$i]->car_id ?>"><?php echo $arr_car[$i]->car_code ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <!-- วันที่ออกจริง -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">วันที่ออกจริง</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="datetime-local" name="ser_actual_departure_date">
                                </div>
                            </div>

                            <!-- พนักงานนำออกลาน -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">พนักงานนำออกลาน</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="ser_dri_id_out">
                                        <?php for ($i = 0; $i < count($arr_driver); $i++) { ?>
                                            <option value="<?php echo $arr_driver[$i]->dri_id ?>"><?php echo $arr_driver[$i]->dri_name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <!-- รถที่นำออก-->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">รถที่นำออก</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="ser_car_id_out">
                                        <?php for ($i = 0; $i < count($arr_car); $i++) { ?>
                                            <option value="<?php echo $arr_car[$i]->car_id ?>"><?php echo $arr_car[$i]->car_code ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <!-- สถานที่ต้นทาง-->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">สถานที่ต้นทาง</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="text" name="ser_arrivals_location" placeholder="สถานที่ต้นทาง">
                                </div>
                            </div>
                            <!-- สถานที่ปลายทาง-->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">สถานที่ปลายทาง</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="text" name="ser_departure_location" placeholder="สถานที่ปลายทาง">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end service form -->
        </div>
        <!-- end row -->

        <div class="row">
            <!-- Start agent form -->
            <div class="col-12 col-xl-6">
                <!-- agent form -->
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md p-3">
                    <h2 class="my-6 text-2xl font-semibold dark:text-gray-200">เอเย่นต์</h2>

                    <div class="row mt-3">
                        <div class="col-12">
                            <!-- บริษัท -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">บริษัท</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_company_name" placeholder="บริษัท">
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
                                    <textarea class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_address" placeholder="ที่ตั้งบริษัท"></textarea>
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_tax" placeholder="หมายเลขผู้เสียภาษี">
                                </div>
                            </div>
                            <hr class="mb-3">
                            <h4>ผู้รับผิดชอบ (ตัวแทน)</h4>
                            <!-- ชื่อจริง -->
                            <div class="row mt-1">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ชื่อจริง</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_firstname" placeholder="ชื่อจริง">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_lastname" placeholder="นามสกุล">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_tel" placeholder="เบอร์ติดต่อ">
                                </div>
                            </div>

                            <!-- อีเมล์ -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">อีเมล์</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_email" placeholder="อีเมล์">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end agent form -->

            <!-- Start customer form -->
            <div class="col-12 col-xl-6">
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md p-3">
                    <h2 class="my-6 text-2xl font-semibold dark:text-gray-200">ลูกค้า</h2>

                    <div class="row mt-3">
                        <div class="col-12">
                            <!-- บริษัท -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">บริษัท</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_company_name" placeholder="บริษัท">
                                </div>
                            </div>

                            <!-- สาขา -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">สาขา</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_branch" placeholder="สาขา">
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
                                    <textarea class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_address" placeholder="ที่ตั้งบริษัท"></textarea>
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_tax" placeholder="หมายเลขผู้เสียภาษี">
                                </div>
                            </div>

                            <h4>ผู้รับผิดชอบ (ตัวแทน)</h4>
                            <!-- ชื่อจริง -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ชื่อจริง</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_firstname" placeholder="ชื่อจริง">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_lastname" placeholder="นามสกุล">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="tel" name="cus_tel" placeholder="เบอร์ติดต่อ">
                                </div>
                            </div>

                            <!-- อีเมล์ -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">อีเมล์</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="email" name="cus_email" placeholder="อีเมล์">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end customer form -->
        </div>
        <!-- end row -->
        <div class="container text-right">
            <input class="btn btn-secondary px-4 py-2 text-sm font-medium leading-5 text-white" type="button" value="ยกเลิก" onclick="window.history.back();">
            <input class="btn btn-success px-4 py-2 text-sm font-medium leading-5 text-white" type="submit" value="บันทึก">
        </div>
    </form>
    <br>
    <br>
</div>

<script>
    $(document).ready(function() {
        // jQuery Validation
        if ($('#add_service_form').length > 0) {
            $('#add_service_form').validate({
                rules: {
                    con_number: {
                        required: true,
                        minlength: 12,
                        maxlength: 12
                    },
                    con_max_weight: {
                        required: true,
                        min: 0,
                        max: 40
                    },
                    con_tare_weight: {
                        required: true,
                        min: 0,
                        max: 40
                    },
                    con_net_weight: {
                        required: true,
                        min: 0,
                        max: 40
                    },
                    con_cube: {
                        required: true,
                        min: 0,
                        max: 100
                    },
                    agn_company_name: {
                        required: true
                    },
                    agn_tax: {
                        required: true,
                        minlength: 13,
                        maxlength: 13
                    },
                    agn_address: {
                        required: true
                    },
                    agn_firstname: {
                        required: true
                    },
                    agn_lastname: {
                        required: true
                    },
                    agn_tel: {
                        required: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    agn_email: {
                        required: true,
                        email: true
                    },
                    cus_company_name: {
                        required: true
                    },
                    cus_tax: {
                        required: true,
                        minlength: 13,
                        maxlength: 13
                    },
                    cus_address: {
                        required: true
                    },
                    cus_firstname: {
                        required: true
                    },
                    cus_lastname: {
                        required: true
                    },
                    cus_tel: {
                        required: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    cus_email: {
                        required: true,
                        email: true
                    },
                    ser_arrivals_location: {
                        required: true
                    },
                    ser_departure_location: {
                        required: true
                    }
                },
                messages: {
                    con_number: {
                        required: 'กรุณากรอกหมายเลขตู้',
                        minlength: 'กรุณากรอกตามฟอร์แมต',
                        maxlength: 'กรุณากรอกตามฟอร์แมต'
                    },
                    con_max_weight: {
                        required: 'กรุณากรอกน้ำหนักสูงสุด',
                        min: 'กรุณากรอกอย่างน้อย 0',
                        max: 'กรุณากรอกไม่เกิน 40'
                    },
                    con_tare_weight: {
                        required: 'กรุณากรอกน้ำหนักตู้เปล่า',
                        min: 'กรุณากรอกอย่างน้อย 0',
                        max: 'กรุณากรอกไม่เกิน 40'
                    },
                    con_net_weight: {
                        required: 'กรุณากรอกน้ำหนักสินค้าสูงสุด',
                        min: 'กรุณากรอกอย่างน้อย 0',
                        max: 'กรุณากรอกไม่เกิน 40'
                    },
                    con_cube: {
                        required: 'กรุณากรอกหมายเลขตู้',
                        min: 'กรุณากรอกอย่างน้อย 0',
                        max: 'กรุณากรอกไม่เกิน 100'
                    },
                    agn_company_name: {
                        required: 'กรุณากรอกชื่อบริษัท'
                    },
                    agn_tax: {
                        required: 'กรุณากรอกหมายเลขผู้เสียภาษี',
                        minlength: 'กรุณากรอกตัวเลขจำนวน 13 ตัวอักษร',
                        maxlength: 'กรุณากรอกตัวเลขจำนวน 13 ตัวอักษร'
                    },
                    agn_address: {
                        required: 'กรุณากรอกที่อยู่'
                    },
                    agn_firstname: {
                        required: 'กรุณากรอกชื่อจริง'
                    },
                    agn_lastname: {
                        required: 'กรุณากรอกนามสกุล'
                    },
                    agn_tel: {
                        required: 'กรุณากรอกเบอร์โทรศัพท์',
                        minlength: 'กรุณากรอกตัวเลขจำนวน 10 ตัวอักษร',
                        maxlength: 'กรุณากรอกตัวเลขจำนวน 10 ตัวอักษร'
                    },
                    agn_email: {
                        required: 'กรุณากรอกอีเมล',
                        email: 'กรุณากรอกอีเมลให้ถูกต้อง'
                    },
                    cus_company_name: {
                        required: 'กรุณากรอกชื่อบริษัท'
                    },
                    cus_tax: {
                        required: 'กรุณากรอกหมายเลขผู้เสียภาษี',
                        minlength: 'กรุณากรอกตัวเลขจำนวน 13 ตัวอักษร',
                        maxlength: 'กรุณากรอกตัวเลขจำนวน 13 ตัวอักษร'
                    },
                    cus_address: {
                        required: 'กรุณากรอกที่อยู่'
                    },
                    cus_firstname: {
                        required: 'กรุณากรอกชื่อจริง'
                    },
                    cus_lastname: {
                        required: 'กรุณากรอกนามสกุล'
                    },
                    cus_tel: {
                        required: 'กรุณากรอกเบอร์โทรศัพท์',
                        minlength: 'กรุณากรอกตัวเลขจำนวน 10 ตัวอักษร',
                        maxlength: 'กรุณากรอกตัวเลขจำนวน 10 ตัวอักษร'
                    },
                    cus_email: {
                        required: 'กรุณากรอกอีเมล',
                        email: 'กรุณากรอกอีเมลให้ถูกต้อง'
                    },
                    ser_arrivals_location: {
                        required: 'กรุณากรอกสถานที่ต้นทาง'
                    },
                    ser_departure_location: {
                        required: 'กรุณากรอกสถานที่ปลายทาง'
                    }
                }
            })
        }
    });
    // get size information when change con_size_id dropdown
    function get_size_information() {
        let size_id = $('select[name="con_size_id"]').val();
        $.ajax({
            url: '<?php echo base_url() . '/public/Size_show/get_size_ajax' ?>',
            method: 'POST',
            dataType: 'JSON',
            data: {
                size_id: size_id
            },
            success: function(data) {
                show_size_information(data[0]['size_height_out'], data[0]['size_width_out'], data[0]['size_length_out']);
            }
        });
    }
    // show size information when change con_size_id dropdown
    function show_size_information(size_height_out, size_width_out, size_length_out) {
        console.log(size_height_out);
        $('input[name="size_height_out"]').val(size_height_out);
        $('input[name="size_width_out"]').val(size_width_out);
        $('input[name="size_length_out"]').val(size_length_out);
    }
</script>
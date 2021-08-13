<div class="container px-6 mx-auto grid">

    <!-- หัวข้อ -->
    <di class="flex items-center justify-between p-3 pl-4 my-8 text-sm font-semibold bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <h2 class=" text-2xl font-semibold">
                ข้อมูลบริการ
            </h2>
        </div>
    </di>

    <div class="row">
        <!-- Start container form -->
        <input type='hidden' name='con_id' value="<?php echo $obj_container[0]->con_id ?>">
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
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_container[0]->con_number ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $arr_container_type[$obj_container[0]->con_cont_id-1]->cont_name ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $arr_status_container[$obj_container[0]->con_stac_id-1]->stac_name ?></p>
                            </div>
                        </div>
                        <!-- น้ำหนักตู้สูงสุดที่รับได้ (ตัน) -->
                        <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                                <label class="block text-sm mt-3">
                                    <span class="text-gray-700 dark:text-gray-400">น้ำหนักตู้สูงสุดที่รับได้
                                        (ตัน)</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-6">
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_container[0]->con_max_weight ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_container[0]->con_tare_weight ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_container[0]->con_net_weight ?></p>
                            </div>
                        </div>
                        <!-- น้ำหนักสินค้าปัจจุบัน (ตัน) -->
                        <div class="row mt-3">
                            <div class="col-12 col-sm-7">
                                <label class="block text-sm mt-3">
                                    <span class="text-gray-700 dark:text-gray-400">น้ำหนักสินค้าปัจจุบัน
                                        (ตัน)</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-5">
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_service[0]->ser_weight ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_container[0]->con_cube ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $arr_size[$obj_container[0]->con_size_id-1]->size_name ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $first_size[0]->size_height_out ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $first_size[0]->size_width_out ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $first_size[0]->size_length_out ?></p>
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
        <input type='hidden' name='ser_id' value="<?php echo $obj_service[0]->ser_id ?>">
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
                                <p class="block w-full mt-3 text-sm">
                                    <?php if($obj_service[0]->ser_type == 1){
                                            echo "ตู้เข้า";
                                        }else if ($obj_service[0]->ser_type == 2){
                                            echo "ตู้ออก";
                                        }else if($obj_service[0]->ser_type == 3){
                                            echo "ตู้ดรอป";
                                        }       
                                    ?>
                                </p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_service[0]->ser_departure_date ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_service[0]->ser_arrivals_date ?></p>
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
                                    <option value="<?php echo $arr_driver[$i]->dri_id ?>" <?php if ($obj_service[0]->ser_dri_id_in == $arr_driver[$i]->dri_id) echo "selected" ?>>
                                        <?php echo $arr_driver[$i]->dri_name ?></option>
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
                                    <option value="<?php echo $arr_car[$i]->car_id ?>" <?php if ($obj_service[0]->ser_car_id_in == $arr_car[$i]->car_id) echo "selected" ?>>
                                        <?php echo $arr_car[$i]->car_code ?></option>
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="datetime-local" name="ser_actual_departure_date" value="<?php echo datetime_format_value($obj_service[0]->ser_actual_departure_date) ?>" readonly>
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
                                    <option value="<?php echo $arr_driver[$i]->dri_id ?>" <?php if ($obj_service[0]->ser_dri_id_out == $arr_driver[$i]->dri_id) echo "selected" ?>>
                                        <?php echo $arr_driver[$i]->dri_name ?></option>
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
                                    <option value="<?php echo $arr_car[$i]->car_id ?>" <?php if ($obj_service[0]->ser_car_id_out == $arr_car[$i]->car_id) echo "selected" ?>>
                                        <?php echo $arr_car[$i]->car_code ?></option>
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="text" name="ser_arrivals_location" placeholder="สถานที่ต้นทาง" value="<?php echo $obj_service[0]->ser_arrivals_location ?>" readonly>
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="text" name="ser_departure_location" placeholder="สถานที่ปลายทาง" value="<?php echo $obj_service[0]->ser_departure_location ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end agent form -->
    </div>
    <!-- end row -->

    <div class="row">
        <!-- Start agent form -->
        <input type='hidden' name='agn_id' value="<?php echo $obj_agent[0]->agn_id ?>">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_company_name" placeholder="บริษัท" value="<?php echo $obj_agent[0]->agn_company_name ?>" readonly>
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
                                <textarea class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_address" placeholder="ที่ตั้งบริษัท" readonly><?php echo $obj_agent[0]->agn_address ?></textarea>
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_tax" placeholder="หมายเลขผู้เสียภาษี" value="<?php echo $obj_agent[0]->agn_tax ?>" readonly>
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_firstname" placeholder="ชื่อจริง" value="<?php echo $obj_agent[0]->agn_firstname ?>" readonly>
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_lastname" placeholder="นามสกุล" value="<?php echo $obj_agent[0]->agn_lastname ?>" readonly>
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_tel" placeholder="เบอร์ติดต่อ" value="<?php echo $obj_agent[0]->agn_tel ?>" readonly>
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_email" placeholder="อีเมล์" value="<?php echo $obj_agent[0]->agn_email ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end agent form -->

        <!-- Start customer form -->
        <input type='hidden' name='cus_id' value="<?php echo $obj_customer[0]->cus_id ?>" readonly>
        <div class="col-12 col-xl-6">
            <!-- agent form -->
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_company_name" placeholder="บริษัท" value="<?php echo $obj_customer[0]->cus_company_name ?>" readonly>
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_branch" placeholder="สาขา" value="<?php echo $obj_customer[0]->cus_branch ?>" readonly>
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
                                <textarea class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_address" placeholder="ที่ตั้งบริษัท" readonly><?php echo $obj_customer[0]->cus_address ?></textarea>
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_tax" placeholder="หมายเลขผู้เสียภาษี" value="<?php echo $obj_customer[0]->cus_tax ?>" readonly>
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_firstname" placeholder="ชื่อจริง" value="<?php echo $obj_customer[0]->cus_firstname ?>" readonly>
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_lastname" placeholder="นามสกุล" value="<?php echo $obj_customer[0]->cus_lastname ?>" readonly>
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_tel" placeholder="เบอร์ติดต่อ" value="<?php echo $obj_customer[0]->cus_tel ?>" readonly>
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_email" placeholder="อีเมล์" value="<?php echo $obj_customer[0]->cus_email ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end customer form -->
    </div>
    <!-- end row -->
    <!-- <div class="container text-right">
            <input class="btn btn-secondary px-4 py-2 text-sm font-medium leading-5 text-white" type="reset" value="ยกเลิก" />
            <input class="btn btn-success px-4 py-2 text-sm font-medium leading-5 text-white" type="submit" value="บันทึก" />
        </div> -->
    <br>
    <br>
</div>

<script>
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
            show_size_information(data[0]['size_height_out'], data[0]['size_width_out'], data[0]
                ['size_length_out']);
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
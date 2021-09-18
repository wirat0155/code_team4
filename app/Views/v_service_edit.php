<style>
    span {
        /* font-weight: bold; */
    }
</style>
<div class="container px-6 mx-auto grid">

    <!-- หัวข้อ -->
    <div class="flex items-center justify-between p-3 pl-4 my-8 text-sm font-semibold bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <h2 class=" text-2xl font-semibold">
                แก้ไขบริการ
            </h2>
        </div>
    </div>

    <form id="add_service_form" action="<?php echo base_url() . '/public/Service_edit/service_update' ?>" method="POST">
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
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="con_id" onclick="get_container_information()">
                                        <?php for ($i = 0; $i < count($arr_con); $i++) { ?>
                                            <option value="<?php echo $arr_con[$i]->con_id ?>" <?php if ($obj_container[0]->con_id == $arr_con[$i]->con_id) echo "selected" ?>>
                                                <?php echo $arr_con[$i]->con_number ?></option>
                                        <?php } ?>
                                        <option value="new">ตู้ใหม่</option>
                                    </select>
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="con_number" pattern="[A-Za-z]{4} [0-9]{5} 0" placeholder="ABCD 12345 0" hidden>
                                    <label id="con_number-error" class="error" for="con_number"><?php echo $_SESSION['con_number_error'] ?></label>
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
                                            <option value="<?php echo $arr_container_type[$i]->cont_id ?>" <?php if ($obj_container[0]->con_cont_id == $arr_container_type[$i]->cont_id) echo "selected" ?>>
                                                <?php echo $arr_container_type[$i]->cont_name ?></option>
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
                                            <option value="<?php echo $arr_status_container[$i]->stac_id ?>" <?php if ($obj_container[0]->con_stac_id == $arr_status_container[$i]->stac_id) echo "selected" ?>>
                                                <?php echo $arr_status_container[$i]->stac_name ?></option>
                                        <?php } ?>
                                    </select>
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_max_weight" placeholder="0.01" value="<?php echo $obj_container[0]->con_max_weight ?>">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_tare_weight" placeholder="0.01" value="<?php echo $obj_container[0]->con_tare_weight ?>">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_net_weight" placeholder="0.01" value="<?php echo $obj_container[0]->con_net_weight ?>">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="ser_weight" placeholder="0.01" value="<?php echo $obj_service[0]->ser_weight ?>">
                                </div>
                            </div>

                            <!-- ปริมาตรสุทธิ (คิวบิกเมตร) -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-7">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ปริมาตรสุทธิ (คิวบิกเมตร)</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-5">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_cube" placeholder="0.01" value="<?php echo $obj_container[0]->con_cube ?>">
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
                                            <option value="<?php echo $arr_size[$i]->size_id ?>" <?php if ($obj_container[0]->con_size_id == $arr_size[$i]->size_id) echo "selected" ?>>
                                                <?php echo $arr_size[$i]->size_name ?></option>
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
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="ser_type">
                                        <option value="1" <?php if ($obj_service[0]->ser_type == 1) echo "selected" ?>>ตู้เข้า</option>
                                        <option value="2" <?php if ($obj_service[0]->ser_type == 2) echo "selected" ?>>ตู้ออก</option>
                                        <option value="3" <?php if ($obj_service[0]->ser_type == 3) echo "selected" ?>>ตู้ดรอป</option>

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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="datetime-local" name="ser_departure_date" value="<?php echo datetime_format_value($obj_service[0]->ser_departure_date) ?>">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="datetime-local" name="ser_arrivals_date" value="<?php echo datetime_format_value($obj_service[0]->ser_arrivals_date) ?>">
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
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="ser_dri_id_in" onclick="get_car_information(1)">
                                        <?php for ($i = 0; $i < count($arr_driver); $i++) { ?>
                                            <option value="<?php echo $arr_driver[$i]->dri_id ?>" <?php if ($obj_service[0]->ser_dri_id_in == $arr_driver[$i]->dri_id) echo "selected" ?>>
                                                <?php echo $arr_driver[$i]->dri_name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-12">
                                    <br><input type="checkbox" id="open" onclick="open_disable(1)"> ใช้รถที่ไม่ใช่รถประจำ
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
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="ser_car_id_in" disabled>
                                        <?php for ($i = 0; $i < count($arr_car); $i++) { ?>
                                            <option value="<?php echo $arr_car[$i]->car_id ?>" <?php if ($obj_service[0]->ser_car_id_in == $arr_car[$i]->car_id) echo "selected" ?>>
                                                <?php echo 'คันที่ ' . $arr_car[$i]->car_number . ' ทะเบียน ' . $arr_car[$i]->car_code ?></option>
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="datetime-local" name="ser_actual_departure_date" value="<?php echo datetime_format_value($obj_service[0]->ser_actual_departure_date) ?>">
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
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="ser_dri_id_out" onclick="get_car_information(2)">
                                        <?php for ($i = 0; $i < count($arr_driver); $i++) { ?>
                                            <option value="<?php echo $arr_driver[$i]->dri_id ?>" <?php if ($obj_service[0]->ser_dri_id_out == $arr_driver[$i]->dri_id) echo "selected" ?>>
                                                <?php echo $arr_driver[$i]->dri_name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-12">
                                    <br><input type="checkbox" id="open2" onclick="open_disable(2)"> ใช้รถที่ไม่ใช่รถประจำ
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
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="ser_car_id_out" disabled>
                                        <?php for ($i = 0; $i < count($arr_car); $i++) { ?>
                                            <option value="<?php echo $arr_car[$i]->car_id ?>" <?php if ($obj_service[0]->ser_car_id_out == $arr_car[$i]->car_id) echo "selected" ?>>
                                                <?php echo 'คันที่ ' . $arr_car[$i]->car_number . ' ทะเบียน ' . $arr_car[$i]->car_code ?></option>
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="text" name="ser_arrivals_location" placeholder="สถานที่ต้นทาง" value="<?php echo $obj_service[0]->ser_arrivals_location ?>">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="text" name="ser_departure_location" placeholder="สถานที่ปลายทาง" value="<?php echo $obj_service[0]->ser_departure_location ?>">
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
                                <div class="col-12 col-sm-4">
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_id" onclick="get_agent_information()">
                                        <?php for ($i = 0; $i < count($arr_agn); $i++) { ?>
                                            <option value="<?php echo $arr_agn[$i]->agn_id ?>" <?php if ($obj_agent[0]->agn_id == $arr_agn[$i]->agn_id) echo "selected" ?>>
                                                <?php echo $arr_agn[$i]->agn_company_name ?></option>
                                        <?php } ?>
                                        <option value="new">เอเย่นต์ใหม่</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_company_name" placeholder="ชื่อบริษัท" hidden>
                                    <label id="agn_company_name_error" class="error" for="agn_company_name"><?php echo $_SESSION['agn_company_name_error'] ?></label>
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
                                    <textarea class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_address" placeholder="ที่ตั้งบริษัท"><?php echo $obj_agent[0]->agn_address ?></textarea>
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_tax" placeholder="หมายเลขผู้เสียภาษี" value="<?php echo $obj_agent[0]->agn_tax ?>">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_firstname" placeholder="ชื่อจริง" value="<?php echo $obj_agent[0]->agn_firstname ?>">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_lastname" placeholder="นามสกุล" value="<?php echo $obj_agent[0]->agn_lastname ?>">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_tel" placeholder="0812345678" value="<?php echo $obj_agent[0]->agn_tel ?>">
                                </div>
                            </div>

                            <!-- อีเมล -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">อีเมล</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_email" placeholder="อีเมล" value="<?php echo $obj_agent[0]->agn_email ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end agent form -->

            <!-- Start customer form -->
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
                                <div class="col-12 col-sm-4">
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_id" onclick="get_customer_information()">
                                        <?php for ($i = 0; $i < count($arr_cus); $i++) { ?>
                                            <option value="<?php echo $arr_cus[$i]->cus_id ?>" <?php if ($obj_customer[0]->cus_id == $arr_cus[$i]->cus_id) echo "selected" ?>>
                                                <?php echo $arr_cus[$i]->cus_company_name ?></option>
                                        <?php } ?>
                                        <option value="new">ลูกค้าใหม่</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_company_name" placeholder="ชื่อบริษัท" hidden>
                                    <label id="cus_company_name_error" class="error" for="cus_company_name"><?php echo $_SESSION['cus_company_name_error'] ?></label>
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_branch" placeholder="สาขา" value="<?php echo $obj_customer[0]->cus_branch ?>">
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
                                    <textarea class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_address" placeholder="ที่ตั้งบริษัท"><?php echo $obj_customer[0]->cus_address ?></textarea>
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_tax" placeholder="หมายเลขผู้เสียภาษี" value="<?php echo $obj_customer[0]->cus_tax ?>">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_firstname" placeholder="ชื่อจริง" value="<?php echo $obj_customer[0]->cus_firstname ?>">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_lastname" placeholder="นามสกุล" value="<?php echo $obj_customer[0]->cus_lastname ?>">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_tel" placeholder="0812345678" value="<?php echo $obj_customer[0]->cus_tel ?>">
                                </div>
                            </div>

                            <!-- อีเมล -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-4">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">อีเมล</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_email" placeholder="อีเมล" value="<?php echo $obj_customer[0]->cus_email ?>">
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
            <input class="btn btn-success px-4 py-2 text-sm font-medium leading-5 text-white" type="submit" value="บันทึกการแก้ไข">
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

    function open_disable(status) {
        if (status == 1) {
            if (document.getElementById('open').checked) {
                $('select[name="ser_car_id_in"]').prop('disabled', false);
            } else {
                $('select[name="ser_car_id_in"]').prop('disabled', true);
                get_car_information(status);
            }
        } else {
            if (document.getElementById('open2').checked) {
                $('select[name="ser_car_id_out"]').prop('disabled', false);
            } else {
                $('select[name="ser_car_id_out"]').prop('disabled', true);
                get_car_information(status);
            }
        }
    }
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

    function get_container_information() {
        let con_id = $('select[name="con_id"]').val();

        if (con_id != '' && con_id != "new") {
            $('input[name="con_number"]').prop('hidden', true);
            $.ajax({
                url: '<?php echo base_url() . '/public/Container_show/get_container_ajax' ?>',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    con_id: con_id
                },
                success: function(data) {
                    console.log(data);
                    show_container_information(data);
                }
            });
        }
        if (con_id == "new") {
            $('input[name="con_number"]').prop('hidden', false);
            clear_container_information();
        }
    }


    function show_container_information(container) {
        $('select[name="con_cont_id"]').val(container[0]['con_cont_id']);
        $('select[name="con_stac_id"]').val(container[0]['con_stac_id']);
        $('input[name="con_max_weight"]').val(container[0]['con_max_weight']);
        $('input[name="con_tare_weight"]').val(container[0]['con_tare_weight']);
        $('input[name="con_net_weight"]').val(container[0]['con_net_weight']);
        $('input[name="con_cube"]').val(container[0]['con_cube']);
        $('select[name="con_size_id"]').val(container[0]['con_size_id']);
        get_size_information();
    }


    function clear_container_information() {
        $('select[name="con_cont_id"]').val('');
        $('select[name="con_stac_id"]').val('');
        $('input[name="con_max_weight"]').val('');
        $('input[name="con_tare_weight"]').val('');
        $('input[name="con_net_weight"]').val('');
        $('input[name="con_cube"]').val('');
        $('select[name="con_size_id"]').val('');
        $('input[name="size_height_out"]').val('');
        $('input[name="size_width_out"]').val('');
        $('input[name="size_length_out"]').val('');
    }

    function get_car_information(status) {
        let ser_dri_id_in = $('select[name="ser_dri_id_in"]').val();
        let ser_dri_id_out = $('select[name="ser_dri_id_out"]').val();

        if (status == 1) {
            if (ser_dri_id_in != '') {
                $.ajax({
                    url: '<?php echo base_url() . '/public/Driver_show/get_driver_ajax' ?>',
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        ser_dri: ser_dri_id_in
                    },
                    success: function(data) {
                        console.log(data);
                        show_driver_information(data, status);
                    }
                });
            } else {
                clear_driver_information();
            }
        } else {
            if (ser_dri_id_out != '') {
                $.ajax({
                    url: '<?php echo base_url() . '/public/Driver_show/get_driver_ajax' ?>',
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        ser_dri: ser_dri_id_out
                    },
                    success: function(data) {
                        console.log(data);
                        show_driver_information(data, status);
                    }
                });
            } else {
                clear_driver_information();
            }
        }

    }

    // show agent information when input agn_company_name
    function show_driver_information(driver, status) {
        if (status == 1) {
            $('select[name="ser_car_id_in"]').val(driver[0]['dri_car_id']);
        } else {
            $('select[name="ser_car_id_out"]').val(driver[0]['dri_car_id']);
        }
    }

    // clear agent information when delete input agn_company_name
    function clear_driver_information() {
        $('select[name="ser_car_id_in"]').val('');
        $('select[name="ser_car_id_out"]').val('');
    }

    function get_agent_information() {
        let agn_id = $('select[name="agn_id"]').val();
        // console.log("agn_name :" + agn_company_name);
        if (agn_id != '' && agn_id != "new") {
            $('input[name="agn_company_name"]').prop('hidden', true);
            $.ajax({
                url: '<?php echo base_url() . '/public/Agent_show/get_agent_ajax' ?>',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    agn_id: agn_id
                },
                success: function(data) {
                    console.log(data);
                    show_agent_information(data);
                }
            });
        }
        if (agn_id == "new") {
            $('input[name="agn_company_name"]').prop('hidden', false);
            clear_agent_information();
        }
    }

    // show agent information when input agn_company_name
    function show_agent_information(agent) {
        $('textarea[name="agn_address"]').val(agent[0]['agn_address']);
        $('input[name="agn_tax"]').val(agent[0]['agn_tax']);
        $('input[name="agn_firstname"]').val(agent[0]['agn_firstname']);
        $('input[name="agn_lastname"]').val(agent[0]['agn_lastname']);
        $('input[name="agn_tel"]').val(agent[0]['agn_tel']);
        $('input[name="agn_email"]').val(agent[0]['agn_email']);
    }

    // clear agent information when delete input agn_company_name
    function clear_agent_information() {
        $('textarea[name="agn_address"]').val('');
        $('input[name="agn_tax"]').val('');
        $('input[name="agn_firstname"]').val('');
        $('input[name="agn_lastname"]').val('');
        $('input[name="agn_tel"]').val('');
        $('input[name="agn_email"]').val('');
    }

    function get_customer_information() {
        let cus_id = $('select[name="cus_id"]').val();
        // console.log("agn_name :" + agn_company_name);
        if (cus_id != '' && cus_id != "new") {
            $('input[name="cus_company_name"]').prop('hidden', true);
            $.ajax({
                url: '<?php echo base_url() . '/public/Customer_show/get_customer_ajax' ?>',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    cus_id: cus_id
                },
                success: function(data) {
                    console.log(data);
                    show_customer_information(data);
                }
            });
        } if (cus_id == "new") {
            $('input[name="cus_company_name"]').prop('hidden', false);
            clear_customer_information();
        }
    }

    // show agent information when input agn_company_name
    function show_customer_information(customer) {
        $('input[name="cus_branch"]').val(customer[0]['cus_branch']);
        $('textarea[name="cus_address"]').val(customer[0]['cus_address']);
        $('input[name="cus_tax"]').val(customer[0]['cus_tax']);
        $('input[name="cus_firstname"]').val(customer[0]['cus_firstname']);
        $('input[name="cus_lastname"]').val(customer[0]['cus_lastname']);
        $('input[name="cus_tel"]').val(customer[0]['cus_tel']);
        $('input[name="cus_email"]').val(customer[0]['cus_email']);
    }

    // clear agent information when delete input agn_company_name
    function clear_customer_information() {
        $('input[name="cus_branch"]').val('');
        $('textarea[name="cus_address"]').val('');
        $('input[name="cus_tax"]').val('');
        $('input[name="cus_firstname"]').val('');
        $('input[name="cus_lastname"]').val('');
        $('input[name="cus_tel"]').val('');
        $('input[name="cus_email"]').val('');
    }
</script>
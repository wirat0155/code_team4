<style>
.text-con-in {
    background-color: #29B3F1;
    border: none;
    color: white;
    border-radius: 8px;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}

.text-con-out {
    background-color: #44BB55;
    border: none;
    color: white;
    border-radius: 8px;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}

.text-con-drop {
    background-color: #F5D432;
    border: none;
    color: white;
    border-radius: 8px;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}
</style>
<div class="container px-6 mx-auto grid">

    <!-- หัวข้อ -->
    <di class="flex items-center justify-between p-3 pl-4 my-8 text-sm font-semibold bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="items-center container">
            <h2 class=" text-2xl font-semibold float-left">
                ข้อมูลบริการ
            </h2>
            <div class="float-right">
                
                <!-- ปุ่มตรวจสอบประวัติ -->
                <button type="button" class="btn btn-success px-2 text-sm" data-toggle="modal" data-target="#check_change_history" onclick="get_change_service(<?php echo $obj_service[0]->ser_id_change ?>)">ตรวจสอบประวัติ
                </button>
                <!-- ปุ่มแก้ไข -->
                <a href="<?php echo base_url() . '/public/Service_edit/service_edit/' . $obj_service[0]->ser_id ?>" class="btn btn-warning px-2 mr-1 text-sm ">แก้ไขข้อมูล</a>
                <!-- ปุ่มลบ -->
                <button type="button" class="btn btn-danger px-2 text-sm" data-toggle="modal" data-target="#exampleModalCenter" onclick="get_id(<?php echo $obj_service[0]->ser_id ?>)">ลบข้อมูล
                </button>
            </div>
        </div>
    </di>

    <script >
        function get_change_service(ser_id_change) {
            console.log(ser_id_change)
            
        $.ajax({
            url: '<?php echo base_url() . "/public/Service_show/get_change_service" ?>',
            method: 'POST',
            dataType: 'JSON',
            data: {
                ser_id_change: ser_id_change
            },
            success: function(data) {
                $('.modal-body').empty();
                console.log(data);
                var modal_content="";
                var length = data.length;
                var old_con_number = $('#con_number').text();
                var old_agn_company_name = $('#agn_company_name').text();
                for(var i = length - 1; i >= 0; i--){
                    if (i == 0) {
                        // last div
                        modal_content=`<div  class="container border border-secondary col-4 row">`;
                        modal_content+=`<div class="col-12"> วันที่เข้าลาน : ${data[i]["ser_arrivals_date"]}</div>`;
                               
                        modal_content+=`<div class="col-6 text-sm">หมายเลขตู้เก่า : ${old_con_number} <br> บริษัทเอเย่นต์เก่า : ${old_agn_company_name}</div> `;
                            
                        modal_content+=`<div class="col-6 text-sm">หมายเลขตู้ใหม่ : ${data[i]["con_number"]} <br> บริษัทเอเย่นต์ใหม่ : ${data[i]["agn_company_name"]}</div></div>`;
                        $('.modal-body').append(modal_content);
                    } 
                    else {
                        modal_content=`<div  class="container border border-secondary col-4 row">`;
                        modal_content+=`<div class="col-12"> วันที่เข้าลาน : ${data[i]["ser_arrivals_date"]}</div>`;
                               
                        modal_content+=`<div class="col-6 text-sm">หมายเลขตู้เก่า : ${data[i - 1]["con_number"]} <br> บริษัทเอเย่นต์เก่า : ${data[i - 1]["agn_company_name"]}</div> `;
                            
                        modal_content+=`<div class="col-6 text-sm">หมายเลขตู้ใหม่ : ${data[i]["con_number"]} <br> บริษัทเอเย่นต์ใหม่ : ${data[i]["agn_company_name"]}</div></div>`;
                        $('.modal-body').append(modal_content);
                    }
                }   
            }
        });
    }
    </script>

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
                                <p class="block w-full mt-3 text-sm" id="con_number"><?php echo $obj_container[0]->con_number ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $arr_container_type[0]->cont_name ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $arr_status_container[0]->stac_name ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $arr_size[0]->size_name ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $arr_size[0]->size_height_out ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $arr_size[0]->size_width_out ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $arr_size[0]->size_length_out ?></p>
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
                                    <?php if ($obj_service[0]->ser_type == 1) {
                                        echo '<span class="text-con-in">ตู้เข้า</span>';
                                    } else if ($obj_service[0]->ser_type == 2) {
                                        echo '<span class="text-con-out">ตู้ออก</span>';
                                    } else if ($obj_service[0]->ser_type == 3) {
                                        echo '<span class="text-con-drop">ตู้ดรอป</span>';
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
                                <p class="block w-full mt-3 text-sm"><?php echo date_thai($obj_service[0]->ser_departure_date) ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo date_thai($obj_service[0]->ser_arrivals_date) ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $arr_driver_in[0]->dri_name ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $arr_car_in[0]->car_code ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo date_thai($obj_service[0]->ser_actual_departure_date) ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $arr_driver_out[0]->dri_name ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $arr_car_out[0]->car_code ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_service[0]->ser_arrivals_location ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_service[0]->ser_departure_location ?></p>
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
                                <p class="block w-full mt-3 text-sm" id="agn_company_name"><?php echo $obj_agent[0]->agn_company_name ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_agent[0]->agn_address ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_agent[0]->agn_tax ?></p>
                            </div>
                        </div>
                        <h4 class="mt-3">ผู้รับผิดชอบ (ตัวแทน)</h4>
                        <!-- ชื่อจริง -->
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <label class="block text-sm mt-3">
                                    <span class="text-gray-700 dark:text-gray-400">ชื่อจริง</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-8">
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_agent[0]->agn_firstname ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_agent[0]->agn_lastname ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_agent[0]->agn_tel ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_agent[0]->agn_email ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_customer[0]->cus_company_name ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_customer[0]->cus_branch ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_customer[0]->cus_address ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_customer[0]->cus_tax ?></p>
                            </div>
                        </div>

                        <h4 class="mt-3">ผู้รับผิดชอบ (ตัวแทน)</h4>
                        <!-- ชื่อจริง -->
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <label class="block text-sm mt-3">
                                    <span class="text-gray-700 dark:text-gray-400">ชื่อจริง</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-8">
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_customer[0]->cus_firstname ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_customer[0]->cus_lastname ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_customer[0]->cus_tel ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $obj_customer[0]->cus_email ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end customer form -->
    </div>
    <!-- end row -->
</div>

<!-- Modal ตรวจสอบประวัติ -->
<div class="modal fade" id="check_change_history" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">ประวัติการเปลี่ยนตู้</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body float-center">
            
            </div>       
        </div>
    </div>
</div>

<!-- Modal ยืนยันการลบ -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบบริการ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url() . '/public/Service_show/service_delete' ?>" method="post">
                <div class="modal-body float-center">
                    <!-- เก็บ Service Id -->
                    <input name="ser_id" id="ser_id" type="hidden">
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
function get_id(ser_id) {
    $('#ser_id').val(ser_id);
}
</script>
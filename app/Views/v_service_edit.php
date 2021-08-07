<div class="container px-6 mx-auto grid">

    <!-- หัวข้อ -->
    <di
        class="flex items-center justify-between p-3 pl-4 my-8 text-sm font-semibold bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <h2 class=" text-2xl font-semibold">
                เพิ่มบริการ
            </h2>
        </div>
    </di>

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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input"
                                        name="con_number" placeholder="หมายเลขตู้">
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
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input"
                                        name="con_cont_id">
                                        <option value="">Dry Container</option>
                                        <option value="">Reefer Container</option>
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
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input"
                                        name="con_status">
                                        <option value="">นำตู้เข้าลาน</option>
                                        <option value="">รอตรวจสอบ</option>
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number"
                                        step="0.01" name="con_max_weight" placeholder="0.01">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number"
                                        step="0.01" name="con_tare_weight" placeholder="0.01">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number"
                                        step="0.01" name="con_net_weight" placeholder="0.01">
                                </div>
                            </div>
                            <!-- น้ำหนักสินค้าปัจจุบัน (ตัน) 
                            <div class="row mt-3">
                                <div class="col-12 col-sm-6">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">น้ำหนักสินค้าปัจจุบัน (ตัน)</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="" placeholder="0.01">
                                </div>
                            </div>
                        </div> -->
                            <!-- ปริมาตรสุทธิ (คิกบิกเมตร) -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-7">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ปริมาตรสุทธิ (คิกบิกเมตร)</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-5">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number"
                                        step="0.01" name="con_cube" placeholder="0.01">
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
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input"
                                        name="con_size_id">
                                        <option value="">20 ฟุต</option>
                                        <option value="">40 ฟุต</option>
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number"
                                        step="0.01" placeholder="0.01">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number"
                                        step="0.01" placeholder="0.01">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number"
                                        step="0.01" placeholder="0.01">
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
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input"
                                        name="ser_type">
                                        <option value="">ตู้เข้า</option>
                                        <option value="">ตู้ออก</option>
                                        <option value="">ตู้ดรอป</option>
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="date"
                                        name="ser_departure_date">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="date"
                                        name="ser_arrivals_date">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="text"
                                        name="ser_dri_id_in" placeholder="พนักงานนำเข้าลาน">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="text"
                                        name="ser_car_id_in" placeholder="รถที่นำเข้า">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="date"
                                        name="ser_actual_departure_date">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="text"
                                        name="ser_dri_id_out" placeholder="พนักงานนำออกลาน">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="text"
                                        name="ser_car_id_out" placeholder="รถที่นำออก">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="text"
                                        name="ser_arrivals_location" placeholder="สถานที่ต้นทาง">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="text"
                                        name="ser_departure_location" placeholder="สถานที่ปลายทาง">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end agent form -->
        </div>
        <!-- end row -->

        <div class="container text-right">
            <input class="btn btn-secondary px-4 py-2 text-sm font-medium leading-5 text-white" type="reset"
                value="ยกเลิก" />
            <input class="btn btn-success px-4 py-2 text-sm font-medium leading-5 text-white" type="submit"
                value="บันทึก" />
        </div>
    </form>
    <br>
    <br>
</div>

<script>
$(document).ready(function() {
    // jQuery Validation
    /*if ($('#add_container_form').length > 0) {
        $('#add_container_form').validate({
            rules: {
                agn_company_name: {
                    required: true
                },
                con_cube: {
                    required: true,
                    min: 0,
                    max: 100
                },
                email: {
                    required: true,
                    maxlength: 30,
                    email: true
                }
            },
            messages: {
                agn_company_name: {
                    required: 'กรุณากรอกชื่อบริษัทเอเย่นต์',
                },
                con_cube: {
                    required: 'กรุณากรอกปริมาตรสุทธิ',
                    min: 'กรุณาใส่ปริมาตรมากกว่า 0',
                    max: 'กรุณาใส่ปริมาตรไม่เกิน 100'
                },
                email: {
                    required: 'Email is required',
                    maxlength: 'The email should not more than 30 chars',
                    email: 'It does not seem to be a valid email',
                }
            }
        })
    }*/
});
</script>
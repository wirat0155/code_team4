<div class="container mx-auto grid mt-3">
    <form id="add_container_form" action="<?php echo base_url() . '/public/Container_input/container_insert'?>" method="POST">
    <div class="row">
        <div class="col-12 col-xl-7">
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md p-3">
                    <h2 class="my-6 text-2xl font-semibold dark:text-gray-200">ตู้คอนเทนเนอร์</h2>
                    <hr class="mb-5">

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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="con_number" pattern="[A-Za-z]{4} [0-9]{5} 0" >
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
                                    <?php for($i = 0; $i < count($arr_container_type); $i++) { ?>
                                        <option value="<?php echo $arr_container_type[$i]->cont_id?>"><?php echo $arr_container_type[$i]->cont_name?></option>
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
                                    <?php for ($i= 0; $i < count($arr_status_container); $i++) { ?>
                                        <option value="<?php echo $arr_status_container[$i]->stac_id?>"><?php echo $arr_status_container[$i]->stac_name?></option>
                                    <?php } ?>
                                    <option value="">รอตรวจสอบ</option>
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_max_weight">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_tare_weight">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_net_weight">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_cube">
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
                                <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="con_size_id">
                                    <?php for ($i = 0; $i < count($arr_size); $i++) { ?>
                                        <option value="<?php echo $arr_size[$i]->size_id?>"><?php echo $arr_size[$i]->size_name?></option>
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="size_height_out">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="size_width_out">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="size_length_out">
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
                <hr class="mb-5">
                
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_company_name">
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
                                <textarea class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_address"></textarea>
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_tax">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="firstname">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_lastname">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_tel">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_email">
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
        <input class="btn btn-secondary px-4 py-2 text-sm font-medium leading-5 text-white" type="reset" value="ยกเลิก" />
        <input class="btn btn-success px-4 py-2 text-sm font-medium leading-5 text-white" type="submit" value="บันทึก" />
    </div>
    </form>
    <br>
    <br>
</div>

<script>
    // $(document).ready(function() {
    //     // jQuery Validation
    //     if ($('#add_container_form').length > 0) {
    //         $('#add_container_form').validate({
    //             rules: {
    //                 agn_company_name: {
    //                     required: true
    //                 },
    //                 con_cube: {
    //                     required: true,
    //                     min: 0,
    //                     max: 100
    //                 },
    //                 email: {
    //                     required: true,
    //                     maxlength: 30,
    //                     email: true
    //                 }
    //             },
    //             messages: {
    //                 agn_company_name: {
    //                     required: 'กรุณากรอกชื่อบริษัทเอเย่นต์',
    //                 },
    //                 con_cube: {
    //                     required: 'กรุณากรอกปริมาตรสุทธิ',
    //                     min: 'กรุณาใส่ปริมาตรมากกว่า 0',
    //                     max: 'กรุณาใส่ปริมาตรไม่เกิน 100'
    //                 },
    //                 email: {
    //                     required: 'Email is required',
    //                     maxlength: 'The email should not more than 30 chars',
    //                     email: 'It does not seem to be a valid email',
    //                 }
    //             }
    //         })
    //     }
    // });
</script>
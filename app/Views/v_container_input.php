<div class="container mx-auto grid mt-3">
    <form id="add_container_form" action="" method="POST">
    <div class="row">
        <div class="col-12 col-xl-7">
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md p-3">
                    <h2 class="my-6 text-2xl font-semibold dark:text-gray-200">ตู้คอนเทนเนอร์</h2>
                    <hr class="mb-5">
                
                <!-- class -->
                <!-- margin-top margin-bottom margin-left margin-right -->
                <!-- mt   mb    ml   mr -->
                <!-- padding -->
                <!-- pt   pb    pl   pr -->


                <div class="row">
                    <!-- container form left -->
                    <div class="col-12 col-md-6">
                        <!-- หมายเลขตู้ -->
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <label class="block text-sm mt-3">
                                    <span class="text-gray-700 dark:text-gray-400">หมายเลขตู้</span>
                                </label>
                            </div>
    
                            <div class="col-12 col-sm-8">
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="con_number">
                            </div>
                        </div>
        

                        <!-- ประเภทตู้ -->
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">ประเภทตู้</span>
                            <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="con_cont_id">
                                <option value="">Dry Container</option>
                                <option value="">Reefer Container</option>
                            </select>
                        </label>
        
                        <!-- สถานะตู้
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">สถานะตู้</span>
                            <select class="block w-full mt-1 text-sm focus:outline-none form-input">
                                <option value="">นำตู้เข้าลาน</option>
                                <option value="">รอตรวจสอบ</option>
                            </select>
                        </label> -->
        
                        <!-- น้ำหนักตู้สูงสุดที่รับได้ (ตัน) -->
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">น้ำหนักตู้สูงสุดที่รับได้ (ตัน)</span>
                            <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_max_weight">
                        </label>
        
                        <!-- น้ำหนักตู้เปล่า (ตัน) -->
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">น้ำหนักตู้เปล่า (ตัน)</span>
                            <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_tare_weight">
                        </label>
        
                        <!-- น้ำหนักสินค้าสูงสุด (ตัน) -->
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">น้ำหนักสินค้าสูงสุด (ตัน)</span>
                            <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_net_weight">
                        </label>
        
                        <!-- น้ำหนักสินค้าปัจจุบัน (ตัน)
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">น้ำหนักสินค้าปัจจุบัน (ตัน)</span>
                            <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01">
                        </label> -->
        
                        <!-- ปริมาตรสุทธิ (คิกบิกเมตร) -->
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">ปริมาตรสุทธิ (คิกบิกเมตร)</span>
                            <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_cube">
                        </label>
                    </div>
                    <!-- end container form left -->


                    <!-- container form right -->
                    <div class="col-12 col-md-6">
                        <!-- ขนาดตู้ -->
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">ขนาดตู้</span>
                            <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="con_size_id">
                                <option value="">20 ฟุต</option>
                                <option value="">40 ฟุต</option>
                            </select>
                        </label>
        
                        <!-- ความสูงด้านนอก (เมตร) -->
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">ความสูง (เมตร)</span>
                            <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01">
                        </label>
            
                        <!-- ความกว้างด้านนอก (เมตร) -->
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">ความกว้าง (เมตร)</span>
                            <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01">
                        </label>
        
                        <!-- ความยาวด้านนอก (เมตร) -->
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">ความยาว (เมตร)</span>
                            <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01">
                        </label>
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
                
                <div class="row">
                    <div class="col-12">
                        <!-- บริษัท -->
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">บริษัท</span>
                            <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_company_name">
                        </label>

                        <!-- ที่ตั้งบริษัท -->
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">ที่ตั้งบริษัท</span>
                            <textarea class="block w-full mt-1 text-sm focus:outline-none form-input"></textarea>
                        </label>

                        <!-- หมายเลขผู้เสียภาษี -->
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">หมายเลขผู้เสียภาษี</span>
                            <input class="block w-full mt-1 text-sm focus:outline-none form-input">
                        </label>

                        <h4>ผู้รับผิดชอบ (ตัวแทน)</h4>
                        <!-- ชื่อจริง -->
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">ชื่อจริง</span>
                            <input class="block w-full mt-1 text-sm focus:outline-none form-input">
                        </label>

                        <!-- นามสกุล -->
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">นามสกุล</span>
                            <input class="block w-full mt-1 text-sm focus:outline-none form-input">
                        </label>

                        <!-- เบอร์ติดต่อ -->
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">เบอร์ติดต่อ</span>
                            <input class="block w-full mt-1 text-sm focus:outline-none form-input">
                        </label>

                        <!-- อีเมล์ -->
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">อีเมล์</span>
                            <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="email">
                        </label>
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

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <!-- row -->
        <div class="row">
            <div class="col-3">
                <!-- ข้อความ -->
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                </label>
            </div>

            <div class="col-9">
                <!-- ช่องให้กรอก -->
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe">
            </div>
        </div>

        <!-- row -->
        <div class="row">
            <div class="col-1">
                <!-- ข้อความ -->
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                </label>
            </div>

            <div class="col-11">
                <!-- ช่องให้กรอก -->
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe">
            </div>
        </div>


    </div>

    <!-- col-3 -->
    <!-- col-9 -->
    <!-- row = 12 col -->







</div>




















<script>
    $(document).ready(function() {
        // jQuery Validation
        if ($('#add_container_form').length > 0) {
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
        }
    });
</script>
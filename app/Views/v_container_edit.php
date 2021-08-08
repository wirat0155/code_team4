<div class="container mx-auto grid mt-3">
    <form id="update_container_form" action="<?php echo base_url() . '/public/Container_edit/container_update'?>" method="POST">
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
                            <input type="hidden" name="con_id" value="<?php echo $obj_container->con_id?>">
                            <div class="col-12 col-sm-4">
                                <label class="block text-sm mt-3">
                                    <span class="text-gray-700 dark:text-gray-400">หมายเลขตู้</span>
                                </label>
                            </div>
    
                            <div class="col-12 col-sm-8 div_con_number_input">
                                <input type="hidden" name="con_old_number" value="<?php echo $obj_container->con_number?>">
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="con_number" pattern="[A-Za-z]{4} [0-9]{5} 0" placeholder="ABCD 12345 0" value="<?php echo $obj_container->con_number?>">
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
                                    <?php for($i = 0; $i < count($arr_container_type); $i++) { ?>
                                        <option value="<?php echo $arr_container_type[$i]->cont_id?>" <?php if ($obj_container->con_cont_id == $arr_container_type[$i]->cont_id) echo "selected" ?>><?php echo $arr_container_type[$i]->cont_name?></option>
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
                                        <option value="<?php echo $arr_status_container[$i]->stac_id?>" <?php if ($obj_container->con_stac_id == $arr_status_container[$i]->stac_id) echo "selected" ?>><?php echo $arr_status_container[$i]->stac_name?></option>
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_max_weight" value="<?php echo $obj_container->con_max_weight?>">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_tare_weight" value="<?php echo $obj_container->con_tare_weight?>">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_net_weight" value="<?php echo $obj_container->con_net_weight?>">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_cube" value="<?php echo $obj_container->con_cube?>">
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
                                        <option value="<?php echo $arr_size[$i]->size_id?>" <?php if ($obj_container->con_size_id == $arr_size[$i]->size_id) echo "selected"?>><?php echo $arr_size[$i]->size_name?></option>
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="size_height_out" value="<?php echo $arr_con_size[0]->size_height_out?>" readonly>
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="size_width_out" value="<?php echo $arr_con_size[0]->size_width_out?>" readonly>
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="size_length_out" value="<?php echo $arr_con_size[0]->size_length_out?>" readonly>
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
                    <input type="hidden" name="agn_id" value="<?php echo $arr_agent[0]->agn_id?>">
                    <div class="col-12">
                        <!-- บริษัท -->
                        <div class="row mt-3">
                            <div class="col-12 col-sm-4">
                                <label class="block text-sm mt-3">
                                    <span class="text-gray-700 dark:text-gray-400">บริษัท</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-8">
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_company_name" oninput="get_agent_information()" value="<?php echo $arr_agent[0]->agn_company_name?>">
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
                                <textarea class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_address"><?php echo $arr_agent[0]->agn_address?></textarea>
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_tax" value="<?php echo $arr_agent[0]->agn_tax?>">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_firstname" value="<?php echo $arr_agent[0]->agn_firstname?>">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_lastname" value="<?php echo $arr_agent[0]->agn_lastname?>">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" tyle="tel" name="agn_tel" value="<?php echo $arr_agent[0]->agn_tel?>">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_email" value="<?php echo $arr_agent[0]->agn_email?>">
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
        <input class="btn btn-success px-4 py-2 text-sm font-medium leading-5 text-white" type="submit" value="บันทึกการแก้ไข" />
    </div>
    </form>
    <br>
    <br>
</div>

<script>
    $(document).ready(function() {
        // jQuery Validation
        if ($('#update_container_form').length > 0) {
            $('#update_container_form').validate({
                rules: {
                    con_number:{
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
                        required: true,
                        maxlength: 255
                    },
                    agn_address: {
                        required: true,
                        maxlength: 255
                    },
                    agn_tax: {
                        required: true,
                        maxlength: 15
                    },
                    agn_firstname: {
                        required: true
                    },
                    agn_lastname: {
                        required: true
                    },
                    agn_tel: {
                        required: true,
                        maxlength: 10
                    },
                    agn_email: {
                        required: true,
                        maxlength: 40,
                        email: true
                    }
                },
                messages: {
                    con_number:{
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
                        required: 'กรุณากรอกชื่อบริษัท',
                        maxlength: 255
                    },
                    agn_address: {
                        required: 'กรุณากรอกที่ตั้งบริษัท',
                        maxlength: 255
                    },
                    agn_tax: {
                        required: 'กรุณากรอกหมายเลขผู้เสียภาษี',
                        maxlength: 15
                    },
                    agn_firstname: {
                        required: 'กรุณากรอกชื่อจริงผู้รับผิดชอบ'
                    },
                    agn_lastname: {
                        required: 'กรุณากรอกนามสกุลผู้รับผิดชอบ'
                    },
                    agn_tel: {
                        required: 'กรุณากรอกเบอร์ติดต่อ',
                        maxlength: 'กรุณากรอกไม่เกิน 10 อักษร',
                    },
                    agn_email: {
                        required: 'กรุณากรอกอีเมล',
                        maxlength: 'กรุณากรอกไม่เกิน 40 ตัวอักษร',
                        email: 'กรุณากรอกอีเมล'
                    }
                }
            })
        }
    });
    
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
    function show_size_information(size_height_out, size_width_out, size_length_out) {
        console.log(size_height_out);
        $('input[name="size_height_out"]').val(size_height_out);
        $('input[name="size_width_out"]').val(size_width_out);
        $('input[name="size_length_out"]').val(size_length_out);
    }
    function get_agent_information() {
        let agn_company_name = $('input[name="agn_company_name"]').val();

        if (agn_company_name == '') {
            $('input[name="agn_id"]').val('');
        }
        $.ajax({
            url: '<?php echo base_url() . '/public/Agent_show/get_agent_ajax' ?>',
            method: 'POST',
            dataType: 'JSON',
            data: {
                agn_company_name: agn_company_name
            },
            success: function(data) {
                console.log(data);
                show_agent_information(data);
            }
        });
    }
    function show_agent_information(agent) {
        $('input[name="agn_id"]').val(agent[0]['agn_id']);
        $('textarea[name="agn_address"]').val(agent[0]['agn_address']);
        $('input[name="agn_tax"]').val(agent[0]['agn_tax']);
        $('input[name="agn_firstname"]').val(agent[0]['agn_firstname']);
        $('input[name="agn_lastname"]').val(agent[0]['agn_lastname']);
        $('input[name="agn_tel"]').val(agent[0]['agn_tel']);
        $('input[name="agn_email"]').val(agent[0]['agn_email']);
    }
</script>
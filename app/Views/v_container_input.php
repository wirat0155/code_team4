<div class="container mx-auto grid mt-3">
    <!-- หัวข้อ -->
    <div class="flex items-center justify-between p-3 pl-4 my-8 text-sm font-semibold bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <h2 class=" text-2xl font-semibold">
                เพิ่มตู้คอนเทนเนอร์
            </h2>
        </div>
    </div>
    <form id="add_container_form" action="<?php echo base_url() . '/public/Container_input/container_insert' ?>" method="POST">
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

                                <div class="col-12 col-sm-8 div_con_number_input">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="con_number" pattern="[A-Za-z]{4} [0-9]{5} 0" placeholder="ABCD 12345 0">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_max_weight" placeholder="น้ำหนักตู้สูงสุดที่รับได้">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_tare_weight" placeholder="น้ำหนักตู้เปล่า">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_net_weight" placeholder="น้ำหนักสินค้าสูงสุด">
                                </div>
                            </div>

                            <!-- น้ำหนักสินค้าปัจจุบัน (ตัน)
                        <label class="block text-sm mt-3">
                            <span class="text-gray-700 dark:text-gray-400">น้ำหนักสินค้าปัจจุบัน (ตัน)</span>
                            <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01">
                        </label> -->

                            <!-- ปริมาตรสุทธิ (คิวบิกเมตร) -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-6">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ปริมาตรสุทธิ (คิวบิกเมตร)</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="con_cube" placeholder="ปริมาตรสุทธิ">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="size_height_out" value="<?php echo $first_size[0]->size_height_out ?>" readonly>
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="size_width_out" value="<?php echo $first_size[0]->size_width_out ?>" readonly>
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="size_length_out" value="<?php echo $first_size[0]->size_length_out ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <!-- end container form right -->
                    </div>
                    <!-- end container form row -->
                </div>
            </div>

            <!-- end container form -->
            <div class="col-12 col-xl-5 agent_form">
                <!-- agent form -->
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md p-3">
                    <h2 class="my-6 text-2xl font-semibold dark:text-gray-200">เอเย่นต์</h2>
                    <hr class="mb-5">

                    <div class="row mt-3">
                        <input type="hidden" name="agn_id">
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
                                        <option value="<?php echo $arr_agn[$i]->agn_id ?>"><?php echo $arr_agn[$i]->agn_company_name ?></option>
                                        <?php } ?>
                                        <option value="new">เอเย่นต์ใหม่</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_company_name" placeholder="ชื่อบริษัท" hidden>
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

                            <h4 class="mt-3">ผู้รับผิดชอบ (ตัวแทน)</h4>
                            <!-- ชื่อจริง -->
                            <div class="row mt-3">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" tyle="tel" name="agn_tel" placeholder="0812345678">
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_email" placeholder="อีเมล">
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
    if ($('#add_container_form').length > 0) {
        $('#add_container_form').validate({
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
                    required: true,
                    maxlength: 255
                },
                agn_address: {
                    required: true,
                    maxlength: 255
                },
                agn_tax: {
                    required: true,
                    maxlength: 13
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

// get agent information when input agn_company_name
function get_agent_information() {
    let agn_id = $('select[name="agn_id"]').val();

    if (agn_id != 'new') {
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
    } else {
        $('input[name="agn_company_name"]').prop('hidden', false);
        clear_agent_information();
    }

}

// show agent information when input agn_company_name
function show_agent_information(agent) {
    $('input[name="agn_id"]').val(agent[0]['agn_id']);
    $('textarea[name="agn_address"]').val(agent[0]['agn_address']);
    $('input[name="agn_tax"]').val(agent[0]['agn_tax']);
    $('input[name="agn_firstname"]').val(agent[0]['agn_firstname']);
    $('input[name="agn_lastname"]').val(agent[0]['agn_lastname']);
    $('input[name="agn_tel"]').val(agent[0]['agn_tel']);
    $('input[name="agn_email"]').val(agent[0]['agn_email']);
}

// clear agent information when delete input agn_company_name
function clear_agent_information() {
    $('input[name="agn_id"]').val('');
    $('textarea[name="agn_address"]').val('');
    $('input[name="agn_tax"]').val('');
    $('input[name="agn_firstname"]').val('');
    $('input[name="agn_lastname"]').val('');
    $('input[name="agn_tel"]').val('');
    $('input[name="agn_email"]').val('');
}
</script>
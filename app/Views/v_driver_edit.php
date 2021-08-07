<div class="container mx-auto grid mt-3">
    <form id="add_driver_form" action="<?php echo base_url(). '/public/Driver_input/driver_insert' ?>" method="post">
    <input type='hidden' name='dri_id' value="<?php echo $arr_driver[0]->dri_id ?>">    
    <div class="row">
            <div class="col-12 col-xl-7">
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md p-3">
                    <h2 class="my-6 text-2xl font-semibold dark:text-gray-200">พนักงานขับรถ</h2>
                    <hr class="mb-5">

                    <div class="row mt-3">

                        <div class="col-12">
                            <div class="row mt-3">
                                <div class="col-12 col-sm-3">
                                    <label for="dri_name" class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ชื่อ-นามสกุล</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" id="dri_name" name="dri_name" value="<?php echo $arr_driver[0]->dri_name ?>">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-3">
                                    <label for="dri_card_number" class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">หมายเลขบัตรประชาชน</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" id="dri_card_number" name="dri_card_number" value="<?php echo $arr_driver[0]->dri_card_number ?>">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-3">
                                    <label for="dri_license" class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">หมายเลขใบขับขี่</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" id="dri_license" name="dri_license" value="<?php echo $arr_driver[0]->dri_license ?>">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-3">
                                    <label for="dri_license_type" class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ประเภทใบขับขี่</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" id="dri_license_type" name="dri_license_type">
                                        <option selected disabled>เลือกประเภท</option>
                                        <option value="">ท.1</option>
                                        <option value="">ท.2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-3">
                                    <label for="dri_tel" class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">เบอร์โทร</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" id="dri_tel" name="dri_tel" value="<?php echo $arr_driver[0]->dri_tel ?>">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-3">
                                    <label for="dri_status" class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">สถานะของคนขับรถ</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" id="dri_status" name="dri_status">
                                        <option selected disabled>เลือกสถานะ</option>
                                        <option value="">พร้อมทำงาน</option>
                                        <option value="">กำลังปฏิบัติงาน</option>
                                        <option value="">สำรอง</option>
                                        <option value="">ลาออก</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-3">
                                    <label for="dri_date_start" class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">วันที่เข้าทำงาน</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input type="date" class="block w-full mt-1 text-sm focus:outline-none form-input" id="dri_date_start" name="dri_date_start" value="<?php echo $arr_driver[0]->dri_date_start ?>">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-3">
                                    <label for="dri_date_end" class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">วันที่ลาออก</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input type="date" class="block w-full mt-1 text-sm focus:outline-none form-input" id="dri_date_end" name="dri_date_end" value="<?php echo $arr_driver[0]->dri_date_end ?>">
                                </div>
                            </div>
                            <!-- 
                            <div class="row mt-3">
                                <div class="col-12 col-sm-3">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ภาพ</span>
                                    </label>
                                </div>
                                <div class="picture">
                                    <img src="#" class="picture-src fa fa-user-circle" id="dri_profile_image" title="" alt="" style="padding-bottom: 10px;">

                                    <input type="file" id="dri_profile_image" class="" accept="image/*">
                                </div>
                            </div> -->

                        </div>

                    </div>
                </div>
            </div>


            <div class="col-12 col-xl-5">
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md p-3">
                    <h2 class="my-6 text-2xl font-semibold dark:text-gray-200">รถ</h2>
                    <hr class="mb-5">


                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="row mt-3">
                                <div class="col-12 col-sm-3">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">หมายเลขรถ</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="" >
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-3">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ทะเบียน</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-3">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">จังหวัด</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="">
                                        <option selected disabled>เลือกจังหวัด</option>
                                        <option>ชลบุรี</option>
                                        <option>มีจังหวัดเดียวไปก่อนนะคับอิอิ</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3" style="padding-bottom: 303px;">
                                <div class="col-12 col-sm-3">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ประเภทรถ</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="dri_license_type">
                                        <option selected disabled>เลือกประเภทรถ</option>
                                        <option value="">บรรทุก 4 ล้อ</option>
                                        <option value="">บรรทุก 6 ล้อ</option>
                                        <option value="">บรรทุก 10 ล้อ</option>
                                        <option value="">เทรลเลอร์ 6 ล้อ</option>
                                        <option value="">เทรลเลอร์ 10 ล้อ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="float-right">
            <input type="reset" onclick="window.history.back();" class="button shadow-sm px-4 py-2 text-sm font-medium leading-5 text-white bg-secondary rounded-lg shadow-md right mr-2" value="ยกเลิก">
            <input type="submit" class="button shadow-sm px-4 py-2 text-sm font-medium leading-5 text-white bg-success rounded-lg shadow-md right" value="บันทึก">
        </div>
    </form>
</div>















<script>
    $(document).ready(function() {
        // jQuery Validation
        if ($('#add_driver_form').length > 0) {
            $('#add_driver_form').validate({
                rules: {
                    dri_name:{
                        required: true
                    },
                    dri_card_number: {
                        required: true,
                        maxlength: 13
                    },
                    dri_license: {
                        required: true,
                        maxlength: 8
                    },
                    dri_tel: {
                        required: true,
                        maxlength: 10
                    },
                    dri_date_start: {
                        required: true
                    },
                    dri_date_end: {
                        required: true
                    }
                },
                messages: {
                    dri_name:{
                        required: 'กรุณากรอกชื่อ'
                    },
                    dri_card_number: {
                        required: 'กรุณากรอกหมายเลขบัตรประชาชน',
                        maxlength: 'กรุณากรอกไม่เกิน 13'
                    },
                    dri_license: {
                        required: 'กรุณากรอกหมายเลขใบขับขี่',
                        maxlength: 'กรุณากรอกไม่เกิน 8'
                    },
                    dri_tel: {
                        required: 'กรุณากรอกหมายเลขโทรศัพท์',
                        maxlength: 'กรุณากรอกไม่เกิน 10'
                    },
                    dri_date_start: {
                        required: 'กรุณาเลือกวันที่เข้าทำงาน'
                    },
                    dri_date_end: {
                        required: 'กรุณาเลือกวันที่ลาออก'
                    }
                }
            })
        }
    });
</script>
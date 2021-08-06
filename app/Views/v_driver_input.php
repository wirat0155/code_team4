<div class="container mx-auto grid mt-3">
    <form action="<?php echo base_url(). '/public/Driver_input/driver_insert' ?>" method="post">
        <div class="row">
            <div class="col-12 col-xl-7">
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md p-3">
                    <h2 class="my-6 text-2xl font-semibold dark:text-gray-200">พนักงานขับรถ</h2>
                    <hr class="mb-5">

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="row mt-3">
                                <div class="col-12 col-sm-3">
                                    <label for="input_name" class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ชื่อ-นามสกุล</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" id="input_name" name="input_name">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-3">
                                    <label for="input_card_number" class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">หมายเลขบัตรประชาชน</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" id="input_card_number" name="input_card_number">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-3">
                                    <label for="input_license" class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">หมายเลขใบขับขี่</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" id="input_license" name="input_license">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-3">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ประเภทใบขับขี่</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="dri_license_type">
                                        <option selected disabled>เลือกประเภท</option>
                                        <option value="">ท.1</option>
                                        <option value="">ท.2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-3">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">เบอร์โทร</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="dri_name">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-3">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">สถานะของคนขับรถ</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="dri_license_type">
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
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">วันที่เข้าทำงาน</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input type="date" class="block w-full mt-1 text-sm focus:outline-none form-input">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-3">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">วันที่ลาออก</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input type="date" class="block w-full mt-1 text-sm focus:outline-none form-input">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-3">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ภาพ</span>
                                    </label>
                                </div>
                                <div class="picture">
                                    <img src="#" class="picture-src fa fa-user-circle" id="picture_preview" title="" alt="" style="padding-bottom: 10px;">

                                    <input type="file" id="file-profile" class="" accept="image/*">
                                </div>
                            </div>
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
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="dri_name">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-3">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">ทะเบียน</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="dri_name">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-3">
                                    <label class="block text-sm mt-3">
                                        <span class="text-gray-700 dark:text-gray-400">จังหวัด</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="prov_name">
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
<style>
    @media (min-width: 1200px) {
        .container-sm {
            max-width: 900px;
        }
    }
</style>

<div class="container px-6 mx-auto grid">

    <!-- หัวข้อ -->
    <div class="flex items-center justify-between p-3 pl-4 my-8 text-sm font-semibold bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <h2 class=" text-2xl font-semibold">
                ข้อมูลพนักงานขับรถ
            </h2>
        </div>
    </div>


    <div class="container-sm mb-8">

        <form id="add_driver_form" action="<?php echo base_url() . '/public/Driver_input/driver_insert' ?>" method="post">

            <!-- เพิ่มลูกค้า -->
            <div class="container-sm px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                <h4 class="px-3 my-4 text-xl font-semibold">
                    พนักงานขับรถ
                </h4>

                <div class="mb-4 container border-bottom"></div>

                <div class="container">
                    <!-- บริษัท -->
                    <div class="px-3 form-group row">
                        <label for="dri_name" class="col-sm-3 col-form-label">ชื่อ-นามสกุล</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="dri_name" name="dri_name">
                        </div>
                    </div>

                    <!-- สาขา -->
                    <div class="px-3 form-group row">
                        <label for="dri_card_number" class="col-sm-3 col-form-label">หมายเลขบัตรประชาชน</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="dri_card_number" name="dri_card_number">
                        </div>
                    </div>

                    <!-- หมายเลขใบขับขี่ -->
                    <div class="px-3 form-group row">
                        <label for="dri_license" class="col-sm-3 col-form-label">หมายเลขใบขับขี่</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="dri_license" name="dri_license">
                        </div>
                    </div>

                    <!-- เบอร์โทร -->
                    <div class="px-3 form-group row">
                        <label for="dri_tel" class="col-sm-3 col-form-label">เบอร์โทร</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="dri_tel" name="dri_tel">
                        </div>
                    </div>

                    <div class="px-3 form-group row">
                        <label for="dri_car_id" class="col-sm-3 col-form-label">หมายเลขรถ</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="dri_car_id" name="dri_car_id">
                        </div>
                    </div>

                    <!-- ประเภทใบขับขี่ -->
                    <div class="px-3 form-group row">
                        <label for="dri_license_type" class="col-sm-3 col-form-label">ประเภทใบขับขี่</label>
                        <div class="col-sm-9">
                            <select class="block w-full mt-1 text-sm focus:outline-none form-input" id="dri_license_type" name="dri_license_type">
                                <option selected disabled >เลือกประเภทใบขับขี่</option>
                                <option value="1">ท.1</option>
                                <option value="2">ท.2</option>
                                <option value="3">ท.3</option>
                                <option value="4">ท.4</option>
                            </select>
                        </div> <br><br>
                    </div>

                    <div class="px-3 form-group row">
                        <label for="dri_status" class="col-sm-3 col-form-label">สถานะของขับรถ</label>
                        <div class="col-sm-9">
                            <select class="block w-full mt-1 text-sm focus:outline-none form-input" id="dri_status" name="dri_status">
                                <option selected disabled>เลือกสถานะ</option>
                                <option value="1">พร้อมทำงาน</option>
                                <option value="2">กำลังปฏิบัติงาน</option>
                                <option value="3">สำรอง</option>
                                <option value="4">ลาออก</option>
                            </select>
                        </div><br><br>
                    </div>

                    <div class="px-3 form-group row">
                        <label for="dri_date_start" class="col-sm-3 col-form-label">วันที่เข้าทำงาน</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control form-input" id="dri_date_start" name="dri_date_start">
                        </div>
                    </div>

                    <div class="px-3 form-group row">
                        <label for="dri_date_end" class="col-sm-3 col-form-label">วันที่ลาออก</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control form-input" id="dri_date_end" name="dri_date_end">
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

</div>

<script>
    $(document).ready(function() {
        // jQuery Validation
        if ($('#add_driver_form').length > 0) {
            $('#add_driver_form').validate({
                rules: {
                    dri_name: {
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
                },
                messages: {
                    dri_name: {
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
                }
            })
        }
    });
</script>
<style>
    @media (min-width: 1200px) {
        .container-sm {
            max-width: 900px;
        }
    }

    .upload-file {
        background-color: #eeeee4;
        border: none;
        color: black;
        border-radius: 8px;
        font-size: 14px;
        padding: 8px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    .input-image {
        height: 0;
        width: 0;
        left: 0;
        top: 0;
        opacity: 0;
        cursor: pointer;
    }

    #file_name {
        display: block;
        /* or inline-block */
        text-overflow: ellipsis;
        word-wrap: break-word;
        overflow: hidden;
        max-height: 100%;
        line-height: 1.5em;
        margin-top: 10;
    }
</style>

<div class="container px-6 mx-auto grid">

    <!-- หัวข้อ -->
    <div class="flex items-center justify-between p-3 pl-4 my-8 text-sm font-semibold bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <h2 class=" text-2xl font-semibold">
                เพิ่มพนักงานขับรถ
            </h2>
        </div>
    </div>


    <div class="container-sm mb-8">

        <form id="add_driver_form" action="<?php echo base_url() . '/public/Driver_input/driver_insert' ?>" enctype="multipart/form-data" method="POST">

            <!-- เพิ่มพนักงาน -->
            <div class="container-sm px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                <h4 class="px-3 my-4 text-xl font-semibold">
                    พนักงานขับรถ
                </h4>

                <div class="mb-4 container border-bottom"></div>

                <div class="container">
                    <!-- ชื่แ นามสกุล -->
                    <div class="px-3 form-group row">
                        <label for="dri_name" class="col-sm-3 col-form-label">ชื่อ-นามสกุล</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="dri_name" name="dri_name" placeholder="ชื่อจริง นามสกุล">
                        </div>
                    </div>

                    <!-- เลขบัตรประชาชน -->
                    <div class="px-3 form-group row">
                        <label for="dri_card_number" class="col-sm-3 col-form-label">หมายเลขบัตรประชาชน</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="dri_card_number" name="dri_card_number" placeholder="หมายเลขบัตรประชาชน">
                        </div>
                    </div>

                    <!-- หมายเลขใบขับขี่ -->
                    <div class="px-3 form-group row">
                        <label for="dri_license" class="col-sm-3 col-form-label">หมายเลขใบขับขี่</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="dri_license" name="dri_license" placeholder="หมายเลขใบขับขี่">
                        </div>
                    </div>

                    <!-- เบอร์โทร -->
                    <div class="px-3 form-group row">
                        <label for="dri_tel" class="col-sm-3 col-form-label">เบอร์โทร</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="dri_tel" name="dri_tel" placeholder="0812345678">
                        </div>
                    </div>

                    <!-- หมายเลขรถ -->
                    <div class="px-3 form-group row">
                        <label for="dri_car_id" class="col-sm-3 col-form-label">หมายเลขรถ</label>
                        <div class="col-sm-9">
                            <select class="block w-full mt-1 text-sm focus:outline-none form-input" id="dri_car_id" name="dri_car_id">
                                <option selected disabled>เลือกหมายเลขรถ</option>
                                <?php for($i = 0; $i < count($arr_car); $i++) { ?>
                                    <option value="<?php echo $arr_car[$i]->car_id?>"><?php echo 'คันที่ ' . $arr_car[$i]->car_number . ' ทะเบียน ' . $arr_car[$i]->car_code?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <!-- ประเภทใบขับขี่ -->
                    <div class="px-3 form-group row">
                        <label for="dri_license_type" class="col-sm-3 col-form-label">ประเภทใบขับขี่</label>
                        <div class="col-sm-9">
                            <select class="block w-full mt-1 text-sm focus:outline-none form-input" id="dri_license_type" name="dri_license_type">
                                <option selected disabled>เลือกประเภทใบขับขี่</option>
                                <option value="1">ท.1</option>
                                <option value="2">ท.2</option>
                                <option value="3">ท.3</option>
                                <option value="4">ท.4</option>
                            </select>
                        </div> <br><br>
                    </div>

                    <!-- สถานะพนักงานขับรถ -->
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

                    <!-- วันเข้าทำงาน -->
                    <div class="px-3 form-group row">
                        <label for="dri_date_start" class="col-sm-3 col-form-label">วันที่เข้าทำงาน</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control form-input" id="dri_date_start" name="dri_date_start">
                        </div>
                    </div>

                    <!-- วันที่ลาออก -->
                    <div class="px-3 form-group row">
                        <label for="dri_date_end" class="col-sm-3 col-form-label">วันที่ลาออก</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control form-input" id="dri_date_end" name="dri_date_end">
                        </div>
                    </div>

                    <!-- ภาพ -->
                    <div class="px-3 form-group row">
                        <label for="dri_profile_image" class="col-sm-3 col-form-label">ภาพ</label>
                        <div class="col-sm-9">
                            <!-- <div class="upload-btn-wrapper"> -->
                            <div class="upload-file btn" onclick="$('#dri_profile_image').click();">เลือกไฟล์</div><br>
                            <input class="input-image" type="file" id="dri_profile_image" name="dri_profile_image" onchange="get_image()" accept="image/jpg,image/jpeg,image/png">
                            <div id='file_name'></div>
                            <!-- </div> -->
                        </div>
                    </div>


                    <!-- end car form left -->


                </div>
            </div>
            <div class="float-right">
                <input class="btn btn-secondary px-4 py-2 text-sm font-medium leading-5 text-white" type="button" value="ยกเลิก" onclick="window.history.back();">
                <input class="btn btn-success px-4 py-2 text-sm font-medium leading-5 text-white" type="submit" value="บันทึก">
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
                    dri_car_id: {
                        required: true,
                    },
                    dri_license_type: {
                        required: true,
                    },
                    dri_status: {
                        required: true,
                    },
                    dri_date_start: {
                        required: true
                    },
                    dri_profile_image: {
                        required: true
                    }
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
                    dri_car_id: {
                        required: 'กรุณากรอกหมายเลขรถ'
                    },
                    dri_license_type: {
                        required: 'กรุณากรอกประเภทใบขับขี่'
                    },
                    dri_status: {
                        required: 'กรุณากรอกสถานะพนักงานขับรถ'
                    },
                    dri_date_start: {
                        required: 'กรุณาเลือกวันที่เข้าทำงาน'
                    },
                    dri_profile_image: {
                        required: 'กรุณาเลือกไฟล์รูป'
                    }

                }
            })
        }
    });

    function get_image() {
        var dri_profile_image = $('#dri_profile_image').val();
        $('#file_name').html(dri_profile_image.substr(12));
        $('#dri_profile_image-error').remove();
    }
</script>
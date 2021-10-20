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

    .picture-container {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }

    .picture {
        width: 200px;
        height: 200px;
        background-color: #999999;
        border: 4px solid #CCCCCC;
        color: #FFFFFF;
        border-radius: 50%;
        margin: auto;
        overflow: hidden;
        transition: all 0.2s;
        -webkit-transition: all 0.2s;
        text-align: center;
    }

    .cl-blue {
        color: #1244B9 !important;
    }
</style>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="container px-6 mx-auto grid">
                <div class="page-inner">

                    <!-- หัวข้อ -->
                    <div class="pl-4 mt-4 page-header mb-0">
                        <h4 class="pl-3 page-title">EDIT DRIVER</h4>
                    </div>
                    <hr width="95%" color="696969">
                    <ul class="pl-2 mr-5 breadcrumbs d-flex align-items-left align-items-md-center" style="height: 30px;">
                        <li class="nav-home">
                            <a href="<?php echo base_url() . '/Dashboard/dashboard_show' ?>">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a class="cl-blue" href="<?php echo base_url() . '/Driver_show/driver_show_ajax' ?>">Driver information</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a class="cl-blue" href="<?php echo base_url() . '/Driver_show/driver_detail/' . $arr_driver[0]->dri_id ?>">Driver details</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Edit driiver</a>
                        </li>
                    </ul>
                </div>

                <!-- <div class="container-sm mb-8"> -->

                <form id="add_driver_form" action="<?php echo base_url() . '/Driver_edit/driver_update' ?>" enctype="multipart/form-data" method="POST">
                    <div class="row mx-4">
                        <div class="col-md-12">
                            <input type='hidden' name='dri_id' value="<?php echo $arr_driver[0]->dri_id ?>">

                            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <!-- <div class="picture-container">
                                    <div class="picture">
                                        <img class="avatar-img rounded-circle" src="<?php echo base_url() . '/dri_profile_image/' . $arr_driver[0]->dri_profile_image ?>">
                                    </div>
                                </div> -->

                                <!-- แก้ไขพนักงาน -->
                                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Driver Information</div>
                                        </div>

                                        <div class="card-body">
                                            <div class=" row px-5">
                                                <!-- <div class="container"> -->
                                                <!-- ชื่อ นามสกุล -->
                                                <div class="col-md-6">
                                                    <div class="form-group form-inline">
                                                        <label for="dri_name" class="col-form-label mr-auto" style="text-align:center;">Name - Surname</label>
                                                        <div class="col-md-8 p-0">
                                                            <input type="text" class="form-control form-input" id="dri_name" name="dri_name" placeholder="Name  Surname" value="<?php echo $arr_driver[0]->dri_name ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- หมายเลขรถ -->
                                                <div class="col-md-6">
                                                    <div class="form-group form-inline">
                                                        <label for="dri_car_id" class="col-form-label mr-auto">Car ID</label>
                                                        <div class="col-md-9 p-0">
                                                            <select class="block w-full mt-1 text-sm focus:outline-none form-input" id="dri_car_id" name="dri_car_id" value="<?php echo $arr_driver[0]->dri_license_type ?>">
                                                                <option selected disabled>Choose car ID</option>
                                                                <?php for ($i = 0; $i < count($arr_car); $i++) { ?>
                                                                    <option value="<?php echo $arr_car[$i]->car_id ?>" <?php if ($arr_car[$i]->car_id == $arr_driver[0]->dri_car_id) echo " selected" ?>><?php echo 'คันที่ ' . $arr_car[$i]->car_number . ' ทะเบียน ' . $arr_car[$i]->car_code ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- เลขบัตรประชาชน -->
                                                <div class="col-md-6">
                                                    <div class="form-group form-inline">
                                                        <label for="dri_card_number" class="col-form-label mr-auto">Card number</label>
                                                        <div class="col-md-8 p-0">
                                                            <input type="text" class="form-control form-input" id="dri_card_number" name="dri_card_number" placeholder="Card number" value="<?php echo $arr_driver[0]->dri_card_number ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- ประเภทใบขับขี่ -->
                                                <div class="col-md-6">
                                                    <div class="form-group form-inline">
                                                        <label for="dri_license_type" class="col-form-label mr-auto">License type</label>
                                                        <div class="col-md-9 p-0">
                                                            <?php
                                                            $license1 = ' ';
                                                            $license2 = ' ';
                                                            $license3 = ' ';
                                                            $license4 = ' ';
                                                            if ($arr_driver[0]->dri_license_type == 1) {
                                                                $license1 = 'selected';
                                                            } else if ($arr_driver[0]->dri_license_type == 2) {
                                                                $license2 = 'selected';
                                                            } else if ($arr_driver[0]->dri_license_type == 3) {
                                                                $license3 = 'selected';
                                                            } else if ($arr_driver[0]->dri_license_type == 4) {
                                                                $license4 = 'selected';
                                                            }
                                                            ?>

                                                            <select class="block w-full mt-1 text-sm focus:outline-none form-input" id="dri_license_type" name="dri_license_type" value="<?php echo $arr_driver[0]->dri_license_type ?>">
                                                                <option selected disabled>Choose license type</option>
                                                                <option value="1" <?php echo $license1 ?>>ท.1</option>
                                                                <option value="2" <?php echo $license2 ?>>ท.2</option>
                                                                <option value="3" <?php echo $license3 ?>>ท.3</option>
                                                                <option value="4" <?php echo $license4 ?>>ท.4</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- หมายเลขใบขับขี่ -->
                                                <div class="col-md-6">
                                                    <div class="form-group form-inline">
                                                        <label for="dri_license" class="col-form-label mr-auto">License number</label>
                                                        <div class="col-md-8 p-0">
                                                            <input type="text" class="form-control form-input" id="dri_license" name="dri_license" placeholder="License number" value="<?php echo $arr_driver[0]->dri_license ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- สถานะพนักงานขับรถ -->
                                                <div class="col-md-6">
                                                    <div class="form-group form-inline">
                                                        <label for="dri_status" class="col-form-label mr-auto">Driver status</label>
                                                        <div class="col-md-9 p-0">
                                                            <?php
                                                            $status1 = ' ';
                                                            $status2 = ' ';
                                                            $status3 = ' ';
                                                            $status4 = ' ';
                                                            if ($arr_driver[0]->dri_status == 1) {
                                                                $status1 = 'selected';
                                                            } else if ($arr_driver[0]->dri_status == 2) {
                                                                $status2 = 'selected';
                                                            } else if ($arr_driver[0]->dri_status == 3) {
                                                                $status3 = 'selected';
                                                            } else if ($arr_driver[0]->dri_status == 4) {
                                                                $status4 = 'selected';
                                                            }
                                                            ?>
                                                            <select class="block w-full mt-1 text-sm focus:outline-none form-input" id="dri_status" name="dri_status" value="<?php echo $arr_driver[0]->dri_status ?>">
                                                                <option selected disabled>เลือกสถานะ</option>
                                                                <option value="1" <?php echo  $status1 ?>>พร้อมทำงาน</option>
                                                                <option value="2" <?php echo  $status2 ?>>กำลังปฏิบัติงาน</option>
                                                                <option value="3" <?php echo  $status3 ?>>สำรอง</option>
                                                                <option value="4" <?php echo  $status4 ?>>ลาออก</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- เบอร์โทร -->
                                                <div class="col-md-6">
                                                    <div class="form-group form-inline">
                                                        <label for="dri_tel" class="col-form-label mr-auto">Phone number</label>
                                                        <div class="col-md-8 p-0">
                                                            <input type="text" class="form-control form-input" id="dri_tel" name="dri_tel" placeholder="0812345678" value="<?php echo $arr_driver[0]->dri_tel ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- วันเข้าทำงาน -->
                                                <div class="col-md-6">
                                                    <div class="form-group form-inline">
                                                        <label for="dri_date_start" class="col-form-label mr-auto">Start date</label>
                                                        <div class="col-md-9 p-0">
                                                            <input type="date" class="form-control form-input" id="dri_date_start" name="dri_date_start" value="<?php echo $arr_driver[0]->dri_date_start ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- วันที่ลาออก -->
                                                <div class="col-md-6">
                                                    <div class="form-group form-inline">
                                                        <label for="dri_date_end" class="col-form-label mr-auto">Resign date</label>
                                                        <div class="col-md-9 p-0">
                                                            <input type="date" class="form-control form-input" id="dri_date_end" name="dri_date_end" value="<?php echo $arr_driver[0]->dri_date_end ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- ภาพ -->
                                                <div class="col-md-6">
                                                    <div class="form-group form-inline">
                                                        <label for="dri_profile_image" class="col-form-label mr-auto">Image</label>
                                                        <div class="col-md-9 p-0">
                                                            <div class="input-group mb-3">
                                                                <input type="text" id="input_show_browse" class="form-control" placeholder="...." value="<?php echo $arr_driver[0]->dri_profile_image ?>" aria-label="Recipient's username" aria-describedby="basic-addon2" disabled style="background: white !important;">
                                                                <div class="input-group-append" style="cursor: pointer;" onclick="$('#dri_profile_image').click();">
                                                                    <span class="input-group-text" id="show_browse">Browse</span>
                                                                </div>
                                                                <input type="text" id='old_dri_profile_image' name='old_dri_profile_image' value='<?php echo $arr_driver[0]->dri_profile_image ?>' hidden>
                                                            </div>
                                                            <input type="file" class="form-control-file input-full" id="dri_profile_image" name="dri_profile_image" onchange="get_image();" accept="image/jpg,image/jpeg,image/png" hidden>
                                                            <small class="form-text text-muted"> </small>
                                                        </div>
                                                    </div>
                                                </div>




                                                <!-- end car form left -->


                                                <!-- </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ปุ่มยีนยัน2ปุ่มล่าง -->
                                    <div class="card-action" id="car_action">
                                        <input type="button" class="ui button" value="Cancle" onclick="window.history.back();">
                                        <button type="submit" class="ui orange button pull-right">
                                            Confirm
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>

                <!-- </div> -->
            </div>
        </div>
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
                    }
                }
            })
        }
    });

    // function get_image() {
    //     var dri_profile_image = $('#dri_profile_image').val();
    //     $('#file_name').html(dri_profile_image.substr(12));
    //     $('#dri_profile_image-error').remove();
    //     $('#old_dri_profile_image').remove();
    // }

    function get_image() {
        var dri_profile_image = $('#dri_profile_image').val();
        $('#input_show_browse').val(dri_profile_image.substr(12));
        $('#dri_profile_image-error').remove();
    }
</script>
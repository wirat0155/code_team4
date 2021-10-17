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
            <div class="page-inner">
                <div class="float-right" style='margin-top: 10px'>
                    <a href="<?php echo base_url() . '/Driver_edit/driver_edit/' . $arr_driver[0]->dri_id ?>" class="btn btn-warning px-2 mr-1 text-sm ">Edit Info</a>
                    <button type="button" class="btn btn-danger px-2 text-sm " data-toggle="modal" data-target="#exampleModalCenter" onclick="get_id(<?php echo $arr_driver[0]->dri_id ?>)">Delete
                    </button>
                </div>

                <div class="pl-4 mt-4 page-header mb-0">
                    <h4 class="pl-3 page-title">DRIVER DETAIL</h4>

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
                        <a href="#">Driver detail</a>
                    </li>
                </ul>
            </div>
            <!-- <div class="card-body px-6 mx-auto grid"> -->

            <!-- <div class="row mb-8"> -->

            <form id="add_driver_form" action="<?php echo base_url() . '/Driver_info/driver_show_info' ?>" enctype="multipart/form-data" method="POST">
                <div class="row mx-4">
                    <div class="col-md-12">
                        <input type='hidden' name='dri_id' value="<?php echo $arr_driver[0]->dri_id ?>">

                        <!-- Driver detail -->
                        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <div class="">
                                <div class="picture-container">
                                    <div class="picture">
                                        <img class="avatar-img rounded-circle" src="<?php echo base_url() . '/dri_profile_image/' . $arr_driver[0]->dri_profile_image ?>">
                                    </div>
                                </div><br>

                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Driver Information</div>
                                    </div>

                                    <div class="card-body">
                                        <div class=" row px-5">
                                            <!-- Name-Surmame -->
                                            <div class="col-md-6">
                                                <div class="form-group form-inline">
                                                    <label for="dri_name" class="col-form-label mr-auto" style="text-align:center;">Name - Surname</label>
                                                    <div class="col-md-8 p-0">
                                                        <p><?php echo $arr_driver[0]->dri_name ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Car ID -->
                                            <div class="col-md-6">
                                                <div class="form-group form-inline">
                                                    <label for="dri_car_id" class="col-form-label mr-auto">Car ID</label>
                                                    <div class="col-md-9 p-0">
                                                        <p class="col-form-label"><?php echo $arr_driver[0]->dri_car_id ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Card Number -->
                                            <div class="col-md-6">
                                                <div class="form-group form-inline">
                                                    <label for="dri_card_number" class="col-form-label mr-auto">Card number</label>
                                                    <div class="col-md-8 p-0">
                                                        <p class="col-form-label"><?php echo $arr_driver[0]->dri_card_number ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- License Type -->
                                            <div class="col-md-6">
                                                <div class="form-group form-inline">
                                                    <label for="dri_license_type" class="col-form-label mr-auto">License type</label>
                                                    <div class="col-md-9 p-0">
                                                        <p class="col-form-label">
                                                            <?php if ($arr_driver[0]->dri_license_type == 1) {
                                                                echo 'ท.1';
                                                            } else if ($arr_driver[0]->dri_license_type == 2) {
                                                                echo 'ท.2';
                                                            } else if ($arr_driver[0]->dri_license_type == 3) {
                                                                echo 'ท.3';
                                                            } else if ($arr_driver[0]->dri_license_type == 4) {
                                                                echo 'ท.4';
                                                            } ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- License Number -->
                                            <div class="col-md-6">
                                                <div class="form-group form-inline">
                                                    <label for="dri_license" class="col-form-label mr-auto">License number</label>
                                                    <div class="col-md-8 p-0">
                                                        <p class=" col-form-label"><?php echo $arr_driver[0]->dri_license ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Driver Status -->
                                            <div class="col-md-6">
                                                <div class="form-group form-inline">
                                                    <label for="dri_status" class="col-form-label mr-auto">Driver status</label>
                                                    <div class="col-md-9 p-0">
                                                        <p class=" col-form-label">
                                                            <?php if ($arr_driver[0]->dri_status == 1) {
                                                                echo 'พร้อมทำงาน';
                                                            } else if ($arr_driver[0]->dri_status == 2) {
                                                                echo 'กำลังปฏิบัติงาน';
                                                            } else if ($arr_driver[0]->dri_status == 3) {
                                                                echo 'สำรอง';
                                                            } else if ($arr_driver[0]->dri_status == 4) {
                                                                echo 'ลาออก';
                                                            }
                                                            ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Phone Number -->
                                            <div class="col-md-6">
                                                <div class="form-group form-inline">
                                                    <label for="dri_tel" class="col-form-label mr-auto">Phone number</label>
                                                    <div class="col-md-8 p-0">
                                                        <p class="col-form-label"><?php echo $arr_driver[0]->dri_tel ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Start Date -->
                                            <div class="col-md-6">
                                                <div class="form-group form-inline">
                                                    <label for="dri_date_start" class="col-form-label mr-auto">Start date</label>
                                                    <div class="col-md-9 p-0">
                                                        <p class="col-form-label"><?php echo $arr_driver[0]->dri_date_start ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Resign Date -->
                                            <div class="col-md-6">
                                                <div class="form-group form-inline">
                                                    <label for="dri_date_end" class="col-form-label mr-auto">Resign date</label>
                                                    <div class="col-md-9 p-0">
                                                        <p class="col-form-label"><?php echo $arr_driver[0]->dri_date_end ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- </div> -->
            <!-- </div> -->

            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบเอเย่นต์</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo base_url() . '/Driver_show/driver_delete' ?>" method="post">
                            <div class="modal-body float-center">
                                <!-- เก็บ Driver Id -->
                                <input name="dri_id" id="dri_id" type="hidden">
                                <center>คุณเเน่ใจหรือไม่ที่ต้องการลบ</center>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <input type="submit" class="btn btn-danger" value="ลบ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function get_image() {
        var dri_profile_image = $('#dri_profile_image').val();
        $('#file_name').html(dri_profile_image.substr(12));
        $('#dri_profile_image-error').remove();
        $('#old_dri_profile_image').remove();
    }

    function get_id(dri_id) {
        $('#dri_id').val(dri_id);
    }
</script>
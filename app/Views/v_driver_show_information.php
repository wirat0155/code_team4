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
                <div class="float-right ml-auto mr-4" style='margin-top: 10px'>
                    <!-- botton edit -->
                    <a class="ui yellow button" href="<?php echo base_url() . '/Driver_edit/driver_edit/' . $arr_driver[0]->dri_id ?>">
                        <i class="far fa-edit mr-1"></i>
                        Edit info
                    </a>
                    <!-- botton delete -->
                    <button type="submit" class="ui red test button">
                        <i class="trash icon m-0"></i>
                        <i class="align left icon mr-1"></i>
                        Delete
                    </button>
                </div>
                <!-- หัวข้อ -->
                <div class="pl-4 mt-4 page-header mb-0">
                    <h4 class="pl-3 page-title">DRIVER DETAILS</h4>

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
                        <a href="#">Driver details</a>
                    </li>
                </ul>
            </div>

            <!-- card driver detail -->
            <form id="add_driver_form" action="<?php echo base_url() . '/Driver_info/driver_show_info' ?>" enctype="multipart/form-data" method="POST">
                <div class="row mx-4">
                    <div class="col-md-12">
                        <input type='hidden' name='dri_id' value="<?php echo $arr_driver[0]->dri_id ?>">

                        <!-- Driver detail -->
                        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <div class="picture-container">
                                <div class="picture">
                                    <img class="avatar-img rounded-circle" src="<?php echo base_url() . '/dri_profile_image/' . $arr_driver[0]->dri_profile_image ?>">
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Driver information</div>
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
                                        <!-- <div class="col-md-6">
                                            <div class="form-group form-inline">
                                                <label for="dri_date_end" class="col-form-label mr-auto">Resign date</label>
                                                <div class="col-md-9 p-0">
                                                    <p class="col-form-label"><?php echo $arr_driver[0]->dri_date_end ?></p>
                                                </div>
                                            </div>
                                        </div> -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- modal delete -->
            <div class="ui modal">
                <i class="close icon"></i>
                <div class="header">
                    Remove Driver ?
                </div>
                <div class="content">
                    <form action="<?php echo base_url() . '/Driver_show/driver_delete' ?>" method="post">
                        <input type="hidden" name="dri_id" id="dri_id" value="<?php echo $arr_driver[0]->dri_id ?>">

                        <p style="font-size: 1rem">Are you sure to remove the driver</p>

                        <div class="ui info message">
                            <div class="header">
                                What happening after remove the driver
                            </div>
                            <ul class="list">
                                <li>The driver still ramain in database,</li>
                                <li>But you cannot see the driver anymore</li>
                            </ul>
                        </div>
                </div>
                <div class="actions">
                    <button type="button" class="ui test button">
                        No, keep it
                    </button>
                    <button type="submit" class="ui negative right labeled icon button">
                        Yes, remove it
                        <i class="minus circle icon"></i>
                    </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    <!--
    /*
    * get_image
    * show image name
    * @input -
    * @output show image name
    * @author
    * @Create Date
    * @Update Date
    */
    -->
    function get_image() {
        var dri_profile_image = $('#dri_profile_image').val();
        $('#file_name').html(dri_profile_image.substr(12));
        $('#dri_profile_image-error').remove();
        $('#old_dri_profile_image').remove();
    }

    <!--
    /*
    * get_id
    * get dri_id in remove driver modal
    * @input dri_id
    * @output get dri_id in remove driver modal
    * @author
    * @Create Date
    * @Update Date
    */
    -->
    function get_id(dri_id) {
        $('#dri_id').val(dri_id);
    }

    //call remove driver modal
    $('.ui.modal').modal('attach events', '.test.button', 'toggle');
</script>

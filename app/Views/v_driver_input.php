<style>
    .cl-blue {
        color: #1244B9 !important;
    }
    input.error, select.error {
        border: 1px solid red !important;
    }
    .ui.search.dropdown>input.search.error {
        border: 1px solid red !important;
    }
    small.error, label.error {
        color: red !important;
        font-weight: bold;
    }
</style>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-inner">
                <div class="pl-4 mt-4 page-header mb-0">
                    <h4 class="pl-3 page-title">ADD DRIVER</h4>
                </div>
                <hr width="95%" color="696969">
                <ul class="pl-2 mr-5 breadcrumbs d-flex align-items-left align-items-md-center" style="height: 30px;">
                    <li class="nav-home">
                        <a href="<?php echo base_url() . '/Dashboard/dashboard_show'?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a class="cl-blue" href="<?php echo base_url() . '/Driver_show/driver_show_ajax'?>">Driver information</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Add driver</a>
                    </li>
                </ul>
            </div>

            <form id="add_driver_form" action="<?php echo base_url() . '/Driver_input/driver_insert'?>" enctype="multipart/form-data" method="POST">
                <div class="row mx-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Driver Information</div>
                            </div>

                            <div class="card-body" id="driver_section">
                                <div class="row px-5">

                                    <!-- Name-Surmame -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="dri_name" class="col-form-label mr-auto">Name - Surname</label>
                                            <div class="col-md-8 p-0">
                                                <input type="text" class="form-control input-full" id="dri_name"
                                                    name="dri_name" placeholder="Name-Surname">
                                                <small class="form-text text-muted"> </small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Car ID -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="dri_car_id" class="col-form-label mr-auto">Car ID</label>
                                            <div class="col-md-9 p-0">
                                            <select class="form-control input-full" id="dri_car_id"
                                                    name="dri_car_id">
                                                    <option selected disabled>Select car id</option>
                                                    <?php for($i = 0; $i < count($arr_car); $i++) { ?>
                                                    <option value="<?php echo $arr_car[$i]->car_id?>"><?php echo 'คันที่ ' . $arr_car[$i]->car_number . ' ทะเบียน ' . $arr_car[$i]->car_code?></option>
                                                    <?php } ?>
                                            </select>
                                                <small class="form-text text-muted"> </small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card Number -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="dri_card_number" class="col-form-label mr-auto">Card number</label>
                                            <div class="col-md-8 p-0">
                                                <input type="text" class="form-control input-full" id="dri_card_number"
                                                    name="dri_card_number" placeholder="Card Number">
                                                <small class="form-text text-muted"> </small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- License Type -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="dri_license_type" class="col-form-label mr-auto">License type</label>
                                            <div class="col-md-9 p-0">
                                            <select class="form-control input-full" id="dri_license_type" name="dri_license_type">
                                                <option selected disabled>Select Driver license type</option>
                                                <option value="1">ท.1</option>
                                                <option value="2">ท.2</option>
                                                <option value="3">ท.3</option>
                                                <option value="4">ท.4</option>
                                            </select>
                                                <small class="form-text text-muted"> </small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- License Number -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="dri_license" class="col-form-label mr-auto">License number</label>
                                            <div class="col-md-8 p-0">
                                                <input type="text" class="form-control input-full" id="dri_license"
                                                    name="dri_license" placeholder="License Number">
                                                <small class="form-text text-muted"> </small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Driver Status -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="dri_status" class="col-form-label mr-auto">Driver status</label>
                                            <div class="col-md-9 p-0">
                                            <select class="form-control input-full" id="dri_status"
                                                    name="dri_status">
                                                    <option selected disabled>Select driver status</option>
                                                    <option value="1">พร้อมทำงาน</option>
                                                    <option value="2">กำลังปฏิบัติงาน</option>
                                                    <option value="3">สำรอง</option>
                                                    <option value="4">ลาออก</option>
                                            </select>
                                                <small class="form-text text-muted"> </small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Phone Number -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="dri_tel" class="col-form-label mr-auto">Phone number</label>
                                            <div class="col-md-8 p-0">
                                                <input type="text" class="form-control input-full"
                                                    id="dri_tel" name="dri_tel"
                                                    placeholder="Phone Number">
                                                <small class="form-text text-muted"> </small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Start Date -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="dri_date_start" class="col-form-label mr-auto">Start date</label>
                                            <div class="col-md-9 p-0">
                                                <input type="date" class="form-control form-input" id="dri_date_start" name="dri_date_start">
                                                <small class="form-text text-muted"> </small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Picture -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="dri_profile_image" class="col-form-label mr-auto">Profile image</label>
                                            <div class="col-md-8 p-0">
                                                <div class="input-group mb-3">
													<input type="text" id="input_show_browse" class="form-control" placeholder="...." aria-label="Recipient's username" aria-describedby="basic-addon2" disabled style="background: white !important;">
													<div class="input-group-append" style="cursor: pointer;" onclick="$('#dri_profile_image').click();">
														<span class="input-group-text" id="show_browse">Browse</span>
													</div>
												</div>
                                                <input type="file" class="form-control-file input-full" id="dri_profile_image"
                                                    name="dri_profile_image" onchange="get_image();" accept="image/jpg,image/jpeg,image/png" hidden>
                                                <small class="form-text text-muted"> </small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Resign Date -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="dri_date_end" class="col-form-label mr-auto">Resign date</label>
                                            <div class="col-md-9 p-0">
                                            <input type="date" class="form-control form-input" id="dri_date_end" name="dri_date_end">
                                                <small class="form-text text-muted"> </small>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-action" id="driver_action" style>
                                <input type="button" class="ui button" value="Cancel" onclick="window.history.back();">
                                <button type="submit" class="ui positive button pull-right">
                                    <i class="plus icon"></i>
                                    Add driver
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
                        required: 'Please enter your first-last name.'
                    },
                    dri_card_number: {
                        required: 'Please enter your ID card number.',
                        maxlength: 'Please enter no more than 13 digits.'
                    },
                    dri_license: {
                        required: 'Please driver license number',
                        maxlength: 'Please enter no more than 8 digits.'
                    },
                    dri_tel: {
                        required: 'Please enter your phone number',
                        maxlength: 'Please enter no more than 10 digits.'
                    },
                    dri_car_id: {
                        required: 'Please enter car number'
                    },
                    dri_license_type: {
                        required: 'Please select a driver license type.'
                    },
                    dri_status: {
                        required: 'Please select driver status'
                    },
                    dri_date_start: {
                        required: 'Please select a start date'
                    }
                }
            })
        }
    });

            $(document).ready(function() {
                // jQuery Validation
                
            });

            function get_image() {
                var dri_profile_image = $('#dri_profile_image').val();
                $('#input_show_browse').val(dri_profile_image.substr(12));
                $('#dri_profile_image-error').remove();
            }
        </script>
    </div>
</div>
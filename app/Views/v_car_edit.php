<style>
label.error {
    float: left !important;
}

.fa-phone {
        -moz-transform: scaleX(-1);
        -o-transform: scaleX(-1);
        -webkit-transform: scaleX(-1);
        transform: scaleX(-1);
        filter: FlipH;
        -ms-filter: "FlipH";
    }

.cl-blue {
    color: #1244B9 !important;
}

input.error {
    border: 1px solid red !important;
}

.ui.search.dropdown>input.search.error {
    border: 1px solid red !important;
}

small.error,
label.error {
    color: red !important;
    font-weight: bold;
}
</style>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-inner">
                <div class="pl-4 mt-4 page-header mb-0">
                    <h4 class="pl-3 page-title">EDIT CAR</h4>
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
                        <a class="cl-blue" href="<?php echo base_url() . '/Car_show/car_show_ajax'?>">Car
                            information</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a class="cl-blue"
                            href="<?php echo base_url() . '/Car_show/car_detail/' . $arr_car[0]->car_id ?>">Car
                            detail</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit car</a>
                    </li>

                </ul>
            </div>

            <div class="row mx-5 mt-0">
                <div class="col-md-12">
                    <div class="card">
                    <form id="add_car_form" action="<?php echo base_url() . '/Car_edit/car_update' ?>" enctype="multipart/form-data" method="POST">
                            <div class="card-header">
                                <div class="card-title">Car information</div>
                            </div>

                            <div class="card-body">
                                <div class="row px-5">
                                    <div class="col-md-6 col-lg-6">

                                        <!-- ID CAR -->
                                        <input type='hidden' name='car_id' value="<?php echo $arr_car[0]->car_id ?>">
                                        
                                        <!-- Number -->
                                        <div class="form-group form-inline">
                                            <label for="car_number" class="col-form-label mr-auto">Number</label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="car_number"
                                                    name="car_number" placeholder="Car number"
                                                    value="<?php echo $arr_car[0]->car_number ?>">
                                                    <label
                                                    class="error"><?php echo $_SESSION['car_number_error']?></label>
                                            </div>
                                        </div>                                       

                                        <!-- Code -->
                                        <div class="form-group form-inline">
                                            <label for="car_code" class="col-form-label mr-auto">Code</label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="car_code"
                                                    name="car_code" placeholder="Car code"
                                                    value="<?php echo $arr_car[0]->car_code ?>">
                                                    <label
                                                    class="error"><?php echo $_SESSION['car_code_error']?></label>
                                            </div>
                                        </div>
                                        

                                        <!-- Province -->
                                        <div class="form-group form-inline">
                                            <label for="car_prov_id" class="col-form-label mr-auto"></label>
                                            <div class="col-md-8 p-0">
                                            <select class="form-control input-full" name="car_prov_id">
                                            <?php for ($i = 0; $i < count($arr_car_prov); $i++) { ?>
                                        <option value="<?php echo $arr_car_prov[$i]->prov_id ?>" <?php if ($arr_car_prov[$i]->prov_id == $arr_car[0]->car_prov_id) echo "selected" ?>>
                                            <?php echo $arr_car_prov[$i]->prov_name ?></option>
                                    <?php } ?>
                                            </select>
                                            </div>
                                        </div>                                       

                                        <!-- Car type -->
                                        <div class="form-group form-inline">
                                            <label for="car_cart_id" class="col-form-label mr-auto">Car type</label>
                                            <div class="col-md-8 p-0">
                                                <select class="form-control input-full" id="car_cart_id"
                                                        name="car_cart_id">
                                                    <?php for ($i = 0; $i < count($arr_car_type); $i++) { ?>
                                                        <option value="<?php echo $arr_car_type[$i]->cart_id ?>" <?php if ($arr_car_type[$i]->cart_id == $arr_car[0]->car_cart_id) echo "selected" ?>>
                                                        <?php echo $arr_car_type[$i]->cart_name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        

                                        <!-- Car status  -->
                                        <div class="form-group form-inline">
                                            <label for="car_status" class="col-form-label mr-auto">Car status</label>
                                            <div class="col-md-8 p-0">
                                                <select class="form-control input-full" id="car_status"
                                                        name="car_status">
                                                        <option value="1" <?php if ($arr_car[0]->car_status == 1) echo "selected" ?>>พร้อมใช้</option>
                                                        <option value="2" <?php if ($arr_car[0]->car_status == 2) echo "selected" ?>>เสียหาย</option>
                                                        <option value="3" <?php if ($arr_car[0]->car_status == 3) echo "selected" ?>>กำลังซ่อม</option>
                                                        <option value="4" <?php if ($arr_car[0]->car_status == 4) echo "selected" ?>>เลิกใช้งาน</option>
                                                </select>
                                            </div>
                                        </div>
                                        

                                        <!-- Image -->
                                        <div class="form-group form-inline">
                                            <label for="car_image" class="col-form-label mr-auto">Image</label>
                                            <div class="col-md-8 p-0">
                                                <div class="input-group mb-3">
                                                        <input type="text" id="input_show_browse" class="form-control" placeholder="...." value  = "<?php echo $arr_car[0]->car_image?>" aria-label="Recipient's username" aria-describedby="basic-addon2" disabled style="background: white !important;">
                                                        <div class="input-group-append" style="cursor: pointer;" onclick="$('#car_image').click();">
                                                            <span class="input-group-text" id="show_browse">Browse</span>
                                                        </div>
                                                        <input type="text" id='old_car_image' name='old_car_image' value='<?php echo $arr_car[0]->car_image ?>' hidden>
                                                </div>
                                                <input type="file" class="form-control-file input-full" id="car_image"
                                                        name="car_image" onchange="get_image();" accept="image/jpg,image/jpeg,image/png" hidden>
                                                <small class="form-text text-muted"> </small>
                                            </div>
                                        </div>
                                        
                                    </div>


                                    <div class="col-md-6 col-lg-6">
                                        <!-- Brand -->
                                        <div class="form-group form-inline">
                                            <label for="car_brand" class="col-form-label mr-auto">Brand</label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="car_brand"
                                                    name="car_brand" placeholder="car brand"
                                                    value="<?php echo $arr_car[0]->car_brand ?>">
                                            </div>
                                        </div>
                                    

                                        <!-- Branch -->
                                        <div class="form-group form-inline">
                                            <label for="car_branch" class="col-form-label mr-auto">Branch</label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="car_branch"
                                                    name="car_branch" placeholder="car branch"
                                                    value="<?php echo $arr_car[0]->car_branch ?>">
                                            </div>
                                        </div>
                                    

                                        <!-- Chassis number -->
                                        <div class="form-group form-inline">
                                            <label for="car_chassis_number" class="col-form-label mr-auto pull-right">Chassis
                                                    number</label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="car_chassis_number"
                                                    name="car_chassis_number" placeholder="car chassis number"
                                                    value="<?php echo $arr_car[0]->car_chassis_number ?>">
                                            </div>
                                        </div>
                                    


                                        <!-- Register year -->
                                        <div class="form-group form-inline">
                                            <label for="car_register_year" class="col-form-label mr-auto">Register
                                                    year</label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="car_register_year"
                                                    name="car_register_year" placeholder="car register year"
                                                    value="<?php echo $arr_car[0]->car_register_year ?>">
                                            </div>
                                        </div>

                                        <!-- Weight -->
                                        <div class="form-group form-inline">
                                            <label for="car_weight" class="col-form-label mr-auto">Weight</label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="car_weight"
                                                    name="car_weight" placeholder="car weight"
                                                    value="<?php echo $arr_car[0]->car_weight ?>">
                                            </div>
                                        </div>

                                        <!-- Fuel Type -->
                                        <div class="form-group form-inline">
                                            <label for="car_fuel_type" class="col-form-label mr-auto">Fuel type</label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="car_fuel_type"
                                                    name="car_fuel_type" placeholder="car fuel type"
                                                    value="<?php echo $arr_car[0]->car_fuel_type ?>">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-action" id="car_action">
                        <input type="button" class="ui button" value="Cancle" onclick="window.history.back();" >
                        <button type="submit" class="ui orange button pull-right">
                            Confirm
                        </button>
                    </div>
                    </form>
                </div>
            </div>

        <script>
        $(document).ready(function() {
            // jQuery Validation
            if ($('#add_car_form').length > 0) {
                $('#add_car_form').validate({
                    rules: {
                        car_number: {
                            required: true
                        },
                        car_code: {
                            required: true
                        },
                        car_brand: {
                            required: true
                        },
                        car_branch: {
                            required: true
                        },
                        car_prov_id: {
                            require: true
                        },
                        car_chassis_number: {
                            required: true
                        },
                        car_register_year: {
                            required: true,
                            min: 1900,
                            max: 2099
                        },
                        car_weight: {
                            required: true,
                            min: 0
                        },
                        car_fuel_type: {
                            required: true
                        },
                        car_image: {
                            required: true
                        }
                    },
                    messages: {
                        car_number: {
                            required: 'Please enter a car number'
                        },
                        car_code: {
                            required: 'Please enter a car code'
                        },
                        car_brand: {
                            required: 'Please enter a brand'
                        },
                        car_branch: {
                            required: 'Please enter a branch'
                        },
                        car_prov_id: {
                            require: 'Please select a province'
                        },
                        car_chassis_number: {
                            required: 'Please enter a chassis number'
                        },
                        car_register_year: {
                            required: 'Please enter a register year',
                            min: 'Minimum value is 1900',
                            max: 'Maximum value is 2099'
                        },
                        car_weight: {
                            required: 'Please enter a weight',
                            min: 'Minimum value is 0'
                        },
                        car_fuel_type: {
                            required: 'Please enter a fuel type'
                        },
                        car_image: {
                            required: 'Please upload image'
                        }
                    }
                })
            }
        });
        function get_image() {
            var car_img = $('#car_image').val();
            $('#input_show_browse').val(car_img.substr(12));
            $('#car_image-error').remove();
        }
    </script>
    </div>
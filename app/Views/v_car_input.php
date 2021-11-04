<style>
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
                    <h4 class="pl-3 page-title">ADD CAR</h4>
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
                        <a class="cl-blue" href="<?php echo base_url() . '/Car_show/car_show_ajax'?>">Car information</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Add car</a>
                    </li>
                </ul>
            </div>

            <form id="car_form" action="<?php echo base_url() . '/Car_input/car_insert'?>" enctype="multipart/form-data" method="POST" onsubmit="validate_form();">
                <div class="row mx-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Car Information</div>
                            </div>

                            <div class="card-body" id="car_section">
                                <h3>1. Car information</h3>
                                <div class="row px-5">

                                    <!-- Number -->
                                    <div class="col-md-12">
                                        <div class="form-group form-inline">
                                            <label for="car_number" class="col-form-label mr-auto">Car Number</label>
                                            <div class="col-md-11 p-0">
                                                <input type="text" class="form-control input-full" id="car_number" name="car_number" placeholder="Number">
                                                <small class="form-text text-muted"></small>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- Code -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="car_code" class="col-form-label mr-auto">Code</label>
                                            <div class="col-md-9 p-0">
                                                <input type="text" class="form-control input-full" id="car_code" name="car_code" placeholder="Code">
                                                <small class="form-text text-muted"> </small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Province -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="car_prov_id" class="col-form-label mr-auto"></label>
                                            <div class="col-md-10 p-0">
                                                <div class="ui fluid search selection dropdown mt-1" style="left: 10px;top: -10px;">
                                                    <input type="hidden" name="car_prov_id" id="car_prov_id" onchange="check_car_prov_id()">
                                                    <i class="dropdown icon"></i>
                                                    <div class="default text">Select province</div>
                                                    <div class="menu">
                                                        <?php for ($i = 0; $i < count($arr_car_prov); $i++) { ?>
                                                        <div class="item" data-value="<?php echo $arr_car_prov[$i]->prov_id ?>"><?php echo $arr_car_prov[$i]->prov_name;?>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <small></small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Chassis number -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="car_chassis_number" class="col-form-label mr-auto pull-right">Chassis
                                                number</label>
                                            <div class="col-md-9 p-0">
                                                <input type="text" class="form-control input-full" id="car_chassis_number" name="car_chassis_number" placeholder="Chassis number">
                                                <small class="form-text text-muted"> </small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Car type -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="car_cart_id" class="col-form-label mr-auto">Car type</label>
                                            <div class="col-md-10 p-0">
                                                <select class="form-control input-full" id="car_cart_id" name="car_cart_id">
                                                    <?php for ($i = 0; $i < count($arr_car_type); $i++) { ?>
                                                    <option value="<?php echo $arr_car_type[$i]->cart_id ?>">
                                                        <?php echo $arr_car_type[$i]->cart_name ?></option>
                                                    <?php } ?>
                                                </select>
                                                <small class="form-text text-muted"> </small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Register year -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="car_register_year" class="col-form-label mr-auto">Register
                                                year</label>
                                            <div class="col-md-9 p-0">
                                                <input type="number" class="form-control input-full" id="car_register_year" name="car_register_year" placeholder="2021" min="1900" max="2099" step="1">
                                                <small class="form-text text-muted"> </small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Car status  -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="car_status" class="col-form-label mr-auto">Car status</label>
                                            <div class="col-md-10 p-0">
                                                <select class="form-control input-full" id="car_status" name="car_status">
                                                    <option value="1">พร้อมใช้</option>
                                                    <option value="2">เสียหาย</option>
                                                    <option value="3">กำลังซ่อม</option>
                                                    <option value="4">เลิกใช้แล้ว</option>
                                                </select>
                                                <small class="form-text text-muted"> </small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Weight -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="car_weight" class="col-form-label mr-auto">Weight</label>
                                            <div class="col-md-9 p-0">
                                                <input type="text" class="form-control input-full" id="car_weight" name="car_weight" placeholder="Weight">
                                                <small class="form-text text-muted"> </small>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- Fuel Type -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="car_fuel_type" class="col-form-label mr-auto">Fuel type</label>
                                            <div class="col-md-10 p-0">
                                                <input type="text" class="form-control input-full" id="car_fuel_type" name="car_fuel_type" placeholder="Fuel Type">
                                                <small class="form-text text-muted"> </small>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Image -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="car_image" class="col-form-label mr-auto">Image</label>
                                            <div class="col-md-9 p-0">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="input_show_browse" class="form-control" placeholder="...." aria-label="Recipient's username" aria-describedby="basic-addon2" disabled style="background: white !important;">
                                                    <div class="input-group-append" style="cursor: pointer;" onclick="$('#car_image').click();">
                                                        <span class="input-group-text" id="show_browse">Browse</span>
                                                    </div>
                                                </div>
                                                <input type="file" class="form-control-file input-full" id="car_image" name="car_image" onchange="get_image();" accept="image/jpg,image/jpeg,image/png" hidden>
                                                <small class="form-text text-muted"> </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <h3>2. Brand</h3>
                                <div class="row px-5">
                                    <!-- Brand -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="car_brand" class="col-form-label mr-auto">Brand</label>
                                            <div class="col-md-10 p-0">
                                                <input type="text" class="form-control input-full" id="car_brand" name="car_brand" placeholder="Brand">
                                                <small class="form-text text-muted"> </small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Branch -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="car_branch" class="col-form-label mr-auto">Branch</label>
                                            <div class="col-md-10 p-0">
                                                <input type="text" class="form-control input-full" id="car_branch" name="car_branch" placeholder="Branch">
                                                <small class="form-text text-muted"> </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-action" id="car_action" style>
                                <input type="button" class="ui button" value="Cancel" onclick="window.history.back();">
                                <button type="submit" class="ui positive button pull-right">
                                    <i class="plus icon"></i>
                                    Add car
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script>
        <!--
        /*
        * validate_form
        * validate add car form
        * @input -
        * @output validate add car form
        * @author
        * @Create Date
        * @Update Date
        */
        -->
        function validate_form() {
            return check_car_prov_id();
        }

        <!--
        /*
        * check_car_prov_id
        * check select province or not
        * @input -
        * @output check select province or not
        * @author
        * @Create Date
        * @Update Date
        */
        -->
        function check_car_prov_id() {
            // get province id value
            let car_prov_id = $('input[name="car_prov_id"]').val();
            let car_prov_id_warning = $('.ui.fluid.search.selection.dropdown+small');

            // not select province
            if (car_prov_id == '') {
                $('input.search').addClass('error');
                car_prov_id_warning.addClass('error');
                car_prov_id_warning.html('<br/><br/>Please select a province');
                return false;

            // select province
            } else {
                $('input.search').removeClass('error');
                car_prov_id_warning.removeClass('error');
                car_prov_id_warning.html('');
                return true;
            }
        }

        <!--
        /*
        * get_image
        * show image name when upload car image
        * @input -
        * @output show image name when upload car image
        * @author
        * @Create Date
        * @Update Date
        */
        -->
        function get_image() {
            var car_img = $('#car_image').val();
            $('#input_show_browse').val(car_img.substr(12));
            $('#car_image-error').remove();
        }
        </script>
    </div>

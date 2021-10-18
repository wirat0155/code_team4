<style>
    .cl-blue {
        color: #1244B9 !important;
    }
</style>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-inner">

                <div class="pl-4 mt-4 page-header mb-0">
                    <h4 class="pl-3 page-title">SERVICE DETAIL</h4>
                    <div class="card-action ml-auto mr-4">
                        <a class="ui yellow button" href="<?php echo base_url() . '/Service_edit/service_edit/' . $obj_service[0]->ser_id ?>">
                            <i class="far fa-edit mr-1"></i>
                            Edit info
                        </a>
                        <button type="submit" class="ui red test button">
                            <i class="trash icon m-0"></i>
                            <i class="align left icon mr-1"></i>
                            Delete
                        </button>
                    </div>
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
                        <a class="cl-blue" href="<?php echo base_url() . '/Service_show/service_show_ajax' ?>">Service information</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Service details</a>
                    </li>
                </ul>
            </div>

            <form>
                <div class="row mx-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Container</div>
                            </div>

                            <div class="card-body" id="car_section">
                                <div class="row px-5">


                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Container number:</label>
                                            <div class="col-6 col-sm-7">
                                                <p id="con_number"><?php echo $obj_container[0]->con_number ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Container size:</label>
                                            <div class="col-6 col-sm-7">
                                                <p> <?php echo $arr_size[0]->size_name ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Container type:</label>
                                            <div class="col-6 col-sm-7">
                                                <p><?php echo $arr_container_type[0]->cont_name ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Height (m):</label>
                                            <div class="col-6 col-sm-7">
                                                <p><?php echo $arr_size[0]->size_height_out ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Container status:</label>
                                            <div class="col-6 col-sm-7">
                                                <p><?php echo $arr_status_container[0]->stac_name ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto pull-right">Width (m):</label>
                                            <div class="col-6 col-sm-7">
                                                <p><?php echo $arr_size[0]->size_width_out ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Max width (t):</label>
                                            <div class="col-6 col-sm-7">
                                                <p><?php echo $obj_container[0]->con_max_weight ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Length (m):</label>
                                            <div class="col-6 col-sm-7">
                                                <p><?php echo $arr_size[0]->size_length_out ?></p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Empty cabinet weight (t):</label>
                                            <div class="col-6 col-sm-7">
                                                <p><?php echo $obj_container[0]->con_tare_weight ?></p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-7">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Max product weight (t):</label>
                                            <div class="col-2 col-sm-8">
                                                <p><?php echo $obj_container[0]->con_net_weight ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Current product weight (t):</label>
                                            <div class="col-2 col-sm-8">
                                                <p><?php echo $obj_service[0]->ser_weight ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Net volume (CBM):</label>
                                            <div class="col-1 col-sm-8">
                                                <p><?php echo $obj_container[0]->con_cube ?></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>

            <form>
                <div class="row mx-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Service</div>
                            </div>

                            <div class="card-body" id="car_section">
                                <div class="row px-5">


                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Type:</label>
                                            <div class="col-12 col-sm-8">
                                                <p>
                                                    <?php if ($obj_service[0]->ser_type == 1) {
                                                        echo '<span class="text-con-in">ตู้เข้า</span>';
                                                    } else if ($obj_service[0]->ser_type == 2) {
                                                        echo '<span class="text-con-out">ตู้ออก</span>';
                                                    } else if ($obj_service[0]->ser_type == 3) {
                                                        echo '<span class="text-con-drop">ตู้ดรอป</span>';
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Cut-off:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo date_thai($obj_service[0]->ser_departure_date) ?></p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Date arrivals:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo date_thai($obj_service[0]->ser_arrivals_date) ?></p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Date departure:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo date_thai($obj_service[0]->ser_actual_departure_date) ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="car_branch" class="col-form-label mr-auto">Driver In:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $arr_driver_in[0]->dri_name ?></p>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto pull-right">Driver out:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $arr_driver_out[0]->dri_name ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Car type -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Imported car:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $arr_car_in[0]->car_code ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Register year -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Car taken out:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $arr_car_out[0]->car_code ?></p>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Weight -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Arrivals location:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $obj_service[0]->ser_arrivals_location ?></p>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Fuel Type -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Departure location:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $obj_service[0]->ser_departure_location ?></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <form>
                <div class="row mx-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Agent</div>
                            </div>

                            <div class="card-body" id="car_section">
                                <div class="row px-5">

                                    <!-- Number -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Company name:</label>
                                            <div class="col-12 col-sm-8">
                                                <p id="agn_company_name"><?php echo $obj_agent[0]->agn_company_name ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Brand -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Responsible person (Representative):</label>
                                            <div class="col-2 col-sm-4">
                                                <p><?php echo $obj_agent[0]->agn_firstname ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Code -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Company location:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $obj_agent[0]->agn_address ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Branch -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">First name:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $obj_agent[0]->agn_firstname ?></p>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- Chassis number -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto pull-right">Taxpayer number:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $obj_agent[0]->agn_tax ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Car type -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="car_cart_id" class="col-form-label mr-auto">Last name:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $obj_agent[0]->agn_lastname ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Register year -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Contact number:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $obj_agent[0]->agn_tel ?></p>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- Weight -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Email:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $obj_agent[0]->agn_email ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <form>
                <div class="row mx-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Customer</div>
                            </div>

                            <div class="card-body" id="car_section">
                                <div class="row px-5">

                                    <!-- Number -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Company name:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $obj_customer[0]->cus_company_name ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Brand -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Responsible person (Representative):</label>
                                            <div class="col-2 col-sm-4">
                                                <p><?php echo $obj_customer[0]->cus_firstname ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Code -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Branch:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $obj_customer[0]->cus_branch ?></p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">First name:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $obj_customer[0]->cus_firstname ?></p>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Chassis number -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto pull-right">Company location:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $obj_customer[0]->cus_address ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Car type -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Last name:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $obj_customer[0]->cus_lastname ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Register year -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="car_register_year" class="col-form-label mr-auto">Taxpayer number:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $obj_customer[0]->cus_tax ?></p>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- Weight -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Contact number:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $obj_customer[0]->cus_tel ?></p>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Fuel Type -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Email:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $obj_customer[0]->cus_email ?></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
                            },

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
                            },

                        }
                    })
                }
            });
        </script>
    </div>
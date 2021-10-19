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
                    <h4 class="pl-3 page-title">EDIT SERVICE</h4>
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
                        <a class="cl-blue" href="<?php echo base_url() . '/Service_show/service_show_ajax' ?>">Service
                            information</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a class="cl-blue" href="<?php echo base_url() . '/Service_show/service_detail/' . $obj_service[0]->ser_id ?>">Service
                            detail</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit service</a>
                    </li>
                </ul>
            </div>
            <style>
                h1 {
                    color: black;
                }
            </style>

            <div class="row col-md-6 ml-auto mr-auto">
                <a href="#container_information">
                    <h1 class="col-3">Container</h1>
                </a>
                <a href="#service_information">
                    <h1 class="col-3">Service</h1>
                </a>
                <a href="#agent_information">
                    <h1 class="col-3">Agent</h1>
                </a>
                <a href="#customer_information">
                    <h1 class="col-3">Customer</h1>
                </a>
            </div>


            <form">
                <div id="container_information"></div>
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
                                            <select class="form-control input-full col-8" name="con_id" onclick="get_container_information()">
                                                <?php for ($i = 0; $i < count($arr_con); $i++) { ?>
                                                    <option value="<?php echo $arr_con[$i]->con_id ?>" <?php if ($obj_container[0]->con_id == $arr_con[$i]->con_id) echo "selected" ?>>
                                                        <?php echo $arr_con[$i]->con_number ?></option>
                                                <?php } ?>
                                                <option value="new">ตู้ใหม่</option>
                                            </select>
                                            <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="con_number" pattern="[A-Za-z]{4} [0-9]{5} 0" placeholder="ABCD 12345 0" hidden>
                                            <label id="con_number-error" class="error" for="con_number"><?php echo $_SESSION['con_number_error'] ?></label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Container size:</label>
                                            <select class="form-control input-full col-8" name="con_size_id" oninput="get_size_information()">
                                                <?php for ($i = 0; $i < count($arr_size); $i++) { ?>
                                                    <option value="<?php echo $arr_size[$i]->size_id ?>" <?php if ($obj_container[0]->con_size_id == $arr_size[$i]->size_id) echo "selected" ?>>
                                                        <?php echo $arr_size[$i]->size_name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Container type:</label>
                                            <select class="form-control input-full col-8" name="con_cont_id">
                                                <?php for ($i = 0; $i < count($arr_container_type); $i++) { ?>
                                                    <option value="<?php echo $arr_container_type[$i]->cont_id ?>" <?php if ($obj_container[0]->con_cont_id == $arr_container_type[$i]->cont_id) echo "selected" ?>>
                                                        <?php echo $arr_container_type[$i]->cont_name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Height (m):</label>
                                            <input class="input-full form-control col-8" name="size_height_out" value="<?php echo $first_size[0]->size_height_out ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Container status:</label>
                                            <select class="form-control input-full col-8" name="con_stac_id">
                                                <?php for ($i = 0; $i < count($arr_status_container); $i++) { ?>
                                                    <option value="<?php echo $arr_status_container[$i]->stac_id ?>" <?php if ($obj_container[0]->con_stac_id == $arr_status_container[$i]->stac_id) echo "selected" ?>>
                                                        <?php echo $arr_status_container[$i]->stac_name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Width (m):</label>
                                            <input class="input-full form-control col-8" name="size_width_out" value="<?php echo $first_size[0]->size_width_out ?>" readonly>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Max width (t):</label>
                                            <input class="input-full form-control col-8" type="number" step="0.01" name="con_max_weight" placeholder="0.01" value="<?php echo $obj_container[0]->con_max_weight ?>">
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Length (m):</label>
                                            <input class="input-full form-control col-8" name="size_length_out" value="<?php echo $first_size[0]->size_length_out ?>" readonly>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Empty cabinet weight (t):</label>
                                            <input class="input-full form-control col-7" type="number" step="0.01" name="con_tare_weight" placeholder="0.01" value="<?php echo $obj_container[0]->con_tare_weight ?>">
                                        </div>
                                    </div>


                                    <div class="col-md-7">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Max product weight (t):</label>
                                            <input class="input-full form-control col-7" type="number" step="0.01" name="con_max_weight" placeholder="0.01" value="<?php echo $obj_container[0]->con_max_weight ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Current product weight (t):</label>

                                            <input class="input-full form-control col-7" type="number" step="0.01" name="ser_weight" placeholder="0.01" value="<?php echo $obj_service[0]->ser_weight ?>">

                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Net volume (CBM):</label>
                                            <input class="input-full form-control col-7" type="number" step="0.01" name="con_cube" placeholder="0.01" value="<?php echo $obj_container[0]->con_cube ?>">

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                </form>


                <form>
                    <div id="service_information"></div>
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
                    <div id="agent_information"></div>
                    <div class="row mx-5">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Agent</div>
                                </div>

                                <div class="card-body">
                                    <div class="row px-5">
                                        <div class="col-md-6 col-lg-6">

                                            <!-- Id agent -->
                                            <input type='hidden' name='agn_id' value="<?php echo $arr_agent[0]->agn_id ?>">

                                            <!-- Company name -->
                                            <div class="form-group form-inline">
                                                <label for="agn_company_name" class="col-form-label mr-auto">Company name :</label>
                                                <div class="col-md-8 p-0">
                                                    <input class="form-control input-full" id="agn_company_name" name="agn_company_name" placeholder="Company name" value="<?php echo $arr_agent[0]->agn_company_name ?>">
                                                    <label class="error"><?php echo $_SESSION['agn_company_name_error'] ?></label>
                                                </div>
                                            </div>




                                            <!-- Company location -->
                                            <div class="form-group">
                                                <label for="agn_address">Company location :</label>
                                                <textarea type="text" class="form-control" id="agn_address" name="agn_address" placeholder="Company location" rows="5"><?php echo $arr_agent[0]->agn_address ?></textarea>
                                            </div>


                                            <!-- Taxpayer number -->

                                            <div class="form-group form-inline mt-2">
                                                <label for="agn_tax" class="col-form-label mr-auto">Taxpayer number
                                                    :</label>
                                                <div class="col-md-8 p-0">
                                                    <input class="form-control input-full" id="agn_tax" name="agn_tax" placeholder="Taxpayer number" value="<?php echo $arr_agent[0]->agn_tax ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-lg-6">
                                            <!-- Responsible person -->
                                            <div class="form-group form-inline">
                                                <label for="car_number" class="col-form-label mr-auto">Responsible person
                                                    (Representative)</label>
                                            </div>

                                            <!-- First Name -->
                                            <div class="form-group form-inline">
                                                <label class="col-form-label mr-auto">First name </label>
                                                <div class="col-md-8 p-0">
                                                    <input class="form-control input-full" id="agn_firstname" name="agn_firstname" placeholder="First name" value="<?php echo $arr_agent[0]->agn_firstname ?>">
                                                </div>
                                            </div>

                                            <!-- Last Name -->

                                            <div class="form-group form-inline">
                                                <label class="col-form-label mr-auto">Last name </label>
                                                <div class="col-md-8 p-0">
                                                    <input class="form-control input-full" id="agn_lastname" name="agn_lastname" placeholder="Last name" value="<?php echo $arr_agent[0]->agn_lastname ?>">
                                                </div>
                                            </div>


                                            <!-- Contact number -->
                                            <div class="form-group form-inline">
                                                <label for="agn_tel" class="col-form-label mr-auto">Contact number </label>
                                                <div class="col-md-8 p-0">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-phone"></i>
                                                            </span>
                                                        </div>
                                                        <input type="tel" class="form-control" id="agn_tel" name="agn_tel" placeholder="xxx-xxx-xxxx" value="<?php echo $arr_agent[0]->agn_tel ?>">
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Email -->
                                            <div class="form-group form-inline">
                                                <label for="agn_email" class="col-form-label mr-auto">Email :</label>
                                                <div class="col-md-8 p-0">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text ">
                                                                <i class="fas fa-envelope"></i>
                                                            </span>
                                                        </div>
                                                        <input type="email" class="form-control" id="agn_email" name="agn_email" placeholder="example@gmail.com" value="<?php echo $arr_agent[0]->agn_email ?>">
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

                <form>
                    <div id="customer_information"></div>
                    <div class="row mx-5">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Customer</div>
                                </div>

                                <div class="card-body">
                                    <div class="row px-5">
                                        <div class="col-md-6 col-lg-6">
                                            <!-- Id agent -->
                                            <input type='hidden' name='cus_id' value="<?php echo $arr_customer[0]->cus_id ?>">

                                            <!-- Company name -->
                                            <div class="form-group form-inline">
                                                <label for="cus_company_name" class="col-form-label mr-auto">Company name
                                                    :</label>
                                                <div class="col-md-8 p-0">
                                                    <input class="form-control input-full" id="cus_company_name" name="cus_company_name" placeholder="Company name" value="<?php echo $arr_customer[0]->cus_company_name ?>">
                                                    <label class="error"><?php echo $_SESSION['cus_company_name_error'] ?></label>
                                                </div>
                                            </div>
                                            <!-- Branch -->
                                            <div class="form-group form-inline">
                                                <label for="cus_branch" class="col-form-label mr-auto">Branch
                                                    :</label>
                                                <div class="col-md-8 p-0">
                                                    <input class="form-control input-full" id="cus_branch" name="cus_branch" placeholder="Branch" value="<?php echo $arr_customer[0]->cus_branch ?>">
                                                    <label class="error"><?php echo $_SESSION['cus_branch_error'] ?></label>
                                                </div>
                                            </div>


                                            <!-- Company location -->
                                            <div class="form-group">
                                                <label for="cus_address">Company location
                                                    :</label>
                                                <textarea type="text" class="form-control" id="cus_address" name="cus_address" placeholder="Company location" rows="5"><?php echo $arr_customer[0]->cus_address ?></textarea>
                                            </div>


                                            <!-- Taxpayer number -->

                                            <div class="form-group form-inline mt-2">
                                                <label for="agn_tax" class="col-form-label mr-auto">Taxpayer number
                                                    :</label>
                                                <div class="col-md-8 p-0">
                                                    <input class="form-control input-full" id="cus_tax" name="cus_tax" placeholder="Taxpayer number" value="<?php echo $arr_customer[0]->cus_tax ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-lg-6">
                                            <!-- Responsible person -->
                                            <div class="form-group form-inline">
                                                <label class="col-form-label mr-auto">Responsible person
                                                    (Representative)</label>
                                            </div>

                                            <!-- First Name -->
                                            <div class="form-group form-inline">
                                                <label class="col-form-label mr-auto">First name </label>
                                                <div class="col-md-8 p-0">
                                                    <input class="form-control input-full" id="cus_firstname" name="cus_firstname" placeholder="First name" value="<?php echo $arr_customer[0]->cus_firstname ?>">
                                                </div>
                                            </div>

                                            <!-- Last Name -->

                                            <div class="form-group form-inline">
                                                <label class="col-form-label mr-auto">Last name </label>
                                                <div class="col-md-8 p-0">
                                                    <input class="form-control input-full" id="cus_lastname" name="cus_lastname" placeholder="Last name" value="<?php echo $arr_customer[0]->cus_lastname ?>">
                                                </div>
                                            </div>


                                            <!-- Contact number -->
                                            <div class="form-group form-inline">
                                                <label for="agn_tel" class="col-form-label mr-auto">Contact number </label>
                                                <div class="col-md-8 p-0">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-phone"></i>
                                                            </span>
                                                        </div>
                                                        <input type="tel" class="form-control" id="cus_tel" name="cus_tel" placeholder="xxx-xxx-xxxx" value="<?php echo $arr_customer[0]->cus_tel ?>">
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Email -->
                                            <div class="form-group form-inline">
                                                <label for="agn_email" class="col-form-label mr-auto">Email :</label>
                                                <div class="col-md-8 p-0">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text ">
                                                                <i class="fas fa-envelope"></i>
                                                            </span>
                                                        </div>
                                                        <input type="email" class="form-control" id="cus_email" name="cus_email" placeholder="example@gmail.com" value="<?php echo $arr_customer[0]->cus_email ?>">
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
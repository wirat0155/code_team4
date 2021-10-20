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
                h2 {
                    color: black;
                    right: -45px;
                }
            </style>

            <div class="row col-md-6 ml-auto mr-auto">

                <a href="#service_information">
                    <h2 class="col-3">Service</h2>
                </a>
                <a href="#container_information">
                    <h2 class="col-3">Container</h2>
                </a>
                <a href="#agent_information">
                    <h2 class="col-3">Agent</h2>
                </a>
                <a href="#customer_information">
                    <h2 class="col-3">Customer</h2>
                </a>

            </div>

            <form id="add_service_form" action="<?php echo base_url() . '/Service_edit/service_update' ?>" method="POST">
                <div id="container_information"></div>
                <div class="row mx-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Container</div>
                            </div>
                            <div class="card-body">
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




                <div id="service_information"></div>
                <div class="row mx-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Service</div>
                            </div>

                            <div class="card-body" id="car_section">
                                <div class="row px-5">

                                    <!-- Start service form -->
                                    <input type='hidden' name='ser_id' value="<?php echo $obj_service[0]->ser_id ?>">

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="form-group form-inline">Status :</label>
                                            <div class="col-12 col-sm-8">
                                                <select class="input-full form-control col-7" name="ser_stac_id">
                                                    <?php for ($i = 0; $i < count($arr_status_container); $i++) { ?>
                                                        <option value="<?php echo $obj_service[$i]->ser_stac_id ?>" <?php if ($obj_service[0]->ser_stac_id == $arr_status_container[$i]->stac_id) echo "selected" ?>>
                                                            <?php echo $arr_status_container[$i]->stac_name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Cut-off :</label>
                                            <input class="input-full form-control col-7" type="datetime-local" name="ser_departure_date" value="<?php echo datetime_format_value($obj_service[0]->ser_departure_date) ?>">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Date arrivals :</label>
                                            <input class="input-full form-control col-7" type="datetime-local" name="ser_arrivals_date" value="<?php echo datetime_format_value($obj_service[0]->ser_arrivals_date) ?>">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Date departure :</label>
                                            <input class="input-full form-control col-7" type="datetime-local" name="ser_actual_departure_date" value="<?php echo datetime_format_value($obj_service[0]->ser_actual_departure_date) ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="car_branch" class="col-form-label mr-auto">Driver In:</label>
                                            <div class="col-12 col-sm-8">
                                                <select class="input-full form-control col-7" name="ser_dri_id_in" onclick="get_car_information(1)">
                                                    <?php for ($i = 0; $i < count($arr_driver); $i++) { ?>
                                                        <option value="<?php echo $arr_driver[$i]->dri_id ?>" <?php if ($obj_service[0]->ser_dri_id_in == $arr_driver[$i]->dri_id) echo "selected" ?>>
                                                            <?php echo $arr_driver[$i]->dri_name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto pull-right">Driver out:</label>
                                            <div class="col-12 col-sm-8">
                                                <select class="input-full form-control col-7" name="ser_dri_id_out" onclick="get_car_information(2)">
                                                    <?php for ($i = 0; $i < count($arr_driver); $i++) { ?>
                                                        <option value="<?php echo $arr_driver[$i]->dri_id ?>" <?php if ($obj_service[0]->ser_dri_id_out == $arr_driver[$i]->dri_id) echo "selected" ?>>
                                                            <?php echo $arr_driver[$i]->dri_name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <input type="checkbox" style="margin-left: 3%;" id="open" onclick="open_disable(1)"> Use not a regular car
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto pull-right" for="ser_car_id_in">Importer car</label>
                                            <select class="input-full form-control col-7" name="ser_car_id_in" disabled>
                                                <?php for ($i = 0; $i < count($arr_car); $i++) { ?>
                                                    <option value="<?php echo $arr_car[$i]->car_id ?>" <?php if ($arr_driver[0]->dri_car_id == $arr_car[$i]->car_id) echo "selected" ?>>
                                                        <?php echo 'คันที่ ' . $arr_car[$i]->car_number . ' ทะเบียน ' . $arr_car[$i]->car_code ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <input type="checkbox" style="margin-left: 3%;" id="open2" onclick="open_disable(2)"> Use not a regular car
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto pull-right" for="ser_car_id_out">Car taken out</label>
                                            <select class="input-full form-control col-7" name="ser_car_id_out" disabled>
                                                <?php for ($i = 0; $i < count($arr_car); $i++) { ?>
                                                    <option value="<?php echo $arr_car[$i]->car_id ?>" <?php if ($obj_service[0]->ser_car_id_out == $arr_car[$i]->car_id) echo "selected" ?>>
                                                        <?php echo 'คันที่ ' . $arr_car[$i]->car_number . ' ทะเบียน ' . $arr_car[$i]->car_code ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Arrivals location:</label>
                                            <input class="input-full form-control col-7" type="text" name="ser_arrivals_location" placeholder="สถานที่ต้นทาง" value="<?php echo $obj_service[0]->ser_arrivals_location ?>">
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Departure location:</label>
                                            <input class="input-full form-control col-7" type="text" name="ser_departure_location" placeholder="สถานที่ปลายทาง" value="<?php echo $obj_service[0]->ser_departure_location ?>">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



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
                                            <div class="col-12 col-sm-4">
                                                <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="agn_id" onclick="get_agent_information()">
                                                    <?php for ($i = 0; $i < count($arr_agn); $i++) { ?>
                                                        <option value="<?php echo $arr_agn[$i]->agn_id ?>" <?php if ($obj_agent[0]->agn_id == $arr_agn[$i]->agn_id) echo "selected" ?>>
                                                            <?php echo $arr_agn[$i]->agn_company_name ?></option>
                                                    <?php } ?>
                                                    <option value="new">เอเย่นต์ใหม่</option>
                                                </select>
                                            </div>
                                            <!-- <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="agn_company_name" name="agn_company_name" placeholder="Company name" value="<?php echo $obj_agent[0]->agn_company_name ?>">
                                                <label class="error"><?php echo $_SESSION['agn_company_name_error'] ?></label>
                                            </div> -->
                                        </div>




                                        <!-- Company location -->
                                        <div class="form-group">
                                            <label for="agn_address">Company location :</label>
                                            <textarea type="text" class="form-control" id="agn_address" name="agn_address" placeholder="Company location" rows="5"><?php echo $obj_agent[0]->agn_address ?></textarea>
                                        </div>


                                        <!-- Taxpayer number -->

                                        <div class="form-group form-inline mt-2">
                                            <label for="agn_tax" class="col-form-label mr-auto">Taxpayer number
                                                :</label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="agn_tax" name="agn_tax" placeholder="Taxpayer number" value="<?php echo $obj_agent[0]->agn_tax ?>">
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
                                                <input class="form-control input-full" id="agn_firstname" name="agn_firstname" placeholder="First name" value="<?php echo $obj_agent[0]->agn_firstname ?>">
                                            </div>
                                        </div>

                                        <!-- Last Name -->

                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Last name </label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="agn_lastname" name="agn_lastname" placeholder="Last name" value="<?php echo $obj_agent[0]->agn_lastname ?>">
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
                                                    <input type="tel" class="form-control" id="agn_tel" name="agn_tel" placeholder="xxx-xxx-xxxx" value="<?php echo $obj_agent[0]->agn_tel ?>">
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
                                                    <input type="email" class="form-control" id="agn_email" name="agn_email" placeholder="example@gmail.com" value="<?php echo $obj_agent[0]->agn_email ?>">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



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
                                            <label for="cus_company_name" class="col-form-label mr-auto">Company name :</label>
                                            <div class="col-12 col-sm-4">
                                                <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="cus_id" onclick="get_customer_information()">
                                                    <?php for ($i = 0; $i < count($arr_cus); $i++) { ?>
                                                        <option value="<?php echo $arr_cus[$i]->cus_id ?>" <?php if ($obj_customer[0]->cus_id == $arr_cus[$i]->cus_id) echo "selected" ?>>
                                                            <?php echo $arr_cus[$i]->cus_company_name ?></option>
                                                    <?php } ?>
                                                    <option value="new">ลูกค้าใหม่</option>
                                                </select>
                                            </div>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="cus_company_name" name="cus_company_name" placeholder="Company name" value="<?php echo $obj_customer[0]->cus_company_name ?>">
                                                <label class="error"><?php echo $_SESSION['cus_company_name_error'] ?></label>
                                            </div>
                                        </div>
                                        <!-- Branch -->
                                        <div class="form-group form-inline">
                                            <label for="cus_branch" class="col-form-label mr-auto">Branch
                                                :</label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="cus_branch" name="cus_branch" placeholder="Branch" value="<?php echo $obj_customer[0]->cus_branch ?>">
                                                <label class="error"><?php echo $_SESSION['cus_branch_error'] ?></label>
                                            </div>
                                        </div>


                                        <!-- Company location -->
                                        <div class="form-group">
                                            <label for="cus_address">Company location
                                                :</label>
                                            <textarea type="text" class="form-control" id="cus_address" name="cus_address" placeholder="Company location" rows="5"><?php echo $obj_customer[0]->cus_address ?></textarea>
                                        </div>


                                        <!-- Taxpayer number -->

                                        <div class="form-group form-inline mt-2">
                                            <label for="agn_tax" class="col-form-label mr-auto">Taxpayer number
                                                :</label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="cus_tax" name="cus_tax" placeholder="Taxpayer number" value="<?php echo $obj_customer[0]->cus_tax ?>">
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
                                                <input class="form-control input-full" id="cus_firstname" name="cus_firstname" placeholder="First name" value="<?php echo $obj_customer[0]->cus_firstname ?>">
                                            </div>
                                        </div>

                                        <!-- Last Name -->

                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Last name </label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="cus_lastname" name="cus_lastname" placeholder="Last name" value="<?php echo $obj_customer[0]->cus_lastname ?>">
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
                                                    <input type="tel" class="form-control" id="cus_tel" name="cus_tel" placeholder="xxx-xxx-xxxx" value="<?php echo $obj_customer[0]->cus_tel ?>">
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
                                                    <input type="email" class="form-control" id="cus_email" name="cus_email" placeholder="example@gmail.com" value="<?php echo $obj_customer[0]->cus_email ?>">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action" id="car_action">
                    <input type="button" class="ui button" value="Cancle" onclick="window.history.back();">
                    <button type="submit" class="ui orange button pull-right">
                        Confirm
                    </button>
                </div>
            </form>

        </div>

        <script>
            $(document).ready(function() {
                // Get section error code form controller
                let section_error = '<?php echo $section_error ?>';

                // Container number duplicate
                // Go to container section
                if (section_error == '2') {
                    $('#container_step').click();
                    $('#container_step').addClass('false');
                }

                // Agent duplicate
                // Go to agent section
                else if (section_error == '3') {
                    $('#agent_step').click();
                    $('#agent_step').addClass('false');
                }

                // Customer duplicate
                // Go to customer section
                else if (section_error == '4') {
                    $('#customer_step').click();
                    $('#customer_step').addClass('false');
                }

                // No error found
                // Go to service section as default
                else {
                    $('#service_step').click();
                }
            })

            function show_all_form(status) {
                $('#service_section').show();
                $('#container_section').show();
                $('#agent_section').show();
                $('#customer_section').show();
                setTimeout(check_service_form);
                setTimeout(check_container_form);
                setTimeout(check_agent_form);
                setTimeout(check_customer_form);
                setTimeout(check_all_form);
            }

            function check_service_form() {
                // $('#service_section label.error').remove();
                if ($('#service_section .form-control.error').length != 0) {
                    // console.log('service' + $('#service_section .error').length);
                    $('#service_step').addClass("false");
                } else {
                    $('#service_step').addClass("completed");
                }
            }

            function check_container_form() {
                // $('#container_section label.error').remove();
                if ($('#container_section .form-control.error').length > 0) {
                    console.log('container' + $('#container_section .error').length);
                    $('#container_step').addClass("false");
                } else {
                    $('#container_step').addClass("completed");
                }
                // if (status == '1') {
                //     show_service_form();
                // } else {
                //     show_agent_form();
                // }
            }

            function check_agent_form() {
                // $('#agent_section label.error').remove();
                if ($('#agent_section .form-control.error').length > 0) {
                    // console.log('service' + $('#service_section .error').length);
                    $('#agent_step').addClass("false");
                } else {
                    $('#agent_step').addClass("completed");
                }
                // if (status == '1') {
                //     show_container_form();
                // } else {
                //     show_customer_form();
                // }
            }

            function check_customer_form() {
                // $('#customer_section label.error').remove();
                if ($('#customer_section .form-control.error').length > 0) {
                    console.log('customer' + $('#customer_section .error').length);
                    $('#customer_step').addClass("false");
                } else {
                    $('#customer_step').addClass("completed");
                }
                // if (status == '1') {
                //     show_agent_form();
                // }

            }

            function check_all_form() {
                if ($('#service_section .form-control.error').length > 0) {
                    console.log('service' + $('#service_section .error').length);
                    // $('#service_step').addClass("false");
                    $('#service_step').click();
                } else if ($('#container_section .form-control.error').length > 0) {
                    console.log('container' + $('#container_section .error').length);
                    // $('#container_step').addClass("false");
                    $('#container_step').click();
                } else if ($('#agent_section .form-control.error').length > 0) {
                    console.log('agent' + $('#agent_section .error').length);
                    // $('#agent_step').addClass("false");
                    $('#agent_step').click();
                } else if ($('#customer_section .form-control.error').length > 0) {
                    console.log('customer' + $('#customer_section .error').length);
                    // $('#customer_step').addClass("false");
                    $('#customer_step').click();
                }
            }

            function show_service_form() {
                $('#service_section').show();
                $('#first_from_action').show();
                if (!$('#service_step').hasClass("active")) {
                    $('#container_step').removeClass("active");
                    $('#agent_step').removeClass("active");
                    $('#customer_step').removeClass("active");
                    $('#service_step').removeClass("false");
                    $('#service_step').removeClass("completed");
                    $('#service_step').addClass("active");
                }
                //hide
                $('#container_section').hide();
                $('#container_from_action').hide();
                $('#agent_section').hide();
                $('#agent_from_action').hide();
                $('#customer_section').hide();
                $('#last_from_action').hide();
            }

            function show_container_form() {
                $('#container_section').show();
                $('#container_from_action').show();
                if (!$('#container_step').hasClass("active")) {
                    $('#service_step').removeClass("active");
                    $('#agent_step').removeClass("active");
                    $('#customer_step').removeClass("active");
                    $('#container_step').removeClass("false");
                    $('#container_step').removeClass("completed");
                    $('#container_step').addClass("active");
                }
                $('#service_section').hide();
                $('#first_from_action').hide();
                $('#agent_section').hide();
                $('#agent_from_action').hide();
                $('#customer_section').hide();
                $('#last_from_action').hide();
                $('#container_section .ui.fluid.search.selection.dropdown+label').css('display', 'block');
            }

            function show_agent_form() {
                $('#agent_section').show();
                $('#agent_from_action').show();
                if (!$('#agent_step').hasClass("active")) {
                    $('#service_step').removeClass("active");
                    $('#container_step').removeClass("active");
                    $('#customer_step').removeClass("active");
                    $('#agent_step').removeClass("false");
                    $('#agent_step').removeClass("completed");
                    $('#agent_step').addClass("active");
                }
                $('#service_section').hide();
                $('#first_from_action').hide();
                $('#container_section').hide();
                $('#container_from_action').hide();
                $('#customer_section').hide();
                $('#last_from_action').hide();
                $('#agent_section .ui.fluid.search.selection.dropdown+label').css('display', 'block');
            }

            function show_customer_form() {
                $('#customer_section').show();
                $('#last_from_action').show();
                if (!$('#customer_step').hasClass("active")) {
                    $('#service_step').removeClass("active");
                    $('#container_step').removeClass("active");
                    $('#agent_step').removeClass("active");
                    $('#customer_step').removeClass("false");
                    $('#customer_step').removeClass("completed");
                    $('#customer_step').addClass("active");
                }
                $('#service_section').hide();
                $('#first_from_action').hide();
                $('#agent_section').hide();
                $('#agent_from_action').hide();
                $('#container_section').hide();
                $('#container_from_action').hide();
                $('#customer_section .ui.fluid.search.selection.dropdown+label').css('display', 'block');
            }

            function get_car_information(status) {
                let ser_dri_id_in = $('select[name="ser_dri_id_in"]').val();
                let ser_dri_id_out = $('select[name="ser_dri_id_out"]').val();

                if (status == 1) {
                    if (ser_dri_id_in != '') {
                        $.ajax({
                            url: '<?php echo base_url() . '/Driver_show/get_driver_ajax' ?>',
                            method: 'POST',
                            dataType: 'JSON',
                            data: {
                                ser_dri: ser_dri_id_in
                            },
                            success: function(data) {
                                console.log(data);
                                show_driver_information(data, status);
                            }
                        });
                    } else {
                        clear_driver_information();
                    }
                } else {
                    if (ser_dri_id_out != '') {
                        $.ajax({
                            url: '<?php echo base_url() . '/Driver_show/get_driver_ajax' ?>',
                            method: 'POST',
                            dataType: 'JSON',
                            data: {
                                ser_dri: ser_dri_id_out
                            },
                            success: function(data) {
                                console.log(data);
                                show_driver_information(data, status);
                            }
                        });
                    } else {
                        clear_driver_information();
                    }
                }
            }

            function open_disable(status) {
                if (status == 1) {
                    if (document.getElementById('open').checked) {
                        $('select[name="ser_car_id_in"]').prop('disabled', false);
                    } else {
                        $('select[name="ser_car_id_in"]').prop('disabled', true);
                        get_car_information(status);
                    }
                } else {
                    if (document.getElementById('open2').checked) {
                        $('select[name="ser_car_id_out"]').prop('disabled', false);
                    } else {
                        $('select[name="ser_car_id_out"]').prop('disabled', true);
                        get_car_information(status);
                    }
                }
            }
            // show agent information when input agn_company_name
            function show_driver_information(driver, status) {
                if (status == 1) {
                    $('select[name="ser_car_id_in"]').val(driver[0]['dri_car_id']);
                } else {
                    $('select[name="ser_car_id_out"]').val(driver[0]['dri_car_id']);
                }
            }

            // clear agent information when delete input agn_company_name
            function clear_driver_information() {
                $('select[name="ser_car_id_in"]').val('');
                $('select[name="ser_car_id_out"]').val('');
            }

            function get_container_information() {
                $('#container_section label.error').remove();
                remove_form_attr('readonly', '#container_section');
                let con_id = $('#container_section input[name="con_id"]').val();

                if (con_id != '' && con_id != "new") {
                    $('input[name="con_number"]').prop('hidden', true);
                    $.ajax({
                        url: '<?php echo base_url() . '/Container_show/get_container_ajax' ?>',
                        method: 'POST',
                        dataType: 'JSON',
                        data: {
                            con_id: con_id
                        },
                        success: function(data) {
                            console.log(data);
                            show_container_information(data);
                            valid_container_error();
                        }
                    });
                }
                if (con_id == "new") {
                    $('input[name="con_number"]').prop('hidden', false);
                    clear_container_information();
                    valid_container_error();
                }
            }

            function valid_container_error() {
                $('#container_section input.error').removeClass('error');
                $('#container_section textarea.error').removeClass('error');
            }


            function show_container_information(container) {
                $('select[name="con_cont_id"]').val(container[0]['con_cont_id']);
                $('select[name="con_stac_id"]').val(container[0]['con_stac_id']);
                $('input[name="con_max_weight"]').val(container[0]['con_max_weight']);
                $('input[name="con_tare_weight"]').val(container[0]['con_tare_weight']);
                $('input[name="con_net_weight"]').val(container[0]['con_net_weight']);
                $('input[name="con_cube"]').val(container[0]['con_cube']);
                $('select[name="con_size_id"]').val(container[0]['con_size_id']);
                get_size_information();
            }


            function clear_container_information() {
                $('select[name="con_cont_id"]').val(1);

                $('select[name="con_stac_id"]').val(1);

                $('input[name="con_max_weight"]').val('');
                $('input[name="con_tare_weight"]').val('');
                $('input[name="con_net_weight"]').val('');
                $('input[name="con_cube"]').val('');

                get_size_information();

                $('input[name="size_height_out"]').val('');
                $('input[name="size_width_out"]').val('');
                $('input[name="size_length_out"]').val('');
            }
            // get size information when change con_size_id dropdown
            function get_size_information() {
                let size_id = $('select[name="con_size_id"]').val();
                $.ajax({
                    url: '<?php echo base_url() . '/Size_show/get_size_ajax' ?>',
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        size_id: size_id
                    },
                    success: function(data) {
                        show_size_information(data[0]['size_height_out'], data[0]['size_width_out'], data[0]
                            ['size_length_out']);
                    }
                });
            }
            // show size information when change con_size_id dropdown
            function show_size_information(size_height_out, size_width_out, size_length_out) {
                console.log(size_height_out);
                $('input[name="size_height_out"]').val(size_height_out);
                $('input[name="size_width_out"]').val(size_width_out);
                $('input[name="size_length_out"]').val(size_length_out);
            }

            function get_agent_information() {
                $('#agent_section label.error').remove();
                remove_form_attr('readonly', '#agent_section');
                let agn_id = $('#agent_section input[name="agn_id"]').val();

                if (agn_id != '' && agn_id != "new") {
                    $('input[name="agn_company_name"]').prop('hidden', true);
                    $.ajax({
                        url: '<?php echo base_url() . '/Agent_show/get_agent_ajax' ?>',
                        method: 'POST',
                        dataType: 'JSON',
                        data: {
                            agn_id: agn_id
                        },
                        success: function(data) {
                            show_agent_information(data);
                            valid_agent_error();
                        }
                    });
                }
                if (agn_id == "new") {
                    $('input[name="agn_company_name"]').prop('hidden', false);
                    clear_agent_information();
                    valid_agent_error();
                }
            }

            function valid_agent_error() {
                $('#agent_section input.error').removeClass('error');
                $('#agent_section textarea.error').removeClass('error');
            }

            // show agent information when input agn_company_name
            function show_agent_information(agent) {
                $('input[name="agn_id"]').val(agent[0]['agn_id']);
                $('textarea[name="agn_address"]').val(agent[0]['agn_address']);
                $('input[name="agn_tax"]').val(agent[0]['agn_tax']);
                $('input[name="agn_firstname"]').val(agent[0]['agn_firstname']);
                $('input[name="agn_lastname"]').val(agent[0]['agn_lastname']);
                $('input[name="agn_tel"]').val(agent[0]['agn_tel']);
                $('input[name="agn_email"]').val(agent[0]['agn_email']);
            }

            // clear agent information when delete input agn_company_name
            function clear_agent_information() {
                $('input[name="agn_id"]').val('');
                $('textarea[name="agn_address"]').val('');
                $('input[name="agn_tax"]').val('');
                $('input[name="agn_firstname"]').val('');
                $('input[name="agn_lastname"]').val('');
                $('input[name="agn_tel"]').val('');
                $('input[name="agn_email"]').val('');
            }

            function remove_form_attr(attr, target) {
                $(target + ' *[readonly]').removeAttr(attr);
            }

            function get_customer_information() {
                // Remove jQuery validation error
                $('#customer_section label.error').remove();

                // Remove readonly in customer_section div
                remove_form_attr('readonly', '#customer_section');

                let cus_id = $('#customer_section input[name="cus_id"]').val();

                if (cus_id != '' && cus_id != "+ New customer") {
                    $('input[name="cus_company_name"]').prop('hidden', true);
                    $.ajax({
                        url: '<?php echo base_url() . '/Customer_show/get_customer_ajax' ?>',
                        method: 'POST',
                        dataType: 'JSON',
                        data: {
                            cus_id: cus_id
                        },
                        success: function(data) {
                            show_customer_information(data);
                            valid_customer_error();
                        }
                    });
                }
                if (cus_id == "new") {
                    $('input[name="cus_company_name"]').prop('hidden', false);
                    clear_customer_information();
                    valid_customer_error();
                }
            }

            function valid_customer_error() {
                $('#customer_section input.error').removeClass('error');
                $('#customer_section textarea.error').removeClass('error');
            }

            // show agent information when input agn_company_name
            function show_customer_information(customer) {
                $('input[name="cus_branch"]').val(customer[0]['cus_branch']);
                $('textarea[name="cus_address"]').val(customer[0]['cus_address']);
                $('input[name="cus_tax"]').val(customer[0]['cus_tax']);
                $('input[name="cus_firstname"]').val(customer[0]['cus_firstname']);
                $('input[name="cus_lastname"]').val(customer[0]['cus_lastname']);
                $('input[name="cus_tel"]').val(customer[0]['cus_tel']);
                $('input[name="cus_email"]').val(customer[0]['cus_email']);
            }

            // clear agent information when delete input agn_company_name
            function clear_customer_information() {
                $('input[name="cus_branch"]').val('');
                $('textarea[name="cus_address"]').val('');
                $('input[name="cus_tax"]').val('');
                $('input[name="cus_firstname"]').val('');
                $('input[name="cus_lastname"]').val('');
                $('input[name="cus_tel"]').val('');
                $('input[name="cus_email"]').val('');
            }

            function validate_form() {
                const con_id_pass = check_con_id();
                const agn_id_pass = check_agn_id();
                const cus_id_pass = check_cus_id();
                return con_id_pass && agn_id_pass && cus_id_pass;
            }

            function check_con_id() {
                const con_id_input = $('input[name="con_id"]');
                let con_id_warning = $('#container_section .ui.fluid.search.selection.dropdown+label');

                // select container from dropdown
                if (con_id_input.val() == '') {
                    $('#container_section input.search').addClass('error');
                    con_id_warning.addClass('error');
                    con_id_warning.html('<br/><br/>Please select a container');
                    return false;
                } else {
                    $('#container_section input.search').removeClass('error');
                    con_id_warning.removeClass('error');
                    con_id_warning.html('');
                    return true;
                }
            }

            function check_agn_id() {
                const agn_id_input = $('input[name="agn_id"]');
                let agn_id_warning = $('#agent_section .ui.fluid.search.selection.dropdown+label');

                // select container from dropdown
                if (agn_id_input.val() == '') {
                    $('#agent_section input.search').addClass('error');
                    agn_id_warning.addClass('error');
                    agn_id_warning.html('<br/><br/>Please select a agent');
                    return false;
                } else {
                    $('#agent_section input.search').removeClass('error');
                    agn_id_warning.removeClass('error');
                    agn_id_warning.html('');
                    return true;
                }
            }

            function check_cus_id() {
                const cus_id_input = $('input[name="cus_id"]');
                let cus_id_warning = $('#customer_section .ui.fluid.search.selection.dropdown+label');

                // select container from dropdown
                if (cus_id_input.val() == '') {
                    $('#customer_section input.search').addClass('error');
                    cus_id_warning.addClass('error');
                    cus_id_warning.html('<br/><br/>Please select a customer');
                    return false;
                } else {
                    $('#customer_section input.search').removeClass('error');
                    cus_id_warning.removeClass('error');
                    cus_id_warning.html('');
                    return true;
                }
            }
        </script>
    </div>
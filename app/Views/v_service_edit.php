<style>
    .cl-blue {
        color: #1244B9 !important;
    }
    input.error, select.error, textarea.error {
        border: 1px solid red !important;
    }
    .ui.search.dropdown>input.search.error {
        border: 1px solid red !important;
    }
    small.error, label.error {
        color: red !important;
        font-weight: bold;
    }
    h3 {
        color: black;
    }
    h3.active {
        color: #0B5B84;
        border-bottom: 2px solid #0B5B84;
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

            <div class="d-flex justify-content-center">
                <a href="#service_information">
                    <h3 onclick="hilight_section('service')" class="m-3 service active">Service</h3>
                </a>
                <a href="#container_information">
                    <h3 onclick="hilight_section('con')" class="m-3 con">Container</h3>
                </a>
                <a href="#agent_information">
                    <h3 onclick="hilight_section('agent')" class="m-3 agent">Agent</h3>
                </a>
                <a href="#customer_information">
                    <h3 onclick="hilight_section('customer')" class="m-3 customer">Customer</h3>
                </a>
            </div>

            <form id="service_form" action="<?php echo base_url() . '/Service_edit/service_update' ?>" method="POST">

                <div id="service_information"></div>
                <div class="row mx-5" id="service_section">
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
                                            <label class="col-form-label mr-auto">Status</label>
                                            <div class="col-12 col-sm-7 p-0">
                                                <select class="input-full form-control" name="ser_stac_id">
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
                                            <label class="col-form-label mr-auto">Cut-off</label>
                                            <input class="input-full form-control col-12 col-sm-7" type="datetime-local" name="ser_departure_date" value="<?php echo datetime_format_value($obj_service[0]->ser_departure_date) ?>">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Date arrivals</label>
                                            <input class="input-full form-control col-12 col-sm-7" type="datetime-local" name="ser_arrivals_date" value="<?php echo datetime_format_value($obj_service[0]->ser_arrivals_date) ?>">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Date departure</label>
                                            <input class="input-full form-control col-12 col-sm-7" type="datetime-local" name="ser_actual_departure_date" value="<?php echo datetime_format_value($obj_service[0]->ser_actual_departure_date) ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label for="car_branch" class="col-form-label mr-auto">Driver In</label>
                                            <div class="col-12 col-sm-7 p-0">
                                                <select class="input-full form-control" name="ser_dri_id_in" onclick="get_car_information(1)">
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
                                            <label class="col-form-label mr-auto pull-right">Driver out</label>
                                            <div class="col-12 col-sm-7 p-0">
                                                <select class="input-full form-control" name="ser_dri_id_out" onclick="get_car_information(2)">
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
                                            <label class="col-form-label mr-auto">Arrivals location</label>
                                            <input class="input-full form-control col-7" type="text" name="ser_arrivals_location" placeholder="สถานที่ต้นทาง" value="<?php echo $obj_service[0]->ser_arrivals_location ?>">
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Departure location</label>
                                            <input class="input-full form-control col-7" type="text" name="ser_departure_location" placeholder="สถานที่ปลายทาง" value="<?php echo $obj_service[0]->ser_departure_location ?>">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="container_information"></div>
                <div class="row mx-5" id="container_section">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Container</div>
                            </div>
                            <div class="card-body">
                                <div class="row px-5">
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Container number</label>
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
                                            <label class="col-form-label mr-auto">Container size</label>
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
                                            <label class="col-form-label mr-auto">Container type</label>
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
                                            <label class="col-form-label mr-auto">Height (m)</label>
                                            <input class="input-full form-control col-8" name="size_height_out" value="<?php echo $first_size[0]->size_height_out ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Container status</label>
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
                                            <label class="col-form-label mr-auto">Width (m)</label>
                                            <input class="input-full form-control col-8" name="size_width_out" value="<?php echo $first_size[0]->size_width_out ?>" readonly>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Max weight (t)</label>
                                            <input class="input-full form-control col-8" type="number" step="0.01" name="con_max_weight" placeholder="0.01" value="<?php echo $obj_container[0]->con_max_weight ?>">
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Length (m)</label>
                                            <input class="input-full form-control col-8" name="size_length_out" value="<?php echo $first_size[0]->size_length_out ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="row col-12">
                                        <div class="col-md-6">
                                            <div class="form-group form-inline">
                                                <label class="col-form-label mr-auto">Tare weight (t)</label>
                                                <input class="input-full form-control col-8" type="number" step="0.01" name="con_tare_weight" placeholder="0.01" value="<?php echo $obj_container[0]->con_tare_weight ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row col-12">
                                        <div class="col-md-6">
                                            <div class="form-group form-inline">
                                                <label class="col-form-label mr-auto">Max weight (t)</label>
                                                <input class="input-full form-control col-8" type="number" step="0.01" name="con_max_weight" placeholder="0.01" value="<?php echo $obj_container[0]->con_max_weight ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row col-12">

                                        <div class="col-md-6">
                                            <div class="form-group form-inline">
                                                <label class="col-form-label mr-auto">Current weight (t)</label>

                                                <input class="input-full form-control col-8" type="number" step="0.01" name="ser_weight" placeholder="0.01" value="<?php echo $obj_service[0]->ser_weight ?>">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Cube (CBM)</label>
                                            <input class="input-full form-control col-8" type="number" step="0.01" name="con_cube" placeholder="0.01" value="<?php echo $obj_container[0]->con_cube ?>">

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div id="agent_information"></div>
                <div class="row mx-5" id="agent_section">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Agent</div>
                            </div>

                            <div class="card-body">
                                <div class="row px-5">
                                    <div class="col-md-6 col-lg-6">
                                        <label class="mt-3 mb-3"><b><h3>Company</h3></b></label>

                                        <!-- Company name -->
                                        <div class="form-group form-inline">
                                            <label for="agn_company_name" class="col-form-label mr-auto">Company name</label>
                                            <div class="col-md-8 p-0">
                                                <div class="ui fluid search selection dropdown mt-1" style="left: 10px">
                                                    <input type="hidden" name="agn_id" onchange="get_agent_information();" value="<?php echo $arr_agent[0]->agn_id?>">
                                                    <i class="dropdown icon"></i>
                                                    <div class="default text">Select agent</div>
                                                    <div class="menu">
                                                        <?php for ($i = 0; $i < count($arr_agn); $i++) { ?>
                                                            <div class="item" data-value="<?php echo $arr_agn[$i]->agn_id ?>"><?php echo $arr_agn[$i]->agn_company_name;?>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="item" data-value="new">+ New agent</div>
                                                    </div>
                                                </div>
                                                <label class="error"></label>
                                                <input class="form-control mt-5" name="agn_company_name" id="agn_company_name" placeholder="Company name" hidden>
                                                <label class="error"><?php echo '<br><br>' . $_SESSION['agn_company_name_error']?></label>
                                            </div>
                                        </div>

                                        <!-- Company location -->
                                        <div class="form-group">
                                            <label for="agn_address">Company location</label>
                                            <textarea type="text" class="form-control" id="agn_address" name="agn_address" placeholder="Company location" rows="5"><?php echo $obj_agent[0]->agn_address ?></textarea>
                                        </div>

                                        <!-- Tax number -->
                                        <div class="form-group form-inline mt-2">
                                            <label for="agn_tax" class="col-form-label mr-auto">Tax number</label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="agn_tax" name="agn_tax" placeholder="Tax number" value="<?php echo $obj_agent[0]->agn_tax ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-lg-6">
                                        <label class="mt-3 mb-3"><b><h3>Contact</h3></b></label>

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
                                            <label for="agn_email" class="col-form-label mr-auto">Email</label>
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
                <div class="row mx-5" id="customer_section">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Customer</div>
                            </div>

                            <div class="card-body">
                                <div class="row px-5">
                                    <div class="col-md-6 col-lg-6">
                                        <label class="mt-3 mb-3"><b><h3>Company</h3></b></label>

                                        <!-- Company name -->
                                        <div class="form-group form-inline">
                                            <label for="cus_company_name" class="col-form-label mr-auto">Company name</label>
                                            <div class="col-md-8 p-0">
                                                <div class="ui fluid search selection dropdown mt-1" style="left: 10px">
                                                    <input type="hidden" name="cus_id" onchange="get_customer_information();" value="<?php echo $obj_customer[0]->cus_id?>">
                                                    <i class="dropdown icon"></i>
                                                    <div class="default text">Select customer</div>
                                                    <div class="menu">
                                                        <?php for ($i = 0; $i < count($arr_cus); $i++) { ?>
                                                            <div class="item" data-value="<?php echo $arr_cus[$i]->cus_id ?>"><?php echo $arr_cus[$i]->cus_company_name;?>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="item" data-value="new">+ New customer</div>
                                                    </div>
                                                </div>
                                                <label class="error"></label>
                                                <input class="form-control mt-5" name="cus_company_name" id="cus_company_name" placeholder="Company name" hidden>
                                                <label class="error"><?php echo '<br><br>' . $_SESSION['cus_company_name_error']?></label>
                                            </div>
                                        </div>
                                        <!-- Branch -->
                                        <div class="form-group form-inline">
                                            <label for="cus_branch" class="col-form-label mr-auto">Branch</label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="cus_branch" name="cus_branch" placeholder="Branch" value="<?php echo $obj_customer[0]->cus_branch ?>">
                                                <label class="error"><?php echo $_SESSION['cus_branch_error'] ?></label>
                                            </div>
                                        </div>


                                        <!-- Company location -->
                                        <div class="form-group">
                                            <label for="cus_address">Company location</label>
                                            <textarea type="text" class="form-control" id="cus_address" name="cus_address" placeholder="Company location" rows="5"><?php echo $obj_customer[0]->cus_address ?></textarea>
                                        </div>


                                        <!-- Tax number -->
                                        <div class="form-group form-inline mt-2">
                                            <label for="agn_tax" class="col-form-label mr-auto">Tax number</label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="cus_tax" name="cus_tax" placeholder="Tax number" value="<?php echo $obj_customer[0]->cus_tax ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-lg-6">
                                        <label class="mt-3 mb-3"><b><h3>Contact</h3></b></label>

                                        <!-- Responsible person -->
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Responsible person
                                                (Representative)</label>
                                        </div>

                                        <!-- First Name -->
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">First name</label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="cus_firstname" name="cus_firstname" placeholder="First name" value="<?php echo $obj_customer[0]->cus_firstname ?>">
                                            </div>
                                        </div>

                                        <!-- Last Name -->

                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Last name</label>
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
                                            <label for="agn_email" class="col-form-label mr-auto">Email</label>
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
                <div class="card-action"  id="car_action">
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

            <!--
            /*
            * hilight_section
            * go to hilight section
            * @input section
            * @output go to hilight section
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function hilight_section(section) {
                let sections = ['service', 'con', 'agent', 'customer'];
                $('h3.' + section).addClass('active');

                for (let i = 0; i < sections.length; i++) {
                    if (section != sections[i]) {
                        $('h3.' + sections[i]).removeClass('active');
                    }
                }
            }

            <!--
            /*
            * show_all_form
            * show all form
            * @input -
            * @output show all form
            * @author
            * @Create Date
            * @Update Date
            */
            -->
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

            <!--
            /*
            * check_service_form
            * check service form contain error or not
            * @input -
            * @output check service form contain error or not
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function check_service_form() {
                // $('#service_section label.error').remove();
                if ($('#service_section .form-control.error').length != 0) {
                    // console.log('service' + $('#service_section .error').length);
                    $('#service_step').addClass("false");
                } else {
                    $('#service_step').addClass("completed");
                }
            }

            <!--
            /*
            * check_container_form
            * check container form contain error or not
            * @input -
            * @output check container form contain error or not
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function check_container_form() {
                // $('#container_section label.error').remove();
                if ($('#container_section .form-control.error').length > 0) {
                    console.log('container' + $('#container_section .error').length);
                    $('#container_step').addClass("false");
                } else {
                    $('#container_step').addClass("completed");
                }
            }

            <!--
            /*
            * check_agent_form
            * check agent form contain error or not
            * @input -
            * @output check agent form contain error or not
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function check_agent_form() {
                // $('#agent_section label.error').remove();
                if ($('#agent_section .form-control.error').length > 0) {
                    // console.log('service' + $('#service_section .error').length);
                    $('#agent_step').addClass("false");
                } else {
                    $('#agent_step').addClass("completed");
                }
            }

            <!--
            /*
            * check_customer_form
            * check customer form contain error or not
            * @input -
            * @output check customer form contain error or not
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function check_customer_form() {
                // $('#customer_section label.error').remove();
                if ($('#customer_section .form-control.error').length > 0) {
                    console.log('customer' + $('#customer_section .error').length);
                    $('#customer_step').addClass("false");
                } else {
                    $('#customer_step').addClass("completed");
                }
            }

            <!--
            /*
            * check_all_form
            * check form contain error or not
            * @input -
            * @output check form contain error or not
            * @author
            * @Create Date
            * @Update Date
            */
            -->
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

            <!--
            /*
            * show_service_form
            * show service section form
            * @input -
            * @output show service section form
            * @author
            * @Create Date
            * @Update Date
            */
            -->
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

            <!--
            /*
            * show_container_form
            * show container section form
            * @input -
            * @output show container section form
            * @author
            * @Create Date
            * @Update Date
            */
            -->
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

            <!--
            /*
            * show_agent_form
            * show agent section form
            * @input -
            * @output show agent section form
            * @author
            * @Create Date
            * @Update Date
            */
            -->
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

            <!--
            /*
            * show_customer_form
            * show customer section form
            * @input -
            * @output show customer section form
            * @author
            * @Create Date
            * @Update Date
            */
            -->
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

            <!--
            /*
            * get_car_information
            * get car information by driver
            * @input status
            * @output get car information by driver
            * @author
            * @Create Date
            * @Update Date
            */
            -->
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

            <!--
            /*
            * open_disable
            * toggle dropdown car
            * @input status
            * @output get toggle dropdown car
            * @author
            * @Create Date
            * @Update Date
            */
            -->
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

            <!--
            /*
            * show_driver_information
            * get car by driver
            * @input driver, status
            * @output get car by driver
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function show_driver_information(driver, status) {
                if (status == 1) {
                    $('select[name="ser_car_id_in"]').val(driver[0]['dri_car_id']);
                } else {
                    $('select[name="ser_car_id_out"]').val(driver[0]['dri_car_id']);
                }
            }

            <!--
            /*
            * clear_driver_information
            * clear driver information
            * @input -
            * @output clear driver information
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function clear_driver_information() {
                $('select[name="ser_car_id_in"]').val('');
                $('select[name="ser_car_id_out"]').val('');
            }

            <!--
            /*
            * get_container_information
            * get container information when select container
            * @input -
            * @output get container information when select container
            * @author
            * @Create Date
            * @Update Date
            */
            -->
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

            <!--
            /*
            * valid_container_error
            * valid container error
            * @input -
            * @output valid container error
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function valid_container_error() {
                $('#container_section input.error').removeClass('error');
                $('#container_section textarea.error').removeClass('error');
            }

            <!--
            /*
            * show_container_information
            * show container information in container section form
            * @input container information
            * @output show container information in container section form
            * @author
            * @Create Date
            * @Update Date
            */
            -->
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

            <!--
            /*
            * clear_container_information
            * clear input in container section form
            * @input -
            * @output clear input in container section form
            * @author
            * @Create Date
            * @Update Date
            */
            -->
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

            <!--
            /*
            * get_size_information
            * get size information when select size
            * @input -
            * @output get size information when select size
            * @author
            * @Create Date
            * @Update Date
            */
            -->
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



            function show_size_information(size_height_out, size_width_out, size_length_out) {
                console.log(size_height_out);
                $('input[name="size_height_out"]').val(size_height_out);
                $('input[name="size_width_out"]').val(size_width_out);
                $('input[name="size_length_out"]').val(size_length_out);
            }

            <!--
            /*
            * get_agent_information
            * show agent information when select agent
            * @input -
            * @output show agent information when select agent
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function get_agent_information() {
                $('#agent_section label.error').remove();
                remove_form_attr('readonly', '#agent_section');
                let agn_id = $('#agent_section input[name="agn_id"]').val();

                console.log(agn_id);
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

            <!--
            /*
            * valid_agent_error
            * valid agent error
            * @input -
            * @output valid agent error
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function valid_agent_error() {
                $('#agent_section input.error').removeClass('error');
                $('#agent_section textarea.error').removeClass('error');
            }

            <!--
            /*
            * show_agent_information
            * show agent information when select agent
            * @input agent
            * @output show agent information when select agent
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function show_agent_information(agent) {
                $('input[name="agn_id"]').val(agent[0]['agn_id']);
                $('textarea[name="agn_address"]').val(agent[0]['agn_address']);
                $('input[name="agn_tax"]').val(agent[0]['agn_tax']);
                $('input[name="agn_firstname"]').val(agent[0]['agn_firstname']);
                $('input[name="agn_lastname"]').val(agent[0]['agn_lastname']);
                $('input[name="agn_tel"]').val(agent[0]['agn_tel']);
                $('input[name="agn_email"]').val(agent[0]['agn_email']);
            }

            <!--
            /*
            * clear_agent_information
            * clear agent information
            * @input -
            * @output clear agent information
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function clear_agent_information() {
                $('input[name="agn_id"]').val('');
                $('textarea[name="agn_address"]').val('');
                $('input[name="agn_tax"]').val('');
                $('input[name="agn_firstname"]').val('');
                $('input[name="agn_lastname"]').val('');
                $('input[name="agn_tel"]').val('');
                $('input[name="agn_email"]').val('');
            }

            <!--
            /*
            * remove_form_attr
            * remove readonly from input
            * @input attr, target
            * @output remove readonly from input
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function remove_form_attr(attr, target) {
                $(target + ' *[readonly]').removeAttr(attr);
            }

            <!--
            /*
            * get_customer_information
            * get customer information when select customer
            * @input -
            * @output get customer information when select customer
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function get_customer_information() {
                // Remove jQuery validation error
                $('#customer_section label.error').remove();

                // Remove readonly in customer_section div
                remove_form_attr('readonly', '#customer_section');

                let cus_id = $('#customer_section input[name="cus_id"]').val();

                if (cus_id != '' && cus_id != "new") {
                    $('input[name="cus_company_name"]').prop('hidden', true);
                    console.log(cus_id);
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

            <!--
            /*
            * valid_customer_error
            * valid customer error
            * @input -
            * @output valid customer error
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function valid_customer_error() {
                $('#customer_section input.error').removeClass('error');
                $('#customer_section textarea.error').removeClass('error');
            }

            <!--
            /*
            * show_customer_information
            * show customer information when select customer
            * @input customer information
            * @output show customer information when select customer
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function show_customer_information(customer) {
                $('input[name="cus_branch"]').val(customer[0]['cus_branch']);
                $('textarea[name="cus_address"]').val(customer[0]['cus_address']);
                $('input[name="cus_tax"]').val(customer[0]['cus_tax']);
                $('input[name="cus_firstname"]').val(customer[0]['cus_firstname']);
                $('input[name="cus_lastname"]').val(customer[0]['cus_lastname']);
                $('input[name="cus_tel"]').val(customer[0]['cus_tel']);
                $('input[name="cus_email"]').val(customer[0]['cus_email']);
            }

            <!--
            /*
            * clear_customer_information
            * clear customer information
            * @input customer information
            * @output clear customer information
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function clear_customer_information() {
                $('input[name="cus_branch"]').val('');
                $('textarea[name="cus_address"]').val('');
                $('input[name="cus_tax"]').val('');
                $('input[name="cus_firstname"]').val('');
                $('input[name="cus_lastname"]').val('');
                $('input[name="cus_tel"]').val('');
                $('input[name="cus_email"]').val('');
            }

            <!--
            /*
            * validate_form
            * validate form contain error or not
            * @input -
            * @output validate form contain error or not
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function validate_form() {
                const con_id_pass = check_con_id();
                const agn_id_pass = check_agn_id();
                const cus_id_pass = check_cus_id();
                return con_id_pass && agn_id_pass && cus_id_pass;
            }

            <!--
            /*
            * check_con_id
            * check select container or not
            * @input -
            * @output check select container or not
            * @author
            * @Create Date
            * @Update Date
            */
            -->
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

            <!--
            /*
            * check_agn_id
            * check select agent or not
            * @input -
            * @output check select agent or not
            * @author
            * @Create Date
            * @Update Date
            */
            -->
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

            <!--
            /*
            * check_agn_id
            * check select customer or not
            * @input -
            * @output check select customer or not
            * @author
            * @Create Date
            * @Update Date
            */
            -->
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

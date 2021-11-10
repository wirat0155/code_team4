<style>
    .ms-md-30 {
        margin-left: 0%;
        text-align: left;
    }
    .md-none {
        display: none;
    }
    .md-center {
        text-align: left;
    }
    @media only screen and (min-width: 768px) {
        .ms-md-30 {
            margin-left: 30%;
            text-align: center;
        }
        .md-none {
            display: block;
        }
        .md-center {
            text-align: center;
        }
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
    input.error, select.error, textarea.error, .form-control[readonly].error {
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
            <div class="pl-4 mt-4 page-header mb-0">
                <h4 class="page-title">ADD SERVICE</h4>
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
                    <a class="cl-blue" href="<?php echo base_url() . '/Service_show/service_show_ajax'?>">Service information</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add service</a>
                </li>
            </ul>


            <div class="stepper-wrapper mt-4">
                <div class="stepper-item">
                    <div class="step-counter" id="service_step" onclick="show_service_form()"><i class="fas fa-warehouse"></i></div>
                    <div class="step-name">Service</div>
                </div>
                <div class="stepper-item">
                    <div class="step-counter" onclick="show_container_form() " id="container_step"><i class="fas fa-truck-loading"></i></div>
                    <div class="step-name">Container</div>
                </div>
                <div class="stepper-item">
                    <div class="step-counter" onclick="show_agent_form()" id="agent_step"><i class="fas fa-user-friends"></i></div>
                    <div class="step-name">Agent</div>
                </div>
                <div class="stepper-item">
                    <div class="step-counter" onclick="show_customer_form()" id="customer_step"><i class="fas fa-user-alt"></i></div>
                    <div class="step-name">Customer</div>
                </div>
            </div>

            <form id="service_form" action="<?php echo base_url() . '/Service_input/service_insert' ?>" method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div id="service_section">
                                <div class="card-header">
                                    <div class="card-title">Service Information</div>
                                </div>
                                <div class="card-body">
                                    <h3>1. Import</h3>
                                    <input type="checkbox" style="margin-left: 50%;" id="open" onclick="open_disable(1)"> Use not a regular car
                                    <div class="row">
                                        <!-- Importer -->
                                        <div class="col-md-2" style="margin-left: 6%;">
                                            <div class="form-group">
                                                <label for="ser_dri_id_in">Importer</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control" name="ser_dri_id_in" onclick="get_car_information(1)">
                                                <?php for ($i = 0; $i < count($arr_driver); $i++) { ?>
                                                    <option value="<?php echo $arr_driver[$i]->dri_id ?>" <?php if ($obj_service[0]->ser_dri_id_in == $arr_driver[$i]->dri_id) echo "selected" ?>>
                                                        <?php echo $arr_driver[$i]->dri_name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <!-- Importer car -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="ser_car_id_in">Importer car</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control" name="ser_car_id_in" disabled>
                                                <?php for ($i = 0; $i < count($arr_car); $i++) { ?>
                                                    <option value="<?php echo $arr_car[$i]->car_id ?>" <?php if ($arr_driver[0]->dri_car_id == $arr_car[$i]->car_id) echo "selected" ?>>
                                                        <?php echo 'คันที่ ' . $arr_car[$i]->car_number . ' ทะเบียน ' . $arr_car[$i]->car_code ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Arrival date  -->
                                        <div class="col-md-2" style="margin-left: 6%;">
                                            <div class="form-group">
                                                <label for="ser_arrivals_date">Arrival date </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="datetime-local" class="form-control" id="ser_arrivals_date" name="ser_arrivals_date" placeholder="Arrival date">
                                        </div>

                                        <!-- Cut-off date  -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="ser_departure_date">Cut-off date </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="datetime-local" class="form-control" id="ser_departure_date" name="ser_departure_date" placeholder="Cut-off date">
                                        </div>
                                    </div>

                                    <h3>2. Export</h3>
                                    <input type="checkbox" style="margin-left: 50%;" id="open2" onclick="open_disable(2)"> Use not a regular car
                                    <div class="row">
                                        <!-- Exporter -->
                                        <div class="col-md-2" style="margin-left: 6%;">
                                            <div class="form-group">
                                                <label for="ser_dri_id_out">Exporter</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control" name="ser_dri_id_out" onclick="get_car_information(2)">
                                                <?php for ($i = 0; $i < count($arr_driver); $i++) { ?>
                                                    <option value="<?php echo $arr_driver[$i]->dri_id ?>" <?php if ($obj_service[0]->ser_dri_id_out == $arr_driver[$i]->dri_id) echo "selected" ?>>
                                                        <?php echo $arr_driver[$i]->dri_name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <!-- Exporter car -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="ser_car_id_out">Exporter car</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control" name="ser_car_id_out" disabled>
                                                <?php for ($i = 0; $i < count($arr_car); $i++) { ?>
                                                    <option value="<?php echo $arr_car[$i]->car_id ?>" <?php if ($arr_driver[0]->dri_car_id == $arr_car[$i]->car_id) echo "selected" ?>>
                                                        <?php echo 'คันที่ ' . $arr_car[$i]->car_number . ' ทะเบียน ' . $arr_car[$i]->car_code ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <h3>3. Location</h3>
                                    <div class="row">
                                        <!-- Arrivals location  -->
                                        <div class="col-md-2" style="margin-left: 6%;">
                                            <div class="form-group">
                                                <label for="ser_arrivals_location">Arrivals location </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" id="ser_arrivals_location" name="ser_arrivals_location" placeholder="Arrivals location ">
                                        </div>

                                        <!-- Departure location   -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="ser_departure_location">Departure location </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" id="ser_departure_location" name="ser_departure_location" placeholder="Departure location  ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="container_section" style="display: none">
                                <div class="card-header">
                                    <div class="card-title">Container Information</div>
                                </div>
                                <div class="card-body">
                                    <h3>1. Container information</h3>
                                    <div class="row">
                                        <!-- Container number -->
                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="con_number">Container number</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-right: 10%;">
                                            <div class="ui fluid search selection dropdown mt-1" style="left: 25px; width: 96.3%">
                                                <input type="hidden" name="con_id" onchange="get_container_information(); check_con_id();">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">Select container</div>
                                                <div class="menu">
                                                    <?php for ($i = 0; $i < count($arr_con); $i++) { ?>
                                                        <div class="item" data-value="<?php echo $arr_con[$i]->con_id ?>"><?php echo $arr_con[$i]->con_number;?>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="item" data-value="new">+ New container</div>
                                                </div>
                                            </div>
                                            <label class="error"></label>
                                            <input class="form-control mt-5" name="con_number" id="con_number" placeholder="ABCD 12345 0" hidden pattern="[A-Za-z]{4} [0-9]{5} 0">

                                            <label class="error"><?php if ($_SESSION['con_number_error'] != '') echo '<br/><br/>' . $_SESSION['con_number_error']?></label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Container type -->
                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="con_cont_id">Container type</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-right: 10%;">
                                            <select class="form-control" name="con_cont_id" readonly>
                                                <?php for ($i = 0; $i < count($arr_container_type); $i++) { ?>
                                                    <option value="<?php echo $arr_container_type[$i]->cont_id ?>">
                                                        <?php echo $arr_container_type[$i]->cont_name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Container status -->
                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="con_stac_id">Container status</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-right: 10%;">
                                            <select class="form-control" name="con_stac_id" readonly>
                                                <?php for ($i = 0; $i < count($arr_status_container); $i++) { ?>
                                                    <option value="<?php echo $arr_status_container[$i]->stac_id ?>"
                                                    <?php if ($arr_status_container[$i]->stac_name == 'Import') echo ' selected'?>>
                                                        <?php echo $arr_status_container[$i]->stac_name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <h3>2. Weight</h3>
                                    <div class="row">
                                        <!-- Max weight (t) -->
                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="con_max_weight">Max weight (t)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-right: 10%;">
                                            <input type="number" class="form-control" id="con_max_weight" name="con_max_weight" placeholder="10" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Tare weight (t) -->
                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="con_tare_weight">Tare weight (t)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control" id="con_tare_weight" name="con_tare_weight" placeholder="10" readonly>
                                        </div>

                                        <!-- Net weight (t) -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="con_net_weight">Net weight (t)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control" id="con_net_weight" name="con_net_weight" placeholder="10" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Current weight (t) -->
                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="ser_weight">Current weight (t)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control" id="ser_weight" name="ser_weight" placeholder="10" readonly>
                                        </div>

                                        <!-- Cube(CBM) -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="con_cube">Cube (cbm)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control" id="con_cube" name="con_cube" placeholder="10" readonly>
                                        </div>
                                    </div>

                                    <h3>3. Size</h3>
                                    <div class="row">
                                        <!-- Container size (t) -->
                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="con_size_id">Container size</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-right: 10%;">
                                            <select class="form-control" name="con_size_id"
                                                onclick="get_size_information()" readonly>
                                                <?php for ($i = 0; $i < count($arr_size); $i++) { ?>
                                                <option value="<?php echo $arr_size[$i]->size_id ?>"
                                                    <?php if ($obj_container[0]->con_size_id == $arr_size[$i]->size_id) echo "selected" ?>>
                                                    <?php echo $arr_size[$i]->size_name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Width(m) -->
                                        <div class="form-group col-sm-6 col-md-2 ms-md-30">
                                            <label for="size_width_out">Width (m)</label>
                                            <input type="number" class="form-control" id="size_width_out"
                                                name="size_width_out" placeholder="10" readonly>
                                        </div>
                                        <div class="col-md-0">
                                            <label style="margin-top: 45px;" class="md-none"> X </label>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-2 md-center">
                                            <label for="size_length_out">Length (m)</label>
                                            <input type="number" class="form-control" id="size_length_out"
                                                name="size_length_out" placeholder="10" readonly>
                                        </div>
                                        <div class="col-md-0">
                                            <label style="margin-top: 45px;" class="md-none"> X </label>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-2 md-center">
                                            <label for="size_height_out">Height (m)</label>
                                            <input type="number" class="form-control" id="size_height_out"
                                                name="size_height_out" placeholder="10" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="agent_section" style="display: none">
                                <div class="card-header">
                                    <div class="card-title">Agent Information</div>
                                </div>
                                <div class="card-body">
                                    <h3>1. Agent information</h3>
                                    <div class="row">
                                        <!-- Container number -->
                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="agn_company_name">Company name </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-right: 10%;">
                                            <div class="ui fluid search selection dropdown mt-1" style="left: 25px; width: 96.3%">
                                                <input type="hidden" name="agn_id" onchange="get_agent_information(); check_agn_id();">
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

                                            <label class="error"><?php if ($_SESSION['agn_company_name_error'] != '') echo '<br/><br/>' . $_SESSION['agn_company_name_error']?></label>
                                        </div>

                                        <!-- Agent form with readonly -->
                                        <?php 
                                        $type = 2;
                                        require_once dirname(__FILE__) . '/form/agent_form.php';
                                        ?>
                                        
                            <div id="customer_section" style="display: none">
                                <div class="card-header">
                                    <div class="card-title">Customer Information</div>
                                </div>
                                <div class="card-body">
                                    <h3>1. Customer information</h3>
                                    <div class="row">
                                        <!-- Container number -->
                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="cus_company_name">Company name </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6" style="margin-right: 10%;">

                                            <div class="ui fluid search selection dropdown mt-1" style="left: 25px; width: 96.3%">
                                                <input type="hidden" name="cus_id" onchange="get_customer_information(); check_cus_id();">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">Select customer</div>
                                                <div class="menu">
                                                    <?php for ($i = 0; $i < count($arr_cus); $i++) { ?>
                                                        <div class="item" data-value="<?php echo $arr_cus[$i]->cus_id ?>"><?php echo $arr_cus[$i]->cus_company_name;
                                                        if ($arr_cus[$i]->cus_branch) {
                                                            echo " สาขา" . $arr_cus[$i]->cus_branch;
                                                        }
                                                        ?>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="item" data-value="new">+ New customer</div>
                                                </div>
                                            </div>
                                            <label class="error"></label>
                                            <input class="form-control mt-5" name="cus_company_name" id="cus_company_name" placeholder="Company name" hidden>
                                            <label class="error"><?php if ($_SESSION['cus_company_name_error'] != '') echo '<br/><br/>' . $_SESSION['cus_company_name_error']?></label>
                                        </div>

                                        <style>
                                            .branch-div {
                                                margin-top: 35px;
                                            }
                                            @media only screen and (min-width: 768px) {
                                                .branch-div {
                                                    margin-top: 0px;
                                                }
                                            }
                                        </style>

                                        <!-- For form with readonly -->
                                        <?php
                                        $type = 2; 
                                        require_once dirname(__FILE__) . '/form/customer_form.php';
                                        ?>

                            <div class="card-action" id="first_from_action">
                                <input type="button" class="ui button" value="Cancel" onclick="window.history.back();">
                                <button type="button" class="ui right labeled primary icon button pull-right" id="next_sub" onclick="show_container_form()">
                                    <i class="right arrow icon"></i>
                                    Next
                                </button>
                            </div>
                            <div class="card-action" id="container_from_action" style="display: none">
                                <button type="button" class="ui labeled icon primary basic button" onclick="show_service_form()">
                                    <i class="left arrow icon"></i>
                                    Prev
                                </button>
                                <button type="button" class="ui right labeled primary icon button pull-right" onclick="show_agent_form()">
                                    <i class="right arrow icon"></i>
                                    Next
                                </button>
                            </div>
                            <div class="card-action" id="agent_from_action" style="display: none">
                                <button type="button" class="ui labeled icon primary basic button" onclick="show_container_form()">
                                    <i class="left arrow icon"></i>
                                    Prev
                                </button>
                                <button type="button" class="ui right labeled primary icon button pull-right" onclick="show_customer_form()">
                                    <i class="right arrow icon"></i>
                                    Next
                                </button>
                            </div>
                            <div class="card-action" id="last_from_action" style="display: none">
                                <button type="button" class="ui labeled icon primary basic button" onclick="show_agent_form()">
                                    <i class="left arrow icon"></i>
                                    Prev
                                </button>
                                <button onclick="show_all_form();" type="submit" class="ui positive button pull-right">
                                    <i class="plus icon"></i>
                                    Add service
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script>
            $(document).ready(function() {
                // Get section error code form controller
                let section_error = '<?php echo $section_error?>';

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

            <!--
            /*
            * show_size_information
            * show size information when select size
            * @input -
            * @output show size information when select size
            * @author
            * @Create Date
            * @Update Date
            */
            -->
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
                const con_id_pass =  check_con_id();
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
                }
                else {
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
                }
                else {
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
                }
                else {
                    $('#customer_section input.search').removeClass('error');
                    cus_id_warning.removeClass('error');
                    cus_id_warning.html('');
                    return true;
                }
            }
        </script>
    </div>

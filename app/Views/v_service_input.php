<style>
    .stepper-wrapper {
        margin-top: auto;
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .stepper-item {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        flex: 1;

        @media (max-width: 768px) {
            font-size: 12px;
        }
    }

    .stepper-item::before {
        position: absolute;
        content: "";
        border-bottom: 2px solid #ccc;
        width: 100%;
        top: 20px;
        left: -50%;
        z-index: 2;
    }

    .stepper-item::after {
        position: absolute;
        content: "";
        border-bottom: 2px solid #ccc;
        width: 100%;
        top: 20px;
        left: 50%;
        z-index: 2;
    }

    .stepper-item .step-counter {
        position: relative;
        z-index: 5;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #ccc;
        margin-bottom: 6px;
        cursor: pointer;
    }

    .step-counter.active {
        background-color: #041F47;
        color: #FFFFFF;
    }

    .step-counter.false {
        background-color: #FF2C2C;
        color: #FFFFFF;
    }

    .step-counter.completed {
        background-color: #0ec20e;
        color: #FFFFFF;
    }

    .stepper-item.completed::after {
        position: absolute;
        content: "";
        border-bottom: 2px solid #E6EBF3;
        width: 100%;
        top: 20px;
        left: 50%;
        z-index: 3;
    }

    .stepper-item:first-child::before {
        content: none;
    }

    .stepper-item:last-child::after {
        content: none;
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
                    <a href="<?php echo base_url() . '/Dashboard/dashboard_show' ?>">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <u><a href="<?php echo base_url() . '/Service_show/service_show_ajax' ?>" style="color: #1244B9;">Service information</a></u>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    Add service
                </li>
            </ul>


            <div class="stepper-wrapper">
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

            <form id="add_service_form" action="<?php echo base_url() . '/Service_input/service_insert' ?>" method="POST">
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
                                        <div class="col-md-2" style="margin-left: 15%;">
                                            <div class="form-group">
                                                <label for="con_number">Container number</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-right: 10%;">
                                            <select class="form-control" name="con_id" onclick="get_container_information()">
                                                <?php for ($i = 0; $i < count($arr_con); $i++) { ?>
                                                    <option value="<?php echo $arr_con[$i]->con_id ?>">
                                                        <?php echo $arr_con[$i]->con_number ?></option>
                                                <?php } ?>
                                                <option value="new">ตู้ใหม่</option>
                                            </select>
                                            <input class="form-control" name="con_number" pattern="[A-Za-z]{4} [0-9]{5} 0" placeholder="ABCD 12345 0" hidden>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Container type -->
                                        <div class="col-md-2" style="margin-left: 15%;">
                                            <div class="form-group">
                                                <label for="con_cont_id">Container type</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-right: 10%;">
                                            <select class="form-control" name="con_cont_id">
                                                <?php for ($i = 0; $i < count($arr_container_type); $i++) { ?>
                                                    <option value="<?php echo $arr_container_type[$i]->cont_id ?>">
                                                        <?php echo $arr_container_type[$i]->cont_name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Container status -->
                                        <div class="col-md-2" style="margin-left: 15%;">
                                            <div class="form-group">
                                                <label for="con_stac_id">Container status</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-right: 10%;">
                                            <select class="form-control" name="con_stac_id">
                                                <?php for ($i = 0; $i < count($arr_status_container); $i++) { ?>
                                                    <option value="<?php echo $arr_status_container[$i]->stac_id ?>">
                                                        <?php echo $arr_status_container[$i]->stac_name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <h3>2. Weight</h3>
                                    <div class="row">
                                        <!-- Max Weight (t) -->
                                        <div class="col-md-2" style="margin-left: 15%;">
                                            <div class="form-group">
                                                <label for="con_max_weight">Max Weight (t)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-right: 10%;">
                                            <input type="number" class="form-control" id="con_max_weight" name="con_max_weight" placeholder="10">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Tare Weight (t) -->
                                        <div class="col-md-2" style="margin-left: 15%;">
                                            <div class="form-group">
                                                <label for="con_tare_weight">Tare Weight (t)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control" id="con_tare_weight" name="con_tare_weight" placeholder="10">
                                        </div>

                                        <!-- Net Weight (t) -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="con_net_weight">Net Weight (t)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control" id="con_net_weight" name="con_net_weight" placeholder="10">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Current Weight (t) -->
                                        <div class="col-md-2" style="margin-left: 15%;">
                                            <div class="form-group">
                                                <label for="ser_weight">Current Weight (t)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control" id="ser_weight" name="ser_weight" placeholder="10">
                                        </div>

                                        <!-- Cube(CBM) -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="con_cube">Cube (CBM)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control" id="con_cube" name="con_cube" placeholder="10">
                                        </div>
                                    </div>

                                    <h3>3. Size</h3>
                                    <div class="row">
                                        <!-- Max Weight (t) -->
                                        <div class="col-md-2" style="margin-left: 15%;">
                                            <div class="form-group">
                                                <label for="con_size_id">Container size</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-right: 10%;">
                                            <select class="form-control" name="con_size_id" oninput="get_size_information()">
                                                <?php for ($i = 0; $i < count($arr_size); $i++) { ?>
                                                    <option value="<?php echo $arr_size[$i]->size_id ?>" <?php if ($obj_container[0]->con_size_id == $arr_size[$i]->size_id) echo "selected" ?>>
                                                        <?php echo $arr_size[$i]->size_name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Width(m) -->
                                        <div class="form-group col-sm-6 col-md-2" style="text-align: center; margin-left: 30%;">
                                            <label for="size_width_out">Width (m)</label>
                                            <input type="number" class="form-control" id="size_width_out" name="size_width_out" placeholder="10">
                                        </div>
                                        <div class="col-md-0">
                                            <label style="margin-top: 45px;"> X </label>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-2" style="text-align: center;">
                                            <label for="size_length_out">Length (m)</label>
                                            <input type="number" class="form-control" id="size_length_out" name="size_length_out" placeholder="10">
                                        </div>
                                        <div class="col-md-0">
                                            <label style="margin-top: 45px;"> X </label>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-2" style="text-align: center;">
                                            <label for="size_height_out">Height (m)</label>
                                            <input type="number" class="form-control" id="size_height_out" name="size_height_out" placeholder="10">
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
                                            <select class="form-control" name="agn_id" onclick="get_agent_information()">
                                                <?php for ($i = 0; $i < count($arr_agn); $i++) { ?>
                                                    <option value="<?php echo $arr_agn[$i]->agn_id ?>">
                                                        <?php echo $arr_agn[$i]->agn_company_name ?></option>
                                                <?php } ?>
                                                <option value="new">เอเย่นต์ใหม่</option>
                                            </select>
                                            <input class="form-control" name="agn_company_name" placeholder="Company name" hidden>
                                        </div>

                                        <?php echo show_agent_form(); ?>
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
                                            <select class="form-control" name="cus_id" onclick="get_customer_information()">
                                                <?php for ($i = 0; $i < count($arr_cus); $i++) { ?>
                                                    <option value="<?php echo $arr_cus[$i]->cus_id ?>" <?php if ($obj_customer[0]->cus_id == $arr_cus[$i]->cus_id) echo "selected" ?>>
                                                        <?php echo $arr_cus[$i]->cus_company_name ?></option>
                                                <?php } ?>
                                                <option value="new">ลูกค้าใหม่</option>
                                            </select>
                                            <input class="form-control" name="cus_company_name" placeholder="Company name" hidden>
                                        </div>

                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="cus_branch">Branch <p style="color: #0F7EEA;">(Optional)</p></label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" id="cus_branch" name="cus_branch" placeholder="Branch">
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="cus_tax">Tax number </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" id="cus_tax" name="cus_tax" placeholder="12345678">
                                        </div>


                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="cus_address">Company location </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-right: 10%;">
                                            <textarea type="text" class="form-control" id="cus_address" name="cus_address" placeholder="Company location"></textarea>
                                        </div>
                                    </div>

                                    <h3>2. Contact information</h3>
                                    <div class="row">
                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="cus_firstname">First name </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-right: 10%;">
                                            <input type="text" class="form-control" id="cus_firstname" name="cus_firstname" placeholder="First name">
                                        </div>
                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="cus_lastname">Last name </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-right: 10%;">
                                            <input type="text" class="form-control" id="cus_lastname" name="cus_lastname" placeholder="Last name">
                                        </div>
                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="cus_tel">Contact number </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group" style="margin-right: 10%;">
                                                <div class="input-group-prepend ">
                                                    <span class="input-group-text "><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="tel" class="form-control" id="cus_tel" name="cus_tel" placeholder="xxx-xxx-xxxx ">
                                            </div>
                                        </div>
                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="cus_email">Email </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group" style="margin-right: 10%;">
                                                <div class="input-group-prepend ">
                                                    <span class="input-group-text "><i class="fas fa-envelope"></i></span>
                                                </div>
                                                <input type="email" class="form-control" id="cus_email" name="cus_email" placeholder="example@gmail.com">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



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
                $('#service_step').click();
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
                $('#service_section label.error').remove();
                if ($('#service_section .error').length > 0) {
                    // console.log('service' + $('#service_section .error').length);
                    $('#service_step').addClass("false");
                } else {
                    $('#service_step').addClass("completed");
                }
            }

            function check_container_form() {
                $('#container_section label.error').remove();
                if ($('#container_section .error').length > 0) {
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
                $('#agent_section label.error').remove();
                if ($('#agent_section .error').length > 0) {
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
                $('#customer_section label.error').remove();
                if ($('#customer_section .error').length > 0) {
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
                if ($('#service_section .error').length > 0) {
                    console.log('service' + $('#service_section .error').length);
                    $('#service_step').addClass("false");
                    $('#service_step').click();
                } else if ($('#container_section .error').length > 0) {
                    console.log('container' + $('#container_section .error').length);
                    $('#container_step').addClass("false");
                    $('#container_step').click();
                } else if ($('#agent_section .error').length > 0) {
                    console.log('agent' + $('#agent_section .error').length);
                    $('#agent_step').addClass("false");
                    $('#agent_step').click();
                } else if ($('#customer_section .error').length > 0) {
                    console.log('customer' + $('#customer_section .error').length);
                    $('#customer_step').addClass("false");
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
                let con_id = $('select[name="con_id"]').val();

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
                        }
                    });
                }
                if (con_id == "new") {
                    $('input[name="con_number"]').prop('hidden', false);
                    clear_container_information();
                }
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
                $('select[name="con_cont_id"]').val('');
                $('select[name="con_stac_id"]').val('');
                $('input[name="con_max_weight"]').val('');
                $('input[name="con_tare_weight"]').val('');
                $('input[name="con_net_weight"]').val('');
                $('input[name="con_cube"]').val('');
                $('select[name="con_size_id"]').val('');
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
                let agn_id = $('select[name="agn_id"]').val();
                // console.log("agn_name :" + agn_company_name);
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
                            console.log(data);
                            show_agent_information(data);
                        }
                    });
                }
                if (agn_id == "new") {
                    $('input[name="agn_company_name"]').prop('hidden', false);
                    clear_agent_information();
                }
            }

            // show agent information when input agn_company_name
            function show_agent_information(agent) {
                $('textarea[name="agn_address"]').val(agent[0]['agn_address']);
                $('input[name="agn_tax"]').val(agent[0]['agn_tax']);
                $('input[name="agn_firstname"]').val(agent[0]['agn_firstname']);
                $('input[name="agn_lastname"]').val(agent[0]['agn_lastname']);
                $('input[name="agn_tel"]').val(agent[0]['agn_tel']);
                $('input[name="agn_email"]').val(agent[0]['agn_email']);
            }

            // clear agent information when delete input agn_company_name
            function clear_agent_information() {
                $('textarea[name="agn_address"]').val('');
                $('input[name="agn_tax"]').val('');
                $('input[name="agn_firstname"]').val('');
                $('input[name="agn_lastname"]').val('');
                $('input[name="agn_tel"]').val('');
                $('input[name="agn_email"]').val('');
            }

            function get_customer_information() {
                let cus_id = $('select[name="cus_id"]').val();
                // console.log("agn_name :" + agn_company_name);
                if (cus_id != '' && cus_id != "new") {
                    $('input[name="cus_company_name"]').prop('hidden', true);
                    $.ajax({
                        url: '<?php echo base_url() . '/Customer_show/get_customer_ajax' ?>',
                        method: 'POST',
                        dataType: 'JSON',
                        data: {
                            cus_id: cus_id
                        },
                        success: function(data) {
                            console.log(data);
                            show_customer_information(data);
                        }
                    });
                }
                if (cus_id == "new") {
                    $('input[name="cus_company_name"]').prop('hidden', false);
                    clear_customer_information();
                }
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
        </script>
    </div>
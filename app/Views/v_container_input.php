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
    .cl-blue {
        color: #1244B9 !important;
    }
</style>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="pl-4 mt-4 page-header mb-0">
                <h4 class="page-title">ADD CONTAINER</h4>
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
                    <a class="cl-blue" href="<?php echo base_url() . '/Container_show/container_show_ajax' ?>">Container information</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add container</a>
                </li>
            </ul>
            <div class="stepper-wrapper mt-4">

                <div class="stepper-item">
                    <div class="step-counter" onclick="show_container_form() " id="container_step"><i
                            class="fas fa-truck-loading"></i></div>
                    <div class="step-name">Container</div>
                </div>
                <div class="stepper-item">
                    <div class="step-counter" onclick="show_agent_form()" id="agent_step"><i
                            class="fas fa-user-friends"></i></div>
                    <div class="step-name">Agent</div>
                </div>

            </div>



            <form id="add_container_form" action="<?php echo base_url() . '/Container_input/container_insert' ?>"
                method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div id="container_section">
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

                                            <input class="form-control" name="con_number"
                                                pattern="[A-Za-z]{4} [0-9]{5} 0" placeholder="ABCD 12345 0">
                                            <label class="error"><?php echo $_SESSION['con_number_error']?></label>
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
                                        <div class="col-md-2 input-label">
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
                                        <!-- Max weight (t) -->
                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="con_max_weight">Max weight (t)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-right: 10%;">
                                            <input type="number" class="form-control" id="con_max_weight"
                                                name="con_max_weight" placeholder="10">
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
                                            <input type="number" class="form-control" id="con_tare_weight"
                                                name="con_tare_weight" placeholder="10">
                                        </div>

                                        <!-- Net weight (t) -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="con_net_weight">Net weight (t)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control" id="con_net_weight"
                                                name="con_net_weight" placeholder="10">
                                        </div>

                                        <!-- Cube(cbm) -->
                                        <div class="col-md-2 input-label">
                                            <div class="form-group ">
                                                <label for="con_cube">Cube (cbm)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <input type=" number" class="form-control" id="con_cube" name="con_cube"
                                                placeholder="10">
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
                                                onclick="get_size_information()">
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
                                                name="size_width_out" placeholder="10">
                                        </div>
                                        <div class="col-md-0">
                                            <label style="margin-top: 45px;" class="md-none"> X </label>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-2 md-center">
                                            <label for="size_length_out">Length (m)</label>
                                            <input type="number" class="form-control" id="size_length_out"
                                                name="size_length_out" placeholder="10">
                                        </div>
                                        <div class="col-md-0">
                                            <label style="margin-top: 45px;" class="md-none"> X </label>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-2 md-center">
                                            <label for="size_height_out">Height (m)</label>
                                            <input type="number" class="form-control" id="size_height_out"
                                                name="size_height_out" placeholder="10">
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
                                            <div class="ui fluid search selection dropdown mt-1" style="left: 25px;">
                                                <input type="hidden" name="agn_name" onchange="get_agent_information()">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">Select agent</div>
                                                <div class="menu">
                                                    <?php for ($i = 0; $i < count($arr_agn); $i++) { ?>
                                                        <div class="item" value="<?php echo $arr_agn[$i]->agn_id ?>"><?php echo $arr_agn[$i]->agn_company_name;?>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="item" value="new">+ New agent</div>
                                                </div>
                                            </div>
                                            <input class="form-control mt-5" name="agn_company_name" id="agn_company_name" placeholder="Company name" hidden>
                                            
                                            <input type="hidden" name="agn_id" class="mt-5">
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

                                        <!-- 2 = form with readonly -->
                                        <?php echo show_agent_form(2); ?>
                                        <div class="card-action" id="first_from_action">
                                            <input type="button" class="ui button" value="Cancel"
                                                onclick="window.history.back();">
                                            <button type="button"
                                                class="ui right labeled primary icon button pull-right" id="next_sub"
                                                onclick="show_agent_form()">
                                                <i class="right arrow icon"></i>
                                                Next
                                            </button>
                                        </div>
                                        <div class="card-action" id="last_from_action" style="display: none">
                                            <button type="button" class="ui labeled icon primary basic button"
                                                onclick="show_container_form()">
                                                <i class="left arrow icon"></i>
                                                Prev
                                            </button>
                                            <button onclick="show_all_form();" type="submit"
                                                class="ui positive button pull-right">
                                                <i class="plus icon"></i>
                                                Add container
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </form>
        </div>

    </div>
    <script>
    $(document).ready(function() {
            $('#container_step').click();
    })

    function show_all_form(status) {
        $('#container_section').show();
        $('#agent_section').show();
        setTimeout(check_container_form);
        setTimeout(check_agent_form);
        setTimeout(check_all_form);
    }

    function show_container_form() {
        $('#container_section').show();
        $('#container_from_action').show();
        if (!$('#container_step').hasClass("active")) {
            $('#agent_step').removeClass("active");
            $('#container_step').removeClass("false");
            $('#container_step').removeClass("completed");
            $('#container_step').addClass("active");
        }

        $('#first_from_action').show();
        $('#agent_section').hide();
        $('#agent_from_action').hide();
        $('#last_from_action').hide();
    }

    function show_agent_form() {
        $('#agent_section').show();
        $('#agent_from_action').show();
        if (!$('#agent_step').hasClass("active")) {

            $('#container_step').removeClass("active");
            $('#agent_step').removeClass("false");
            $('#agent_step').removeClass("completed");
            $('#agent_step').addClass("active");
        }
        $('#first_from_action').hide();
        $('#container_section').hide();
        $('#container_from_action').hide();
        $('#last_from_action').show();
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

    function check_all_form() {

        if ($('#container_section .form-control.error').length > 0) {
            console.log('container' + $('#container_section .error').length);
            $('#container_step').addClass("false");
            $('#container_step').click();
        } else if ($('#agent_section .form-control.error').length > 0) {
            console.log('agent' + $('#agent_section .error').length);
            $('#agent_step').addClass("false");
            $('#agent_step').click();
        }
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
                show_size_information(data[0]['size_height_out'], data[0]['size_width_out'], data[0]['size_length_out']);
            }
        });
    }

    // show size information when change con_size_id dropdown
    function show_size_information(size_height_out, size_width_out, size_length_out) {
        $('input[name="size_height_out"]').val(size_height_out);
        $('input[name="size_width_out"]').val(size_width_out);
        $('input[name="size_length_out"]').val(size_length_out);
    }

    function remove_form_attr(attr, target) {
        $(target + ' *[readonly]').removeAttr(attr);
    }
    
    function get_agent_information() {
        $('#agent_section label.error').remove();
        remove_form_attr('readonly', '#agent_section');
        let agn_name = $('#agent_section div.text').text();

        if (agn_name != '' && agn_name != "+ New agent") {
            $('input[name="agn_company_name"]').prop('hidden', true);
            $.ajax({
                url: '<?php echo base_url() . '/Agent_show/get_agent_ajax' ?>',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    agn_company_name: agn_name
                },
                success: function(data) {
                    show_agent_information(data);
                }
            });
        }
        if (agn_name == "+ New agent") {
            $('input[name="agn_company_name"]').prop('hidden', false);
            clear_agent_information();
        }
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
    </script>
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
                    <a href="<?php echo base_url() . '/Service_show/service_show_ajax' ?>">Service information</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/Service_input/service_input' ?>">Add service</a>
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



            <form id="add_service_form" action="<?php echo base_url() . '/Service_input/service_insert' ?>"
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
                                        <div class="col-md-2" style="margin-left: 15%;">
                                            <div class="form-group">
                                                <label for="con_number">Container number</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-right: 10%;">

                                            <input class="form-control" name="con_number"
                                                pattern="[A-Za-z]{4} [0-9]{5} 0" placeholder="ABCD 12345 0">
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
                                            <input type="number" class="form-control" id="con_max_weight"
                                                name="con_max_weight" placeholder="10">
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
                                            <input type="number" class="form-control" id="con_tare_weight"
                                                name="con_tare_weight" placeholder="10">
                                        </div>

                                        <!-- Net Weight (t) -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="con_net_weight">Net Weight (t)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control" id="con_net_weight"
                                                name="con_net_weight" placeholder="10">
                                        </div>
                                    </div>



                                    <!-- Cube(CBM) -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="con_cube">Cube (CBM)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" id="con_cube" name="con_cube"
                                            placeholder="10">
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
                                        <select class="form-control" name="con_size_id"
                                            oninput="get_size_information()">
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
                                    <div class="form-group col-sm-6 col-md-2"
                                        style="text-align: center; margin-left: 30%;">
                                        <label for="size_width_out">Width (m)</label>
                                        <input type="number" class="form-control" id="size_width_out"
                                            name="size_width_out" placeholder="10">
                                    </div>
                                    <div class="col-md-0">
                                        <label style="margin-top: 45px;"> X </label>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-2" style="text-align: center;">
                                        <label for="size_length_out">Length (m)</label>
                                        <input type="number" class="form-control" id="size_length_out"
                                            name="size_length_out" placeholder="10">
                                    </div>
                                    <div class="col-md-0">
                                        <label style="margin-top: 45px;"> X </label>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-2" style="text-align: center;">
                                        <label for="size_height_out">Height (m)</label>
                                        <input type="number" class="form-control" id="size_height_out"
                                            name="size_height_out" placeholder="10">
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="card-action">
                            <input type="button" class="ui button" value="Cancel" onclick="window.history.back();">
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

</div>
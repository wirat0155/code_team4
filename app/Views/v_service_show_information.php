<style>
    .picture-container {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }

    .picture {
        width: 200px;
        height: 200px;
        background-color: #999999;
        border: 4px solid #CCCCCC;
        color: #FFFFFF;
        border-radius: 50%;
        margin: auto;
        overflow: hidden;
        transition: all 0.2s;
        -webkit-transition: all 0.2s;
        text-align: center;
    }

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

            <style>
                h3 {
                    color: black;
                }

                h3.active {
                    color: #0B5B84;
                    border-bottom: 2px solid #0B5B84;
                }
            </style>

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

            <style>
                .avatar {
                    margin: auto;


                }

                .avatar-img {
                    width: 150%;
                    height: 150%;
                    border: 1px solid black;

                }

                .avatar:first-child::after {
                    position: absolute;
                    content: "";
                    border-bottom: 3px solid #ccc;
                    width: 380%;
                    top: 75%;
                    left: 2%;
                    z-index: -3;
                }

                .avatar:last-child::before {
                    position: absolute;
                    content: "";
                    border-bottom: 3px solid #ccc;
                    width: 504%;
                    top: 75%;
                    left: -355%;
                    z-index: -3;
                }

                .button.green {
                    position: absolute;
                    left: 33%;
                    width: 80px;
                }

                .button.blue {
                    position: absolute;
                    right: 29%;
                    width: 80px;
                }
            </style>


            <div class="stepper-wrapper my-5">
                <div class="avatar avatar-xxl">
                    <img class="avatar-img rounded-circle" src="<?php echo base_url() . '/dri_profile_image/' . '1631801083_6d5943d455be676a2394.jfif' ?>">

                </div>
                <button class="ui green basic button" style="position: absolute;">Green</button>
                <div class="avatar avatar-xxl">
                    <img class="avatar-img rounded-circle" src="<?php echo base_url() . '/dri_profile_image/' . '1631801083_6d5943d455be676a2394.jfif' ?>">
                </div>
                <button class="ui blue basic button" style="position: absolute;">blue</button>
                <div class="avatar avatar-xxl">
                    <img class="avatar-img rounded-circle" src="<?php echo base_url() . '/dri_profile_image/' . '1631801083_6d5943d455be676a2394.jfif' ?>">
                </div>
            </div> <br><br>

            <form id="service_form" action="<?php echo base_url() . '/Service_input/service_insert' ?>" enctype="multipart/form-data" method="POST">
                <div class="row mx-5">
                    <div class="col-md-12">
                        <input type='hidden' name='ser_id' value="<?php echo $obj_service[0]->ser_id ?>">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title" id="service_information">Service information</div>
                            </div>

                            <div class="card-body">
                                <div class="row px-5">

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Type :</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $obj_service[0]->stac_name ?></p>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Cut-off date :</label>
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
                                            <label for="car_branch" class="col-form-label mr-auto">Importer :</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $arr_driver_in[0]->dri_name ?></p>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto pull-right">Exporter :</label>
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
                                            <label class="col-form-label mr-auto">Exported car :</label>
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

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Date departure:</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo date_thai($obj_service[0]->ser_actual_departure_date) ?></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mx-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title" id="container_information">Container information</div>
                            </div>

                            <div class="card-body container pr-5 pl-5 pt-3 pb-3" style="max-width: 1400px">
                                <?php
                                require_once dirname(__FILE__) . '/card/container_card.php';
                                ?>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row mx-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title" id="agent_information">Agent information</div>
                            </div>

                            <div class="card-body"i>
                            <?php
                                require_once dirname(__FILE__) . '/card/agent_card.php';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mx-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title" id="customer_information">Customer information</div>
                            </div>

                            <div class="card-body">
                                <?php
                                require_once dirname(__FILE__) . '/card/customer_card.php';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>

        <div class="ui modal">
            <i class="close icon"></i>
            <div class="header">
                Remove Service ?
            </div>
            <div class="content">
                <form action="<?php echo base_url() . '/Service_show/service_delete' ?>" method="post">
                    <input type="hidden" id="ser_id" name="ser_id" value="<?php echo $obj_service[0]->ser_id ?>">

                    <p style=" font-size: 1rem">Are you sure to remove the service</p>

                    <div class="ui info message">
                        <div class="header">
                            What happening after remove the service
                        </div>
                        <ul class="list">
                            <li>The service still ramain in database,</li>
                            <li>But you cannot see the service anymore</li>
                        </ul>
                    </div>
            </div>
            <div class="actions">
                <button type="button" class="ui test button">
                    No, keep it
                </button>
                <button type="submit" class="ui negative right labeled icon button">
                    Yes, remove it
                    <i class="minus circle icon"></i>
                </button>
                </form>
            </div>
        </div>

        <script>
            $('.ui.modal').modal('attach events', '.test.button', 'toggle');

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
        </script>
    </div>

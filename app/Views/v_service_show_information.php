<!--
* v_service_show_information
* Display service detail page
* @input    service information
* @output   service detail page
* @author   Tadsawan
* @Create Date  2564-08-12
*/
-->

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
                <a href="#service_information" class="p-0 m-3">
                    <h3 onclick="hilight_section('service')" class="service active">Service</h3>
                </a>
                <a href="#container_information" class="p-0 m-3">
                    <h3 onclick="hilight_section('con')" class="con">Container</h3>
                </a>
                <a href="#agent_information" class="p-0 m-3">
                    <h3 onclick="hilight_section('agent')" class="agent">Agent</h3>
                </a>
                <a href="#customer_information" class="p-0 m-3">
                    <h3 onclick="hilight_section('customer')" class="customer">Customer</h3>
                </a>
            </div>

            <style>
                .avatar {
                    margin: 0px 80px;
                }
                .avatar-img {
                    width: 150px;
                    height: 150px;
                    object-fit: cover;
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
                @media only screen and (max-width: 768px) {
                    #img-line {
                        display: none !important;
                    }
                }
            </style>

            <div class="d-flex justify-content-center mt-4 mb-5" id="img-line">
                <!-- imported driver profile image -->
                <div class="avatar avatar-xxl ml-5">
                    <img class="avatar-img rounded-circle" src="<?php echo base_url() . '/dri_profile_image/' . $arr_driver_in[0]->dri_profile_image ?>">
                </div>

                <div class="mt-5">
                    <span class="bg-import text-white p-2" style="border-radius: 5px;">Import</span>
                </div>

                <!-- container image -->
                <div class="avatar avatar-xxl ml-5">
                    <img class="avatar-img rounded-circle" src="<?php echo base_url() . '/container_image/container_placeholder.jpg'?>">
                </div>

                <div class="mt-5">
                    <span class="bg-export text-white p-2" style="border-radius: 5px;">Export</span>
                </div>

                <!-- exported driver profile image -->
                <div class="avatar avatar-xxl ml-5">
                    <img class="avatar-img rounded-circle" src="<?php echo base_url() . '/dri_profile_image/' . $arr_driver_out[0]->dri_profile_image ?>">
                </div>
            </div>

            <form id="service_form" action="<?php echo base_url() . '/Service_input/service_insert' ?>" enctype="multipart/form-data" method="POST">
                <div class="row mx-5">
                    <div class="col-md-12">
                        <input type='hidden' name='ser_id' value="<?php echo $obj_service[0]->ser_id ?>">
                        <div class="card mt-4">
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
                                            <label class="col-form-label mr-auto">Date arrivals :</label>
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
                                            <label class="col-form-label mr-auto">Imported car :</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $arr_car_in[0]->car_code . ' ' . $arr_car_in[0]->prov_name ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Register year -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Exported car :</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $arr_car_out[0]->car_code . ' ' . $arr_car_out[0]->prov_name ?></p>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Weight -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Arrivals location :</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $obj_service[0]->ser_arrivals_location ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Fuel Type -->
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Departure location :</label>
                                            <div class="col-12 col-sm-8">
                                                <p><?php echo $obj_service[0]->ser_departure_location ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Date departure :</label>
                                            <div class="col-12 col-sm-8">
                                                <p>
                                                <?php 
                                                if ($obj_service[0]->ser_actual_departure_date == NULL || $obj_service[0]->ser_actual_departure_date == '')
                                                    echo 'Not export yet';
                                                else
                                                    echo date_thai($obj_service[0]->ser_actual_departure_date) 
                                                ?>
                                            </p>
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

                <div class="row mx-5">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                History log
                            </div>
                            <style>
                                .feed-item-secondary::after {
                                    background: grey !important;
                                }
                            </style>
                            <div class="card-body pl-5 pt-3">
                                <ol class="activity-feed">
                                    <li class="feed-item feed-item-secondary">
                                        <time class="date" datetime="9-25">Sep 25</time>
                                        <span class="text">Responded to need <a href="#">"Volunteer opportunity"</a></span>
                                    </li>
                                    <li class="feed-item feed-item-secondary">
                                        <time class="date" datetime="9-24">Sep 24</time>
                                        <span class="text">Added an interest <a href="#">"Volunteer Activities"</a></span>
                                    </li>
                                    <li class="feed-item feed-item-info">
                                        <time class="date" datetime="9-23">Sep 23</time>
                                        <span class="text">Joined the group <a href="single-group.php">"Boardsmanship Forum"</a></span>
                                    </li>
                                    <li class="feed-item feed-item-warning">
                                        <time class="date" datetime="9-21">Sep 21</time>
                                        <span class="text">Responded to need <a href="#">"In-Kind Opportunity"</a></span>
                                    </li>
                                    <li class="feed-item feed-item-danger">
                                        <time class="date" datetime="9-18">Sep 18</time>
                                        <span class="text">Created need <a href="#">"Volunteer Opportunity"</a></span>
                                    </li>
                                    <li class="feed-item">
                                        <time class="date" datetime="9-17">Sep 17</time>
                                        <span class="text">Attending the event <a href="single-event.php">"Some New Event"</a></span>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        

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

            /*
            * hilight_section
            * go to hilight section
            * @input    section
            * @output   go to hilight section
            * @author   Thanathip
            * @Create Date  2564-10-14
            */
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

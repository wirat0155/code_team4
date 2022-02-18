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
                        <button class="ui history button text-white" style="background-color: #22b7ee">
                            <i class="fas fa-history mr-1"></i>
                            History log
                        </button>
                        <a class="ui yellow button" href="<?php echo base_url() . '/Service_edit/service_edit/' . $obj_service[0]->ser_id ?>">
                            <i class="far fa-edit mr-1"></i>
                            Edit info
                        </a>
                        <button type="submit" class="ui red delete button">
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

                            <div class="card-body" i>
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
            </form>
        </div>

        

        <div class="ui modal delete">
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
                <button type="button" class="ui delete button">
                    No, keep it
                </button>
                <button type="submit" class="ui negative right labeled icon button">
                    Yes, remove it
                    <i class="minus circle icon"></i>
                </button>
                </form>
            </div>
        </div>

        <div class="ui change_container modal">
            <div class="header">
                History log
            </div>
            <div class="content pl-5" style="min-height: 170px;">
                <h4>Current container</h4>
                <style>
                    .feed-item-secondary::after {
                        background: grey !important;
                    }
                </style>
                <ol class="activity-feed">

                    <!-- ser id original container -->
                    <?php if ($index_ser_id == 0) :?>
                        <?php for ($i = count($arr_change_container) - 1; $i >= 0; $i--) {
                            if (gettype($arr_change_container[$i]) == 'string') : ?>
                                <li class="feed-item <?php if ($i != count($arr_change_container) - 1) echo "feed-item-secondary" ?>">
                                    <time class="date"><i class="bi bi-clock mr-3"></i><?php echo diff_datetime($obj_service[0]->ser_arrivals_date) ?></time>
                                    <span class="text"><h4><?php echo $obj_service[0]->con_number?></h4></span>
                                </li>
                            <?php else : ?>
                                <li class="feed-item <?php if ($i != count($arr_change_container) - 1) echo "feed-item-secondary" ?>">
                                    <time class="date"><i class="bi bi-clock mr-3"></i><?php echo diff_datetime($arr_change_container[$i]->chl_date) ?></time>
                                    <span class="text"><h4><a href="<?php echo base_url() . '/Service_show/service_detail/' . $arr_change_container[$i]->chl_new_ser_id ?>">
                                        <?php 
                                        if ($arr_change_container[$i]->con_number != NULL) {
                                            echo $arr_change_container[$i]->con_number;
                                        }
                                        else {
                                            echo "Unknown container" . " " . $arr_change_container[$i]->chl_new_ser_id;
                                        }
                                        ?></a></h4>
                                    </span>
                                </li>
                            <?php endif; ?>
                        <?php } ?>

                    <!-- ser id not original container -->
                    <?php else : ?>
                        <?php for ($i = count($arr_change_container) - 1; $i >= 0; $i--) {
                            // service ที่เรียกดูข้อมูล
                            if ($i == $index_ser_id): ?>
                                <li class="feed-item <?php if ($i != count($arr_change_container) - 1) {
                                    echo "feed-item-secondary";
                                }
                                ?>">
                                    <time class="date"><i class="bi bi-clock mr-3"></i><?php echo diff_datetime($arr_change_container[$i - 1]->chl_date) ?></time>
                                    <span class="text"><h4><?php echo $obj_service[0]->con_number ?></h4></span>
                                </li>

                            <!-- ไม่ใช่ service ที่เรียกดูข้อมูล -->
                            <?php else: ?>
                                <!-- service ที่เปลี่ยนหลัง service ที่เรียกดูข้อมูล -->
                                <?php if ($i > $index_ser_id) { ?>
                                    <li class="feed-item <?php if ($i != count($arr_change_container) - 1) {
                                    echo "feed-item-secondary";
                                    }
                                    ?>">
                                        <time class="date"><i class="bi bi-clock mr-3"></i><?php echo diff_datetime($arr_change_container[$i]->chl_date) ?></time>
                                        <span class="text"><h4><a href="<?php echo base_url() . '/Service_show/service_detail/' . $arr_change_container[$i]->chl_new_ser_id ?>">
                                            <?php
                                            if ($arr_change_container[$i]->con_number != null) {
                                                    echo $arr_change_container[$i]->con_number;
                                                } else {
                                                    echo "Unknown container" . " " . $arr_change_container[$i]->chl_new_ser_id;
                                                }
                                                ?></a></h4>
                                        </span>
                                    </li>
                                <?php } ?>

                                <!-- original service -->
                                <?php if ($i == 0) { ?>
                                    <li class="feed-item <?php if ($i != count($arr_change_container) - 1) {
                                    echo "feed-item-secondary";
                                    }
                                    ?>">
                                        <time class="date"><i class="bi bi-clock mr-3"></i><?php echo diff_datetime($obj_original_container->ser_arrivals_date) ?></time>
                                        <span class="text"><h4><a href="<?php echo base_url() . '/Service_show/service_detail/' . $arr_change_container[$i]->chl_new_ser_id ?>">
                                            <?php
                                            if ($arr_change_container[$i]->con_number != null) {
                                                    echo $arr_change_container[$i]->con_number;
                                                } else {
                                                    echo "Unknown container" . " " . $arr_change_container[$i]->chl_new_ser_id;
                                                }
                                                ?></a></h4>
                                        </span>
                                    </li>
                                <?php } ?>

                                <?php if ($i < $index_ser_id && $i > 0) { ?>
                                    <li class="feed-item <?php if ($i != count($arr_change_container) - 1) {
                                        echo "feed-item-secondary";
                                    }
                                    ?>">
                                        <time class="date"><i class="bi bi-clock mr-3"></i><?php echo diff_datetime($arr_change_container[$i - 1]->chl_date) ?></time>
                                        <span class="text"><h4><a href="<?php echo base_url() . '/Service_show/service_detail/' . $arr_change_container[$i]->chl_new_ser_id ?>">
                                            <?php
                                            if ($arr_change_container[$i]->con_number != null) {
                                                    echo $arr_change_container[$i]->con_number;
                                                } else {
                                                    echo "Unknown container" . " " . $arr_change_container[$i]->chl_new_ser_id;
                                                }
                                                ?></a></h4>
                                        </span>
                                    </li>
                                <?php } ?>
                            <?php endif;?>
                        <?php }?>

                    <?php endif; ?>
                </ol>

                <script>
                    let number_change_container = '<?php echo count($arr_change_container)?>';
                    let height = 360;
                    number_change_container = parseInt(number_change_container);

                    console.log(typeof number_change_container);
                    if (number_change_container != 1) {
                        height += (number_change_container - 2) * 60;
                        $('.ui.change_container.modal').css("height", height + "px");
                    }
                </script>
            </div>
            <div class="actions">
                <a href="<?php echo base_url() . "/Service_show/show_history" ?>">
                    <button type="button" class="ui history secondary basic button"><i class='left fas fa-history'></i>
                        Full history log
                    </button>
                </a>
            </div>
        </div>

        <script>
        $('.ui.modal.delete').modal('attach events', '.delete.button', 'toggle');
        $('.ui.modal.change_container').modal('attach events', '.history.button', 'toggle');

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
<style>
    .ranges th {
        color: black !important;
        background-color: white !important;
    }

    .cl-blue {
        color: #1244b9 !important;
    }

    .bg-import {
        background-color: #22b7ee;
        /* Dodgrblue */
    }

    .bg-export {
        background-color: #04e17a;
        /* Springgreen */
    }

    .bg-drop {
        background-color: #ffa611;
        /* Orange */
    }

    .circle-import {
        width: 63px;
        height: 59px;
        display: block;
        position: relative;
        background-color: #16ACF0;
        border-radius: 50%;
    }

    .circle-drop {
        width: 63px;
        height: 59px;
        display: block;
        position: relative;
        background-color: #FFA610;
        border-radius: 50%;
    }

    .circle-export {
        width: 63px;
        height: 59px;
        display: block;
        position: relative;
        background-color: #44BB55;
        border-radius: 50%;
    }

    .circle-total {
        width: 63px;
        height: 59px;
        display: block;
        position: relative;
        background-color: #F0168A;
        border-radius: 50%;
    }

    .circle-import.float-right>img {
        width: 35px;
        height: 35px;
        margin-left: 15px;
        margin-top: 10px;
    }

    .circle-drop.float-right>img {
        width: 35px;
        height: 35px;
        margin-left: 15px;
        margin-top: 10px;
    }

    .circle-export.float-right>img {
        width: 50px;
        height: 35px;
        margin-left: 8px;
        margin-top: 13px;
    }

    .circle-total.float-right>img {
        width: 35px;
        height: 35px;
        margin-left: 13px;
        margin-top: 13px;
    }

    .float-right>img {
        width: 90px;
        height: 60px;
        margin-left: 15px;
        margin-top: 10px;
    }
</style>
<div class="ui modal">
    <i class="close icon"></i>
    <div class="header">
        Remove service ?
    </div>
    <div class="content">
        <form action="<?php echo base_url() . '/Service_show/service_delete' ?>" method="post">
            <input type="hidden" id="ser_id" name="ser_id">

            <p style="font-size: 1rem">Are you sure to remove the service</p>

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
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="pl-3 page-title">SERVICE INFORMATION</h4>
            </div>
            <hr width="95%" color="696969">
            <div class="row">
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
                        <a href="<?php echo base_url() . '/Service_show/service_show_ajax' ?>">Service</a>
                    </li>
                </ul>

                <!-- Download Excel -->
                <form id='form_Excel' action="<?php echo base_url() . '/Service_show/export_service' ?>" method="post" hidden>
                    <input type="hidden" name="date_range_excel" id="date_range_excel" value="<?php echo $arrivals_date ?>">
                </form>
                <form id='form_date' action="<?php echo base_url() . '/Service_show/service_show_ajax' ?>" method="post" class="ml-auto mr-3 text-right">

                    <button type="submit" form="form_Excel" class="shadow-sm btn btn-success btn-border" style=" height: 40px; width: 160px; margin-bottom: 5">
                        <i class="fas fa-file-download mr-1"></i>
                        Download Excel
                    </button>

                    <!-- Date -->

                    <input class="pl-2 shadow-sm rounded" type="text" name="date_range" id="date_range" value="<?php echo $arrivals_date ?>" style=" height: 43px; width: 180px; text-align: center;">
                </form>
            </div>
            <!-- Card Report -->
            <div id="carouselExampleIndicators" class="carousel slide mt-3" data-ride="carousel">
                <ol class="carousel-indicators" style="margin-bottom: -5px">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="row justify-content-center align-items-center col-md-10 ml-auto mr-auto">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-sm-6 col-md-3">
                                    <div class="card ">
                                        <div class="card-body pb-0 ">
                                            <div class="h3">IMPORT
                                                <span class="circle-import float-right"><img src="<?php echo base_url() . '/upload/cargo_1.png' ?>"></span>
                                            </div>
                                            <h2 class="mt-0 ml-3">
                                                <?php
                                                $day = date("Y-m-d");
                                                $yesterday = date("Y-m-d", strtotime('yesterday'));
                                                $count_import = 0;
                                                $count_import_yesterday = 0;
                                                for ($i = 0; $i < count($arr_service); $i++) {
                                                    if (substr($arr_service[$i]->ser_arrivals_date, 0, 10) == $day) {
                                                        $count_import++;
                                                    }
                                                    if (substr($arr_service[$i]->ser_arrivals_date, 0, 10) == $yesterday) {
                                                        $count_import_yesterday++;
                                                    }
                                                }
                                                echo $count_import;
                                                ?>
                                            </h2>
                                            <?php if ($count_import - $count_import_yesterday < 0) { ?>
                                                <p style="color: #F60029;">
                                                    <i class="fas fa-arrow-down" style="color: #F60029;"></i>
                                                    <?php echo "(" . ($count_import - $count_import_yesterday) . ")"; ?>
                                                    <label class="ml-3"> From yesterday</label>
                                                </p>
                                            <?php } else { ?>
                                                <p style="color: #09F600;">
                                                    <i class="fas fa-arrow-up"></i>
                                                    <?php echo "(+ " . ($count_import - $count_import_yesterday) . ")"; ?>
                                                    <label class="ml-3"> From yesterday</label>
                                                </p>

                                            <?php } ?>
                                            <div class="pull-in sparkline-fix chart-as-background">
                                                <div class="lineChart_import"><canvas width="337" height="70" style="display: inline-block; width: 337.693px; height: 70px; vertical-align: top;"></canvas></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="card ">
                                        <div class="card-body pb-0 ">
                                            <div class="h3">DROP
                                                <span class="circle-drop float-right"><img src="<?php echo base_url() . '/upload/container_2.png' ?>"></span>
                                            </div>
                                            <h2 class="mt-0 ml-3">
                                                <?php
                                                $day = date("Y-m-d");
                                                $yesterday = date("Y-m-d", strtotime('yesterday'));
                                                $count_drop = 0;
                                                $count_drop_yesterday = 0;
                                                for ($i = 0; $i < count($arr_service); $i++) {
                                                    if (substr($arr_service[$i]->ser_arrivals_date, 0, 10) < $day && substr($arr_service[$i]->ser_actual_departure_date, 0, 10) ==  null) {
                                                        $count_drop++;
                                                    }
                                                    if (substr($arr_service[$i]->ser_arrivals_date, 0, 10) < $yesterday && substr($arr_service[$i]->ser_actual_departure_date, 0, 10) ==  null) {
                                                        $count_drop_yesterday++;
                                                    }
                                                }
                                                echo $count_drop;
                                                ?>
                                            </h2>
                                            <?php if ($count_drop - $count_drop_yesterday < 0) { ?>
                                                <p style="color: #F60029;">
                                                    <i class="fas fa-arrow-down" style="color: #F60029;"></i>
                                                    <?php echo "(" . ($count_drop - $count_drop_yesterday) . ")"; ?>
                                                    <label class="ml-3"> From yesterday</label>
                                                </p>
                                            <?php } else { ?>
                                                <p style="color: #09F600;">
                                                    <i class="fas fa-arrow-up"></i>
                                                    <?php echo "(+ " . ($count_drop - $count_drop_yesterday) . ")"; ?>
                                                    <label class="ml-3"> From yesterday</label>
                                                </p>

                                            <?php } ?>
                                            <div class="pull-in sparkline-fix chart-as-background">
                                                <div class="lineChart_drop"><canvas width="337" height="70" style="display: inline-block; width: 337.693px; height: 70px; vertical-align: top;"></canvas></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="card ">
                                        <div class="card-body pb-0 ">
                                            <div class="h3">EXPORT
                                                <span class="circle-export float-right"><img src="<?php echo base_url() . '/upload/bg-export.png' ?>"></span>
                                            </div>
                                            <h2 class="mt-0 ml-3">
                                                <?php
                                                $day = date("Y-m-d");
                                                $yesterday = date("Y-m-d", strtotime('yesterday'));
                                                $count_export = 0;
                                                $count_export_yesterday = 0;
                                                for ($i = 0; $i < count($arr_service); $i++) {
                                                    if (substr($arr_service[$i]->ser_actual_departure_date, 0, 10) == $day) {
                                                        $count_export++;
                                                    }
                                                    if (substr($arr_service[$i]->ser_actual_departure_date, 0, 10) == $yesterday) {
                                                        $count_export_yesterday++;
                                                    }
                                                }
                                                echo $count_export;
                                                ?>
                                            </h2>
                                            <?php if ($count_export - $count_export_yesterday < 0) { ?>
                                                <p style="color: #F60029;">
                                                    <i class="fas fa-arrow-down" style="color: #F60029;"></i>
                                                    <?php echo "(" . ($count_export - $count_export_yesterday) . ")"; ?>
                                                    <label class="ml-3"> From yesterday</label>
                                                </p>
                                            <?php } else { ?>
                                                <p style="color: #09F600;">
                                                    <i class="fas fa-arrow-up"></i>
                                                    <?php echo "(+ " . ($count_export - $count_export_yesterday) . ")"; ?>
                                                    <label class="ml-3"> From yesterday</label>
                                                </p>

                                            <?php } ?>
                                            <div class="pull-in sparkline-fix chart-as-background">
                                                <div class="lineChart_export"><canvas width="337" height="70" style="display: inline-block; width: 337.693px; height: 70px; vertical-align: top;"></canvas></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="card ">
                                        <div class="card-body pb-0 ">
                                            <div class="h3">TOTAL SERVICE
                                                <span class="circle-total float-right"><img src="<?php echo base_url() . '/upload/infinite.png' ?>"></span>
                                            </div>
                                            <h2 class="mt-0 ml-3">
                                                <?php
                                                $day = date("Y-m-d");
                                                $yesterday = date("Y-m-d", strtotime('yesterday'));
                                                $count = 0;
                                                $count_yesterday = 0;
                                                for ($i = 0; $i < count($arr_service); $i++) {
                                                    if (substr($arr_service[$i]->ser_arrivals_date, 0, 10) < $day) {
                                                        $count++;
                                                    }
                                                    if (substr($arr_service[$i]->ser_arrivals_date, 0, 10) < $yesterday) {
                                                        $count_yesterday++;
                                                    }
                                                }
                                                echo count($arr_service);
                                                ?>
                                            </h2>
                                            <?php if ($count - $count_yesterday < 0) { ?>
                                                <p style="color: #F60029;">
                                                    <i class="fas fa-arrow-down" style="color: #F60029;"></i>
                                                    <?php echo "(" . ($count - $count_yesterday) . ")"; ?>
                                                    <label class="ml-3"> From yesterday</label>
                                                </p>
                                            <?php } else { ?>
                                                <p style="color: #09F600;">
                                                    <i class="fas fa-arrow-up"></i>
                                                    <?php echo "(+ " . ($count - $count_yesterday) . ")"; ?>
                                                    <label class="ml-3"> From yesterday</label>
                                                </p>

                                            <?php } ?>
                                            <div class="pull-in sparkline-fix chart-as-background">
                                                <div class="lineChart_total"><canvas width="337" height="70" style="display: inline-block; width: 337.693px; height: 70px; vertical-align: top;"></canvas></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-4">
                                    <div class="card ">
                                        <div class="card-body pb-0 ">
                                            <div class="h3">DRY CONTAINER
                                                <span class="float-right"><img src="<?php echo base_url() . '/upload/DryContainer-removebg-preview.png' ?>"></span>
                                            </div>
                                            <h2 class="mt-0 ml-3">
                                                <?php
                                                $day = date("Y-m-d");
                                                $yesterday = date("Y-m-d", strtotime('yesterday'));
                                                $count_import = 0;
                                                $count_import_yesterday = 0;
                                                for ($i = 0; $i < count($arr_service); $i++) {
                                                    $count_import_yesterday++;
                                                    if ($arr_service[$i]->con_cont_id == 1) {
                                                        $count_import++;
                                                    }
                                                }
                                                echo $count_import;
                                                ?>
                                            </h2>
                                            <p class="mb-3" style="color: #09F600;">
                                                <i class="fas fa-arrow-up"></i>
                                                <?php $result = ($count_import / $count_import_yesterday) * 100;
                                                echo number_format($result, 2, '.', '') . '%';
                                                ?>
                                                <label class="ml-3"> From all container</label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card ">
                                        <div class="card-body pb-0 ">
                                            <div class="h3">REEFER CONTAINER
                                                <span class="float-right"><img src="<?php echo base_url() . '/upload/ReeferContainer-removebg-preview.png' ?>"></span>
                                            </div>
                                            <h2 class="mt-0 ml-3">
                                                <?php
                                                $day = date("Y-m-d");
                                                $yesterday = date("Y-m-d", strtotime('yesterday'));
                                                $count = 0;
                                                $count_yesterday = 0;
                                                for ($i = 0; $i < count($arr_service); $i++) {
                                                    $count_yesterday++;
                                                    if ($arr_service[$i]->con_cont_id == 2) {
                                                        $count++;
                                                    }
                                                }
                                                echo $count;
                                                ?>
                                            </h2>
                                            <p class="mb-3" style="color: #09F600;">
                                                <i class="fas fa-arrow-up"></i>
                                                <?php $result = ($count / $count_yesterday) * 100;
                                                echo number_format($result, 2, '.', '') . '%';
                                                ?>
                                                <label class="ml-3"> From all container</label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card ">
                                        <div class="card-body pb-0 ">
                                            <div class="h3">OPEN TOP CON.
                                                <span class="float-right"><img src="<?php echo base_url() . '/upload/shutterstock_341887898-1-removebg-preview.png' ?>"></span>
                                            </div>
                                            <h2 class="mt-0 ml-3">
                                                <?php
                                                $day = date("Y-m-d");
                                                $yesterday = date("Y-m-d", strtotime('yesterday'));
                                                $count = 0;
                                                $count_yesterday = 0;
                                                for ($i = 0; $i < count($arr_service); $i++) {
                                                    $count_yesterday++;
                                                    if ($arr_service[$i]->con_cont_id == 4) {
                                                        $count++;
                                                    }
                                                }
                                                echo $count;
                                                ?>
                                            </h2>
                                            <p class="mb-3" style="color: #09F600;">
                                                <i class="fas fa-arrow-up"></i>
                                                <?php $result = ($count / $count_yesterday) * 100;
                                                echo number_format($result, 2, '.', '') . '%';
                                                ?>
                                                <label class="ml-3"> From all container</label>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-4">
                                    <div class="card ">
                                        <div class="card-body pb-0 ">
                                            <div class="h3">FLAT-RACK CON.
                                                <span class="float-right"><img src="<?php echo base_url() . '/upload/shutterstock_359338868-removebg-preview.png' ?>"></span>
                                            </div>
                                            <h2 class="mt-0 ml-3">
                                                <?php
                                                $day = date("Y-m-d");
                                                $yesterday = date("Y-m-d", strtotime('yesterday'));
                                                $count = 0;
                                                $count_yesterday = 0;
                                                for ($i = 0; $i < count($arr_service); $i++) {
                                                    $count_yesterday++;
                                                    if ($arr_service[$i]->con_cont_id == 5) {
                                                        $count++;
                                                    }
                                                }
                                                echo $count;
                                                ?>
                                            </h2>
                                            <p class="mb-3" style="color: #09F600;">
                                                <i class="fas fa-arrow-up"></i>
                                                <?php $result = ($count / $count_yesterday) * 100;
                                                echo number_format($result, 2, '.', '') . '%';
                                                ?>
                                                <label class="ml-3"> From all container</label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card ">
                                        <div class="card-body pb-0 ">
                                            <div class="h3">ISO TANK CON.
                                                <span class="float-right"><img src="<?php echo base_url() . '/upload/ISOTank-removebg-preview.png' ?>"></span>
                                            </div>
                                            <h2 class="mt-0 ml-3">
                                                <?php
                                                $day = date("Y-m-d");
                                                $yesterday = date("Y-m-d", strtotime('yesterday'));
                                                $count = 0;
                                                $count_yesterday = 0;
                                                for ($i = 0; $i < count($arr_service); $i++) {
                                                    $count_yesterday++;
                                                    if ($arr_service[$i]->con_cont_id == 3) {
                                                        $count++;
                                                    }
                                                }
                                                echo $count;
                                                ?>
                                            </h2>
                                            <p class="mb-3" style="color: #09F600;">
                                                <i class="fas fa-arrow-up"></i>
                                                <?php $result = ($count / $count_yesterday) * 100;
                                                echo number_format($result, 2, '.', '') . '%';
                                                ?>
                                                <label class="ml-3"> From all container</label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card ">
                                        <div class="card-body pb-0 ">
                                            <div class="h3">VENTILATED CON.
                                                <span class="float-right"><img src="<?php echo base_url() . '/upload/ventilated-container-removebg-preview.png' ?>"></span>
                                            </div>
                                            <h2 class="mt-0 ml-3">
                                                <?php
                                                $day = date("Y-m-d");
                                                $yesterday = date("Y-m-d", strtotime('yesterday'));
                                                $count = 0;
                                                $count_yesterday = 0;
                                                for ($i = 0; $i < count($arr_service); $i++) {
                                                    $count_yesterday++;
                                                    if ($arr_service[$i]->con_cont_id == 6) {
                                                        $count++;
                                                    }
                                                }
                                                echo $count;
                                                ?>
                                            </h2>
                                            <p class="mb-3" style="color: #09F600;">
                                                <i class="fas fa-arrow-up"></i>
                                                <?php $result = ($count / $count_yesterday) * 100;
                                                echo number_format($result, 2, '.', '') . '%';
                                                ?>
                                                <label class="ml-3"> From all container</label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev pr-4 pb-4" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="big circular ui icon button basic" aria-hidden="true" style="box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;"><i class="angle left icon"></i></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next pl-4 pb-4" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="big circular ui icon button basic" aria-hidden="true" style="box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;"><i class="angle right icon"></i></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- table -->
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="service_list_table" class="display table table-hover cell-border" style="border-collapse: collapse !important; border-radius: 10px; overflow: hidden;">
                                    <thead>
                                        <tr style="background-color: #999; color: #fff; ">
                                            <th>No.</th>
                                            <th class="text-center">Con. number</th>
                                            <th class="text-center">Con. status</th>
                                            <th class="text-center">Con. type</th>
                                            <th class="text-center" style="width: 15%">Cut-off</th>
                                            <th class="text-center">Act. dep.</th>
                                            <th class="text-center">Agent</th>
                                            <th class="text-center">Customer</th>
                                            <th class="text-center"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php for ($i = 0; $i < count($arr_service); $i++) { ?>
                                            <tr>
                                                <!-- ลำดับ -->
                                                <td> </td>

                                                <!-- Order 
                                            <td onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                <?php echo $arr_service[$i]->ser_id ?>
                                            </td> -->
                                                <!-- Container number -->
                                                <td onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                    <?php echo $arr_service[$i]->con_number;
                                                    ?>
                                                </td>


                                                <!-- Status container  -->
                                                <td onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)" class="px-4 py-3 text-sm text-center" style="min-width: 100px;">
                                                    <?php
                                                    // 1 = import (sky blue)
                                                    if ($arr_service[$i]->ser_stac_id == '1') {
                                                        echo '<span class="bg-import text-white p-2" style="border-radius: 5px;">' . $arr_service[$i]->stac_name . '<span>';
                                                    }
                                                    // 4 = export (green)
                                                    else if ($arr_service[$i]->ser_stac_id == '4') {
                                                        echo '<span class="bg-export text-white p-2" style="border-radius: 5px;">' . $arr_service[$i]->stac_name . '<span>';
                                                    }
                                                    // else = drop (orange)
                                                    else {
                                                        echo '<span class="bg-drop text-white p-2" style="border-radius: 5px;">' . $arr_service[$i]->stac_name . '<span>';
                                                    }
                                                    ?>
                                                </td>

                                                <!-- Container type -->
                                                <td onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                    <?php echo $arr_service[$i]->cont_name ?>
                                                </td>

                                                <!-- Cut-off -->
                                                <td onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                    <?php echo date_thai($arr_service[$i]->ser_departure_date) ?>
                                                </td>
                                                <!-- Act. dep. -->
                                                <td onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                    <?php
                                                    if ($arr_service[$i]->ser_actual_departure_date == "0000-00-00 00:00:00" || $arr_service[$i]->ser_actual_departure_date == NULL) {
                                                        echo "-";
                                                    } else {
                                                        echo date_thai($arr_service[$i]->ser_actual_departure_date);
                                                    } ?>
                                                </td>



                                                <!-- Agent -->
                                                <td onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                    <?php echo $arr_service[$i]->agn_company_name ?>
                                                </td>

                                                <!-- Customer -->
                                                <td onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                    <?php echo $arr_service[$i]->cus_company_name ?>
                                                </td>

                                                <!-- Action -->
                                                <script>
                                                    function show_service_menu(ser_id) {
                                                        $('.menu').css('display', 'none');
                                                        $('.menu.ser_id_' + ser_id).show();
                                                    } // make it dropdown
                                                    $(document).click(function() {
                                                        var container = $(".menu");
                                                        if (!container.is(event.target) && !container.has(event.target)
                                                            .length) {
                                                            container.hide();
                                                        }
                                                    });
                                                </script>
                                                <td class="text-left" width='15px'>
                                                    <div class="ui dropdown text-center p-2" style="border: 1px solid #ddd; width: 20px; height: 20px; border-radius: 50%" onclick="show_service_menu(<?php echo $arr_service[$i]->ser_id ?>)">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                        <div class="menu ser_id_<?php echo $arr_service[$i]->ser_id ?>" style="right: 0;left: auto;">
                                                            <div class="item" onclick="change_location('google')">
                                                                <i class='far fa-money-bill-alt' style="font-size: 110%;"></i> &nbsp;
                                                                Charge billing
                                                            </div>
                                                            <div class="item" onclick="location.href='<?php echo base_url() . '/Service_edit/service_edit/' . $arr_service[$i]->ser_id ?>';">
                                                                <i class='far fa-edit' style="font-size: 130%;"> </i> &nbsp;
                                                                Edit
                                                            </div>
                                                            <div class="item test button" onclick="get_id(<?php echo $arr_service[$i]->ser_id ?>)">
                                                                <i class='fas fa-trash-alt' style="font-size: 130%;"></i>&nbsp; &nbsp;
                                                                Remove
                                                            </div>
                                                            <script>
                                                                $('.ui.modal').modal('attach events', '.test.button', 'toggle');
                                                            </script>
                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.lineChart_import').sparkline([<?php echo $arr_import_day[6] . ',' . $arr_import_day[5] . ',' . $arr_import_day[4] . ',' .  $arr_import_day[3] . ',' . $arr_import_day[2] . ',' . $arr_import_day[1] . ',' . $arr_import_day[0] ?>], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: 'rgba(255, 255, 255, .5)',
            fillColor: 'rgba(81, 67, 209, 0.2)'
        });
        $('.lineChart_drop').sparkline([<?php echo $arr_drop_day[6] . ',' . $arr_drop_day[5] . ',' . $arr_drop_day[4] . ',' .  $arr_drop_day[3] . ',' . $arr_drop_day[2] . ',' . $arr_drop_day[1] . ',' . $arr_drop_day[0] ?>], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: 'rgba(255, 255, 255, .5)',
            fillColor: 'rgba(255, 166, 16, 0.2)'
        });
        $('.lineChart_export').sparkline([<?php echo $arr_export_day[6] . ',' . $arr_export_day[5] . ',' . $arr_export_day[4] . ',' .  $arr_export_day[3] . ',' . $arr_export_day[2] . ',' . $arr_export_day[1] . ',' . $arr_export_day[0] ?>], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: 'rgba(255, 255, 255, .5)',
            fillColor: 'rgba(67, 209, 120, 0.2)'
        });
        $('.lineChart_total').sparkline([<?php echo $arr_total_day[6] . ',' . $arr_total_day[5] . ',' . $arr_total_day[4] . ',' .  $arr_total_day[3] . ',' . $arr_total_day[2] . ',' . $arr_total_day[1] . ',' . $arr_total_day[0] ?>], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: 'rgba(255, 255, 255, .5)',
            fillColor: 'rgba(209, 67, 133, 0.2)'
        });
        $(document).ready(function() {
            // แทรกปุ่ม เพิ่มบริการ
            var ser_table = $('#service_list_table').DataTable({
                "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": [0, 8]
                }],
                "order": []
            });

            //ลำดับ
            ser_table.on('order.dt search.dt', function() {
                ser_table.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1 + '.';
                });
            }).draw();

            $("#service_list_table_filter").append(

                "<a class='ui labeled icon primary button m-2' href='<?php echo base_url() . '/Service_input/service_input' ?>'><i class='left plus icon'></i>Add</a>"
            );

            //Reset Daterange
            $('.cancelBtn').attr('onclick',
                'location.href = \'<?php echo base_url() . '/Service_show/service_show_ajax' ?>\'');
            $('.cancelBtn').removeClass('btn-default');
        });

        function change_location(url) {
            window.location = "https://www.google.com";
        }

        function get_id(ser_id) {
            $('#ser_id').val(ser_id);
        }

        function service_detail(ser_id) {
            window.location = '<?php echo base_url('') . '/Service_show/service_detail/' ?>' + ser_id;
        }
    </script>
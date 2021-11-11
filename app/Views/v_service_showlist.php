<!--
* v_service_showlist
* Display service list page
* @input    array of service
* @output   service list page
* @author   Natdanai
* @Create Date  2564-07-28
*/
-->

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
                <form id='form_Excel' action="<?php echo base_url() . '/Service_show/export_service' ?>" method="POST" hidden>
                    <input type="hidden" name="date_range_excel" id="date_range_excel" value="<?php echo $arrivals_date ?>">
                </form>
                <form id='form_date' action="<?php echo base_url() . '/Service_show/service_show_ajax' ?>" method="GET" class="ml-auto mr-3 text-right">

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
                                                <?php echo $num_import ?>
                                            </h2>

                                            <?php if ($num_import >= $num_yesterday_import):?>
                                                <p class="mb-3" style="color: #09F600;">
                                                    <i class="fas fa-arrow-up"></i>
                                                    <?php echo "(+" . ($num_import - $num_yesterday_import) . ")"; ?>
                                                    <label class="ml-3"> From yesterday</label>
                                                </p>
                                            <?php endif;?>

                                            <?php if ($num_import < $num_yesterday_import):?>
                                                <p class="mb-3" style="color: #F60029;">
                                                    <i class="fas fa-arrow-down"></i>
                                                    <?php echo "(" . ($num_import - $num_yesterday_import) . ")"; ?>
                                                    <label class="ml-3"> From yesterday</label>
                                                </p>
                                            <?php endif;?>
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
                                                <?php echo $num_drop; ?>
                                            </h2>
                                            <?php if ($num_drop >=  $num_yesterday_drop) { ?>
                                                <p class="mb-3" style="color: #09F600;" >
                                                    <i class="fas fa-arrow-up"></i>
                                                    <?php echo "(+" . ($num_drop - $num_yesterday_drop) . ")"; ?>
                                                    <label class="ml-3"> From yesterday</label>
                                                </p>
                                            <?php } else { ?>
                                                <p class="mb-3" style="color: #F60029;">
                                                    <i class="fas fa-arrow-down"></i>
                                                    <?php echo "(" . ($num_drop - $num_yesterday_drop) . ")"; ?>
                                                    <label class="ml-3"> From yesterday</label>
                                                </p>
                                            <?php } ?>
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
                                                <?php echo $num_export ?>
                                            </h2>
                                            <?php if ($num_export >= $num_yesterday_export) { ?>
                                                <p class="mb-3" style="color: #09F600;">
                                                    <i class="fas fa-arrow-up"></i>
                                                    <?php echo "(+" . ($num_export - $num_yesterday_export) . ")"; ?>
                                                    <label class="ml-3"> From yesterday</label>
                                                </p>
                                            <?php } else { ?>
                                                <p class="mb-3" style="color: #F60029;">
                                                    <i class="fas fa-arrow-down"></i>
                                                    <?php echo "( " . ($num_export - $num_yesterday_export) . ")"; ?>
                                                    <label class="ml-3"> From yesterday</label>
                                                </p>
                                            <?php } ?>
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
                                                $num_all = count($arr_service);
                                                echo $num_all;
                                                ?>
                                            </h2>
                                            <?php if ($num_all >= $num_yesterday_all) { ?>
                                                <p class="mb-3" style="color: #09F600;">
                                                    <i class="fas fa-arrow-up"></i>
                                                    <?php echo "(+" . ($num_all - $num_yesterday_all) . ")"; ?>
                                                    <label class="ml-3"> From yesterday</label>
                                                </p>
                                            <?php } else { ?>
                                                <p class="mb-3" style="color: #F60029;">
                                                    <i class="fas fa-arrow-down"></i>
                                                    <?php echo "(" . ($num_all - $num_yesterday_all) . ")"; ?>
                                                    <label class="ml-3"> From yesterday</label>
                                                </p>

                                            <?php } ?>
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
                                                $num_cont_dry = 0;
                                                for ($i = 0; $i < count($arr_service); $i++) {
                                                    if ($arr_service[$i]->con_cont_id == 1) {
                                                        $num_cont_dry++;
                                                    }
                                                }
                                                echo $num_cont_dry;
                                                ?>
                                            </h2>
                                            <p class="mb-3" style="color: #09F600;">
                                                <?php
                                                if ($num_all == 0) {
                                                    $num_all = 1;
                                                }
                                                $percent_cont_dry = ($num_cont_dry / $num_all) * 100;
                                                echo number_format($percent_cont_dry, 2, '.', '') . '%';
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
                                                $num_cont_reefer = 0;
                                                for ($i = 0; $i < count($arr_service); $i++) {
                                                    if ($arr_service[$i]->con_cont_id == 2) {
                                                        $num_cont_reefer++;
                                                    }
                                                }
                                                echo $num_cont_reefer;
                                                ?>
                                            </h2>
                                            <p class="mb-3" style="color: #09F600;">
                                                <?php
                                                $percent_cont_reefer = ($num_cont_reefer / $num_all) * 100;
                                                echo number_format($percent_cont_reefer, 2, '.', '') . '%';
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
                                                $num_cont_open_top = 0;
                                                for ($i = 0; $i < count($arr_service); $i++) {
                                                    if ($arr_service[$i]->con_cont_id == 3) {
                                                        $num_cont_open_top++;
                                                    }
                                                }
                                                echo $num_cont_open_top;
                                                ?>
                                            </h2>
                                            <p class="mb-3" style="color: #09F600;">
                                                <?php
                                                $percent_cont_open_top = ($num_cont_open_top / $num_all) * 100;
                                                echo number_format($percent_cont_open_top, 2, '.', '') . '%';
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
                                                $num_cont_flat_rack = 0;
                                                for ($i = 0; $i < count($arr_service); $i++) {
                                                    if ($arr_service[$i]->con_cont_id == 4) {
                                                        $num_cont_flat_rack++;
                                                    }
                                                }
                                                echo $num_cont_flat_rack;
                                                ?>
                                            </h2>
                                            <p class="mb-3" style="color: #09F600;">
                                                <?php
                                                $percent_cont_flat_rack = ($num_cont_flat_rack / $num_all) * 100;
                                                echo number_format($percent_cont_flat_rack, 2, '.', '') . '%';
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
                                                $num_cont_tank = 0;
                                                for ($i = 0; $i < count($arr_service); $i++) {
                                                    if ($arr_service[$i]->con_cont_id == 5) {
                                                        $num_cont_tank++;
                                                    }
                                                }
                                                echo $num_cont_tank;
                                                ?>
                                            </h2>
                                            <p class="mb-3" style="color: #09F600;">
                                                <?php
                                                $percent_cont_tank = ($num_cont_tank / $num_all) * 100;
                                                echo number_format($percent_cont_tank, 2, '.', '') . '%';
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
                                                $num_cont_ventilated = 0;
                                                for ($i = 0; $i < count($arr_service); $i++) {
                                                    if ($arr_service[$i]->con_cont_id == 5) {
                                                        $num_cont_tank++;
                                                    }
                                                }
                                                echo $num_cont_ventilated;
                                                ?>
                                            </h2>
                                            <p class="mb-3" style="color: #09F600;">
                                                <?php
                                                $percent_cont_ventilated = ($num_cont_ventilated / $num_all) * 100;
                                                echo number_format($percent_cont_ventilated, 2, '.', '') . '%';
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
                                                <!-- order -->
                                                <td> </td>

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
        $(document).ready(function() {
            // add service button
            var ser_table = $('#service_list_table').DataTable({
                "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": [0, 8]
                }],
                "order": []
            });

            // order
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

            // reset Daterange
            $('.cancelBtn').attr('onclick',
                'location.href = \'<?php echo base_url() . '/Service_show/service_show_ajax' ?>\'');
            $('.cancelBtn').removeClass('btn-default');
        });

        /*
        * get_id
        * get ser_id and show in remove service form
        * @input    section
        * @output   go to get ser_id and show in remove service form
        * @author   Natdanai
        * @Create Date  2564-07-28
        */
        function get_id(ser_id) {
            $('#ser_id').val(ser_id);
        }

        /*
        * service_detail
        * go to service detail page
        * @input    section
        * @output   go to service detail page
        * @author   Natdanai
        * @Create Date  2564-07-28
        */
        function service_detail(ser_id) {
            window.location = '<?php echo base_url('') . '/Service_show/service_detail/' ?>' + ser_id;
        }
    </script>

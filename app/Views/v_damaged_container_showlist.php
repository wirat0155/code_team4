<!--
* v_damaged_container_showlist
* Display damaged container page
* @input    array of service
* @output   damaged container page
* @author   Benjapon
* @Create Date  2564-12-14
*/
-->

<div class="ui modal modal_remove">
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
                <h4 class="pl-3 page-title">DAMAGED CONTAINER</h4>
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
                        <a class="cl-blue" href="<?php echo base_url() . '/Service_show/service_show_ajax'?>">Service information</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="<?php echo base_url() . '/Service_show/service_damaged_show_ajax' ?>">Service</a>
                    </li> -->
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Damaged container</a>
                    </li>
                </ul>
                <!-- Download Excel -->
            </div>
            <!-- Card Report -->
            <div id="carouselExampleIndicators" class="carousel slide mt-3" data-ride="carousel">
                <a class="carousel-control-prev pr-4 pb-4" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <!-- <span class="big circular ui icon button basic" aria-hidden="true" style="box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;"><i class="angle left icon"></i></span> -->
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next pl-4 pb-4" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <!-- <span class="big circular ui icon button basic" aria-hidden="true" style="box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;"><i class="angle right icon"></i></span> -->
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
                                                    // 5 = defective (red)
                                                        if ($arr_service[$i]->ser_stac_id == '5') {
                                                            echo '<span class="bg-defective text-white p-2" style="border-radius: 5px;">' . $arr_service[$i]->stac_name . '<span>';
                                                        }
                                                    //  else if = fixing (orange)
                                                        else if($arr_service[$i]->ser_stac_id == '6'){
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

                                            <!-- agent name -->
                                            <td onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                <?php echo $arr_service[$i]->agn_company_name ?>
                                            </td>

                                            <!-- customer name -->
                                            <td onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                <?php echo $arr_service[$i]->cus_company_name ?>
                                                <?php if ($arr_service[$i]->cus_branch != NULL && $arr_service[$i]->cus_branch != '') : ?>
                                                <?php echo ' ' . $arr_service[$i]->cus_branch ?>
                                                <?php endif; ?>
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
                                                        <div class="item" onclick="location.href='<?php echo base_url() . '/Service_edit/service_edit/' . $arr_service[$i]->ser_id ?>';">
                                                            <i class='far fa-edit' style="font-size: 130%;"> </i> &nbsp;
                                                            Edit
                                                        </div>
                                                        <div class="item test button" onclick="get_id(<?php echo $arr_service[$i]->ser_id ?>)">
                                                            <i class='fas fa-trash-alt' style="font-size: 130%;"></i>&nbsp; &nbsp;
                                                            Remove
                                                        </div>
                                                        <script>
                                                        $('.modal_remove').modal('attach events', '.test.button', 'toggle');
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
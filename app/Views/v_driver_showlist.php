<div class="ui modal">
    <i class="close icon"></i>
    <div class="header">
        Remove driver ?
    </div>
    <div class="content">
        <form action="<?php echo base_url() . '/Driver_show/driver_delete' ?>" method="post">
            <input type="hidden" id="dri_id" name="dri_id">

            <p style="font-size: 1rem">Are you sure to remove the driver</p>

            <div class="ui info message">
                <div class="header">
                    What happening after remove the driver
                </div>
                <ul class="list">
                    <li>The driver still ramain in database,</li>
                    <li>But you cannot see the driver anymore</li>
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
            <div class="pl-4 mt-4 page-header mb-0">
                <h4 class="pl-3 page-title">DRIVER INFORMATION</h4>
            </div>
            <hr width="95%" color="696969">
            <ul class="pl-2 breadcrumbs">
                <li class="nav-home">
                    <a href="<?php echo base_url() . '/Dashboard/dashboard_show' ?>">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/Driver_show/driver_show_ajax' ?>">Driver</a>
                </li>
            </ul>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="driver_list_table" class="display table table-hover cell-border" style="border-collapse: collapse !important; border-radius: 10px; overflow: hidden;">
                                    <thead>
                                        <tr style="background-color: #999999; color: white; ">
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Driver name</th>
                                            <th class="text-center">Identity car</th>
                                            <th class="text-center">Car type</th>
                                            <th class="text-center">Driver license number</th>
                                            <th class="text-center">Tel.</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php for ($i = 0; $i < count($arr_driver); $i++) { ?>
                                            <tr>
                                                <!-- ลำดับ -->
                                                <td> </td>

                                                <!-- name -->
                                                <td onclick="driver_detail(<?php echo $arr_driver[$i]->dri_id ?>)">
                                                    <div class="avatar avatar-lg">
                                                        <img class="avatar-img rounded-circle" src="<?php echo base_url() . '/dri_profile_image/' . $arr_driver[$i]->dri_profile_image ?>">
                                                    </div>
                                                    <?php echo $arr_driver[$i]->dri_name ?>
                                                    <div class="absolute inset-0 rounded-full   shadow-inner" aria-hidden="true">
                                                    </div>
                                                </td>

                                                <!-- car id -->
                                                <td class="text-center" onclick="driver_detail(<?php echo $arr_driver[$i]->dri_id ?>)">
                                                    <?php echo $arr_driver[$i]->car_number; ?>
                                                </td>

                                                <!-- car type name -->
                                                <td onclick="driver_detail(<?php echo $arr_driver[$i]->dri_id ?>)">
                                                    <?php echo $arr_driver[$i]->cart_name; ?>
                                                </td>

                                                <!-- license number -->
                                                <td onclick="driver_detail(<?php echo $arr_driver[$i]->dri_id ?>)">
                                                    <?php echo $arr_driver[$i]->dri_license; ?>
                                                </td>
                                                <!-- tel -->
                                                <td onclick="driver_detail(<?php echo $arr_driver[$i]->dri_id ?>)">
                                                    <?php echo tel_format($arr_driver[$i]->dri_tel); ?>
                                                </td>

                                                <!-- Action -->
                                                <script>
                                                    function show_driver_menu(dri_id) {
                                                        $('.menu').css('display', 'none');
                                                        $('.menu.dri_id_' + dri_id).show();
                                                    } // make it dropdown
                                                    $(document).click(function() {
                                                        var driver = $(".menu");
                                                        if (!driver.is(event.target) && !container.has(event.target)
                                                            .length) {
                                                            driver.hide();
                                                        }
                                                    });
                                                </script>
                                                <td class="text-left" width='15px'>
                                                    <div class="ui dropdown text-center p-2" style="border: 1px solid #ddd; width: 20px; height: 20px; border-radius: 50%" onclick="show_driver_menu(<?php echo $arr_driver[$i]->dri_id ?>)">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                        <div class="menu dri_id_<?php echo $arr_driver[$i]->dri_id ?>" style="right: 0;left: auto;">
                                                            <!-- Button Edit -->
                                                            <div class="item" onclick="location.href='<?php echo base_url() . '/driver_edit/driver_edit/' . $arr_driver[$i]->dri_id ?>';">
                                                                <i class='far fa-edit' style="font-size: 130%;"> </i> &nbsp;
                                                                Edit
                                                            </div>
                                                            <!-- Button Remove -->
                                                            <div class="item test button" onclick="get_id(<?php echo $arr_driver[$i]->dri_id ?>)">
                                                                <i class='fas fa-trash-alt' style="font-size: 130%;"></i>
                                                                &nbsp; &nbsp;
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
            // แทรกปุ่ม เพิ่มพนักงานขับรถ
            var dri_table = $('#driver_list_table').DataTable({
                "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": [0, 6]
                }],
                "order": []
            });

            //ลำดับ
            dri_table.on('order.dt search.dt', function() {
                dri_table.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1 + '.';
                });
            }).draw();

            $("#driver_list_table_filter").append(
                "<a class='ui labeled icon primary button m-2' href='<?php echo base_url() . '/Driver_input/driver_input' ?>'><i class='left plus icon'></i>Add</a>"
            );

        });

        <!--
        /*
        * get_id
        * get dri_id in remove driver modal
        * @input dri_id
        * @output get dri_id in remove driver modal
        * @author
        * @Create Date
        * @Update Date
        */
        -->
        function get_id(dri_id) {
            $('#dri_id').val(dri_id);
        }

        <!--
        /*
        * driver_detail
        * go to driver detail page
        * @input dri_id
        * @output go to driver detail page
        * @author
        * @Create Date
        * @Update Date
        */
        -->
        function driver_detail(dri_id) {
            window.location = '<?php echo base_url('') . '/Driver_show/driver_detail/' ?>' + dri_id;
        }
    </script>

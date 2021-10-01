<div class="ui modal">
    <i class="close icon"></i>
    <div class="header">
        Remove service ?
    </div>
    <div class="content">
        <form action="<?php echo base_url() . '/Driver_show/driver_delete' ?>" method="post">
            <input type="hidden" id="dri_id" name="dri_id">

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
                <h4 class="page-title">Driver list</h4>
                <ul class="breadcrumbs">
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
            </div>
            <div class="container-fluid mb-3">
                <a href="<?php echo base_url() . '/Driver_input/driver_input' ?>" class="btn btn-primary btn-border">
                    <i class="fas fa-plus"></i>
                    <b>Add driver</b>
                </a>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Driver table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="service_list_table" class="display table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id.</th>
                                            <th>Driver name</th>
                                            <th>Identity car</th>
                                            <th>Car type</th>
                                            <th>Driver license number</th>
                                            <th>Tel.</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id.</th>
                                            <th>Driver name</th>
                                            <th>Identity car</th>
                                            <th>Car type</th>
                                            <th>Driver license number</th>
                                            <th>Tel.</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php for ($i = 0; $i < count($arr_driver); $i++) { ?>
                                            <tr>
                                                <!-- Order -->
                                                <td onclick="driver_detail(<?php echo $arr_driver[$i]->dri_id ?>)">
                                                    <?php echo $arr_driver[$i]->dri_id ?>
                                                </td>

                                                <td class="px-4 py-3" onclick="driver_detail(<?php echo $arr_driver[$i]->dri_id ?>)">
                                                    <!-- <div class="flex items-center text-sm">
                                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                            <img class="object-cover w-full h-full rounded-full" src="<?php echo base_url() . '/dri_profile_image/' . $arr_driver[$i]->dri_profile_image ?>" alt="" loading="lazy">
                                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                                        </div> -->

                                                        <div class="flex items-center text-sm" onclick="driver_detail(<?php echo $arr_driver[$i]->dri_id ?>)">
                                                            <?php echo $arr_driver[$i]->dri_name ?>
                                                        </div>
                                                </td>
                                                <!-- name -->
                                                <td onclick="driver_detail(<?php echo $arr_driver[$i]->dri_id ?>)">
                                                    <?php echo $arr_driver[$i]->dri_car_id; ?>
                                                </td>
                                                <!-- name -->
                                                <td onclick="driver_detail(<?php echo $arr_driver[$i]->dri_id ?>)">
                                                    <?php echo $arr_driver[$i]->cart_name; ?>
                                                </td>
                                                <!-- license number -->
                                                <td onclick="driver_detail(<?php echo $arr_driver[$i]->dri_id ?>)">
                                                    <?php echo $arr_driver[$i]->dri_license; ?>
                                                </td>
                                                <!-- license number -->
                                                <td onclick="driver_detail(<?php echo $arr_driver[$i]->dri_id ?>)">
                                                    <?php echo $arr_driver[$i]->dri_tel; ?>
                                                </td>



                                                <!-- Action -->
                                                <script>
                                                    function show_driver_menu(dri_id) {
                                                        $('.menu').css('display', 'none');
                                                        $('.menu.dri_id_' + dri_id).show();
                                                    } // make it dropdown
                                                    $(document).click(function() {
                                                        var container = $(".menu");
                                                        if (!container.is(event.target) && !container.has(event.target).length) {
                                                            container.hide();
                                                        }
                                                    });
                                                </script>
                                                <td class="text-left">
                                                    <div class="ui dropdown" onclick="show_driver_menu(<?php echo $arr_driver[$i]->dri_id ?>)">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                        <div class="menu dri_id_<?php echo $arr_driver[$i]->dri_id ?>">
                                                            <div class="item" onclick="change_location('google')">
                                                                Charge billing
                                                            </div>
                                                            <div class="item" onclick="change_location('google')">
                                                                Edit
                                                            </div>
                                                            <div class="item test button" onclick="get_id(<?php echo $arr_driver[$i]->dri_id ?>)">
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
        function change_location(url) {
            window.location = "https://www.google.com";
        }

        function get_id(dri_id) {
            $('#dri_id').val(dri_id);
        }
    </script>
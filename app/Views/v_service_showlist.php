<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Service List</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Service</a>
                    </li>
                </ul>
            </div>
            <div class="container-fluid">
                <a class="btn btn-primary btn-border">
                    <i class="fas fa-plus"></i>
                    <b>Add service</b>
                </a>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Service table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Con. number</th>
                                            <th>Status</th>
                                            <th>Type</th>
                                            <th>Con. type</th>
                                            <th>Agent</th>
                                            <th>Cut-off</th>
                                            <th>Customer</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Con. number</th>
                                            <th>Status</th>
                                            <th>Type</th>
                                            <th>Con. type</th>
                                            <th>Agent</th>
                                            <th>Cut-off</th>
                                            <th>Customer</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php for ($i = 0; $i < count($arr_service); $i++) { ?>
                                        <tr>
                                            <!-- Order -->
                                            <td onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                <?php echo $i + 1; ?>
                                            </td>
                                            <!-- Container number -->
                                            <td onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                <?php echo $arr_service[$i]->con_number; ?>
                                            </td>

                                            <!-- Status container -->
                                            <td onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                <?php echo $arr_service[$i]->stac_name; ?>
                                            </td>

                                            <!-- Service type -->
                                            <td onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                <?php
                                                if ($arr_service[$i]->ser_type == '1') {
                                                    echo '<span class="text-con-in">ตู้เข้า</span>';
                                                } else if ($arr_service[$i]->ser_type == '2') {
                                                    echo '<span class="text-con-out">ตู้ออก</span>';
                                                } else if ($arr_service[$i]->ser_type == '3') {
                                                    echo '<span class="text-con-drop">ตู้ดรอป</span>';
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
                                                $('.ui.dropdown').dropdown();   // make it dropdown
                                            </script>
                                            <td>
                                                <div class="ui dropdown">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                    <div class="menu">
                                                        <div class="item" onclick="change_location('google')">
                                                            Charge billing
                                                        </div>
                                                        <div class="item" onclick="change_location('google')">
                                                            Edit
                                                        </div>
                                                        <div class="item">
                                                            Remove
                                                        </div>
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
    </script>
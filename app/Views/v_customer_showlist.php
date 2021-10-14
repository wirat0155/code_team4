<style>

</style>
<div class="ui modal">
    <i class="close icon"></i>
    <div class="header">
        Remove Customer ?
    </div>
    <div class="content">
        <form action="<?php echo base_url() . '/Customer_show/customer_delete' ?>" method="post">
            <input type="hidden" id="cus_id" name="cus_id">

            <p style="font-size: 1rem">Are you sure to remove the customer</p>

            <div class="ui info message">
                <div class="header">
                    What happening after remove the customer
                </div>
                <ul class="list">
                    <li>The customer still ramain in database,</li>
                    <li>But you cannot see the customer anymore</li>
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
                <h4 class="pl-3 page-title">CUSTOMER INFORMATION</h4>
            </div>
            <hr width="95%" color="696969">
            <div class="row">
                <ul class="pl-2 mr-5 breadcrumbs d-flex mr-2 align-items-left align-items-md-center"
                    style="height: 30px;">
                    <li class="nav-home">
                        <a href="<?php echo base_url() . '/Dashboard/dashboard_show'?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url() . '/Customer_show/customer_show_ajax'?>">Customer</a>
                    </li>
                </ul>
                <!-- Download Excel -->
                <form id='form_Excel' action="<?php echo base_url(). '/Customer_show/export_customer' ?>" method="post"
                    hidden>
                    <input type="hidden" name="date_range_excel" id="date_range_excel"
                        value="<?php echo $arrivals_date ?>">
                </form>
                <form id='form_date' action="<?php echo base_url() . '/Customer_show/customer_show_ajax' ?>"
                    method="post" class="ml-auto mr-3 text-right">

                    <button type="submit" form="form_Excel" class="shadow-sm btn btn-success btn-border"
                        style=" height: 40px; width: 160px; margin-bottom: 5">
                        <i class="fas fa-file-download mr-1"></i>
                        Download Excel
                    </button>

                    <!-- Date -->

                    <input class="pl-2 shadow-sm rounded" type="text" name="date_range" id="date_range"
                        value="<?php echo $arrivals_date ?>" style=" height: 43px; width: 180px; text-align: center;">
                </form>
            </div>

            <!-- Card Report -->
            <div id="carouselExampleIndicators" class="carousel slide mt-3" data-ride="carousel" hidden>
                <ol class="carousel-indicators" style="margin-bottom: -5px">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="row justify-content-center align-items-center col-md-10 ml-auto mr-auto">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row justify-content-center align-items-center">
                                <div class="d-flex mr-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex mr-2 justify-content-between">
                                                <div>
                                                    <h5><b>Todays Income</b></h5>
                                                    <p class="text-muted">All Customs Value</p>
                                                </div>
                                                <h3 class="text-info fw-bold">$170</h3>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-info w-75" role="progressbar"
                                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex mr-2 justify-content-between mt-2">
                                                <p class="text-muted mb-0">Change</p>
                                                <p class="text-muted mb-0">75%</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mr-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex mr-2 justify-content-between">
                                                <div>
                                                    <h5><b>Total Revenue</b></h5>
                                                    <p class="text-muted">All Customs Value</p>
                                                </div>
                                                <h3 class="text-success fw-bold">$120</h3>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-success w-25" role="progressbar"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex mr-2 justify-content-between mt-2">
                                                <p class="text-muted mb-0">Change</p>
                                                <p class="text-muted mb-0">25%</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mr-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex mr-2 justify-content-between">
                                                <div>
                                                    <h5><b>New Orders</b></h5>
                                                    <p class="text-muted">Fresh Order Amount</p>
                                                </div>
                                                <h3 class="text-danger fw-bold">15</h3>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-danger w-50" role="progressbar"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex mr-2 justify-content-between mt-2">
                                                <p class="text-muted mb-0">Change</p>
                                                <p class="text-muted mb-0">50%</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mr-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex mr-2 justify-content-between">
                                                <div>
                                                    <h5><b>New Users</b></h5>
                                                    <p class="text-muted">Joined New User</p>
                                                </div>
                                                <h3 class="text-secondary fw-bold">12</h3>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-secondary w-25" role="progressbar"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex mr-2 justify-content-between mt-2">
                                                <p class="text-muted mb-0">Change</p>
                                                <p class="text-muted mb-0">25%</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row justify-content-center align-items-center">
                                <div class="d-flex mr-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex mr-2 justify-content-between">
                                                <div>
                                                    <h5><b>Todays Income</b></h5>
                                                    <p class="text-muted">All Customs Value</p>
                                                </div>
                                                <h3 class="text-info fw-bold">$170</h3>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-info w-75" role="progressbar"
                                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex mr-2 justify-content-between mt-2">
                                                <p class="text-muted mb-0">Change</p>
                                                <p class="text-muted mb-0">75%</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mr-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex mr-2 justify-content-between">
                                                <div>
                                                    <h5><b>Total Revenue</b></h5>
                                                    <p class="text-muted">All Customs Value</p>
                                                </div>
                                                <h3 class="text-success fw-bold">$120</h3>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-success w-25" role="progressbar"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex mr-2 justify-content-between mt-2">
                                                <p class="text-muted mb-0">Change</p>
                                                <p class="text-muted mb-0">25%</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mr-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex mr-2 justify-content-between">
                                                <div>
                                                    <h5><b>New Orders</b></h5>
                                                    <p class="text-muted">Fresh Order Amount</p>
                                                </div>
                                                <h3 class="text-danger fw-bold">15</h3>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-danger w-50" role="progressbar"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex mr-2 justify-content-between mt-2">
                                                <p class="text-muted mb-0">Change</p>
                                                <p class="text-muted mb-0">50%</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mr-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex mr-2 justify-content-between">
                                                <div>
                                                    <h5><b>New Users</b></h5>
                                                    <p class="text-muted">Joined New User</p>
                                                </div>
                                                <h3 class="text-secondary fw-bold">12</h3>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-secondary w-25" role="progressbar"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex mr-2 justify-content-between mt-2">
                                                <p class="text-muted mb-0">Change</p>
                                                <p class="text-muted mb-0">25%</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row justify-content-center align-items-center">
                                <div class="d-flex mr-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex mr-2 justify-content-between">
                                                <div>
                                                    <h5><b>Todays Income</b></h5>
                                                    <p class="text-muted">All Customs Value</p>
                                                </div>
                                                <h3 class="text-info fw-bold">$170</h3>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-info w-75" role="progressbar"
                                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex mr-2 justify-content-between mt-2">
                                                <p class="text-muted mb-0">Change</p>
                                                <p class="text-muted mb-0">75%</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mr-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex mr-2 justify-content-between">
                                                <div>
                                                    <h5><b>Total Revenue</b></h5>
                                                    <p class="text-muted">All Customs Value</p>
                                                </div>
                                                <h3 class="text-success fw-bold">$120</h3>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-success w-25" role="progressbar"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex mr-2 justify-content-between mt-2">
                                                <p class="text-muted mb-0">Change</p>
                                                <p class="text-muted mb-0">25%</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mr-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex mr-2 justify-content-between">
                                                <div>
                                                    <h5><b>New Orders</b></h5>
                                                    <p class="text-muted">Fresh Order Amount</p>
                                                </div>
                                                <h3 class="text-danger fw-bold">15</h3>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-danger w-50" role="progressbar"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex mr-2 justify-content-between mt-2">
                                                <p class="text-muted mb-0">Change</p>
                                                <p class="text-muted mb-0">50%</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mr-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex mr-2 justify-content-between">
                                                <div>
                                                    <h5><b>New Users</b></h5>
                                                    <p class="text-muted">Joined New User</p>
                                                </div>
                                                <h3 class="text-secondary fw-bold">12</h3>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-secondary w-25" role="progressbar"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex mr-2 justify-content-between mt-2">
                                                <p class="text-muted mb-0">Change</p>
                                                <p class="text-muted mb-0">25%</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev pr-4 pb-4" href="#carouselExampleIndicators" role="button"
                    data-slide="prev">
                    <span class="big circular ui icon button basic" aria-hidden="true"
                        style="box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;"><i class="angle left icon"></i></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next pl-4 pb-4" href="#carouselExampleIndicators" role="button"
                    data-slide="next">
                    <span class="big circular ui icon button basic" aria-hidden="true"
                        style="box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;"><i
                            class="angle right icon"></i></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="customer_list_table" class="display table table-hover cell-border"
                                    style="border-collapse: collapse !important; border-radius: 10px; overflow: hidden;">
                                    <thead>
                                        <tr style="background-color: #999999; color: white; ">
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Company</th>
                                            <th class="text-center">Responsible person</th>
                                            <th class="text-center">Number container</th>
                                            <th class="text-center">Tel.</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < count($arr_customer); $i++) { ?>
                                        <tr>

                                            <!-- ลำดับ -->
                                            <td> </td>

                                            <!-- ชื่อบริษัท -->
                                            <td onclick="customer_detail(<?php echo $arr_customer[$i]->cus_id ?>)">
                                                <?php
                                                echo $arr_customer[$i]->cus_company_name;
                                                echo ($arr_customer[$i]->cus_branch != null) ? ' (' . $arr_customer[$i]->cus_branch . ') ' : '';
                                                ?>
                                            </td>

                                            <!-- ผู้รับผิดชอบ -->
                                            <td onclick="customer_detail(<?php echo $arr_customer[$i]->cus_id ?>)">
                                                <?php echo $arr_customer[$i]->cus_firstname . ' ' . $arr_customer[$i]->cus_lastname ?>
                                            </td>

                                            <!-- จำนวนตู้ที่ใช้ -->
                                            <td class="text-center"
                                                onclick="customer_detail(<?php echo $arr_customer[$i]->cus_id ?>)">
                                                <?php
                                                    $count_container = 0;
                                                    for ($j = 0; $j < count($arr_service); $j++) {
                                                        if ($arr_customer[$i]->cus_company_name == $arr_service[$j]->cus_company_name) {
                                                            if ($arr_customer[$i]->cus_branch == $arr_service[$j]->cus_branch) {
                                                                $count_container++;
                                                            }
                                                        }
                                                    }
                                                    echo $count_container;
                                                ?>
                                            </td>

                                            <!-- เบอร์โทรศัพท์ -->
                                            <td onclick="customer_detail(<?php echo $arr_customer[$i]->cus_id ?>)">
                                                <?php echo tel_format($arr_customer[$i]->cus_tel) ?>
                                            </td>

                                            <!-- อีเมล -->
                                            <td onclick="customer_detail(<?php echo $arr_customer[$i]->cus_id ?>)">
                                                <?php echo $arr_customer[$i]->cus_email ?>
                                            </td>

                                            <!-- Action -->
                                            <script>
                                            function show_service_menu(cus_id) {
                                                $('.menu').css('display', 'none');
                                                $('.menu.cus_id_' + cus_id).show();
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
                                                <div class="ui dropdown text-center p-2"
                                                    style="border: 1px solid #ddd; width: 20px; height: 20px; border-radius: 50%"
                                                    onclick="show_service_menu(<?php echo $arr_customer[$i]->cus_id ?>)">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                    <div class="menu cus_id_<?php echo $arr_customer[$i]->cus_id ?>"
                                                        style="right: 0;left: auto;">
                                                        <div class="item" onclick="change_location('google')">
                                                            <i class='far fa-money-bill-alt' style="font-size: 110%;"></i> &nbsp;
                                                            Charge billing
                                                        </div>
                                                        <div class="item" onclick="change_location('google')">
                                                            <i class='far fa-edit' style="font-size: 130%;"> </i> &nbsp;
                                                            Edit
                                                        </div>
                                                        <div class="item test button"
                                                            onclick="get_id(<?php echo $arr_customer[$i]->cus_id?>)">
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

        // แทรกปุ่ม เพิ่มรถ
        var cus_table = $('#customer_list_table').DataTable({
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0, 6]
            }],
            "order": []
        });

        //ลำดับ
        cus_table.on('order.dt search.dt', function() {
            cus_table.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1 + '.';
            });
        }).draw();

        $("#customer_list_table_filter").append(
            "<a class='ui labeled icon primary button m-2' href='<?php echo base_url() . '/Customer_input/customer_input' ?>'><i class='left plus icon'></i>Add</a>"
        );

        //Reset Daterange
        $('.cancelBtn').attr('onclick',
            'location.href = \'<?php echo base_url() . '/Customer_show/customer_show_ajax' ?>\'');
        $('.cancelBtn').removeClass('btn-default');
    });



    function change_location(url) {
        window.location = "https://www.google.com";
    }

    function get_id(cus_id) {
        $('#cus_id').val(cus_id);
    }

    function customer_detail(cus_id) {
        window.location = '<?php echo base_url('') . '/Customer_show/customer_detail/' ?>' + cus_id;
    }
    </script>
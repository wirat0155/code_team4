
<div class="ui modal">
    <i class="close icon"></i>
    <div class="header">
        Remove service ?
    </div>
    <div class="content">
        <form action="<?php echo base_url() . '/Service_show/service_delete' ?>" method="post">
            <input type="hidden" id="cus_id" name="cus_id">

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
            <div class="pl-4 mt-4 page-header mb-0">
                <h4 class="pl-3 page-title">CUSTOMER INFORMATION</h4>
            </div>
            <hr width="95%" color="696969">
            <ul class="pl-2 breadcrumbs">
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
    
            
            <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" />

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="customer_list_table" class="display table table-hover cell-border"
                                    style="border-collapse: collapse !important">
                                    <thead>
                                        <tr style="background-color: #999999; color: white;">
                                            <th class="text-center">No</th>
                                            <th class="text-center">Company</th>
                                            <th class="text-center">Responsible person</th>
                                            <th class="text-center">Number Container</th>
                                            <th class="text-center">TEL.</th>
                                            <th class="text-center">EMAIL</th>
                                            <th class="text-center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < count($arr_customer); $i++) { ?>
                                        <tr>

                                            <!-- ลำดับ -->
                                            <td>  </td>

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
                                            <td class="text-left">
                                                <div class="ui dropdown"
                                                    onclick="show_service_menu(<?php echo $arr_customer[$i]->cus_id ?>)">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                    <div class="menu cus_id_<?php echo $arr_customer[$i]->cus_id ?>" style="right: 0;left: auto;">
                                                        <div class="item" onclick="change_location('google')">
                                                            <i class='far fa-money-bill-alt' style="font-size: 110%;"> </i> &nbsp; 
                                                            Charge billing
                                                        </div>
                                                        <div class="item" onclick="change_location('google')">
                                                            <i class='far fa-edit' style="font-size: 130%;">  </i> &nbsp;
                                                            Edit 
                                                        </div>
                                                        <div class="item test button"
                                                            onclick="get_id(<?php echo $arr_customer[$i]->cus_id?>)">
                                                            <i class='fas fa-trash-alt' style="font-size: 130%;"></i> &nbsp; &nbsp;
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

        // แทรกปุ่ม เพิ่มลูกค้า
        var cus_table = $('#customer_list_table').DataTable({
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": [0,6]
            } ],
            "order": []
        });

        //ลำดับ
        cus_table.on( 'order.dt search.dt', function () {
            cus_table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1+'.';
            } );
        } ).draw();

        $("#customer_list_table_filter").append(
            "<a href='<?php echo base_url() . '/Customer_input/customer_input' ?>' class='btn ml-3' style='background-color: #4B75D8; color: white;'> <i class='fas fa-plus mr-1'></i> ADD </a>"
        );

        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });

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
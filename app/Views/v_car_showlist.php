<div class="ui modal">
    <i class="close icon"></i>
    <div class="header">
        Remove Car ?
    </div>
    <div class="content">
        <form action="<?php echo base_url() . '/Car_show/car_delete' ?>" method="post">
            <input type="hidden" id="car_id" name="car_id">

            <p style="font-size: 1rem">Are you sure to remove the Car</p>

            <div class="ui info message">
                <div class="header">
                    What happening after remove the Car
                </div>
                <ul class="list">
                    <li>The car still ramain in database,</li>
                    <li>But you cannot see the car anymore</li>
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
                <h4 class="pl-3 page-title">CAR INFORMATION</h4>
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
                    <a href="<?php echo base_url() . '/Car_show/car_show_ajax'?>">Driver</a>
                </li>
            </ul>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="car_list_table" class="display table table-hover cell-border"
                                    style="border-collapse: collapse !important; border-radius: 10px; overflow: hidden;">
                                    <thead>
                                        <tr style="background-color: #999999; color: white;">
                                            <th>No.</th>
                                            <th class="text-center">Car code</th>
                                            <th class="text-center">Car type</th>
                                            <th class="text-center">Brand</th>
                                            <th class="text-center">Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php for ($i = 0; $i < count($arr_car); $i++) { ?>
                                            <tr>
                                                <!-- ลำดับ -->
                                                <td>  </td>

                                                <!-- รูปภาพ ทะเบียน -->
                                                    <td class="px-4 py-3" onclick="car_detail(<?php echo $arr_car[$i]->car_id ?>)">
                                                        <div class = "avatar avatar-lg mr-4">
                                                            <img class="avatar-img rounded-circle" src="<?php echo base_url() . '/car_image/' . $arr_car[$i]->car_image ?>">
                                                        </div>
                                                        <?php echo $arr_car[$i]->car_code . ' ' . $arr_car[$i]->prov_name ?>
                                                    </td>


                                                <!-- Cartype name-->
                                                    <td class="px-4 py-3 text-sm " onclick="car_detail(<?php echo $arr_car[$i]->car_id ?>)">
                                                        <?php echo $arr_car[$i]->cart_name ?>
                                                    </td>

                                                <!-- Brand -->
                                                    <td class="px-4 py-3 text-sm " onclick="car_detail(<?php echo $arr_car[$i]->car_id ?>)">
                                                        <?php echo $arr_car[$i]->car_brand ?>
                                                    </td>

                                                <!-- Status -->
                                                    <td class="px-4 py-3 text-sm text-center" style="min-width: 100px;">
                                                        <?php
                                                            if ($arr_car[$i]->car_status == 1) {
                                                                echo '<span class="text-con-ready bg-success text-white p-2" style="border-radius: 5px;">Ready</span>'
                                                                ;
                                                            } else if ($arr_car[$i]->car_status == 2) {
                                                                echo '<span class="text-con-damaged bg-danger text-white p-2" style="border-radius: 5px;">Damaged</span>';
                                                            } else if ($arr_car[$i]->car_status == 3) {
                                                                echo '<span class="text-con-repair bg-warning text-white p-2" style="border-radius: 5px;">Repair</span>';
                                                        } ?>
                                                    </td>

                                                <!-- Action -->
                                                <script>
                                                    function show_service_menu(car_id) {
                                                        $('.menu').css('display', 'none');
                                                        $('.menu.car_id_' + car_id).show();
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
                                                        onclick="show_service_menu(<?php echo $arr_car[$i]->car_id ?>)">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                        <div class="menu car_id_<?php echo $arr_car[$i]->car_id ?>" style="right: 0;left: auto;">
                                                            <!-- Button Edit -->
                                                            <div class="item" onclick="location.href='<?php echo base_url() . '/Car_edit/car_edit/' . $arr_car[$i]->car_id ?>';">
                                                                <i class='far fa-edit' style="font-size: 130%;">  </i> &nbsp;
                                                                Edit
                                                            </div>
                                                            <!-- Button Remove -->
                                                            <div class="item test button"
                                                                onclick="get_id(<?php echo $arr_car[$i]->car_id?>)">
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

        // แทรกปุ่ม เพิ่มรถ
        var car_table = $('#car_list_table').DataTable({
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": [0,5]
            } ],
            "order": []
        });

        //ลำดับ
        car_table.on( 'order.dt search.dt', function () {
            car_table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1+'.';
            } );
        } ).draw();

        $("#car_list_table_filter").append(
            "<a class='ui labeled icon primary button m-2' href='<?php echo base_url() . '/Car_input/car_input' ?>'><i class='left plus icon'></i>Add</a>"
        );

    });

    <!--
    /*
    * get_id
    * get car_id and show in remove car modal
    * @input car_id
    * @output get car_id and show in remove car modal
    * @author
    * @Create Date
    * @Update Date
    */
    -->
    function get_id(car_id) {
        $('#car_id').val(car_id);
    }

    <!--
    /*
    * car_detail
    * go to car detail page
    * @input car_id
    * @output go to car detail page
    * @author
    * @Create Date
    * @Update Date
    */
    -->
    function car_detail(car_id) {
        window.location = '<?php echo base_url('') . '/Car_show/car_detail/' ?>' + car_id;
    }
    </script>

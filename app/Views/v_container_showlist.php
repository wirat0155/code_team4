<div class="ui modal">
    <i class="close icon"></i>
    <div class="header">
        Remove Container ?
    </div>
    <div class="content">
        <form action="<?php echo base_url() . '/Container_show/Container_delete' ?>" method="post">
            <input type="hidden" id="con_id" name="con_id">

            <p style="font-size: 1rem">Are you sure to remove the Container</p>

            <div class="ui info message">
                <div class="header">
                    What happening after remove the Container
                </div>
                <ul class="list">
                    <li>The container still ramain in database,</li>
                    <li>But you cannot see the container anymore</li>
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
                <h4 class="pl-3 page-title">CONTAINER INFORMATION</h4>
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
                    <a href="<?php echo base_url() . '/Container_show/Container_show_ajax' ?>">Container</a>
                </li>
            </ul>




            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="container_list_table" class="display table table-hover cell-border"
                                    style="border-collapse: collapse !important">
                                    <thead>
                                        <tr style="background-color: #999999; color: white;">
                                            <th>No.</th>
                                            <th class="text-center">Number</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Type</th>
                                            <th class="text-center">Size</th>
                                            <th class="text-center">Agent</th>
                                            <th class="text-center"></th>

                                        </tr>
                                    </thead>

                                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                        <?php for ($i = 0; $i < count($arr_container); $i++) { ?>
                                        <tr class="text-gray-700 dark:text-gray-400">

                                            <td></td>


                                            <!-- หมายเลขตู้ -->
                                            <td class="px-4 py-3"
                                                onclick="container_detail(<?php echo $arr_container[$i]->con_id ?>)">
                                                <div class="flex items-center text-sm">
                                                    <?php echo $arr_container[$i]->con_number ?>
                                                </div>
                                            </td>

                                            <!-- สถานะตู้ -->
                                            <td class="px-4 py-3 text-sm"
                                                onclick="container_detail(<?php echo $arr_container[$i]->con_id ?>)">
                                                <?php echo $arr_container[$i]->stac_name ?>
                                            </td>

                                            <!-- ประเภทตู้ -->
                                            <td class="px-4 py-3 text-sm text-left"
                                                onclick="container_detail(<?php echo $arr_container[$i]->con_id ?>)">
                                                <?php echo $arr_container[$i]->cont_name ?>
                                            </td>

                                            <!-- ขนาดตู้ -->
                                            <td class="px-4 py-3 text-sm text-center"
                                                onclick="container_detail(<?php echo $arr_container[$i]->con_id ?>)">
                                                <?php echo $arr_container[$i]->size_name ?>
                                            </td>

                                            <!-- เอเย่นต์ -->
                                            <td class="px-4 py-3 text-sm"
                                                onclick="container_detail(<?php echo $arr_container[$i]->con_id ?>)">
                                                <?php echo $arr_container[$i]->agn_company_name ?>
                                            </td>

                                            <!-- Action -->
                                            <script>
                                            function show_container_menu(con_id) {
                                                $('.menu').css('display', 'none');
                                                $('.menu.con_id_' + con_id).show();
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
                                                    onclick="show_container_menu(<?php echo $arr_container[$i]->con_id ?>)">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                    <div class="menu con_id_<?php echo $arr_container[$i]->con_id ?>"
                                                        style="right: 0;left: auto;">
                                                        <!-- Button Edit -->
                                                        <div class="item" onclick="change_location('google')">
                                                            <i class='far fa-edit' style="font-size: 130%;"> </i> &nbsp;
                                                            Edit
                                                        </div>
                                                        <!-- Button Remove -->
                                                        <div class="item test button"
                                                            onclick="get_id(<?php echo $arr_car[$i]->car_id ?>)">
                                                            <i class='fas fa-trash-alt' style="font-size: 130%;"></i>
                                                            &nbsp; &nbsp;
                                                            Remove
                                                        </div>
                                                        <script>
                                                        $('.ui.modal').modal('attach events', '.test.button', 'toggle');
                                                        </script>

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

        // แทรกปุ่ม เพิ่มคอนเทรนเนอร์
        var con_table = $('#container_list_table').DataTable({
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0, 6]
            }],
            "order": []
        });

        //ลำดับ
        con_table.on('order.dt search.dt', function() {
            con_table.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1 + '.';
            });
        }).draw();

        $("#container_list_table_filter").append(
            "<a class='ui labeled icon primary button m-2' href='<?php echo base_url() . '/Container_input/container_input' ?>'><i class='left plus icon'></i>Add</a>"
        );

    });



    function change_location(url) {
        window.location = "https://www.google.com";
    }

    function get_id(con_id) {
        $('#con_id').val(con_id);
    }

    function container_detail(con_id) {
        window.location = '<?php echo base_url('') . '/Container_show/container_detail/' ?>' + con_id;
    }
    </script>
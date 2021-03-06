<!--
* v_container_showlist
* Display container list page
* @input    array of container
* @output   container list page
* @author   Wirat
* @Create Date  2564-07-28
*/
-->

<div class="ui modal">
    <i class="close icon"></i>
    <div class="header">
        Remove Container ?
    </div>
    <div class="content">
        <form action="<?php echo base_url() . '/Container_show/Container_delete' ?>" method="post">
            <input type="hidden" id="con_id" name="con_id">

            <p style="font-size: 1rem">Are you sure to remove the container</p>

            <div class="ui info message">
                <div class="header">
                    What happening after remove the container
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
                                    style="border-collapse: collapse !important; border-radius: 10px; overflow: hidden;">
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

                                            <!-- ?????????????????????????????? -->
                                            <td class="px-4 py-3"
                                                onclick="container_detail(<?php echo $arr_container[$i]->con_id ?>)">
                                                <div class="flex items-center text-sm">
                                                    <?php echo $arr_container[$i]->con_number ?>
                                                </div>
                                            </td>

                                            <style>
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
                                            </style>

                                            <!-- ????????????????????????????????? -->
                                            <td onclick="container_detail(<?php echo $arr_container[$i]->con_id ?>)" class="px-4 py-3 text-sm text-center" style="min-width: 100px;">
                                                <?php
                                                // 1 = import (dodgerblue)
                                                if($arr_container[$i]->con_stac_id == '1'){
                                                    echo '<span class="bg-import text-white p-2" style="border-radius: 5px;">' . $arr_container[$i]->stac_name . '<span>';
                                                }
                                                // 4 = export (springgreen)
                                                else if($arr_container[$i]->con_stac_id == '4' || $arr_container[$i]->con_stac_id == '0' || $arr_container[$i]->con_stac_id == ''){
                                                    echo '<span class="bg-export text-white p-2" style="border-radius: 5px;">Export<span>';
                                                }
                                                // else = drop (orange)
                                                else {
                                                    echo '<span class="bg-drop text-white p-2" style="border-radius: 5px;">' . $arr_container[$i]->stac_name . '<span>';
                                                }
                                                ?>
                                            </td>

                                            <!-- ??????????????????????????? -->
                                            <td class="px-4 py-3 text-sm text-left"
                                                onclick="container_detail(<?php echo $arr_container[$i]->con_id ?>)">
                                                <?php echo $arr_container[$i]->cont_name ?>
                                            </td>

                                            <!-- ????????????????????? -->
                                            <td class="px-4 py-3 text-sm"
                                                onclick="container_detail(<?php echo $arr_container[$i]->con_id ?>)">
                                                <?php echo $arr_container[$i]->size_name ?>
                                            </td>

                                            <!-- ???????????????????????? -->
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
                                            <td class="text-left" width='15px'>
                                                <div class="ui dropdown text-center p-2" style="border: 1px solid #ddd; width: 20px; height: 20px; border-radius: 50%"
                                                    onclick="show_container_menu(<?php echo $arr_container[$i]->con_id ?>)">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                    <div class="menu con_id_<?php echo $arr_container[$i]->con_id ?>"
                                                        style="right: 0;left: auto;">
                                                        <!-- Button Edit -->
                                                        <div class="item" onclick="location.href='<?php echo base_url() . '/Container_edit/container_edit/' . $arr_container[$i]->con_id ?>';">
                                                            <i class='far fa-edit' style="font-size: 130%;"> </i> &nbsp;
                                                            Edit
                                                        </div>
                                                        <!-- Button Remove -->
                                                        <div class="item test button"
                                                            onclick="get_id(<?php echo $arr_container[$i]->con_id ?>)">
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

        // add container button
        var con_table = $('#container_list_table').DataTable({
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0, 6]
            }],
            "order": []
        });

        // order
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

    /*
    * get_id
    * get con_id and show in remove container modal
    * @input    con_id
    * @output   get con_id and show in remove container modal
    * @author   Wirat
    * @Create Date  2564-07-28
    */
    function get_id(con_id) {
        $('#con_id').val(con_id);
    }

    /*
    * container_detail
    * go to container detail page
    * @input    con_id
    * @output   go to container detail page
    * @author   Wirat
    * @Create Date  2564-07-28
    */
    function container_detail(con_id) {
        window.location = '<?php echo base_url('') . '/Container_show/container_detail/' ?>' + con_id;
    }
    </script>

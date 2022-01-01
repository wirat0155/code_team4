<!--
* v_history_show_by_time
* Display show history by time
* @input    
* @output   show history by time page
* @author   Benjapon
* @Create Date  2564-12-14
*/
-->
<style>
    .feed-item-secondary::after {
        background: grey !important;
    }
</style>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="pl-3 page-title">HISTORY LOG</h4>
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
                        <a class="cl-blue" href="<?php echo base_url() . '/Service_show/service_show_ajax'?>">Service
                            information</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="<?php echo base_url() . '/Service_show/service_damaged_show_ajax' ?>">Service</a>
                    </li> -->
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">History log</a>
                    </li>
                </ul>
            </div>

            <div class="ui menu secondary pointing mx-5">
                <a class="active item" data-tab="service">Service</a>
                <a class="item" data-tab="time">Time</a>
                <div class="right menu">
                    <div class="ui transparent left icon input item">
                        <input type="text" placeholder="Search...">
                        <i class="search icon"></i>
                    </div>
                </div>
            </div>

            <!-- service tab -->
            <div class="ui tab active mx-5" data-tab="service">
                <h3>Change of container by service</h3>

                <!-- show latest container number -->
                <div class="ui styled fluid accordion">
                    <?php for ($i = 0; $i < count($arr_latest_con_number); $i++) { ?>
                    <div class="title">
                        <?php echo $arr_latest_con_number[$i]->con_number;?>
                        <div style="float: right">
                            create by wirat
                            <i class="ml-5 dropdown icon"></i>
                        </div>
                    </div>

                    <div class="content">
                        <ol class="activity-feed">
                            <?php for ($j = count($arr_change_container[$i]) - 2; $j >= 0; $j--) { ?>
                                <li class="feed-item feed-item-secondary">
                                    <div class="row">

                                        <!-- container number -->
                                        <div class="col">
                                            <h4>
                                                <?php echo $arr_change_container[$i][$j]->con_number ?>
                                            </h4>

                                        <!-- changed container time -->
                                        </div>
                                        <div class="col">
                                            <time class="date">
                                                <i class="bi bi-clock mr-3"></i>
                                                <?php echo diff_datetime($arr_change_container[$i][$j]->chl_date) ?>
                                            </time>

                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ol>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <!-- time tab -->
            <div class="ui tab mx-5" data-tab="time">
                <h3>Change of container by time</h3>

                <div class="table-responsive">
                    <table id="history_list_table" class="display table table-hover cell-border" style="border-collapse: collapse !important; border-radius: 10px; overflow: hidden;">
                        <thead>
                            <tr>
                                <th tabindex="0" aria-controls="history_list_table" rowspan="1" colspan="1" aria-label="Date and time: activate to sort column ascending">Date
                                    and time</th>
                                <th class="text-center sorting_asc" tabindex="0" aria-controls="history_list_table" rowspan="1" colspan="1" aria-label="Old container: activate to sort column ascending">Old
                                    container</th>
                                <th class="text-center sorting_asc" tabindex="0" aria-controls="history_list_table" rowspan="1" colspan="1" aria-label="New container: activate to sort column ascending">New
                                    container</th>
                                <th class="text-center sorting_asc" tabindex="0" aria-controls="history_list_table" rowspan="1" colspan="1" aria-label="Create by: activate to sort column ascending">
                                    Create by
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < count($arr_history); $i++) { ?>
                                <tr>
                                    <td><?php echo date_thai($arr_history[$i]->chl_date)?></td>
                                    <td><?php echo $arr_history[$i]->old_con_number?></td>
                                    <td><?php echo $arr_history[$i]->new_con_number?></td>
                                    <td>ABC</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- table -->
<script>
$('.menu.secondary .item').tab();
$('.ui.accordion').accordion();

$(document).ready(function() {
    // add service button
    var his_table = $('#history_list_table').DataTable({
        "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": [0, 4]
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
// search
var columns = $('.con_number');
var rows = $('tbody tr');
$('#search').keyup(function() {
    rows.hide();
    for (var i = columns.length; i > 0; i--) {
        if ($('.con_number_' + i).text().toLowerCase().search($(this).val().toLowerCase()) >= 0) {
            $('.con_number' + i).show();
        }
    }
});
</script>
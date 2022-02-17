<!--
* v_history_show_by_time
* Display show history by time
* @input    
* @output   show history by time page
* @author   Benjapon
* @Create Date  2564-12-14
*/
-->
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
<style>
    .feed-item-secondary::after {
        background: grey !important;
    }

    #history_list_table_filter {
        display: none !important;
    }

    .h_service_change h3, #month_picker{
        display: inline-block !important;
    }

    .ui.popup{
        position: absolute; 
        inset: 38px auto auto -125px !important;
    }

    .calendar .ui.input input{
        width: 135px !important;
    }

    .content{
        overflow: visible !important;
    }

    .hidden, .search_hidden, .ser_id, .latest_con_number{
        display: none !important;
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
                        <input type="text" placeholder="Search..." id="search">
                        <i class="search icon"></i>
                    </div>
                </div>
            </div>

            <div class="mb-3 h_service_change mx-5">
                <h3>Change of container by service</h3>
                
                <!-- Month -->
                <div class="ui calendar float-right month_picker" >
                    <div class="ui input">
                        <input type="text" placeholder="Time" ondblclick="change_month();" value="<?php echo $date_now ?>">
                    </div>
                </div>
            </div>

            <!-- service tab -->
            <div class="ui tab active mx-5" data-tab="service" id="ui_service">

                <!-- show latest container number -->
                <div class="ui styled fluid accordion">
                    <div class="title ser_no_data hidden">
                        No matching records found
                    </div>

                    <?php for ($i = 0; $i < count($arr_latest_con_number); $i++) { ?>
                    <div class="title latest_con ser_id_<?php echo $arr_latest_con_number[$i]->ser_id?> ser_title">
                        <?php echo $arr_latest_con_number[$i]->con_number;?>
                        <div class="latest_con_number"><?php echo $arr_latest_con_number[$i]->con_number;?></div>
                        <div style="float: right">
                            create by <?php echo $arr_change_container[$i][count($arr_change_container[$i]) - 2]->user_name_th ?>
                            <i class="ml-5 dropdown icon"></i>
                        </div>
                    </div>

                    <div class="content ser_id_<?php echo $arr_latest_con_number[$i]->ser_id?> ser_content">
                        <ol class="activity-feed">
                            <?php for ($j = count($arr_change_container[$i]) - 2; $j >= 0; $j--) { ?>
                                <li class="feed-item feed-item-secondary">
                                    <div class="row">

                                        <!-- container number -->
                                        <div class="col">
                                            <h4>
                                                <?php echo $arr_change_container[$i][$j]->con_number ?>
                                            </h4>
                                        </div>

                                        <!-- changed container time -->
                                        <div class="col">
                                            <time class="date">
                                                <i class="bi bi-clock mr-3"></i>
                                                <?php echo diff_datetime($arr_change_container[$i][$j]->chl_date) ?>
                                            </time>
                                            <div class="hidden"><?php echo date_thai($arr_change_container[$i][$j]->chl_date) ?></div>
                                        </div>

                                        <div class="col">
                                            create by <?php echo $arr_change_container[$i][$j]->user_name_th ?>
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
            <div class="ui tab mx-5" data-tab="time" id="ui_time">
                <div class="table-responsive">
                    <table id="history_list_table" class="display table table-hover cell-border" style="border-collapse: collapse !important; border-radius: 10px; overflow: hidden;">
                        <thead>
                            <tr>
                                <th>Date and time</th>
                                <th>Old container</th>
                                <th>New container</th>
                                <th>Create by</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < count($arr_history); $i++) { ?>
                                <tr id='time_id_<?php echo $arr_history[$i]->old_ser_id?>' class="time_history">
                                    <td class="<?php echo $arr_history[$i]->old_ser_id?>" name="date_time"><?php echo date_thai($arr_history[$i]->chl_date, true)?></td>
                                    <td class="<?php echo $arr_history[$i]->old_ser_id?>" name="old_con"><?php echo $arr_history[$i]->old_con_number?></td>
                                    <td class="<?php echo $arr_history[$i]->old_ser_id?>" name="new_con"><?php echo $arr_history[$i]->new_con_number?></td>
                                    <td class="<?php echo $arr_history[$i]->old_ser_id?>" name="create"><?php echo $arr_history[$i]->user_name_th?></td>
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
$('.month_picker').calendar({
    type: 'month',
    minDate: new Date($("td[name=date_time]:eq(0)").text()),
    maxDate: new Date(),
    popupOptions: {
        position: 'bottom right',
        lastResort: 'bottom right',
    },
});

if($('.ser_title:visible').length == 0){
    $('.ser_no_data').removeClass('hidden');
}else{
    $('.ser_no_data').addClass('hidden');
}

// Change Header Change of container by service or time
$( ".item" ).click(function() {
    if($( "#ui_service" ).hasClass('active')){
        $( ".h_service_change h3").text('Change of container by service');
    }else{
        $( ".h_service_change h3").text('Change of container by time');
    }
});

$(document).ready(function() {
    // dataTable to table
    $('#history_list_table').DataTable({
        "columnDefs": [{
            "searchable": false
        }],
        "order": []
    });

    change_month();
    $('.popup.calendar').attr('onmouseout','change_month()');
});

//Search to search table
$( "#search" ).keyup(function() {
    
    change_month();
    
    var ser_title = $('.ser_title');
    var ser_content = $('.ser_content');
    ser_title.hide();
    ser_content.hide();
    for(var i = 0; i < ser_title.length; i++){
        if($('.ser_content:eq(' + i + ') ol li div div h4').text().toLowerCase().search($(this).val().toLowerCase()) >= 0 ||
        $('.ser_title:eq(' + i + ') .latest_con_number').text().toLowerCase().search($(this).val().toLowerCase()) >= 0 ){
            $('.ser_title:eq(' + i + ')').show();
        }
    }

    if($('.ser_title:visible').length == 0){
        $('.ser_no_data').removeClass('hidden');
    }else{
        $('.ser_no_data').addClass('hidden');
    }

});

function change_month(){
    // Get Value Select Date
    var full_month = $('.calendar .ui.input input').val();
    // Convert Format Full Month  January 2022 to Short Month Jan 2022
    var month_year = full_month.substring(0,3) + ' ' +  full_month.substring(full_month.length - 4);
    
    //by Time and search
    $('input[type=search]').val(month_year + ' ' + $('#search').val());
    $('input[type=search]').keyup();

    //by service
    var ser_title = $('.ser_title');
    var ser_content = $('.ser_content');
    ser_title.hide();
    ser_content.hide();
    for(var i = 0; i < ser_title.length; i++){
        if($('.ser_content:eq(' + i + ')').text().toLowerCase().search(month_year.toLowerCase()) >= 0){
            $('.ser_title:eq(' + i + ')').show();
        }
    }
    console.log(month_year);
}



</script>
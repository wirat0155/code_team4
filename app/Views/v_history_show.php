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
                        No data !!
                    </div>

                    <?php for ($i = 0; $i < count($arr_latest_con_number); $i++) { ?>
                    <div class="title latest_con ser_id_<?php echo $arr_latest_con_number[$i]->ser_id?>">
                        <div class="ser_id"><?php echo $arr_latest_con_number[$i]->ser_id?></div>
                        <?php echo $arr_latest_con_number[$i]->con_number;?>
                        <div class="latest_con_number"><?php echo $arr_latest_con_number[$i]->con_number;?></div>
                        <div style="float: right">
                            create by <?php echo $arr_change_container[$i][count($arr_change_container[$i]) - 2]->user_name_th ?>
                            <i class="ml-5 dropdown icon"></i>
                        </div>
                    </div>

                    <div class="content ser_id_<?php echo $arr_latest_con_number[$i]->ser_id?>">
                        <ol class="activity-feed">
                            <?php for ($j = count($arr_change_container[$i]) - 2; $j >= 0; $j--) { ?>
                                <li class="feed-item feed-item-secondary">
                                    <div class="row">

                                        <!-- container number -->
                                        <div class="col">
                                            <h4>
                                                <div class="history_ser_id_<?php echo $arr_latest_con_number[$i]->ser_id?>" hidden><?php echo $arr_change_container[$i][$j]->con_number ?></div>
                                                <?php echo $arr_change_container[$i][$j]->con_number ?>
                                            </h4>
                                        </div>

                                        <!-- changed container time -->
                                        <div class="col">
                                            <time class="date">
                                                <i class="bi bi-clock mr-3"></i>
                                                <?php echo diff_datetime($arr_change_container[$i][$j]->chl_date) ?>
                                                <input type="text" name="date<?php echo $arr_latest_con_number[$i]->ser_id?>" value="<?php echo diff_datetime($arr_change_container[$i][$j]->chl_date) ?>" hidden>
                                            </time>
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
                        <tfoot>
                            <tr>
                                <td colspan="4" style="text-align: center" class="time_no_data hidden"> No data !! </td>
                            </tr>
                        </tfoot>
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
});

function search_history() {
    $('input[type=search]').val($('#search').val());
    $('input[type=search]').keyup();

    var ser_change_con = document.getElementsByClassName("ser_id");
    var latest_con_number = document.getElementsByClassName("latest_con_number");
    // console.log(latest_con_number[0].innerHTML);

    for(var i = 0; i < latest_con_number.length ;i++){
        var count_repeat_value = 0;
        var ser_id = ser_change_con[i].innerText;
        if(latest_con_number[i].innerHTML.search($('#search').val()) >= 0){
            count_repeat_value++;
        }

        var history = document.getElementsByClassName("history_ser_id_"+ser_id);

        for(var j = 0; j < history.length ; j++){        
            if(history[j].innerHTML.search($('#search').val()) >= 0){
                count_repeat_value++;
                console.log(history[j].innerHTML);
            }
        }

        if(count_repeat_value == 0){
            $('.ser_id_' + ser_id).addClass('hidden search_hidden');
        }else{
            $('.ser_id_' + ser_id).removeClass('search_hidden');
        }

    }

    // if Class Name is latest_con = Class Name is latest_con hidden
    // is if hidden all, js will show message no data 
    if(document.getElementsByClassName("latest_con").length == document.getElementsByClassName("latest_con hidden").length){
        $('.ser_no_data').removeClass('hidden');
    }else{
        $('.ser_no_data').addClass('hidden');
    }
}

function change_month(){
    // Today
    var today = new Date();
    today = today.toString();
    today = today.substring(4, 7) + ' ' + today.substring(11, 15);
    // Get Value Select Date
    var full_month = $('.calendar .ui.input input').val();
    // Convert Format Full Month  January 2022 to Short Month Jan 2022
    var month_year = full_month.substring(0,3) + ' ' +  full_month.substring(full_month.length - 4);
    // Get Array Elements By Name date_time
    var date_change_con = document.getElementsByName("date_time");
    for(var i = 0; i < date_change_con.length ;i++){
        // if length == 16 is Day < 10
        if(date_change_con[i].innerHTML.length == 16){
            var history_month = date_change_con[i].innerHTML.substring(2, 10);
        }
        // if length != 16 is Day > 9
        else{
            var history_month = date_change_con[i].innerHTML.substring(3, 11);
        }

        // if Text in Elements = Value in Select Date
        if(history_month != month_year){
            // Hide tr = id time_id_ser_id 
            $('#time_id_' + date_change_con[i].className).addClass('hidden');
        }else{
            // show tr = id time_id_ser_id 
            $('#time_id_' + date_change_con[i].className).removeClass('hidden');
        }
    }

    // if Class Name is time_history = Class Name is time_history hidden
    // is if hidden all, js will show message no data 
    if(document.getElementsByClassName("time_history").length == document.getElementsByClassName("time_history hidden").length && document.getElementsByClassName("time_history").length != 0){
        $('.time_no_data').removeClass('hidden');
    }else{
        $('.time_no_data').addClass('hidden');
    }

    // Get Array Elements By Class Name ser_id
    var ser_change_con = document.getElementsByClassName("ser_id");
    for(var i = 0; i < ser_change_con.length ;i++){
        var ser_id = ser_change_con[i].innerText;
        // Get Array Elements By Name date + ser_id
        var date_change_con = document.getElementsByName("date"+ser_id);
        var count_repeat_month = 0;
        
        for(var i = 0; i < date_change_con.length ;i++){
            console.log(date_change_con[i].value.substring(2, 11));
            if(month_year == today){
                if(date_change_con[i].value.substring(2, 10) == month_year || date_change_con[i].value.substring(2, 9) == "Day ago" || date_change_con[i].value.substring(2, 10) == "Days ago" || 
                    date_change_con[i].value.substring(2, 11) == "Hours ago" || date_change_con[i].value.substring(2, 12) == " Hours ago" || date_change_con[i].value.substring(2, 11) == " Mins ago" || 
                    date_change_con[i].value.substring(2, 10) == "Mins ago"){
                    count_repeat_month++;
                }
            }else{
                if(date_change_con[i].value.substring(2, 10) == month_year){
                    count_repeat_month++;
                }
            }
        }

        // if service no have date = month_year js will hide service
        if(count_repeat_month == 0){
            $('.ser_id_' + ser_id).addClass('hidden');
        }else{
            $('.ser_id_' + ser_id).removeClass('hidden');
        }
    }

    // if Class Name is latest_con = Class Name is latest_con hidden
    // is if hidden all, js will show message no data 
    if(document.getElementsByClassName("latest_con").length == document.getElementsByClassName("latest_con hidden").length){
        $('.ser_no_data').removeClass('hidden');
    }else{
        $('.ser_no_data').addClass('hidden');
    }
    search_history();
}



</script>
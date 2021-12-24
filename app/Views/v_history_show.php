<!--
* v_history_show_by_time
* Display show history by time
* @input    
* @output   show history by time page
* @author   Benjapon
* @Create Date  2564-12-14
*/
-->
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
                        <a class="cl-blue" href="<?php echo base_url() . '/Service_show/service_show_ajax'?>">Service information</a>
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
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="ui pointing secondary menu">
                                <a class="item active" data-tab="first">Service</a>
                                <a class="item" data-tab="second">Time</a>

                                <div class="ui transparent left icon input">
                                    <input type="text" class="form-control form-control-sm col-md-4" placeholder="Search...">
                                    <i class="search icon"></i>
                                </div>

                            </div>

                            <div class="ui tab segment active" data-tab="first">
                                <a>Change of container by service
                                </a>
                                <div class="ui styled fluid accordion">
                                    <?php for ($i = 0; $i < count($arr_change_container); $i++) { ?>
                                    <?php for ($j = count($arr_change_container[$i])-3;$j>0;$j--) { ?>
                                    <div class="title">
                                        <i class="dropdown icon"></i>
                                        <?php echo $arr_change_container[$i][$j+1]->con_number;?>
                                        <?php } ?>
                                    </div>
                                    <div class="content">
                                        <p><?php echo $arr_change_container[$i][$j+2]->con_number.' '.$arr_change_container[$i][$j+2]->chl_date;?></p>
                                        <p><?php echo $arr_change_container[$i][$j+1]->con_number.' '.$arr_change_container[$i][$j+1]->chl_date;?></p>
                                        <p><?php echo $arr_change_container[$i][$j]->con_number.' '.$arr_change_container[$i][$j]->chl_date;?></p>
                                    </div>
                                    <?php } ?>
                                    <!-- <div class="active title">
                                        <i class="dropdown icon"></i>
                                        What kinds of dogs are there?
                                    </div>
                                    <div class="active content">
                                        <p>There are many breeds of dogs. Each breed varies in size and temperament. Owners often select a breed of dog that they find to be compatible with their own lifestyle and desires from a companion.</p>
                                    </div>
                                    <div class="title">
                                        <i class="dropdown icon"></i>
                                        How do you acquire a dog?
                                    </div>
                                    <div class="content">
                                        <p>Three common ways for a prospective owner to acquire a dog is from pet shops, private owners, or shelters.</p>
                                        <p>A pet shop may be the most convenient way to buy a dog. Buying a dog from a private owner allows you to assess the pedigree and upbringing of your dog before choosing to take it home. Lastly, finding your dog from a shelter, helps give a good home to a dog who may not find one so readily.</p>
                                    </div> -->
                                </div>
                            </div>
                            <div class="ui tab segment" data-tab="second">
                                <a>Change of container by time
                                </a>
                                <div class="table-responsive">
                                    <table id="history_list_table" class="display table table-hover cell-border" style="border-collapse: collapse !important; border-radius: 10px; overflow: hidden;">
                                        <thead>
                                            <tr>
                                                <th class="text-center sorting_asc" tabindex="0" aria-controls="history_list_table" rowspan="1" colspan="1" aria-label="Date and time: activate to sort column ascending">Date and time</th>
                                                <th class="text-center sorting_asc" tabindex="0" aria-controls="history_list_table" rowspan="1" colspan="1" aria-label="Old container: activate to sort column ascending">Old container</th>
                                                <th class="text-center sorting_asc" tabindex="0" aria-controls="history_list_table" rowspan="1" colspan="1" aria-label="New container: activate to sort column ascending">New container</th>
                                                <th class="text-center sorting_asc" tabindex="0" aria-controls="history_list_table" rowspan="1" colspan="1" aria-label="Create by: activate to sort column ascending">Create by</th>
                                                <th class="text-center"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 0; $i < count($arr_history); $i++) { ?>
                                            <tr>
                                                <td> <?php echo $arr_history[$i]->chl_date;?> </td>
                                                <td> <?php echo $arr_history[$i]->old_con_number?> </td>
                                                <td> <?php echo $arr_history[$i]->new_con_number;?></td>
                                                <td> ABC </td>
                                                <!-- Action -->
                                                <script>
                                                function show_history_menu(chl_id) {
                                                    $('.menu').css('display', 'none');
                                                    $('.menu.chl_id_' + con_id).show();
                                                } // make it dropdown
                                                $(document).click(function() {
                                                    var history = $(".menu");
                                                    if (!history.is(event.target) && !history.has(event.target)
                                                        .length) {
                                                        history.hide();
                                                    }
                                                });
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
    </div>
</div>




<!-- table -->

<script>
$('.menu .item').tab();
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
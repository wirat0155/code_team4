<!--
* v_damaged_container_showlist
* Display damaged container page
* @input    array of service
* @output   damaged container page
* @author   Benjapon
* @Create Date  2564-12-14
*/
-->


<style>
#bill_modal {
    min-height: 50% !important;
    max-height: 100% !important;
    height: 500px !important;
}

.bill_actions {
    bottom: 0 !important;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {

    margin-left: 10px !important;
    opacity: 1;

}

.total .title {
    font-weight: bold !important;
}

#vat {
    width: 80px !important;
}

.modal.modal_cost {
    overflow: visible !important;
}

.modal_cost .content {
    max-height: 120% !important;
}

.icon.btn_cost {
    font-weight: normal !important;
    color: #c7c7c7;
}

.field .label_res {
    display: none !important;
}

.field input[type="number"]::placeholder,
.field input[type="number"] {
    margin-right: 20px !important;
    text-align: right;
}

@media only screen and (max-width: 768px) {
    .btn-icon.btn-round.btn-danger {
        margin-top: 10px !important;
    }

    .field .label_res {
        display: block !important;
    }

    .field label {
        margin-top: 10px !important;
    }

    .float-right.col-6 {
        max-width: 100%;
        padding-right: 0 !important;
    }

    .col-6.price {
        max-width: 60%;
    }

    .col-6.title {
        max-width: 40%;
        padding-left: 0 !important;
    }

    .float-right.col-6 .row .col-6 {
        font-size: 15px;
        padding-right: 0 !important;
    }

    .ui.form .fields.cost {
        flex-direction: column !important;
    }

    .field {
        max-width: 100%;
    }
}
</style>

<div class="ui modal modal_cost">
    <div class="header">

        Calculate cost
        <i class="close icon btn_cost mt-1 mr-0"></i>

    </div>
    <div class="scrolling content">
        <div class="ui form">
            <div class="cost_input_list mt-2">

            </div>

            <div class="add bill col-md-10 ml-auto mr-auto mt-4" onclick="add_cost_input()">
                <button class="ui green button col-md-12"><i class='left plus icon'></i>Add cost</button>
            </div>

            <div class="inline fields mt-4">
                <div class="ui checkbox mr-3">
                    <input type="checkbox" id="checkbox_vat" onclick="check_checkbox_value()">
                    <label>Add VAT</label>
                </div>
                <input type="number" size="1" id="vat" value="7" hidden onchange="cal_total_cost()">
            </div>

            <div class="float-right col-6">
                <div class="subtotal row" hidden>
                    <div class="title col-6">Subtotal :</div>
                    <div class="price col-6 text-right">0 THB</div>
                </div>

                <div class="vat row" hidden>
                    <div class="title col-6">VAT 7% : </div>
                    <div class="price col-6 text-right">0 THB</div>
                </div>

                <div class="total row mb-3">
                    <div class="title col-6">Total : </div>
                    <div class="price col-6 text-right">0 THB</div>
                </div>
            </div>

        </div>
    </div>
    <div class="actions">
        <button type="button" class="shadow-sm btn btn-success btn-border">
            <i class="fas fa-print mr-2"></i>
            Print invoice
        </button>
    </div>
</div>

<div class="ui modal modal_remove">
    <i class="close icon"></i>
    <div class="header">
        Remove service ?
    </div>
    <div class="content">
        <form action="<?php echo base_url() . '/Service_show/service_delete' ?>" method="post">
            <input type="hidden" id="ser_id" name="ser_id">

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
            <div class="page-header">
                <h4 class="pl-3 page-title">DAMAGED CONTAINER</h4>
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
                        <a href="#">Damaged container</a>
                    </li>
                </ul>
                <!-- Download Excel -->
            </div>
            <!-- Card Report -->
            <div id="carouselExampleIndicators" class="carousel slide mt-3" data-ride="carousel">
                <a class="carousel-control-prev pr-4 pb-4" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <!-- <span class="big circular ui icon button basic" aria-hidden="true" style="box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;"><i class="angle left icon"></i></span> -->
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next pl-4 pb-4" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <!-- <span class="big circular ui icon button basic" aria-hidden="true" style="box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;"><i class="angle right icon"></i></span> -->
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- table -->
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="service_list_table" class="display table table-hover cell-border" style="border-collapse: collapse !important; border-radius: 10px; overflow: hidden;">
                                    <thead>
                                        <tr style="background-color: #999; color: #fff; ">
                                            <th>No.</th>
                                            <th class="text-center">Con. number</th>
                                            <th class="text-center">Con. status</th>
                                            <th class="text-center">Con. type</th>
                                            <th class="text-center" style="width: 15%">Cut-off</th>
                                            <th class="text-center">Act. dep.</th>
                                            <th class="text-center">Agent</th>
                                            <th class="text-center">Customer</th>
                                            <th class="text-center"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php for ($i = 0; $i < count($arr_service); $i++) { ?>
                                        <tr>
                                            <!-- order -->
                                            <td> </td>

                                            <!-- Container number -->
                                            <td onclick="service_damaged_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                <?php echo $arr_service[$i]->con_number;
                                                    ?>
                                            </td>

                                            <!-- Status container  -->
                                            <td onclick="service_damaged_detail(<?php echo $arr_service[$i]->ser_id ?>)" class="px-4 py-3 text-sm text-center" style="min-width: 100px;">
                                                <?php 
                                                    // 5 = defective (red)
                                                        if ($arr_service[$i]->ser_stac_id == '5') {
                                                            echo '<span class="bg-defective text-white p-2" style="border-radius: 5px;">' . $arr_service[$i]->stac_name . '<span>';
                                                        }
                                                    //  else if = fixing (orange)
                                                        else if($arr_service[$i]->ser_stac_id == '6'){
                                                            echo '<span class="bg-drop text-white p-2" style="border-radius: 5px;">' . $arr_service[$i]->stac_name . '<span>';
                                                        }
                                                    ?>
                                            </td>

                                            <!-- Container type -->
                                            <td onclick="service_damaged_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                <?php echo $arr_service[$i]->cont_name ?>
                                            </td>

                                            <!-- Cut-off -->
                                            <td onclick="service_damaged_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                <?php echo date_thai($arr_service[$i]->ser_departure_date) ?>
                                            </td>
                                            <!-- Act. dep. -->
                                            <td onclick="service_damaged_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                <?php
                                                    if ($arr_service[$i]->ser_actual_departure_date == "0000-00-00 00:00:00" || $arr_service[$i]->ser_actual_departure_date == NULL) {
                                                        echo "-";
                                                    } else {
                                                        echo date_thai($arr_service[$i]->ser_actual_departure_date);
                                                    } ?>
                                            </td>

                                            <!-- aegnt name -->
                                            <td onclick="service_damaged_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                <?php echo $arr_service[$i]->agn_company_name ?>
                                            </td>

                                            <!-- csutomer name -->
                                            <td onclick="service_damaged_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                <?php echo $arr_service[$i]->cus_company_name ?>
                                                <?php if ($arr_service[$i]->cus_branch != NULL && $arr_service[$i]->cus_branch != '') : ?>
                                                <?php echo ' ' . $arr_service[$i]->cus_branch ?>
                                                <?php endif; ?>
                                            </td>

                                            <!-- Action -->
                                            <script>
                                            function show_service_menu(ser_id) {
                                                $('.menu').css('display', 'none');
                                                $('.menu.ser_id_' + ser_id).show();
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
                                                <div class="ui dropdown text-center p-2" style="border: 1px solid #ddd; width: 20px; height: 20px; border-radius: 50%" onclick="show_service_menu(<?php echo $arr_service[$i]->ser_id ?>)">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                    <div class="menu ser_id_<?php echo $arr_service[$i]->ser_id ?>" style="right: 0;left: auto;">
                                                        <div class="item btn_cost" onclick="get_service_cost(<?php echo $arr_service[$i]->ser_id ?>)">
                                                            <i class='far fa-money-bill-alt' style="font-size: 110%;"></i> &nbsp;
                                                            Charge billing
                                                        </div>
                                                        <div class="item" onclick="location.href='<?php echo base_url() . '/Service_edit/service_edit/' . $arr_service[$i]->ser_id ?>';">
                                                            <i class='far fa-edit' style="font-size: 130%;"> </i> &nbsp;
                                                            Edit
                                                        </div>
                                                        <div class="item test button" onclick="get_id(<?php echo $arr_service[$i]->ser_id ?>)">
                                                            <i class='fas fa-trash-alt' style="font-size: 130%;"></i>&nbsp; &nbsp;
                                                            Remove
                                                        </div>
                                                        <script>
                                                        $('.modal_remove').modal('attach events', '.test.button', 'toggle');
                                                        $('.modal_cost').modal('attach events', '.btn_cost', 'toggle');
                                                        modal_cost
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
        // add service button
        var ser_table = $('#service_list_table').DataTable({
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0, 8]
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


        // reset Daterange
        $('.cancelBtn').attr('onclick',
            'location.href = \'<?php echo base_url() . '/Service_show/service_show_ajax' ?>\'');
        $('.cancelBtn').removeClass('btn-default');
    });

    /*
     * get_id
     * get ser_id and show in remove service form
     * @input    section
     * @output   go to get ser_id and show in remove service form
     * @author   Natdanai
     * @Create Date  2564-07-28
     */
    function get_id(ser_id) {
        $('#ser_id').val(ser_id);
    }

    /*
     * service_damaged_detail
     * go to service detail page
     * @input    section
     * @output   go to service detail page
     * @author   Natdanai
     * @Create Date  2564-07-28
     */
    function service_damaged_detail(ser_id) {
        window.location = '<?php echo base_url('') . '/Service_show/service_damaged_detail/' ?>' + ser_id;
    }

    var number_cost_input = 1;

    function get_service_cost(ser_id) {
        console.log(ser_id);
        $.ajax({
            url: '<?php echo base_url() . '/Service_show/get_cost_ajax' ?>',
            method: 'POST',
            dataType: 'JSON',
            data: {
                ser_id: ser_id
            },
            success: function(data) {
                console.log(data);
                cost_modal(ser_id, data)
            }
        });
    }

    function cost_modal(ser_id, data) {
        $('.cost_input_list').empty();
        $('.add_cost_input').empty();

        // ดึงค่าใช้จ่ายเดิม
        var number_cost = data.length;
        // ถ้ามี วนลูปแสดง

        var modal_message = `<input name="cosd_ser_id" id="cosd_ser_id" type="hidden" value="${ser_id}">`;

        var modal_footer = ``;
        // ถ้าไม่มี สร้าง 1 รายการ
        if (number_cost == 0) {
            number_cost_input = 1;
            modal_message += `  <div class="fields cost" name="cost_input1">
                                        <div class="field col-6 cost_name">
                                        <label>Cost name</label>
                                        <input type="text" placeholder="Cost name" onchange="cost_insert(1)" step="0.01" name="cosd_name1">
                                    </div>
                                    <div class="field col-3 cost_amount">
                                        <label>Amount (TH Baht)</label>
                                        <input type="number" placeholder="Amount" onchange="cost_insert(1)" step="0.01" name="cosd_cost1" class="cosd_price">
                                    </div>
                                    <div class="field col-3 cost_quantity">
                                        <label>Quantity (Count) </label>
                                        <input type="text" placeholder="Quantity" value="0" class="cosd_count" onchange="cost_insert(1)" step="0.01" name="cosd_quantity1">
                                    </div>
                                    <button type="button" class="btn btn-icon btn-round btn-danger" name="cost_delete_btn1" onclick="cost_delete(1,'new')" style="margin-top: 25px;background: #E91414 !important; border-color: #E91414 !important;">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>`;
            $('.cost_input_list').append(modal_message);

            cal_total_cost();
        } else {
            modal_message += `  <div class="fields cost" name="cost_input_id${data[0]['cosd_id']}">
                                        <div class="field col-6 cost_name">
                                        <label>Cost name</label>
                                        <input type="text" placeholder="Cost name" onchange="cost_update(${data[0]['cosd_id']})" step="0.01" name="cosd_name_id${data[0]['cosd_id']}" value="${data[0]['cosd_name']}">
                                    </div>
                                    <div class="field col-3 cost_amount">
                                        <label>Amount (TH Baht)</label>
                                        <input type="number" placeholder="Amount" onchange="cost_update(${data[0]['cosd_id']})" step="0.01" name="cosd_cost_id${data[0]['cosd_id']}" value="${data[0]['cosd_cost']}" class="cosd_price">
                                    </div>
                                    <div class="field col-3 cost_quantity">
                                        <label>Quantity (Count) </label>
                                        <input type="number" placeholder="Quantity" class="cosd_count" onchange="cost_update(${data[0]['cosd_id']})" step="0.01" name="cosd_quantity_id${data[0]['cosd_id']}" value="${data[0]['cosd_quantity']}">
                                    </div>
                                    <button type="button" class="btn btn-icon btn-round btn-danger" name="cost_delete_btn_id${data[0]['cosd_id']}" onclick="cost_delete(${data[0]['cosd_id']},'old')" style="margin-top: 25px;background: #E91414 !important; border-color: #E91414 !important;">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>`;
            $('.cost_input_list').append(modal_message);
            // วน loop แสดงข้อมูล
            for (var i = 1; i < number_cost; i++) {
                modal_message = '';
                modal_message += `  <div class="fields cost" name="cost_input_id${data[i]['cosd_id']}">
                                        <div class="field col-6 cost_name">
                                            <label class="label_res">Cost name</label>
                                            <input type="text" placeholder="Cost name" onchange="cost_update(${data[i]['cosd_id']})" step="0.01" name="cosd_name_id${data[i]['cosd_id']}" value="${data[i]['cosd_name']}">
                                        </div>
                                        <div class="field col-3 cost_amount">
                                            <label class="label_res">Amount (TH Baht)</label>
                                            <input type="number" placeholder="Amount" onchange="cost_update(${data[i]['cosd_id']})" step="0.01" name="cosd_cost_id${data[i]['cosd_id']}" value="${data[i]['cosd_cost']}" class="cosd_price">
                                        </div>
                                        <div class="field col-3 cost_quantity">
                                            <label class="label_res">Quantity (Count) </label>
                                            <input type="number" placeholder="Quantity" class="cosd_count" onchange="cost_update(${data[i]['cosd_id']})" step="0.01" name="cosd_quantity_id${data[i]['cosd_id']}" value="${data[i]['cosd_quantity']}">
                                        </div>
                                        <button type="button" class="btn btn-icon btn-round btn-danger" name="cost_delete_btn_id${data[i]['cosd_id']}" onclick="cost_delete(${data[i]['cosd_id']},'old')" style="margin-top: 1px;background: #E91414 !important; border-color: #E91414 !important;">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>`;
                $('.cost_input_list').append(modal_message);
            }

            cal_total_cost();
        }
    }

    function add_cost_input() {

        ++number_cost_input;

        var cost = `<div class="fields cost" name="cost_input${number_cost_input}">
                        <div class="field col-6 cost_name">
                            <label class="label_res">Cost name</label>
                            <input type="text" placeholder="Cost name" onchange="cost_insert(${number_cost_input})" step="0.01" name="cosd_name${number_cost_input}">
                        </div>
                        <div class="field col-3 cost_amount">
                            <label class="label_res">Amount (TH Baht)</label>
                            <input type="number" placeholder="Amount" onchange="cost_insert(${number_cost_input})" step="0.01" name="cosd_cost${number_cost_input}" class="cosd_price">
                        </div>
                        <div class="field col-3 cost_quantity">
                            <label class="label_res">Quantity (Count) </label>
                            <input type="number" placeholder="Quantity" value="0" class="cosd_count" onchange="cost_insert(${number_cost_input})" step="0.01" name="cosd_quantity${number_cost_input}">
                        </div>
                        <button type="button" class="btn btn-icon btn-round btn-danger" name="cost_delete_btn${number_cost_input}" onclick="cost_delete(${number_cost_input},'new')" style="margin-top: 1px;background: #E91414 !important; border-color: #E91414 !important;">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>`;

        $('.cost_input_list').append(cost);
        cal_total_cost();
    }

    function cost_insert(input_order) {
        var cosd_ser_id = $('#cosd_ser_id').val();
        var cosd_name = $('input[name="cosd_name' + input_order + '"]').val();
        var cosd_cost = $('input[name="cosd_cost' + input_order + '"]').val();
        var cosd_quantity = $('input[name="cosd_quantity' + input_order + '"]').val();
        console.log("เข้า insert: " + cosd_ser_id, cosd_name, cosd_cost, cosd_quantity, input_order);

        $.ajax({
            url: '<?php echo base_url() . '/Service_show/cost_insert' ?>',
            method: 'POST',
            dataType: 'JSON',
            data: {
                cosd_ser_id: cosd_ser_id,
                cosd_name: cosd_name,
                cosd_cost: cosd_cost,
                cosd_quantity,
                cosd_quantity
            },
            success: function(data) {
                console.log(data[0]['cosd_id']);
                var return_id = data[0]['cosd_id'];
                $('input[name="cosd_name' + input_order + '"]').attr('onchange', `cost_update(${return_id})`);
                $('input[name="cosd_name' + input_order + '"]').attr('name', `cosd_name_id${return_id}`);

                $('input[name="cosd_cost' + input_order + '"]').attr('onchange', `cost_update(${return_id})`);
                $('input[name="cosd_cost' + input_order + '"]').attr('name', `cosd_cost_id${return_id}`);

                $('input[name="cosd_quantity' + input_order + '"]').attr('onchange', `cost_update(${return_id})`);
                $('input[name="cosd_quantity' + input_order + '"]').attr('name', `cosd_quantity_id${return_id}`);

                $('button[name="cost_delete_btn' + input_order + '"]').attr('onclick', `cost_delete(${return_id},'old')`);
                $('button[name="cost_delete_btn' + input_order + '"]').attr('name', `cost_delete_btn_id${return_id}`);

                $('div[name="cost_input' + input_order + '"]').attr('name', `cost_input_id${return_id}`);
            }
        });
        cal_total_cost();
    }

    function cost_update(cosd_id) {
        var cosd_name = $('input[name="cosd_name_id' + cosd_id + '"]').val();
        var cosd_cost = $('input[name="cosd_cost_id' + cosd_id + '"]').val();
        var cosd_quantity = $('input[name="cosd_quantity_id' + cosd_id + '"]').val();
        console.log("เข้า update: " + cosd_name, cosd_cost, cosd_id, cosd_ser_id, cosd_quantity);
        $.ajax({
            url: '<?php echo base_url() . '/Service_show/cost_update' ?>',
            method: 'POST',
            dataType: 'JSON',
            data: {
                cosd_id: cosd_id,
                cosd_name: cosd_name,
                cosd_cost: cosd_cost,
                cosd_quantity: cosd_quantity
            },
            success: function(data) {
                console.log(data);
            }
        });
        cal_total_cost();
    }

    function cost_delete(delete_id, input_type = 'new') {
        console.log(delete_id, input_type);
        // ลบ input ที่ยังไม่ถูก insert
        if (input_type == 'new') {
            $('div[name="cost_input' + delete_id + '"]').remove();
        }
        // ลบ input ที่ insert ไปแล้ว
        else if (input_type == 'old') {
            $.ajax({
                url: '<?php echo base_url() . '/Service_show/cost_delete' ?>',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    cosd_id: delete_id
                },
                success: function(data) {
                    console.log(data);
                }
            });
            $('div[name="cost_input_id' + delete_id + '"]').remove();
        }
        cal_total_cost();
    }

    function cal_total_cost() {
        var total_cost = 0;
        var cost_price = document.getElementsByClassName('cosd_price');
        var cost_count = document.getElementsByClassName('cosd_count');
        var checkbox_value = $('#checkbox_vat').is(':checked');
        for (var i = 0; i < cost_price.length; i++) {
            if (cost_price[i].value) {
                total_cost += parseFloat(cost_price[i].value) * cost_count[i].value;
            }
        }

        if (checkbox_value == true) {
            var vat = $('#vat').val();
            console.log(vat);
            $('.subtotal .price').text(total_cost.toLocaleString() + ' THB');

            $('.vat .title').text('VAT ' + vat + '% : ');

            vat = total_cost * (vat / 100);

            total_cost += vat;
            $('.vat .price').text(vat.toLocaleString() + ' THB');
        }

        $('.total .price').text(total_cost.toLocaleString() + ' THB');
    }

    function check_checkbox_value() {
        var checkbox_value = $('#checkbox_vat').is(':checked');
        if (checkbox_value == true) {
            $('#vat').removeAttr('hidden');
            $('.subtotal').removeAttr('hidden');
            $('.vat').removeAttr('hidden');
        } else {
            $('#vat').prop("hidden", !this.checked);
            $('.subtotal').prop("hidden", !this.checked);
            $('.vat').prop("hidden", !this.checked);
        }
        cal_total_cost();
    }
    </script>
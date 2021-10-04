<style>
    .text-con-in {
        background-color: #29B3F1;
        border: none;
        color: white;
        border-radius: 8px;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    .text-con-out {
        background-color: #44BB55;
        border: none;
        color: white;
        border-radius: 8px;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    .text-con-drop {
        background-color: #F5D432;
        border: none;
        color: white;
        border-radius: 8px;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    span.add_cost_input {
        color: #3966AA;
        cursor: pointer;
        transition: color 0.2s;
    }

    span.add_cost_input:hover {
        color: skyblue;
    }

    /* Grid Card จอต่ำสุด 1000 px */
    @media (min-width: 1000px) {
        .md\:grid-cols-2 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    /* Grid Card จอต่ำสุด 1450 px */
    @media (min-width: 1450px) {
        .xl\:grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }
</style>
<div class="container px-6 mx-auto grid">

    <!-- หัวข้อ -->
    <di class="flex items-center justify-between p-3 pl-4 my-8 text-sm font-semibold bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <h2 class=" text-2xl font-semibold">
                ข้อมูลบริการ
            </h2>
        </div>
    </di>

    <!-- Excel and date -->
    <div class="text-right mb-2">
        <!-- Download Excel -->
        <form id='form_Excel' action="<?php echo base_url() . '/Service_show/export_service' ?>" method="post" hidden>
            <input type="hidden" name="date_range_excel" id="date_range_excel" value="<?php echo $arrivals_date ?>">
        </form>

        <form id='form_date' action="<?php echo base_url() . '/Service_show/service_show_ajax' ?>" method="post">

            <button type="submit" form="form_Excel" class="shadow-sm btn btn-white text-success bg-white" style=" height: 40px; width: 180px; margin-bottom: 5">
                <i class="bi bi-file-arrow-down mr-1"></i>
                Download Excel
            </button>

            <!-- Date -->
            <input class="pl-2 shadow-sm rounded" type="text" name="date_range" id="date_range" value="<?php echo $arrivals_date ?>" style=" height: 43px; width: 200px;">
        </form>
    </div>

    <!-- Card ตู้เข้า -->
    <!-- Card ตู้เข้า -->
    <div class=" grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
        <!-- Card ตู้เข้า -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 ">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="1 1 17 10">
                    <path d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    ตู้เข้า
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    <?php
                    $count_import = array_count_values(array_column($arr_service, 'ser_type'))[1];
                    echo ($count_import != 0) ? $count_import : '0';
                    ?>
                </p>
            </div>
        </div>
        <!-- Card ตู้ออก-->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-orange-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="-1 1 17 10">
                    <path fill-rule="evenodd" d="M14.854 4.854a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 4H3.5A2.5 2.5 0 0 0 1 6.5v8a.5.5 0 0 0 1 0v-8A1.5 1.5 0 0 1 3.5 5h9.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    ตู้ออก
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    <?php
                    $count_export = array_count_values(array_column($arr_service, 'ser_type'))[2];
                    echo ($count_export != 0) ? $count_export : '0';
                    ?>
                </p>
            </div>
        </div>
        <!-- Card ตู้ดรอป -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="3 2 10 11">
                    <path d="M6 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5zm4 0a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    ตู้ดรอป
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    <?php
                    $count_drop = array_count_values(array_column($arr_service, 'ser_type'))[3];
                    echo ($count_drop != 0) ? $count_drop : '0';
                    ?>
                </p>
            </div>
        </div>
    </div>

    <!-- ตาราง -->
    <div class="w-full overflow-x-auto mb-5 ">
        <table class="w-full whitespace-no-wrap table ">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-center text-white uppercase bg-dark ">
                    <th class="px-4 py-3">หมายเลขตู้</th>
                    <th class="px-4 py-3">สถานะตู้</th>
                    <th class="px-4 py-3">ประเภท</th>
                    <th class="px-4 py-3">ประเภทตู้</th>
                    <th class="px-4 py-3">Cut-off</th>
                    <th class="px-4 py-3">เอเย่นต์</th>
                    <th class="px-4 py-3">ลูกค้า</th>
                    <th class="px-4 py-3">ดำเนินการ</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php for ($i = 0; $i < count($arr_service); $i++) { ?>
                    <tr class="text-gray-700 dark:text-gray-400">

                        <!-- หมายเลขตู้ -->
                        <td class="px-4 py-3" onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                            <div class="flex items-center text-sm">
                                <?php echo $arr_service[$i]->con_number; ?>
                            </div>
                        </td>

                        <!-- สถานะตู้ -->
                        <td class="px-4 py-3 text-sm" onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                            <?php echo $arr_service[$i]->stac_name; ?>
                        </td>

                        <!-- ประเภท -->
                        <td class="px-4 py-3 text-sm text-center" onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                            <!-- แสดงชื่อประเภท ตามข้อมูลที่ได้รับ -->
                            <?php
                            if ($arr_service[$i]->ser_type == '1') {
                                echo '<span class="text-con-in">ตู้เข้า</span>';
                            } else if ($arr_service[$i]->ser_type == '2') {
                                echo '<span class="text-con-out">ตู้ออก</span>';
                            } else if ($arr_service[$i]->ser_type == '3') {
                                echo '<span class="text-con-drop">ตู้ดรอป</span>';
                            }
                            ?>
                        </td>

                        <!-- ประเภทตู้ -->
                        <td class="px-4 py-3 text-sm" onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                            <?php echo $arr_service[$i]->cont_name ?>
                        </td>

                        <!-- Cut-off เวลาออก-->
                        <td class="px-4 py-3 text-sm" onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                            <p id="date">
                                <?php echo date_thai($arr_service[$i]->ser_departure_date) ?>
                            </p>
                        </td>

                        <!-- เอเย่นต์ -->
                        <td class="px-4 py-3 text-sm" onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                            <?php echo $arr_service[$i]->agn_company_name ?>
                        </td>

                        <!-- ลูกค้า -->
                        <td class="px-4 py-3 text-sm" onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                            <?php echo $arr_service[$i]->cus_company_name ?>
                        </td>

                        <!-- ดำเนินการ -->
                        <td class="px-4 py-3 text-sm text-center">
                            <!-- ปุ่มคิดค่าบริการ -->
                            <button data-toggle="modal" data-target="#cost_modal" onclick="get_service_cost(<?php echo $arr_service[$i]->ser_id ?>)" class="btn btn-info p-2"><i class="bi bi-cash-coin"></i></button>
                            <!-- ปุ่มแก้ไข -->
                            <a href="<?php echo base_url() . '/Service_edit/service_edit/' . $arr_service[$i]->ser_id ?>" class="btn btn-warning p-2"><i class="bi bi-pencil-square"></i></a>
                            <!-- ปุ่มลบ -->
                            <button type="button" class="btn btn-danger p-2" data-toggle="modal" data-target="#exampleModalCenter" onclick="get_id(<?php echo $arr_service[$i]->ser_id ?>)">
                                <i class="bi bi-trash"></i>
                            </button>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>

<!-- Modal คิดค่าบริการ -->
<div class="modal fade" id="cost_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-semibold" id="exampleModalLongTitle">ค่าใช้จ่าย</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="cost-modal-body float-center">
                <!-- เก็บ Service Id -->

                <div class="cost_input_list pl-5 pr-5">
                </div>
                <div class="add_cost_input p-3 row">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">พิมพ์ใบแจ้งหนี้</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal ยืนยันการลบ -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบบริการ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url() . '/Service_show/service_delete' ?>" method="post">
                <div class="modal-body float-center">
                    <!-- เก็บ Service Id -->
                    <input name="ser_id" id="ser_id" type="hidden">
                    <center>คุณเเน่ใจหรือไม่ที่ต้องการลบ</center>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <input type="submit" class="btn btn-danger" value="ลบ">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.table').DataTable({
            "oLanguage": {
                "sLengthMenu": "แสดง _MENU_ รายการ",
                "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ รายการ",
                "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 รายการ",
                "sInfoFiltered": "(จากรายการทั้งหมด _MAX_ รายการ)",
                "sSearch": "ค้นหา :"
            },
            "order": []
        });
        $("#DataTables_Table_0_filter").append(
            "<a href='<?php echo base_url() . '/Service_input/service_input' ?>'class='shadow-sm px-2 py-2 text-sm font-medium leading-5 text-white bg-success rounded-lg ml-2'> เพิ่มบริการ </a>"
        );

        //วันที่ Date Range Picker
        $('input[name="date_range"]').daterangepicker({
            "locale": {
                "format": 'DD/MM/YYYY',
                "customRangeLabel": "Custom",
                "daysOfWeek": [
                    "อา", "จ", "อ", "พ",
                    "พฤ", "ศ", "ส"
                ],
                "monthNames": [
                    "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน",
                    "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม",
                    "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
                ],
                "firstDay": 1
            },
            language: 'th',
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                .format('YYYY-MM-DD'));
        });

        $('.cancelBtn').attr('onclick', 'location.href = \'<?php echo base_url() . '/Service_show/service_show_ajax' ?>\'');
        $('.applyBtn').attr({
            type: 'submit',
            form: 'form_date'
        });
    });

    function get_id(ser_id) {
        $('#ser_id').val(ser_id);
    }

    function service_detail(ser_id) {
        window.location = '<?php echo base_url('') . '/Service_show/service_detail/' ?>' + ser_id;
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
            modal_message += `<div class="row" name="cost_input1">`;
            modal_message += `<div class="col-12">`;
            modal_message += `<div class="row">`;
            modal_message += `<div class="col-7">ค่าใช้จ่าย</div>`;
            modal_message += `<div class="col-5">จำนวนเงิน</div>`;
            modal_message += `</div>`;
            modal_message += `<div class="row mt-3">`;
            modal_message += `<div class="col-7">`;
            modal_message += `<input type="text" onchange="cost_insert(1)" class="block w-full mt-1 text-sm focus:outline-none form-input" step="0.01" name="cosd_name1">`;
            modal_message += `</div>`;
            modal_message += `<div class="col-4">`;
            modal_message += `<input type="number" onchange="cost_insert(1)" class="cost block w-full mt-1 text-sm focus:outline-none form-input" step="0.01" name="cosd_cost1"></div>`;
            modal_message += `<div class="col-1"><button style="position: relative; top:1rem" name="cost_delete_btn1" onclick="cost_delete(1,'new')"><i class="bi bi-x-circle-fill" style="color:#E91414"></i></button></div>`;
            modal_message += `</div></div>`;
            $('.cost_input_list').append(modal_message);

            modal_footer += `<div class="col-6"><span class="add_cost_input text-sm" onclick="add_cost_input()">เพิ่มค่าใช้จ่าย</span></div>`;
            modal_footer += `<div class="col-6">รวมทั้งสิ้น <span class="total_cost"></span> บาท</div>`;
            $('.add_cost_input').append(modal_footer);
            cal_total_cost();
        } else {
            modal_message += `<div class="row mt-3">`;
            modal_message += `<div class="col-7 font-semibold">ค่าใช้จ่าย</div>`;
            modal_message += `<div class="col-5 font-semibold">จำนวนเงิน</div>`;
            modal_message += `</div>`;
            $('.cost_input_list').append(modal_message);
            // วน loop แสดงข้อมูล
            for (var i = 0; i < number_cost; i++) {
                modal_message = '';
                modal_message += `<div class="row" name="cost_input_id${data[i]['cosd_id']}">`;
                modal_message += `<div class="col-12">`;
                modal_message += `<div class="row mt-3">`;
                modal_message += `<div class="col-7">`;
                modal_message += `<input type="text" onchange="cost_update(${data[i]['cosd_id']})" class="block w-full mt-1 text-sm focus:outline-none form-input" step="0.01" name="cosd_name_id${data[i]['cosd_id']}" value="${data[i]['cosd_name']}">`;
                modal_message += `</div>`;
                modal_message += `<div class="col-4">`;
                modal_message += `<input type="number" onchange="cost_update(${data[i]['cosd_id']})" class="cost block w-full mt-1 text-sm focus:outline-none form-input" step="0.01" name="cosd_cost_id${data[i]['cosd_id']}" value="${data[i]['cosd_cost']}"></div>`;
                modal_message += `<div class="col-1"><button style="position: relative; top:1rem" name="cost_delete_btn_id${data[i]['cosd_id']}" onclick="cost_delete(${data[i]['cosd_id']},'old')"><i class="bi bi-x-circle-fill" style="color:#E91414;" ></i></button></div>`;
                modal_message += `</div></div></div>`;
                $('.cost_input_list').append(modal_message);
            }
            modal_footer += `<div class="col-12 col-sm-6"><span class="add_cost_input text-sm" style="padding-left: 1rem" onclick="add_cost_input()">เพิ่มค่าใช้จ่าย</span></div>`;
            modal_footer += `<div class="col-12 col-sm-6 text-sm" style="text-align: right; padding-right: 3rem;">รวมทั้งสิ้น <span class="total_cost"></span> บาท</div>`;
            $('.add_cost_input').append(modal_footer);
            cal_total_cost();
        }
    }

    function add_cost_input() {

        ++number_cost_input;
        var cost = `<div class="row" name="cost_input${number_cost_input}">`;
        cost += `<div class="col-12">`;
        cost += `<div class="row mt-3">`;
        cost += `<div class="col-7">`;
        cost += `<input type="text" onchange="cost_insert(${number_cost_input})" class="block w-full mt-1 text-sm focus:outline-none form-input" step="0.01" name="cosd_name${number_cost_input}">`;
        cost += `</div>`;
        cost += `<div class="col-4">`;
        cost += `<input type="number" onchange="cost_insert(${number_cost_input})" class="cost block w-full mt-1 text-sm focus:outline-none form-input" step="0.01" name="cosd_cost${number_cost_input}"></div>`;
        cost += `<div class="col-1"><button style="position: relative; top:1rem" name="cost_delete_btn${number_cost_input}" onclick="cost_delete(${number_cost_input},'new')"><i class="bi bi-x-circle-fill" style="color:#E91414" ></i></button></div>`;
        cost += `</div>`;
        cost += `</div></div>`;
        $('.cost_input_list').append(cost);
        cal_total_cost();
    }

    function cost_insert(input_order) {
        var cosd_ser_id = $('#cosd_ser_id').val();
        var cosd_name = $('input[name="cosd_name' + input_order + '"]').val();
        var cosd_cost = $('input[name="cosd_cost' + input_order + '"]').val();
        console.log("เข้า insert: " + cosd_ser_id, cosd_name, cosd_cost, input_order);

        $.ajax({
            url: '<?php echo base_url() . '/Service_show/cost_insert' ?>',
            method: 'POST',
            dataType: 'JSON',
            data: {
                cosd_ser_id: cosd_ser_id,
                cosd_name: cosd_name,
                cosd_cost: cosd_cost,
            },
            success: function(data) {
                console.log(data[0]['cosd_id']);
                var return_id = data[0]['cosd_id'];
                $('input[name="cosd_name' + input_order + '"]').attr('onchange', `cost_update(${return_id})`);
                $('input[name="cosd_name' + input_order + '"]').attr('name', `cosd_name_id${return_id}`);

                $('input[name="cosd_cost' + input_order + '"]').attr('onchange', `cost_update(${return_id})`);
                $('input[name="cosd_cost' + input_order + '"]').attr('name', `cosd_cost_id${return_id}`);

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
        console.log("เข้า update: " + cosd_name, cosd_cost, cosd_id, cosd_ser_id);
        $.ajax({
            url: '<?php echo base_url() . '/Service_show/cost_update' ?>',
            method: 'POST',
            dataType: 'JSON',
            data: {
                cosd_id: cosd_id,
                cosd_name: cosd_name,
                cosd_cost: cosd_cost
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
        var cost_input = document.getElementsByClassName('cost');
        for (var i = 0; i < cost_input.length; i++) {
            if (cost_input[i].value) {
                total_cost += parseFloat(cost_input[i].value);
            }
        }
        $('span.total_cost').text(total_cost.toLocaleString());
    }
</script>
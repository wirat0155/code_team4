<style>
/* Grid Card จอต่ำสุด 1000 px */
@media (min-width: 1000px) {
    .md\:grid-cols-2 {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}

/* Grid Card จอต่ำสุด 1450 px */
@media (min-width: 1450px) {
    .xl\:grid-cols-3 {
        grid-template-columns: repeat(6, minmax(0, 1fr));
    }
}
</style>

<div class="container px-6 mx-auto grid">

    <!-- หัวข้อ -->
    <di
        class="flex items-center justify-between p-3 pl-4 my-8 text-sm font-semibold bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <h2 class=" text-2xl font-semibold">
                ข้อมูลลูกค้า
            </h2>
        </div>
    </di>

    <!-- Excel and date -->
    <div class="text-right mb-6">
        <!-- Download Excel -->
        <a href="" class="shadow-sm btn btn-white text-success bg-white"
            style=" height: 40px; width: 180px; margin-bottom: 5">
            <i class="bi bi-file-arrow-down mr-1"></i>
            Download Excel
        </a>
        <!-- Date -->
        <input class="pl-2 shadow-sm rounded" type="text" name="daterange" value="01/01/2018 - 01/15/2018"
            style=" height: 40px; width: 200px; ">
    </div>

    <!-- Card ตู้เข้า -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
        <!-- Card ตู้เข้า -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 ">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="1 1 17 10">
                    <path
                        d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z">
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
                    <path fill-rule="evenodd"
                        d="M14.854 4.854a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 4H3.5A2.5 2.5 0 0 0 1 6.5v8a.5.5 0 0 0 1 0v-8A1.5 1.5 0 0 1 3.5 5h9.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4z">
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
                    <path
                        d="M6 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5zm4 0a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z">
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
        <!-- Card Dry Container -->
        <div class="flex items-center pl-3 py-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <img src="<?= base_url('/upload') . '/' . 'DryContainer.jpg' ?>" alt=""
                style="width: 3rem; height: 3rem; object-fit: cover;">
            <div class="pl-3">
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Dry Container
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    <?php
                    $count_Dry_Container  = array_count_values(array_column($arr_service, 'cont_name'))['Dry Container'];
                    echo ($count_Dry_Container != 0) ? $count_Dry_Container : '0';
                    ?>
                </p>
            </div>
        </div>
        <!-- Card Reefer container -->
        <div class="flex items-center pl-3 py-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <img src="<?= base_url('/upload') . '/' . 'ReeferContainer.jpg' ?>" alt=""
                style="width: 4rem; height: 3rem; object-fit: cover;">
            <div class="pl-4">
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Reefer Container
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    <?php
                    $count_Reefer_container = array_count_values(array_column($arr_service, 'cont_name'))['Reefer Container'];
                    echo ($count_Reefer_container != 0) ? $count_Reefer_container : '0';
                    ?>
                </p>
            </div>
        </div>
        <!-- Card ISO Tank Container -->
        <div class="flex items-center pl-3 py-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <img src="<?= base_url('/upload') . '/' . 'ISOTank.jpg' ?>" alt=""
                style="width: 4rem; height: 3rem; object-fit: cover;">
            <div class="pl-4">
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    ISO Tank Container
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    <?php
                    $count_ISO_Tank_Container = array_count_values(array_column($arr_service, 'cont_name'))['ISO Tank'];
                    echo ($count_ISO_Tank_Container != 0) ? $count_ISO_Tank_Container : '0';
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
                    <th class="px-4 py-3">บริษัท</th>
                    <th class="px-4 py-3">ผู้รับผิดชอบ</th>
                    <th class="px-4 py-3">จำนวนตู้ที่กำลังใช้</th>
                    <th class="px-4 py-3">เบอร์โทรศัพท์</th>
                    <th class="px-4 py-3">email</th>
                    <th class="px-4 py-3">ดำเนินการ</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php for ($i = 0; $i < count($arr_customer); $i++) { ?>
                <tr class="text-gray-700 dark:text-gray-400">

                    <!-- บริษัท -->
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <?php
                                echo $arr_customer[$i]->cus_company_name;
                                echo ($arr_customer[$i]->cus_branch != null) ? ' (' . $arr_customer[$i]->cus_branch . ') ' : '';
                            ?>
                        </div>
                    </td>

                    <!-- ผู้รับผิดชอบ -->
                    <td class="px-4 py-3 text-sm">
                        <?php echo $arr_customer[$i]->cus_firstname . ' ' . $arr_customer[$i]->cus_lastname ?>
                    </td>

                    <!-- จำนวนตู้ที่กำลังใช้ -->
                    <td class="px-4 py-3 text-sm text-center">
                        <?php
                            $count_container = 0;
                            for ($j = 0; $j < count($arr_service); $j++) {
                                if($arr_customer[$i]->cus_company_name == $arr_service[$j]->cus_company_name){
                                    if($arr_customer[$i]->cus_branch == $arr_service[$j]->cus_branch ){
                                        $count_container++;
                                    }
                                }
                            }
                            echo $count_container;  
                        ?>
                    </td>

                    <!-- เบอร์โทรศัพท์ -->
                    <td class="px-4 py-3 text-sm text-center">
                        <?php echo tel_format($arr_customer[$i]->cus_tel) ?>
                    </td>

                    <!-- email -->
                    <td class="px-4 py-3 text-sm">
                        <?php echo $arr_customer[$i]->cus_email ?>
                    </td>

                    <!-- ดำเนินการ -->
                    <td class="px-4 py-3 text-sm text-center">
                        <!-- ปุ่มแก้ไข -->
                        <a href="" class="btn btn-warning p-2"><i class="bi bi-pencil-square"></i></a>
                        <!-- ปุ่มลบ -->
                        <button type="button" class="btn btn-danger p-2" data-toggle="modal"
                            data-target="#Modal_Confirm" onclick="get_id(<?php echo $arr_customer[$i]->cus_id ?>)">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>

<!-- Modal ยืนยันการลบ -->
<div class="modal fade" id="Modal_Confirm" tabindex="-1" role="dialog" aria-labelledby="Modal_ConfirmTitle"
    aria-hidden="true"> 
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบลูกค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="<?php echo base_url() . '/public/Customer_show/customer_delete'?>" method="post">
                <div class="modal-body float-center">
                    <!-- เก็บ Customer Id -->
                    <input name="cus_id" id="cus_id" type="hidden">
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
        }
    });
    
    // แทรกปุ่ม เพิ่มลูกค้า
    $("#DataTables_Table_0_filter").append(
        "<a href='<?php echo base_url(). '/public/Customer_input/customer_input' ?>' class='button shadow-sm px-4 py-2 text-sm font-medium leading-5 text-white bg-success rounded-lg ml-2'> เพิ่มลูกค้า </a>"
        );

    //วันที่ Date Range Picker
    $('input[name="daterange"]').daterangepicker({
        opens: 'left'
    }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
            .format('YYYY-MM-DD'));
    });
});

// ส่ง cus_id เข้า Modal
function get_id(cus_id) {
    $('#cus_id').val(cus_id);
}
</script>
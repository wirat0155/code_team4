<style>
.dataTables_wrapper .dataTables_paginate .paginate_button.current,
.dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    color: white !important;
    border: 1px solid #3f83f8 !important;
    background-color: #3f83f8 !important;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, white), color-stop(100%, white)) !important;
    background: -webkit-linear-gradient(top, white 0%, #3f83f8 0%) !important;
    background: -moz-linear-gradient(top, white 0%, #3f83f8 0%) !important;
    background: -ms-linear-gradient(top, white 0%, #3f83f8 0%);
    background: -o-linear-gradient(top, white 0%, #3f83f8 0%) !important;
    background: linear-gradient(to bottom, white 0%, #3f83f8 0%) !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover,
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
    cursor: pointer;
    color: #3f83f8 !important;
    border: 1px solid #3f83f8 !important;
    background: transparent;
    box-shadow: none;
}

@media (min-width: 1000px){
    .md\:grid-cols-2 {
        grid-template-columns: repeat(3,minmax(0,1fr));
    }
}

@media (min-width: 1450px) {
    .xl\:grid-cols-3 {
        grid-template-columns: repeat(6, minmax(0, 1fr));
    }
}
</style>

<div class="container px-6 mx-auto grid">

    <!-- หัวข้อ -->
    <di class="flex items-center justify-between p-3 pl-4 my-8 text-sm font-semibold bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <h2 class=" text-2xl font-semibold">
                ข้อมูลรถ
            </h2>
        </div>
    </di>

    <!-- ตาราง -->
    <div class="w-full overflow-x-auto mb-5 ">
        <table class="w-full whitespace-no-wrap table ">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-center text-white uppercase bg-dark ">
                    <th class="px-4 py-3">หมายเลขรถ</th>
                    <th class="px-4 py-3">ทะเบียนรถ</th>
                    <th class="px-4 py-3">ประเภทรถ</th>
                    <th class="px-4 py-3">ยี่ห้อ</th>
                    <th class="px-4 py-3">สถานะ</th>
                    <th class="px-4 py-3">ดำเนินการ</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php for($i = 0; $i < count($arr_car); $i++) { ?>
                <tr class="text-gray-700 dark:text-gray-400">

                    <!-- หมายเลขรถ -->
                    <td class="px-4 py-3">
                        <img class="object-cover w-full h-full rounded-full" src="<?php echo base_url() . 'car_image/' . $arr_car[$i]->car_image ?>" alt="" loading="lazy">
                        <?php echo $arr_car[$i]->car_number?>
                    </td>

                    <!-- ทะเบียนรถ -->
                    <td class="px-4 py-3 text-sm text-center">
                    <?php echo $arr_car[$i]->car_code .' '.$arr_car[$i]->prov_name ?> 
                    </td>

                    <!-- ประเภทรถ-->
                    <td class="px-4 py-3 text-sm text-center">
                    <?php echo $arr_car[$i]->cart_name?>
                    </td>

                    <!-- ยี่ห้อ -->
                    <td class="px-4 py-3 text-sm text-center">
                    <?php echo $arr_car[$i]->car_brand?>
                    </td>

                    <!-- สถานะ -->
                    <td class="px-4 py-3 text-sm text-center">
                    <?php  
                        if ($arr_car[$i]->car_status == 1) 
                        {
                            echo "พร้อมใช้";
                        } else if ($arr_car[$i]->car_status == 2){
                            echo "เสียหาย";
                        }else if ($arr_car[$i]->car_status == 3){
                            echo "กำลังซ่อม";
                        } ?>
                    </td>

                    <!-- ดำเนินการ -->
                    <td class="px-4 py-3 text-sm text-center">
                        <!-- ปุ่มแก้ไข -->
                        <a href="" class="btn btn-warning p-2"><i class="bi bi-pencil-square"></i></a>
                        <!-- ปุ่มลบ -->
                        <button type="button" class="btn btn-danger p-2" data-toggle="modal" data-target="#exampleModalCenter" onclick="get_id(<?php echo $arr_car[$i]->car_id?>)">
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบลูกค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url() . '/public/Car_show/car_delete'?>" method="post">
                <div class="modal-body float-center">
                    <!-- เก็บ Car Id -->
                    <input name="car_id" id="car_id" type="text">
                    คุณเเน่ใจหรือไม่ที่ต้องการลบ
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
    $("#DataTables_Table_0_filter").append("<button class='shadow-sm px-4 py-2 text-sm font-medium leading-5 text-white bg-success rounded-lg ml-2'> เพิ่มรถ </button>");
    $('input[name="daterange"]').daterangepicker({
        opens: 'left'
    }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
});

function get_id(car_id) {
    $('#car_id').val(car_id);
}
</script>
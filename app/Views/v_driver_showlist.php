<div class="container px-6 mx-auto grid">
    <!-- หัวข้อ -->
    <div
        class="flex items-center justify-between p-3 pl-4 my-8 text-sm font-semibold bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <h2 class=" text-2xl font-semibold">
                ข้อมูลพนักงานขับรถ
            </h2>
        </div>
    </div>

    <!-- ตารางตู้คอนเทนเนอร์ -->
    <div class="w-full overflow-x-auto mb-5 ">
        <table class="w-full whitespace-no-wrap table ">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-center text-white uppercase bg-dark ">
                    <th class="px-4 py-3">ชื่อ-สกุล</th>
                    <th class="px-4 py-3">รถประจำตัว</th>
                    <th class="px-4 py-3">ประเภทรถ</th>
                    <th class="px-4 py-3">เลขใบขับขี่</th>
                    <th class="px-4 py-3">เบอร์โทร</th>
                    <th class="px-4 py-3">ดำเนินการ</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php for($i = 0; $i < count($arr_driver); $i++) { ?>
                <tr class="text-gray-700 dark:text-gray-400">

                    <!-- ชื่อ-สกุล -->
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <?php echo $arr_driver[$i]->dri_name?>
                        </div>
                    </td>

                    <!-- รถประจำตัว -->
                    <td class="px-4 py-3 text-sm">
                        <?php echo $arr_driver[$i]->dri_car_id?>
                    </td>

                    <!-- ประเภทรถ -->
                    <td class="px-4 py-3 text-sm text-center">
                        <?php echo $arr_driver[$i]->cart_name?>
                    </td>

                    <!-- เลขใบขับขี่ -->
                    <td class="px-4 py-3 text-sm text-center">
                        <?php echo $arr_driver[$i]->dri_license?>
                    </td>

                    <!-- เบอร์โทร -->
                    <td class="px-4 py-3 text-sm">
                        <?php echo tel_format($arr_driver[$i]->dri_tel)?>
                    </td>

                    
                    <td class="px-4 py-3 text-sm text-center">
                        <a href="" class="btn btn-warning p-2"><i class="bi bi-pencil-square"></i></a>
                        <button type="button" class="btn btn-danger p-2" data-toggle="modal" data-target="#exampleModalCenter" onclick="get_id(<?php echo $arr_driver[$i]->dri_id?>)">
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
                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบพนักงานขับรถ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url() . '/public/Driver_show/driver_delete'?>" method="post">
                <div class="modal-body float-center">
                    <!-- เก็บ Container Id -->
                    <input name="dri_id" id="dri_id" type="hidden">
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
        $("#DataTables_Table_0_filter").append("<a href='<?php echo base_url() .'/public/Driver_input/driver_input'?>' class='shadow-sm px-4 py-2 text-sm font-medium leading-5 text-white bg-success rounded-lg ml-2'>เพิ่มคนขับรถ</a>");
    });
    function get_id(dri_id) {
        $('#dri_id').val(dri_id);
    }
</script>
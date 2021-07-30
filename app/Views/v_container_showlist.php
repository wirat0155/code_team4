<div class="container px-6 mx-auto grid">
    <!-- หัวข้อ -->
    <div
        class="flex items-center justify-between p-3 pl-4 my-8 text-sm font-semibold bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <h2 class=" text-2xl font-semibold">
                ข้อมูลตู้คอนเทนเนอร์
            </h2>
        </div>
    </div>

    <!-- ตารางตู้คอนเทนเนอร์ -->
    <div class="w-full overflow-x-auto mb-5 ">
        <table class="w-full whitespace-no-wrap table ">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-center text-white uppercase bg-dark ">
                    <th class="px-4 py-3">หมายเลขตู้</th>
                    <th class="px-4 py-3">สถานะตู้</th>
                    <th class="px-4 py-3">ประเภทตู้</th>
                    <th class="px-4 py-3">ขนาดตู้</th>
                    <th class="px-4 py-3">เอเย่นต์</th>
                    <th class="px-4 py-3">ดำเนินการ</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php for($i = 0; $i < count($arr_container); $i++) { ?>
                <tr class="text-gray-700 dark:text-gray-400">

                    <!-- หมายเลขตู้ -->
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <?php echo $arr_container[$i]->con_number?>
                        </div>
                    </td>

                    <!-- สถานะตู้ -->
                    <td class="px-4 py-3 text-sm">
                        <?php echo $arr_container[$i]->stac_name?>
                    </td>

                    <!-- ประเภทตู้ -->
                    <td class="px-4 py-3 text-sm text-center">
                        <?php echo $arr_container[$i]->cont_name?>
                    </td>

                    <!-- ขนาดตู้ -->
                    <td class="px-4 py-3 text-sm text-center">
                        <?php echo $arr_container[$i]->size_name?>
                    </td>

                    <!-- เอเย่นต์ -->
                    <td class="px-4 py-3 text-sm">
                        <?php echo $arr_container[$i]->agn_company_name?>
                    </td>

                    <td class="px-4 py-3 text-sm text-center">
                        <a href="" class="btn btn-warning p-2"><i class="bi bi-pencil-square"></i></a>
                        <button type="button" class="btn btn-danger p-2" data-toggle="modal" data-target="#exampleModalCenter" onclick="get_id(<?php echo $arr_container[$i]->con_id?>)">
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
                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการตู้คอนเทนเนอร์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url() . '/public/Container_show/container_delete'?>" method="post">
                <div class="modal-body float-center">
                    <!-- เก็บ Container Id -->
                    <input name="con_id" id="con_id" type="hidden">
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
        $("#DataTables_Table_0_filter").append("<button class='shadow-sm px-4 py-2 text-sm font-medium leading-5 text-white bg-success rounded-lg ml-2'> เพิ่มตู้ </button>");
    });
    function get_id(con_id) {
        $('#con_id').val(con_id);
    }
</script>
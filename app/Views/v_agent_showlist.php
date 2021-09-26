<div class="container px-6 mx-auto grid">

    <!-- หัวข้อ -->
    <div class="flex items-center justify-between p-3 pl-4 my-8 text-sm font-semibold bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <h2 class=" text-2xl font-semibold">
                ข้อมูลเอเย่นต์
            </h2>
        </div>
    </div>

    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap table">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-center text-white uppercase bg-dark">
                    <th class="px-4 py-3">บริษัท</th>
                    <th class="px-4 py-3">ผู้รับผิดชอบ</th>
                    <th class="px-4 py-3">จำนวนตู้ที่กำลังใช้</th>
                    <th class="px-4 py-3">เบอร์โทรศัพท์</th>
                    <th class="px-4 py-3">อีเมล</th>
                    <th class="px-4 py-3">ดำเนินการ</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php
                for ($i = 0; $i < count($arr_agent); $i++) {
                ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm" onclick="agent_detail(<?php echo $arr_agent[$i]->agn_id ?>)">
                            <?php echo $arr_agent[$i]->agn_company_name ?></p>
                        </td>

                        <td class="px-4 py-3 text-sm" onclick="agent_detail(<?php echo $arr_agent[$i]->agn_id ?>)">
                            <?php echo $arr_agent[$i]->agn_firstname . " " . $arr_agent[$i]->agn_lastname ?>
                        </td>

                        <td class="px-4 py-3 text-sm text-center" onclick="agent_detail(<?php echo $arr_agent[$i]->agn_id ?>)">
                            <?php
                            $count_container = array_count_values(array_column($arr_container, 'agn_company_name'))[$arr_agent[$i]->agn_company_name];
                            echo ($count_container != 0) ? $count_container : '0';
                            ?>
                        </td>

                        <td class="phone px-4 py-3 text-sm text-center" onclick="agent_detail(<?php echo $arr_agent[$i]->agn_id ?>)">
                            <?php echo tel_format($arr_agent[$i]->agn_tel) ?>
                        </td>

                        <td class="px-4 py-3 text-sm" onclick="agent_detail(<?php echo $arr_agent[$i]->agn_id ?>)">
                            <?php echo $arr_agent[$i]->agn_email ?>
                        </td>

                        <!-- ดำเนินการ -->
                        <td class="px-4 py-3 text-sm text-center">
                            <!-- ปุ่มแก้ไข -->
                            <a href="<?php echo base_url() . '/Agent_edit/agent_edit/' . $arr_agent[$i]->agn_id ?>" class="btn btn-warning p-2"><i class="bi bi-pencil-square"></i></a>
                            <!-- ปุ่มลบ -->
                            <button type="button" class="btn btn-danger p-2" data-toggle="modal" data-target="#exampleModalCenter" onclick="get_id(<?php echo $arr_agent[$i]->agn_id ?>)">
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
                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบเอเย่นต์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url() . '/Agent_show/agent_delete' ?>" method="post">
                <div class="modal-body float-center">
                    <!-- เก็บ Agent Id -->
                    <input name="agn_id" id="agn_id" type="hidden">
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
            "order" : []
        });
        $("#DataTables_Table_0_filter").append("<a href='<?php echo base_url() . '/Agent_input/agent_input' ?>' class='shadow-sm px-4 py-2 text-sm font-medium leading-5 text-white bg-success rounded-lg ml-2'>เพิ่มเอเย่นต์</a>");
    });

    function get_id(agn_id) {
        $('#agn_id').val(agn_id);
    }

    function agent_detail(agn_id) {
        window.location = '<?php echo base_url('') . '/Agent_show/agent_detail/' ?>' + agn_id;
    }
</script>
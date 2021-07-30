<div class="container px-6 mx-auto grid">


    <!-- หัวข้อ -->
    <di class="flex items-center justify-between p-3 pl-4 my-8 text-sm font-semibold bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <h2 class=" text-2xl font-semibold">
                ข้อมูลเอเยนต์
            </h2>
        </div>
    </di>

    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap table">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-center text-white uppercase bg-dark">
                    <th class="px-4 py-3">บริษัท</th>
                    <th class="px-4 py-3">ผู้รับผิดชอบ</th>
                    <th class="px-4 py-3">จำนวนตู้ที่กำลังใช้</th>
                    <th class="px-4 py-3">เบอร์โทรศัพท์</th>
                    <th class="px-4 py-3">email</th>
                    <th class="px-4 py-3">ดำเนินการ</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php
                for ($i = 0; $i < count($arr_agent); $i++) { ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm">
                            <?php echo $arr_agent[$i]->agn_company_name ?></p>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <?php echo $arr_agent[$i]->agn_firstname . " " . $arr_agent[$i]->agn_lastname ?>
                        </td>
                        <td class="px-4 py-3 text-sm text-center">
                            <?php
                            $count_container = array_count_values(array_column($arr_container, 'agn_company_name'))[$arr_agent[$i]->agn_company_name];
                            echo ($count_container != 0) ? $count_container : '0';
                            ?>
                        </td>
                        <td class="px-4 py-3 text-sm text-center">
                            <?php echo $arr_agent[$i]->agn_tel ?>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <?php echo $arr_agent[$i]->agn_email ?>
                        </td>
                        <td class="px-4 py-3 text-sm text-center">
                        <a href="" class="btn btn-warning p-2"><i class="bi bi-pencil-square"></i></a>
                        <button type="button" class="btn btn-danger p-2" data-toggle="modal" data-target="#exampleModalCenter" onclick="get_id(<?php echo $arr_container[$i]->con_id?>)">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                    </tr>

                <?php }  ?>
            </tbody>
        </table>
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
    });
</script>
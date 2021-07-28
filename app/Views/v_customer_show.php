<div class="container px-6 mx-auto grid">

    <di class="flex items-center justify-between p-3 pl-4 my-8 text-sm font-semibold bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <h2 class=" text-2xl font-semibold">
            ข้อมูลลูกค้า
            </h2>
        </div>
    </di>
    <div class="w-full overflow-hidden rounded-lg shadow-xs p-4">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap table">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">บริษัท</th>
                        <th class="px-4 py-3">ผู้รับผิดชอบ</th>
                        <th class="px-4 py-3">จำนวนตู้ที่กำลังใช้</th>
                        <th class="px-4 py-3">เบอร์โทรศัพท์</th>
                        <th class="px-4 py-3">email</th>
                        <th class="px-4 py-3">ดำเนินการ</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <?php for($i = 0; $i < count($arr_customer); $i++) { ?>
                    <tr class="text-gray-700 dark:text-gray-400">

                        <!-- บริษัท -->
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold">
                                        <?php 
                                            echo $arr_customer[$i]->cus_company_name;
                                            echo ($arr_customer[$i]->cus_branch != null) ? ' (' . $arr_customer[$i]->cus_branch . ') ' : '';
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </td>

                        <!-- ผู้รับผิดชอบ -->
                        <td class="px-4 py-3 text-sm">
                            <?php echo $arr_customer[$i]->cus_firstname . ' ' . $arr_customer[$i]->cus_lastname?>
                        </td>

                        <!-- จำนวนตู้ที่กำลังใช้ -->
                        <td class="px-4 py-3 text-sm">
                            <?php echo 'จำนวนตู้'?>
                        </td>

                        <!-- เบอร์โทรศัพท์ -->
                        <td class="px-4 py-3 text-sm">
                            <?php echo $arr_customer[$i]->cus_tel?>
                        </td>

                        <!-- email -->
                        <td class="px-4 py-3 text-sm">
                            <?php echo $arr_customer[$i]->cus_email?>
                        </td>

                        <td class="px-4 py-3 text-sm">
                            <?php echo 'ปุ่ม'?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('.table').DataTable({
        responsive: true
    });
});
</script>
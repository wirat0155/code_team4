<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        ประเภทรถ
    </h2>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap table">
                  <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                      <th class="px-4 py-3">รหัสประเภทรถ</th>
                      <th class="px-4 py-3">ประเภทรถ</th>
                      <th class="px-4 py-3">สถานะประเภทรถ</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <?php for($i = 0; $i < count($arr_car_type); $i++) { ?>
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold"><?php echo $arr_car_type[$i]->cart_id?></p>
                                </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $arr_car_type[$i]->cart_name?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $arr_car_type[$i]->cart_status?>
                            </td>
                        </tr>
                    <?php } ?>
                  </tbody>
                </table>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('.table').DataTable();
    } );
</script>
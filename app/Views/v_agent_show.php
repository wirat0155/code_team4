<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        ข้อมูลเอเยนต์
    </h2>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap table">
                  <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                      <th class="px-4 py-3">บริษัท</th>
                      <th class="px-4 py-3">ผู้รับผิดชอบ</th>
                      <th class="px-4 py-3">จำนวนตู้ที่กำลังใช้</th>
                      <th class="px-4 py-3">เบอร์โทรศัพท์</th>
                      <th class="px-4 py-3">email</th>
                      <th class="px-4 py-3">ดำเนินการ</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <?php for($i = 0; $i < count($arr_agent); $i++) { ?>

                        <?php
                                $k=0;
                                $g=0;
                            if($arr_agent[$i]->con_agn_id==$arr_agent[$i]->agn_id){
                                $g+=1;
                                for($j=0;$j<$i;$j++)){
                                    if($arr_agent[$i]->agn_id==$arr_agent[$j]->agn_id){
                                        $g+=1;
                                        $k=1;
                                    }
                                }
                            }
                            if($k==0){

                            
                        ?>



                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                <?php echo $arr_agent[$i]->agn_company_name?></p>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $arr_agent[$i]->agn_firstname." ".$arr_agent[$i]->agn_lastname ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $g ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $arr_agent[$i]->agn_tel ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $arr_agent[$i]->agn_email ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                            
                            </td>
                        </tr>
                    <?php } } ?>
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
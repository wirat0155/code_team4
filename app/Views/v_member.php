<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        สมาชิก
    </h2>

    <div class="mb-6" style="text-align: right;">
        <button class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            เพิ่มสมาชิก
        </button>
    </div>
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <?php for ($i = 0; $i < count($arr_member); $i++) {?>
              <!-- Card -->
              <div class="items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="">

                <!-- Avatar with inset shadow -->
                <div class="mb-4">
                <center>
                    <img class="object-cover w-full h-full rounded-full" src="<?=base_url() . '/upload/' . $arr_member[$i]->mem_img?>" alt="" loading="lazy" style="width: 5.5rem; height: 5.5rem; object-fit: cover;">
                </center>
                </div>
                <div style="text-align: center;">
                  <p class="mb-2 text-xs font-medium text-gray-600 dark:text-gray-400">
                    <?= esc($arr_member[$i]->pos_name)?>
                  </p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    <?= esc($arr_member[$i]->mem_firstname . " " . $arr_member[$i]->mem_lastname)?>
                  </p>
                  <div class="mt-4">
                  <button class="px-4 py-2 text-sm leading-5 text-white transition-colors duration-150 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" style="background-color: #edb142" onclick="update_modal(<?= esc($arr_member[$i]->mem_id)?>)">
                  แก้ไข
                </button>
                <a href="<?php echo base_url() . '/public/delete_member/' . $arr_member[$i]->mem_id?>">
                  <button class="px-4 py-2 text-sm leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                  ลบ
                </button>
                </a>
                </div>
                </div>
              </div>
              <?php } ?>
</div>
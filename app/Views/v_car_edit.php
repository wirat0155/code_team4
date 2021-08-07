<div class="container mx-auto grid mt-3">
    <form id="edit_car_form" action="<?php echo base_url(). '/public/Car_edit/car_update' ?>" method="POST">
    <input type='hidden' name='car_id' value="<?php echo $arr_car[0]->car_id ?>">

        <div class="container-sm col-12 col-xl-7">
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md p-3">
                <h2 class="my-6 text-2xl font-semibold dark:text-gray-200">ข้อมูลรถ</h2>
                <hr class="mb-1">

                <div class="row">
                    <!-- car form left -->
                    <div class="col-12 col-md-6">
                        <!-- หมายเลขรถ -->
                        <div class="row mt-3">
                            <div class="col-12 col-sm-4">
                                <label class="block text-sm mt-3">
                                    <span class="text-gray-700 dark:text-gray-400">หมายเลขรถ</span>
                                </label>
                            </div>

                            <div class="col-12 col-sm-8">
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="car_number" value="<?php echo $arr_car[0]->car_number ?>">
                            </div>
                        </div>

                        <!-- ทะเบียน -->
                        <div class="row mt-3">
                            <div class="col-12 col-sm-4">
                                <label class="block text-sm mt-3">
                                    <span class="text-gray-700 dark:text-gray-400">ทะเบียน</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-8">
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="car_code" value="<?php echo $arr_car[0]->car_code ?>">
                                <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="car_prov_id" value="<?php echo $arr_car[0]->car_prov_id ?>">
                                    <option value="1">ชลบุรี</option>
                                    <option value="2">กรุงเทพ</option>
                                </select>
                            </div>
                        </div>

                        <!-- ประเภทรถ -->
                        <div class="row mt-3">
                            <div class="col-12 col-sm-4">
                                <label class="block text-sm mt-3">
                                    <span class="text-gray-700 dark:text-gray-400">ประเภทรถ</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-8">
                                <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="car_cart_id" value="<?php echo $arr_car[0]->car_cart_id ?>">
                                    <option value="0">บรรทุก 4 ล้อ</option>
                                    <option value="1">บรรทุก 8 ล้อ</option>
                                </select>
                            </div>
                        </div>

                        <!-- สถานะรถ -->
                        <div class="row mt-3">
                            <div class="col-12 col-sm-4">
                                <label class="block text-sm mt-3">
                                    <span class="text-gray-700 dark:text-gray-400">สถานะรถ</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-8">
                                <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="car_status" value="<?php echo $arr_car[0]->car_status ?>">
                                    <option value="1">พร้อมใช้</option>
                                    <option value="2">เสียหาย</option>
                                    <option value="3">กำลังซ่อม</option>
                                    <option value="4">เลิกใช้แล้ว</option>
                                </select>
                            </div>
                        </div>

                        <!-- ภาพ -->
                        <div class="row mt-3">
                            <div class="col-12 col-sm-4">
                                <label class="block text-sm mt-3">
                                    <span class="text-gray-700 dark:text-gray-400">ภาพ</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-8">
                                <!-- <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number"  name="con_tare_weight" value="<?php echo $arr_car[0]->car_image ?>"  -->
                            </div>
                        </div>
                    </div>
                    <!-- end car form left -->

                    <!-- car form right -->
                    <div class="col-12 col-md-6">
                        <!-- ยี่ห้อ -->
                        <div class="row mt-3">
                            <div class="col-12 col-sm-4">
                                <label class="block text-sm mt-3">
                                    <span class="text-gray-700 dark:text-gray-400">ยี่ห้อ</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-8">
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="car_brand" value="<?php echo $arr_car[0]->car_brand ?>">
                            </div>
                        </div>

                        <!-- สาขา -->
                        <div class="row mt-3">
                            <div class="col-12 col-sm-4">
                                <label class="block text-sm mt-3">
                                    <span class="text-gray-700 dark:text-gray-400">สาขา</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-8">
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="car_branch" value="<?php echo $arr_car[0]->car_branch ?>">
                            </div>
                        </div>

                        <!-- หมายเลขโครงรถ -->
                        <div class="row mt-3">
                            <div class="col-12 col-sm-5">
                                <label class="block text-sm mt-3">
                                    <span class="text-gray-700 dark:text-gray-400">หมายเลขโครงรถ</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-7">
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="car_chassis_number" value="<?php echo $arr_car[0]->car_chassis_number ?>">
                            </div>
                        </div>

                        <!-- ปีที่จดทะเบียน -->
                        <div class="row mt-3">
                            <div class="col-12 col-sm-5">
                                <label class="block text-sm mt-3">
                                    <span class="text-gray-700 dark:text-gray-400">ปีที่จดทะเบียน</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-7">
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="car_register_year" value="<?php echo $arr_car[0]->car_register_year ?>">
                            </div>
                        </div>

                        <!-- น้ำหนักรถ (ตัน) -->
                        <div class="row mt-3">
                            <div class="col-12 col-sm-5">
                                <label class="block text-sm mt-3">
                                    <span class="text-gray-700 dark:text-gray-400">น้ำหนักรถ (ตัน)</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-7">
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="car_weight" value="<?php echo $arr_car[0]->car_weight ?>">
                            </div>
                        </div>

                        <!-- ชนิดน้ำมัน -->
                        <div class="row mt-3">
                            <div class="col-12 col-sm-4">
                                <label class="block text-sm mt-3">
                                    <span class="text-gray-700 dark:text-gray-400">ชนิดน้ำมัน</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-8">
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="car_fuel_type" value="<?php echo $arr_car[0]->car_fuel_type?>">
                            </div>
                        </div>

                    </div>
                    <!-- end car form right -->
                </div>
                <!-- end car form row -->
            </div>
        </div>
        <!-- end car form -->

        <div class="container-sm text-right col-12 col-xl-7">
            <input class="btn btn-secondary px-4 py-2 text-sm font-medium leading-5 text-white" type="reset" value="ยกเลิก" onclick="window.history.back();" >
            <input class="btn btn-success px-4 py-2 text-sm font-medium leading-5 text-white" type="submit" value="บันทึกการแก้ไข" >
        </div>
    </form>
    <br>
    <br>
</div>

<script>
$(document).ready(function() {
    // jQuery Validation
    if ($('#add_cae_form').length > 0) {
        $('#add_car_form').validate({
            rules: {
                car_code: {
                    required: true
                },

            },
            messages: {
                car_code: {
                    required: 'กรุณากรอกชื่อบริษัทเอเย่นต์',
                },

            }
        })
    }
});
</script>
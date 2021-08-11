<style>
.upload-file {
    background-color: #eeeee4;
    border: none;
    color: black;
    border-radius: 8px;
    font-size: 14px;
    padding: 8px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}

#file_name {
    display: block;/* or inline-block */
    text-overflow: ellipsis;
    word-wrap: break-word;
    overflow: hidden;
    max-height: 100%;
    line-height: 1.5em;
    margin-top: 10;
}
</style>

<div class="container px-3 mx-auto grid">

    <!-- หัวข้อ -->
    <di class="flex items-center justify-between p-3 pl-4 my-8 text-sm font-semibold bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <h2 class=" text-2xl font-semibold">
                ข้อมูลรถ
            </h2>
        </div>
    </di>

    <form id="add_car_form" action="<?php echo base_url(). '/public/Car_input/car_insert' ?>" enctype="multipart/form-data" method="POST">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="car_number" placeholder="10">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="car_code" placeholder="กข 123">
                                <!-- จังหวัด -->
                                <select class=" block w-full mt-1 text-sm focus:outline-none form-input" name="car_prov_id">
                                    <?php for($i = 0; $i < count($arr_car_prov); $i++) { ?>
                                    <option value="<?php echo $arr_car_prov[$i]->prov_id?>"><?php echo $arr_car_prov[$i]->prov_name?></option>
                                    <?php } ?>
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
                                <select class="block w-full mt-1 text-sm focus:outline-none form-input" name="car_cart_id">
                                    <?php for($i = 0; $i < count($arr_car_type); $i++) { ?>
                                    <option value="<?php echo $arr_car_type[$i]->cart_id?>"><?php echo $arr_car_type[$i]->cart_name?></option>
                                    <?php } ?>
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
                                <!-- <div class="upload-btn-wrapper"> -->
                                    <div class="upload-file btn" onclick="$('#car_image').click();">เลือกไฟล์</div>
                                    <div id='file_name'></div>
                                    <input type="file" id="car_image" name="car_image" onchange="get_image()" accept="image/jpg,image/jpeg,image/png" hidden>
                                <!-- </div> -->
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="car_brand" placeholder="ยี่ห้อ">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="car_branch" placeholder="สาขา">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="car_chassis_number" placeholder="01001">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="car_register_year" placeholder="ปีที่จดทะเบียน">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" type="number" step="0.01" name="car_weight" placeholder="0.01">
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
                                <input class="block w-full mt-1 text-sm focus:outline-none form-input" name="car_fuel_type" placeholder="ชนิดน้ำมัน">
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
            <input class="btn btn-secondary px-4 py-2 text-sm font-medium leading-5 text-white" type="reset" value="ยกเลิก" />
            <input class="btn btn-success px-4 py-2 text-sm font-medium leading-5 text-white" type="submit" value="บันทึก" />
        </div>
    </form>
    <br>
    <br>
</div>

<script>
$(document).ready(function() {
    // jQuery Validation
    if ($('#add_car_form').length > 0) {
        $('#add_car_form').validate({
            rules: {
                car_number: {
                    required: true
                },
                car_code: {
                    required: true
                },
                car_brand: {
                    required: true
                },
                car_branch: {
                    required: true
                },
                car_chassis_number: {
                    required: true
                },
                car_register_year: {
                    required: true
                },
                car_weight: {
                    required: true,
                    min: 0
                },
                car_fuel_type: {
                    required: true
                },
                car_image: {
                    required: true
                },

            },
            messages: {
                car_number: {
                    required: 'กรุณากรอกหมายเลขรถ'
                },
                car_code: {
                    required: 'กรุณากรอกทะเบียนรถ'
                },
                car_brand: {
                    required: 'กรุณากรอกยี่ห้อรถ'
                },
                car_branch: {
                    required: 'กรุณากรอกสาขา'
                },
                car_chassis_number: {
                    required: 'กรุณากรอกหมายเลขโครงรถ'
                },
                car_register_year: {
                    required: 'กรุณากรอกปีที่จดทะเบียน'
                },
                car_weight: {
                    required: 'กรุณากรอกน้ำหนักรถ',
                    min: 'กรุณากรอกอย่างน้อย 0'
                },
                car_fuel_type: {
                    required: 'กรุณากรอกชนิดน้ำมัน'
                },
                car_image: {
                    required: 'กรุณาเลือกไฟล์รูป'
                },

            }
        })
    }
});

function get_image() {
    var car_img = $('#car_image').val();
    $('#file_name').html(car_img.substr(12));
}
</script>
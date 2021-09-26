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

    .input-image {
        height: 0;
        width: 0;
        left: 0;
        top: 0;
        opacity: 0;
        cursor: pointer;
    }

    #file_name {
        display: block;
        /* or inline-block */
        text-overflow: ellipsis;
        word-wrap: break-word;
        overflow: hidden;
        max-height: 100%;
        line-height: 1.5em;
        margin-top: 10;
    }

    .picture-container {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }

    .picture {
        width: 200px;
        height: 200px;
        background-color: #999999;
        border: 4px solid #CCCCCC;
        color: #FFFFFF;
        border-radius: 50%;
        margin: auto;
        overflow: hidden;
        transition: all 0.2s;
        -webkit-transition: all 0.2s;
        text-align: center;
    }
</style>

<div class="container px-6 mx-auto grid">
    <!-- หัวข้อ -->
    <div class="flex items-center justify-between p-3 pl-4 my-8 text-sm font-semibold bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="items-center container">
            <h2 class=" text-2xl font-semibold float-left">
                ข้อมูลรถ
            </h2>
            <div class="float-right">
                <a href="<?php echo base_url() . '/Car_edit/car_edit/' . $arr_car[0]->car_id ?>" class="btn btn-warning px-2 mr-1 text-sm">แก้ไขข้อมูล</a>
                <button type="button" class="btn btn-danger px-2 text-sm" data-toggle="modal" data-target="#exampleModalCenter" onclick="get_id(<?php echo $arr_car[0]->car_id ?>)">ลบข้อมูล
                </button>
            </div>
        </div>
    </div>

    <form id="add_car_form" action="<?php echo base_url() . '/Car_show/car_detail' ?>" enctype="multipart/form-data" method="POST">
        <input type='hidden' name='car_id' value="<?php echo $arr_car[0]->car_id ?>">

        <div class="container-sm col-12 col-xl-7">
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md p-3">
                <h2 class="my-6 text-2xl font-semibold dark:text-gray-200">ข้อมูลรถ</h2>
                <hr class="mb-1">

                <div class="picture-container">
                    <div class="picture">
                        <img src=<?php echo base_url() . '/car_image/' . $arr_car[0]->car_image ?>>
                    </div>
                </div>

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
                                <p class="block w-full mt-3 text-sm"> <?php echo $arr_car[0]->car_number ?></p>
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
                                <p class="block w-full mt-3 text-sm"> <?php echo $arr_car[0]->car_code ?></p>
                                <!-- จังหวัด -->

                                <p class="block w-full mt-1 text-sm">
                                    <?php for ($i = 0; $i < count($arr_car_prov); $i++) { ?>
                                        <?php if ($arr_car_prov[$i]->prov_id == $arr_car[0]->car_prov_id) {
                                            echo $arr_car_prov[$i]->prov_name;
                                        } ?>
                                    <?php } ?></p>

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

                                <p class="block w-full mt-3 text-sm">
                                    <?php for ($i = 0; $i < count($arr_car_type); $i++) { ?>
                                        <?php if ($arr_car_type[$i]->cart_id == $arr_car[0]->car_cart_id) {
                                            echo $arr_car_type[$i]->cart_name;
                                        } ?>
                                    <?php } ?></p>

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
                                <p class="block w-full mt-3 text-sm">
                                    <?php if ($arr_car[0]->car_status == 1) {
                                        echo  "พร้อมใช้";
                                    } else if ($arr_car[0]->car_status == 2) {
                                        echo "เสียหาย";
                                    } else if ($arr_car[0]->car_status == 3) {
                                        echo "กำลังซ่อม";
                                    } else if ($arr_car[0]->car_status == 4) {
                                        echo "เลิกใช้งาน";
                                    } ?>
                                </p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $arr_car[0]->car_fuel_type ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $arr_car[0]->car_brand ?></p>
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
                                <p class="block w-full mt-3 text-sm"><?php echo $arr_car[0]->car_branch ?></p>
                            </div>
                        </div>

                        <!-- หมายเลขโครงรถ -->
                        <div class="row mt-3">
                            <div class="col-12 col-sm-4">
                                <label class="block text-sm mt-3">
                                    <span class="text-gray-700 dark:text-gray-400">หมายเลขโครงรถ</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-8">
                                <p class="block w-full mt-3 text-sm"><?php echo $arr_car[0]->car_chassis_number ?></p>
                            </div>
                        </div>

                        <!-- ปีที่จดทะเบียน -->
                        <div class="row mt-3">
                            <div class="col-12 col-sm-4">
                                <label class="block text-sm mt-3">
                                    <span class="text-gray-700 dark:text-gray-400">ปีที่จดทะเบียน</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-8">
                                <p class="block w-full mt-3 text-sm"> <?php echo $arr_car[0]->car_register_year ?></p>
                            </div>
                        </div>

                        <!-- น้ำหนักรถ (ตัน) -->
                        <div class="row mt-3">
                            <div class="col-12 col-sm-4">
                                <label class="block text-sm mt-3">
                                    <span class="text-gray-700 dark:text-gray-400">น้ำหนักรถ (ตัน)</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-8">
                                <p class="block w-full mt-3 text-sm"><?php echo $arr_car[0]->car_weight ?></p>
                            </div>
                        </div>


                    </div>
                    <!-- end car form right -->
                </div>
                <!-- end car form row -->
            </div>
        </div>
    </form>
    <br>
    <br>
</div>

<!-- Modal ยืนยันการลบ -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบข้อมูลรถ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url() . '/Car_show/car_delete' ?>" method="post">
                <div class="modal-body float-center">
                    <!-- เก็บ Car Id -->
                    <input name="car_id" id="car_id" type="hidden">
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
    function get_image() {
        var car_img = $('#car_image').val();
        $('#file_name').html(car_img.substr(12));
        $('#car_image-error').remove();
        $('#old_car_image').remove();
    }

    function get_id(car_id) {
        $('#car_id').val(car_id);
    }
</script>
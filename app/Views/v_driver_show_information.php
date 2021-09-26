<style>
    @media (min-width: 1200px) {
        .container-sm {
            max-width: 900px;
        }
    }

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
                ข้อมูลพนักงานขับรถ
            </h2>
            <div class="float-right">
                <a href="<?php echo base_url() . '/Driver_edit/driver_edit/' . $arr_driver[0]->dri_id ?>" class="btn btn-warning px-2 mr-1 text-sm ">แก้ไขข้อมูล</a>
                <button type="button" class="btn btn-danger px-2 text-sm" data-toggle="modal" data-target="#exampleModalCenter" onclick="get_id(<?php echo $arr_driver[0]->dri_id ?>)">ลบข้อมูล
                </button>
            </div>
        </div>
    </div>

    <div class="container-sm mb-8">

        <form id="add_driver_form" action="<?php echo base_url() . '/Driver_info/driver_show_info' ?>" enctype="multipart/form-data" method="POST">
            <input type='hidden' name='dri_id' value="<?php echo $arr_driver[0]->dri_id ?>">
            <!-- เพิ่มพนักงาน -->
            <div class="container-sm px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                <h4 class="px-3 my-4 text-xl font-semibold">
                    พนักงานขับรถ
                </h4>

                <div class="mb-4 container border-bottom"></div>

                <div class="container">


                    <div class="picture-container">
                        <div class="picture">
                            <img src="<?php echo base_url() . '/dri_profile_image/' . $arr_driver[0]->dri_profile_image ?>">
                        </div>
                    </div><br>


                    <!-- ชื่อ นามสกุล -->
                    <div class="px-3 form-group row">
                        <label for="dri_name" class="col-sm-3 col-form-label">ชื่อ-นามสกุล</label>
                        <div class="col-sm-9">
                            <p class="col-sm-3 col-form-label"><?php echo $arr_driver[0]->dri_name ?></p>
                        </div>
                    </div>

                    <!-- เลขบัตรประชาชน -->
                    <div class="px-3 form-group row">
                        <label for="dri_card_number" class="col-sm-3 col-form-label">หมายเลขบัตรประชาชน</label>
                        <div class="col-sm-9">
                            <p class="col-sm-3 col-form-label"><?php echo $arr_driver[0]->dri_card_number ?></p>
                        </div>
                    </div>

                    <!-- หมายเลขใบขับขี่ -->
                    <div class="px-3 form-group row">
                        <label for="dri_license" class="col-sm-3 col-form-label">หมายเลขใบขับขี่</label>
                        <div class="col-sm-9">
                            <p class="col-sm-3 col-form-label"><?php echo $arr_driver[0]->dri_license ?></p>
                        </div>
                    </div>

                    <!-- เบอร์โทร -->
                    <div class="px-3 form-group row">
                        <label for="dri_tel" class="col-sm-3 col-form-label">เบอร์โทร</label>
                        <div class="col-sm-9">
                            <p class="col-sm-3 col-form-label"><?php echo $arr_driver[0]->dri_tel ?></p>
                        </div>
                    </div>
                    <!-- หมายเลขรถ -->
                    <div class="px-3 form-group row">
                        <label for="dri_car_id" class="col-sm-3 col-form-label">หมายเลขรถ</label>
                        <div class="col-sm-9">
                            <p class="col-sm-3 col-form-label"><?php echo $arr_driver[0]->dri_car_id ?></p>
                        </div>
                    </div>

                    <div class="px-3 form-group row">
                        <label for="dri_license_type" class="col-sm-3 col-form-label">ประเภทใบขับขี่</label>
                        <div class="col-sm-9">
                            <p class="col-sm-3 col-form-label">
                                <?php if ($arr_driver[0]->dri_license_type == 1) {
                                    echo 'ท.1';
                                } else if ($arr_driver[0]->dri_license_type == 2) {
                                    echo 'ท.2';
                                } else if ($arr_driver[0]->dri_license_type == 3) {
                                    echo 'ท.3';
                                } else if ($arr_driver[0]->dri_license_type == 4) {
                                    echo 'ท.4';
                                } ?>
                            </p>
                        </div>
                    </div>

                    <div class="px-3 form-group row">
                        <label for="dri_status" class="col-sm-3 col-form-label">สถานะของคนขับรถ</label>
                        <div class="col-sm-9">
                            <p class="col-sm-3 col-form-label">
                                <?php if ($arr_driver[0]->dri_status == 1) {
                                    echo 'พร้อมทำงาน';
                                } else if ($arr_driver[0]->dri_status == 2) {
                                    echo 'กำลังปฏิบัติงาน';
                                } else if ($arr_driver[0]->dri_status == 3) {
                                    echo 'สำรอง';
                                } else if ($arr_driver[0]->dri_status == 4) {
                                    echo 'ลาออก';
                                }
                                ?></p>
                        </div>
                    </div>


                    <!-- วันเข้าทำงาน -->
                    <div class="px-3 form-group row">
                        <label for="dri_date_start" class="col-sm-3 col-form-label">วันที่เข้าทำงาน</label>
                        <div class="col-sm-9">
                            <p class="col-sm-3 col-form-label"><?php echo $arr_driver[0]->dri_date_start ?></p>
                        </div>
                    </div>

                    <!-- วันที่ลาออก -->
                    <div class="px-3 form-group row">
                        <label for="dri_date_end" class="col-sm-3 col-form-label">วันที่ลาออก</label>
                        <div class="col-sm-9">
                            <p class="col-sm-3 col-form-label"><?php echo $arr_driver[0]->dri_date_end ?></p>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบเอเย่นต์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url() . '/Driver_show/driver_delete' ?>" method="post">
                <div class="modal-body float-center">
                    <!-- เก็บ Driver Id -->
                    <input name="dri_id" id="dri_id" type="hidden">
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
        var dri_profile_image = $('#dri_profile_image').val();
        $('#file_name').html(dri_profile_image.substr(12));
        $('#dri_profile_image-error').remove();
        $('#old_dri_profile_image').remove();
    }

    function get_id(dri_id) {
        $('#dri_id').val(dri_id);
    }
</script>
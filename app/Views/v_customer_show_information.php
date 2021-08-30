<style>
@media (min-width: 1200px) {
    .container-sm {
        max-width: 900px;
    }
}
</style>

<div class="container px-6 mx-auto grid">

    <!-- หัวข้อ -->
    <div
        class="flex items-center justify-between p-3 pl-4 my-8 bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="items-center container">
            <h2 class=" text-2xl font-semibold float-left">
                ข้อมูลลูกค้า
            </h2>
            <div class="float-right">
                <!-- ปุ่มแก้ไข -->
                <a href="<?php echo base_url() . '/public/Customer_edit/customer_edit/' . $arr_customer[0]->cus_id ?>"
                    class="btn btn-warning px-2 mr-1 text-sm ">แก้ไขข้อมูล</a>
                <!-- ปุ่มลบ -->
                <button type="button" class="btn btn-danger px-2 text-sm" data-toggle="modal"
                    data-target="#Modal_Confirm" onclick="get_id(<?php echo $arr_customer[0]->cus_id ?>)">ลบข้อมูล
                </button>
            </div>
        </div>
    </div>


    <div class="container-sm mb-8">

        <form id="edit_customer_form" action="<?php echo base_url() . '/public/Customer_edit/customer_update' ?>"
            method="post">
            <input type='hidden' name='cus_id' value="<?php echo $arr_customer[0]->cus_id ?>">
            <!-- เพิ่มลูกค้า -->
            <div class="container-sm px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                <h4 class="px-3 my-4 text-xl font-semibold">
                    ลูกค้า
                </h4>

                <div class="mb-4 container border-bottom"></div>

                <div class="container">
                    <!-- บริษัท -->
                    <div class="px-3 form-group row">
                        <label for="cus_company_name" class="col-sm-3 col-form-label"><b>บริษัท</b></label>
                        <div class="col-sm-9">
                            <p class="block w-full mt-2"> <?php echo $arr_customer[0]->cus_company_name ;
                                                        if($arr_customer[0]->cus_branch != '') 
                                                            echo ' สาขา ' . $arr_customer[0]->cus_branch; ?></p>
                            <p class="block w-full mt-2"> <?php echo $arr_customer[0]->cus_address ?></p>
                        </div>
                    </div>

                    <!-- หมายเลขผู้เสียภาษี -->
                    <div class="px-3 form-group row">
                        <label for="cus_tax" class="col-sm-3 col-form-label"><b>หมายเลขผู้เสียภาษี</b></label>
                        <div class="col-sm-9">
                            <p class="block w-full mt-2"> <?php echo $arr_customer[0]->cus_tax ?></p>
                        </div>
                    </div>

                    <!-- ผู้รับผิดชอบ -->
                    <div class="px-3 form-group row">
                        <label for="cus_firstname" class="col-sm-3 col-form-label"><b>ผู้รับผิดชอบ</b></label>
                        <div class="col-sm-9">
                            <p class="block w-full mt-2"> <?php echo $arr_customer[0]->cus_firstname . ' ' . $arr_customer[0]->cus_lastname ?></p>
                        </div>
                    </div>

                    <!-- ติดต่อ -->
                    <div class="px-3 form-group row">
                        <label for="cus_tel" class="col-sm-3 col-form-label"><b>ติดต่อ</b></label>
                        <div class="col-sm-9">
                            <p class="block w-full mt-2"><?php echo $arr_customer[0]->cus_tel ?></p>
                            <p class="block w-full mt-2"> <?php echo $arr_customer[0]->cus_email ?> </p>
                        </div>
                    </div>

                </div>
            </div>

        </form>

    </div>

</div>
<!-- Modal ยืนยันการลบ -->
<div class="modal fade" id="Modal_Confirm" tabindex="-1" role="dialog" aria-labelledby="Modal_ConfirmTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบลูกค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?php echo base_url() . '/public/Customer_show/customer_delete' ?>" method="post">
                <div class="modal-body float-center">
                    <!-- เก็บ Customer Id -->
                    <input name="cus_id" id="cus_id" type="hidden">
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
    // jQuery Validation
    if ($('#edit_customer_form').length > 0) {
        $('#edit_customer_form').validate({
            rules: {
                cus_company_name: {
                    required: true
                },
                cus_tax: {
                    required: true
                },
                cus_address: {
                    required: true
                },
                cus_firstname: {
                    required: true
                },
                cus_lastname: {
                    required: true
                },
                cus_tel: {
                    required: true,
                    minlength: 10,
                    maxlength: 10
                },
                cus_email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                cus_company_name: {
                    required: 'กรุณากรอกชื่อบริษัท'
                },
                cus_tax: {
                    required: 'กรุณากรอกหมายเลขผู้เสียภาษี'
                },
                cus_address: {
                    required: 'กรุณากรอกที่อยู่'
                },
                cus_firstname: {
                    required: 'กรุณากรอกชื่อจริง'
                },
                cus_lastname: {
                    required: 'กรุณากรอกนามสกุล'
                },
                cus_tel: {
                    required: 'กรุณากรอกเบอร์โทรศัพท์',
                    minlength: 'กรุณากรอกตัวเลขจำนวน 10 ตัวอักษร',
                    maxlength: 'กรุณากรอกตัวเลขจำนวน 10 ตัวอักษร'
                },
                cus_email: {
                    required: 'กรุณากรอกอีเมล',
                    email: 'กรุณากรอกอีเมลให้ถูกต้อง'
                }
            }
        })
    }
});

function get_id(cus_id) {
    $('#cus_id').val(cus_id);
}
</script>
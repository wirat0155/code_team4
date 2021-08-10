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
        class="flex items-center justify-between p-3 pl-4 my-8 text-sm font-semibold bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <h2 class=" text-2xl font-semibold">
                ข้อมูลลูกค้า
            </h2>
        </div>
    </div>


    <div class="container-sm mb-8">
        
        <form id="add_container_form" action="<?php echo base_url(). '/public/Customer_input/customer_insert' ?>" method="post">
            
            <!-- เพิ่มลูกค้า -->
            <div class="container-sm px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                <h4 class="px-3 my-4 text-xl font-semibold">
                    ลูกค้า
                </h4>

                <div class="mb-4 container border-bottom"></div>

                <div class="container">
                    <!-- บริษัท -->
                    <div class="px-3 form-group row">
                        <label for="cus_company_name" class="col-sm-3 col-form-label">บริษัท</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="cus_company_name" name="cus_company_name" placeholder="บริษัท">
                        </div>
                    </div>

                    <!-- สาขา -->
                    <div class="px-3 form-group row">
                        <label for="cus_branch" class="col-sm-3 col-form-label">สาขา</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="cus_branch" name="cus_branch" placeholder="สาขา">
                        </div>
                    </div>

                    <!-- ที่ตั้งบริษัท -->
                    <div class="px-3 form-group row">
                        <label for="cus_address" class="col-sm-3 col-form-label">ที่ตั้งบริษัท</label>
                        <div class="col-sm-9">
                            <textarea class="form-control form-input" id="cus_address" name="cus_address" placeholder="ที่ตั้งบริษัท" rows="3"></textarea>
                        </div>
                    </div>

                    <!-- หมายเลขผู้เสียภาษี -->
                    <div class="px-3 form-group row">
                        <label for="cus_tax" class="col-sm-3 col-form-label">หมายเลขผู้เสียภาษี</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="cus_tax" name="cus_tax" placeholder="หมายเลขผู้เสียภาษี">
                        </div>
                    </div>

                    <!-- ผู้รับผิดชอบ -->
                    <div class="px-3 pt-4 pb-2 form-group row">
                        <div class="col-sm-12">
                            ผู้รับผิดชอบ (ตัวแทน)
                        </div>
                    </div>

                    <!-- ชื่อจริง -->
                    <div class="px-3 form-group row">
                        <label for="cus_firstname" class="col-sm-3 col-form-label">ชื่อจริง</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="cus_firstname" name="cus_firstname" placeholder="ชื่อจริง" >
                        </div>
                    </div>

                    <!-- นามสกุล -->
                    <div class="px-3 form-group row">
                        <label for="cus_lastname" class="col-sm-3 col-form-label">นามสกุล</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="cus_lastname" name="cus_lastname" placeholder="นามสกุล" >
                        </div>
                    </div>

                    <!-- เบอร์ติดต่อ -->
                    <div class="px-3 form-group row">
                        <label for="cus_tel" class="col-sm-3 col-form-label">เบอร์ติดต่อ</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control form-input" id="cus_tel" name="cus_tel" placeholder="1234567890">
                        </div>
                    </div>

                    <!-- อีเมล -->
                    <div class="px-3 form-group row">
                        <label for="cus_email" class="col-sm-3 col-form-label">อีเมล</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control form-input" id="cus_email" name="cus_email" placeholder="อีเมล">
                        </div>
                    </div>
                </div>
            </div>
            <div class="float-right">
                <input type="reset" onclick="window.history.back();" class="button shadow-sm px-4 py-2 text-sm font-medium leading-5 text-white bg-secondary rounded-lg shadow-md right mr-2" value="ยกเลิก">
                <input type="submit" class="button shadow-sm px-4 py-2 text-sm font-medium leading-5 text-white bg-success rounded-lg shadow-md right" value="บันทึก">
            </div>
        </form>

    </div>

</div>

<script>
    $(document).ready(function() {
        // jQuery Validation
        if ($('#add_container_form').length > 0) {
            $('#add_container_form').validate({
                rules: {
                    cus_company_name: {
                        required: true
                    },
                    cus_tax: {
                        required: true,
                        minlength:13, 
                        maxlength:13
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
                    cus_tel:{
                        required: true,
                        minlength:10, 
                        maxlength:10
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
                        required: 'กรุณากรอกหมายเลขผู้เสียภาษี',
                        minlength:'กรุณากรอกตัวเลขจำนวน 13 ตัวอักษร', 
                        maxlength:'กรุณากรอกตัวเลขจำนวน 13 ตัวอักษร'
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
                    cus_tel:{
                        required: 'กรุณากรอกเบอร์โทรศัพท์',
                        minlength:'กรุณากรอกตัวเลขจำนวน 10 ตัวอักษร', 
                        maxlength:'กรุณากรอกตัวเลขจำนวน 10 ตัวอักษร'
                    },
                    cus_email: {
                        required: 'กรุณากรอกอีเมล',
                        email: 'กรุณากรอกอีเมลให้ถูกต้อง'
                    }
                }
            })
        }
    });
</script>
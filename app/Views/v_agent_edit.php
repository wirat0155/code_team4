<style>
    @media (min-width: 1200px) {
        .container-sm {
            max-width: 900px;
        }
    }
</style>

<div class="container px-6 mx-auto grid">

    <!-- หัวข้อ -->
    <div class="flex items-center justify-between p-3 pl-4 my-8 text-sm font-semibold bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <h2 class=" text-2xl font-semibold">
                แก้ไขข้อมูลเอเย่นต์
            </h2>
        </div>
    </div>


    <div class="container-sm mb-8">

        <form id="add_agent_form" action="<?php echo base_url() . '/public/Agent_edit/agent_update' ?>" method="post">
            <input type='hidden' name='agn_id' value="<?php echo $arr_agent[0]->agn_id ?>">
            <!-- เพิ่มลูกค้า -->
            <div class="container-sm px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                <h4 class="px-3 my-4 text-xl font-semibold">
                    เอเย่นต์
                </h4>

                <div class="mb-4 container border-bottom"></div>

                <div class="container">
                    <!-- บริษัท -->
                    <div class="px-3 form-group row">
                        <label for="cus_company_name" class="col-sm-3 col-form-label">บริษัท</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="agn_company_name" name="agn_company_name" placeholder="บริษัท" value="<?php echo $arr_agent[0]->agn_company_name ?>">
                        </div>
                    </div>

                    <!-- ที่ตั้งบริษัท -->
                    <div class="px-3 form-group row">
                        <label for="cus_address" class="col-sm-3 col-form-label">ที่ตั้งบริษัท</label>
                        <div class="col-sm-9">
                            <textarea class="form-control form-input" id="agn_address" name="agn_address" placeholder="ที่ตั้งบริษัท" rows="3" value="<?php echo $arr_agent[0]->agn_address ?>"><?php echo $arr_agent[0]->agn_address ?></textarea>
                        </div>
                    </div>

                    <!-- หมายเลขผู้เสียภาษี -->
                    <div class="px-3 form-group row">
                        <label for="cus_tax" class="col-sm-3 col-form-label">หมายเลขผู้เสียภาษี</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="agn_tax" name="agn_tax" placeholder="หมายเลขผู้เสียภาษี" maxlength="13" pattern="[0-9]{13}" value="<?php echo $arr_agent[0]->agn_tax ?>">
                        </div>
                    </div>

                    <!-- ผู้รับผิดชอบ -->
                    <div class="px-3 mt-3 form-group row">
                        <div class="col-sm-12">
                            ผู้รับผิดชอบ (ตัวแทน)
                        </div>
                    </div>

                    <!-- ชื่อจริง -->
                    <div class="px-3 form-group row">
                        <label for="cus_firstname" class="col-sm-3 col-form-label">ชื่อจริง</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="agn_firstname" name="agn_firstname" placeholder="ชื่อจริง" value="<?php echo $arr_agent[0]->agn_firstname ?>">
                        </div>
                    </div>

                    <!-- นามสกุล -->
                    <div class="px-3 form-group row">
                        <label for="cus_lastname" class="col-sm-3 col-form-label">นามสกุล</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="agn_lastname" name="agn_lastname" placeholder="นามสกุล" value="<?php echo $arr_agent[0]->agn_lastname ?>">
                        </div>
                    </div>

                    <!-- เบอร์ติดต่อ -->
                    <div class="px-3 form-group row">
                        <label for="cus_tel" class="col-sm-3 col-form-label">เบอร์ติดต่อ</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control form-input" id="agn_tel" name="agn_tel" placeholder="08x-xxx-xxxx" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" maxlength="10" value="<?php echo $arr_agent[0]->agn_tel ?>">
                        </div>
                    </div>

                    <!-- อีเมล -->
                    <div class="px-3 form-group row">
                        <label for="cus_email" class="col-sm-3 col-form-label">อีเมล</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control form-input" id="agn_email" name="agn_email" placeholder="อีเมล" value="<?php echo $arr_agent[0]->agn_email ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="float-right">
                <input class="btn btn-secondary px-4 py-2 text-sm font-medium leading-5 text-white" type="button" value="ยกเลิก" onclick="window.history.back();">
                <input class="btn btn-success px-4 py-2 text-sm font-medium leading-5 text-white" type="submit" value="บันทึกการแก้ไข">
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        // jQuery Validation
        if ($('#add_agent_form').length > 0) {
            $('#add_agent_form').validate({
                rules: {
                    agn_company_name: {
                        required: true
                    },
                    agn_tax: {
                        required: true,
                    },
                    agn_address: {
                        required: true
                    },
                    agn_firstname: {
                        required: true
                    },
                    agn_lastname: {
                        required: true
                    },
                    agn_tel: {
                        required: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    agn_email: {
                        required: true,
                        email: true
                    }

                },
                messages: {
                    agn_company_name: {
                        required: 'กรุณากรอกชื่อบริษัท'
                    },
                    agn_tax: {
                        required: 'กรุณากรอกหมายเลขผู้เสียภาษี',
                    },
                    agn_address: {
                        required: 'กรุณากรอกที่อยู่'
                    },
                    agn_firstname: {
                        required: 'กรุณากรอกชื่อจริง'
                    },
                    agn_lastname: {
                        required: 'กรุณากรอกนามสกุล'
                    },
                    agn_tel: {
                        required: 'กรุณากรอกเบอร์โทรศัพท์',
                        minlength: 'กรุณากรอกตัวเลขจำนวน 10 ตัวอักษร',
                        maxlength: 'กรุณากรอกตัวเลขจำนวน 10 ตัวอักษร'
                    },
                    agn_email: {
                        required: 'กรุณากรอกอีเมล',
                        email: 'กรุณากรอกอีเมลให้ถูกต้อง'
                    }
                }
            })
        }
    });
</script>
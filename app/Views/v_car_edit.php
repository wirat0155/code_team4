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
                ข้อมูลรถ
            </h2>
        </div>
    </div>


    <div class="container-sm mb-8">
        
        <form action="<?php echo base_url(). '/public/Customer_input/customer_insert' ?>" method="post">
            
            <!-- เพิ่มลูกค้า -->
            <div class="container-sm px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                <h4 class="px-3 my-4 text-xl font-semibold">
                    ลูกค้า
                </h4>

                <div class="mb-4 container border-bottom"></div>

                <div class="container">
                    <!-- บริษัท -->
                    <div class="px-3 form-group row">
                        <label for="input_company" class="col-sm-3 col-form-label">บริษัท</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="input_company" name="input_company" placeholder="บริษัท" required>
                        </div>
                    </div>

                    <!-- สาขา -->
                    <div class="px-3 form-group row">
                        <label for="input_branch" class="col-sm-3 col-form-label">สาขา</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="input_branch" name="input_branch" placeholder="สาขา">
                        </div>
                    </div>

                    <!-- ที่ตั้งบริษัท -->
                    <div class="px-3 form-group row">
                        <label for="input_address" class="col-sm-3 col-form-label">ที่ตั้งบริษัท</label>
                        <div class="col-sm-9">
                            <textarea class="form-control form-input" id="input_address" name="input_address" placeholder="ที่ตั้งบริษัท" rows="3" required></textarea>
                        </div>
                    </div>

                    <!-- หมายเลขผู้เสียภาษี -->
                    <div class="px-3 form-group row">
                        <label for="input_tax" class="col-sm-3 col-form-label">หมายเลขผู้เสียภาษี</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="input_tax" name="input_tax" placeholder="หมายเลขผู้เสียภาษี" maxlength="13" pattern="[0-9]{13}" required>
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
                        <label for="input_fname" class="col-sm-3 col-form-label">ชื่อจริง</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="input_fname" name="input_fname" placeholder="ชื่อจริง" required>
                        </div>
                    </div>

                    <!-- นามสกุล -->
                    <div class="px-3 form-group row">
                        <label for="input_lname" class="col-sm-3 col-form-label">นามสกุล</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-input" id="input_lname" name="input_lname" placeholder="นามสกุล" required>
                        </div>
                    </div>

                    <!-- เบอร์ติดต่อ -->
                    <div class="px-3 form-group row">
                        <label for="input_tel" class="col-sm-3 col-form-label">เบอร์ติดต่อ</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control form-input" id="input_tel" name="input_tel" placeholder="1234567890" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" maxlength="10" required>
                        </div>
                    </div>

                    <!-- อีเมล -->
                    <div class="px-3 form-group row">
                        <label for="input_email" class="col-sm-3 col-form-label">อีเมล</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control form-input" id="input_email" name="input_email" placeholder="อีเมล" required>
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
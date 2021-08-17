    <style>
        @media (min-width: 1200px) {
            .container-sm {
                max-width: 900px;
            }
        }
    </style>

    <div class="container px-6 mx-auto grid">
        <input type='hidden' name='agn_id' value="<?php echo $arr_agent[0]->agn_id ?>">
        <!-- หัวข้อ -->
        <div class="flex items-center justify-between p-3 pl-4 my-8 text-sm font-semibold bg-dark text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
            <div class="items-center container">
                <h2 class=" text-2xl font-semibold float-left">
                    ข้อมูลเอเย่นต์
                </h2>
                <div class="float-right">
                    <a href="<?php echo base_url() . '/public/Agent_edit/agent_edit/' . $arr_agent[0]->agn_id ?>" class="btn btn-warning px-2 mr-1 text-sm">แก้ไขเอเย่นต์</a>
                    <button type="button" class="btn btn-danger px-2 text-sm" data-toggle="modal" data-target="#exampleModalCenter" onclick="get_id(<?php echo $arr_agent[0]->agn_id ?>)">ลบข้อมูล
                    </button>
                </div>
            </div>
        </div>

        <div class="container-sm mb-8 ">

            <form id="add_agent_form" action="<?php echo base_url() . '/public/Agent_edit/agent_update' ?>" method="post">
                <input type='hidden' name='agn_id' value="<?php echo $arr_agent[0]->agn_id ?>">
                <div class="container-sm px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                    <h4 class="px-3 my-4 text-xl font-semibold">
                        เอเย่นต์
                    </h4>

                    <div class="mb-4 container border-bottom"></div>
                    <div class="container px-10 mb-auto">
                        <!-- บริษัท -->
                        <div class="px-3 form-group row">
                            <label for="cus_company_name" class="col-sm-3 col-form-label font-weight-bold">บริษัท</label>
                            <div class="col-sm-9">
                                <p id="agn_company_name" name="agn_company_name"> <?php echo $arr_agent[0]->agn_company_name ?></p>
                                <p id="agn_address" name="agn_address"> <?php echo $arr_agent[0]->agn_address ?></p>
                            </div>
                        </div>
                        <br>

                        <!-- หมายเลขผู้เสียภาษี -->
                        <div class="px-3 form-group row">
                            <label for="cus_tax" class="col-sm-3 col-form-label font-weight-bold">หมายเลขผู้เสียภาษี</label>
                            <div class="col-sm-9">
                                <p id="agn_tax" name="agn_tax"><?php echo $arr_agent[0]->agn_tax ?></p>
                            </div>
                        </div>
                        <br>

                        <!-- ผู้รับผิดชอบ -->
                        <div class="px-3 mt-3 form-group row">
                            <label for="cus_tax" class="col-sm-3 col-form-label font-weight-bold">ผู้รับผิดชอบ</label>
                            <div class="col-sm-9">
                                <p><?php echo $arr_agent[0]->agn_firstname . " " . $arr_agent[0]->agn_lastname ?>
                                <p>
                            </div>
                        </div>
                        <br>

                        <!-- เบอร์ติดต่อ -->
                        <div class="px-3 form-group row">
                            <label for="cus_tel" class="col-sm-3 col-form-label font-weight-bold">ติดต่อ</label>
                            <div class="col-sm-9">
                                <p id="agn_tel" name="agn_tel" ><?php echo tel_format($arr_agent[0]->agn_tel) ?></p>
                                <p id="agn_email" name="agn_email"><?php echo $arr_agent[0]->agn_email ?></p>
                            </div>
                        </div>
                    </div>

            </form>
        </div>
    </div>

    <!-- Modal ยืนยันการลบ -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบเอเย่นต์</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url() . '/public/Agent_show/agent_delete' ?>" method="post">
                    <div class="modal-body float-center">
                        <!-- เก็บ Agent Id -->
                        <input name="agn_id" id="agn_id" type="hidden">
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
        function get_id(agn_id) {
            $('#agn_id').val(agn_id);
        }
    </script>
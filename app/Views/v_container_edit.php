<style>
label.error {
    float: left !important;
}

.fa-phone {
    -moz-transform: scaleX(-1);
    -o-transform: scaleX(-1);
    -webkit-transform: scaleX(-1);
    transform: scaleX(-1);
    filter: FlipH;
    -ms-filter: "FlipH";
}

.cl-blue {
    color: #1244B9 !important;
}

input.error, textarea.error {
    border: 1px solid red !important;
}

.ui.search.dropdown>input.search.error {
    border: 1px solid red !important;
}

small.error,
label.error {
    color: red !important;
    font-weight: bold;
}
</style>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-inner">
                <div class="pl-4 mt-4 page-header mb-0">
                    <h4 class="pl-3 page-title">EDIT CONTAINER</h4>
                </div>
                <hr width="95%" color="696969">
                <ul class="pl-2 mr-5 breadcrumbs d-flex align-items-left align-items-md-center" style="height: 30px;">
                    <li class="nav-home">
                        <a href="<?php echo base_url() . '/Dashboard/dashboard_show' ?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a class="cl-blue"
                            href="<?php echo base_url() . '/Container_show/container_show_ajax' ?>">Container
                            information</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a class="cl-blue"
                            href="<?php echo base_url() . '/Container_show/container_detail/' . $arr_container[0]->con_id ?>">Container
                            detail</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit container</a>
                    </li>

                </ul>
            </div>
            <form id="container_form" action="<?php echo base_url() . '/Container_edit/container_update' ?>"
                method="POST">
                <div class="row mx-5 mt-0">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Container Information</div>
                            </div>

                            <div class="card-body">
                                <div class="row px-5">
                                    <div class="col-md-6 col-lg-6">

                                        <!-- หมายเลขตู้ -->
                                        <div class="row mt-3">
                                            <input type="hidden" name="con_id"
                                                value="<?php echo $arr_container[0]->con_id ?>">
                                            <div class="col-12 col-sm-4">
                                                <label class="block text-sm mt-3">
                                                    <span class="text-gray-700 dark:text-gray-400"><b>Container
                                                            number</b></span>
                                                </label>
                                            </div>

                                            <div class="col-12 col-sm-8 div_con_number_input">
                                                <input type="hidden" name="con_old_number"
                                                    value="<?php echo $arr_container[0]->con_number ?>">
                                                <input class="form-control" name="con_number"
                                                    pattern="[A-Za-z]{4} [0-9]{5} 0" placeholder="ABCD 12345 0"
                                                    value="<?php echo $arr_container[0]->con_number ?>">
                                                <!-- <label id="con_number-error" class="error"
                                                    for="con_number"><?php echo $_SESSION['con_number_error'] ?></label> -->
                                            </div>
                                        </div>


                                        <!-- ประเภทตู้ -->
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-4">
                                                <label class="block text-sm mt-3">
                                                    <span class="text-gray-700 dark:text-gray-400"><b>Container
                                                            type</b>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-12 col-sm-8">
                                                <select class="form-control" name="con_cont_id">
                                                    <?php for ($i = 0; $i < count($arr_container_type); $i++) { ?>
                                                    <option value="<?php echo $arr_container_type[$i]->cont_id ?>"
                                                        <?php if ($arr_container[0]->con_cont_id == $arr_container_type[$i]->cont_id) echo "selected" ?>>
                                                        <?php echo $arr_container_type[$i]->cont_name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- สถานะตู้ -->
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-4">
                                                <label class="block text-sm mt-3">
                                                    <span class="text-gray-700 dark:text-gray-400"><b>Container
                                                            status</b></span>
                                                </label>
                                            </div>
                                            <div class="col-12 col-sm-8">
                                                <select class="form-control" name="con_stac_id">
                                                    <?php for ($i = 0; $i < count($arr_status_container); $i++) { ?>
                                                    <option value="<?php echo $arr_status_container[$i]->stac_id ?>"
                                                        <?php if ($arr_container[0]->con_stac_id == $arr_status_container[$i]->stac_id) echo "selected" ?>>
                                                        <?php echo $arr_status_container[$i]->stac_name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- น้ำหนักตู้สูงสุดที่รับได้ (ตัน) -->
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <label class="block text-sm mt-3">
                                                    <span class="text-gray-700 dark:text-gray-400"><b>Max weight (t)</b>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <input class="form-control" type="number" step="0.01"
                                                    name="con_max_weight"
                                                    value="<?php echo $arr_container[0]->con_max_weight ?>"
                                                    placeholder="10">
                                            </div>
                                        </div>

                                        <!-- น้ำหนักตู้เปล่า (ตัน) -->
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <label class="block text-sm mt-3">
                                                    <span class="text-gray-700 dark:text-gray-400"><b>Tare
                                                            weight
                                                            (t)</b></span>
                                                </label>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <input class="form-control" type="number" step="0.01"
                                                    name="con_tare_weight"
                                                    value="<?php echo $arr_container[0]->con_tare_weight ?>"
                                                    placeholder="10">
                                            </div>
                                        </div>

                                        <!-- น้ำหนักสินค้าสูงสุด (ตัน) -->
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <label class="block text-sm mt-3">
                                                    <span class="text-gray-700 dark:text-gray-400"><b>Max weight
                                                            (t)</b></span>
                                                </label>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <input class="form-control" type="number" step="0.01"
                                                    name="con_net_weight"
                                                    value="<?php echo $arr_container[0]->con_net_weight ?>"
                                                    placeholder="10">
                                            </div>
                                        </div>

                                        <!-- ปริมาตรสุทธิ (คิวบิกเมตร) -->
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <label class="block text-sm mt-3">
                                                    <span class="text-gray-700 dark:text-gray-400"><b>Cube </b>
                                                        (CBM)</span>
                                                </label>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <input class="form-control" type="number" step="0.01" name="con_cube"
                                                    value="<?php echo $arr_container[0]->con_cube ?>"
                                                    placeholder="10">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end container form left -->


                                    <!-- container form right -->
                                    <div class="col-12 col-md-6">
                                        <!-- ขนาดตู้ -->
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-4">
                                                <label class="block text-sm mt-3">
                                                    <span class="text-gray-700 dark:text-gray-400"><b>Container
                                                            size</b></span>
                                                </label>
                                            </div>
                                            <div class="col-12 col-sm-8">
                                                <select class="form-control" name="con_size_id"
                                                    oninput="get_size_information()">
                                                    <?php for ($i = 0; $i < count($arr_size); $i++) { ?>
                                                    <option value="<?php echo $arr_size[$i]->size_id ?>"
                                                        <?php if ($arr_container[0]->con_size_id == $arr_size[$i]->size_id) echo "selected" ?>>
                                                        <?php echo $arr_size[$i]->size_name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- ความสูงด้านนอก (เมตร) -->
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <label class="block text-sm mt-3">
                                                    <span class="text-gray-700 dark:text-gray-400">
                                                        <b>Height (m)</b></span>
                                                </label>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <input class="form-control" type="number" step="0.01"
                                                    name="size_height_out"
                                                    value="<?php echo $arr_con_size[0]->size_height_out ?>" readonly>
                                            </div>
                                        </div>

                                        <!-- ความกว้างด้านนอก (เมตร) -->
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <label class="block text-sm mt-3">
                                                    <span class="text-gray-700 dark:text-gray-400"><b>Width
                                                            (m)</b></span>
                                                </label>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <input class="form-control" type="number" step="0.01"
                                                    name="size_width_out"
                                                    value="<?php echo $arr_con_size[0]->size_width_out ?>" readonly>
                                            </div>
                                        </div>

                                        <!-- ความยาวด้านนอก (เมตร) -->
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <label class="block text-sm mt-3">
                                                    <span class="text-gray-700 dark:text-gray-400"><b>Length
                                                            (m)</b></span>
                                                </label>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <input class="form-control" type="number" step="0.01"
                                                    name="size_length_out"
                                                    value="<?php echo $arr_con_size[0]->size_length_out ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end container form right -->
                                </div>
                                <!-- end container form row -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end container form -->
                <div class="row mx-5 mt-0" id="agent_section">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Agent information</div>
                                </div>

                                <div class="card-body">
                                    <?php
                                    $page = 'container_edit';
                                    require_once dirname(__FILE__) . '/form/agent_edit_form.php';
                                    ?>
                                </div>
                        </div>
                        <div class="card-action" id="car_action">
                            <input type="button" class="ui button" value="Cancle" onclick="window.history.back();">
                            <button type="submit" class="ui orange button pull-right">
                                Confirm
                            </button>
                        </div>

                    </div>
                </div>
            </form>


            <script>
            $(document).ready(function() {
                // jQuery Validation
                if ($('#update_container_form').length > 0) {
                    $('#update_container_form').validate({
                        rules: {
                            con_number: {
                                required: true,
                                maxlength: 12
                            },
                            con_max_weight: {
                                required: true,
                                min: 0,
                                max: 40
                            },
                            con_tare_weight: {
                                required: true,
                                min: 0,
                                max: 40
                            },
                            con_net_weight: {
                                required: true,
                                min: 0,
                                max: 40
                            },
                            con_cube: {
                                required: true,
                                min: 0,
                                max: 100
                            },
                            agn_company_name: {
                                required: true,
                                maxlength: 255
                            },
                            agn_address: {
                                required: true,
                                maxlength: 255
                            },
                            agn_tax: {
                                required: true,
                                maxlength: 15
                            },
                            agn_firstname: {
                                required: true
                            },
                            agn_lastname: {
                                required: true
                            },
                            agn_tel: {
                                required: true,
                                maxlength: 10
                            },
                            agn_email: {
                                required: true,
                                maxlength: 40,
                                email: true
                            }
                        },
                        messages: {
                            con_number: {
                                required: 'กรุณากรอกหมายเลขตู้',
                                maxlength: 'กรุณากรอกตามฟอร์แมต'
                            },
                            con_max_weight: {
                                required: 'กรุณากรอกน้ำหนักสูงสุด',
                                min: 'กรุณากรอกอย่างน้อย 0',
                                max: 'กรุณากรอกไม่เกิน 40'
                            },
                            con_tare_weight: {
                                required: 'กรุณากรอกน้ำหนักตู้เปล่า',
                                min: 'กรุณากรอกอย่างน้อย 0',
                                max: 'กรุณากรอกไม่เกิน 40'
                            },
                            con_net_weight: {
                                required: 'กรุณากรอกน้ำหนักสินค้าสูงสุด',
                                min: 'กรุณากรอกอย่างน้อย 0',
                                max: 'กรุณากรอกไม่เกิน 40'
                            },
                            con_cube: {
                                required: 'กรุณากรอกหมายเลขตู้',
                                min: 'กรุณากรอกอย่างน้อย 0',
                                max: 'กรุณากรอกไม่เกิน 100'
                            },
                            agn_company_name: {
                                required: 'กรุณากรอกชื่อบริษัท',
                                maxlength: 255
                            },
                            agn_address: {
                                required: 'กรุณากรอกที่ตั้งบริษัท',
                                maxlength: 255
                            },
                            agn_tax: {
                                required: 'กรุณากรอกหมายเลขผู้เสียภาษี',
                                maxlength: 15
                            },
                            agn_firstname: {
                                required: 'กรุณากรอกชื่อจริงผู้รับผิดชอบ'
                            },
                            agn_lastname: {
                                required: 'กรุณากรอกนามสกุลผู้รับผิดชอบ'
                            },
                            agn_tel: {
                                required: 'กรุณากรอกเบอร์ติดต่อ',
                                maxlength: 'กรุณากรอกไม่เกิน 10 อักษร',
                            },
                            agn_email: {
                                required: 'กรุณากรอกอีเมล',
                                maxlength: 'กรุณากรอกไม่เกิน 40 ตัวอักษร',
                                email: 'กรุณากรอกอีเมล'
                            }
                        }
                    })
                }
            });

            <!--
            /*
            * get_size_information
            * get size information when select size option
            * @input con_size_id
            * @output get size information when select size option
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function get_size_information() {
                let size_id = $('select[name="con_size_id"]').val();
                $.ajax({
                    url: '<?php echo base_url() . '/Size_show/get_size_ajax' ?>',
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        size_id: size_id
                    },
                    success: function(data) {
                        show_size_information(data[0]['size_height_out'], data[0]['size_width_out'],
                            data[0]
                            ['size_length_out']);
                    }
                });
            }

            <!--
            /*
            * show_size_information
            * show size information when select size option
            * @input size_height_out, size_width_out, size_length_out
            * @output get show information when select size option
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function show_size_information(size_height_out, size_width_out, size_length_out) {
                console.log(size_height_out);
                $('input[name="size_height_out"]').val(size_height_out);
                $('input[name="size_width_out"]').val(size_width_out);
                $('input[name="size_length_out"]').val(size_length_out);
            }

            <!--
            /*
            * get_agent_information
            * get agent information when select agent option
            * @input agn_id
            * @output get agent information when select agent option
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function get_agent_information() {
                // $('#agent_section label.error').remove();
                // remove_form_attr('readonly', '#agent_section');
                let agn_id = $('#agent_section input[name="agn_id"]').val();
                console.log(agn_id);

                if (agn_id != '' && agn_id != 'new') {
                    $('input[name="agn_company_name"]').prop('hidden', true);
                    $.ajax({
                        url: '<?php echo base_url() . '/Agent_show/get_agent_ajax' ?>',
                        method: 'POST',
                        dataType: 'JSON',
                        data: {
                            agn_id: agn_id
                        },
                        success: function(data) {
                            show_agent_information(data);
                            valid_agent_error();
                        }
                    });
                }
                if (agn_id == "new") {
                    $('input[name="agn_company_name"]').prop('hidden', false);
                    clear_agent_information();
                    valid_agent_error();
                }
            }

            <!--
            /*
            * valid_agent_error
            * valid agent form input and select
            * @input -
            * @output valid agent form input and select
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function valid_agent_error() {
                $('#agent_section input.error').removeClass('error');
                $('#agent_section textarea.error').removeClass('error');
            }

            <!--
            /*
            * show_agent_information
            * show agnet information in agent section form
            * @input agent information
            * @output show agnet information in agent section form
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function show_agent_information(agent) {
                $('textarea[name="agn_address"]').val(agent[0]['agn_address']);
                $('input[name="agn_tax"]').val(agent[0]['agn_tax']);
                $('input[name="agn_firstname"]').val(agent[0]['agn_firstname']);
                $('input[name="agn_lastname"]').val(agent[0]['agn_lastname']);
                $('input[name="agn_tel"]').val(agent[0]['agn_tel']);
                $('input[name="agn_email"]').val(agent[0]['agn_email']);
            }

            <!--
            /*
            * clear_agent_information
            * clear input in agent section form
            * @input -
            * @output clear input in agent section form
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function clear_agent_information() {
                $('input[name="agn_company_name"]').val('');
                $('textarea[name="agn_address"]').val('');
                $('input[name="agn_tax"]').val('');
                $('input[name="agn_firstname"]').val('');
                $('input[name="agn_lastname"]').val('');
                $('input[name="agn_tel"]').val('');
                $('input[name="agn_email"]').val('');
            }

            <!--
            /*
            * remove_error
            * remove error class in form
            * @input tag, name
            * @output remove error class in form
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function remove_error(tag, name) {
                $(tag + '[name="' + name + '"]').removeClass('error');
                $(tag + '[name="' + name + '"]+label').html('');
            }

            <!--
            /*
            * remove_form_attr
            * remove readonly in input when select dropdown
            * @input attr, target
            * @output remove readonly in input when select dropdown
            * @author
            * @Create Date
            * @Update Date
            */
            -->
            function remove_form_attr(attr, target) {
                $(target + ' *[readonly]').removeAttr(attr);
            }
            </script>

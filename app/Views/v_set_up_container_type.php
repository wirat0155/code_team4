<style>
    .cl-blue {
        color: #1244B9 !important;
    }
</style>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="pl-4 mt-4 page-header mb-0">
                <h4 class="pl-3 page-title">Container type</h4>
            </div>
            <hr width="95%" color="696969">
            <ul class="pl-2 breadcrumbs">
                <li class="nav-home">
                    <a href="<?php echo base_url() . '/Dashboard/dashboard_show'?>">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a class="cl-blue" href="<?php echo base_url() . '/Set_up/set_up_show'?>">Set up</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Container type</a>
                </li>
            </ul>

            <div class="row mt-5">
                <div class="col-md-3">
                    <div class="card full-height">
                        <div class="card-header">
                            <div class="card-title">JUMP TO</div>
                        </div>
                        <div class="card-body">
                            <!-- menu -->
                            <ul class="menu-ul">
                                <li class="menu-li pb-1">
                                    <a class="<?php if ($_SESSION['menu_set_up'] == 'container_type') echo 'active' ?>" href="<?php echo base_url() . '/Set_up_container_type/container_type_show'?>">Container type</a>
                                </li>
                                <li class="menu-li pb-1">
                                    <a class="<?php if ($_SESSION['menu_set_up'] == 'container_status') echo 'active' ?>" href="<?php echo base_url() . '/Set_up_container_type/container_type_show'?>">Container status</a>
                                </li>
                                <li class="menu-li pb-1">
                                    <a class="<?php if ($_SESSION['menu_set_up'] == 'container_size') echo 'active' ?>" href="<?php echo base_url() . '/Set_up_container_type/container_type_show'?>">Container size</a>
                                </li>
                                <li class="menu-li pb-1">
                                    <a class="<?php if ($_SESSION['menu_set_up'] == 'car_type') echo 'active' ?>" href="<?php echo base_url() . '/Set_up_container_type/container_type_show'?>">Car type</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Set up container type</div>
                        </div>
                        <div class="card-body">
                            Container type set up such as, new type, upload image and switch on-off type

                            <div class="col-6 mt-4" style="cursor: pointer;" id="btn_add" onclick="show_input();">
                                <i class="icon-setup fas fa-plus"></i>
                                <div class="font-setup">Add new type</div>
                            </div>

                            <form id="add_container_type_form" action="<?php echo base_url() . '/Set_up_container_type/container_type_insert'?>" enctype="multipart/form-data" method="POST">
                                <div class="row my-4" id="input_add">
                                    <div class="col-md-7 mb-3">
                                        <!-- New type -->
                                        <input type="text" id="cont_name" name="cont_name" class="form-control" placeholder="Container type name">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="input-group">
                                            <!-- Img container type -->
                                            <input type="text" id="input_show_browse" class="form-control" placeholder="...." aria-label="Recipient's username" aria-describedby="basic-addon2" disabled style="background: white !important;">
                                            <div class="input-group-append" style="cursor: pointer;" onclick="$('#cont_image').click();">
                                                <span class="input-group-text" id="show_browse">Browse</span>
                                            </div>
                                        </div>
                                        <input type="file" class="form-control-file input-full" id="cont_image" name="cont_image" onchange="get_image();" accept="image/jpg,image/jpeg,image/png" hidden>
                                    </div>

                                    <!-- Add container type -->
                                    <button type="submit" class="ui positive button pull-right">Add</button>
                                </div>
                            </form>

                            <table class="table mt-3">
                                <tbody>
                                    <?php for ($i = 0; $i < count($arr_container_type); $i++) { ?>
                                    <tr>
                                        <div <?php echo 'cont_id' . $arr_container_type[$i]->cont_id ?>>
                                            <!-- ลบ -->
                                            <td></td>

                                            <!-- รูปภาพ -->
                                            <td>
                                                <div class="avatar avatar-lg">
                                                    <img class="avatar-img" src="<?php echo base_url() . '/container_type_image/' .$arr_container_type[$i]->cont_image ?>" alt="" loading="lazy">
                                                </div>
                                            </td>

                                            <!-- ชื่อประเภทตู้ -->
                                            <td class="cont_name <?php echo $arr_container_type[$i]->cont_id ?>"><?php echo $arr_container_type[$i]->cont_name ?></td>

                                            <!-- Switch -->
                                            <td>
                                                <label class="switch">
                                                    <input id="cont_id<?php echo $arr_container_type[$i]->cont_id ?>" type="checkbox" onclick="check_status_container_type(<?php echo $arr_container_type[$i]->cont_id ?>)" <?php if($arr_container_type[$i]->cont_status == 2)echo " checked" ?>>
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                        </div>
                                    </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        // jQuery Validation
        if ($('#add_container_type_form').length > 0) {
            $('#add_container_type_form').validate({
                rules: {
                    cont_name: {
                        required: true
                    }
                },
                messages: {
                    cont_name: {
                        required: 'Please enter a container type name'
                    }
                }
            })
        }
    });

    // check สถานะของประเภทตู้
    $('#input_add').hide();

    function check_status_container_type(cont_id) {
        if ($('#cont_id' + cont_id).prop('checked')) {
            container_type_delete(cont_id);
        } else {
            container_type_restore(cont_id);
        }
    }
    // ลบประเภทตู้
    function container_type_delete(cont_id) {
        console.log('container_type_delete', cont_id);
        $.ajax({
            url: 'container_type_delete',
            method: 'POST',
            dataType: 'JSON',
            data: {
                cont_id: cont_id
            }
        });
    }
    // เปลี่ยสถานะตู้จาก off เป็น on
    function container_type_restore(cont_id) {
        console.log('container_type_restore', cont_id);
        $.ajax({
            url: 'container_type_restore',
            method: 'POST',
            dataType: 'JSON',
            data: {
                cont_id: cont_id
            }
        });
    }

    function get_image() {
        var cont_image = $('#cont_image').val();
        $('#input_show_browse').val(cont_image.substr(12));
        $('#cont_image-error').remove();
    }

    function show_input() {
        $('#input_add').show();
        $('#btn_add').hide();
    }
    </script>
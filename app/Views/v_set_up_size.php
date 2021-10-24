<style>
.cl-blue {
    color: #1244B9 !important;
}
</style>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="pl-4 mt-4 page-header mb-0">
                <h4 class="pl-3 page-title">Container Size</h4>
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
                    <a href="#">Container size</a>
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
                            <?php require_once "set_up_jump_to.php";?>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Set up container size</div>
                        </div>
                        <div class="card-body">
                            Container size set up such as, new size, width, length, height, upload image and switch on-off

                            <div class="col-6 mt-4" style="cursor: pointer;" id="btn_add" onclick="show_input();">
                                <i class="icon-setup fas fa-plus"></i>
                                <div class="font-setup">Add new size</div>
                            </div>

                            <form id="add_size_form" action="<?php echo base_url() . '/Set_up_size/size_insert'?>" enctype="multipart/form-data" method="POST">
                                <div class="row my-4" id="input_add">
                                    <div class="col-md-6 mb-3">
                                        <div class="input-group">
                                            <!-- New size -->
                                            <input type="text" id="size_name" name="size_name" class="form-control" placeholder="New size">
                                            <div class="input-group-append">
                                                <span class="input-group-text">Feet</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <!-- Width in -->
                                        <input type="number" id="size_width_in" name="size_width_in" class="form-control" placeholder="Width in">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <!-- Width out -->
                                        <input type="number" id="size_width_out" name="size_width_out" class="form-control" placeholder="Width out">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <!-- Length in -->
                                        <input type="number" id="size_length_in" name="size_length_in" class="form-control" placeholder="Length in">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <!-- Length out -->
                                        <input type="number" id="size_length_out" name="size_length_out" class="form-control" placeholder="Length out">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <!-- Height in -->
                                        <input type="number" id="size_height_in" name="size_height_in" class="form-control" placeholder="Height in">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <!-- Height out -->
                                        <input type="number" id="size_height_out" name="size_height_out" class="form-control" placeholder="Height out">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <!-- Img size -->
                                            <input type="text" id="input_show_browse" class="form-control" placeholder="Upload image" aria-label="Recipient's username" aria-describedby="basic-addon2" disabled style="background: white !important;">
                                            <div class="input-group-append" style="cursor: pointer;" onclick="$('#size_image').click();">
                                                <span class="input-group-text" id="show_browse">Browse</span>
                                            </div>
                                        </div>
                                        <input type="file" class="form-control-file input-full" id="size_image" name="size_image" onchange="get_image();" accept="image/jpg,image/jpeg,image/png" hidden>
                                    </div>

                                    <!-- Add size -->
                                    <button type="submit" class="ui positive button pull-right">Add</button>
                                </div>
                            </form>

                            <table class="table mt-3">
                                <thead>
                                    <tr style="text-center">
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>Width in, out</th>
                                        <th>Length in, out</th>
                                        <th>Height in, out</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($arr_size); $i++) { ?>
                                    <tr>
                                        <div <?php echo 'size_id' . $arr_size[$i]->size_id ?>>
                                            <!-- ลบ -->
                                            <td></td>

                                            <!-- รูปภาพ -->
                                            <td>
                                                <div class="avatar avatar-lg">
                                                    <img class="avatar-img" src="<?php echo base_url() . '/size_image/' .$arr_size[$i]->size_image ?>" alt="" loading="lazy">
                                                </div>
                                            </td>

                                            <!-- ชื่อขนาดตู้ -->
                                            <td class="size_name <?php echo $arr_size[$i]->size_id ?>"><?php echo $arr_size[$i]->size_name ?></td>

                                            <!-- Width in, out -->
                                            <td><?php echo $arr_size[$i]->size_width_in . ', ' . $arr_size[$i]->size_width_out ?></td>

                                            <!-- Length in, out -->
                                            <td><?php echo $arr_size[$i]->size_length_in . ', ' . $arr_size[$i]->size_length_out ?></td>

                                            <!-- Height in, out -->
                                            <td><?php echo $arr_size[$i]->size_height_in . ', ' . $arr_size[$i]->size_height_out ?></td>

                                            <!-- Switch -->
                                            <td>
                                                <label class="switch">
                                                    <input id="size_id<?php echo $arr_size[$i]->size_id ?>" type="checkbox" onclick="check_status_size(<?php echo $arr_size[$i]->size_id ?>)" <?php if($arr_size[$i]->size_status == 2)echo " checked" ?>>
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
        if ($('#add_size_form').length > 0) {
            $('#add_size_form').validate({
                rules: {
                    size_name: {
                        required: true
                    }
                },
                messages: {
                    size_name: {
                        required: 'Please enter a size name'
                    }
                }
            })
        }
    });

    // check สถานะของขนาดตู้
    $('#input_add').hide();

    function check_status_size(size_id) {
        if ($('#size_id' + size_id).prop('checked')) {
            size_delete(size_id);
        } else {
            size_restore(size_id);
        }
    }
    // ลบขนาดตู้
    function size_delete(size_id) {
        console.log('size_delete', size_id);
        $.ajax({
            url: 'size_delete',
            method: 'POST',
            dataType: 'JSON',
            data: {
                size_id: size_id
            }
        });
    }
    // เปลี่ยสถานะตู้จาก off เป็น on
    function size_restore(size_id) {
        console.log('size_restore', size_id);
        $.ajax({
            url: 'size_restore',
            method: 'POST',
            dataType: 'JSON',
            data: {
                size_id: size_id
            }
        });
    }

    function get_image() {
        var size_image = $('#size_image').val();
        $('#input_show_browse').val(size_image.substr(12));
        $('#size_image-error').remove();
    }

    function show_input() {
        $('#input_add').show();
        $('#btn_add').hide();
    }
    </script>
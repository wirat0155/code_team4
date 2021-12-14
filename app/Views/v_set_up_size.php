<!--
* v_set_up_size
* Display size list page
* @input    array of size
* @output   size list page
* @author   Tadsawan
* @Create Date  2564-10-22
*/
-->

<style>
.cl-blue {
    color: #1244B9 !important;
}

.input_edit {
    width: 100%;
    height: calc(2.25rem + 2px);
    margin: 0.2em 0 0 0;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
}

.btn_cancel {
    cursor: pointer;
    display: inline-block;
    border: none;
    background: #e0e1e2 none;
    color: rgba(0, 0, 0, .6);
    font-family: Lato, 'Helvetica Neue', Arial, Helvetica, sans-serif;

    margin: 0.2em 0 0 0;
    padding: 0.4em 0.5em 0.4em;
    text-transform: none;
    text-shadow: none;
    font-weight: 700;
    line-height: 1em;
    font-style: normal;
    text-align: center;
    text-decoration: none;
    border-radius: 0.28571429rem;
}

.btn_confirm {
    cursor: pointer;
    display: inline-block;
    border: none;
    background-color: #f2711c;
    color: #fff;
    background-image: none;
    font-family: Lato, 'Helvetica Neue', Arial, Helvetica, sans-serif;

    padding: 0.4em 0.5em 0.4em;
    text-transform: none;
    text-shadow: none;
    font-weight: 700;
    line-height: 1em;
    font-style: normal;
    text-align: center;
    text-decoration: none;
    border-radius: 0.28571429rem;
}
</style>

<div class="ui modal">
    <i class="close icon"></i>
    <div class="header">
        Remove Container size ?
    </div>
    <div class="content">
        <form action="<?php echo base_url() . '/Set_up_size/delete' ?>" method="post">
            <input type="hidden" id="size_id" name="size_id">

            <p style="font-size: 1rem">Are you sure to remove the container size</p>

            <div class="ui info message">
                <div class="header">
                    What happening after remove the container size
                </div>
                <ul class="list">
                    <li>The container size still remain in database,</li>
                    <li>But you cannot see the container size anymore</li>
                </ul>
            </div>
    </div>
    <div class="actions">
        <button type="button" class="ui test button">
            No, keep it
        </button>
        <button type="submit" class="ui negative right labeled icon button">
            Yes, remove it
            <i class="minus circle icon"></i>
        </button>
        </form>
    </div>
</div>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="pl-4 mt-4 page-header mb-0">
                <h4 class="pl-3 page-title">CONTAINER SIZE</h4>
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
                            <div class="card-title">
                                <!-- Search -->
                                <div class="input-group">
                                    Set up container size
                                    <i class="fas fa-search" style="font-size: 110%; margin: 5px 10px 0px 10px;"></i>
                                    <input type="text" id="search" class="form-control form-control-sm col-md-4" placeholder="Search">
                                </div>
                            </div>
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

                            <div class="table-responsive">
                                <table class="table mt-3" id="table">
                                    <thead>
                                        <tr style="text-center">
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>Width in, out</th>
                                            <th>Length in, out</th>
                                            <th>Height in, out</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < count($arr_size); $i++) { ?>
                                        <tr class="size_name<?php echo $arr_size[$i]->size_id ?>">
                                            <div <?php echo 'size_id' . $arr_size[$i]->size_id ?>>
                                                <!-- delete button -->
                                                <td>
                                                    <div id="btn_delete<?php echo $arr_size[$i]->size_id ?>" class="item test button" onclick="get_id(<?php echo $arr_size[$i]->size_id?>)" <?php if($arr_size[$i]->size_status == 1) echo "hidden" ?>>
                                                        <i class='fas fa-times-circle' style="font-size: 130%; color:#FF0000; cursor:pointer;"></i>
                                                    </div>
                                                    <script>
                                                    $('.ui.modal').modal('attach events', '.test.button', 'toggle');
                                                    </script>
                                                </td>

                                                <!-- container size image -->
                                                <form action="<?php echo base_url() . '/Set_up_size/edit_size'?>" method="POST" enctype="multipart/form-data">
                                                    <td>
                                                        <div class="avatar avatar-lg">
                                                            <?php if ($arr_size[$i]->size_image != NULL && $arr_size[$i]->size_image != '') : ?>
                                                            <img class="avatar-img img_<?php echo $arr_size[$i]->size_id ?>" src="<?php echo base_url() . '/size_image/' . $arr_size[$i]->size_image ?>" alt="" loading="lazy">
                                                            <?php else : ?>
                                                            <img class="avatar-img img_<?php echo $arr_size[$i]->size_id ?>" src="<?php echo base_url() . '/size_image/container_size_placeholder.png' ?>" alt="" loading="lazy">
                                                            <?php endif; ?>
                                                            <br>

                                                            <input hidden type="file" name="size_image_<?php echo $arr_size[$i]->size_id?>" accept="image/*">
                                                        </div>
                                                    </td>

                                                    <!-- container size name -->
                                                    <td class="size_name <?php echo $arr_size[$i]->size_id ?>">
                                                        <span class="size_name_<?php echo $arr_size[$i]->size_id ?>"><?php echo $arr_size[$i]->size_name ?></span>

                                                        <input type="hidden" name="size_id" value="<?php echo $arr_size[$i]->size_id ?>">
                                                        <input hidden type="text" name="size_name" class="size_name_input_<?php echo $arr_size[$i]->size_id ?> input_edit" value="<?php echo $arr_size[$i]->size_name ?>" required>
                                                        <br />

                                                    </td>

                                                    <!-- width in, out -->
                                                    <td>
                                                        <span class="size_width_in_<?php echo $arr_size[$i]->size_id ?>"><?php echo $arr_size[$i]->size_width_in ?>,</span>
                                                        <span class="size_width_out_<?php echo $arr_size[$i]->size_id ?>"><?php echo $arr_size[$i]->size_width_out ?></span>

                                                        <input type="hidden" name="size_id" value="<?php echo $arr_size[$i]->size_id ?>">
                                                        <input hidden type="text" name="size_width_in" class="size_width_in_input_<?php echo $arr_size[$i]->size_id ?> input_edit" value="<?php echo $arr_size[$i]->size_width_in ?>" required>
                                                        <br />

                                                        <input type="hidden" name="size_id" value="<?php echo $arr_size[$i]->size_id ?>">
                                                        <input hidden type="text" name="size_width_out" class="size_width_out_input_<?php echo $arr_size[$i]->size_id ?> input_edit" value="<?php echo $arr_size[$i]->size_width_out ?>" required>
                                                        <br />
                                                    </td>

                                                    <!-- length in, out -->
                                                    <td>
                                                        <span class="size_length_in_<?php echo $arr_size[$i]->size_id ?>"><?php echo $arr_size[$i]->size_length_in ?>,</span>
                                                        <span class="size_length_out_<?php echo $arr_size[$i]->size_id ?>"><?php echo $arr_size[$i]->size_length_out ?></span>

                                                        <input type="hidden" name="size_id" value="<?php echo $arr_size[$i]->size_id ?>">
                                                        <input hidden type="text" name="size_length_in" class="size_length_in_input_<?php echo $arr_size[$i]->size_id ?> input_edit" value="<?php echo $arr_size[$i]->size_length_in ?>" required>
                                                        <br />

                                                        <input type="hidden" name="size_id" value="<?php echo $arr_size[$i]->size_id ?>">
                                                        <input hidden type="text" name="size_length_out" class="size_length_out_input_<?php echo $arr_size[$i]->size_id ?> input_edit" value="<?php echo $arr_size[$i]->size_length_out ?>" required>
                                                        <br />
                                                    </td>

                                                    <!-- height in, out -->
                                                    <td>
                                                        <span class="size_height_in_<?php echo $arr_size[$i]->size_id ?>"><?php echo $arr_size[$i]->size_height_in ?>,</span>
                                                        <span class="size_height_out_<?php echo $arr_size[$i]->size_id ?>"><?php echo $arr_size[$i]->size_height_out ?></span>

                                                        <input type="hidden" name="size_id" value="<?php echo $arr_size[$i]->size_id ?>">
                                                        <input hidden type="text" name="size_height_in" class="size_height_in_input_<?php echo $arr_size[$i]->size_id ?> input_edit" value="<?php echo $arr_size[$i]->size_height_in ?>" required>
                                                        <br />

                                                        <input type="hidden" name="size_id" value="<?php echo $arr_size[$i]->size_id ?>">
                                                        <input hidden type="text" name="size_height_out" class="size_height_out_input_<?php echo $arr_size[$i]->size_id ?> input_edit" value="<?php echo $arr_size[$i]->size_height_out ?>" required>
                                                        <br />
                                                    </td>

                                                    <td>
                                                        <button hidden type="submit" class="confirm_btn_<?php echo $arr_size[$i]->size_id ?> btn_confirm" onclick="edit_size(<?php echo $arr_size[$i]->size_id ?>)">Confirm</button>
                                                </form>
                                                <button hidden class="cancel_btn_<?php echo $arr_size[$i]->size_id ?> btn_cancel" onclick="cancel_edit(<?php echo $arr_size[$i]->size_id ?>)">Cancel</button>
                                                <i class="edit_btn_<?php echo $arr_size[$i]->size_id ?> far fa-edit" style="font-size: 130%; cursor:pointer;" onclick="open_edit_form(<?php echo $arr_size[$i]->size_id?>)"></i>
                                                </td>
                                                <!-- switch -->
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
                },
                size_width_in: {
                    required: true
                },
                size_width_out: {
                    required: true
                },
                size_length_in: {
                    required: true
                },
                size_length_out: {
                    required: true
                },
                size_height_in: {
                    required: true
                },
                size_height_out: {
                    required: true
                }
            },
            messages: {
                size_name: {
                    required: 'Please enter a size name'
                },
                size_width_in: {
                    required: 'Please enter a inside width'
                },
                size_width_out: {
                    required: 'Please enter a outside width'
                },
                size_length_in: {
                    required: 'Please enter a inside length'
                },
                size_length_out: {
                    required: 'Please enter a outside length'
                },
                size_height_in: {
                    required: 'Please enter a inside height'
                },
                size_height_out: {
                    required: 'Please enter a outside height'
                }
            }
        })
    }
});

var columns = $('.size_name');
var rows = $('tr');
$('#search').keyup(function() {
    rows.hide();
    for (var i = columns.length; i > 0; i--) {
        if ($('.size_name_' + i).text().toLowerCase().search($(this).val()) >= 0) {
            $('.size_name' + i).show();
        }
        console.log(' No.' + i + ' Text : ' + $('.size_name_' + i).text().toLowerCase() + ' Val : ' + $('.size_name_' + i).text().toLowerCase().search($(this).val()));
    }
});

// hide add size form
$('#input_add').hide();

/*
 * check_status_size
 * check status size
 * @input    size_id
 * @output   check status size
 * @author   Tadsawan
 * @Create Date  2564-10-22
 */
function check_status_size(size_id) {
    if ($('#size_id' + size_id).prop('checked')) {
        size_delete(size_id);
        $('#btn_delete' + size_id).prop("hidden", false);
    } else {
        size_restore(size_id);
        $('#btn_delete' + size_id).prop("hidden", true);
    }
}

/*
 * size_delete
 * delete size
 * @input    size_id
 * @output   delete size
 * @author   Tadsawan
 * @Create Date  2564-10-22
 */
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

/*
 * size_restore
 * restore size
 * @input    size_id
 * @output   restore size
 * @author   Tadsawan
 * @Create Date  2564-10-22
 */
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

/*
 * get_image
 * show image name
 * @input    -
 * @output   show image name
 * @author   Tadsawan
 * @Create Date  2564-10-22
 */
function get_image() {
    var size_image = $('#size_image').val();
    $('#input_show_browse').val(size_image.substr(12));
    $('#size_image-error').remove();
}

/*
 * show_input
 * show input to insert size
 * @input    -
 * @output   show input to insert size
 * @author   Tadsawan
 * @Create Date  2564-10-22
 */
function show_input() {
    $('#input_add').show();
    $('#btn_add').hide();
}

/*
 * get_id
 * get size_id in remove container size modal
 * @input    size_id
 * @output   get size_id in remove container size modal
 * @author   Tadsawan
 * @Create Date  2564-12-08
 */
function get_id(size_id) {
    $('#size_id').val(size_id);
}

/*
 * open_edit_form
 * open size edit form
 * @input    size_id
 * @output   open size edit form
 * @author   Tadsawan
 * @Create Date  2564-12-10
 */
function open_edit_form(size_id) {
    // alert(size_id);
    $('.size_name_' + size_id).prop('hidden', true);
    $('.size_width_in_' + size_id).prop('hidden', true);
    $('.size_width_out_' + size_id).prop('hidden', true);
    $('.size_length_in_' + size_id).prop('hidden', true);
    $('.size_length_out_' + size_id).prop('hidden', true);
    $('.size_height_in_' + size_id).prop('hidden', true);
    $('.size_height_out_' + size_id).prop('hidden', true);
    $('.edit_btn_' + size_id).prop('hidden', true);
    $('.size_name_input_' + size_id).prop('hidden', false);
    $('.size_width_in_input_' + size_id).prop('hidden', false);
    $('.size_width_out_input_' + size_id).prop('hidden', false);
    $('.size_length_in_input_' + size_id).prop('hidden', false);
    $('.size_length_out_input_' + size_id).prop('hidden', false);
    $('.size_height_in_input_' + size_id).prop('hidden', false);
    $('.size_height_out_input_' + size_id).prop('hidden', false);
    $('.confirm_btn_' + size_id).prop('hidden', false);
    $('.cancel_btn_' + size_id).prop('hidden', false);
    $('.img_' + size_id).attr('onclick', "$('input[name=size_image_" + size_id + "]').click()");
    $('.img_' + size_id).css("cursor", "pointer");
}

/*
 * cancel_edit
 * close size edit form
 * @input    size_id
 * @output   close size edit form
 * @author   Tadsawan
 * @Create Date  2564-12-10
 */

function cancel_edit(size_id) {
    // alert(size_id);
    $('.size_name_' + size_id).prop('hidden', false);
    $('.size_width_in_' + size_id).prop('hidden', false);
    $('.size_width_out_' + size_id).prop('hidden', false);
    $('.size_length_in_' + size_id).prop('hidden', false);
    $('.size_length_out_' + size_id).prop('hidden', false);
    $('.size_height_in_' + size_id).prop('hidden', false);
    $('.size_height_out_' + size_id).prop('hidden', false);
    $('.edit_btn_' + size_id).prop('hidden', false);
    $('.size_name_input_' + size_id).prop('hidden', true);
    $('.size_width_in_input_' + size_id).prop('hidden', true);
    $('.size_width_out_input_' + size_id).prop('hidden', true);
    $('.size_length_in_input_' + size_id).prop('hidden', true);
    $('.size_length_out_input_' + size_id).prop('hidden', true);
    $('.size_height_in_input_' + size_id).prop('hidden', true);
    $('.size_height_out_input_' + size_id).prop('hidden', true);
    $('.confirm_btn_' + size_id).prop('hidden', true);
    $('.cancel_btn_' + size_id).prop('hidden', true);
    $(".error_" + size_id).text("");
    $('.img_' + size_id).prop("onclick", null);
    $('.img_' + size_id).css("cursor", "none");
}
</script>
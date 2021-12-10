<!--
* v_set_up_container_type
* Display container type list page
* @input    array of container type
* @output   container type list page
* @author   Tadsawan
* @Create Date  2564-10-22
*/
-->

<style>
.cl-blue {
    color: #1244B9 !important;
}
</style>

<div class="ui modal">
    <i class="close icon"></i>
    <div class="header">
        Remove Container type ?
    </div>
    <div class="content">
        <form action="<?php echo base_url() . '/Set_up_container_type/delete' ?>" method="post">
            <input type="hidden" id="cont_id" name="cont_id">

            <p style="font-size: 1rem">Are you sure to remove the container type</p>

            <div class="ui info message">
                <div class="header">
                    What happening after remove the container type
                </div>
                <ul class="list">
                    <li>The container type still remain in database,</li>
                    <li>But you cannot see the container type anymore</li>
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
                <h4 class="pl-3 page-title">CONTAINER TYPE</h4>
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
                            <?php require_once "set_up_jump_to.php";?>
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
                                        <input type="text" id="cont_name" name="cont_name" class="form-control" placeholder="New type">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="input-group">
                                            <!-- Img container type -->
                                            <input type="text" id="input_show_browse" class="form-control" placeholder="Upload image" aria-label="Recipient's username" aria-describedby="basic-addon2" disabled style="background: white !important;">
                                            <div class="input-group-append" style="cursor: pointer;" onclick="$('#cont_image').click();">
                                                <span class="input-group-text" id="show_browse">Browse</span>
                                            </div>
                                        </div>
                                        <input type="file" class="form-control-file input-full" id="cont_image" name="cont_image" onchange="get_image();" accept="image/jpg,image/jpeg,image/png" hidden required>
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
                                            <!-- delete button -->
                                            <td>
                                                <div id="btn_delete<?php echo $arr_container_type[$i]->cont_id ?>" class="item test button" onclick="get_id(<?php echo $arr_container_type[$i]->cont_id?>)" <?php if($arr_container_type[$i]->cont_status == 1) echo "hidden" ?>>
                                                    <i class='fas fa-times-circle' style="font-size: 130%; color:#FF0000; cursor:pointer;"></i>
                                                </div>
                                                <script>
                                                $('.ui.modal').modal('attach events', '.test.button', 'toggle');
                                                </script>
                                            </td>

                                            <!-- container type image -->
                                            <form action="<?php echo base_url() . '/Set_up_container_type/edit_container_type'?>" method="POST" enctype="multipart/form-data">
                                            <td>
                                                <div class="avatar avatar-lg">
                                                        <?php if ($arr_container_type[$i]->cont_image != NULL && $arr_container_type[$i]->cont_image != '') : ?>
                                                        <img class="avatar-img" src="<?php echo base_url() . '/container_type_image/' . $arr_container_type[$i]->cont_image ?>" alt="" loading="lazy">
                                                        <?php else : ?>
                                                        <img class="avatar-img" src="<?php echo base_url() . '/container_type_image/container_placeholder.jpg' ?>" alt="" loading="lazy">
                                                        <?php endif; ?>
                                                        <br>
                                                        <input hidden type="file" name="cont_image_<?php echo $arr_container_type[$i]->cont_id?>" accept="image/*">
                                                    </div>
                                                </td>

                                                <!-- container type name -->
                                                <td class="cont_name <?php echo $arr_container_type[$i]->cont_id ?>">
                                                    <span class="cont_name_<?php echo $arr_container_type[$i]->cont_id ?>"><?php echo $arr_container_type[$i]->cont_name ?></span>
                                                    <input type="hidden" name="cont_id" value="<?php echo $arr_container_type[$i]->cont_id ?>">
                                                    <input hidden type="text" name="cont_name" class="cont_name_input_<?php echo $arr_container_type[$i]->cont_id ?>" value="<?php echo $arr_container_type[$i]->cont_name ?>" required>
                                                    <br/>
                                                </td>
                                                <td>
                                                    <button hidden type="submit" class="confirm_btn_<?php echo $arr_container_type[$i]->cont_id ?>" onclick="edit_container_type(<?php echo $arr_container_type[$i]->cont_id ?>)">Confirm</button>
                                                    </form>
                                                
                                                    <button hidden class="cancel_btn_<?php echo $arr_container_type[$i]->cont_id ?>" onclick="cancel_edit(<?php echo $arr_container_type[$i]->cont_id ?>)">Cancel</button>
                                                    <button class="edit_btn_<?php echo $arr_container_type[$i]->cont_id ?>" onclick="open_edit_form(<?php echo $arr_container_type[$i]->cont_id?>)">Edit</button>
                                                </td>
                                            <!-- switch -->
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

// hide add container type form
$('#input_add').hide();

/*
 * check_status_container_type
 * check status container type
 * @input    cont_id
 * @output   check status container type
 * @author   Tadsawan
 * @Create Date  2564-10-22
 */
function check_status_container_type(cont_id) {
    if ($('#cont_id' + cont_id).prop('checked')) {
        container_type_delete(cont_id);
        $('#btn_delete' + cont_id).prop("hidden", false);
    } else {
        container_type_restore(cont_id);
        $('#btn_delete' + cont_id).prop("hidden", true);
    }
}

/*
 * container_type_delete
 * delete container type
 * @input    cont_id
 * @output   delete container type
 * @author   Tadsawan
 * @Create Date  2564-10-22
 */
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

/*
 * container_type_restore
 * restore container type
 * @input    cont_id
 * @output   restore container type
 * @author   Tadsawan
 * @Create Date  2564-10-22
 */
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

/*
 * get_image
 * show image name
 * @input    -
 * @output   show image name
 * @author   Tadsawan
 * @Create Date  2564-10-22
 */
function get_image() {
    var cont_image = $('#cont_image').val();
    $('#input_show_browse').val(cont_image.substr(12));
    $('#cont_image-error').remove();
}

/*
 * show_input
 * show input to insert container type
 * @input    -
 * @output   show input to insert container type
 * @author   Tadsawan
 * @Create Date  2564-10-22
 */
function show_input() {
    $('#input_add').show();
    $('#btn_add').hide();
}

/*
 * get_id
 * get cont_id in remove container type modal
 * @input    cont_id
 * @output   get cont_id in remove container type modal
 * @author   Tadsawan
 * @Create Date  2564-12-08
 */
function get_id(cont_id) {
    $('#cont_id').val(cont_id);
}

/*
 * open_edit_form
 * open container type edit form
 * @input    cont_id
 * @output   open container type edit form
 * @author   Wirat
 * @Create Date  2564-12-10
 */
function open_edit_form(cont_id) {
    // alert(cont_id);
    $('input[name=cont_image_' + cont_id + ']').prop('hidden', false);
    $('.cont_name_'+ cont_id).prop('hidden', true);
    $('.edit_btn_'+ cont_id).prop('hidden', true);
    $('.cont_name_input_' + cont_id).prop('hidden', false);
    $('.confirm_btn_' + cont_id).prop('hidden', false);
    $('.cancel_btn_' + cont_id).prop('hidden', false);
}

/*
 * cancel_edit
 * close container type edit form
 * @input    cont_id
 * @output   close container type edit form
 * @author   Wirat
 * @Create Date  2564-12-10
 */

function cancel_edit(cont_id) {
    // alert(cont_id);
    $('input[name=cont_image_' + cont_id + ']').prop('hidden', true);
    $('.cont_name_'+ cont_id).prop('hidden', false);
    $('.edit_btn_'+ cont_id).prop('hidden', false);
    $('.cont_name_input_' + cont_id).prop('hidden', true);
    $('.confirm_btn_' + cont_id).prop('hidden', true);
    $('.cancel_btn_' + cont_id).prop('hidden', true);
    $(".error_" + cont_id).text("");
}
</script>
<!--
* v_set_up_car_type
* Display car type list page
* @input    array of car type
* @output   car type list page
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
        Remove Car type ?
    </div>
    <div class="content">
        <form action="<?php echo base_url() . '/Set_up_car_type/delete' ?>" method="post">
            <input type="hidden" id="cart_id" name="cart_id">

            <p style="font-size: 1rem">Are you sure to remove the car type</p>

            <div class="ui info message">
                <div class="header">
                    What happening after remove the car type
                </div>
                <ul class="list">
                    <li>The car type still remain in database,</li>
                    <li>But you cannot see the car type anymore</li>
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
                <h4 class="pl-3 page-title">CAR TYPE</h4>
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
                    <a href="#">Car type</a>
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
                            <div class="card-title">Set up car type</div>
                        </div>
                        <div class="card-body">
                            Car type set up such as, new type, upload image and switch on-off

                            <div class="col-6 mt-4" style="cursor: pointer;" id="btn_add" onclick="show_input();">
                                <i class="icon-setup fas fa-plus"></i>
                                <div class="font-setup">Add new type</div>
                            </div>

                            <form id="add_car_type_form" action="<?php echo base_url() . '/Set_up_car_type/car_type_insert'?>" enctype="multipart/form-data" method="POST">
                                <div class="row my-4" id="input_add">
                                    <div class="col-md-7 mb-3">
                                        <!-- New type -->
                                        <input type="text" id="cart_name" name="cart_name" class="form-control" placeholder="New type">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="input-group">
                                            <!-- Img car type -->
                                            <input type="text" id="input_show_browse" class="form-control" placeholder="Upload image" aria-label="Recipient's username" aria-describedby="basic-addon2" disabled style="background: white !important;">
                                            <div class="input-group-append" style="cursor: pointer;" onclick="$('#cart_image').click();">
                                                <span class="input-group-text" id="show_browse">Browse</span>
                                            </div>
                                        </div>
                                        <input type="file" class="form-control-file input-full" id="cart_image" name="cart_image" onchange="get_image();" accept="image/jpg,image/jpeg,image/png" hidden>
                                    </div>

                                    <!-- Add car type -->
                                    <button type="submit" class="ui positive button pull-right">Add</button>
                                </div>
                            </form>

                            <table class="table mt-3">
                                <tbody>
                                    <?php for ($i = 0; $i < count($arr_car_type); $i++) { ?>
                                    <tr>
                                        <div <?php echo 'cart_id' . $arr_car_type[$i]->cart_id ?>>
                                            <!-- delete button -->
                                            <td>
                                                <div id="btn_delete<?php echo $arr_car_type[$i]->cart_id ?>" class="item test button" onclick="get_id(<?php echo $arr_car_type[$i]->cart_id?>)" <?php if($arr_car_type[$i]->cart_status == 1) echo "hidden" ?>>
                                                    <i class='fas fa-times-circle' style="font-size: 130%; color:#FF0000; cursor:pointer;"></i>
                                                </div>
                                                <script>
                                                $('.ui.modal').modal('attach events', '.test.button', 'toggle');
                                                </script>
                                            </td>

                                            <!-- car type image -->
                                            <td>
                                                <div class="avatar avatar-lg">
                                                    <?php if ($arr_car_type[$i]->cart_image != NULL && $arr_car_type[$i]->cart_image != '') : ?>
                                                    <img class="avatar-img" src="<?php echo base_url() . '/car_type_image/' . $arr_car_type[$i]->cart_image ?>" alt="<?php echo $arr_car_type[$i]->cart_name ?>">
                                                    <?php else : ?>
                                                    <img class="avatar-img" src="<?php echo base_url() . '/car_type_image/truck_placeholder.png' ?>" alt="<?php echo $arr_car_type[$i]->cart_name ?>">
                                                    <?php endif; ?>
                                                </div>
                                            </td>

                                            <!-- car type name -->
                                            <td class="cart_name <?php echo $arr_car_type[$i]->cart_id ?>"><?php echo $arr_car_type[$i]->cart_name ?></td>

                                            <!-- switch -->
                                            <td>
                                                <label class="switch">
                                                    <input id="cart_id<?php echo $arr_car_type[$i]->cart_id ?>" type="checkbox" onclick="check_status_car_type(<?php echo $arr_car_type[$i]->cart_id ?>)" <?php if($arr_car_type[$i]->cart_status == 2)echo " checked" ?>>
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
    if ($('#add_car_type_form').length > 0) {
        $('#add_car_type_form').validate({
            rules: {
                cart_name: {
                    required: true
                }
            },
            messages: {
                cart_name: {
                    required: 'Please enter a car type name'
                }
            }
        })
    }
});

// hide add car type form
$('#input_add').hide();

/*
 * check_status_car_type
 * check status car type
 * @input    cart_id
 * @output   check status car type
 * @author   Tadsawan
 * @Create Date  2564-10-22
 */
function check_status_car_type(cart_id) {
    if ($('#cart_id' + cart_id).prop('checked')) {
        car_type_delete(cart_id);
        $('#btn_delete' + cart_id).prop("hidden", false);
    } else {
        car_type_restore(cart_id);
        $('#btn_delete' + cart_id).prop("hidden", true);
    }
}

/*
 * car_type_delete
 * delete car type
 * @input    cart_id
 * @output   delete car type
 * @author   Tadsawan
 * @Create Date  2564-10-22
 */
function car_type_delete(cart_id) {
    console.log('car_type_delete', cart_id);
    $.ajax({
        url: 'car_type_delete',
        method: 'POST',
        dataType: 'JSON',
        data: {
            cart_id: cart_id
        }
    });
}

/*
 * car_type_restore
 * restore car type
 * @input    cart_id
 * @output   restore car type
 * @author   Tadsawan
 * @Create Date  2564-10-22
 */
function car_type_restore(cart_id) {
    console.log('car_type_restore', cart_id);
    $.ajax({
        url: 'car_type_restore',
        method: 'POST',
        dataType: 'JSON',
        data: {
            cart_id: cart_id
        }
    });
}

/*
 * get_image
 * get image name
 * @input    -
 * @output   get image name
 * @author   Tadsawan
 * @Create Date  2564-10-22
 */
function get_image() {
    var cart_image = $('#cart_image').val();
    $('#input_show_browse').val(cart_image.substr(12));
    $('#cart_image-error').remove();
}

/*
 * show_input
 * show input to insert car type
 * @input    -
 * @output   show input to insert car type
 * @author   Tadsawan
 * @Create Date  2564-10-22e
 */
function show_input() {
    $('#input_add').show();
    $('#btn_add').hide();
}

/*
 * get_id
 * get cart_id in remove car type modal
 * @input    cart_id
 * @output   get cart_id in remove car type modal
 * @author   Tadsawan
 * @Create Date  2564-12-08
 */
function get_id(cart_id) {
    $('#cart_id').val(cart_id);
}
</script>
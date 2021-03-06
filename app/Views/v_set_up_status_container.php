<!--
* v_set_up_status_container
* Display status container list page
* @input    array of status container
* @output   status container list page
* @author   Tadsawan
* @Create Date  2564-10-22
*/
-->

<style>
.cl-blue {
    color: #1244B9 !important;
}

.input_edit {
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    margin: 1.2em 0 0 0;
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

    margin: 0 0 0 0.1em;
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
        Remove Container status ?
    </div>
    <div class="content">
        <form action="<?php echo base_url() . '/Set_up_status_container/status_container_delete' ?>" method="post">
            <input type="hidden" id="stac_id" name="stac_id">

            <p style="font-size: 1rem">Are you sure to remove the container status</p>

            <div class="ui info message">
                <div class="header">
                    What happening after remove the container status
                </div>
                <ul class="list">
                    <li>The container status still remain in database,</li>
                    <li>But you cannot see the container status anymore</li>
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
                <h4 class="pl-3 page-title">CONTAINER STATUS</h4>
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
                    <a href="#">Container status</a>
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
                                    Set up container status
                                    <i class="fas fa-search" style="font-size: 110%; margin: 5px 10px 0px 10px;"></i>
                                    <input type="text" id="search" class="form-control form-control-sm col-md-4" placeholder="Search">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            Container status set up such as, new status, and switch on-off

                            <div class="ui labeled icon primary button" id="btn_add" style="cursor: pointer; float: right;" onclick="show_input();">
                                <i class="left plus icon"></i>Add status
                            </div>

                            <form id="add_status_container_form" action="<?php echo base_url() . '/Set_up_status_container/status_container_insert'?>" method="POST">
                                <div class="row my-4" id="input_add">
                                    <div class="col-md-7 mb-3">
                                        <!-- New status -->
                                        <input type="text" id="stac_name" name="stac_name" class="form-control" placeholder="New status">
                                    </div>
                                    <div class="col-md-3">
                                        <!-- Add status container -->
                                        <button type="submit" class="ui positive button">Save</button>
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive">
                                <table class="table mt-3">
                                    <tbody>
                                        <?php for ($i = 0; $i < count($arr_status_container); $i++) { ?>
                                        <tr class="stac_name<?php echo $arr_status_container[$i]->stac_id ?>">
                                            <div <?php echo 'stac_id' . $arr_status_container[$i]->stac_id ?>>
                                                <!-- ?????? -->
                                                <td>
                                                    <div id="btn_delete<?php echo $arr_status_container[$i]->stac_id ?>" class="item test button" onclick="get_id(<?php echo $arr_status_container[$i]->stac_id?>)" <?php if($arr_status_container[$i]->stac_status == 1) echo "hidden" ?>>
                                                        <i class='fas fa-times-circle' style="font-size: 130%; color:#FF0000; cursor:pointer;"></i>
                                                    </div>
                                                    <script>
                                                    $('.ui.modal').modal('attach events', '.test.button', 'toggle');
                                                    </script>
                                                </td>

                                                <!-- container type image -->
                                                <form action="<?php echo base_url() . '/Set_up_status_container/edit_status_container'?>" method="POST">
                                                    <!-- ???????????????????????????????????? -->
                                                    <td class="stac_name <?php echo $arr_status_container[$i]->stac_id ?>">
                                                        <span class="stac_name_<?php echo $arr_status_container[$i]->stac_id ?>">
                                                            <?php echo $arr_status_container[$i]->stac_name ?>
                                                        </span>

                                                        <input type="hidden" name="stac_id" value="<?php echo $arr_status_container[$i]->stac_id ?>">
                                                        <input hidden type="text" name="stac_name" class="stac_name_input_<?php echo $arr_status_container[$i]->stac_id ?> input_edit" value="<?php echo $arr_status_container[$i]->stac_name ?>" required>
                                                        <br />
                                                    </td>

                                                    <td>
                                                        <button hidden type="button" class="cancel_btn_<?php echo $arr_status_container[$i]->stac_id ?> btn_cancel" onclick="cancel_edit(<?php echo $arr_status_container[$i]->stac_id ?>)">Cancel</button>
                                                        <button hidden type="submit" class="confirm_btn_<?php echo $arr_status_container[$i]->stac_id ?> btn_confirm" onclick="edit_container_type(<?php echo $arr_status_container[$i]->stac_id ?>)">Confirm</button>
                                                </form>

                                                <i class="edit_btn_<?php echo $arr_status_container[$i]->stac_id ?> far fa-edit" style="font-size: 130%; cursor:pointer;" onclick="open_edit_form(<?php echo $arr_status_container[$i]->stac_id?>)"></i>
                                                </td>
                                                <!-- Switch -->
                                                <td>
                                                    <label class="switch">
                                                        <input id="stac_id<?php echo $arr_status_container[$i]->stac_id ?>" type="checkbox" onclick="check_status_container(<?php echo $arr_status_container[$i]->stac_id ?>)" <?php if($arr_status_container[$i]->stac_status == 2)echo " checked" ?>>
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
    if ($('#add_status_container_form').length > 0) {
        $('#add_status_container_form').validate({
            rules: {
                stac_name: {
                    required: true
                }
            },
            messages: {
                stac_name: {
                    required: 'Please enter a container status name'
                }
            }
        })
    }
});

// search
var rows = $('tr');
$('#search').keyup(function() {
    rows.hide();
    for(i = 0; i < rows.length; i++){
        if($('.stac_name_' + rows[i].className.substring(9)).text().toLowerCase().search($(this).val().toLowerCase()) >= 0){
            $('tr.stac_name' + rows[i].className.substring(9)).show();
        }
    }
});
// hide add status container form
$('#input_add').hide();

/*
 * check_status_container
 * check status container
 * @input    stac_id
 * @output   check status container
 * @author   Tadsawan
 * @Create Date  2564-10-22
 */
function check_status_container(stac_id) {
    if ($('#stac_id' + stac_id).prop('checked')) {
        status_container_status(stac_id);
        $('#btn_delete' + stac_id).prop("hidden", false);
    } else {
        status_container_restore(stac_id);
        $('#btn_delete' + stac_id).prop("hidden", true);
    }
}

/*
 * status_container_delete
 * delete status container
 * @input    stac_id
 * @output   delete status container
 * @author   Tadsawan
 * @Create Date  2564-10-22
 */
function status_container_status(stac_id) {
    console.log('status_container_status', stac_id);
    $.ajax({
        url: 'status_container_status',
        method: 'POST',
        dataType: 'JSON',
        data: {
            stac_id: stac_id
        }
    });
}

/*
 * status_container_restore
 * restore status container
 * @input    stac_id
 * @output   restore status container
 * @author   Tadsawan
 * @Create Date  2564-10-22
 */
function status_container_restore(stac_id) {
    console.log('status_container_restore', stac_id);
    $.ajax({
        url: 'status_container_restore',
        method: 'POST',
        dataType: 'JSON',
        data: {
            stac_id: stac_id
        }
    });
}

/*
 * show_input
 * show input to insert status container
 * @input    -
 * @output   show input to insert status container
 * @author   Tadsawan
 * @Create Date  2564-10-22
 */
function show_input() {
    $('#input_add').show();
    $('#btn_add').hide();
}

/*
 * get_id
 * get stac_id in remove status container modal
 * @input    stac_id
 * @output   get stac_id in remove status container modal
 * @author   Tadsawan
 * @Create Date  2564-12-08
 */
function get_id(stac_id) {
    $('#stac_id').val(stac_id);
}

/*
 * open_edit_form
 * open status container edit form
 * @input    stac_id
 * @output   open container type edit form
 * @author   Wirat
 * @Create Date  2564-12-10
 */
function open_edit_form(stac_id) {
    $('.stac_name_' + stac_id).prop('hidden', true);
    $('.edit_btn_' + stac_id).prop('hidden', true);
    $('.stac_name_input_' + stac_id).prop('hidden', false);
    $('.confirm_btn_' + stac_id).prop('hidden', false);
    $('.cancel_btn_' + stac_id).prop('hidden', false);
}

/*
 * cancel_edit
 * close status container edit form
 * @input    stac_id
 * @output   close status container edit form
 * @author   Wirat
 * @Create Date  2564-12-10
 */

function cancel_edit(stac_id) {
    $('.stac_name_' + stac_id).prop('hidden', false);
    $('.edit_btn_' + stac_id).prop('hidden', false);
    $('.stac_name_input_' + stac_id).prop('hidden', true);
    $('.confirm_btn_' + stac_id).prop('hidden', true);
    $('.cancel_btn_' + stac_id).prop('hidden', true);
    $(".error_" + stac_id).text("");
}
</script>
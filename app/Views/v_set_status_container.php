<style>
.cl-blue {
    color: #1244B9 !important;
}
</style>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="pl-4 mt-4 page-header mb-0">
                <h4 class="pl-3 page-title">Container Status</h4>
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
                            <div class="card-title">Set up container status</div>
                        </div>
                        <div class="card-body">
                            Container status set up such as, new status, and switch on-off

                            <div class="col-6 mt-4" style="cursor: pointer;" id="btn_add" onclick="show_input();">
                                <i class="icon-setup fas fa-plus"></i>
                                <div class="font-setup">Add new status</div>
                            </div>

                            <form id="add_status_container_form" action="<?php echo base_url() . '/Set_status_container/status_container_insert'?>" method="POST">
                                <div class="row my-4" id="input_add">
                                    <div class="col-md-7 mb-3">
                                        <!-- New status -->
                                        <input type="text" id="stac_name" name="stac_name" class="form-control" placeholder="New status">
                                    </div>
                                    <div class="col-md-3">
                                        <!-- Add status container -->
                                        <button type="submit" class="ui positive button">Add</button>
                                    </div>
                                </div>
                            </form>

                            <table class="table mt-3">
                                <tbody>
                                    <?php for ($i = 0; $i < count($arr_status_container); $i++) { ?>
                                    <tr>
                                        <div <?php echo 'stac_id' . $arr_status_container[$i]->stac_id ?>>
                                            <!-- ลบ -->
                                            <td></td>

                                            <!-- ชื่อสถานะตู้ -->
                                            <td class="stac_name <?php echo $arr_status_container[$i]->stac_id ?>"><?php echo $arr_status_container[$i]->stac_name ?></td>

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

    // check สถานะของสถานะตู้
    $('#input_add').hide();

    function check_status_container(stac_id) {
        if ($('#stac_id' + stac_id).prop('checked')) {
            status_container_delete(stac_id);
        } else {
            status_container_restore(stac_id);
        }
    }
    // ลบสถานะตู้
    function status_container_delete(stac_id) {
        console.log('status_container_delete', stac_id);
        $.ajax({
            url: 'status_container_delete',
            method: 'POST',
            dataType: 'JSON',
            data: {
                stac_id: stac_id
            }
        });
    }
    // เปลี่ยสถานะตู้จาก off เป็น on
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


    function show_input() {
        $('#input_add').show();
        $('#btn_add').hide();
    }
    </script>
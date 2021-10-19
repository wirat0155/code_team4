<style>
    @media (min-width: 1200px) {
        .container-sm {
            max-width: 900px;
        }
    }

    .upload-file {
        background-color: #eeeee4;
        border: none;
        color: black;
        border-radius: 8px;
        font-size: 14px;
        padding: 8px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    .input-image {
        height: 0;
        width: 0;
        left: 0;
        top: 0;
        opacity: 0;
        cursor: pointer;
    }

    #file_name {
        display: block;
        /* or inline-block */
        text-overflow: ellipsis;
        word-wrap: break-word;
        overflow: hidden;
        max-height: 100%;
        line-height: 1.5em;
        margin-top: 10;
    }

    .picture-container {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }

    .picture {
        width: 200px;
        height: 200px;
        background-color: #999999;
        border: 4px solid #CCCCCC;
        color: #FFFFFF;
        border-radius: 50%;
        margin: auto;
        overflow: hidden;
        transition: all 0.2s;
        -webkit-transition: all 0.2s;
        text-align: center;
    }

    .cl-blue {
        color: #1244B9 !important;
    }
</style>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
        <div class="page-inner">
            <div class="pl-4 mt-4 page-header mb-0">
                <h4 class="pl-3 page-title">AGENT DETAIL</h4>
                    <div class="card-action ml-auto mr-4">
                        <a class="ui yellow button" href="<?php echo base_url() . '/Car_edit/car_edit/' . $arr_car[0]->car_id ?>">
                            <i class="far fa-edit mr-1"></i>
                            Edit info
                        </a>
                        <button type="submit" class="ui red test button">
                            <i class="trash icon m-0"></i>
                            <i class="align left icon mr-1"></i>
                            Delete
                        </button>
                    </div>
            </div>

                <div class="pl-4 mt-4 page-header mb-0">
                    <h4 class="pl-3 page-title">CAR DETAIL</h4>
                </div>

                <hr width="95%" color="696969">
                <ul class="pl-2 mr-5 breadcrumbs d-flex align-items-left align-items-md-center" style="height: 30px;">
                    <li class="nav-home">
                        <a href="<?php echo base_url() . '/Dashboard/dashboard_show'?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a class="cl-blue" href="<?php echo base_url() . '/Car_show/car_show_ajax'?>">Car information</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Car detail</a>
                    </li>
                </ul>
            </div>

            <form id="add_car_form" action="<?php echo base_url() . '/Car_input/car_insert'?>" enctype="multipart/form-data" method="POST">
                <div class="row mx-4">
                    <div class="col-md-12">
                        <input type='hidden' name='car_id' value="<?php echo $arr_car[0]->car_id ?>">

    
                        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <div class="">
                                <div class="picture-container">
                                    <div class="picture">
                                        <img class="avatar-img rounded-circle" src="<?php echo base_url() . '/car_image/' . $arr_car[0]->car_image ?>">
                                    </div>
                                </div><br>

                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Car Information</div>
                                    </div>

                                    <!-- Car Information-->    
                                    <div class="card-body">
                                        <div class="row px-5">

                                            <!-- Number -->
                                            <div class="col-md-6">
                                                <div class="form-group form-inline">
                                                    <label for="car_number" class="col-form-label mr-auto">Number :</label>
                                                    <div class="col-md-8 p-0">
                                                        <p class="block w-full mt-3 text-sm"> <?php echo $arr_car[0]->car_number ?></p>
                                                        <small class="form-text text-muted"> </small>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Brand -->
                                            <div class="col-md-6">
                                                <div class="form-group form-inline">
                                                    <label for="car_brand" class="col-form-label mr-auto">Brand :</label>
                                                    <div class="col-md-9 p-0">
                                                        <p class="block w-full mt-3 text-sm"> <?php echo $arr_car[0]->car_brand ?></p>
                                                        <small class="form-text text-muted"> </small>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Code -->
                                            <div class="col-md-6">
                                                <div class="form-group form-inline">
                                                    <label for="car_code" class="col-form-label mr-auto">Code :</label>
                                                    <div class="col-md-8 p-0">
                                                        <p class="block w-full mt-3 text-sm"> <?php echo $arr_car[0]->car_code ?></p>
                                                        <small class="form-text text-muted"> </small>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Branch -->
                                            <div class="col-md-6">
                                                <div class="form-group form-inline">
                                                    <label for="car_branch" class="col-form-label mr-auto">Branch :</label>
                                                    <div class="col-md-9 p-0">
                                                        <p class="block w-full mt-3 text-sm"> <?php echo $arr_car[0]->car_branch ?></p>
                                                        <small class="form-text text-muted"> </small>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Province -->
                                            <div class="col-md-6">
                                                <div class="form-group form-inline">
                                                    <label for="prov_name" class="col-form-label mr-auto"></label>
                                                    <div class="col-md-8 p-0">
                                                        <p class="block w-full mt-1 text-sm">
                                                            <?php for ($i = 0; $i < count($arr_car_prov); $i++) { ?>
                                                            <?php if ($arr_car_prov[$i]->prov_id == $arr_car[0]->car_prov_id) {
                                                            echo $arr_car_prov[$i]->prov_name;
                                                            } ?>
                                                        <?php } ?></p>
                                                        <small></small>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Chassis number -->
                                            <div class="col-md-6">
                                                <div class="form-group form-inline">
                                                    <label for="car_chassis_number" class="col-form-label mr-auto pull-right">Chassis
                                                        number :</label>
                                                    <div class="col-md-9 p-0">
                                                        <p class="block w-full mt-3 text-sm"> <?php echo $arr_car[0]->car_chassis_number ?></p>
                                                        <small class="form-text text-muted"> </small>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Car type -->
                                            <div class="col-md-6">
                                                <div class="form-group form-inline">
                                                    <label for="car_cart_id" class="col-form-label mr-auto">Car type :</label>
                                                    <div class="col-md-8 p-0">
                                                        <p class="block w-full mt-1 text-sm">
                                                        <?php for ($i = 0; $i < count($arr_car_type); $i++) { ?>
                                                            <?php if ($arr_car_type[$i]->cart_id == $arr_car[0]->car_cart_id) {
                                                            echo $arr_car_type[$i]->cart_name;
                                                            } ?>
                                                        <?php } ?></p>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Register year -->
                                            <div class="col-md-6">
                                                <div class="form-group form-inline">
                                                    <label for="car_register_year" class="col-form-label mr-auto">Register
                                                        year :</label>
                                                    <div class="col-md-9 p-0">
                                                        <p class="block w-full mt-3 text-sm"> <?php echo $arr_car[0]->car_register_year ?></p>
                                                        <small class="form-text text-muted"> </small>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Car status  -->
                                            <div class="col-md-6">
                                                <div class="form-group form-inline">
                                                    <label for="car_status" class="col-form-label mr-auto">Car status :</label>
                                                    <div class="col-md-8 p-0">
                                                        <p class="block w-full mt-3 text-sm">
                                                        <?php if ($arr_car[0]->car_status == 1) {
                                                            echo  "พร้อมใช้";
                                                        } else if ($arr_car[0]->car_status == 2) {
                                                            echo "เสียหาย";
                                                        } else if ($arr_car[0]->car_status == 3) {
                                                            echo "กำลังซ่อม";
                                                        } else if ($arr_car[0]->car_status == 4) {
                                                            echo "เลิกใช้งาน";
                                                        } ?></p>
                                                        <small class="form-text text-muted"> </small>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Weight -->
                                            <div class="col-md-6">
                                                <div class="form-group form-inline">
                                                    <label for="car_weight" class="col-form-label mr-auto">Weight :</label>
                                                    <div class="col-md-9 p-0">
                                                        <p class="block w-full mt-3 text-sm"> <?php echo $arr_car[0]->car_weight ?></p>
                                                        <small class="form-text text-muted"> </small>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Fuel Type -->
                                            <div class="col-md-6">
                                                <div class="form-group form-inline">
                                                    <label for="car_fuel_type" class="col-form-label mr-auto">Fuel type :</label>
                                                    <div class="col-md-8 p-0">
                                                        <p class="block w-full mt-3 text-sm"> <?php echo $arr_car[0]->car_fuel_type ?></p>
                                                        <small class="form-text text-muted"> </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            

            <div class="ui modal">
                <i class="close icon"></i>
                <div class="header">
                    Remove Agent ?
                </div>
                <div class="content">
                    <form action="<?php echo base_url() . '/Car_show/car_delete' ?>" method="post">
                        <input type="hidden" id="car_id" name="car_id" value="<?php echo $arr_car[0]->car_id ?>">

                        <p style=" font-size: 1rem">Are you sure to remove the agent</p>

                        <div class="ui info message">
                            <div class="header">
                                What happening after remove the agent
                            </div>
                            <ul class="list">
                                <li>The Agent still ramain in database,</li>
                                <li>But you cannot see the agent anymore</li>
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
        </div>
    </div>
</div>
<script>
    $('.ui.modal').modal('attach events', '.test.button', 'toggle');
    function get_image() {
        var car_image = $('#car_image').val();
        $('#file_name').html(car_image.substr(12));
        $('#car_image-error').remove();
        $('#old_car_image').remove();
    }

    function get_id(car_id) {
        $('#car_id').val(car_id);
    }
</script>
<!--
* v_driver_show_information
* Display driver detail page
* @input    driver information
* @output   driver detail page
* @author   Thanathip
* @Create Date  2564-08-12
*/
-->

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
                <div class="float-right ml-auto mr-4" style='margin-top: 10px'>
                    <!-- botton edit -->
                    <a class="ui yellow button" href="<?php echo base_url() . '/Driver_edit/driver_edit/' . $arr_driver[0]->dri_id ?>">
                        <i class="far fa-edit mr-1"></i>
                        Edit info
                    </a>
                    <!-- botton delete -->
                    <button type="submit" class="ui red test button">
                        <i class="trash icon m-0"></i>
                        <i class="align left icon mr-1"></i>
                        Delete
                    </button>
                </div>
                <!-- หัวข้อ -->
                <div class="pl-4 mt-4 page-header mb-0">
                    <h4 class="pl-3 page-title">DRIVER DETAILS</h4>

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
                        <a class="cl-blue" href="<?php echo base_url() . '/Driver_show/driver_show_ajax' ?>">Driver information</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Driver details</a>
                    </li>
                </ul>
            </div>

            <div class="row mx-4">
                <div class="col-md-12">
                    <!-- Driver detail -->
                    <div class="container mt-4 mb-3 d-flex justify-content-center" style="max-width: 800px">
                        <!-- driver profile image -->
                        <div class="picture">
                            <img class="avatar-img" src="<?php echo base_url() . '/dri_profile_image/' . $arr_driver[0]->dri_profile_image ?>">
                        </div>

                        <!-- car image -->
                        <div class="picture">
                            <img class="avatar-img" src="<?php echo base_url() . '/dri_profile_image/' . $arr_driver[0]->car_image ?>">
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <?php
                                    $dri_status = $arr_driver[0]->dri_status;
                                    $arr_dri_status = ['Ready', 'Working', 'Reserved' ,'Resigned'];
                                    $dri_status = $arr_dri_status[$arr_driver[0]->dri_status - 1];
                                ?>
                                <div class="card-title">Driver Information <span class="text-con-ready bg-success text-white p-2" style="border-radius: 5px; font-size: 1rem;"><?php echo $dri_status ?></span></div>

                                <div class="">
                                    Car number: 1
                                </div>
                            </div>
                            
                        </div>

                        <div class="card-body">
                            <?php
                            require_once dirname(__FILE__) . '/card/driver_card.php';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- modal delete -->
            <div class="ui modal">
                <i class="close icon"></i>
                <div class="header">
                    Remove Driver ?
                </div>
                <div class="content">
                    <form action="<?php echo base_url() . '/Driver_show/driver_delete' ?>" method="post">
                        <input type="hidden" name="dri_id" id="dri_id" value="<?php echo $arr_driver[0]->dri_id ?>">

                        <p style="font-size: 1rem">Are you sure to remove the driver</p>

                        <div class="ui info message">
                            <div class="header">
                                What happening after remove the driver
                            </div>
                            <ul class="list">
                                <li>The driver still ramain in database,</li>
                                <li>But you cannot see the driver anymore</li>
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
    <!--
    /*
    * get_image
    * show image name
    * @input    -
    * @output   show image name
    * @author   Thanathip
    * @Create Date  2564-08-12
    */
    -->
    function get_image() {
        var dri_profile_image = $('#dri_profile_image').val();
        $('#file_name').html(dri_profile_image.substr(12));
        $('#dri_profile_image-error').remove();
        $('#old_dri_profile_image').remove();
    }

    <!--
    /*
    * get_id
    * get dri_id in remove driver modal
    * @input    dri_id
    * @output   get dri_id in remove driver modal
    * @author   Thanathip
    * @Create Date  2564-08-12
    */
    -->
    function get_id(dri_id) {
        $('#dri_id').val(dri_id);
    }

    //call remove driver modal
    $('.ui.modal').modal('attach events', '.test.button', 'toggle');
</script>

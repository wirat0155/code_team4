<!--
* v_driver_edit
* Display driver edit page
* @input    driver information
* @output   driver edit page
* @author   Warisara
* @Create Date  2564-08-06
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
        cursor: pointer;
    }
    .cl-blue {
        color: #1244B9 !important;
    }
    input.error, select.error, textarea.error {
        border: 1px solid red !important;
    }
    .ui.search.dropdown>input.search.error {
        border: 1px solid red !important;
    }
    small.error, label.error {
        color: red !important;
        font-weight: bold;
    }
</style>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <!-- หัวข้อ -->
            <div class="pl-4 mt-4 page-header mb-0">
                <h4 class="pl-3 page-title">EDIT DRIVER</h4>
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
                    <a class="cl-blue" href="<?php echo base_url() . '/Driver_show/driver_detail/' . $arr_driver->dri_id ?>">Driver details</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit driver</a>
                </li>
            </ul>

            <form id="driver_form" action="<?php echo base_url() . '/Driver_edit/driver_update' ?>" enctype="multipart/form-data" method="POST">
            
                <!-- driver profile image -->
                <div class="text-center mt-4 mb-3">
                    <div class="picture-container">
                        <div class="picture" onclick="$('#dri_profile_image').click();">
                            <img class="avatar-img rounded-circle" src="<?php echo base_url() . '/dri_profile_image/' . $arr_driver->dri_profile_image ?>">
                        </div>
                    </div>
                </div>

                <div class="row mx-4">
                    <div class="col-md-12">
                        <input type='hidden' name='dri_id' value="<?php echo $arr_driver->dri_id ?>">

                        <!-- edit driver -->
                        <div class="px-4 py-3 mb-8 rounded-lg shadow-md dark:bg-gray-800">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Driver Information</div>
                                </div>

                                <div class="card-body">
                                    <?php
                                    require_once dirname(__FILE__) . '/form/driver_edit_form.php';
                                    ?>
                                </div>
                            </div>
                            
                            <!-- button -->
                            <div class="card-action" id="car_action">

                                <!-- cancel button -->
                                <input type="button" class="ui button" value="Cancel" onclick="window.history.back();">

                                <!-- confirm button -->
                                <button type="submit" class="ui orange button pull-right">
                                    Confirm
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    /*
    * get_image
    * show image name in driver edit form
    * @input    -
    * @output   show image name in driver edit form
    * @author   Warisara
    * @Create Date  2564-08-06
    */
    function get_image() {
        var dri_profile_image = $('#dri_profile_image').val();
        $('#input_show_browse').val(dri_profile_image.substr(12));
        $('#dri_profile_image-error').remove();
    }
</script>
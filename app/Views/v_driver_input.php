<!--
* v_driver_input
* Display driver input page
* @input    -
* @output   driver input page
* @author   Thanathip
* @Create Date  2564-08-06
*/
-->

<style>
    .cl-blue {
        color: #1244B9 !important;
    }
    input.error, select.error {
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
            <div class="page-inner">
                <div class="pl-4 mt-4 page-header mb-0">
                    <h4 class="pl-3 page-title">ADD DRIVER</h4>
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
                        <a class="cl-blue" href="<?php echo base_url() . '/Driver_show/driver_show_ajax'?>">Driver information</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Add driver</a>
                    </li>
                </ul>
            </div>

            <form id="driver_form" action="<?php echo base_url() . '/Driver_input/driver_insert'?>" enctype="multipart/form-data" method="POST">
                <div class="row mx-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Driver Information</div>
                            </div>

                            <div class="card-body">
                                <?php
                                require_once dirname(__FILE__) . '/form/driver_form.php';
                                ?>
                            </div>

                            <div class="card-action" id="driver_action" style>
                                <input type="button" class="ui button" value="Cancel" onclick="window.history.back();">
                                <button type="submit" class="ui positive button pull-right">
                                    <i class="plus icon"></i>
                                    Add driver
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script>
            /*
            * get_image
            * show image name in driver input form
            * @input    -
            * @output   show image name in driver input form
            * @author   Thanathip
            * @Create Date  2564-08-06
            */
            function get_image() {
                var dri_profile_image = $('#dri_profile_image').val();
                $('#input_show_browse').val(dri_profile_image.substr(12));
                $('#dri_profile_image-error').remove();
            }
        </script>
    </div>
</div>

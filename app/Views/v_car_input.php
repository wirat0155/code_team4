<style>
.cl-blue {
    color: #1244B9 !important;
}

input.error {
    border: 1px solid red !important;
}

.ui.search.dropdown>input.search.error {
    border: 1px solid red !important;
}

small.error,
label.error {
    color: red !important;
    font-weight: bold;
}
</style>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-inner">
                <div class="pl-4 mt-4 page-header mb-0">
                    <h4 class="pl-3 page-title">ADD CAR</h4>
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
                        <a href="#">Add car</a>
                    </li>
                </ul>
            </div>

            <form id="car_form" action="<?php echo base_url() . '/Car_input/car_insert'?>" enctype="multipart/form-data" method="POST" onsubmit="validate_form();">
                <div class="row mx-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Car Information</div>
                            </div>

                            <div class="card-body">
                                <?php
                                $page = 'car_input';
                                require_once dirname(__FILE__) . '/form/car_form.php';
                                ?>
                            </div>

                            <div class="card-action" id="car_action" style>
                                <input type="button" class="ui button" value="Cancel" onclick="window.history.back();">
                                <button type="submit" class="ui positive button pull-right">
                                    <i class="plus icon"></i>
                                    Add car
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script>
        <!--
        /*
        * validate_form
        * validate add car form
        * @input -
        * @output validate add car form
        * @author
        * @Create Date
        * @Update Date
        */
        -->
        function validate_form() {
            return check_car_prov_id();
        }

        <!--
        /*
        * check_car_prov_id
        * check select province or not
        * @input -
        * @output check select province or not
        * @author
        * @Create Date
        * @Update Date
        */
        -->
        function check_car_prov_id() {
            // get province id value
            let car_prov_id = $('input[name="car_prov_id"]').val();
            let car_prov_id_warning = $('.ui.fluid.search.selection.dropdown+small');

            // not select province
            if (car_prov_id == '') {
                $('input.search').addClass('error');
                car_prov_id_warning.addClass('error');
                car_prov_id_warning.html('<br/><br/>Please select a province');
                return false;

            // select province
            } else {
                $('input.search').removeClass('error');
                car_prov_id_warning.removeClass('error');
                car_prov_id_warning.html('');
                return true;
            }
        }

        <!--
        /*
        * get_image
        * show image name when upload car image
        * @input -
        * @output show image name when upload car image
        * @author
        * @Create Date
        * @Update Date
        */
        -->
        function get_image() {
            var car_img = $('#car_image').val();
            $('#input_show_browse').val(car_img.substr(12));
            $('#car_image-error').remove();
        }
        </script>
    </div>

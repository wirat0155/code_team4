<style>
label.error {
    float: left !important;
}

.fa-phone {
        -moz-transform: scaleX(-1);
        -o-transform: scaleX(-1);
        -webkit-transform: scaleX(-1);
        transform: scaleX(-1);
        filter: FlipH;
        -ms-filter: "FlipH";
    }

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
                    <h4 class="pl-3 page-title">EDIT CAR</h4>
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
                        <a class="cl-blue" href="<?php echo base_url() . '/Car_show/car_show_ajax'?>">Car
                            information</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a class="cl-blue"
                            href="<?php echo base_url() . '/Car_show/car_detail/' . $arr_car[0]->car_id ?>">Car
                            details</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit car</a>
                    </li>

                </ul>
            </div>

            <div class="row mx-5 mt-0">
                <div class="col-md-12">
                    <div class="card">
                    <form id="car_form" action="<?php echo base_url() . '/Car_edit/car_update' ?>" enctype="multipart/form-data" method="POST">
                            <div class="card-header">
                                <div class="card-title">Car information</div>
                            </div>

                            <div class="card-body">
                                <?php
                                $page = 'car_edit';
                                require_once dirname(__FILE__) . '/form/car_form.php';
                                ?>
                            </div>
                    </div>
                    <div class="card-action" id="car_action">
                        <input type="button" class="ui button" value="Cancle" onclick="window.history.back();" >
                        <button type="submit" class="ui orange button pull-right">
                            Confirm
                        </button>
                    </div>
                    </form>
                </div>
            </div>

        <script>
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

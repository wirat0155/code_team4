<!--
* v_customer_edit
* Display customer edit page
* @input    customer information
* @output   customer edit page
* @author   Preechaya
* @Create Date  2564-08-06
*/
-->

<style>
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

input.error,
select.error,
textarea.error {
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
            <div class="pl-4 mt-4 page-header mb-0">
                <h4 class="page-title">EDIT CUSTOMER</h4>
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
                    <a class="cl-blue" href="<?php echo base_url() . '/Customer_show/customer_show_ajax'?>">Customer information</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a class="cl-blue" href="<?php echo base_url() . '/Customer_show/customer_detail/' . $cus_id ?>">Customer
                        details</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit customer</a>
                </li>
            </ul>
            <form id="customer_form" action="<?php echo base_url() . '/Customer_edit/customer_update'?>" method="POST">
                <div class="row mx-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Customer Information</div>
                            </div>

                            <!-- Customer Information-->
                            <div class="card-body">
                                <?php
                                $page = 'customer_edit';
                                require_once dirname(__FILE__) . "/form/customer_edit_form.php"
                                ?>
                            </div>
                        </div>
                        <div class="card-action" id="car_action">
                            <input type="button" class="ui button" value="Cancel" onclick="window.history.back();">
                            <button type="submit" class="ui orange button pull-right">
                                Confirm
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

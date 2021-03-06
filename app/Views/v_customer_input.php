<!--
* v_customer_input
* Display customer input page
* @input    -
* @output   customer input page
* @author   Klayuth
* @Create Date  2564-08-06
*/
-->

<?php
if (isset($_SESSION['cus_company_name'])) {
    $cus_company_name = $_SESSION['cus_company_name'];
    $cus_branch = $_SESSION['cus_branch'];
    $cus_firstname = $_SESSION['cus_firstname'];
    $cus_lastname = $_SESSION['cus_lastname'];
    $cus_tel = $_SESSION['cus_tel'];
    $cus_address = $_SESSION['cus_address'];
    $cus_tax = $_SESSION['cus_tax'];
    $cus_email = $_SESSION['cus_email'];
}
?>

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
            <div class="pl-4 mt-4 page-header mb-0">
                <h4 class="page-title">ADD CUSTOMER</h4>
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
                    <a href="#">Add customer</a>
                </li>
            </ul>

            <form id="customer_form" action="<?php echo base_url() . '/Customer_input/customer_insert' ?>" method="POST">
                <div class="row mx-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div id="customer_section">
                                <div class="card-header">
                                    <div class="card-title">Customer Information</div>
                                </div>
                                <div class="card-body">
                                    <h3>1. Customer information</h3>
                                    <div class="row">
                                        <!-- Container number -->
                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="cus_company_name">Company name </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-right: 10%;">
                                            <input class="form-control" name="cus_company_name" placeholder="Company name" value="<?php echo $cus_company_name ?>">
                                            <label class="error"><?php echo $_SESSION['cus_company_name_error']?></label>
                                        </div>

                                        <?php
                                        require_once dirname(__FILE__) . '/form/customer_form.php';
                                        ?>

                                        <div class="card-action">
                                            <input type="button" class="ui button" value="Cancel" onclick="window.history.back();">
                                            <button onclick="show_all_form();" type="submit" class="ui positive button pull-right">
                                                <i class="plus icon"></i>
                                                Add customer
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
            </form>
        </div>
    </div>

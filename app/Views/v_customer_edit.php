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
                    <a class="cl-blue" href="<?php echo base_url() . '/Customer_show/customer_detail/' . $arr_customer[0]->cus_id ?>">Customer
                        detail</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit customer</a>
                </li>
            </ul>
            <form id="add_customer_form" action="<?php echo base_url() . '/Customer_edit/customer_update'?>" enctype="multipart/form-data" method="POST">
                <div class="row mx-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Customer Information</div>
                            </div>

                            <!-- Customer Information-->
                            <div class="card-body">
                                <div class="row px-5">
                                    <div class="col-md-6 col-lg-6">
                                        <!-- Id agent -->
                                        <input type='hidden' name='cus_id' value="<?php echo $arr_customer[0]->cus_id ?>">

                                        <!-- Company name -->
                                        <div class="form-group form-inline">
                                            <label for="cus_company_name" class="col-form-label mr-auto">Company name
                                                :</label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="cus_company_name" name="cus_company_name" placeholder="Company name" value="<?php echo $arr_customer[0]->cus_company_name ?>">
                                                <label class="error"><?php echo $_SESSION['cus_company_name_error']?></label>
                                            </div>
                                        </div>
                                        <!-- Branch -->
                                        <div class="form-group form-inline">
                                            <label for="cus_branch" class="col-form-label mr-auto">Branch
                                                :</label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="cus_branch" name="cus_branch" placeholder="Branch" value="<?php echo $arr_customer[0]->cus_branch ?>">
                                                <label class="error"><?php echo $_SESSION['cus_branch_error']?></label>
                                            </div>
                                        </div>


                                        <!-- Company location -->
                                        <div class="form-group">
                                            <label for="cus_address">Company location
                                                :</label>
                                            <textarea type="text" class="form-control" id="cus_address" name="cus_address" placeholder="Company location" rows="5"><?php echo $arr_customer[0]->cus_address ?></textarea>
                                        </div>


                                        <!-- Taxpayer number -->

                                        <div class="form-group form-inline mt-2">
                                            <label for="agn_tax" class="col-form-label mr-auto">Tax number
                                                :</label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="cus_tax" name="cus_tax" placeholder="Taxpayer number" value="<?php echo $arr_customer[0]->cus_tax ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-lg-6">
                                        <!-- Responsible person -->
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Responsible person
                                                (Representative)</label>
                                        </div>

                                        <!-- First Name -->
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">First name </label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="cus_firstname" name="cus_firstname" placeholder="First name" value="<?php echo $arr_customer[0]->cus_firstname ?>">
                                            </div>
                                        </div>

                                        <!-- Last Name -->

                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Last name </label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="cus_lastname" name="cus_lastname" placeholder="Last name" value="<?php echo $arr_customer[0]->cus_lastname ?>">
                                            </div>
                                        </div>


                                        <!-- Contact number -->
                                        <div class="form-group form-inline">
                                            <label for="agn_tel" class="col-form-label mr-auto">Contact number </label>
                                            <div class="col-md-8 p-0">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-phone"></i>
                                                        </span>
                                                    </div>
                                                    <input type="tel" class="form-control" id="cus_tel" name="cus_tel" placeholder="xxx-xxx-xxxx" value="<?php echo $arr_customer[0]->cus_tel ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Email -->
                                        <div class="form-group form-inline">
                                            <label for="agn_email" class="col-form-label mr-auto">Email :</label>
                                            <div class="col-md-8 p-0">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text ">
                                                            <i class="fas fa-envelope"></i>
                                                        </span>
                                                    </div>
                                                    <input type="email" class="form-control" id="cus_email" name="cus_email" placeholder="example@gmail.com" value="<?php echo $arr_customer[0]->cus_email ?>">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action" id="car_action">
                            <input type="button" class="ui button" value="Cancle" onclick="window.history.back();">
                            <button type="submit" class="ui orange button pull-right">
                                Confirm
                            </button>
                        </div>
            </form>
        </div>
    </div>
</div>
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
                <h4 class="pl-3 page-title">CUSTOMER DETAIL</h4>
                <div class="card-action ml-auto mr-4">
                    <a class="ui yellow button" href="<?php echo base_url() . '/Customer_edit/customer_edit/' . $arr_customer[0]->cus_id ?>">
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
                    <a href="#">Customer detail</a>
                </li>
            </ul>
            <div class="row mx-5 mt-0">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Customer</div>
                        </div>

                        <!-- Customer Information-->
                        <div class="card-body">
                            <div class="row px-5">

                                <div class="col-md-6 col-lg-6">
                                    <!-- Company name -->
                                    <div class="form-group form-inline">
                                        <label for="cus_company_name" class="col-form-label mr-auto">Company name
                                            :</label>
                                        <div class="col-md-8 p-0" id="cus_company_name" name="cus_company_name">
                                            <?php echo $arr_customer[0]->cus_company_name ?>
                                        </div>
                                    </div>
                                    <!-- Branch -->
                                    <div class="form-group form-inline">
                                        <label for="cus_branch" class="col-form-label mr-auto">Branch
                                            :</label>
                                        <div class="col-md-8 p-0" id="cus_branch" name="cus_branch">
                                            <?php echo $arr_customer[0]->cus_branch ?>
                                        </div>
                                    </div>

                                    <!-- Company location -->

                                    <div class="form-group form-inline">
                                        <label for="cus_address" class="col-form-label mr-auto">Company location
                                            :</label>
                                        <div class="col-md-12 p-0 pt-2" id="cus_address" name="cus_address">
                                            <?php echo $arr_customer[0]->cus_address ?>
                                        </div>
                                    </div>


                                    <!-- Taxpayer number -->

                                    <div class="form-group form-inline">
                                        <label for="cus_tax" class="col-form-label mr-auto">Taxpayer number :</label>
                                        <div class="col-md-8 p-0" id="cus_tax" name="cus_tax">
                                            <?php echo $arr_customer[0]->cus_tax ?>
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
                                        <label class="col-form-label mr-auto">First name
                                            :</label>
                                        <div class="col-md-8 p-0" id="cus_firstname" name="cus_firstname">
                                            <?php echo $arr_customer[0]->cus_firstname ?>
                                        </div>
                                    </div>

                                    <!-- Last Name -->

                                    <div class="form-group form-inline">
                                        <label class="col-form-label mr-auto">Last name
                                            :</label>
                                        <div class="col-md-8 p-0" id="cus_lastname" name="cus_lastname">
                                            <?php echo $arr_customer[0]->cus_lastname ?>
                                        </div>
                                    </div>


                                    <!-- Contact number -->

                                    <div class="form-group form-inline">
                                        <label for="cus_tel" class="col-form-label mr-auto">Contact number :</label>
                                        <div class="col-md-8 p-0" id="cus_tel" name="cus_tel">
                                            <?php echo tel_format($arr_customer[0]->cus_tel) ?>
                                        </div>
                                    </div>


                                    <!-- Email -->

                                    <div class="form-group form-inline">
                                        <label for="cus_email" class="col-form-label mr-auto">Email :</label>
                                        <div class="col-md-8 p-0" id="cus_email" name="cus_email">
                                            <?php echo $arr_customer[0]->cus_email ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="ui modal">
                <i class="close icon"></i>
                <div class="header">
                    Remove Customer ?
                </div>
                <div class="content">
                    <form action="<?php echo base_url() . '/Customer_show/customer_delete' ?>" method="post">
                        <input type="hidden" id="cus_id" name="cus_id" value="<?php echo $arr_customer[0]->cus_id ?>">

                        <p style=" font-size: 1rem">Are you sure to remove the customer</p>

                        <div class="ui info message">
                            <div class="header">
                                What happening after remove the customer
                            </div>
                            <ul class="list">
                                <li>The Customer still ramain in database,</li>
                                <li>But you cannot see the customer anymore</li>
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
            <script>
            $('.ui.modal').modal('attach events', '.test.button', 'toggle');
            </script>
        </div>
    </div>
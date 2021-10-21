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

input.error, textarea.error {
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
                    <h4 class="pl-3 page-title">EDIT AGENT</h4>
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
                        <a class="cl-blue" href="<?php echo base_url() . '/Agent_show/agent_show_ajax'?>">Agent
                            information</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a class="cl-blue"
                            href="<?php echo base_url() . '/Agent_show/agent_detail/' . $arr_agent[0]->agn_id ?>">Agent
                            detail</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit agent</a>
                    </li>

                </ul>
            </div>

            <div class="row mx-5 mt-0">
                <div class="col-md-12">
                    <div class="card">
                        <form id="agent_form" action="<?php echo base_url() . '/Agent_edit/agent_update' ?>"
                            method="POST">
                            <div class="card-header">
                                <div class="card-title">Agent information</div>
                            </div>

                            <div class="card-body">
                                <div class="row px-5">
                                    <div class="col-md-6 col-lg-6">

                                        <label class="mt-3 mb-3"><b><h3>Company</h3></b></label>
                                        <!-- Id agent -->
                                        <input type='hidden' name='agn_id' value="<?php echo $arr_agent[0]->agn_id ?>">
                                        
                                        <!-- Company name -->
                                        <div class="form-group form-inline">
                                            <label for="agn_company_name" class="col-form-label mr-auto">Company name
                                                :</label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="agn_company_name"
                                                    name="agn_company_name" placeholder="Company name"
                                                    value="<?php echo $arr_agent[0]->agn_company_name ?>">
                                                <label
                                                    class="error"><?php echo $_SESSION['agn_company_name_error']?></label>
                                            </div>
                                        </div>

                                        <!-- Taxpayer number -->

                                        <div class="form-group form-inline mt-2">
                                            <label for="agn_tax" class="col-form-label mr-auto">Tax number
                                                :</label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="agn_tax" name="agn_tax"
                                                    placeholder="Taxpayer number"
                                                    value="<?php echo $arr_agent[0]->agn_tax ?>">
                                            </div>
                                        </div>

                                        <!-- Company location -->
                                        <div class="form-group">
                                            <label for="agn_address">Company location
                                                :</label>
                                            <textarea type="text" class="form-control" id="agn_address"
                                                name="agn_address" placeholder="Company location"
                                                rows="5"><?php echo $arr_agent[0]->agn_address ?></textarea>
                                        </div>

                                    </div>


                                    <div class="col-md-6 col-lg-6">
                                        <!-- Responsible person -->
                                        <label class="mt-3 mb-3"><b><h3>Contact</h3></b></label>

                                        <!-- First Name -->
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">First name </label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="agn_firstname"
                                                    name="agn_firstname" placeholder="First name"
                                                    value="<?php echo $arr_agent[0]->agn_firstname ?>">
                                            </div>
                                        </div>

                                        <!-- Last Name -->

                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Last name </label>
                                            <div class="col-md-8 p-0">
                                                <input class="form-control input-full" id="agn_lastname"
                                                    name="agn_lastname" placeholder="Last name"
                                                    value="<?php echo $arr_agent[0]->agn_lastname ?>">
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
                                                    <input type="tel" class="form-control" id="agn_tel" name="agn_tel"
                                                        placeholder="xxx-xxx-xxxx"
                                                        value="<?php echo $arr_agent[0]->agn_tel ?>">
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
                                                    <input type="email" class="form-control" id="agn_email"
                                                        name="agn_email" placeholder="example@gmail.com"
                                                        value="<?php echo $arr_agent[0]->agn_email ?>">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
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
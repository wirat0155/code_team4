<style>
    .stepper-wrapper {
        margin-top: auto;
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .stepper-item {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        flex: 1;

        @media (max-width: 768px) {
            font-size: 12px;
        }
    }

    .stepper-item::before {
        position: absolute;
        content: "";
        border-bottom: 2px solid #ccc;
        width: 100%;
        top: 20px;
        left: -50%;
        z-index: 2;
    }

    .stepper-item::after {
        position: absolute;
        content: "";
        border-bottom: 2px solid #ccc;
        width: 100%;
        top: 20px;
        left: 50%;
        z-index: 2;
    }

    .stepper-item .step-counter {
        position: relative;
        z-index: 5;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #ccc;
        margin-bottom: 6px;
        cursor: pointer;
    }

    .step-counter.active {
        background-color: #041F47;
        color: #FFFFFF;
    }

    .step-counter.false {
        background-color: #FF2C2C;
        color: #FFFFFF;
    }

    .step-counter.completed {
        background-color: #0ec20e;
        color: #FFFFFF;
    }

    .stepper-item.completed::after {
        position: absolute;
        content: "";
        border-bottom: 2px solid #E6EBF3;
        width: 100%;
        top: 20px;
        left: 50%;
        z-index: 3;
    }

    .stepper-item:first-child::before {
        content: none;
    }

    .stepper-item:last-child::after {
        content: none;
    }
    .input-label {
        margin-left: 0%;
    }
    @media only screen and (min-width: 768px) {
        .input-label {
            margin-left: 15%;
        }
    }
</style>




<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="pl-4 mt-4 page-header mb-0">
                <h4 class="page-title">ADD AGENT</h4>
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
                    <a href="<?php echo base_url() . '/Agent_show/agent_show_ajax'?>">Agent list</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/Agent_input/agent_input'?>">Add agent</a>
                </li>
            </ul>

            <form id="add_agent_form" action="<?php echo base_url() . '/Agent_input/agent_insert' ?>" method="POST">
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div id="agent_section">
                                <div class="card-header">
                                    <div class="card-title">Agent Information</div>
                                </div>
                                <div class="card-body">
                                    <h3>1. Agent information</h3>
                                    <div class="row">
                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="agn_company_name">Company name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 " style="margin-right: 10%;">
                                            <input class="form-control" name="agn_company_name" placeholder="Company name">
                                        </div>

                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="agn_tax">Tax number </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 " style="margin-right: 10%;">
                                            <input type="text" class="form-control" id="agn_tax" name="agn_tax" placeholder="12345678">
                                        </div>

                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="agn_address">Company location </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 " style="margin-right: 10%;">
                                            <textarea type="text" class="form-control" id="agn_address" name="agn_address" placeholder="Company location"></textarea>
                                        </div>
                                    </div>
                                    <h3>2. Contact information</h3>
                                    <div class="row">
                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="agn_firstname">First name </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 " style="margin-right: 10%;">
                                            <input type="text" class="form-control" id="agn_firstname" name="agn_firstname" placeholder="First name">
                                        </div>
                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="agn_lastname">Last name </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 " style="margin-right: 10%;">
                                            <input type="text" class="form-control" id="agn_lastname" name="agn_lastname" placeholder="Last name">
                                        </div>
                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="agn_tel">Contact number </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="input-group" style="margin-right: 10%;">
                                                <div class="input-group-prepend ">
                                                    <span class="input-group-text "><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="tel" class="form-control" id="agn_tel" name="agn_tel" placeholder="xxx-xxx-xxxx ">
                                            </div>
                                        </div>

                                        <div class="col-md-2 input-label">
                                            <div class="form-group">
                                                <label for="agn_email">Email </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group" style="margin-right: 10%;">
                                                <div class="input-group-prepend ">
                                                    <span class="input-group-text "><i class="fas fa-envelope"></i></span>
                                                </div>
                                                <input type="email" class="form-control" id="agn_email" name="agn_email" placeholder="example@gmail.com">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <input type="button" class="ui button" value="Cancel" onclick="window.history.back();">
                                <button type="submit" class="ui positive button pull-right">
                                    <i class="plus icon"></i>
                                    Add agent
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </>
    </div>
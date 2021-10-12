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
                    <a href="<?php echo base_url() . '/Agent_show/agent_show_ajax'?>">Agent information</a>
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

                                        <?php echo show_agent_form(); ?>
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
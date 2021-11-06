<!--
* v_agent_edit
* edit agent information
* @input -
* @output edit agent information
* @author
* @Create Date
 -->
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
                                <?php
                                    $page = 'agent_edit';
                                    require_once dirname(__FILE__) . '/form/agent_edit_form.php';
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

<!--
* v_container_show_information
* Display container detail page
* @input    container information
* @output   container detail page
* @author   Preechaya
* @Create Date  2564-08-12
*/
-->

<style>
.cl-blue {
    color: #1244B9 !important;
}
</style>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-inner">
                <div class="pl-4 mt-4 page-header mb-0">
                    <h4 class="pl-3 page-title">CONTAINER DETAILS</h4>
                    <div class="card-action ml-auto mr-4">
                        <a class="ui yellow button"
                            href="<?php echo base_url() . '/Container_edit/container_edit/' . $obj_container->con_id ?>">
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
                        <a href="<?php echo base_url() . '/Dashboard/dashboard_show' ?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a class="cl-blue"
                            href="<?php echo base_url() . '/Container_show/container_show_ajax' ?>">Container
                            information</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Container details</a>
                    </li>
                </ul>
            </div>

            <form>
                <div class="row mx-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Container Information</div>
                            </div>

                            <div class="card-body container pr-5 pl-5 pt-3 pb-3" style="max-width: 1400px">
                                <?php
                                require_once dirname(__FILE__) . '/card/container_card.php';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form>
                <div class="row mx-5 mt-0">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Agent Information</div>
                            </div>

                            <div class="card-body">
                                <?php
                                require_once dirname(__FILE__) . '/card/agent_card.php';
                                ?>
                            </div>
                        </div>
                        <!-- </form> -->
                    </div>
                </div>
            </form>

            <div class="ui modal">
                <i class="close icon"></i>
                <div class="header">
                    Remove Container ?
                </div>
                <div class="content">
                    <form action="<?php echo base_url() . '/Container_show/container_delete' ?>" method="post">
                        <input type="hidden" id="agn_id" name="agn_id" value="<?php echo $obj_container->con_id ?>">
                        <p style=" font-size: 1rem">Are you sure to remove the agent</p>
                        <div class="ui info message">
                            <div class="header">
                                What happening after remove the agent
                            </div>
                            <ul class="list">
                                <li>The Agent still ramain in database,</li>
                                <li>But you cannot see the agent anymore</li>
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

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
                    <h4 class="pl-3 page-title">CONTAINER DETAIL</h4>
                    <div class="card-action ml-auto mr-4">
                        <a class="ui yellow button"
                            href="<?php echo base_url() . '/Container_edit/container_edit/' . $arr_container[0]->con_id ?>">
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
                        <a href="#">Container detail</a>
                    </li>
                </ul>
            </div>

            <form>
                <div class="row mx-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Container</div>
                            </div>

                            <div class="card-body" id="car_section">
                                <div class="row px-5">


                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Container number:</label>
                                            <div class="col-6 col-sm-7">
                                                <p id="con_number"><?php echo $arr_container[0]->con_number ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Container size:</label>
                                            <div class="col-6 col-sm-7">
                                                <p> <?php echo $arr_size[0]->size_name ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Container type:</label>
                                            <div class="col-6 col-sm-7">
                                                <p><?php for ($i = 0; $i < count($arr_container_type); $i++) { ?>
                                                    <?php if ($arr_container[0]->con_cont_id == $arr_container_type[$i]->cont_id) {
                                                            echo $arr_container_type[$i]->cont_name;
                                                        } ?>
                                                    <?php } ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Height (m):</label>
                                            <div class="col-6 col-sm-7">
                                                <p><?php echo $arr_size[0]->size_height_out ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Container status:</label>
                                            <div class="col-6 col-sm-7">
                                                <p> <?php for ($i = 0; $i < count($arr_status_container); $i++) { ?>
                                                    <?php if ($arr_container[0]->con_stac_id == $arr_status_container[$i]->stac_id) {
                                                            echo $arr_status_container[$i]->stac_name;
                                                        } ?>
                                                    <?php } ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto pull-right">Width (m):</label>
                                            <div class="col-6 col-sm-7">
                                                <p><?php echo $arr_size[0]->size_width_out ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Max weight (t):</label>
                                            <div class="col-6 col-sm-7">
                                                <p><?php echo $arr_container[0]->con_max_weight ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Length (m):</label>
                                            <div class="col-6 col-sm-7">
                                                <p><?php echo $arr_size[0]->size_length_out ?></p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Tare weight (t):</label>
                                            <div class="col-6 col-sm-7">
                                                <p><?php echo $arr_container[0]->con_tare_weight ?></p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-7">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Max weight (t):</label>
                                            <div class="col-2 col-sm-8">
                                                <p><?php echo $arr_container[0]->con_net_weight ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Current weight (t):</label>
                                            <div class="col-2 col-sm-8">
                                                <p><?php echo $arr_container[0]->con_net_weight ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Cube (CBM):</label>
                                            <div class="col-1 col-sm-8">
                                                <p><?php echo $arr_container[0]->con_cube ?></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
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
                                <div class="card-title">Agent</div>
                            </div>

                            <div class="card-body">
                                <div class="row px-5">
                                    <div class="col-md-6 col-lg-6">
                                        <!-- Company name -->

                                        <div class="form-group form-inline">
                                            <label for="agn_company_name" class="col-form-label mr-auto">Company name
                                                :</label>
                                            <div class="col-md-8 p-0" id="agn_company_name" name="agn_company_name">
                                                <?php echo $arr_agent[0]->agn_company_name ?>
                                            </div>
                                        </div>


                                        <!-- Company location -->

                                        <div class="form-group form-inline">
                                            <label for="agn_address" class="col-form-label mr-auto">Company location
                                                :</label>
                                            <div class="col-md-12 p-0 pt-2" id="agn_address" name="agn_address">
                                                <?php echo $arr_agent[0]->agn_address ?>
                                            </div>
                                        </div>


                                        <!-- Tax number -->

                                        <div class="form-group form-inline">
                                            <label for="agn_tax" class="col-form-label mr-auto">Tax number
                                                :</label>
                                            <div class="col-md-8 p-0" id="agn_tax" name="agn_tax">
                                                <?php echo $arr_agent[0]->agn_tax ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-lg-6">
                                        <!-- Responsible person -->

                                        <div class="form-group form-inline">
                                            <label for="car_number" class="col-form-label mr-auto">Responsible person
                                                (Representative)</label>
                                        </div>




                                        <!-- First Name -->

                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">First name
                                                :</label>
                                            <div class="col-md-8 p-0" id="agn_firstname" name="agn_firstname">
                                                <?php echo $arr_agent[0]->agn_firstname ?>
                                            </div>
                                        </div>

                                        <!-- Last Name -->

                                        <div class="form-group form-inline">
                                            <label class="col-form-label mr-auto">Last name
                                                :</label>
                                            <div class="col-md-8 p-0" id="agn_lastname" name="agn_lastname">
                                                <?php echo $arr_agent[0]->agn_lastname ?>
                                            </div>
                                        </div>


                                        <!-- Contact number -->

                                        <div class="form-group form-inline">
                                            <label for="agn_tel" class="col-form-label mr-auto">Contact number :</label>
                                            <div class="col-md-8 p-0" id="agn_tel" name="agn_tel">
                                                <?php echo tel_format($arr_agent[0]->agn_tel) ?>
                                            </div>
                                        </div>


                                        <!-- Email -->

                                        <div class="form-group form-inline">
                                            <label for="agn_email" class="col-form-label mr-auto">Email :</label>
                                            <div class="col-md-8 p-0" id="agn_email" name="agn_email">
                                                <?php echo $arr_agent[0]->agn_email ?>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- <div class="card-action" id="car_action" style>
                                <input type="button" class="ui blue button" value="Back" onclick="window.history.back();" style="background-color : #6789B6">
                                <button type="submit" class="ui orange button pull-right">
                                    Confirm
                                </button>
                            </div> -->
                                </div>
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
                        <input type="hidden" id="agn_id" name="agn_id" value="<?php echo $arr_container[0]->con_id ?>">
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

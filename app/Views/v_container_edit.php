<!--
* v_container_edit
* Display container edit page
* @input    container information
* @output   container edit page
* @author   Wirat
* @Create Date  2564-08-06
*/
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
                    <h4 class="pl-3 page-title">EDIT CONTAINER</h4>
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
                        <a class="cl-blue"
                            href="<?php echo base_url() . '/Container_show/container_detail/' . $arr_container[0]->con_id ?>">Container
                            details</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit container</a>
                    </li>

                </ul>
            </div>
            <form id="container_form" action="<?php echo base_url() . '/Container_edit/container_update' ?>" method="POST">
                <div class="row mx-5 mt-0">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Container Information</div>
                            </div>

                            <div class="card-body">
                                <?php
                                $page = 'container_edit';
                                require_once dirname(__FILE__) . '/form/container_edit_form.php' ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end container form -->
                <div class="row mx-5 mt-0" id="agent_section">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Agent information</div>
                                </div>

                                <div class="card-body">
                                    <?php
                                    $page = 'container_edit';
                                    require_once dirname(__FILE__) . '/form/agent_edit_form.php';
                                    ?>
                                </div>
                        </div>
                        <div class="card-action" id="car_action">
                            <input type="button" class="ui button" value="Cancle" onclick="window.history.back();">
                            <button type="submit" class="ui orange button pull-right">
                                Confirm
                            </button>
                        </div>

                    </div>
                </div>
            </form>


            <script>
            <!--
            /*
            * get_size_information
            * get size information when select size option
            * @input    con_size_id
            * @output   get size information when select size option
            * @author   Worarat
            * @Create Date  2564-10-17
            */
            -->
            function get_size_information() {
                let size_id = $('select[name="con_size_id"]').val();
                $.ajax({
                    url: '<?php echo base_url() . '/Size_show/get_size_ajax' ?>',
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        size_id: size_id
                    },
                    success: function(data) {
                        show_size_information(data[0]['size_height_out'], data[0]['size_width_out'],
                            data[0]
                            ['size_length_out']);
                    }
                });
            }

            <!--
            /*
            * show_size_information
            * show size information when select size option
            * @input    size_height_out, size_width_out, size_length_out
            * @output   get show information when select size option
            * @author   Worarat
            * @Create Date  2564-10-17
            */
            -->
            function show_size_information(size_height_out, size_width_out, size_length_out) {
                console.log(size_height_out);
                $('input[name="size_height_out"]').val(size_height_out);
                $('input[name="size_width_out"]').val(size_width_out);
                $('input[name="size_length_out"]').val(size_length_out);
            }

            <!--
            /*
            * get_agent_information
            * get agent information when select agent option
            * @input    agn_id
            * @output   get agent information when select agent option
            * @author   Worarat
            * @Create Date  2564-10-17
            */
            -->
            function get_agent_information() {
                // $('#agent_section label.error').remove();
                // remove_form_attr('readonly', '#agent_section');
                let agn_id = $('#agent_section input[name="agn_id"]').val();
                console.log(agn_id);

                if (agn_id != '' && agn_id != 'new') {
                    $('input[name="agn_company_name"]').prop('hidden', true);
                    $.ajax({
                        url: '<?php echo base_url() . '/Agent_show/get_agent_ajax' ?>',
                        method: 'POST',
                        dataType: 'JSON',
                        data: {
                            agn_id: agn_id
                        },
                        success: function(data) {
                            show_agent_information(data);
                            valid_agent_error();
                        }
                    });
                }
                if (agn_id == "new") {
                    $('input[name="agn_company_name"]').prop('hidden', false);
                    clear_agent_information();
                    valid_agent_error();
                }
            }

            <!--
            /*
            * valid_agent_error
            * valid agent form input and select
            * @input    -
            * @output   valid agent form input and select
            * @author   Worarat
            * @Create Date  2564-10-17
            */
            -->
            function valid_agent_error() {
                $('#agent_section input.error').removeClass('error');
                $('#agent_section textarea.error').removeClass('error');
            }

            <!--
            /*
            * show_agent_information
            * show agnet information in agent section form
            * @input    agent information
            * @output   show agnet information in agent section form
            * @author   Worarat
            * @Create Date  2564-10-17
            */
            -->
            function show_agent_information(agent) {
                $('textarea[name="agn_address"]').val(agent[0]['agn_address']);
                $('input[name="agn_tax"]').val(agent[0]['agn_tax']);
                $('input[name="agn_firstname"]').val(agent[0]['agn_firstname']);
                $('input[name="agn_lastname"]').val(agent[0]['agn_lastname']);
                $('input[name="agn_tel"]').val(agent[0]['agn_tel']);
                $('input[name="agn_email"]').val(agent[0]['agn_email']);
            }

            <!--
            /*
            * clear_agent_information
            * clear input in agent section form
            * @input    -
            * @output   clear input in agent section form
            * @author   Worarat
            * @Create Date  2564-10-17
            */
            -->
            function clear_agent_information() {
                $('input[name="agn_company_name"]').val('');
                $('textarea[name="agn_address"]').val('');
                $('input[name="agn_tax"]').val('');
                $('input[name="agn_firstname"]').val('');
                $('input[name="agn_lastname"]').val('');
                $('input[name="agn_tel"]').val('');
                $('input[name="agn_email"]').val('');
            }

            <!--
            /*
            * remove_error
            * remove error class in form
            * @input    tag, name
            * @output   remove error class in form
            * @author   Worarat
            * @Create Date  2564-10-17
            */
            -->
            function remove_error(tag, name) {
                $(tag + '[name="' + name + '"]').removeClass('error');
                $(tag + '[name="' + name + '"]+label').html('');
            }

            <!--
            /*
            * remove_form_attr
            * remove readonly in input when select dropdown
            * @input    attr, target
            * @output   remove readonly in input when select dropdown
            * @author   Worarat
            * @Create Date  2564-10-17
            */
            -->
            function remove_form_attr(attr, target) {
                $(target + ' *[readonly]').removeAttr(attr);
            }
            </script>
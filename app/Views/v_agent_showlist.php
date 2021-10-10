<style>
th{
  color: white;
  background: rgb(153, 153, 153);
}
table {
  border-collapse: collapse;
  border-radius: 1em;
  overflow: hidden;
}
hr {
  border-top: 1px solid #041F47;
}
.hiddenli {
 list-style-type: none;
 color: black;
}
</style>

<div class="ui modal">
    <i class="close icon"></i>
    <div class="header">
        Remove Agent ?
    </div>
    <div class="content">
        <form action="<?php echo base_url() . '/Agent_show/agent_delete' ?>" method="post">
            <input type="hidden" id="cus_id" name="cus_id">

            <p style="font-size: 1rem">Are you sure to remove the Agent</p>

            <div class="ui info message">
                <div class="header">
                    What happening after remove the Agent
                </div>
                <ul class="list">
                    <li>The Agent still ramain in database,</li>
                    <li>But you cannot see the Agent anymore</li>
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
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="pl-4 mt-4 page-header mb-0">
                <h4 class="pl-3 page-title">AGENT INFORMATION</h4>
            </div>
            <hr width="95%" color="696969">
            <ul class="pl-2 breadcrumbs">
                <li class="nav-home">
                    <a href="<?php echo base_url() . '/Dashboard/dashboard_show'?>">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/Agent_show/agent_show_ajax'?>">Agent</a>
                </li>
            </ul>



            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                            <table id="Agent_list_table" class="display table table-hover cell-border"
                                    style="border-collapse: collapse !important">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th class="text-center">Company</th>
                                            <th class="text-center">Responsible person</th>
                                            <th class="text-center">Number container</th>
                                            <th class="text-center">Tel.</th>
                                            <th class="text-center">Email</th>
                                            <th > </th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php for ($i = 0; $i < count($arr_agent); $i++) { ?>
                                        <tr>
                                            <!-- No. -->
                                            <td onclick="agent_detail(<?php echo $arr_agent[$i]->agn_id ?>)">
                                                <?php echo $arr_agent[$i]->agn_id; ?>
                                            </td>
                                            <!-- Agent company name -->
                                            <td onclick="agent_detail(<?php echo $arr_agent[$i]->agn_id ?>)">
                                                <?php echo $arr_agent[$i]->agn_company_name; ?>
                                            </td>

                                            <!-- Agent Name -->
                                            <td onclick="agent_detail(<?php echo $arr_agent[$i]->agn_id ?>)">
                                                <?php echo $arr_agent[$i]->agn_firstname . " " . $arr_agent[$i]->agn_lastname; ?>
                                            </td>

                                            <!-- Number Container -->
                                            <td class="text-center" onclick="agent_detail(<?php echo $arr_agent[$i]->agn_id ?>)">
                                                <?php
                                                    $count_container = array_count_values(array_column($arr_container, 'agn_company_name'))[$arr_agent[$i]->agn_company_name];
                                                    echo ($count_container != 0) ? $count_container : '0';
                                                ?>
                                            </td>

                                            <!-- Agent Tel. -->
                                            <td onclick="agent_detail(<?php echo $arr_agent[$i]->agn_id ?>)">
                                                <?php echo tel_format($arr_agent[$i]->agn_tel) ?>
                                            </td>

                                            <!-- Agent Email -->
                                            <td onclick="agent_detail(<?php echo $arr_agent[$i]->agn_id ?>)">
                                                <?php echo $arr_agent[$i]->agn_email ?>
                                            </td>

                                            <!-- Agent Action  -->
                                            <script>
                                            function show_agent_menu(agn_id) {
                                                $('.menu').css('display', 'none');
                                                $('.menu.agn_id_' + agn_id).show();
                                            } // make it dropdown
                                            $(document).click(function() {
                                                var container = $(".menu");
                                                if (!container.is(event.target) && !container.has(event.target)
                                                    .length) {
                                                    container.hide();
                                                }
                                            });
                                            </script>
                                            <td class="text-center">
                                                <div class="ui dropdown"
                                                    onclick="show_agent_menu(<?php echo $arr_agent[$i]->agn_id ?>)">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                    <div class="menu agn_id_<?php echo $arr_agent[$i]->agn_id ?>" style="right: 0;left: auto;">
                                                        <!-- Agent Edite  -->
                                                        <div class="item" onclick="location.href='<?php echo base_url() . '/Agent_edit/agent_edit/' . $arr_agent[$i]->agn_id ?>';">
                                                            <i class='far fa-edit' style="font-size: 130%;">  </i> &nbsp;
                                                            Edit 
                                                        </div>
                                                        <!-- Agent Delete  -->
                                                        <div class="item test button"
                                                            onclick="get_id(<?php echo $arr_agent[$i]->agn_id?>)">
                                                            <i class='fas fa-trash-alt' style="font-size: 130%;"></i> &nbsp; &nbsp;
                                                            Remove
                                                        </div>
                                                        <script>
                                                        $('.ui.modal').modal('attach events', '.test.button', 'toggle');
                                                        </script>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script>
    $(document).ready(function() {

        // แทรกปุ่ม เพิ่มลูกค้า
        var cus_table = $('#Agent_list_table').DataTable({
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": [0,6]
            } ],
            "order": []
        });
        //ลำดับ
        cus_table.on( 'order.dt search.dt', function () {
            cus_table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1+'.';
            } );
        } ).draw();
        $("#Agent_list_table_filter").append(
            "<a class='ui labeled icon primary button m-2' href='<?php echo base_url() . '/Agent_input/agent_input' ?>'><i class='left plus icon'></i>Add</a>"
        );
    });
    function get_id(agn_id) {
        $('#agn_id').val(agn_id);
    }
    //ดูข้อมูลเอเย่นต์
    function agent_detail(agn_id) {
        window.location = '<?php echo base_url('') . '/Agent_show/agent_detail/' ?>' + agn_id;
    }
</script>
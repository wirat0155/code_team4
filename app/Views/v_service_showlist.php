<!--
* v_service_showlist
* Display service list page
* @input    array of service
* @output   service list page
* @author   Natdanai
* @Create Date  2564-07-28
*/
-->


<style>

.monthselect, .yearselect{
    border-radius: 5px;
    border: 1px solid rgba(34,36,38,.15);
}

#bill_modal {
    min-height: 50% !important;
    max-height: 100% !important;
    height: 500px !important;
}

.bill_actions {
    bottom: 0 !important;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {

    margin-left: 10px !important;
    opacity: 1;

}

.total .title {
    font-weight: bold !important;
}

#vat {
    width: 80px !important;
}

.modal.modal_cost{
    overflow: visible !important;
}

.modal_cost .content{
    max-height: 120% !important;
    overflow-x:hidden !important;
}

.icon.btn_cost{
    font-weight: normal !important;
    color: #c7c7c7;
}

.field .label_res {
    display: none !important;
}

.field input[type="number"]::placeholder, .field input[type="number"] {
    margin-right: 20px !important;
    text-align: right;  
}

.cost_vat input[type="checkbox"]{
    margin: 10px !important; 
    width: 20px !important;
    height: 20px !important;
}

.float-right.col-6{
    padding-right: 40px !important;
}

.float-right.col-6 .row .col-6 {
        font-weight: bold;
        font-size: 20px;
        padding-right: 0 !important;
        padding-left: 0 !important;
    }

.cost_vat label{
    padding-left: 7px !important;
}

.transparent{
    width: 150px;
    padding: 8.680px 14px;
    border-radius: 0.28571429rem;
    border: 1px solid rgba(34,36,38,.15);
}

.cheque_no{
    width: 150px !important;
}

.input_due, .input_cheque{
        width: 40%;
}

.input_due label, .input_cheque label {
    font-weight: bold;
    padding: 10px 0px;
}

.modal_cost {
    position: absolute !important;
    justify-content: center !important;
    align-items: center !important;
}

@media only screen and (max-width: 768px) {

    .cost_vat{
        width: 90px;
        display: block !important;
    }

    .cost_vat label {
        float: right !important;
    }

    .fields.cost{
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        margin: 20px !important;
        padding: 20px 20px 30px;
        border-radius: 10px !important;
    }

    .fields.cost .btn-danger{
        position: absolute;
        right: 6%;
    }

    .field input[type="number"]::placeholder, .field input[type="number"] {
        margin-right: 0px !important;
        text-align: left;
    }

    .btn-icon.btn-round.btn-danger{
        margin-top: 0 !important;
    }

    .field .label_res{
        display: block !important;
    }
    .field label {
        margin-top: 10px !important;
    }
    .float-right.col-6 {
        max-width: 100%;
        padding-right: 0 !important;
    }
    .col-6.price {
        max-width: 60%;
    }
    .col-6.title {
        max-width: 40%;
        padding-left: 0 !important;
    }
    .float-right.col-6 .row .col-6 {
        font-size: 15px;
        padding-right: 0 !important;
    }

    .ui.form .fields.cost {
        flex-direction: column !important;
    }

    .field {
        max-width: 100%;
    }

    .label_vat {
        margin-left: 5%;
        padding-left: 0 !important;
    }

    .float-right.col-6{
        padding-left: 10%;
    }

    .input_due, .input_cheque{
        margin: 10px 0px;
        width: 100%;
    }

    .inline.fields.mt-4{
        margin-bottom: 0 !important;
    }
}
</style>

<div class="ui modal modal_cost">
    <div class="header">
        
        Calculate cost
        <i class="close icon btn_cost mt-1 mr-0"></i>
        
    </div>
    <div class="scrolling content">
    <div class="ui form">
        <div class="cost_input_list mt-2">

        </div>

        <div class="add bill col-md-10 ml-auto mr-auto mt-4" align="center">
            <a class="col-md-2" onclick="checkbox_checkall()" style="text-decoration: underline; cursor: pointer; float: left" align="left">Check all</a>
            <button class="ui primary button col-md-5" onclick="add_cost_input()" style="width: 205px !important"><i class='left plus icon'></i>Add cost</button>
        </div>

        <div class="inline fields mt-4">
                <label class="mr-3 label_vat" style="margin-left: 10%;">VAT</label>
                <input type="number" size="1" id="vat" value="7" onchange="cal_total_cost()" style="margin-right: 10%;">
                <div  class="inline input_due">
                    <label class="mr-3" style="margin-left: 10%;" class="input_due">Due date</label>
                    <div class="ui transparent left icon input">
                        <input type="text" name="due_date" class="due_date" value="" onchange="ser_update()">
                        <i class="calendar outline icon ml-2"></i>
                    </div>
                </div>
        </div>
        
        <div class="inline fields mt-0">
                <label class="label_vat" style="margin-left: 10%; padding: 0px !important">Pay by</label>
                <div class="ui form">
                    <div class="field">
                        <select name="pay_by" onchange="ser_update()">
                            <option value="1">Cash</option>
                            <option value="2">Transfer</option>
                            <option value="3">Cashier cheque</option>
                        </select>
                    </div>
                </div>
        </div>

        <div class="float-left input_cheque mt-0" style="margin-left: 10%; padding: 0px !important" hidden>
                    <div class="inline fields">
                        <label class="label_vat">Choose Bank</label>
                        <div class="ui form">
                            <div class="field">
                                <select name="bank" class="bank" onchange="ser_update()" style="width: 150px">
                                    <option value="0"> Please Choose </option>
                                    <?php for($i = 0; $i < count($arr_bank); $i++){ ?>
                                        <option value="<?php echo $arr_bank[$i]->bnk_id ?>"> <?php echo $arr_bank[$i]->bnk_name ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="inline">
                    <label class="mr-3 mb-3" class="input_cheque">Cheque no.</label>
                    <input type="text" placeholder="Cheque" name="cheque_no" class="cheque_no" onchange="ser_update()">
                    </div>
        </div>

        <div class="float-right col-6">
            <div class="subtotal row" hidden>
                <div class="title col-6">Subtotal :</div>
                <div class="price col-6 text-right">0 THB</div>
            </div>

            <div class="vat row" hidden>
                <div class="title col-6">VAT 7% : </div>
                <div class="price col-6 text-right">0 THB</div>
            </div>

            <div class="total row mb-3">
                <div class="title col-6">Total : </div>
                <div class="price col-6 text-right">0 THB</div>
            </div>
        </div>
    </div>

    </div>
    <div class="actions">
        <button type="button" class="shadow-sm btn btn-success btn-border" onclick="print_cost()">
            <i class="fas fa-print mr-2"></i>
            Print invoice 
        </button>
    </div>
</div>

<div class="ui modal modal_remove">
    <i class="close icon"></i>
    <div class="header">
        Remove service ?
    </div>
    <div class="content">
        <form action="<?php echo base_url() . '/Service_show/service_delete' ?>" method="post">
            <input type="hidden" id="ser_id" name="ser_id">

            <p style="font-size: 1rem">Are you sure to remove the service</p>

            <div class="ui info message">
                <div class="header">
                    What happening after remove the service
                </div>
                <ul class="list">
                    <li>The service still ramain in database,</li>
                    <li>But you cannot see the service anymore</li>
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
            <div class="page-header">
                <h4 class="pl-3 page-title">SERVICE INFORMATION</h4>
            </div>
            <hr width="95%" color="696969">
            <div class="row">
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
                        <a href="<?php echo base_url() . '/Service_show/service_show_ajax' ?>">Service</a>
                    </li>
                </ul>

                <!-- Download Excel -->
                <form id='form_Excel' action="<?php echo base_url() . '/Service_show/export_service' ?>" method="POST"
                    hidden>
                    <input type="hidden" name="date_range_excel" id="date_range_excel"
                        value="<?php echo $arrivals_date ?>">
                </form>
                <form id='form_date' action="<?php echo base_url() . '/Service_show/service_show_ajax' ?>" method="GET"
                    class="ml-auto mr-3 text-right">

                    <button type="submit" form="form_Excel" class="shadow-sm btn btn-success btn-border"
                        style=" height: 40px; width: 160px; margin-bottom: 5">
                        <i class="fas fa-file-download mr-1"></i>
                        Download Excel
                    </button>

                    <!-- Date -->
                    <input class="pl-2 shadow-sm rounded" type="text" name="date_range" id="date_range" value="<?php echo $arrivals_date ?>" style=" height: 43px; width: 180px; text-align: center;">
                </form>
            </div>
            <!-- Card Report -->
            <div id="carouselExampleIndicators" class="carousel slide mt-3" data-ride="carousel">
                <ol class="carousel-indicators" style="margin-bottom: -5px">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="row justify-content-center align-items-center col-md-10 ml-auto mr-auto">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-sm-6 col-md-3">
                                    <div class="card ">
                                        <div class="card-body pb-0 ">
                                            <div class="h3">IMPORT
                                                <span class="circle-import float-right"><img
                                                        src="<?php echo base_url() . '/upload/cargo_1.png' ?>"></span>
                                            </div>
                                            <h2 class="mt-0 ml-3">
                                                <?php echo $num_import ?>
                                            </h2>

                                            <div class="mb-3">
                                                <?php if (!$_SESSION['set_date_picker_service']) { ?>
                                                    <?php if ($num_import >= $num_yesterday_import):?>
                                                    <p style="color: #09F600;">
                                                        <i class="fas fa-arrow-up"></i>
                                                        <?php echo "(+" . ($num_import - $num_yesterday_import) . ")"; ?>
                                                        <label class="ml-3"> From yesterday</label>
                                                    </p>
                                                    <?php endif;?>

                                                    <?php if ($num_import < $num_yesterday_import):?>
                                                    <p style="color: #F60029;">
                                                        <i class="fas fa-arrow-down"></i>
                                                        <?php echo "(" . ($num_import - $num_yesterday_import) . ")"; ?>
                                                        <label class="ml-3"> From yesterday</label>
                                                    </p>
                                                    <?php endif;?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="card ">
                                        <div class="card-body pb-0 ">
                                            <div class="h3">DROP
                                                <span class="circle-drop float-right"><img
                                                        src="<?php echo base_url() . '/upload/container_2.png' ?>"></span>
                                            </div>
                                            <h2 class="mt-0 ml-3">
                                                <?php echo $num_drop; ?>
                                            </h2>

                                            <div class="mb-3">
                                                <?php if (!$_SESSION['set_date_picker_service']) { ?>
                                                    <?php if ($num_drop >=  $num_yesterday_drop) { ?>
                                                    <p class="mb-3" style="color: #09F600;">
                                                        <i class="fas fa-arrow-up"></i>
                                                        <?php echo "(+" . ($num_drop - $num_yesterday_drop) . ")"; ?>
                                                        <label class="ml-3"> From yesterday</label>
                                                    </p>
                                                    <?php } else { ?>
                                                    <p class="mb-3" style="color: #F60029;">
                                                        <i class="fas fa-arrow-down"></i>
                                                        <?php echo "(" . ($num_drop - $num_yesterday_drop) . ")"; ?>
                                                        <label class="ml-3"> From yesterday</label>
                                                    </p>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="card ">
                                        <div class="card-body pb-0 ">
                                            <div class="h3">EXPORT
                                                <span class="circle-export float-right"><img
                                                        src="<?php echo base_url() . '/upload/bg-export.png' ?>"></span>
                                            </div>
                                            <h2 class="mt-0 ml-3">
                                                <?php echo $num_export?>
                                            </h2>

                                            <div class="mb-3">
                                                <?php if (!$_SESSION['set_date_picker_service']) { ?>
                                                    <?php if ($num_export >= $num_yesterday_export) { ?>
                                                    <p class="mb-3" style="color: #09F600;">
                                                        <i class="fas fa-arrow-up"></i>
                                                        <?php echo "(+" . ($num_export - $num_yesterday_export) . ")"; ?>
                                                        <label class="ml-3"> From yesterday</label>
                                                    </p>
                                                    <?php } else { ?>
                                                    <p class="mb-3" style="color: #F60029;">
                                                        <i class="fas fa-arrow-down"></i>
                                                        <?php echo "( " . ($num_export - $num_yesterday_export) . ")"; ?>
                                                        <label class="ml-3"> From yesterday</label>
                                                    </p>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="card ">
                                        <div class="card-body pb-0 ">
                                            <div class="h3">TOTAL SERVICE
                                                <span class="circle-total float-right"><img
                                                        src="<?php echo base_url() . '/upload/infinite.png' ?>"></span>
                                            </div>
                                            <h2 class="mt-0 ml-3">
                                                <?php
                                                $num_all = count($arr_service);
                                                echo $num_all;
                                                ?>
                                            </h2>

                                            <div class="mb-3">
                                                <?php if (!$_SESSION['set_date_picker_service']) { ?>
                                                    <?php if ($num_all >= $num_yesterday_all) { ?>
                                                    <p class="mb-3" style="color: #09F600;">
                                                        <i class="fas fa-arrow-up"></i>
                                                        <?php echo "(+" . ($num_all - $num_yesterday_all) . ")"; ?>
                                                        <label class="ml-3"> From yesterday</label>
                                                    </p>
                                                    <?php } else { ?>
                                                    <p class="mb-3" style="color: #F60029;">
                                                        <i class="fas fa-arrow-down"></i>
                                                        <?php echo "(" . ($num_all - $num_yesterday_all) . ")"; ?>
                                                        <label class="ml-3"> From yesterday</label>
                                                    </p>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-4">
                                    <div class="card ">
                                        <div class="card-body pb-0 ">
                                            <div class="h3">DRY CONTAINER
                                                <span class="float-right"><img
                                                        src="<?php echo base_url() . '/upload/DryContainer-removebg-preview.png' ?>"></span>
                                            </div>
                                            <h2 class="mt-0 ml-3">
                                                <?php
                                                $num_cont_dry = 0;
                                                for ($i = 0; $i < count($arr_service); $i++) {
                                                    if ($arr_service[$i]->con_cont_id == 1) {
                                                        $num_cont_dry++;
                                                    }
                                                }
                                                echo $num_cont_dry;
                                                ?>
                                            </h2>
                                            <p class="mb-3" style="color: #09F600;">
                                                <?php
                                                if ($num_all == 0) {
                                                    $num_all = 1;
                                                }
                                                $percent_cont_dry = ($num_cont_dry / $num_all) * 100;
                                                echo number_format($percent_cont_dry, 2, '.', '') . '%';
                                                ?>
                                                <label class="ml-3"> From all container</label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card ">
                                        <div class="card-body pb-0 ">
                                            <div class="h3">REEFER CONTAINER
                                                <span class="float-right"><img
                                                        src="<?php echo base_url() . '/upload/ReeferContainer-removebg-preview.png' ?>"></span>
                                            </div>
                                            <h2 class="mt-0 ml-3">
                                                <?php
                                                $num_cont_reefer = 0;
                                                for ($i = 0; $i < count($arr_service); $i++) {
                                                    if ($arr_service[$i]->con_cont_id == 2) {
                                                        $num_cont_reefer++;
                                                    }
                                                }
                                                echo $num_cont_reefer;
                                                ?>
                                            </h2>
                                            <p class="mb-3" style="color: #09F600;">
                                                <?php
                                                $percent_cont_reefer = ($num_cont_reefer / $num_all) * 100;
                                                echo number_format($percent_cont_reefer, 2, '.', '') . '%';
                                                ?>
                                                <label class="ml-3"> From all container</label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card ">
                                        <div class="card-body pb-0 ">
                                            <div class="h3">OPEN TOP CON.
                                                <span class="float-right"><img
                                                        src="<?php echo base_url() . '/upload/shutterstock_341887898-1-removebg-preview.png' ?>"></span>
                                            </div>
                                            <h2 class="mt-0 ml-3">
                                                <?php
                                                $num_cont_open_top = 0;
                                                for ($i = 0; $i < count($arr_service); $i++) {
                                                    if ($arr_service[$i]->con_cont_id == 3) {
                                                        $num_cont_open_top++;
                                                    }
                                                }
                                                echo $num_cont_open_top;
                                                ?>
                                            </h2>
                                            <p class="mb-3" style="color: #09F600;">
                                                <?php
                                                $percent_cont_open_top = ($num_cont_open_top / $num_all) * 100;
                                                echo number_format($percent_cont_open_top, 2, '.', '') . '%';
                                                ?>
                                                <label class="ml-3"> From all container</label>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-4">
                                    <div class="card ">
                                        <div class="card-body pb-0 ">
                                            <div class="h3">FLAT-RACK CON.
                                                <span class="float-right"><img
                                                        src="<?php echo base_url() . '/upload/shutterstock_359338868-removebg-preview.png' ?>"></span>
                                            </div>
                                            <h2 class="mt-0 ml-3">
                                                <?php
                                                $num_cont_flat_rack = 0;
                                                for ($i = 0; $i < count($arr_service); $i++) {
                                                    if ($arr_service[$i]->con_cont_id == 4) {
                                                        $num_cont_flat_rack++;
                                                    }
                                                }
                                                echo $num_cont_flat_rack;
                                                ?>
                                            </h2>
                                            <p class="mb-3" style="color: #09F600;">
                                                <?php
                                                $percent_cont_flat_rack = ($num_cont_flat_rack / $num_all) * 100;
                                                echo number_format($percent_cont_flat_rack, 2, '.', '') . '%';
                                                ?>
                                                <label class="ml-3"> From all container</label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card ">
                                        <div class="card-body pb-0 ">
                                            <div class="h3">ISO TANK CON.
                                                <span class="float-right"><img
                                                        src="<?php echo base_url() . '/upload/ISOTank-removebg-preview.png' ?>"></span>
                                            </div>
                                            <h2 class="mt-0 ml-3">
                                                <?php
                                                $num_cont_tank = 0;
                                                for ($i = 0; $i < count($arr_service); $i++) {
                                                    if ($arr_service[$i]->con_cont_id == 5) {
                                                        $num_cont_tank++;
                                                    }
                                                }
                                                echo $num_cont_tank;
                                                ?>
                                            </h2>
                                            <p class="mb-3" style="color: #09F600;">
                                                <?php
                                                $percent_cont_tank = ($num_cont_tank / $num_all) * 100;
                                                echo number_format($percent_cont_tank, 2, '.', '') . '%';
                                                ?>
                                                <label class="ml-3"> From all container</label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card ">
                                        <div class="card-body pb-0 ">
                                            <div class="h3">VENTILATED CON.
                                                <span class="float-right"><img
                                                        src="<?php echo base_url() . '/upload/ventilated-container-removebg-preview.png' ?>"></span>
                                            </div>
                                            <h2 class="mt-0 ml-3">
                                                <?php
                                                $num_cont_ventilated = 0;
                                                for ($i = 0; $i < count($arr_service); $i++) {
                                                    if ($arr_service[$i]->con_cont_id == 5) {
                                                        $num_cont_tank++;
                                                    }
                                                }
                                                echo $num_cont_ventilated;
                                                ?>
                                            </h2>
                                            <p class="mb-3" style="color: #09F600;">
                                                <?php
                                                $percent_cont_ventilated = ($num_cont_ventilated / $num_all) * 100;
                                                echo number_format($percent_cont_ventilated, 2, '.', '') . '%';
                                                ?>
                                                <label class="ml-3"> From all container</label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev pr-4 pb-4" href="#carouselExampleIndicators" role="button"
                    data-slide="prev">
                    <span class="big circular ui icon button basic" aria-hidden="true"
                        style="box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;"><i class="angle left icon"></i></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next pl-4 pb-4" href="#carouselExampleIndicators" role="button"
                    data-slide="next">
                    <span class="big circular ui icon button basic" aria-hidden="true"
                        style="box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;"><i
                            class="angle right icon"></i></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- table -->
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="service_list_table" class="display table table-hover cell-border"
                                    style="border-collapse: collapse !important; border-radius: 10px; overflow: hidden;">
                                    <thead>
                                        <tr style="background-color: #999; color: #fff; ">
                                            <th>No.</th>
                                            <th class="text-center">Con. number</th>
                                            <th class="text-center">Con. status</th>
                                            <th class="text-center">Con. type</th>
                                            <th class="text-center" style="width: 15%">Cut-off</th>
                                            <th class="text-center">Act. dep.</th>
                                            <th class="text-center">Agent</th>
                                            <th class="text-center">Customer</th>
                                            <th class="text-center"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php for ($i = 0; $i < count($arr_service); $i++) { ?>
                                        <tr>
                                            <!-- order -->
                                            <td> </td>

                                            <!-- Container number -->
                                            <td onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                <?php echo $arr_service[$i]->con_number;
                                                    ?>
                                            </td>

                                            <!-- Status container  -->
                                            <td onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)"
                                                class="px-4 py-3 text-sm text-center" style="min-width: 100px;">
                                                <?php
                                                    // 1 = import (sky blue)
                                                    if ($arr_service[$i]->ser_stac_id == '1') {
                                                        echo '<span class="bg-import text-white p-2" style="border-radius: 5px;">' . $arr_service[$i]->stac_name . '<span>';
                                                    }
                                                    // 4 = export (green)
                                                    else if ($arr_service[$i]->ser_stac_id == '4') {
                                                        echo '<span class="bg-export text-white p-2" style="border-radius: 5px;">' . $arr_service[$i]->stac_name . '<span>';
                                                    }
                                                    // 5 = defective 
                                                    else if ($arr_service[$i]->ser_stac_id == '5') {
                                                        echo '<span class="bg-defective text-white p-2" style="border-radius: 5px;">' . $arr_service[$i]->stac_name . '<span>';
                                                    }
                                                    // else  = drop
                                                    else {
                                                        echo '<span class="bg-drop text-white p-2" style="border-radius: 5px;">' . $arr_service[$i]->stac_name . '<span>';
                                                    }
                                                ?>
                                            </td>

                                            <!-- Container type -->
                                            <td onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                <?php echo $arr_service[$i]->cont_name ?>
                                            </td>

                                            <!-- Cut-off -->
                                            <td onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                            <?php
                                                    if ($arr_service[$i]->ser_departure_date == "0000-00-00 00:00:00" || $arr_service[$i]->ser_departure_date == NULL) {
                                                        echo "-";
                                                    } else {
                                                        echo date_thai($arr_service[$i]->ser_departure_date);
                                                    } ?>
                                            </td>
                                            <!-- Act. dep. -->
                                            <td onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                <?php
                                                    if ($arr_service[$i]->ser_actual_departure_date == "0000-00-00 00:00:00" || $arr_service[$i]->ser_actual_departure_date == NULL) {
                                                        echo "-";
                                                    } else {
                                                        echo date_thai($arr_service[$i]->ser_actual_departure_date);
                                                    } ?>
                                            </td>

                                            <!-- aegnt name -->
                                            <td onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                <?php echo $arr_service[$i]->agn_company_name ?>
                                            </td>

                                            <!-- csutomer name -->
                                            <td onclick="service_detail(<?php echo $arr_service[$i]->ser_id ?>)">
                                                <?php echo $arr_service[$i]->cus_company_name ?>
                                                <?php if ($arr_service[$i]->cus_branch != NULL && $arr_service[$i]->cus_branch != '') : ?>
                                                <?php echo ' ' . $arr_service[$i]->cus_branch ?>
                                                <?php endif; ?>
                                            </td>

                                            <!-- Action -->
                                            <script>
                                            function show_service_menu(ser_id) {
                                                $('.menu').css('display', 'none');
                                                $('.menu.ser_id_' + ser_id).show();
                                            } // make it dropdown
                                            $(document).click(function() {
                                                var container = $(".menu");
                                                if (!container.is(event.target) && !container.has(event.target)
                                                    .length) {
                                                    container.hide();
                                                }
                                            });
                                            </script>
                                            <td class="text-left" width='15px'>
                                                <div class="ui dropdown text-center p-2"
                                                    style="border: 1px solid #ddd; width: 20px; height: 20px; border-radius: 50%"
                                                    onclick="show_service_menu(<?php echo $arr_service[$i]->ser_id ?>)">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                    <div class="menu ser_id_<?php echo $arr_service[$i]->ser_id ?>"
                                                        style="right: 0;left: auto;">
                                                        <div class="item btn_cost" onclick="get_service_cost(<?php echo $arr_service[$i]->ser_id ?>)">
                                                            <i class='far fa-money-bill-alt' style="font-size: 110%;"></i> &nbsp;
                                                            Charge billing
                                                        </div>
                                                        <div class="item"
                                                            onclick="location.href='<?php echo base_url() . '/Service_edit/service_edit/' . $arr_service[$i]->ser_id ?>';">
                                                            <i class='far fa-edit' style="font-size: 130%;"> </i> &nbsp;
                                                            Edit
                                                        </div>
                                                        <div class="item test button"
                                                            onclick="get_id(<?php echo $arr_service[$i]->ser_id ?>)">
                                                            <i class='fas fa-trash-alt'
                                                                style="font-size: 130%;"></i>&nbsp; &nbsp;
                                                            Remove
                                                        </div>
                                                        <script>
                                                        $('.modal_remove').modal('attach events', '.test.button', 'toggle');
                                                        $('.modal_cost').modal('attach events', '.btn_cost', 'toggle');
                                                        modal_cost
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
        // add service button
        var ser_table = $('#service_list_table').DataTable({
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0, 8]
            }],
            "order": []
        });

        // order
        ser_table.on('order.dt search.dt', function() {
            ser_table.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1 + '.';
            });
        }).draw();

        $("#service_list_table_filter").append(

            "<a class='ui labeled icon primary button m-2' href='<?php echo base_url() . '/Service_input/service_input' ?>'><i class='left plus icon'></i>Add</a>"
        );

        // reset Daterange
        $('.cancelBtn').attr('onclick',
            'location.href = \'<?php echo base_url() . '/Service_show/service_show_ajax' ?>\'');
        $('.cancelBtn').removeClass('btn-default');

        //Date Due Date
        $('input[name="due_date"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'),10),
            "locale": {
                "format": 'DD/MM/YYYY',
                "firstDay": 1
            },
            opens: 'left',
        }, function(start, end, label) {
            var years = moment().diff(start, 'years');
        });
    });

    /*
     * get_id
     * get ser_id and show in remove service form
     * @input    section
     * @output   go to get ser_id and show in remove service form
     * @author   Natdanai
     * @Create Date  2564-07-28
     */
    function get_id(ser_id) {
        $('#ser_id').val(ser_id);
    }

    /*
     * service_detail
     * go to service detail page
     * @input    section
     * @output   go to service detail page
     * @author   Natdanai
     * @Create Date  2564-07-28
     */
    function service_detail(ser_id) {
        window.location = '<?php echo base_url('') . '/Service_show/service_detail/' ?>' + ser_id;
    }

    var number_cost_input = 1;

    function get_service_cost(ser_id) {
        console.log(ser_id);
        $.ajax({
            url: '<?php echo base_url() . '/Service_show/get_cost_ajax' ?>',
            method: 'POST',
            dataType: 'JSON',
            data: {
                ser_id: ser_id
            },
            success: function(data) {
                console.log(data);
                cost_modal(ser_id, data)
            }
        });
    }

    function cost_modal(ser_id, data) {
        $('.cost_input_list').empty();
        $('.add_cost_input').empty();

        //ค่าเริ่มต้นเมื่อเปิด Modal
        $('input[name="due_date"]').val('00/00/0000');
        $('select[name="pay_by"]').val(1);
        $('input[name="cheque_no"]').val('');
        $('select[name="bank"]').val(0);
        $(".input_cheque").attr("hidden",true);

        // ดึงค่าใช้จ่ายเดิม
        var number_cost = data.length;
        // ถ้ามี วนลูปแสดง
        console.log(number_cost);

        var modal_message = `<input name="cosd_ser_id" id="cosd_ser_id" type="hidden" value="${ser_id}">`;

        var modal_footer = ``;
        // ถ้าไม่มี สร้าง 1 รายการ
        if (number_cost == 0) {
            number_cost_input = 1;
            modal_message +=`<div class="fields cost" name="cost_input${number_cost_input}">
                                <div class="field col-1 cost_vat">
                                    <label> VAT </label>
                                    <input type="checkbox" tabindex="0" class="cosd_status_vat" name="cosd_status_vat${number_cost_input}" onchange="cost_insert(${number_cost_input})">
                                </div>
                                <div class="field col-6 cost_name">
                                    <label>Cost name</label>
                                    <input type="text" placeholder="Cost name" onchange="cost_insert(${number_cost_input})" step="0.01" name="cosd_name${number_cost_input}">
                                </div>
                                <div class="field col-3 cost_amount">
                                    <label>Amount (TH Baht)</label>
                                    <input type="number" placeholder="Amount" onchange="cost_insert(${number_cost_input})" step="0.01" name="cosd_cost${number_cost_input}" class="cosd_price">
                                </div>
                                <div class="field col-3 cost_quantity">
                                    <label>Quantity (Count) </label>
                                    <input type="number" placeholder="Quantity" value="0" class="cosd_count" onchange="cost_insert(${number_cost_input})" name="cosd_quantity${number_cost_input}">
                                </div>
                                <button type="button" class="btn btn-icon btn-round btn-danger" name="cost_delete_btn${number_cost_input}" onclick="cost_delete(${number_cost_input},'new')" style="margin-top: 25px;background: #E91414 !important; border-color: #E91414 !important;">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>`;
            $('.cost_input_list').append(modal_message);

            cal_total_cost();
        } else {
            //กำหนดตัวแปรรับ due_date ของ service ที่เลือก
            due_date = data[0]['ser_due_date'];

            if(due_date != null){
                due_date = due_date.toString();
                due_date = due_date.substring(8) + '/' + due_date.substring(7,5) + '/' + due_date.substring(0,4);

                //set ค่าใน input
                $('input[name="due_date"]').val(due_date);
            }

            $('select[name="pay_by"]').val(data[0]['ser_pay_by']);

            if(data[0]['ser_pay_by'] == 3){
                $('.input_cheque').removeAttr('hidden');
                $('input[name="cheque_no"]').val(data[0]['ser_cheque']);
                $('select[name="bank"]').val(data[0]['ser_bnk_id']);
            }else{
                $(".input_cheque").attr("hidden",true);
            }

            var vat_value = '';
            if(data[0]['cosd_status_vat'] == 1){
                vat_value = 'checked';
            }
            modal_message += `  <div class="fields cost" name="cost_input_id${data[0]['cosd_id']}">
                                    <div class="field col-1 cost_vat">
                                        <label> VAT </label>
                                        <input type="checkbox" tabindex="0" class="cosd_status_vat" name="cosd_status_vat${data[0]['cosd_id']}" onchange="cost_update(${data[0]['cosd_id']})" ${vat_value}>
                                    </div>
                                    <div class="field col-6 cost_name">
                                        <label>Cost name</label>
                                        <input type="text" placeholder="Cost name" onchange="cost_update(${data[0]['cosd_id']})" step="0.01" name="cosd_name_id${data[0]['cosd_id']}" value="${data[0]['cosd_name']}">
                                    </div>
                                    <div class="field col-3 cost_amount">
                                        <label>Amount (TH Baht)</label>
                                        <input type="number" placeholder="Amount" onchange="cost_update(${data[0]['cosd_id']})" step="0.01" name="cosd_cost_id${data[0]['cosd_id']}" value="${data[0]['cosd_cost']}" class="cosd_price">
                                    </div>
                                    <div class="field col-3 cost_quantity">
                                        <label>Quantity (Count) </label>
                                        <input type="number" placeholder="Quantity" class="cosd_count" onchange="cost_update(${data[0]['cosd_id']})" name="cosd_quantity_id${data[0]['cosd_id']}" value="${data[0]['cosd_quantity']}">
                                    </div>
                                    <button type="button" class="btn btn-icon btn-round btn-danger" name="cost_delete_btn_id${data[0]['cosd_id']}" onclick="cost_delete(${data[0]['cosd_id']},'old')" style="margin-top: 25px;background: #E91414 !important; border-color: #E91414 !important;">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>`;
            $('.cost_input_list').append(modal_message);
            // วน loop แสดงข้อมูล
            for (var i = 1; i < number_cost; i++) {
                
                if(data[i]['cosd_status_vat'] == 1){
                    vat_value = 'checked';
                }else{
                    vat_value = '';
                }

                modal_message = '';
                modal_message += `  <div class="fields cost" name="cost_input_id${data[i]['cosd_id']}">
                                        <div class="field col-1 cost_vat">
                                            <label class="label_res"> VAT </label>
                                            <input type="checkbox" tabindex="0" class="cosd_status_vat" name="cosd_status_vat${data[i]['cosd_id']}" onchange="cost_update(${data[i]['cosd_id']})" ${vat_value}>
                                        </div>
                                        <div class="field col-6 cost_name">
                                            <label class="label_res">Cost name</label>
                                            <input type="text" placeholder="Cost name" onchange="cost_update(${data[i]['cosd_id']})" step="0.01" name="cosd_name_id${data[i]['cosd_id']}" value="${data[i]['cosd_name']}">
                                        </div>
                                        <div class="field col-3 cost_amount">
                                            <label class="label_res">Amount (TH Baht)</label>
                                            <input type="number" placeholder="Amount" onchange="cost_update(${data[i]['cosd_id']})" step="0.01" name="cosd_cost_id${data[i]['cosd_id']}" value="${data[i]['cosd_cost']}" class="cosd_price">
                                        </div>
                                        <div class="field col-3 cost_quantity">
                                            <label class="label_res">Quantity (Count) </label>
                                            <input type="number" placeholder="Quantity" class="cosd_count" onchange="cost_update(${data[i]['cosd_id']})" name="cosd_quantity_id${data[i]['cosd_id']}" value="${data[i]['cosd_quantity']}">
                                        </div>
                                        <button type="button" class="btn btn-icon btn-round btn-danger" name="cost_delete_btn_id${data[i]['cosd_id']}" onclick="cost_delete(${data[i]['cosd_id']},'old')" style="margin-top: 1px;background: #E91414 !important; border-color: #E91414 !important;">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>`;
                $('.cost_input_list').append(modal_message);
            }

            cal_total_cost();

        }
    }

    function add_cost_input() {

        ++number_cost_input;

        var cost = `<div class="fields cost" name="cost_input${number_cost_input}">
                        <div class="field col-1 cost_vat">
                            <label class="label_res"> VAT </label>
                            <input type="checkbox" tabindex="0" class="cosd_status_vat" name="cosd_status_vat${number_cost_input}" onchange="cost_insert(${number_cost_input})">
                        </div>
                        <div class="field col-6 cost_name">
                            <label class="label_res">Cost name</label>
                            <input type="text" placeholder="Cost name" onchange="cost_insert(${number_cost_input})" step="0.01" name="cosd_name${number_cost_input}">
                        </div>
                        <div class="field col-3 cost_amount">
                            <label class="label_res">Amount (TH Baht)</label>
                            <input type="number" placeholder="Amount" onchange="cost_insert(${number_cost_input})" step="0.01" name="cosd_cost${number_cost_input}" class="cosd_price">
                        </div>
                        <div class="field col-3 cost_quantity">
                            <label class="label_res">Quantity (Count) </label>
                            <input type="number" placeholder="Quantity" value="0" class="cosd_count" onchange="cost_insert(${number_cost_input})" name="cosd_quantity${number_cost_input}">
                        </div>
                        <button type="button" class="btn btn-icon btn-round btn-danger" name="cost_delete_btn${number_cost_input}" onclick="cost_delete(${number_cost_input},'new')" style="margin-top: 1px;background: #E91414 !important; border-color: #E91414 !important;">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>`;

        $('.cost_input_list').append(cost);
        cal_total_cost();
    }

    function cost_insert(input_order) {
        var cosd_ser_id = $('#cosd_ser_id').val();
        var cosd_name = $('input[name="cosd_name' + input_order + '"]').val();
        var cosd_cost = $('input[name="cosd_cost' + input_order + '"]').val();
        var cosd_quantity = $('input[name="cosd_quantity' + input_order + '"]').val();
        var cosd_status_vat = 2;
        console.log(cosd_status_vat);
        if($('input[name="cosd_status_vat' + input_order + '"]').is(':checked') == true) {
            cosd_status_vat = 1;
        }
        console.log(cosd_status_vat);
        console.log("เข้า insert: " + cosd_ser_id, cosd_name, cosd_cost, cosd_quantity, cosd_status_vat, input_order);
        if(cosd_name != ''){
            $.ajax({
                url: '<?php echo base_url() . '/Service_show/cost_insert' ?>',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    cosd_ser_id: cosd_ser_id,
                    cosd_name: cosd_name,
                    cosd_cost: cosd_cost,
                    cosd_quantity: cosd_quantity,
                    cosd_status_vat: cosd_status_vat
                },
                success: function(data) {
                    console.log(data[0]['cosd_id']);
                    var return_id = data[0]['cosd_id'];
                    $('input[name="cosd_name' + input_order + '"]').attr('onchange', `cost_update(${return_id})`);
                    $('input[name="cosd_name' + input_order + '"]').attr('name', `cosd_name_id${return_id}`);

                    $('input[name="cosd_cost' + input_order + '"]').attr('onchange', `cost_update(${return_id})`);
                    $('input[name="cosd_cost' + input_order + '"]').attr('name', `cosd_cost_id${return_id}`);

                    $('input[name="cosd_quantity' + input_order + '"]').attr('onchange', `cost_update(${return_id})`);
                    $('input[name="cosd_quantity' + input_order + '"]').attr('name', `cosd_quantity_id${return_id}`);

                    $('input[name="cosd_status_vat' + input_order + '"]').attr('onchange', `cost_update(${return_id})`);
                    $('input[name="cosd_status_vat' + input_order + '"]').attr('name', `cosd_status_vat${return_id}`);

                    $('button[name="cost_delete_btn' + input_order + '"]').attr('onclick', `cost_delete(${return_id},'old')`);
                    $('button[name="cost_delete_btn' + input_order + '"]').attr('name', `cost_delete_btn_id${return_id}`);

                    $('div[name="cost_input' + input_order + '"]').attr('name', `cost_input_id${return_id}`);
                }
            });
            cal_total_cost();
        }
    }

    function cost_update(cosd_id) {
        var cosd_name = $('input[name="cosd_name_id' + cosd_id + '"]').val();
        var cosd_cost = $('input[name="cosd_cost_id' + cosd_id + '"]').val();
        var cosd_quantity = $('input[name="cosd_quantity_id' + cosd_id + '"]').val();
        var cosd_status_vat = 2;
        if($('input[name="cosd_status_vat' + cosd_id + '"]').is(':checked') == true) {
            cosd_status_vat = 1;
        }
        console.log('Checked : ' + $('input[name="cosd_status_vat' + cosd_id + '"]').is(':checked'));
        console.log("เข้า update: " + cosd_name, cosd_cost, cosd_id, cosd_ser_id,cosd_quantity, cosd_status_vat);
        if(cosd_name != ''){
            $.ajax({
                url: '<?php echo base_url() . '/Service_show/cost_update' ?>',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    cosd_id: cosd_id,
                    cosd_name: cosd_name,
                    cosd_cost: cosd_cost,
                    cosd_quantity: cosd_quantity,
                    cosd_status_vat: cosd_status_vat
                },
                success: function(data) {
                    console.log(data);
                }
            });
            cal_total_cost();
        }
    }

    function cost_delete(delete_id, input_type = 'new') {

        var n_cosd = false;
        var cosd1 = $('.fields.cost').eq(0).attr('name');
        if(cosd1 == 'cost_input_id' + delete_id){
            n_cosd = true;
        }

        console.log(delete_id, input_type);
        // ลบ input ที่ยังไม่ถูก insert
        if (input_type == 'new') {
            $('div[name="cost_input' + delete_id + '"]').remove();
        }
        // ลบ input ที่ insert ไปแล้ว
        else if (input_type == 'old') {
            $.ajax({
                url: '<?php echo base_url() . '/Service_show/cost_delete' ?>',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    cosd_id: delete_id
                },
                success: function(data) {
                    console.log(data);
                }
            });
            $('div[name="cost_input_id' + delete_id + '"]').remove();
        }

        if(n_cosd){
            //หากลบบรรทัด 1 จะ show หัวตารางบรรทัด 2
            var label_res = $('label.label_res');
            console.log(label_res);
            for(var i = 0 ; i < 4 ; i++){
                label_res.eq(i).removeClass();
            }

            //แก้ปุ่ม
            var btn = $('.btn-danger');
            btn.eq(0).css('margin-top','25px');
        }

        cal_total_cost();
    }

    function cal_total_cost() {
        var total_cost = 0;
        var cost_price = document.getElementsByClassName('cosd_price');
        var cost_count = document.getElementsByClassName('cosd_count');
        var cosd_status_vat = document.getElementsByClassName('cosd_status_vat');
        var vat = $('#vat').val();
        var sub_total = 0;
        var sum_vat = 0;

        for (var i = 0; i < cost_price.length; i++) {
            if (cost_price[i].value) {
                var price = parseFloat(cost_price[i].value) * cost_count[i].value;
                sub_total += price; 
                
                var price_vat = 0;
                if(cosd_status_vat[i].checked == true){
                    price_vat = price * (vat/100);
                    sum_vat += price_vat;
                }
                
                total_cost += price + price_vat;
            }
        }

        if(sum_vat > 0){
            $('.subtotal .price').text(sub_total.toLocaleString() + ' THB');
            $('.vat .title').text('VAT ' + vat + '% : ');
            $('.vat .price').text(sum_vat.toLocaleString() + ' THB');
        }

        $('.total .price').text(total_cost.toLocaleString() + ' THB');
        
        check_checkbox_value();
    }

    function checkbox_checkall(){
        var cosd_status_vat = document.getElementsByClassName('cosd_status_vat');
        for (var i = 0; i < cosd_status_vat.length; i++) {
            cosd_status_vat[i].click();
            console.log('true');
        }
    }

    function check_checkbox_value() {
        var cosd_status_vat = document.getElementsByClassName('cosd_status_vat');
        var checkbox_value = 0;
        for (var i = 0; i < cosd_status_vat.length; i++) {
            if(cosd_status_vat[i].checked == true){
                checkbox_value++;
            }
        }
        if(checkbox_value > 0){
            $('.subtotal').removeAttr('hidden');
            $('.vat').removeAttr('hidden');
        }else{
            $('.subtotal').prop("hidden", !this.checked);
            $('.vat').prop("hidden", !this.checked);
        }
    }
0
    function print_cost(){
        var ser_id = $('#cosd_ser_id').val();
        var vat = $('#vat').val();
        window.open('<?php echo base_url('') . '/Service_show/service_print_cost/'?>' + ser_id + '/' + vat, '_blank');
    }

    function ser_update() {
        var cosd_ser_id = $('#cosd_ser_id').val();
        var due_date = $('input[name="due_date"]').val();
        var pay_by = $('select[name="pay_by"]').val();
        var cheque_no = $('input[name="cheque_no"]').val();
        var bank = $('select[name="bank"]').val();

        if(pay_by == '3'){
            $('.input_cheque').removeAttr('hidden');
        }else{
            $(".input_cheque").attr("hidden",true);
            $('input[name="cheque_no"]').val('');
            $('select[name="bank"]').val(0);
            cheque_no = '';
            bank = 0;
        }

        $.ajax({
            url: '<?php echo base_url() . '/Service_show/ser_pay_update' ?>',
            method: 'POST',
            dataType: 'JSON',
            data: {
                cosd_ser_id: cosd_ser_id,
                due_date: due_date,
                pay_by: pay_by,
                cheque_no: cheque_no,
                bank: bank
            },
            success: function(data) {
                console.log(data);
            }
        });
    }
    </script>
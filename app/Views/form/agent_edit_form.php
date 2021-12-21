<!--
* agent_edit_form
* Display agent edit form
* @input    agent information
* @output   agent edit form
* @author   Wirat
* @Create Date  2564-11-06
*/
-->

<?php
    if ($obj_agent != NULL) {
        $agn_id = $obj_agent[0]->agn_id;
        $agn_company_name = $obj_agent[0]->agn_company_name;
        $agn_tax = $obj_agent[0]->agn_tax;
        $agn_address =  $obj_agent[0]->agn_address;
        $agn_firstname = $obj_agent[0]->agn_firstname;
        $agn_lastname = $obj_agent[0]->agn_lastname;
        $agn_tel = $obj_agent[0]->agn_tel;
        $agn_email = $obj_agent[0]->agn_email;
    }
    else {
        if($agn_id == NULL){
            $agn_id = $arr_agent[0]->agn_id;
            $agn_company_name = $arr_agent[0]->agn_company_name;
            $agn_tax = $arr_agent[0]->agn_tax;
            $agn_address =  $arr_agent[0]->agn_address;
            $agn_firstname = $arr_agent[0]->agn_firstname;
            $agn_lastname = $arr_agent[0]->agn_lastname;
            $agn_tel = $arr_agent[0]->agn_tel;
            $agn_email = $arr_agent[0]->agn_email;
        }
    }
    if (isset($_SESSION['agn_company_name'])) {
        $agn_company_name = $_SESSION['agn_company_name'];
        $agn_firstname = $_SESSION['agn_firstname'];
        $agn_lastname = $_SESSION['agn_lastname'];
        $agn_tel = $_SESSION['agn_tel'];
        $agn_address = $_SESSION['agn_address'];
        $agn_tax = $_SESSION['agn_tax'];
        $agn_email = $_SESSION['agn_email'];
    }
?>
<style>
    .form-inline label {
        display: block;
    }
</style>

<div class="container">
    <div class="row">
        <!-- company information -->
        <div class="col-12 col-md-6">
            <div class="row mt-3 mb-4">
                <h3>Company</h3>
            </div>

            <?php if ($page == 'agent_edit') : ?>
            <!-- company name -->
            <div class="row mb-3">
                <!-- agent id for updating agent -->
                <input type="hidden" name="agn_id" value="<?php echo $arr_agent[0]->agn_id ?>">

                <div class="col-12 col-sm-6">
                    <label for="agn_company_name" class="mt-2"><b>Company name : </b></label>
                </div>
                <div class="col-12 col-sm-6">
                    <input class="form-control" id="agn_company_name" name="agn_company_name" placeholder="Company name" value="<?php echo $agn_company_name ?>">
                    <label class="error"><?php echo $_SESSION['agn_company_name_error']?></label>
                </div>
            </div>
            <?php else : ?>
            <div class="row mb-3" style="min-height: 60px">
                <div class="col-12 col-sm-6">
                    <label for="agn_company_name" class="mt-2"><b>Company name : </b></label>
                </div>

                <div class="col-12 col-sm-6">
                    <div class="ui fluid search selection dropdown mt-1" style="left: 25px; width: 90%">
                        <input type="hidden" name="agn_id" onchange="get_agent_information();" value="<?php echo $agn_id?>">
                        <i class="dropdown icon"></i>
                        <div class="default text">Select agent</div>
                        <div class="menu">
                            <?php for ($i = 0; $i < count($arr_agn); $i++) { ?>
                                <div class="item" data-value="<?php echo $arr_agn[$i]->agn_id ?>"><?php echo $arr_agn[$i]->agn_company_name;?>
                                </div>
                            <?php } ?>
                            <div class="item" data-value="new" <?php if($agn_id == 'new') echo "selected" ?> >+ New agent</div>
                        </div>
                    </div>
                    <label class="error"></label>
                    <input class="form-control mt-5" name="agn_company_name" id="agn_company_name" placeholder="Company name"
                    <?php if($agn_id != 'new') echo "hidden" ?> value="<?php if($agn_id == 'new') echo $agn_company_name ?>">
                    <label class="error"><?php echo '<br><br>' . $_SESSION['agn_company_name_error']?></label>
                </div>
            </div>
            <?php endif; ?>

            <!-- tax number -->
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <label for="agn_tax" class="mt-2"><b>Tax number : </b></label>
                </div>
                <div class="col-12 col-sm-6">
                    <input class="form-control" id="agn_tax" name="agn_tax" placeholder="1234567890123" value="<?php echo $agn_tax ?>">
                </div>
            </div>

            <!-- company address -->
            <div class="row mb-3">
                <div class="col-12 mb-2">
                    <label for="agn_address" class="mt-2"><b>Company location : </b></label>
                </div>
                <div class="col-12">
                    <textarea type="text" class="form-control" id="agn_address" name="agn_address" placeholder="Company location" rows="5"><?php echo $agn_address ?></textarea>
                </div>
            </div>
        </div>

        <!-- contact information -->
        <div class="col-12 col-md-6">
            <div class="row mt-3 mb-4">
                <h3>Contact</h3>
            </div>

            <!-- first name -->
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <label for="agn_firstname" class="mt-2"><b>First name : </b></label>
                </div>
                <div class="col-12 col-sm-6">
                    <input class="form-control" id="agn_firstname" name="agn_firstname" placeholder="First name" value="<?php echo $agn_firstname ?>">
                </div>
            </div>

            <!-- last name -->
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <label for="agn_lastname" class="mt-2"><b>Last name : </b></label>
                </div>
                <div class="col-12 col-sm-6">
                    <input class="form-control input-full" id="agn_lastname" name="agn_lastname" placeholder="Last name" value="<?php echo $agn_lastname ?>">
                </div>
            </div>

            <!-- contact number -->
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <label for="agn_tel" class="mt-2"><b>Contact number : </b></label>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-phone"></i>
                            </span>
                        </div>
                        <input type="tel" class="form-control" id="agn_tel" name="agn_tel" placeholder="xxx-xxx-xxxx" value="<?php echo $agn_tel ?>">
                    </div>
                </div>
            </div>

            <!-- email -->
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <label for="agn_email" class="mt-2"><b>Email : </b></label>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text "><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" id="agn_email" name="agn_email" placeholder="example@gmail.com" value="<?php echo $agn_email ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
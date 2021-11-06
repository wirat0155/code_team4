<?php
    if ($obj_agent != NULL) {
        $agn_company_name = $obj_agent[0]->agn_company_name;
        $agn_tax = $obj_agent[0]->agn_tax;
        $agn_address =  $obj_agent[0]->agn_address;
        $agn_firstname = $obj_agent[0]->agn_firstname;
        $agn_lastname = $obj_agent[0]->agn_lastname;
        $agn_tel = $obj_agent[0]->agn_tel;
        $agn_email = $obj_agent[0]->agn_email;
    }
    else {
        $agn_company_name = $arr_agent[0]->agn_company_name;
        $agn_tax = $arr_agent[0]->agn_tax;
        $agn_address =  $arr_agent[0]->agn_address;
        $agn_firstname = $arr_agent[0]->agn_firstname;
        $agn_lastname = $arr_agent[0]->agn_lastname;
        $agn_tel = $arr_agent[0]->agn_tel;
        $agn_email = $arr_agent[0]->agn_email;
    }
?>

<div class="row px-5">
    <div class="col-md-6 col-lg-6">
        <h3>Company</h3>

        <!-- Company name -->
        <div class="form-group form-inline">
            <label for="agn_company_name" class="col-form-label mr-auto">Company name
                :</label>
            <div class="col-md-8 p-0" id="agn_company_name" name="agn_company_name">
                <?php echo $agn_company_name ?>
            </div>
        </div>

        <!-- Tax number -->
        <div class="form-group form-inline">
            <label for="agn_tax" class="col-form-label mr-auto">Tax number :</label>
            <div class="col-md-8 p-0" id="agn_tax" name="agn_tax">
                <?php echo $agn_tax ?>
            </div>
        </div>

        <!-- Company location -->
        <div class="form-group form-inline">
            <label for="agn_address" class="col-form-label mr-auto">Company location
                :</label>
            <div class="col-md-12 p-0 pt-2" id="agn_address" name="agn_address">
                <?php echo $agn_address ?>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-6">
        <h3>Contact</h3>

        <!-- First Name -->
        <div class="form-group form-inline">
            <label class="col-form-label mr-auto">First name
                :</label>
            <div class="col-md-8 p-0" id="agn_firstname" name="agn_firstname">
                <?php echo $agn_firstname ?>
            </div>
        </div>

        <!-- Last Name -->
        <div class="form-group form-inline">
            <label class="col-form-label mr-auto">Last name
                :</label>
            <div class="col-md-8 p-0" id="agn_lastname" name="agn_lastname">
                <?php echo $agn_lastname ?>
            </div>
        </div>


        <!-- Contact number -->
        <div class="form-group form-inline">
            <label for="agn_tel" class="col-form-label mr-auto">Contact number :</label>
            <div class="col-md-8 p-0" id="agn_tel" name="agn_tel">
                <?php echo tel_format($agn_tel) ?>
            </div>
        </div>


        <!-- Email -->
        <div class="form-group form-inline">
            <label for="agn_email" class="col-form-label mr-auto">Email :</label>
            <div class="col-md-8 p-0" id="agn_email" name="agn_email">
                <?php echo $agn_email ?>
            </div>
        </div>
    </div>
</div>

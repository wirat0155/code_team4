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
        $agn_id = $arr_agent[0]->agn_id;
        $agn_company_name = $arr_agent[0]->agn_company_name;
        $agn_tax = $arr_agent[0]->agn_tax;
        $agn_address =  $arr_agent[0]->agn_address;
        $agn_firstname = $arr_agent[0]->agn_firstname;
        $agn_lastname = $arr_agent[0]->agn_lastname;
        $agn_tel = $arr_agent[0]->agn_tel;
        $agn_email = $arr_agent[0]->agn_email;
    }
?>
<style>
    .form-inline label {
        display: block;
    }
</style>
<div class="row px-5">
    <div class="col-md-6 col-lg-6">

        <label class="mt-3 mb-3"><b><h3>Company</h3></b></label>
        <?php if ($page == 'agent_edit') : ?>
        <!-- Id agent -->
        <input type='hidden' name='agn_id' value="<?php echo $arr_agent[0]->agn_id ?>">

        <!-- Company name -->
        <div class="form-group form-inline">
            <label for="agn_company_name" class="col-form-label mr-auto">Company name</label>
            <div class="col-md-8 p-0">
                <input class="form-control input-full" id="agn_company_name"
                    name="agn_company_name" placeholder="Company name"
                    value="<?php echo $arr_agent[0]->agn_company_name ?>">
                <label
                    class="error"><?php echo $_SESSION['agn_company_name_error']?></label>
            </div>
        </div>

        <?php else : ?>
        <!-- Company name -->
        <div class="form-group form-inline">
            <label for="agn_company_name" class="col-form-label mr-auto">Company name</label>
            <div class="col-md-8 p-0">
                <div class="ui fluid search selection dropdown mt-1" style="left: 10px">
                    <input type="hidden" name="agn_id" onchange="get_agent_information();" value="<?php echo $agn_id?>">
                    <i class="dropdown icon"></i>
                    <div class="default text">Select agent</div>
                    <div class="menu">
                        <?php for ($i = 0; $i < count($arr_agn); $i++) { ?>
                            <div class="item" data-value="<?php echo $arr_agn[$i]->agn_id ?>"><?php echo $arr_agn[$i]->agn_company_name;?>
                            </div>
                        <?php } ?>
                        <div class="item" data-value="new">+ New agent</div>
                    </div>
                </div>
                <label class="error"></label>
                <input class="form-control mt-5" name="agn_company_name" id="agn_company_name" placeholder="Company name" hidden>
                <label class="error"><?php echo '<br><br>' . $_SESSION['agn_company_name_error']?></label>
            </div>
        </div>
        <?php endif; ?>
        
        <!-- Tax number -->
        <div class="form-group form-inline mt-2">
            <label for="agn_tax" class="col-form-label mr-auto">Tax number</label>
            <div class="col-md-8 p-0">
                <input class="form-control input-full" id="agn_tax" name="agn_tax"
                    placeholder="1234567890123"
                    value="<?php echo $agn_tax ?>">
            </div>
        </div>

        <!-- Company location -->
        <div class="form-group">
            <label for="agn_address">Company location</label>
            <textarea type="text" class="form-control" id="agn_address"
                name="agn_address" placeholder="Company location"
                rows="5"><?php echo $agn_address ?></textarea>
        </div>
    </div>


    <div class="col-md-6 col-lg-6">
        <label class="mt-3 mb-3"><b><h3>Contact</h3></b></label>

        <!-- First Name -->
        <div class="form-group form-inline">
            <label class="col-form-label mr-auto">First name </label>
            <div class="col-md-8 p-0">
                <input class="form-control input-full" id="agn_firstname"
                    name="agn_firstname" placeholder="First name"
                    value="<?php echo $agn_firstname ?>">
            </div>
        </div>

        <!-- Last Name -->
        <div class="form-group form-inline">
            <label class="col-form-label mr-auto">Last name </label>
            <div class="col-md-8 p-0">
                <input class="form-control input-full" id="agn_lastname"
                    name="agn_lastname" placeholder="Last name"
                    value="<?php echo $agn_lastname ?>">
            </div>
        </div>


        <!-- Contact number -->
        <div class="form-group form-inline">
            <label for="agn_tel" class="col-form-label mr-auto">Contact number </label>
            <div class="col-md-8 p-0">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-phone"></i>
                        </span>
                    </div>
                    <input type="tel" class="form-control" id="agn_tel" name="agn_tel"
                        placeholder="xxx-xxx-xxxx"
                        value="<?php echo $agn_tel ?>">
                </div>
            </div>
        </div>

        <!-- Email -->
        <div class="form-group form-inline">
            <label for="agn_email" class="col-form-label mr-auto">Email</label>
            <div class="col-md-8 p-0">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text ">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                    <input type="email" class="form-control" id="agn_email"
                        name="agn_email" placeholder="example@gmail.com"
                        value="<?php echo $agn_email ?>">
                </div>
            </div>
        </div>

    </div>
</div>
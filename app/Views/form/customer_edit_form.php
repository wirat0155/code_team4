<?php
    if ($obj_customer != NULL) {
        $cus_id = $obj_customer[0]->cus_id;
        $cus_company_name = $obj_customer[0]->cus_company_name;
        $cus_branch = $obj_customer[0]->cus_branch;
        $cus_tax = $obj_customer[0]->cus_tax;
        $cus_address =  $obj_customer[0]->cus_address;
        $cus_firstname = $obj_customer[0]->cus_firstname;
        $cus_lastname = $obj_customer[0]->cus_lastname;
        $cus_tel = $obj_customer[0]->cus_tel;
        $cus_email = $obj_customer[0]->cus_email;
    }
    else {
        $cus_id = $arr_customer[0]->cus_id;
        $cus_company_name = $arr_customer[0]->cus_company_name;
        $cus_branch = $arr_customer[0]->cus_branch;
        $cus_tax = $arr_customer[0]->cus_tax;
        $cus_address =  $arr_customer[0]->cus_address;
        $cus_firstname = $arr_customer[0]->cus_firstname;
        $cus_lastname = $arr_customer[0]->cus_lastname;
        $cus_tel = $arr_customer[0]->cus_tel;
        $cus_email = $arr_customer[0]->cus_email;
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

        <?php if ($page == 'customer_edit') : ?>
        <!-- Id agent -->
        <input type='hidden' name='cus_id' value="<?php echo $arr_customer[0]->cus_id ?>">

        <!-- Company name -->
        <div class="form-group form-inline">
            <label for="cus_company_name" class="col-form-label mr-auto">Company name</label>
            <div class="col-md-8 p-0">
                <input class="form-control input-full" id="cus_company_name" name="cus_company_name" placeholder="Company name" value="<?php echo $arr_customer[0]->cus_company_name ?>">
                <input hidden id="old_cus_company_name" name="old_cus_company_name" value="<?php echo $arr_customer[0]->cus_company_name ?>">
                <label class="error"><?php echo $_SESSION['cus_company_name_error']?></label>
            </div>
        </div>
        <?php else : ?>
        <!-- Company name -->
        <div class="form-group form-inline">
            <label for="cus_company_name" class="col-form-label mr-auto">Company name</label>
            <div class="col-md-8 p-0">
                <div class="ui fluid search selection dropdown mt-1" style="left: 10px">
                    <input type="hidden" name="cus_id" onchange="get_customer_information();" value="<?php echo $cus_id?>">
                    <i class="dropdown icon"></i>
                    <div class="default text">Select customer</div>
                    <div class="menu">
                        <?php for ($i = 0; $i < count($arr_cus); $i++) { ?>
                            <div class="item" data-value="<?php echo $arr_cus[$i]->cus_id ?>"><?php echo $arr_cus[$i]->cus_company_name;?>
                            </div>
                        <?php } ?>
                        <div class="item" data-value="new">+ New customer</div>
                    </div>
                </div>
                <label class="error"></label>
                <input class="form-control mt-5" name="cus_company_name" id="cus_company_name" placeholder="Company name" hidden>
                <label class="error"><?php echo '<br><br>' . $_SESSION['cus_company_name_error']?></label>
            </div>
        </div>
        <?php endif; ?>
        
        <!-- Branch -->
        <div class="form-group form-inline">
            <label for="cus_branch" class="col-form-label mr-auto">Branch <span style="color: #0F7EEA">(Optional)</span></label>
            <div class="col-md-8 p-0">
                <input class="form-control input-full" id="cus_branch" name="cus_branch" placeholder="Branch" value="<?php echo $arr_customer[0]->cus_branch ?>">
                <label class="error"><?php echo $_SESSION['cus_branch_error']?></label>
            </div>
        </div>

        <!-- Tax number -->
        <div class="form-group form-inline mt-2">
            <label for="agn_tax" class="col-form-label mr-auto">Tax number</label>
            <div class="col-md-8 p-0">
                <input class="form-control input-full" id="cus_tax" name="cus_tax" placeholder="1234567890123" value="<?php echo $cus_tax ?>">
            </div>
        </div>

        <!-- Company location -->
        <div class="form-group">
            <label for="cus_address">Company location</label>
            <textarea type="text" class="form-control" id="cus_address" name="cus_address" placeholder="Company location" rows="5"><?php echo $cus_address ?></textarea>
        </div>
    </div>

    <div class="col-md-6 col-lg-6">
        <label class="mt-3 mb-3"><b><h3>Contact</h3></b></label>

        <!-- First Name -->
        <div class="form-group form-inline">
            <label class="col-form-label mr-auto">First name </label>
            <div class="col-md-8 p-0">
                <input class="form-control input-full" id="cus_firstname" name="cus_firstname" placeholder="First name" value="<?php echo $cus_firstname ?>">
            </div>
        </div>

        <!-- last Name -->
        <div class="form-group form-inline">
            <label class="col-form-label mr-auto">Last name </label>
            <div class="col-md-8 p-0">
                <input class="form-control input-full" id="cus_lastname" name="cus_lastname" placeholder="Last name" value="<?php echo $cus_lastname ?>">
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
                    <input type="tel" class="form-control" id="cus_tel" name="cus_tel" placeholder="xxx-xxx-xxxx" value="<?php echo $cus_tel ?>">
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
                    <input type="email" class="form-control" id="cus_email" name="cus_email" placeholder="example@gmail.com" value="<?php echo $cus_email ?>">
                </div>
            </div>
        </div>
    </div>
</div>

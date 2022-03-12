<!--
* customer_edit_form
* Display customer edit form
* @input    customer information
* @output   customer edit form
* @author   Wirat
* @Create Date  2564-11-06
*/
-->

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

            <?php if ($page == 'customer_edit') : ?>
            <!-- company name -->
            <div class="row mb-3">
                <!-- customer id for updating agent -->
                <input type="hidden" name="cus_id" value="<?php echo $cus_id ?>">

                <div class="col-12 col-sm-6">
                    <label for="cus_company_name" class="mt-2"><b>Company name : </b></label>
                </div>
                <div class="col-12 col-sm-6">
                    <input class="form-control" id="cus_company_name" name="cus_company_name" placeholder="Company name" value="<?php echo $cus_company_name ?>">
                    <input name="old_cus_company_name" value="<?php echo $old_cus_company_name ?>" hidden>
                    <label class="error"><?php echo $_SESSION['cus_company_name_error'] ?></label>
                </div>
            </div>
            <?php else : ?>
            <div class="row mb-3" style="min-height: 60px">
                <div class="col-12 col-sm-6">
                    <label for="cus_company_name" class="mt-2"><b>Company name : </b></label>
                </div>

                <div class="col-12 col-sm-6">
                    <div class="ui fluid search selection dropdown mt-1" style="left: 25px; width: 90%">
                        <input type="hidden" name="cus_id" onchange="get_customer_information();" value="<?php echo $cus_id ?>">
                        <i class="dropdown icon"></i>
                        <div class="default text">Select customer</div>
                        <div class="menu">
                            <?php for ($i = 0; $i < count($arr_cus); $i++) { ?>
                                <div class="item" data-value="<?php echo $arr_cus[$i]->cus_id ?>">
                                <?php 
                                    echo $arr_cus[$i]->cus_company_name;
                                    if ($arr_cus[$i]->cus_branch) {
                                        echo " สาขา" . $arr_cus[$i]->cus_branch;
                                    }
                                ?>
                                </div>
                            <?php } ?>
                            <div class="item" data-value="new">+ New customer</div>
                        </div>
                    </div>
                    <label class="error"></label>
                    <input class="form-control mt-5" name="cus_company_name" id="cus_company_name" placeholder="Company name" <?php if ($cus_id != "new") echo "hidden"?> value="<?php if ($cus_id == "new") echo $cus_company_name?>">
                    <label class="error"><?php echo $_SESSION['cus_company_name_error']?></label>
                </div>
            </div>
            <?php endif; ?>

            <!-- customer branch -->
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <label for="cus_branch" class="mt-2"><b>Branch : </b></label>
                    <div class="text-info">(Optional)</div>
                </div>
                <div class="col-12 col-sm-6">
                    <input class="form-control" id="cus_branch" name="cus_branch" placeholder="Branch" value="<?php echo $cus_branch ?>">
                    <input name="old_cus_branch" value="<?php echo $old_cus_branch ?>" hidden>
                    <label class="error"><?php echo $_SESSION['cus_branch_error'] ?></label>
                </div>
            </div>


            <!-- tax number -->
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <label for="cus_tax" class="mt-2"><b>Tax number : </b></label>
                </div>
                <div class="col-12 col-sm-6">
                    <input class="form-control" id="cus_tax" name="cus_tax" placeholder="1234567890123" value="<?php echo $cus_tax ?>">
                </div>
            </div>

            <!-- company address -->
            <div class="row mb-3">
                <div class="col-12 mb-2">
                    <label for="cus_address" class="mt-2"><b>Company location : </b></label>
                </div>
                <div class="col-12">
                    <textarea type="text" class="form-control" id="cus_address" name="cus_address" placeholder="Company location" rows="5"><?php echo $cus_address ?></textarea>
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
                    <label for="cus_firstname" class="mt-2"><b>First name : </b></label>
                </div>
                <div class="col-12 col-sm-6">
                    <input class="form-control" id="cus_firstname" name="cus_firstname" placeholder="First name" value="<?php echo $cus_firstname ?>">
                </div>
            </div>

            <!-- last name -->
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <label for="cus_lastname" class="mt-2"><b>Last name : </b></label>
                </div>
                <div class="col-12 col-sm-6">
                    <input class="form-control input-full" id="cus_lastname" name="cus_lastname" placeholder="Last name" value="<?php echo $cus_lastname ?>">
                </div>
            </div>

            <!-- contact number -->
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <label for="cus_tel" class="mt-2"><b>Contact number : </b></label>
                </div>
                <div class="col-12 col-sm-6">
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

            <!-- email -->
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <label for="cus_email" class="mt-2"><b>Email : </b></label>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text "><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" id="cus_email" name="cus_email" placeholder="example@gmail.com" value="<?php echo $cus_email ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
<div class="row px-5">
    <div class="col-md-6 col-lg-6">

        <label class="mt-3 mb-3"><b><h3>Company</h3></b></label>
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

        <!-- Tax number -->
        <div class="form-group form-inline mt-2">
            <label for="agn_tax" class="col-form-label mr-auto">Tax number</label>
            <div class="col-md-8 p-0">
                <input class="form-control input-full" id="agn_tax" name="agn_tax"
                    placeholder="1234567890123"
                    value="<?php echo $arr_agent[0]->agn_tax ?>">
            </div>
        </div>

        <!-- Company location -->
        <div class="form-group">
            <label for="agn_address">Company location</label>
            <textarea type="text" class="form-control" id="agn_address"
                name="agn_address" placeholder="Company location"
                rows="5"><?php echo $arr_agent[0]->agn_address ?></textarea>
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
                    value="<?php echo $arr_agent[0]->agn_firstname ?>">
            </div>
        </div>

        <!-- Last Name -->
        <div class="form-group form-inline">
            <label class="col-form-label mr-auto">Last name </label>
            <div class="col-md-8 p-0">
                <input class="form-control input-full" id="agn_lastname"
                    name="agn_lastname" placeholder="Last name"
                    value="<?php echo $arr_agent[0]->agn_lastname ?>">
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
                        value="<?php echo $arr_agent[0]->agn_tel ?>">
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
                        value="<?php echo $arr_agent[0]->agn_email ?>">
                </div>
            </div>
        </div>

    </div>
</div>
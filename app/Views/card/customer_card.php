<?php
  if ($obj_customer != NULL) {
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

<div class="row px-5">
    <div class="col-md-6 col-lg-6">
      <h3>Company</h3>
        <!-- Company name -->
        <div class="form-group form-inline">
            <label for="cus_company_name" class="col-form-label mr-auto">Company name
                :</label>
            <div class="col-md-8 p-0" id="cus_company_name" name="cus_company_name">
                <?php echo $cus_company_name ?>
            </div>
        </div>

        <!-- Branch -->
        <div class="form-group form-inline">
            <label for="cus_branch" class="col-form-label mr-auto">Branch
                :</label>
            <div class="col-md-8 p-0" id="cus_branch" name="cus_branch">
                <?php
                if ($cus_branch == '' || $cus_branch == NULL)
                  echo "-";
                else
                  echo $cus_branch;
                ?>
            </div>
        </div>

        <!-- Tax number -->
        <div class="form-group form-inline">
            <label for="cus_tax" class="col-form-label mr-auto">Tax number :</label>
            <div class="col-md-8 p-0" id="cus_tax" name="cus_tax">
                <?php echo $cus_tax ?>
            </div>
        </div>

        <!-- Company location -->
        <div class="form-group form-inline">
            <label for="cus_address" class="col-form-label mr-auto">Company location
                :</label>
            <div class="col-md-12 p-0 pt-2" id="cus_address" name="cus_address">
                <?php echo $cus_address ?>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-6">
        <h3>Contact</h3>

        <!-- First Name -->
        <div class="form-group form-inline">
            <label class="col-form-label mr-auto">First name
                :</label>
            <div class="col-md-8 p-0" id="cus_firstname" name="cus_firstname">
                <?php echo $cus_firstname ?>
            </div>
        </div>

        <!-- Last Name -->
        <div class="form-group form-inline">
            <label class="col-form-label mr-auto">Last name
                :</label>
            <div class="col-md-8 p-0" id="cus_lastname" name="cus_lastname">
                <?php echo $cus_lastname ?>
            </div>
        </div>


        <!-- Contact number -->
        <div class="form-group form-inline">
            <label for="cus_tel" class="col-form-label mr-auto">Contact number :</label>
            <div class="col-md-8 p-0" id="cus_tel" name="cus_tel">
                <?php echo tel_format($cus_tel) ?>
            </div>
        </div>


        <!-- Email -->
        <div class="form-group form-inline">
            <label for="cus_email" class="col-form-label mr-auto">Email :</label>
            <div class="col-md-8 p-0" id="cus_email" name="cus_email">
                <?php echo $cus_email ?>
            </div>
        </div>
    </div>
</div>

<!--
* customer_card
* Display customer card
* @input    customer information
* @output   customer card
* @author   Wirat
* @Create Date  2564-11-06
*/
-->

<?php
    if ($obj_customer != NULL) {
        $cus_company_name = $obj_customer->cus_company_name;
        $cus_branch = $obj_customer->cus_branch;
        $cus_tax = $obj_customer->cus_tax;
        $cus_address =  $obj_customer->cus_address;
        $cus_firstname = $obj_customer->cus_firstname;
        $cus_lastname = $obj_customer->cus_lastname;
        $cus_tel = $obj_customer->cus_tel;
        $cus_email = $obj_customer->cus_email;
    }
    else {
        $cus_company_name = $arr_customer->cus_company_name;
        $cus_branch = $arr_customer->cus_branch;
        $cus_tax = $arr_customer->cus_tax;
        $cus_address =  $arr_customer->cus_address;
        $cus_firstname = $arr_customer->cus_firstname;
        $cus_lastname = $arr_customer->cus_lastname;
        $cus_tel = $arr_customer->cus_tel;
        $cus_email = $arr_customer->cus_email;
    }
?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="row mt-3 mb-4">
                <h3>Company</h3>
            </div>

            <!-- company name -->
            <div class="row">
                <div class="col-12 col-sm-6 mb-4">
                    <b>Company name : </b>
                </div>
                <div class="col-12 col-sm-6 mb-4">
                    <?php echo $cus_company_name ?>
                </div>
            </div>

            <!-- branch -->
            <div class="row">
                <div class="col-12 col-sm-6 mb-4">
                    <b>Branch : </b>
                </div>
                <div class="col-12 col-sm-6 mb-4">
                    <?php
                        if ($cus_branch == '' || $cus_branch == NULL)
                            echo "-";
                        else
                            echo $cus_branch;
                    ?>
                </div>
            </div>

            <!-- tax number -->
            <div class="row">
                <div class="col-12 col-sm-6 mb-4">
                    <b>Tax number : </b>
                </div>
                <div class="col-12 col-sm-6 mb-4">
                    <?php echo $cus_tax ?>
                </div>
            </div>

            <!-- location -->
            <div class="row">
                <div class="col-12 mb-4">
                    <b>Company location : </b>
                </div>
                <div class="col-12 mb-4">
                    <?php echo $cus_address ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="row mt-3 mb-4">
                <h3>Contact</h3>
            </div>

            <!-- first name -->
            <div class="row">
                <div class="col-12 col-sm-6 mb-4">
                    <b>First name : </b>
                </div>
                <div class="col-12 col-sm-6 mb-4">
                    <?php echo $cus_firstname ?>
                </div>
            </div>

            <!-- last name -->
            <div class="row">
                <div class="col-12 col-sm-6 mb-4">
                    <b>Last name : </b>
                </div>
                <div class="col-12 col-sm-6 mb-4">
                    <?php echo $cus_lastname ?>
                </div>
            </div>

            <!-- contact number -->
            <div class="row">
                <div class="col-12 col-sm-6 mb-4">
                    <b>Contact number : </b>
                </div>
                <div class="col-12 col-sm-6 mb-4">
                    <?php echo tel_format($cus_tel) ?>
                </div>
            </div>

            <!-- email -->
            <div class="row">
                <div class="col-12 col-sm-6 mb-4">
                    <b>Email : </b>
                </div>
                <div class="col-12 col-sm-6 mb-4">
                    <?php echo $cus_email ?>
                </div>
            </div>
        </div>
    </div>
</div>
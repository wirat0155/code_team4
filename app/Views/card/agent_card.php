<!--
* agent_card
* Display agent card
* @input    agent information
* @output   agent card
* @author   Wirat
* @Create Date  2564-11-06
*/
-->
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
                    <?php echo $agn_company_name ?>
                </div>
            </div>

            <!-- tax number -->
            <div class="row">
                <div class="col-12 col-sm-6 mb-4">
                    <b>Tax number : </b>
                </div>
                <div class="col-12 col-sm-6 mb-4">
                    <?php echo $agn_tax ?>
                </div>
            </div>

            <!-- location -->
            <div class="row">
                <div class="col-12 mb-4">
                    <b>Company location : </b>
                </div>
                <div class="col-12 mb-4">
                    <?php echo $agn_address ?>
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
                    <?php echo $agn_firstname ?>
                </div>
            </div>

            <!-- last name -->
            <div class="row">
                <div class="col-12 col-sm-6 mb-4">
                    <b>Last name : </b>
                </div>
                <div class="col-12 col-sm-6 mb-4">
                    <?php echo $agn_lastname ?>
                </div>
            </div>

            <!-- contact number -->
            <div class="row">
                <div class="col-12 col-sm-6 mb-4">
                    <b>Contact number : </b>
                </div>
                <div class="col-12 col-sm-6 mb-4">
                    <?php echo tel_format($agn_tel) ?>
                </div>
            </div>

            <!-- email -->
            <div class="row">
                <div class="col-12 col-sm-6 mb-4">
                    <b>Email : </b>
                </div>
                <div class="col-12 col-sm-6 mb-4">
                    <?php echo $agn_email ?>
                </div>
            </div>
        </div>
    </div>
</div>
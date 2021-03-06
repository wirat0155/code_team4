<!--
* driver_card
* Display driver card
* @input    driver information
* @output   driver card
* @author   Wirat
* @Create Date  2564-11-06
*/
-->

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="row">
                <h3 class="mt-3 mb-4">Driver</h3>
            </div>

            <div class="row">
                <div class="col-12 col-sm-6 mb-4">
                    <b>Name-Surname :</b>
                </div>
                <div class="col-12 col-sm-6 mb-4">
                    <?php echo $arr_driver->dri_name ?>
                </div>

                <div class="col-12 col-sm-6 mb-4">
                    <b>Card number :</b>
                </div>
                <div class="col-12 col-sm-6 mb-4">
                    <?php echo $arr_driver->dri_card_number ?>
                </div>

                <div class="col-12 col-sm-6 mb-4">
                    <b>Phone number :</b>
                </div>
                <div class="col-12 col-sm-6 mb-4">
                    <?php echo $arr_driver->dri_tel ?>
                </div>

                <div class="col-12 col-sm-6 mb-4">
                    <b>Start date :</b>
                </div>
                <div class="col-12 col-sm-6 mb-4">
                    <?php echo date_thai($arr_driver->dri_date_start) ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="row">
                <h3 class="mt-3 mb-4">Licence</h3>
            </div>

            <div class="row">
                <div class="col-12 col-sm-6 mb-4">
                    <b>License number :</b>
                </div>
                <div class="col-12 col-sm-6 mb-4">
                    <?php echo $arr_driver->dri_license ?>
                </div>

                <div class="col-12 col-sm-6 mb-4">
                    <b>License type :</b>
                </div>
                <div class="col-12 col-sm-6 mb-4">
                    <?php
                    if ($arr_driver->dri_license_type == 1) {
                        echo '???.1';
                    } else if ($arr_driver->dri_license_type == 2) {
                        echo '???.2';
                    } else if ($arr_driver->dri_license_type == 3) {
                        echo '???.3';
                    } else if ($arr_driver->dri_license_type == 4) {
                        echo '???.4';
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
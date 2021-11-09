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
                    <?php echo $arr_driver[0]->dri_name ?>
                </div>

                <div class="col-12 col-sm-6 mb-4">
                    <b>Card number :</b>
                </div>
                <div class="col-12 col-sm-6 mb-4">
                    <?php echo $arr_driver[0]->dri_card_number ?>
                </div>

                <div class="col-12 col-sm-6 mb-4">
                    <b>Phone number :</b>
                </div>
                <div class="col-12 col-sm-6 mb-4">
                    <?php echo $arr_driver[0]->dri_tel ?>
                </div>

                <div class="col-12 col-sm-6 mb-4">
                    <b>Date start :</b>
                </div>
                <div class="col-12 col-sm-6 mb-4">
                    <?php echo date_thai($arr_driver[0]->dri_date_start) ?>
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
                    <?php echo $arr_driver[0]->dri_license ?>
                </div>

                <div class="col-12 col-sm-6 mb-4">
                    <b>License type :</b>
                </div>
                <div class="col-12 col-sm-6 mb-4">
                    <?php
                    if ($arr_driver[0]->dri_license_type == 1) {
                        echo 'ท.1';
                    } else if ($arr_driver[0]->dri_license_type == 2) {
                        echo 'ท.2';
                    } else if ($arr_driver[0]->dri_license_type == 3) {
                        echo 'ท.3';
                    } else if ($arr_driver[0]->dri_license_type == 4) {
                        echo 'ท.4';
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
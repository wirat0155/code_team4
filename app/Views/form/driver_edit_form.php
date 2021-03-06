<!--
* driver_edit_form
* Display driver edit form
* @input    driver information
* @output   driver edit form
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
                <div class="col-12 col-md-6 mb-3">
                    <b>Name-surname :</b>
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <input type="text" class="form-control form-input" id="dri_name" name="dri_name" placeholder="Name surname" value="<?php echo $arr_driver->dri_name ?>">
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <b>Card number :</b>
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <input type="text" class="form-control form-input" id="dri_card_number" name="dri_card_number" placeholder="Card number" value="<?php echo $arr_driver->dri_card_number ?>">
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <b>Phone number :</b>
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend ">
                            <span class="input-group-text "><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="tel" class="form-control" id="dri_tel" name="dri_tel" placeholder="xxx-xxx-xxxx" value="<?php echo $arr_driver->dri_tel ?>">
                    </div>
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <b>Driver status :</b>
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <?php
                    $status1 = ' ';
                    $status2 = ' ';
                    $status3 = ' ';
                    $status4 = ' ';
                    if ($arr_driver->dri_status == 1) {
                        $status1 = 'selected';
                    } else if ($arr_driver->dri_status == 2) {
                        $status2 = 'selected';
                    } else if ($arr_driver->dri_status == 3) {
                        $status3 = 'selected';
                    } else if ($arr_driver->dri_status == 4) {
                        $status4 = 'selected';
                    }
                    ?>

                    <select class="block w-full mt-1 text-sm focus:outline-none form-control" id="dri_status" name="dri_status" value="<?php echo $arr_driver->dri_status ?>">
                        <option selected disabled>Select driver status</option>
                        <option value="1" <?php echo  $status1 ?>>Ready</option>
                        <option value="2" <?php echo  $status2 ?>>Working</option>
                        <option value="3" <?php echo  $status3 ?>>Reserved</option>
                        <option value="4" <?php echo  $status4 ?>>Resigned</option>
                    </select>
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <b>Start date :</b>
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <input type="date" class="form-control form-input" id="dri_date_start" name="dri_date_start" value="<?php echo $arr_driver->dri_date_start ?>">
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <b>Resign date :</b>
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <input type="date" class="form-control form-input" id="dri_date_end" name="dri_date_end" value="<?php echo $arr_driver->dri_date_end ?>">
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="row">
                <h3 class="mt-3 mb-4">Licence</h3>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <b>License number :</b>
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <input type="text" class="form-control form-input" id="dri_license" name="dri_license" placeholder="License number" value="<?php echo $arr_driver->dri_license ?>">
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <b>License type :</b>
                </div>

                <div class="col-12 col-md-6 mb-3">
                    <?php
                    $license1 = ' ';
                    $license2 = ' ';
                    $license3 = ' ';
                    $license4 = ' ';
                    if ($arr_driver->dri_license_type == 1) {
                        $license1 = 'selected';
                    } else if ($arr_driver->dri_license_type == 2) {
                        $license2 = 'selected';
                    } else if ($arr_driver->dri_license_type == 3) {
                        $license3 = 'selected';
                    } else if ($arr_driver->dri_license_type == 4) {
                        $license4 = 'selected';
                    }
                    ?>

                    <select class="block w-full mt-1 text-sm focus:outline-none form-control" id="dri_license_type" name="dri_license_type" value="<?php echo $arr_driver->dri_license_type ?>">
                        <option selected disabled>Choose license type</option>
                        <option value="1" <?php echo $license1 ?>>???.1</option>
                        <option value="2" <?php echo $license2 ?>>???.2</option>
                        <option value="3" <?php echo $license3 ?>>???.3</option>
                        <option value="4" <?php echo $license4 ?>>???.4</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <h3 class="mt-3 mb-4">Regular car</h3>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    Car ID :
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <select class="block w-full mt-1 text-sm focus:outline-none form-control" id="dri_car_id" name="dri_car_id" value="<?php echo $arr_driver->dri_license_type ?>">
                    <option selected disabled>Choose car ID</option>
                    <?php for ($i = 0; $i < count($arr_car); $i++) { ?>
                        <option value="<?php echo $arr_car[$i]->car_id ?>" <?php if ($arr_car[$i]->car_id == $arr_driver->dri_car_id) echo " selected" ?>><?php echo 'Car number : ' . $arr_car[$i]->car_number . ' Code ' . $arr_car[$i]->car_code ?></option>
                    <?php } ?>
                </select>
                </div>
            </div>

            <!-- driver profile image -->
            <div class="row mb-3" hidden>
                <div class="col-12 col-sm-3">
                    <label for="dri_profile_image" class="mt-2"><b>Profile image</b></label>
                </div>
                <div class="col-12 col-sm">
                    <div class="input-group">
                        <input type="text" id="input_show_browse" class="form-control" placeholder="...." disabled style="background: white !important;">
                        <div class="input-group-append" style="cursor: pointer;" onclick="$('#dri_profile_image').click();">
                            <span class="input-group-text" id="show_browse">Browse</span>
                        </div>
                    </div>
                    <input type="file" id="dri_profile_image" name="dri_profile_image" onchange="get_image();" accept="image/jpg,image/jpeg,image/png" hidden>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3 mb-4 ml-2">
    <h3>1. Driver information</h3>
</div>
<div class="container">
    <!-- name-surname -->
    <div class="row mb-3">
        <div class="col-12 col-sm-3">
            <label for="dri_name" class="mt-2"><b>Name-Surname</b></label>
        </div>
        <div class="col-12 col-sm">
            <input type="text" class="form-control" id="dri_name" name="dri_name" placeholder="Name-Surname">
        </div>
    </div>

    <!-- driver status -->
    <div class="row mb-3">
        <div class="col-12 col-sm-3">
            <label for="dri_status" class="mt-2"><b>Driver status</b></label>
        </div>
        <div class="col-12 col-sm">
            <select class="form-control" id="dri_status" name="dri_status">
                <option selected disabled>Select driver status</option>
                <option value="1">Ready</option>
                <option value="2">Working</option>
                <option value="3">Reserved</option>
                <option value="4">Resigned</option>
            </select>
        </div>
    </div>

    <!-- card number -->
    <div class="row mb-3">
        <div class="col-12 col-sm-3">
            <label for="dri_card_number" class="mt-2"><b>Card number</b></label>
        </div>
        <div class="col-12 col-sm">
            <input type="text" class="form-control" id="dri_card_number" name="dri_card_number" placeholder="Card number">
        </div>
    </div>

    <!-- phone number -->
    <div class="row mb-3">
        <div class="col-12 col-sm-3">
            <label for="dri_tel" class="mt-2"><b>Phone number</b></label>
        </div>
        <div class="col-12 col-sm">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-phone"></i></span></div>
                <input type="tel" class="form-control" id="dri_tel" name="dri_tel" placeholder="xxx-xxx-xxxx">
            </div>
        </div>
    </div>

    <!-- start date -->
    <div class="row mb-3">
        <div class="col-12 col-sm-3">
            <label for="dri_tel" class="mt-2"><b>Start date</b></label>
        </div>
        <div class="col-12 col-sm">
            <input type="date" name="dri_date_start" class="form-control">
        </div>
    </div>

    <!-- resign date -->
    <div class="row mb-3">
        <div class="col-12 col-sm-3">
            <label for="dri_tel" class="mt-2"><b>Resign date</b></label>
        </div>
        <div class="col-12 col-sm">
            <input type="date" name="dri_date_end" class="form-control">
        </div>
    </div>

    <!-- driver profile image -->
    <div class="row mb-3">
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

<div class="row mt-3 mb-4 ml-2">
    <h3>2. Licence</h3>
</div>
<div class="container">
    <div class="row mb-3">
        <div class="col-12 col-md-6">
            <!-- license number -->
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="dri_license" class="mt-2"><b>License number</b></label>
                </div>
                <div class="col-12 col-sm-6">
                    <input type="text" class="form-control" id="dri_license" name="dri_license" placeholder="License number">
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <!-- license type -->
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <label for="dri_license" class="mt-2"><b>License type</b></label>
                </div>
                <div class="col-12 col-sm-6">
                    <select class="form-control input-full" id="dri_license_type" name="dri_license_type">
                        <option selected disabled>Select driver license type</option>
                        <option value="1">ท.1</option>
                        <option value="2">ท.2</option>
                        <option value="3">ท.3</option>
                        <option value="4">ท.4</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3 mb-4 ml-2">
    <h3>3. Regular car</h3>
</div>
<div class="container">
    <div class="row mb-3">
        <!-- car id -->
        <div class="col-12 col-sm-3">
            <label for="dri_car_id" class="mt-2"><b>Car ID</b></label>
        </div>
        <div class="col-12 col-sm">
            <select class="form-control" id="dri_car_id" name="dri_car_id">
                <option selected disabled>Select car id</option>
                <?php for($i = 0; $i < count($arr_car); $i++) { ?>
                    <option value="<?php echo $arr_car[$i]->car_id?>"><?php echo 'Car number : ' . $arr_car[$i]->car_number . ' Code : ' . $arr_car[$i]->car_code?></option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>
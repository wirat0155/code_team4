<?php 
if ($page == 'car_edit') {
    $car_code = $arr_car[0]->car_code;
    $car_number = $arr_car[0]->car_number;
    $car_chassis_number = $arr_car[0]->car_chassis_number;
    $car_brand = $arr_car[0]->car_brand;
    $car_register_year = $arr_car[0]->car_register_year;
    $car_weight = $arr_car[0]->car_weight;
    $car_branch = $arr_car[0]->car_branch;
    $car_fuel_type = $arr_car[0]->car_fuel_type;
    $car_image = $arr_car[0]->car_image;
    $car_status = $arr_car[0]->car_status;
    $car_prov_id = $arr_car[0]->car_prov_id;
    $car_cart_id = $arr_car[0]->car_cart_id;
}
else {
    $car_code = '';
    $car_number = '';
    $car_chassis_number = '';
    $car_brand = '';
    $car_register_year = '';
    $car_weight = '';
    $car_branch = '';
    $car_fuel_type = '';
    $car_image = '';
    $car_status = '';
    $car_prov_id = '';
    $car_cart_id = '';
}
?>

<h3 class="ml-3">1. Car information</h3>
<div class="row px-5">

    <!-- Number -->
    <div class="col-md-12">
        <div class="form-group form-inline">
            <label for="car_number" class="col-form-label mr-auto">Car Number</label>
            <div class="col-md-11 p-0">
                <input type="text" class="form-control input-full" id="car_number" name="car_number" placeholder="Number" value="<?php echo $car_number ?>">
                <small class="form-text text-muted"></small>
            </div>
        </div>
    </div>

    <!-- Code -->
    <div class="col-md-6">
        <div class="form-group form-inline">
            <label for="car_code" class="col-form-label mr-auto">Code</label>
            <div class="col-md-9 p-0">
                <input type="text" class="form-control input-full" id="car_code" name="car_code" placeholder="Code" value="<?php echo $car_code ?>">
                <small class="form-text text-muted"></small>
            </div>
        </div>
    </div>

    <!-- Province -->
    <div class="col-md-6">
        <div class="form-group form-inline">
            <label for="car_prov_id" class="col-form-label mr-auto"></label>
            <div class="col-md-10 p-0">
                <div class="ui fluid search selection dropdown mt-1" style="left: 10px;top: -10px;">
                    <input type="hidden" name="car_prov_id" id="car_prov_id" onchange="check_car_prov_id()" value="<?php if ($page == 'car_edit') echo $car_prov_id?>">
                    <i class="dropdown icon"></i>
                    <div class="default text">Select province</div>
                    <div class="menu">
                        <?php for ($i = 0; $i < count($arr_car_prov); $i++) { ?>
                        <div class="item" data-value="<?php echo $arr_car_prov[$i]->prov_id ?>"><?php echo $arr_car_prov[$i]->prov_name;?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <small></small>
            </div>
        </div>
    </div>

    <!-- Chassis number -->
    <div class="col-md-6">
        <div class="form-group form-inline">
            <label for="car_chassis_number" class="col-form-label mr-auto pull-right">Chassis
                number</label>
            <div class="col-md-9 p-0">
                <input type="text" class="form-control input-full" id="car_chassis_number" name="car_chassis_number" placeholder="Chassis number" value="<?php echo $car_chassis_number ?>">
                <small class="form-text text-muted"></small>
            </div>
        </div>
    </div>

    <!-- Car type -->
    <div class="col-md-6">
        <div class="form-group form-inline">
            <label for="car_cart_id" class="col-form-label mr-auto">Car type</label>
            <div class="col-md-10 p-0">
                <select class="form-control input-full" id="car_cart_id" name="car_cart_id">
                    <?php for ($i = 0; $i < count($arr_car_type); $i++) { ?>
                    <option value="<?php echo $arr_car_type[$i]->cart_id ?>"
                    <?php if ($arr_car_type[$i]->cart_id == $car_cart_id) echo 'selected'?>>
                        <?php echo $arr_car_type[$i]->cart_name?></option>
                    <?php } ?>
                </select>
                <small class="form-text text-muted"> </small>
            </div>
        </div>
    </div>

    <!-- Register year -->
    <div class="col-md-6">
        <div class="form-group form-inline">
            <label for="car_register_year" class="col-form-label mr-auto">Register
                year</label>
            <div class="col-md-9 p-0">
                <input type="number" class="form-control input-full" id="car_register_year" name="car_register_year" placeholder="2021" min="1900" max="2099" step="1" value="<?php echo $car_register_year ?>">
                <small class="form-text text-muted"></small>
            </div>
        </div>
    </div>

    <!-- Car status  -->
    <div class="col-md-6">
        <div class="form-group form-inline">
            <label for="car_status" class="col-form-label mr-auto">Car status</label>
            <div class="col-md-10 p-0">
                <select class="form-control input-full" id="car_status" name="car_status">
                    <option value="1" <?php if ($car_status == 1) echo 'selected'?>>พร้อมใช้</option>
                    <option value="2" <?php if ($car_status == 2) echo 'selected'?>>เสียหาย</option>
                    <option value="3" <?php if ($car_status == 3) echo 'selected'?>>กำลังซ่อม</option>
                    <option value="4" <?php if ($car_status == 4) echo 'selected'?>>เลิกใช้แล้ว</option>
                </select>
                <small class="form-text text-muted"> </small>
            </div>
        </div>
    </div>

    <!-- Weight -->
    <div class="col-md-6">
        <div class="form-group form-inline">
            <label for="car_weight" class="col-form-label mr-auto">Weight</label>
            <div class="col-md-9 p-0">
                <input type="text" class="form-control input-full" id="car_weight" name="car_weight" placeholder="Weight" value="<?php echo $car_weight ?>">
                <small class="form-text text-muted"></small>
            </div>
        </div>
    </div>

    <!-- Fuel Type -->
    <div class="col-md-6">
        <div class="form-group form-inline">
            <label for="car_fuel_type" class="col-form-label mr-auto">Fuel type</label>
            <div class="col-md-10 p-0">
                <input type="text" class="form-control input-full" id="car_fuel_type" name="car_fuel_type" placeholder="Fuel Type" value="<?php echo $car_fuel_type?>">
                <small class="form-text text-muted"></small>
            </div>
        </div>
    </div>


    <!-- Image -->
    <div class="col-md-6">
        <div class="form-group form-inline">
            <label for="car_image" class="col-form-label mr-auto">Image</label>
            <div class="col-md-9 p-0">
                <div class="input-group mb-3">
                    <input type="text" id="input_show_browse" class="form-control" placeholder="...." aria-label="Recipient's username" aria-describedby="basic-addon2" disabled style="background: white !important;">
                    <div class="input-group-append" style="cursor: pointer;" onclick="$('#car_image').click();">
                        <span class="input-group-text" id="show_browse">Browse</span>
                    </div>
                </div>
                <input type="file" class="form-control-file input-full" id="car_image" name="car_image" onchange="get_image();" accept="image/jpg,image/jpeg,image/png" hidden>
                <small class="form-text text-muted"> </small>
            </div>
        </div>
    </div>
</div>

<h3 class="ml-3">2. Brand</h3>
<div class="row px-5">
    <!-- Brand -->
    <div class="col-12 col-md-6">
        <div class="form-group form-inline">
            <label for="car_brand" class="col-form-label mr-auto">Brand</label>
            <div class="col-md-10 p-0">
                <input type="text" class="form-control input-full" id="car_brand" name="car_brand" placeholder="Brand" value="<?php echo $car_brand ?>">
                <small class="form-text text-muted"></small>
            </div>
        </div>
    </div>

    <!-- Branch -->
    <div class="col-12 col-md-6">
        <div class="form-group form-inline">
            <label for="car_branch" class="col-form-label mr-auto">Branch</label>
            <div class="col-md-10 p-0">
                <input type="text" class="form-control input-full" id="car_branch" name="car_branch" placeholder="Branch" value="<?php echo $car_branch ?>">
                <small class="form-text text-muted"></small>
            </div>
        </div>
    </div>
</div>
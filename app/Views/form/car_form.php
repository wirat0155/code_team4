<!--
* car_form
* Display  car form
* @input    car information
* @output   car form
* @author   Wirat
* @Create Date  2564-11-06
*/
-->

<?php 
if ($page == 'car_edit') {
    $car_id = $arr_car[0]->car_id;
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
    $car_id = '';
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
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row mt-3 mb-4">
                <h3>1. Car information</h3>
            </div>
            
            <!-- car number -->
            <div class="row">
                <div class="col-12 col-sm-2 mb-4">
                    <label for="car_number" class="mt-2"><b>Car number</b></label>
                </div>

                <div class="col-12 col-sm mb-4">
                    <input type="number" min="1" class="form-control" id="car_number" name="car_number" placeholder="Number" value="<?php echo $car_number ?>">
                    <input hidden name="car_id" value="<?php echo $car_id ?>">
                </div>
            </div>

            <!-- car code -->
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-4">
                            <label for="car_code"><b>Code</b></label>
                        </div>
                        <div class="col-12 col-sm-6 mb-4">
                            <input type="text" class="form-control" id="car_code" name="car_code" placeholder="Code" value="<?php echo $car_code ?>">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-5">
                    <div class="ui fluid search selection dropdown mt-1" style="top: -3px; width: 96.5%">
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
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">

                    <!-- chassis number -->
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-4">
                            <label for="car_chassis_number"><b>Chassis number</b></label>
                        </div>
                        <div class="col-12 col-sm-6 mb-4">
                            <input type="text" class="form-control" id="car_chassis_number" name="car_chassis_number" placeholder="Chassis number" value="<?php echo $car_chassis_number ?>">
                        </div>
                    </div>

                    <!-- register year -->
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-4">
                            <label for="car_register_year"><b>Register year</b></label>
                        </div>
                        <div class="col-12 col-sm-6 mb-4">
                            <input type="number" class="form-control" id="car_register_year" name="car_register_year" placeholder="2021" min="1900" max="2099" step="1" value="<?php echo $car_register_year ?>">
                        </div>
                    </div>

                    <!-- weight -->
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-4">
                            <label for="car_weight"><b>Weight</b></label>
                        </div>
                        <div class="col-12 col-sm-6 mb-4">
                            <input type="text" class="form-control" id="car_weight" name="car_weight" placeholder="Weight" value="<?php echo $car_weight ?>">
                        </div>
                    </div>

                    <!-- car image -->
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-4">
                            <label for="car_image"><b>Image</b></label>
                        </div>
                        <div class="col-12 col-sm-6 mb-4">
                            <div class="input-group mb-3">
                                <input type="text" id="input_show_browse" class="form-control" placeholder="...." disabled style="background: white !important;">
                                <div class="input-group-append" style="cursor: pointer;" onclick="$('#car_image').click();">
                                    <span class="input-group-text" id="show_browse">Browse</span>
                                </div>
                            </div>

                            <input type="file" class="form-control-file" id="car_image" name="car_image" onchange="get_image();" accept="image/jpg,image/jpeg,image/png" hidden>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">

                    <!-- car type -->
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-4">
                            <label for="car_cart_id"><b>Car type</b></label>
                        </div>
                        <div class="col-12 col-sm-6 mb-4">
                            <select class="form-control" id="car_cart_id" name="car_cart_id">
                                <?php for ($i = 0; $i < count($arr_car_type); $i++) { ?>
                                <option value="<?php echo $arr_car_type[$i]->cart_id ?>"
                                <?php if ($arr_car_type[$i]->cart_id == $car_cart_id) echo 'selected'?>>
                                    <?php echo $arr_car_type[$i]->cart_name?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <!-- car status -->
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-4">
                            <label for="car_status"><b>Car type</b></label>
                        </div>
                        <div class="col-12 col-sm-6 mb-4">
                            <select class="form-control" id="car_status" name="car_status">
                                <option value="1" <?php if ($car_status == 1) echo 'selected'?>>Ready</option>
                                <option value="2" <?php if ($car_status == 2) echo 'selected'?>>Damaged</option>
                                <option value="3" <?php if ($car_status == 3) echo 'selected'?>>Repair</option>
                                <option value="4" <?php if ($car_status == 4) echo 'selected'?>>Not use</option>
                            </select>
                        </div>
                    </div>

                    <!-- fuel type -->
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-4">
                            <label for="car_fuel_type"><b>Car type</b></label>
                        </div>
                        <div class="col-12 col-sm-6 mb-4">
                            <input type="text" class="form-control" id="car_fuel_type" name="car_fuel_type" placeholder="Fuel Type" value="<?php echo $car_fuel_type?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="row mt-3 mb-4">
                <h3>2. Brand</h3>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="row">

                        <!-- car brand -->
                        <div class="col-12 col-sm-6 mb-4">
                            <label for="car_brand"><b>Car brand</b></label>
                        </div>
                        <div class="col-12 col-sm-6 mb-4">
                            <input type="text" class="form-control" id="car_brand" name="car_brand" placeholder="Brand" value="<?php echo $car_brand ?>">
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="row">

                        <!-- car branch -->
                        <div class="col-12 col-sm-6 mb-4">
                            <label for="car_branch"><b>Car brand</b></label>
                            <div class="text-info">(Optional)</div>
                        </div>
                        <div class="col-12 col-sm-6 mb-4">
                            <input type="text" class="form-control" id="car_branch" name="car_branch" placeholder="Branch" value="<?php echo $car_branch ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
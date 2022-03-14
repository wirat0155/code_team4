<!--
* car_card
* Display car card
* @input    car information
* @output   car card
* @author   Wirat
* @Create Date  2564-11-06
*/
-->

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <h3 class="mt-3 mb-4">Car</h3>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-4">
                            <b>Car number :</b>
                        </div>
                        <div class="col-12 col-sm-6 mb-4">
                            <?php echo $arr_car->car_number ?>
                        </div>

                        <div class="col-12 col-sm-6 mb-4">
                            <b>Car code :</b>
                        </div>
                        <div class="col-12 col-sm-6 mb-4">
                            <?php echo $arr_car->car_code . ' ' . $arr_car->prov_name ?>
                        </div>

                        <div class="col-12 col-sm-6 mb-4">
                            <b>Register year :</b>
                        </div>
                        <div class="col-12 col-sm-6 mb-4">
                            <?php echo $arr_car->car_register_year ?>
                        </div>

                        <div class="col-12 col-sm-6 mb-4">
                            <b>Car type :</b>
                        </div>
                        <div class="col-12 col-sm-6 mb-4">
                            <?php echo $arr_car->cart_name ?>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-4">
                            <b>Chassis number :</b>
                        </div>
                        <div class="col-12 col-sm-6 mb-4">
                            <?php echo $arr_car->car_chassis_number ?>
                        </div>
                        <div class="col-12 col-sm-6 mb-4">
                            <b>Weight (t) :</b>
                        </div>
                        <div class="col-12 col-sm-6 mb-4">
                            <?php echo $arr_car->car_weight . ' t'?>
                        </div>
                        <div class="col-12 col-sm-6 mb-4">
                            <b>Fuel type :</b>
                        </div>
                        <div class="col-12 col-sm-6 mb-4">
                            <?php echo $arr_car->car_fuel_type ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <h3 class="mt-3 mb-4">Brand</h3>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <b>Car brand :</b>
                        </div>
                        <div class="col-12 col-sm-6 mb-3">
                            <?php echo $arr_car->car_brand ?>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <b>Branch :</b>
                        </div>
                        <div class="col-12 col-sm-6 mb-3">
                            <?php echo $arr_car->car_branch ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
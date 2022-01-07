<!--
* service_form
* Display service form
* @input    service information
* @output   service form
* @author   Wirat
* @Create Date  2564-12-21
*/
-->

<h3>1. Import</h3>
<input type="checkbox" style="margin-left: 50%;" id="open" onclick="open_disable(1)">
<label for="open">Use not a regular car</label>
<div class="row">
    <!-- Importer -->
    <div class="col-md-2" style="margin-left: 6%;">
        <div class="form-group">
            <label for="ser_dri_id_in">Importer</label>
        </div>
    </div>
    <div class="col-md-3">
        <select class="form-control" name="ser_dri_id_in" onclick="get_car_information(1)">
            <?php for ($i = 0; $i < count($arr_driver); $i++) { ?>
                <option value="<?php echo $arr_driver[$i]->dri_id ?>"
                <?php
                    if ($arr_driver[$i]->dri_id == $ser_dri_id_in) echo "selected";
                ?>
                >
                    <?php echo $arr_driver[$i]->dri_name ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <!-- Importer car -->
    <div class="col-md-2">
        <div class="form-group">
            <label for="ser_car_id_in">Importer car</label>
        </div>
    </div>
    <div class="col-md-3">
        <select class="form-control" name="ser_car_id_in" disabled>
            <?php for ($i = 0; $i < count($arr_car); $i++) { ?>
                <option value="<?php echo $arr_car[$i]->car_id ?>" 
                <?php 
                    if ($_SESSION['service_input_error'] && $arr_car[$i]->car_id == $ser_car_id_in) echo "selected";
                    else if ($arr_driver[0]->dri_car_id == $arr_car[$i]->car_id) echo "selected";
                ?>
                >
                    <?php echo 'คันที่ ' . $arr_car[$i]->car_number . ' ทะเบียน ' . $arr_car[$i]->car_code ?>
                </option>
            <?php } ?>
        </select>
    </div>
</div>
<div class="row">
    <!-- Arrival date  -->
    <div class="col-md-2" style="margin-left: 6%;">
        <div class="form-group">
            <label for="ser_arrivals_date">Arrival date </label>
        </div>
    </div>
    <div class="col-md-3">
        <input type="datetime-local" class="form-control" id="ser_arrivals_date" name="ser_arrivals_date" placeholder="Arrival date" value="<?php echo $ser_arrivals_date ?>">
    </div>

    <!-- Cut-off date  -->
    <div class="col-md-2">
        <div class="form-group">
            <label for="ser_departure_date">Cut-off date </label>
        </div>
    </div>
    <div class="col-md-3">
        <input type="datetime-local" class="form-control" id="ser_departure_date" name="ser_departure_date" placeholder="Cut-off date" value="<?php echo $ser_departure_date ?>">
    </div>
</div>

<h3>2. Export</h3>
<input type="checkbox" style="margin-left: 50%;" id="open2" onclick="open_disable(2)">
<label for="open2">Use not a regular car</label>
<div class="row">
    <!-- Exporter -->
    <div class="col-md-2" style="margin-left: 6%;">
        <div class="form-group">
            <label for="ser_dri_id_out">Exporter</label>
        </div>
    </div>
    <div class="col-md-3">
        <select class="form-control" name="ser_dri_id_out" onclick="get_car_information(2)">
            <?php for ($i = 0; $i < count($arr_driver); $i++) { ?>
                <option value="<?php echo $arr_driver[$i]->dri_id ?>"
                <?php
                    if ($arr_driver[$i]->dri_id == $ser_dri_id_out) echo "selected";
                ?>
                >
                    <?php echo $arr_driver[$i]->dri_name ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <!-- Exporter car -->
    <div class="col-md-2">
        <div class="form-group">
            <label for="ser_car_id_out">Exporter</label>
        </div>
    </div>
    <div class="col-md-3">
        <select class="form-control" name="ser_car_id_out" disabled>
            <?php for ($i = 0; $i < count($arr_car); $i++) { ?>
                <option value="<?php echo $arr_car[$i]->car_id ?>" 
                <?php 
                    if ($_SESSION['service_input_error'] && $arr_car[$i]->car_id == $ser_car_id_out) echo "selected";
                    else if ($arr_driver[0]->dri_car_id == $arr_car[$i]->car_id) echo "selected";
                ?>
                >
                    <?php echo 'คันที่ ' . $arr_car[$i]->car_number . ' ทะเบียน ' . $arr_car[$i]->car_code ?>
                </option>
            <?php } ?>
        </select>
    </div>
</div>

<h3>3. Location</h3>
<div class="row">
    <!-- Arrivals location  -->
    <div class="col-md-2" style="margin-left: 6%;">
        <div class="form-group">
            <label for="ser_arrivals_location">Arrivals location </label>
        </div>
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" id="ser_arrivals_location" name="ser_arrivals_location" placeholder="Arrivals location" value="<?php echo $ser_arrivals_location ?>">
    </div>

    <!-- Deprature location -->
    <div class="col-md-2">
        <div class="form-group">
            <label for="ser_departure_location">Departure location </label>
        </div>
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" id="ser_departure_location" name="ser_departure_location" placeholder="Departure location" value="<?php echo $ser_departure_location ?>">
    </div>
</div>
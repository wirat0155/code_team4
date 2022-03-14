<!--
* container_form
* Display container form
* @input    container information
* @output   container form
* @author   Wirat
* @Create Date  2564-12-21
*/
-->

<?php
    $attr = '';
    if ($type == 2) {
        $attr = 'readonly';
    }
?>

<div class="row">
    <!-- Container type -->
    <div class="col-md-2 input-label">
        <div class="form-group">
            <label for="con_cont_id">Container type</label>
        </div>
    </div>
    <div class="col-md-6" style="margin-right: 10%;">
        <select class="form-control" name="con_cont_id" <?php echo $attr ?>>
            <?php for ($i = 0; $i < count($arr_container_type); $i++) { ?>
                <option value="<?php echo $arr_container_type[$i]->cont_id ?>" 
                <?php
                    if ($_SESSION['service_input_error'] && $arr_container_type[$i]->cont_id == $con_cont_id)
                        echo "selected";
                ?>
                >
                    <?php echo $arr_container_type[$i]->cont_name ?>
                </option>
            <?php } ?>
        </select>
    </div>
</div>

<div class="row">
    <!-- Container status -->
    <div class="col-md-2 input-label">
        <div class="form-group">
            <label for="con_stac_id">Container status</label>
        </div>
    </div>
    <div class="col-md-6" style="margin-right: 10%;">
        <select class="form-control" name="con_stac_id" <?php echo $attr ?> value="<?php echo $con_stac_id?>">
            <?php for ($i = 0; $i < count($arr_status_container); $i++) { ?>
                <option value="<?php echo $arr_status_container[$i]->stac_id ?>"
                <?php if ($arr_status_container[$i]->stac_name == 'Import' && $_SESSION['service_input_error'] == true) echo ' selected'?>>
                    <?php echo $arr_status_container[$i]->stac_name ?>
                </option>
            <?php } ?>
        </select>
    </div>
</div>

<h3>2. Weight</h3>
<div class="row">
    <!-- Max weight (t) -->
    <div class="col-md-2 input-label">
        <div class="form-group">
            <label for="con_max_weight">Max weight (t)</label>
        </div>
    </div>
    <div class="col-md-6" style="margin-right: 10%;">
        <input type="number" class="form-control" id="con_max_weight" name="con_max_weight" placeholder="10" <?php echo $attr ?> value="<?php echo $con_max_weight?>">
    </div>
</div>

<div class="row">
    <!-- Tare weight (t) -->
    <div class="col-md-2 input-label">
        <div class="form-group">
            <label for="con_tare_weight">Tare weight (t)</label>
        </div>
    </div>
    <div class="col-md-2">
        <input type="number" class="form-control" id="con_tare_weight" name="con_tare_weight" placeholder="10" <?php echo $attr ?> value="<?php echo $con_tare_weight?>">
    </div>

    <!-- Net weight (t) -->
    <div class="col-md-2">
        <div class="form-group">
            <label for="con_net_weight">Net weight (t)</label>
        </div>
    </div>
    <div class="col-md-2">
        <input type="number" class="form-control" id="con_net_weight" name="con_net_weight" placeholder="10" <?php echo $attr ?> value="<?php echo $con_net_weight?>">
    </div>
</div>

<div class="row">
    <!-- Current weight (t) -->
    <div class="col-md-2 input-label">
        <div class="form-group">
            <label for="ser_weight">Current weight (t)</label>
        </div>
    </div>
    <div class="col-md-2">
        <input type="number" class="form-control" id="ser_weight" name="ser_weight" placeholder="10" <?php echo $attr ?> value="<?php echo $ser_weight?>">
    </div>

    <!-- Cube(CBM) -->
    <div class="col-md-2">
        <div class="form-group">
            <label for="con_cube">Cube (cbm)</label>
        </div>
    </div>
    <div class="col-md-2">
        <input type="number" class="form-control" id="con_cube" name="con_cube" placeholder="10" <?php echo $attr ?> value="<?php echo $con_cube?>">
    </div>
</div>

<h3>3. Size</h3>
<div class="row">
    <!-- Container size (t) -->
    <div class="col-md-2 input-label">
        <div class="form-group">
            <label for="con_size_id">Container size</label>
        </div>
    </div>
    <div class="col-md-6" style="margin-right: 10%;">
        <select class="form-control" name="con_size_id"
            onclick="get_size_information()" <?php echo $attr ?>>
            <?php for ($i = 0; $i < count($arr_size); $i++) { ?>
            <option value="<?php echo $arr_size[$i]->size_id ?>"
                <?php 
                if ($obj_container->con_size_id == $arr_size[$i]->size_id) 
                    echo "selected";
                else if ($_SESSION['service_input_error'] == true && $arr_size[$i]->size_id == $con_size_id)
                    echo "selected";
                ?>>
                <?php echo $arr_size[$i]->size_name ?></option>
            <?php } ?>
        </select>
    </div>
</div>

<div class="row">
    <!-- Width(m) -->
    <div class="form-group col-sm-6 col-md-2 ms-md-30">
        <label for="size_width_out">Width (m)</label>
        <input type="number" class="form-control" id="size_width_out"
            name="size_width_out" placeholder="10" disabled value="<?php echo $size_width_out?>">
    </div>
    <div class="col-md-0">
        <label style="margin-top: 45px;" class="md-none"> X </label>
    </div>
    <div class="form-group col-sm-6 col-md-2 md-center">
        <label for="size_length_out">Length (m)</label>
        <input type="number" class="form-control" id="size_length_out"
            name="size_length_out" placeholder="10" disabled value="<?php echo $size_length_out?>">
    </div>
    <div class="col-md-0">
        <label style="margin-top: 45px;" class="md-none"> X </label>
    </div>
    <div class="form-group col-sm-6 col-md-2 md-center">
        <label for="size_height_out">Height (m)</label>
        <input type="number" class="form-control" id="size_height_out"
            name="size_height_out" placeholder="10" disabled value="<?php echo $size_height_out?>">
    </div>
</div>
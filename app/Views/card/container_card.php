<!--
* container_card
* Display container card
* @input    container information
* @output   container card
* @author   Wirat
* @Create Date  2564-11-06
*/
-->

<?php
    if ($obj_container != NULL) {
        $con_number = $obj_container[0]->con_number;

        // get status container name
        for ($i = 0; $i < count($arr_status_container); $i++) {
            if ($obj_container[0]->con_stac_id == $arr_status_container[$i]->stac_id) {
                $stac_name = $arr_status_container[$i]->stac_name;
            }
        }

        // get container type name
        for ($i = 0; $i < count($arr_container_type); $i++) {
            if ($obj_container[0]->con_cont_id == $arr_container_type[$i]->cont_id) {
                $cont_name = $arr_container_type[$i]->cont_name;
            }
        }

        $con_max_weight = $obj_container[0]->con_max_weight;
        $con_net_weight = $obj_container[0]->con_net_weight;
        $con_tare_weight = $obj_container[0]->con_tare_weight;
        $con_cube = $obj_container[0]->con_cube;
    }
    else {
        $con_number = $arr_container[0]->con_number;

        // get status container name
        for ($i = 0; $i < count($arr_status_container); $i++) {
            if ($arr_container[0]->con_stac_id == $arr_status_container[$i]->stac_id) {
                $stac_name = $arr_status_container[$i]->stac_name;
            }
        }

        // get container type name
        for ($i = 0; $i < count($arr_container_type); $i++) {
            if ($arr_container[0]->con_cont_id == $arr_container_type[$i]->cont_id) {
                $cont_name = $arr_container_type[$i]->cont_name;
            }
        }

        $con_max_weight = $arr_container[0]->con_max_weight;
        $con_net_weight = $arr_container[0]->con_net_weight;
        $con_tare_weight = $arr_container[0]->con_tare_weight;
        $con_cube = $arr_container[0]->con_cube;
    }
    $size_name = $arr_size[0]->size_name;
    $size_width_out = $arr_size[0]->size_width_out;
    $size_length_out = $arr_size[0]->size_length_out;
    $size_height_out = $arr_size[0]->size_height_out;
?>

<div class="row mt-3 mb-3">
    <h3>Container</h3>
</div>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="row">
            <!-- Container number -->
            <div class="col-12 col-sm-6 mb-3">
                <b>Container number :</b>
            </div>
            <div class="col-12 col-sm-6 mb-3">
                <?php echo $con_number ?>
            </div>
        </div>

        <div class="row">
            <!-- Container status -->
            <div class="col-12 col-sm-6 mb-3">
                <b>Container status :</b>
            </div>
            <div class="col-12 col-sm-6 mb-3">
                <?php echo $stac_name ?>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6">
        <div class="row">
            <!-- Container type -->
            <div class="col-12 col-sm-6 mb-3">
                <b>Container type</b>
            </div>
            <div class="col-12 col-sm-6 mb-3">
                <?php echo $cont_name ?>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3 mb-3">
    <h3>Weight</h3>
</div>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="row">
            <!-- Max weight -->
            <div class="col-12 col-sm-6 mb-3">
                <b>Max weight (t) :</b>
            </div>
            <div class="col-12 col-sm-6 mb-3">
                <?php echo $con_max_weight . ' t' ?>
            </div>
        </div>

        <div class="row">
            <!-- Net weight -->
            <div class="col-12 col-sm-6 mb-3">
                <b>Net weight (t) :</b>
            </div>
            <div class="col-12 col-sm-6 mb-3">
                <?php echo $con_net_weight . ' t' ?>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6">
        <div class="row">
            <!-- Tare weight -->
            <div class="col-12 col-sm-6 mb-3">
                <b>Tare weight (t) :</b>
            </div>
            <div class="col-12 col-sm-6 mb-3">
                <?php echo $con_tare_weight . ' t' ?>
            </div>
        </div>

        <div class="row">
            <!-- Tare weight -->
            <div class="col-12 col-sm-6 mb-3">
                <b>Cube (CDM) :</b>
            </div>
            <div class="col-12 col-sm-6 mb-3">
                <?php echo $con_cube . ' CDM' ?>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3 mb-3">
    <h3>Size</h3>
</div>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="row">
            <div class="col-12 col-md-6 mb-3">
                <b>Container size :</b>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <?php echo $size_name ?>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center">
    <div class="m-4">
        <b class="mb-3">Width (m) :</b>
        <br>
        <center>
            <?php echo $size_width_out ?>
        </center>
    </div>
    <div class="m-4">
        <br>
        X
    </div>
    <div class="m-4">
        <b class="mb-3">Length (m) :</b>
        <br>
        <center>
            <?php echo $size_length_out ?>
        </center>
    </div>
    <div class="m-4">
        <br>
        X
    </div>
    <div class="m-4">
        <b class="mb-3">Height (m) :</b>
        <br>
        <center>
            <?php echo $size_height_out ?>
        </center>
    </div>
</div>
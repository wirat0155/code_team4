<!--
* container_edit_form
* Display container edit form
* @input    container information
* @output   container edit form
* @author   Wirat
* @Create Date  2564-11-06
*/
-->

<?php
    if ($obj_container != NULL) {
        $con_id = $obj_container[0]->con_id;
        $con_number = $obj_container[0]->con_number;
        $con_old_number = $con_number;
        $con_stac_id = $obj_container[0]->con_stac_id;
        $con_cont_id = $obj_container[0]->con_cont_id;
        $con_max_weight = $obj_container[0]->con_max_weight;
        $con_net_weight = $obj_container[0]->con_net_weight;
        $con_tare_weight = $obj_container[0]->con_tare_weight;
        $con_cube = $obj_container[0]->con_cube;
        $con_size_id = $obj_container[0]->con_size_id;

        $size_width_out = $obj_container[0]->size_width_out;
        $size_length_out = $obj_container[0]->size_length_out;
        $size_height_out = $obj_container[0]->size_height_out;
    }
    else {
        if($con_id == NULL){
            $con_id = $arr_container[0]->con_id;
            $con_number = $arr_container[0]->con_number;
            $con_old_number = $con_number;
            $con_stac_id = $arr_container[0]->con_stac_id;
            $con_cont_id = $arr_container[0]->con_cont_id;
            $con_max_weight = $arr_container[0]->con_max_weight;
            $con_net_weight = $arr_container[0]->con_net_weight;
            $con_tare_weight = $arr_container[0]->con_tare_weight;
            $con_cube = $arr_container[0]->con_cube;
            $con_size_id = $arr_container[0]->con_size_id;

            $size_width_out = $arr_container[0]->size_width_out;
            $size_length_out = $arr_container[0]->size_length_out;
            $size_height_out = $arr_container[0]->size_height_out;
        }
    }
    
    if (isset($_SESSION['con_id'])) {
        $con_id = $_SESSION['con_id'];
        $con_number = $_SESSION['con_number'];
        $con_max_weight = $_SESSION['con_max_weight'];
        $con_tare_weight = $_SESSION['con_tare_weight'];
        $con_net_weight = $_SESSION['con_net_weight'];
        $con_cube = $_SESSION['con_cube'];
        $con_size_id = $_SESSION['con_size_id'];
        $con_cont_id = $_SESSION['con_cont_id'];
        $con_agn_id = $_SESSION['con_agn_id'];
        $con_stac_id = $_SESSION['con_stac_id'];
        $ser_weight = $_SESSION['ser_weight'];
        $size_width_out = $_SESSION['size_width_out'];
        $size_length_out = $_SESSION['size_length_out'];
        $size_height_out = $_SESSION['size_height_out'];
    }
?>


<div class="row mt-3 mb-4 ml-2">
    <h3>Container</h3>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">

            <!-- container number -->
            <?php if ($page == 'container_edit') : ?>
            <div class="row mb-3">
                <input type="hidden" name="con_id" value="<?php echo $con_id ?>">
                <div class="col-12 col-sm-6">
                    <b>Container number :</b>
                </div>
                <div class="col-12 col-sm-6">
                    <input type="hidden" name="con_old_number" value="<?php echo $con_old_number ?>">
                    <input class="form-control" name="con_number" pattern="[A-Za-z]{4} [0-9]{5} 0" placeholder="ABCD 12345 0" value="<?php echo $con_number ?>">
                    <label class="error"><?php echo $_SESSION['con_number_error'] ?></label>
                </div>
            </div>

            <?php else : ?>
            <div class="row mb-3" style="min-height: 45px">
                <div class="col-12 col-sm-6">
                    <b>Container number : </b>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="ui fluid search selection dropdown mt-1" style="left: 25px; width: 90%">
                        <input type="hidden" name="con_id" onchange="get_container_information();" value="<?php echo $con_id ?>">
                        <i class="dropdown icon"></i>
                        <div class="default text">Select container</div>
                        <div class="menu">
                            <div class="item" data-value="<?php echo $con_id ?>"><?php echo $con_number;?></div>
                            <?php for ($i = 0; $i < count($opt_service); $i++) { ?>
                                    <div class="item" data-value="<?php echo $opt_service[$i]->con_id ?>"><?php echo $opt_service[$i]->con_number;?></div>
                            <?php } ?>
                            <div class="item" data-value="new">+ New container</div>
                        </div>
                    </div>
                    <input class="form-control mt-5" name="con_number" pattern="[A-Za-z]{4} [0-9]{5} 0" placeholder="ABCD 12345 0" <?php if ($con_id != "new" && $con_id != '') echo "hidden" ?> value="<?php echo $con_number ?>">
                    <label class="error mt-2"><?php echo $_SESSION['con_number_error'] ?></label>
                </div>
            </div>
            <?php endif; ?>

            <!-- container status -->
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <b>Container status :</b>
                </div>
                <div class="col-12 col-sm-6">
                    <select class="form-control" name="con_stac_id">
                        <?php for ($i = 0; $i < count($arr_status_container); $i++) { ?>
                        <option value="<?php echo $arr_status_container[$i]->stac_id ?>"
                            <?php if ($con_stac_id == $arr_status_container[$i]->stac_id) echo " selected" ?>>
                            <?php echo $arr_status_container[$i]->stac_name ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">

            <!-- container type -->
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <b>Container type :</b>
                </div>
                <div class="col-12 col-sm-6">
                    <select class="form-control" name="con_cont_id">
                        <?php for ($i = 0; $i < count($arr_container_type); $i++) { ?>
                        <option value="<?php echo $arr_container_type[$i]->cont_id ?>"
                            <?php if ($con_cont_id == $arr_container_type[$i]->cont_id) echo " selected" ?>>
                            <?php echo $arr_container_type[$i]->cont_name ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3 mb-4 ml-2">
    <h3>Weight</h3>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">

            <!-- max weight -->
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <b>Max weight (t) :</b>
                </div>
                <div class="col-12 col-sm-6">
                    <input class="form-control" type="number" step="0.01" name="con_max_weight" value="<?php echo $con_max_weight ?>" placeholder="10">
                </div>
            </div>

            <!-- net weight :  -->
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <b>Net weight (t) :</b> 
                </div>
                <div class="col-12 col-sm-6">
                    <input class="form-control" type="number" step="0.01" name="con_net_weight" value="<?php echo $con_net_weight ?>" placeholder="10">
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">

            <!-- tare weight -->
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <b>Tare weight (t) :</b>
                </div>
                <div class="col-12 col-sm-6">
                    <input class="form-control" type="number" step="0.01" name="con_tare_weight" value="<?php echo $con_tare_weight ?>" placeholder="10">
                </div>
            </div>

            <!-- cube :  -->
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <b>Cube (cbm) : </b>
                </div>
                <div class="col-12 col-sm-6">
                    <input class="form-control" type="number" step="0.01" name="con_cube" value="<?php echo $con_cube ?>" placeholder="10">
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">

            <!-- Current weight (t) -->
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <b>Current weight (t) :</b>
                </div>
                <div class="col-12 col-sm-6">
                    <input class="form-control" type="number" step="0.01" name="ser_weight" value="<?php echo $obj_service[0]->ser_weight ?>" placeholder="10">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3 mb-4 ml-2">
    <h3>Size</h3>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">

            <!-- container size -->
            <div class="row">
                <div class="col-12 col-sm-6">
                    <b>Container size : </b>
                </div>
                <div class="col-12 col-sm-6">
                    <select class="form-control" name="con_size_id" oninput="get_size_information()">
                        <?php for ($i = 0; $i < count($arr_size); $i++) { ?>
                        <option value="<?php echo $arr_size[$i]->size_id ?>"
                            <?php if ($con_size_id == $arr_size[$i]->size_id) echo " selected" ?>>
                            <?php echo $arr_size[$i]->size_name ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- contatiner dimension -->
<div class="d-flex justify-content-center mt-4">
    <div class="m-2">
        <center>
            <b class="mb-3">Width (m) :</b>
        </center>
        <br>
        <center>
            <input class="form-control" type="number" step="0.01" name="size_width_out" value="<?php echo $size_width_out ?>" readonly>
        </center>
    </div>
    <div class="m-2 pt-5">
        X
    </div>
    <div class="m-2">
        <center>
            <b class="mb-3">Length (m) :</b>
        </center>
        <br>
        <center>
            <input class="form-control" type="number" step="0.01" name="size_length_out" value="<?php echo $size_length_out ?>" readonly>
        </center>
    </div>
    <div class="m-2 pt-5">
        X
    </div>
    <div class="m-2">
        <center>
            <b class="mb-3">Height (m) :</b>
        </center>
        <br>
        <center>
            <input class="form-control" type="number" step="0.01" name="size_height_out" value="<?php echo $size_height_out ?>" readonly>
        </center>
    </div>
</div>
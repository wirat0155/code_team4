<div class="row mt-3 mb-4 ml-2">
    <h3>Container</h3>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">

            <!-- container number -->
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <b>Container number :</b>
                </div>
                <div class="col-12 col-sm-6">
                    <input type="hidden" name="con_old_number" value="<?php echo $arr_container[0]->con_number ?>">
                    <input class="form-control" name="con_number" pattern="[A-Za-z]{4} [0-9]{5} 0" placeholder="ABCD 12345 0" value="<?php echo $arr_container[0]->con_number ?>">
                </div>
            </div>

            <!-- container status -->
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <b>Container status :</b>
                </div>
                <div class="col-12 col-sm-6">
                    <select class="form-control" name="con_stac_id">
                        <?php for ($i = 0; $i < count($arr_status_container); $i++) { ?>
                        <option value="<?php echo $arr_status_container[$i]->stac_id ?>"
                            <?php if ($arr_container[0]->con_stac_id == $arr_status_container[$i]->stac_id) echo "selected" ?>>
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
                            <?php if ($arr_container[0]->con_cont_id == $arr_container_type[$i]->cont_id) echo "selected" ?>>
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
            <div class="row">
                <div class="col-12 col-sm-6">
                    Max weight (t) :
                </div>
                <div class="col-12 col-sm-6">
                    <input class="form-control" type="number" step="0.01" name="con_max_weight" value="<?php echo $arr_container[0]->con_max_weight ?>" placeholder="10">
                </div>
            </div>

            <!-- net weight :  -->
            <div class="row">
                <div class="col-12 col-sm-6">
                    Net weight (t) : 
                </div>
                <div class="col-12 col-sm-6">
                    <input class="form-control" type="number" step="0.01" name="con_net_weight" value="<?php echo $arr_container[0]->con_net_weight ?>" placeholder="10">
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">

            <!-- tare weight -->
            <div class="row">
                <div class="col-12 col-sm-6">
                    Tare weight (t) :
                </div>
                <div class="col-12 col-sm-6">
                    <input class="form-control" type="number" step="0.01" name="con_tare_weight" value="<?php echo $arr_container[0]->con_tare_weight ?>" placeholder="10">
                </div>
            </div>

            <!-- cube :  -->
            <div class="row">
                <div class="col-12 col-sm-6">
                    Cube (CDM) : 
                </div>
                <div class="col-12 col-sm-6">
                    <input class="form-control" type="number" step="0.01" name="con_cube" value="<?php echo $arr_container[0]->con_cube ?>" placeholder="10">
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
                    Container size : 
                </div>
                <div class="col-12 col-sm-6">
                    <select class="form-control" name="con_size_id" oninput="get_size_information()">
                        <?php for ($i = 0; $i < count($arr_size); $i++) { ?>
                        <option value="<?php echo $arr_size[$i]->size_id ?>"
                            <?php if ($arr_container[0]->con_size_id == $arr_size[$i]->size_id) echo "selected" ?>>
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
            <input class="form-control" type="number" step="0.01" name="size_width_out" value="<?php echo $arr_con_size[0]->size_width_out ?>" readonly>
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
            <input class="form-control" type="number" step="0.01" name="size_length_out" value="<?php echo $arr_con_size[0]->size_length_out ?>" readonly>
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
            <input class="form-control" type="number" step="0.01" name="size_height_out" value="<?php echo $arr_con_size[0]->size_height_out ?>" readonly>
        </center>
    </div>
</div>
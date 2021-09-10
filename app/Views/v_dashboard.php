<div class="container-lg px-6 mx-auto grid">
    <div class="row">

        <div class="col-12 col-md-6 col-lg-4">
            <div class="items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mt-2" style="min-height: 400px; max-height: 400px; overflow: auto;">
                <div>
                    <div class="row p-3">
                        <div class="col-6 font-semibold ">ขนาดตู้</div>
                        <div class="col-3 text-xs"><span data-toggle="modal" data-target="#add_modal" onclick="add_modal('size')" style="cursor: pointer;">เพิ่ม</span></div>
                        <div class="col-3 text-xs text-gray-600">ดูทั้งหมด</div>
                        <hr>
                    </div>

                    <div class="row p-3 size_list">
                        <?php for($i = 0; $i < count($arr_size); $i++) { ?>
                            <div class="col-12 m-1 p-2 text-sm row <?php echo 'size_id' . $arr_size[$i]->size_id?>" style="background-color: #FAFAFA; border-radius: 5px;">
                                <div class="col-10">
                                    <?php echo $arr_size[$i]->size_name ?>
                                </div>
                                <div class="col-2">
                                    <button class="mt-1" data-toggle="modal" data-target="#delete_modal" onclick="delete_modal('size_id', <?php echo $arr_size[$i]->size_id?>)">
                                        <i class="bi bi-x-circle-fill" style="color:#E91414"></i>
                                    </button>
                                </div>
                            </div>
                            
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mt-2" style="min-height: 400px; max-height: 400px; overflow: auto;">
                <div>
                    <div class="row p-3">
                        <div class="col-6 font-semibold ">สถานะตู้</div>
                        <div class="col-3 text-xs"><span data-toggle="modal" data-target="#add_modal" onclick="add_modal('stac')" style="cursor: pointer;">เพิ่ม</span></div>
                        <div class="col-3 text-xs text-gray-600">ดูทั้งหมด</div>
                        <hr>
                    </div>

                    <div class="row p-3 stac_list">
                        <?php for($i = 0; $i < count($arr_status_container); $i++) { ?>
                            <div class="col-12 m-1 p-2 text-sm row <?php echo 'stac_id' . $arr_status_container[$i]->stac_id?>" style="background-color: #FAFAFA; border-radius: 5px;">
                                <div class="col-10">
                                    <?php echo $arr_status_container[$i]->stac_name ?>
                                </div>
                                <div class="col-2">
                                    <button class="mt-1" data-toggle="modal" data-target="#delete_modal" onclick="delete_modal('stac_id', <?php echo $arr_status_container[$i]->stac_id?>)">
                                        <i class="bi bi-x-circle-fill" style="color:#E91414"></i>
                                    </button>
                                </div>
                            </div>
                            
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mt-2" style="min-height: 400px; max-height: 400px; overflow: auto;">
                <div>
                    <div class="row p-3">
                        <div class="col-6 font-semibold ">ประเภทตู้</div>
                        <div class="col-3 text-xs"><span data-toggle="modal" data-target="#add_modal" onclick="add_modal('cont')" style="cursor: pointer;">เพิ่ม</span></div>
                        <div class="col-3 text-xs text-gray-600">ดูทั้งหมด</div>
                        <hr>
                    </div>

                    <div class="row p-3">
                        <?php for($i = 0; $i < count($arr_container_type); $i++) { ?>
                            <div class="col-12 m-1 p-2 text-sm row <?php echo 'cont_id' . $arr_container_type[$i]->cont_id?>" style="background-color: #FAFAFA; border-radius: 5px;">
                                <div class="col-10">
                                    <?php echo $arr_container_type[$i]->cont_name ?>
                                </div>
                                <div class="col-2">
                                    <button class="mt-1" data-toggle="modal" data-target="#delete_modal" onclick="delete_modal('cont_id', <?php echo $arr_container_type[$i]->cont_id?>)">
                                        <i class="bi bi-x-circle-fill" style="color:#E91414"></i>
                                    </button>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- ประเภทรถ -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mt-2" style="min-height: 400px; max-height: 400px; overflow: auto;">
                <div>
                    <div class="row p-3">
                        <div class="col-6 font-semibold ">ประเภทรถ</div>
                        <div class="col-3 text-xs"><span data-toggle="modal" data-target="#add_modal" onclick="add_modal('cart')" style="cursor: pointer;">เพิ่ม</span></div>
                        <div class="col-3 text-xs text-gray-600">ดูทั้งหมด</div>
                        <hr>
                    </div>

                    <div class="row p-3">
                        <?php for($i = 0; $i < count($arr_car_type); $i++) { ?>
                            <div class="col-12 m-1 p-2 text-sm row <?php echo 'cart_id' . $arr_car_type[$i]->cart_id?>" style="background-color: #FAFAFA; border-radius: 5px;">
                                <div class="col-10">
                                    <?php echo $arr_car_type[$i]->cart_name ?>
                                </div>
                                <div class="col-2">
                                    <button class="mt-1" data-toggle="modal" data-target="#delete_modal" onclick="delete_modal('cart_id', <?php echo $arr_car_type[$i]->cart_id?>)">
                                        <i class="bi bi-x-circle-fill" style="color:#E91414"></i>
                                    </button>
                                </div>
                            </div>
                            
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>      
    </div>
</div> <br>

<!-- Modal ยืนยันการลบ -->
<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="add_modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            </div>

            <div class="modal_content">
            </div>
        </div>
    </div>
</div>


<!-- Modal ยืนยันการลบ -->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete_modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            </div>

            <div class="modal_content">
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // add dashboard background
        $('main').css("background-image", "url('<?php echo base_url() . '/upload/dashboard_background.jpg'?>')");
    });
    function add_modal(add_type) {
        console.log('add');
        $('.modal-header').empty();
        if (add_type == 'cart') {
            add_type_name = 'ประเภทรถ';
            add_function_name = 'car_type_insert';
        }
        else if (add_type == 'cont') {
            add_type_name = 'ประเภทตู้';
            add_function_name = 'container_type_insert';
        }
        else if (add_type == 'stac') {
            add_type_name = 'สถานะตู้';
            add_function_name = 'status_container_insert';
        }
        else if (add_type == 'size') {
            add_type_name = 'ขนาดตู้';
            add_function_name = 'size_insert';
        }
        modal_header = `<h5 class="modal-title">เพิ่ม${add_type_name}</h5>`;
        close_button = `<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>`;
        
        $('.modal-header').append(modal_header + close_button);

        $('.modal_content').empty();
        
        modal_body = `<d class="modal-body float-cente">`;
        if (add_type != 'size') {
            modal_message = `<div class="pt-3 pb-3 pl-5 pr-5"><center><input type="text" class="block w-full mt-1 text-sm focus:outline-none form-input" name="${add_type}_name" id="${add_type}_name"></center></div>`;
        }
        else if (add_type == 'size') {
            modal_message = `<div class="row pl-3">`;
            modal_message += `<div class="col-3 ml-3 mt-2">`;
            modal_message += `<span class="text-gray-700 dark:text-gray-400 text-sm">ชื่อขนาด</span>`;
            modal_message += `</div>`;
    
            modal_message += `<div class="col-6">`
            modal_message += `<center><input type="text" class="block w-full mt-1 text-sm focus:outline-none form-input" name="${add_type}_name" id="${add_type}_name"></center>`;
            modal_message += `</div></div>`;

            modal_message += `<div class="row m-3">`;
            // Input ขนาดด้านนอก
            modal_message += `<div class="col-12 col-sm-6">`;
            modal_message += `<div class="text-gray-700 dark:text-gray-400">ด้านนอก</div>`;
            modal_message += `<div class="row mt-3">`
            modal_message += `<div class="col-6">`
            modal_message += `<span class="text-gray-700 dark:text-gray-400 text-sm">ความสูง (เมตร)</span>`;
            modal_message += `</div>`
            modal_message += `<div class="col-6">`
            modal_message += `<input type="number" class="block w-full mt-1 text-sm focus:outline-none form-input" step="0.01" name="size_height_out" id="size_height_out">`;
            modal_message += `</div>`
            modal_message += `</div>`
            
            modal_message += `<div class="row mt-3">`
            modal_message += `<div class="col-6">`
            modal_message += `<span class="text-gray-700 dark:text-gray-400 text-sm">ความกว้าง (เมตร)</span>`;
            modal_message += `</div>`
            modal_message += `<div class="col-6">`
            modal_message += `<input type="number" class="block w-full mt-1 text-sm focus:outline-none form-input" step="0.01" name="size_width_out" id="size_width_out">`;
            modal_message += `</div>`
            modal_message += `</div>`

            modal_message += `<div class="row mt-3">`
            modal_message += `<div class="col-6">`
            modal_message += `<span class="text-gray-700 dark:text-gray-400 text-sm">ความยาว (เมตร)</span>`;
            modal_message += `</div>`
            modal_message += `<div class="col-6">`
            modal_message += `<input type="number" class="block w-full mt-1 text-sm focus:outline-none form-input" step="0.01" name="size_length_out" id="size_length_out">`;
            modal_message += `</div>`
            modal_message += `</div>`
            modal_message += `</div>`
        
            // Input ขนาดตู้ด้านใน
            modal_message += `<div class="col-12 col-sm-6">`;
            modal_message += `<div class="text-gray-700 dark:text-gray-400">ด้านนอก</div>`;
            modal_message += `<div class="row mt-3">`
            modal_message += `<div class="col-6">`
            modal_message += `<span class="text-gray-700 dark:text-gray-400 text-sm">ความสูง (เมตร)</span>`;
            modal_message += `</div>`
            modal_message += `<div class="col-6">`
            modal_message += `<input type="number" class="block w-full mt-1 text-sm focus:outline-none form-input" step="0.01" name="size_height_in" id="size_height_in">`;
            modal_message += `</div>`
            modal_message += `</div>`
            
            modal_message += `<div class="row mt-3">`
            modal_message += `<div class="col-6">`
            modal_message += `<span class="text-gray-700 dark:text-gray-400 text-sm">ความกว้าง (เมตร)</span>`;
            modal_message += `</div>`
            modal_message += `<div class="col-6">`
            modal_message += `<input type="number" class="block w-full mt-1 text-sm focus:outline-none form-input" step="0.01" name="size_width_in" id="size_width_in">`;
            modal_message += `</div>`
            modal_message += `</div>`

            modal_message += `<div class="row mt-3">`
            modal_message += `<div class="col-6">`
            modal_message += `<span class="text-gray-700 dark:text-gray-400 text-sm">ความยาว (เมตร)</span>`;
            modal_message += `</div>`
            modal_message += `<div class="col-6">`
            modal_message += `<input type="number" class="block w-full mt-1 text-sm focus:outline-none form-input" step="0.01" name="size_length_in" id="size_length_in">`;
            modal_message += `</div>`
            modal_message += `</div>`

            modal_message += `</div>`;
            modal_message += `</div>`;
        }
        
        modal_footer = `<div class="modal-footer">`;
        cancel_button = `<button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>`;
        add_button = `<input type="button" onclick="${add_function_name}()" data-dismiss="modal" class="btn btn-success"  value="บันทึก"></div>`;
        
        modal_content = modal_body + modal_message + modal_footer + cancel_button + add_button;
        $('.modal_content').append(modal_content);
    }
    function delete_modal(delete_type, delete_id) {
        console.log('delete');
        $('.modal-header').empty();
        if (delete_type == 'cart_id') {
            delete_type_name = 'ประเภทรถ';
            delete_function_name = 'car_type_delete';
        }
        else if (delete_type == 'cont_id') {
            delete_type_name = 'ประเภทตู้';
            delete_function_name = 'container_type_delete';
        }
        else if (delete_type == 'stac_id') {
            delete_type_name = 'สถานะตู้';
            delete_function_name = 'status_container_delete';
        }
        else if (delete_type == 'size_id') {
            delete_type_name = 'ขนาดตู้';
            delete_function_name = 'size_delete';
        }
        modal_header = `<h5 class="modal-title">ยืนยันการลบ${delete_type_name}</h5>`;
        close_button = `<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>`;
        
        $('.modal-header').append(modal_header + close_button);
        
        

        $('.modal_content').empty();
        
        modal_body = `<div class="modal-body float-cente">`;
        modal_message = `<center>คุณเเน่ใจหรือไม่ที่ต้องการลบ</center></div>`;
        
        modal_footer = `<div class="modal-footer">`;
        cancel_button = `<button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>`;
        delete_button = `<input type="button" onclick="${delete_function_name}(${delete_id})" data-dismiss="modal" class="btn btn-danger"  value="ลบ"></div>`;
        
        modal_content = modal_body + modal_message + modal_footer + cancel_button + delete_button;
        $('.modal_content').append(modal_content);
    }
    function size_insert() {
        var size_name = $('input[name="size_name"]').val();

        var size_height_out = $('input[name="size_height_out"]').val();
        var size_width_out = $('input[name="size_width_out"]').val();
        var size_length_out = $('input[name="size_length_out"]').val();

        var size_height_in = $('input[name="size_height_in"]').val();
        var size_width_in = $('input[name="size_width_in"]').val();
        var size_length_in = $('input[name="size_length_in"]').val();
        console.log('')
        $.ajax({
            url: '<?php echo base_url() . '/public/Size_input/size_insert'?>',
            method: 'POST',
            data: {
                size_name: size_name,
                size_height_out: size_height_out,
                size_width_out: size_width_out,
                size_length_out: size_length_out,
                size_height_in: size_height_in,
                size_width_in: size_width_in,
                size_length_in: size_length_in
            },
            success: function(data) {
                const last_size = JSON.parse(data);
                console.log(last_size);
                console.log(typeof last_size);
                const last_size_id = last_size[0]['size_id'];

                var size = '<div class="col-12 m-1 p-2 text-sm row size_id' + last_size_id +'" style="background-color: #FAFAFA; border-radius: 5px;">';
                size += `<div class="col-10">${size_name}</div>`;
                size += `<div class="col-2">`;
                size += `<button class="mt-1" data-toggle="modal" data-target="#delete_modal" onclick="delete_modal('size_id', ${last_size_id})">`;
                size += `<i class="bi bi-x-circle-fill" style="color:#E91414"></i>`;
                size += `</button></div></div>`;

                $('.size_list').prepend(size);
            }
        });
    }
    function status_container_insert() {
        var stac_name = $('input[name="stac_name"]').val();
        console.log(stac_name);
        $.ajax({
            url: '<?php echo base_url() . '/public/Container_status_input/container_status_insert'?>',
            method: 'POST',
            data: {
                stac_name: stac_name
            },
            success: function(data) {
                const last_stac = JSON.parse(data);
                const last_stac_id = last_stac[0]['stac_id'];

                var stac = '<div class="col-12 m-1 p-2 text-sm row stac_id' + last_stac_id +'" style="background-color: #FAFAFA; border-radius: 5px;">';
                stac += `<div class="col-10">${stac_name}</div>`;
                stac += `<div class="col-2">`;
                stac += `<button class="mt-1" data-toggle="modal" data-target="#delete_modal" onclick="delete_modal('stac_id', ${last_stac_id})">`;
                stac += `<i class="bi bi-x-circle-fill" style="color:#E91414"></i>`;
                stac += `</button></div></div>`;

                $('.stac_list').prepend(stac);
            },
            error: function() {
                console.log('error');
            }
        });
    }


    function car_type_delete(cart_id) {
        // console.log('car_type_delete', cart_id);
        $.ajax({
            url: 'car_type_delete',
            method: 'POST',
            dataType: 'JSON',
            data: {
                cart_id: cart_id
            },
            success: function(data) {
                delete_item('cart_id', cart_id);
            }
        });
    }

    function container_type_delete(cont_id) {
        console.log('container_type_delete', cont_id);
        $.ajax({
            url: 'container_type_delete',
            method: 'POST',
            dataType: 'JSON',
            data: {
                cont_id: cont_id
            },
            success: function(data) {
                delete_item('cont_id', cont_id);
            }
        });
    }

    function status_container_delete(stac_id) {
        //console.log('status_container_delete', stac_id);
        $.ajax({
            url: 'status_container_delete',
            method: 'POST',
            dataType: 'JSON',
            data: {
                stac_id: stac_id
            },
            success: function(data) {
                delete_item('stac_id', stac_id);
            }
        });
    }

    function size_delete(size_id) {
        console.log('size_delete', size_id);
        $.ajax({
            url: 'size_delete',
            method: 'POST',
            dataType: 'JSON',
            data: {
                size_id: size_id
            },
            success: function(data) {
                delete_item('size_id', size_id);
            }
        });
    }

    function delete_item(delete_type, delete_id) {
        $('.' + delete_type + delete_id).remove();
    }
    
</script>
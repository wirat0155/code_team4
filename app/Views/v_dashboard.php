<div class="container-lg px-6 mx-auto grid">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mt-2" style="max-height: 500px; overflow: auto;">
                <div>
                    <div class="row p-3">
                        <div class="col-6 font-semibold ">ขนาดตู้</div>
                        <div class="col-3 text-xs">เพิ่ม</div>
                        <div class="col-3 text-xs text-gray-600">ดูทั้งหมด</div>
                        <hr>
                    </div>

                    <div class="row p-3">
                        <?php for($i = 0; $i < count($arr_car_type); $i++) { ?>
                            <div class="col-12 m-1 p-2 text-sm" style="background-color: #FAFAFA; border-radius: 5px;"><?php echo $arr_car_type[$i]->cart_name ?></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mt-2" style="max-height: 500px; overflow: auto;">
                <div>
                    <div class="row p-3">
                        <div class="col-6 font-semibold ">สถานะตู้</div>
                        <div class="col-3 text-xs">เพิ่ม</div>
                        <div class="col-3 text-xs text-gray-600">ดูทั้งหมด</div>
                        <hr>
                    </div>

                    <div class="row p-3">
                        <?php for($i = 0; $i < count($arr_car_type); $i++) { ?>
                            <div class="col-12 m-1 p-2 text-sm" style="background-color: #FAFAFA; border-radius: 5px;"><?php echo $arr_car_type[$i]->cart_name ?></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mt-2" style="max-height: 500px; overflow: auto;">
                <div>
                    <div class="row p-3">
                        <div class="col-6 font-semibold ">ประเภทตู้</div>
                        <div class="col-3 text-xs">เพิ่ม</div>
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
                                    <button class="mt-1" data-toggle="modal" data-target="#Modal_Confirm" onclick="delete_modal('cont_id', <?php echo $arr_car_type[$i]->cart_id?>)">
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
            <div class="items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mt-2" style="max-height: 500px; overflow: auto;">
                <div>
                    <div class="row p-3">
                        <div class="col-6 font-semibold ">ประเภทรถ</div>
                        <div class="col-3 text-xs">เพิ่ม</div>
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
                                    <button class="mt-1" data-toggle="modal" data-target="#Modal_Confirm" onclick="delete_modal('cart_id', <?php echo $arr_car_type[$i]->cart_id?>)">
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
</div>

<!-- Modal ยืนยันการลบ -->
<div class="modal fade" id="Modal_Confirm" tabindex="-1" role="dialog" aria-labelledby="Modal_ConfirmTitle" aria-hidden="true">
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
    function delete_modal(delete_type, delete_id) {
        $('.modal-header').empty();
        if (delete_type == 'cart_id') {
            delete_type_name = 'ประเภทรถ';
            delete_function_name = 'car_type_delete';
        }
        else if (delete_type == 'cont_id') {
            delete_type_name = 'ประเภทตู้';
            delete_function_name = 'container_type_delete';
        }
        modal_header = `<h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบ${delete_type_name}</h5>`;
        close_button = `<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>`;
        
        $('.modal-header').append(modal_header + close_button);
        
        
        $('.modal_content').empty();
        
        modal_body = `<div class="modal-body float-center">`;
        modal_message = `<center>คุณเเน่ใจหรือไม่ที่ต้องการลบ</center></div>`;
        
        modal_footer = `<div class="modal-footer">`;
        cancel_button = `<button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>`;
        delete_button = `<input type="button" onclick="${delete_function_name}(${delete_id})" data-dismiss="modal" class="btn btn-danger"  value="ลบ"></div>`;
        
        modal_content = modal_body + modal_message + modal_footer + cancel_button + delete_button;
        $('.modal_content').append(modal_content);
    }

    function car_type_delete(cart_id) {
        console.log('car_type_delete', cart_id);
        $.ajax({
            url: '<?php echo base_url() . '/public/Dashboard/car_type_delete' ?>',
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
    }

    function delete_item(delete_type, delete_id) {
        $('.' + delete_type + delete_id).remove();
    }
    
</script>
<style>
.icon-setup {
    font-size: 30px;
    color: #09F600;
}

.font-setup {
    /* font-size: 14px;
    color: #46474b; */
    margin: -25px 0px 40px 35px;
}

.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #21ba45;
    -webkit-transition: .4s;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    /* content: 'NO'; */
}

input:checked+.slider {
    background-color: #db2828;
}

input:focus+.slider {
    box-shadow: 0 0 1px #21ba45;
}

input:checked+.slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    /* content: 'OFF'; */
}

/* Rounded sliders */
.slider.round {
    border-radius: 34px;
}

.slider.round:before {
    border-radius: 50%;
}

.menu-ul {
    list-style-type: none;
    margin: 0;
    padding: 0px 10px;
    width: 100%;
}

.menu-li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}

.menu-li a.active {
    background-color: #041F47;
    color: white;
    border-radius: 10px;
}

.menu-li a:hover:not(.active) {
    background-color: #041F47;
    color: white;
    border-radius: 10px;
}
</style>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="pl-4 mt-4 page-header mb-0">
                <h4 class="pl-3 page-title">Container type</h4>
            </div>
            <hr width="95%" color="696969">
            <ul class="pl-2 breadcrumbs">
                <li class="nav-home">
                    <a href="<?php echo base_url() . '/Dashboard/dashboard_show'?>">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/Dashboard/dashboard_show'?>">Dashboard</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/Set_up/set_up_show'?>">Set up</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/Set_up_container_type/container_type_show'?>">Container type</a>
                </li>
            </ul>

            <div class="row mt-5">
                <div class="col-md-3">
                    <div class="card full-height">
                        <div class="card-header">
                            <div class="card-title">JUMP TO</div>
                        </div>
                        <div class="card-body">
                            <!-- menu -->
                            <ul class="menu-ul">
                                <li class="menu-li pb-1">
                                    <a class="<?php if ($_SESSION['menu_set_up'] == 'container_type') echo 'active' ?>" href="<?php echo base_url() . '/Set_up_container_type/container_type_show'?>">Container type</a>
                                </li>
                                <li class="menu-li pb-1">
                                    <a class="<?php if ($_SESSION['menu_set_up'] == 'container_status') echo 'active' ?>" href="<?php echo base_url() . '/Set_up_container_type/container_type_show'?>">Container status</a>
                                </li>
                                <li class="menu-li pb-1">
                                    <a class="<?php if ($_SESSION['menu_set_up'] == 'container_size') echo 'active' ?>" href="<?php echo base_url() . '/Set_up_container_type/container_type_show'?>">Container size</a>
                                </li>
                                <li class="menu-li pb-1">
                                    <a class="<?php if ($_SESSION['menu_set_up'] == 'car_type') echo 'active' ?>" href="<?php echo base_url() . '/Set_up_container_type/container_type_show'?>">Car type</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Set up container type</div>
                        </div>
                        <div class="card-body">
                            Container type set up such as, new type, upload image and switch on-off type

                            <div class="col-6 mt-3">
                                <i class="icon-setup fas fa-plus"></i>
                                <div class="font-setup">Add new type</div>
                            </div>

                            <table class="table mt-3">
                                <tbody>
                                    <?php for ($i = 0; $i < count($arr_container_type); $i++) { ?>
                                    <tr>
                                        <div <?php echo 'cont_id' . $arr_container_type[$i]->cont_id ?>>
                                            <!-- ลบ -->
                                            <td></td>

                                            <!-- รูปภาพ -->
                                            <td>
                                                <div class="avatar avatar-lg">
                                                    <img class="avatar-img" src="<?php echo base_url() . '/container_type_image/' .'unnamed.jpg' ?>" alt="" loading="lazy">
                                                </div>
                                            </td>

                                            <!-- ชื่อประเภทตู้ -->
                                            <td class="cont_name <?php echo $arr_container_type[$i]->cont_id ?>"><?php echo $arr_container_type[$i]->cont_name ?></td>

                                            <!-- Switch -->
                                            <td>
                                                <label class="switch">
                                                    <input id="cont_id<?php echo $arr_container_type[$i]->cont_id ?>" type="checkbox" onclick="check_status_container_type(<?php echo $arr_container_type[$i]->cont_id ?>)" <?php if($arr_container_type[$i]->cont_status == 2)echo " checked" ?>>
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                        </div>
                                    </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
    // check สถานะของประเภทตู้
    function check_status_container_type(cont_id) {
        if ($('#cont_id' + cont_id).prop('checked')) {
            container_type_delete(cont_id);
        } else {
            container_type_restore(cont_id);
        }
    }
    // ลบประเภทตู้
    function container_type_delete(cont_id) {
        console.log('container_type_delete', cont_id);
        $.ajax({
            url: 'container_type_delete',
            method: 'POST',
            dataType: 'JSON',
            data: {
                cont_id: cont_id
            }
        });
    }
    // เปลี่ยสถานะตู้จาก off เป็น on
    function container_type_restore(cont_id) {
        console.log('container_type_restore', cont_id);
        $.ajax({
            url: 'container_type_restore',
            method: 'POST',
            dataType: 'JSON',
            data: {
                cont_id: cont_id
            }
        });
    }
    </script>
<ul class="menu-ul">
    <li class="menu-li pb-1">
        <a class="<?php if ($_SESSION['menu_set_up'] == 'container_type') echo 'active' ?>" href="<?php echo base_url() . '/Set_up_container_type/container_type_show'?>">Container type</a>
    </li>
    <li class="menu-li pb-1">
        <a class="<?php if ($_SESSION['menu_set_up'] == 'status_container') echo 'active' ?>" href="<?php echo base_url() . '/Set_up_status_container/status_container_show'?>">Container status</a>
    </li>
    <li class="menu-li pb-1">
        <a class="<?php if ($_SESSION['menu_set_up'] == 'container_size') echo 'active' ?>" href="<?php echo base_url() . '/Set_up_size/size_show'?>">Container size</a>
    </li>
    <li class="menu-li pb-1">
        <a class="<?php if ($_SESSION['menu_set_up'] == 'car_type') echo 'active' ?>" href="<?php echo base_url() . '/Set_up_car_type/car_type_show'?>">Car type</a>
    </li>
</ul>

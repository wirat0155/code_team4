<style>

.box-img{
    position: absolute;
}

.img-setup {
    font-size: 50px;
}

.fa-wrench {
    -moz-transform: scaleX(-1);
    -o-transform: scaleX(-1);
    -webkit-transform: scaleX(-1);
    transform: scaleX(-1);
    filter: FlipH;
    -ms-filter: "FlipH";
}

.card-stats {
    border-radius: 20px;
    box-shadow: rgba(136, 165, 191, 0.48) 0px 12px 16px 0px, rgba(255, 255, 255, 0.8) 0px -2px 16px 0px;
}

.icon-info{
    border-radius: 20px;
    box-shadow: rgb(0, 120, 204) 3px 3px 6px 0px inset;
    background-color: #1EAFEE !important;
}

</style>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="pl-4 mt-4 page-header mb-0">
                <h4 class="pl-3 page-title">SET UP</h4>
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
            </ul>


            <div class="row mt-5">
                <div class="col-sm-6 col-md-5 ml-auto">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="box-img col-4 icon-big text-center icon-info" style="border-radius: 20px;">
                                    <img src="http://localhost/code_team4/public/upload/container_1.png" style="width:90px;"></img>
                                </div>
                                <div class="col-8 col-stats ml-auto">
                                    <div class="numbers">
                                        <h4 class="card-title">Container type</h4>
                                        <hr class="mt-1"  width="70%" color="696969" align="left"  style="height: 1px">
                                        <p class="card-category"> Container type set up such as,
                                            new type, upload image
                                            and switch on-off </p>
                                        <a href="#" ><p class=" text-right mt-3">Set Up ></p></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 mr-auto">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="box-img col-4 icon-big text-center icon-info"  style="border-radius: 20px">
                                    <i class="img-setup fas fa-link"></i>
                                </div>
                                <div class="col-8 col-stats ml-auto">
                                    <div class="numbers">
                                        <h4 class="card-title">Container status</h4>
                                        <hr class="mt-1" width="70%" color="696969" align="left" style="height: 1px">
                                        <p class="card-category"> Container status set up such as,
                                            new status, and switch on-off  <?php echo "            " ?> </p>
                                        <a href="#" ><p class=" text-right mt-3">Set Up ></p></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-sm-6 col-md-5 ml-auto">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="box-img col-4 icon-big text-center icon-info"  style="border-radius: 20px">
                                    <i class="img-setup fas fa-wrench"></i>
                                </div>
                                <div class="col-8 col-stats ml-auto">
                                    <div class="numbers">
                                        <h4 class="card-title">Container size</h4>
                                        <hr class="mt-1"  width="70%" color="696969" align="left"  style="height: 1px">
                                        <p class="card-category"> Container size set up such as,
                                            new size, upload image and switch on-off </p>
                                        <a href="#" ><p class=" text-right mt-3">Set Up ></p></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 mr-auto">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="box-img col-4 icon-big text-center icon-info"  style="border-radius: 20px">
                                    <i class="img-setup fas fa-truck"></i>
                                </div>
                                <div class="col-8 col-stats ml-auto">
                                    <div class="numbers">
                                        <h4 class="card-title">Car type</h4>
                                        <hr class="mt-1"  width="70%" color="696969" align="left"  style="height: 1px">
                                        <p class="card-category"> Car type set up such as,
                                            new type, upload image
                                            and switch on-off </p>
                                        <a href="#" ><p class=" text-right mt-3">Set Up ></p></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>
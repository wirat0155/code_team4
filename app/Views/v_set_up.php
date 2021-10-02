<style>
.fa-truck, .fa-wrench,
.fa-link, .fa-box {
    font-size: 500%;
    margin-top: 35%;
}

.fa-wrench {
    -moz-transform: scaleX(-1);
    -o-transform: scaleX(-1);
    -webkit-transform: scaleX(-1);
    transform: scaleX(-1);
    filter: FlipH;
    -ms-filter: "FlipH";
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
                <div class="col-md-5 ml-auto">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4 rounded" style="background-color: #1EAFEE; color: white">
                                <div class="card-round">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                                            <i class="fas fa-box"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Container type</h5>
                                    <hr width="70%" color="696969" align="left">
                                    <p class="card-text"> Container type set up such as,
                                        new type, upload image
                                        and switch on-off</p>
                                    <p class="card-text text-right"><a href="#" class="text-muted">Set Up ></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mr-auto">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4 rounded" style="background-color: #1EAFEE; color: white">
                                <div class="card-round">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                                            <i class="fas fa-link"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Container status</h5>
                                    <hr width="70%" color="696969" align="left">
                                    <p class="card-text"> Container status set up such as,
                                        new status, and switch on-off </p>
                                    <p class="card-text text-right"><a href="#" class="text-muted">Set Up ></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-5 ml-auto">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4 rounded" style="background-color: #1EAFEE; color: white">
                                <div class="card-round">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                                            <i class="fas fa-wrench"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Container size</h5>
                                    <hr width="70%" color="696969" align="left">
                                    <p class="card-text"> Container size set up such as,
                                        new size, width, length, height,
                                        upload image and switch on-off </p>
                                    <p class="card-text text-right"><a href="#" class="text-muted">Set Up ></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mr-auto">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4 rounded" style="background-color: #1EAFEE; color: white;">
                                <div class="card-round ">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                                            <i class="fas fa-truck"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Car type</h5>
                                    <hr width="70%" color="696969" align="left">
                                    <p class="card-text"> Car type set up such as,
                                        new type, upload image
                                        and switch on-off </p>
                                    <p class="card-text text-right"><a href="#" class="text-muted">Set Up ></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
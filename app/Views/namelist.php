<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>
    <title>Document</title>
    <style>
        * {
            font-family: 'SF Thonburi';
            /* margin: 0 !important;
            padding: 0 !important; */
        }
        .side-bar {
            height: 100vh;
            display: block;
        }
        @media screen and (max-width: 768px) {
            h2 {
                font-size: 1rem;
            }
            .side-bar {
                height: auto;
                display: none;
            }
        }
        .side-bar > div {
            transition: background-color 0.1s , color 0.1s;
        }
        .side-bar > div:hover {
            background-color: #44bb55;
            color: white;
        }
    </style>
</head>
<body>
    <header class="container-fluid p-2" style="background-color: #40484a">
        <div class="row">
            <div class="col-8 pt-2">
                <span style="color: #f1f2f5; font-size: 1.25rem">Team 4 Manager</span>
                <span style="color: #f1f2f5; font-size: 0.75rem" class="ms-3">ผู้ช่วยบริหารงานทีม 4</span>
            </div>
            <div class="col-4" style="text-align: right;">
                <i class="bi bi-list" style="font-size: 2rem; cursor: pointer; color: white" onclick="toogleMenu()"></i>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <section class="col-12 col-sm-2 col-lg-2 col-xxl-1 side-bar p-0" style="background-color: #f0f1f3;">
                <div class="pt-3 pb-3 ps-4 pe-1">แดชบอร์ด</div>
                <div class="pt-3 pb-3 ps-4 pe-1">เช็คชื่อ</div>
                <div class="pt-3 pb-3 ps-4 pe-1">เพิ่มกิจกรรม</div>
                <div class="pt-3 pb-3 ps-4 pe-1">ปฏิทินกิจกรรม</div>
                <div class="pt-3 pb-3 ps-4 pe-1">เอกสารที่แชร์</div>
            </section>
            <article class="container col-12 col-sm-10 col-lg-10 col-xxl-11 p-2">
                    <h2 class="mt-5">สมาชิก</h2>
                    <h6 style="color: grey">Member</h6>
                    <hr />

                    <div class="d-flex justify-content-end mt-3">
                        <a href="<?php echo base_url('/public/addname')?>" class="btn p-2" style="background-color: #44bb55; color: white;">เพิ่มผู้ใช้</a>
                    </div>

                    <div class="container-sm">
                        <div class="row">
                            <?php if ($users) :?>
                                <?php foreach($users as $user) :?>
                                    <div class="col-6 col-md-4 col-lg-3 col-xxl-2 p-2">
                                        <center>
                                            <img src="<?= base_url('/upload').'/'.$user['img']?>" alt=""style="width: 6rem; height: 6rem; object-fit: cover; border-radius: 50%;">
                                        
                                            <h6 class="mt-3"><?= $user['name']?></h6>
                                            <p><?= $user['role']?></p>
                                        </center>
                                    </div>
                                <?php endforeach;?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="<?php echo base_url('/public/send_mail')?>" class="btn btn-info">ส่งเมล์</a>
                    </div>
            </article>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            // $('#users-list').DataTable();
        });

        let toggle_menu_status = false;
        function toogleMenu() {
            if (toggle_menu_status) {
                // close side menu
                // $('.side-bar').css('display', 'none');
                $('.side-bar').hide();
            } else  {
                // $('.side-bar').css('display', 'block');
                $('.side-bar').show();
            }
            toggle_menu_status = !toggle_menu_status;
        }
    </script>
</body>
</html>
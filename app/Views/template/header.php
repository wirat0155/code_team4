<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Container Drop Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">

    

    <link rel="stylesheet" href="<?php echo 'http://localhost/code_team4//Assets/css/tailwind.output.css'?>">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer=""></script>
    <script src="<?php echo 'http://localhost/code_team4//Assets/js/init-alpine.js'?>"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer=""></script>
    <script src="<?php echo 'http://localhost/code_team4//Assets/js/charts-lines.js'?>" defer=""></script>
    <script src="<?php echo 'http://localhost/code_team4//Assets/js/charts-pie.js'?>" defer=""></script>
    <link rel="stylesheet" href="<?php echo 'http://localhost/code_team4//Assets/css/index.css'?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style>
      * {
        font-family: 'Sarabun', sans-serif !important;
      }
      a, a:hover {
        text-decoration: none;
      }

      /* หน้า Datatable */
      .dataTables_wrapper .dataTables_paginate .paginate_button.current,
      .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
          color: white !important;
          border: 1px solid #3f83f8 !important;
          background-color: #3f83f8 !important;
          background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, white), color-stop(100%, white)) !important;
          background: -webkit-linear-gradient(top, white 0%, #3f83f8 0%) !important;
          background: -moz-linear-gradient(top, white 0%, #3f83f8 0%) !important;
          background: -ms-linear-gradient(top, white 0%, #3f83f8 0%);
          background: -o-linear-gradient(top, white 0%, #3f83f8 0%) !important;
          background: linear-gradient(to bottom, white 0%, #3f83f8 0%) !important;
      }

      /* Datatable Next และ Previous */
      .dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
      .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover,
      .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
          cursor: pointer;
          color: #3f83f8 !important;
          border: 1px solid #3f83f8 !important;
          background: transparent;
          box-shadow: none;
      }

      .dataTables_wrapper .dataTables_paginate .paginate_button {
          box-sizing: border-box;
          display: inline-block;
          min-width: 1.5em;
          padding: .5em 1em;
          margin-left: 2px;
          text-align: center;
          text-decoration: none !important;
          cursor: pointer;
          *cursor: hand;
          color: #3f83f8 !important;
          border: 1px solid #3f83f8 !important;
          border-radius: 2px;
      }

      .paginate_button:hover{
          color: white !important;
          background: #81aefc !important;
      }

      .paginate_button.previous.disabled:hover, .paginate_button.next.disabled:hover{
          color: #3f83f8 !important;
          background: white !important;
      }

      .form-input {
        background-color: #fafafa; /* light grey */
      }
      .error {
        margin-top: 0.5rem;
        color: red;
      }
      td {
        cursor: pointer;
      }
      /* width */
      ::-webkit-scrollbar {
        width: 5px;
        height: 5px;
      }

      /* Track */
      ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px #f0f0f0; 
        border-radius: 10px;
      }
      
      /* Handle */
      ::-webkit-scrollbar-thumb {
        background: #dedede;
        border-radius: 6px;
      }
      li {
        padding: 0px;
      }
    </style>
</head>
<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
      <!-- Desktop sidebar -->
      <aside class="z-20 hidden w-64 overflow-y-auto  md:block flex-shrink-0" style="background-color: #E7E8EA">
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <a class="text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            <div class="justify-content-center flex items-center pl-1">
                  <img class="shadow rounded" src="http://localhost/code_team4/public/upload/Logo_IBS.jpg" alt="" style="width: 3rem; height: 3rem; object-fit: cover;">
                  <div class="pl-3 items-center">
                        ระบบจัดการ <br>
                        ตู้คอนเทนเนอร์
                  </div>
            </div>
          </a>
          <!-- <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            ระบบจัดการตู้คอนเทนเนอร์
          </a>
          <br> -->

          <ul class="mt-6">
            <li class="relative" <?php if($_SESSION['menu'] == 'Dashboard') echo 'style="background-color: #D2D5DA"'?>>
              <a style="height: 3.5rem;" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100 <?php if($_SESSION['menu'] == 'Dashboard') echo 'text-gray-800'?>" href="<?php echo base_url() . '/Dashboard/dashboard_show'?>">
                <span class="ml-4">หน้าหลัก</span>
              </a>
            </li>

            <li class="relative" <?php if($_SESSION['menu'] == 'Service_show') echo 'style="background-color: #D2D5DA"'?>>
              <a style="height: 3.5rem;" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100 <?php if($_SESSION['menu'] == 'Service_show') echo 'text-gray-800'?>" href="<?php echo base_url() . '/Service_show/service_show_ajax'?>">
                <span class="ml-4">ข้อมูลบริการ</span>
              </a>
            </li>

            <li class="relative" <?php if($_SESSION['menu'] == 'Customer_show') echo 'style="background-color: #D2D5DA"'?>>
              <a style="height: 3.5rem;" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100 <?php if($_SESSION['menu'] == 'Customer_show') echo 'text-gray-800'?>" href="<?php echo base_url() . '/Customer_show/customer_show_ajax'?>">
                <span class="ml-4">ข้อมูลลูกค้า</span>
              </a>
            </li>

            <li class="relative" <?php if($_SESSION['menu'] == 'Agent_show') echo 'style="background-color: #D2D5DA"'?>>
              <a style="height: 3.5rem;" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100 <?php if($_SESSION['menu'] == 'Agent_show') echo 'text-gray-800'?>" href="<?php echo base_url() . '/Agent_show/agent_show_ajax'?>">
                <span class="ml-4">ข้อมูลเอเย่นต์</span>
              </a>
            </li>

            <li class="relative" <?php if($_SESSION['menu'] == 'Container_show') echo 'style="background-color: #D2D5DA"'?>>
              <a style="height: 3.5rem;" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100 <?php if($_SESSION['menu'] == 'Container_show') echo 'text-gray-800'?>" href="<?php echo base_url() . '/Container_show/container_show_ajax'?>">
                <span class="ml-4">ข้อมูลตู้คอนเทนเนอร์</span>
              </a>
            </li>
            
            <li class="relative" <?php if($_SESSION['menu'] == 'Driver_show') echo 'style="background-color: #D2D5DA"'?>>
              <a style="height: 3.5rem;" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100 <?php if($_SESSION['menu'] == 'Driver_show') echo 'text-gray-800'?>" href="<?php echo base_url() . '/Driver_show/driver_show_ajax'?>">
                <span class="ml-4">ข้อมูลพนักงานขับรถ</span>
              </a>
            </li>

            <li class="relative" <?php if($_SESSION['menu'] == 'Car_show') echo 'style="background-color: #D2D5DA"'?>>
              <a style="height: 3.5rem;" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100 <?php if($_SESSION['menu'] == 'Car_show') echo 'text-gray-800'?>" href="<?php echo base_url() . '/Car_show/car_show_ajax'?>">
                <span class="ml-4">ข้อมูลรถ</span>
              </a>
            </li>
          </ul>
        </div>
      </aside>



      <div class="flex flex-col flex-1 w-full">
        <header class="z-10 py-4 shadow-md dark:bg-gray-800" style="background-color: #343a40">
          <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
            <!-- Mobile hamburger -->
            <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu">
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
              </svg>
            </button>
            <!-- Search input -->
            <div class="flex justify-center flex-1 lg:mr-32">
              <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
                <div class="absolute inset-y-0 flex items-center pl-2">
                  <svg class="w-4 h-4" aria-hidden="true" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <input class="w-full pl-8 pr-2 text-sm border-0 rounded-md form-input" type="text" placeholder="ค้นหา" aria-label="Search" style="background-color: #d2d5da; color: black">
              </div>
            </div>
          </div>
        </header>
        <main class="h-full overflow-y-auto">
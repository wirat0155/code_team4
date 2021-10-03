<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>IBS - Container Drop</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="http://localhost/code_team4/Assets/img/icon.ico" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="http://localhost/code_team4/Assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['http://localhost/code_team4/Assets/css/fonts.min.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="http://localhost/code_team4/Assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/code_team4/Assets/css/atlantis.min.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="http://localhost/code_team4/Assets/css/demo.css">

	<!-- Font Awesome 4 -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Font Awesome 5 -->
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

	<!-- jQuery CDN -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Semantic UI CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Semantic UI JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<style>
		body {
			color: #444444;
		}

		.ui.modal {
			min-width: 360px;
			min-height: 300px;
			height: 20%;
			top: 135px;
			max-width: 800px;
			margin-left: 250px;
		}

		@media only screen and (max-width: 767px) {
			.ui.modal {
				width: 95%;
				margin: 0;
				left: 2vw
			}
		}

		@media only screen and (min-width: 768px) {
			.ui.modal {
				width: 95%;
				margin: 0;
				left: 2.5vw;
			}
		}

		@media only screen and (min-width: 1000px) {
			.ui.modal {
				left: 13vw;
			}
		}

		@media only screen and (min-width: 1280px) {
			.ui.modal {
				left: 20vw;
			}
		}

		@media only screen and (min-width: 1368px) {
			.ui.modal {
				left: vw;
			}
		}

		@media only screen and (min-width: 1600px) {
			.ui.modal {
				left: 30vw;
			}
		}

		@media only screen and (min-width: 1920px) {
			.ui.modal {
				left: 30vw;
			}
		}

		.navbar-color {
			background-color: #041F47;
		}

		.content {
			margin-left: 250px;
		}
	</style>
</head>

<body>
	<div class="wrapper overlay-sidebar is-show">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header navbar-color">

				<button class="btn btn-toggle sidenav-overlay-toggler" onclick="slide_bar()" style="margin-right:20px;">
					<i class="icon-menu"></i>
				</button>

				<a href="<?php echo base_url() . '/Dashboard/dashboard_show' ?>" class="logo text-white">
					<img src="http://localhost/code_team4/upload/Logo_IBS.svg" alt="navbar brand" class="navbar-brand" style="width:10vh">
				</a>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg navbar-color">

				<div class="container-fluid">
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav nav-primary">

						<!-- Dashboard menu -->
						<li class="nav-item <?php if ($_SESSION['menu'] == 'Dashboard') echo 'active' ?>">
							<a href="<?php echo base_url() . '/Dashboard/dashboard_show' ?>">
								<i class="fas fa-chart-line"></i>
								<p>Dashboard</p>
							</a>
						</li>

						<!-- Service menu -->
						<li class="nav-item <?php if ($_SESSION['menu'] == 'Service_show') echo 'active' ?>">
							<a data-toggle="collapse" href="#service">
								<i class="fas fa-warehouse"></i>
								<p>Service Information</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="service">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo base_url() . '/Service_show/service_show_ajax' ?>">
											<span class="sub-item">Service list</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . '/Service_input/service_input' ?>">
											<span class="sub-item">Add service</span>
										</a>
									</li>
								</ul>
						</li>

						<!-- Customer menu -->
						<li class="nav-item <?php if ($_SESSION['menu'] == 'Customer_show') echo 'active' ?>">
							<a data-toggle="collapse" href="#customer">
								<i class="fas fa-user-alt"></i>
								<p>Customer Information</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="customer">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo base_url() . '/Customer_show/customer_show_ajax' ?>">
											<span class="sub-item">Customer list</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . '/Customer_input/customer_input' ?>">
											<span class="sub-item">Add customer</span>
										</a>
									</li>
								</ul>
						</li>

						<!-- Agent menu -->
						<li class="nav-item  <?php if ($_SESSION['menu'] == 'Agent_show') echo 'active' ?>">
							<a data-toggle="collapse" href="#agent">
								<i class="fas fa-user-friends"></i>
								<p>Agent Information</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="agent">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo base_url() . '/Agent_show/agent_show_ajax' ?>">
											<span class="sub-item">Agent list</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . '/Agent_input/agent_input' ?>">
											<span class="sub-item">Add agent</span>
										</a>
									</li>
								</ul>
						</li>

						<!-- Container menu -->
						<li class="nav-item <?php if ($_SESSION['menu'] == 'Container_show') echo 'active' ?>">
							<a data-toggle="collapse" href="#container">
								<i class="fas fa-truck-loading"></i>
								<p>Container Information</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="container">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo base_url() . '/Container_show/container_show_ajax' ?>">
											<span class="sub-item">Container list</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . '/Container_input/container_input' ?>">
											<span class="sub-item">Add container</span>
										</a>
									</li>
								</ul>
						</li>

						<!-- Driver menu -->
						<li class="nav-item  <?php if ($_SESSION['menu'] == 'Driver_show') echo 'active' ?>">
							<a data-toggle="collapse" href="#driver">
								<i class="far fa-address-card"></i>
								<p>Driver Information</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="driver">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo base_url() . '/Driver_show/driver_show_ajax' ?>">
											<span class="sub-item">Driver list</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . '/Driver_input/driver_input' ?>">
											<span class="sub-item">Add driver</span>
										</a>
									</li>
								</ul>
						</li>

						<!-- Car menu -->
						<li class="nav-item  <?php if ($_SESSION['menu'] == 'Car_show') echo 'active' ?>">
							<a data-toggle="collapse" href="#car">
								<i class="fas fa-truck"></i>
								<p>Car Information</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="car">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo base_url() . '/Car_show/car_show_ajax' ?>">
											<span class="sub-item">Car list</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . '/Car_input/car_input' ?>">
											<span class="sub-item">Add car</span>
										</a>
									</li>
								</ul>
						</li>

						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<!-- <h4 class="text-section" style="margin-top:200px">Set Up</h4> -->
						</li>

						<!-- Setup menu -->
						<li class="nav-item <?php if ($_SESSION['menu'] == 'Setting') echo 'active' ?>">
							<a href="<?php echo base_url() . '/Setting/setting_show' ?>" style="margin-top:270px">
								<i class="fas fa-cog"></i>
								<p>Set Up</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<script>
			// ย่อ ขยายหน้า ตอนกด slide bar
			function slide_bar() {
				console.log($('.toggled').length);
				if ($('.toggled').length == 0) {
					document.getElementsByClassName('content')[0].style.marginLeft = "250px";
				} else {
					document.getElementsByClassName('content')[0].style.marginLeft = "0px";
				}
			}
		</script>
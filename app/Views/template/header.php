<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Tables - Atlantis Lite Bootstrap 4 Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="http://localhost/code_team4/Assets/img/icon.ico" type="image/x-icon"/>
	
	<!-- Fonts and icons -->
	<script src="http://localhost/code_team4/Assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['http://localhost/code_team4/Assets/css/fonts.min.css']},
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

	<!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Semantic UI CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
        integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Semantic UI JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"
        integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Font Awesome 4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Font Awesome 5 -->
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

	<!-- Bootstrap 4 -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="../index.html" class="logo">
					<img src="http://localhost/code_team4/Assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
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
						<li class="nav-item">
							<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
								<i class="fas fa-chart-line"></i>
								<p>Dashboard</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="dashboard">
								<ul class="nav nav-collapse">
									<li>
										<a href="../../demo1/index.html">
											<span class="sub-item">Dashboard 1</span>
										</a>
									</li>
									<li>
										<a href="../../demo2/index.html">
											<span class="sub-item">Dashboard 2</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Modules</h4>
						</li>

						<!-- Service menu -->
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-warehouse"></i>
								<p>Service</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="../components/avatars.html">
											<span class="sub-item">Avatars</span>
										</a>
									</li>
									<li>
										<a href="../components/buttons.html">
											<span class="sub-item">Buttons</span>
										</a>
									</li>
							</ul>
						</li>

						<!-- Customer menu -->
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fa fa-users"></i>
								<p>Customer</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="../components/avatars.html">
											<span class="sub-item">Avatars</span>
										</a>
									</li>
									<li>
										<a href="../components/buttons.html">
											<span class="sub-item">Buttons</span>
										</a>
									</li>
							</ul>
						</li>

						<!-- Agent menu -->
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fa fa-user-secret"></i>
								<p>Agent</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="../components/avatars.html">
											<span class="sub-item">Avatars</span>
										</a>
									</li>
									<li>
										<a href="../components/buttons.html">
											<span class="sub-item">Buttons</span>
										</a>
									</li>
							</ul>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-truck-loading"></i>
								<p>Container</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="../components/avatars.html">
											<span class="sub-item">Avatars</span>
										</a>
									</li>
									<li>
										<a href="../components/buttons.html">
											<span class="sub-item">Buttons</span>
										</a>
									</li>
							</ul>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="far fa-address-card"></i>
								<p>Driver</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="../components/avatars.html">
											<span class="sub-item">Avatars</span>
										</a>
									</li>
									<li>
										<a href="../components/buttons.html">
											<span class="sub-item">Buttons</span>
										</a>
									</li>
							</ul>
						</li>

						<!-- Car menu -->
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-truck"></i>
								<p>Car</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="../components/avatars.html">
											<span class="sub-item">Avatars</span>
										</a>
									</li>
									<li>
										<a href="../components/buttons.html">
											<span class="sub-item">Buttons</span>
										</a>
									</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Add customer</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="<?php echo base_url() . '/Dashboard/dashboard_show'?>">
							<i class="flaticon-home"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url() . '/Customer_show/customer_show_ajax'?>">Customer</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url() . '/Customer_input/customer_input'?>">Add customer</a>
					</li>
				</ul>
			</div>

			<form id="add_customer_form" action="<?php echo base_url() . '/Customer_input/customer_insert'?>" method="POST">

			</form>
		</div>
	</div>
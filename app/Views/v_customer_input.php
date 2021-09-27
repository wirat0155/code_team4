<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Add customer</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
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
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Customer form</div>
								</div>
								<div class="card-body">
									<h3>1. Customer information</h3>
									<div class="row">
										<!-- Company name -->
                                        <div class="col-md-8">
											<div class="form-group">
												<label for="cus_company_name">Company name</label>
												<input type="text" class="form-control" id="cus_company_name" name="cus_company_name" placeholder="Company name">
                                                <small class="form-text text-muted">not more than 40 character, unique value</small>
											</div>
										</div>
                                    </div>

									<div class="row">
										<!-- Branch (optional) -->
										<div class="col-md-6">
											<div class="form-group">
												<label for="cus_branch">Branch <small class="text-info">(Optional)</small></label>
												<input type="text" class="form-control" id="cus_branch" name="cus_branch" placeholder="Branch">
                                                <small class="form-text text-muted">not more than 40 character</small>
											</div>
										</div>

										<!-- Tax -->
										<div class="col-md-6">
											<div class="form-group">
												<label for="cus_tax">Tax</label>
												<input type="text" class="form-control" id="cus_tax" name="cus_tax" placeholder="1234567890123">
											</div>
										</div>

										<!-- Address -->
										<div class="col-md-12">
											<div class="form-group">
												<label for="cus_address">Company address</label>
												<textarea class="form-control" id="cus_address" name="cus_address" placeholder="54/1 หมู่ 4 ต.นาป่า อ.เมืองชลบุรี จ.ชลุบรี"></textarea>
											</div>
										</div>
									</div>

									<h3>2. Contact information</h3>
									<div class="row">
										<!-- Firstname -->
										<div class="col-md-6">
											<div class="form-group">
												<label for="cus_firstname">Firstname</label>
												<input class="form-control" id="cus_firstname" name="cus_firstname" placeholder="Firstname" />
											</div>
										</div>

										<!-- Lastname -->
										<div class="col-md-6">
											<div class="form-group">
												<label for="cus_lastname">Lastname</label>
												<input class="form-control" id="cus_lastname" name="cus_lastname" placeholder="Lastname" />
											</div>
										</div>

										<!-- Email address -->
                                        <div class="col-md-8">
											<div class="form-group">
												<label for="cus_email">Email address</label>
												<input type="email" class="form-control" id="cus_email" name="cus_email" placeholder="Enter email">
												<small class="form-text text-muted">We'll never share your email with anyone else.</small>
											</div>
										</div>

										<!-- Telephone number -->
										<div class="col-md-4">
											<div class="form-group">
												<label for="cus_tel">Tel. number</label>
												<input type="tel" class="form-control" id="cus_tel" name="cus_tel" placeholder="Enter telephone number">
											</div>
										</div>
									</div>

								<div class="card-action">
                                    <input type="reset" class="ui button" value="Cancel">
                                    <button type="submit" class="ui positive button">
										<i class="plus icon"></i>
										Add customer
									</button>
								</div>
							</div>
						</div>
					</div>
                    </form>
				</div>
			</div>
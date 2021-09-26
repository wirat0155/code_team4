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
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Customer form</div>
								</div>
								<div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
											<div class="form-group">
												<label for="email">Company name<span class="text-danger">*</span></label>
												<input type="email" class="form-control" id="email" placeholder="Enter Email">
											</div>
										</div>
                                    </div>
									<div class="row">
										<div class="col-md-6 col-lg-4">
											<div class="form-group form-floating-label">
												<input id="" type="text" class="form-control input-border-bottom" required>
												<label for="inputFloatingLabel" class="placeholder">Company name</label>
											</div>
										</div>

                                        <div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Email Address <span class="text-danger">*</span></label>
												<input type="email" class="form-control" id="email2" placeholder="Enter Email">
												<small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small>
											</div>
										</div>
                                        <div class="col-md-6 col-lg-4">
											<div class="form-group form-floating-label">
                                                <label for="country">Country <span class="text-danger">*</span></label>
												<div class="ui fluid search selection dropdown">
                                                    <input type="hidden" name="country" id="country">
                                                    <i class="dropdown icon"></i>
                                                    <div class="default text">Select Country</div>
                                                    <div class="menu">
                                                    <div class="item" data-value="af"><i class="af flag"></i>Afghanistan</div>
                                                    <div class="item" data-value="ax"><i class="ax flag"></i>Aland Islands</div>
                                                </div>
                                            </div>
										</div>
                                        <script>
                                            $('.ui.fluid.search.selection.dropdown').dropdown();
                                        </script>


                                        

									</div>
								</div>
								<div class="card-action">
                                    <button class="ui button">Cancel</button>
                                    <button class="ui positive button">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	<footer class="footer">
			<div class="container-fluid">
				<nav class="pull-left">
					<ul class="nav">
						<li class="nav-item">
							<a class="nav-link" href="https://www.themekita.com">
								ThemeKita
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
								Help
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
								Licenses
							</a>
						</li>
					</ul>
				</nav>
				<div class="copyright ml-auto">
					2018, made with by <a href="https://www.themekita.com">ThemeKita</a>
				</div>				
			</div>
	</footer>
</div>

<!--   Core JS Files   -->
	<script src="http://localhost/code_team4/Assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="http://localhost/code_team4/Assets/js/core/popper.min.js"></script>
	<script src="http://localhost/code_team4/Assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="http://localhost/code_team4/Assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="http://localhost/code_team4/Assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	
	<!-- jQuery Scrollbar -->
	<script src="http://localhost/code_team4/Assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Datatables -->
	<script src="http://localhost/code_team4/Assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Atlantis JS -->
	<script src="http://localhost/code_team4/Assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="http://localhost/code_team4/Assets/js/setting-demo2.js"></script>
	<!-- jQuery Validation -->

	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
	<script>
		$(document).ready(function() {
			$('#service_list_table').DataTable({"order": []});
			if ($('#add_customer_form').length > 0) {
				console.log($('#add_customer_form').length);
				$('#add_customer_form').validate({
					rules: {
						cus_company_name: {
							required: true
						},
						cus_tax: {
							required: true,
							minlength: 13,
							maxlength: 13
						},
						cus_address: {
							required: true
						},
						cus_firstname: {
							required: true
						},
						cus_lastname: {
							required: true
						},
						cus_tel: {
							required: true,
							minlength: 10,
							maxlength: 10
						},
						cus_email: {
							required: true,
							email: true
						}

					},
					messages: {
						cus_company_name: {
							required: 'Please enter a company name.'
						},
						cus_tax: {
							required: 'กรุณากรอกหมายเลขผู้เสียภาษี',
							minlength: 'กรุณากรอกตัวเลขจำนวน 13 ตัวอักษร',
							maxlength: 'กรุณากรอกตัวเลขจำนวน 13 ตัวอักษร'
						},
						cus_address: {
							required: 'กรุณากรอกที่อยู่'
						},
						cus_firstname: {
							required: 'กรุณากรอกชื่อจริง'
						},
						cus_lastname: {
							required: 'กรุณากรอกนามสกุล'
						},
						cus_tel: {
							required: 'กรุณากรอกเบอร์โทรศัพท์',
							minlength: 'กรุณากรอกตัวเลขจำนวน 10 ตัวอักษร',
							maxlength: 'กรุณากรอกตัวเลขจำนวน 10 ตัวอักษร'
						},
						cus_email: {
							required: 'กรุณากรอกอีเมล',
							email: 'กรุณากรอกอีเมลให้ถูกต้อง'
						}
					}
				})
			}
		});
	</script>

	<script>
		$('.ui.dropdown').dropdown();   // make it dropdown
	</script>

</body>
</html>
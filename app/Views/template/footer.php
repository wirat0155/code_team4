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

    <script>
        $('.ui.dropdown').dropdown();
    </script>

	<!--   Core JS Files   -->
	<script src="http://localhost/code_team4/Assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="http://localhost/code_team4/Assets/js/core/popper.min.js"></script>
	<script src="http://localhost/code_team4/Assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="http://localhost/code_team4/Assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="http://localhost/code_team4/Assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- Daterange -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

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
                    },
                    agn_company_name: {
                        required: true
                    }

                },
                messages: {
                    cus_company_name: {
                        required: 'Please enter a company name.'
                    },
                    cus_tax: {
                        required: 'Please enter a tax number',
                        minlength: 'Tax number should not less than 13 digits',
                        maxlength: 'Tax number should not more than 13 digits',
                    },
                    cus_address: {
                        required: 'Please enter an address'
                    },
                    cus_firstname: {
                        required: 'Please enter a firstname'
                    },
                    cus_lastname: {
                        required: 'Please enter a lastname'
                    },
                    cus_tel: {
                        required: 'Please enter a tel number',
                        minlength: 'Tel. number should not less than 10 digits',
                        maxlength: 'Tel. number should not more than 10 digits'
                    },
                    cus_email: {
                        required: 'Please enter an email address',
                        email: 'Please enter a valid email address'
                    },
                    agn_company_name: {
                        required: 'Please enter a company name.'
                    },
                }
            })
        }
    });

    $('input[name="date_range"]').daterangepicker({
        "locale": {
            "format": 'DD/MM/YYYY',
            "firstDay": 1
        },
        opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });

    $('.applyBtn').attr({type: 'submit', form: 'form_date'});
    
	</script>
    
	</body>

	</html>

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
                }

            },
            messages: {
                cus_company_name: {
                    required: 'กรุณากรอกชื่อบริษัท'
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

    if ($('#add_service_form').length > 0) {
        $('#add_service_form').validate({
            rules: {
                con_number: {
                    required: true,
                    maxlength: 12
                },
                con_max_weight: {
                    required: true,
                    min: 0,
                    max: 40
                },
                con_tare_weight: {
                    required: true,
                    min: 0,
                    max: 40
                },
                con_net_weight: {
                    required: true,
                    min: 0,
                    max: 40
                },
                con_cube: {
                    required: true,
                    min: 0,
                    max: 100
                },
                agn_company_name: {
                    required: true
                },
                agn_tax: {
                    required: true,
                    minlength: 13,
                    maxlength: 13
                },
                agn_address: {
                    required: true
                },
                agn_firstname: {
                    required: true
                },
                agn_lastname: {
                    required: true
                },
                agn_tel: {
                    required: true,
                    minlength: 10,
                    maxlength: 10
                },
                agn_email: {
                    required: true,
                    email: true
                },
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
                ser_weight: {
                    required: true
                },
                ser_arrivals_date: {
                    required: true
                },
                ser_departure_date: {
                    required: true
                },
                ser_arrivals_location: {
                    required: true
                },
                ser_departure_location: {
                    required: true
                }
            },
            messages: {
                con_number: {
                    required: 'กรุณากรอกหมายเลขตู้',
                    maxlength: 'กรุณากรอกตามฟอร์แมต'
                },
                con_max_weight: {
                    required: 'กรุณากรอกน้ำหนักสูงสุด',
                    min: 'กรุณากรอกอย่างน้อย 0',
                    max: 'กรุณากรอกไม่เกิน 40'
                },
                con_tare_weight: {
                    required: 'กรุณากรอกน้ำหนักตู้เปล่า',
                    min: 'กรุณากรอกอย่างน้อย 0',
                    max: 'กรุณากรอกไม่เกิน 40'
                },
                con_net_weight: {
                    required: 'กรุณากรอกน้ำหนักสินค้าสูงสุด',
                    min: 'กรุณากรอกอย่างน้อย 0',
                    max: 'กรุณากรอกไม่เกิน 40'
                },
                con_cube: {
                    required: 'กรุณากรอกหมายเลขตู้',
                    min: 'กรุณากรอกอย่างน้อย 0',
                    max: 'กรุณากรอกไม่เกิน 100'
                },
                agn_company_name: {
                    required: 'กรุณากรอกชื่อบริษัท'
                },
                agn_tax: {
                    required: 'กรุณากรอกหมายเลขผู้เสียภาษี',
                    minlength: 'กรุณากรอกตัวเลขจำนวน 13 ตัวอักษร',
                    maxlength: 'กรุณากรอกตัวเลขจำนวน 13 ตัวอักษร'
                },
                agn_address: {
                    required: 'กรุณากรอกที่อยู่'
                },
                agn_firstname: {
                    required: 'กรุณากรอกชื่อจริง'
                },
                agn_lastname: {
                    required: 'กรุณากรอกนามสกุล'
                },
                agn_tel: {
                    required: 'กรุณากรอกเบอร์โทรศัพท์',
                    minlength: 'กรุณากรอกตัวเลขจำนวน 10 ตัวอักษร',
                    maxlength: 'กรุณากรอกตัวเลขจำนวน 10 ตัวอักษร'
                },
                agn_email: {
                    required: 'กรุณากรอกอีเมล',
                    email: 'กรุณากรอกอีเมลให้ถูกต้อง'
                },
                cus_company_name: {
                    required: 'กรุณากรอกชื่อบริษัท'
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
                },
                ser_weight: {
                    required: 'กรุณากรอกน้ำหนักปัจจุบัน'
                },
                ser_arrivals_date: {
                    required: 'กรุณาเลือกวันที่ตู้เข้าลาน'
                },
                ser_departure_date: {
                    required: 'กรุณาเลือกวันที่ตู้ออกลาน'
                },
                ser_arrivals_location: {
                    required: 'กรุณากรอกสถานที่ต้นทาง'
                },
                ser_departure_location: {
                    required: 'กรุณากรอกสถานที่ปลายทาง'
                }
            }
        })
    }

    if ($('#add_agent_form').length > 0) {
        $('#add_agent_form').validate({
            rules: {
                agn_company_name: {
                    required: true
                },
                agn_tax: {
                    required: true,
                    minlength: 13,
                    maxlength: 13
                },
                agn_address: {
                    required: true
                },
                agn_firstname: {
                    required: true
                },
                agn_lastname: {
                    required: true
                },
                agn_tel: {
                    required: true,
                    minlength: 10,
                    maxlength: 10
                },
                agn_email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                agn_company_name: {
                    required: 'กรุณากรอกชื่อบริษัท'
                },
                agn_tax: {
                    required: 'กรุณากรอกหมายเลขผู้เสียภาษี',
                    minlength: 'กรุณากรอกตัวเลขจำนวน 13 ตัวอักษร',
                    maxlength: 'กรุณากรอกตัวเลขจำนวน 13 ตัวอักษร'
                },
                agn_address: {
                    required: 'กรุณากรอกที่อยู่'
                },
                agn_firstname: {
                    required: 'กรุณากรอกชื่อจริง'
                },
                agn_lastname: {
                    required: 'กรุณากรอกนามสกุล'
                },
                agn_tel: {
                    required: 'กรุณากรอกเบอร์โทรศัพท์',
                    minlength: 'กรุณากรอกตัวเลขจำนวน 10 ตัวอักษร',
                    maxlength: 'กรุณากรอกตัวเลขจำนวน 10 ตัวอักษร'
                },
                agn_email: {
                    required: 'กรุณากรอกอีเมล',
                    email: 'กรุณากรอกอีเมลให้ถูกต้อง'
                }
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

$('.applyBtn').attr({
    type: 'submit',
    form: 'form_date'
});
	</script>

	</body>

	</html>
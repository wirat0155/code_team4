<!--
* footer
* Display footer
* @input    -
* @output   footer page, include JS
* @author   Wirat
* @Create Date  2564-07-28
*/
-->

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
    if ($('#customer_form').length > 0) {
        $('#customer_form').validate({
            rules: {
                cus_company_name: {
                    required: true,
                    maxlength: 255
                },
                cus_branch: {
                    maxlength: 255
                },
                cus_tax: {
                    required: true,
                    number: true,
                    minlength: 13,
                    maxlength: 13
                },
                cus_address: {
                    required: true,
                    maxlength: 255
                },
                cus_firstname: {
                    required: true,
                    maxlength: 255
                },
                cus_lastname: {
                    required: true,
                    maxlength: 255
                },
                cus_tel: {
                    required: true,
                    minlength: 9,
                    maxlength: 10
                },
                cus_email: {
                    required: true,
                    email: true,
                    maxlength: 40
                }
            },
            messages: {
                cus_company_name: {
                    required: 'Please enter a company name',
                    maxlength: 'Please enter not more than 255 character'
                },
                cus_branch: {
                    maxlength: 'Please enter not more than 255 character'
                },
                cus_tax: {
                    required: 'Please enter a tax number',
                    minlength: 'Please enter 13 digit long',
                    maxlength: 'Please enter 13 digit long',
                    number: 'Pleaser enter only number'
                },
                cus_address: {
                    required: 'Please enter a company location',
                    maxlength: 'Please enter not more than 255 character'
                },
                cus_firstname: {
                    required: 'Please enter a first name',
                    maxlength: 'Please enter not more than 255 character'
                },
                cus_lastname: {
                    required: 'Please enter a last name',
                    maxlength: 'Please enter not more than 255 character'
                },
                cus_tel: {
                    required: 'Please enter a contact number',
                    minlength: 'Please enter 9-10 digit long',
                    maxlength: 'Please enter 9-10 digit long'
                },
                cus_email: {
                    required: 'Please enter an email',
                    email: 'Please enter a valid email',
                    maxlength: 'Please enter not more than 40 character'
                }
            }
        })
    }

    if ($('#service_form').length > 0) {
        $('#service_form').validate({
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
                    required: true,
                    maxlength: 255
                },
                agn_tax: {
                    required: true,
                    number: true,
                    minlength: 13,
                    maxlength: 13
                },
                agn_address: {
                    required: true,
                    maxlength: 255
                },
                agn_firstname: {
                    required: true,
                    maxlength: 255
                },
                agn_lastname: {
                    required: true,
                    maxlength: 255
                },
                agn_tel: {
                    required: true,
                    minlength: 9,
                    maxlength: 10
                },
                agn_email: {
                    required: true,
                    email: true,
                    maxlength: 40
                },
                cus_name : {
                    required: true
                },
                cus_company_name: {
                    required: true,
                    maxlength: 255
                },
                cus_branch: {
                    maxlength: 255
                },
                cus_tax: {
                    required: true,
                    number: true,
                    minlength: 13,
                    maxlength: 13
                },
                cus_address: {
                    required: true,
                    maxlength: 255
                },
                cus_firstname: {
                    required: true,
                    maxlength: 255
                },
                cus_lastname: {
                    required: true,
                    maxlength: 255
                },
                cus_tel: {
                    required: true,
                    minlength: 9,
                    maxlength: 10
                },
                cus_email: {
                    required: true,
                    email: true,
                    maxlength: 40
                },
                ser_weight: {
                    required: true
                },
                ser_arrivals_date: {
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
                    required: 'Please enter a container number',
                    maxlength: 'Too long container number'
                },
                con_max_weight: {
                    required: 'Please enter a max weight',
                    min: 'Minimum value is 0',
                    max: 'Maximum value is 40'
                },
                con_tare_weight: {
                    required: 'Please enter a tare weight',
                    min: 'Minimum value is 0',
                    max: 'Maximum value is 40'
                },
                con_net_weight: {
                    required: 'Please enter a net weight',
                    min: 'Minimum value is 0',
                    max: 'Maximum value is 40'
                },
                con_cube: {
                    required: 'Please enter a cube',
                    min: 'Minimum value is 0',
                    max: 'Maximum value is 100'
                },
                agn_company_name: {
                    required: 'Please enter a company name',
                    maxlength: 'Please enter not more than 255 character'
                },
                agn_tax: {
                    required: 'Please enter a tax number',
                    minlength: 'Please enter 13 digit long',
                    maxlength: 'Please enter 13 digit long',
                    number: 'Pleaser enter only number'
                },
                agn_address: {
                    required: 'Please enter an address',
                    maxlength: 'Please enter not more than 255 character'
                },
                agn_firstname: {
                    required: 'Please enter a first name',
                    maxlength: 'Please enter not more than 255 character'
                },
                agn_lastname: {
                    required: 'Please enter a last name',
                    maxlength: 'Please enter not more than 255 character'
                },
                agn_tel: {
                    required: 'Please enter a contact number',
                    minlength: 'Please enter 9-10 digit long',
                    maxlength: 'Please enter 9-10 digit long'
                },
                agn_email: {
                    required: 'Please enter an email',
                    email: 'Please enter a valid email',
                    maxlength: 'Please enter not more than 40 character'
                },
                cus_name : {
                    required: 'Please select a customer'
                },
                cus_company_name: {
                    required: 'Please enter a company name',
                    maxlength: 'Please enter not more than 255 character'
                },
                cus_branch: {
                    maxlength: 'Please enter not more than 255 character'
                },
                cus_tax: {
                    required: 'Please enter a tax number',
                    minlength: 'Please enter 13 digit long',
                    maxlength: 'Please enter 13 digit long',
                    number: 'Pleaser enter only number'
                },
                cus_address: {
                    required: 'Please enter an address',
                    maxlength: 'Please enter not more than 255 character'
                },
                cus_firstname: {
                    required: 'Please enter a first name',
                    maxlength: 'Please enter not more than 255 character'
                },
                cus_lastname: {
                    required: 'Please enter a last name',
                    maxlength: 'Please enter not more than 255 character'
                },
                cus_tel: {
                    required: 'Please enter a contact number',
                    minlength: 'Please enter 9-10 digit long',
                    maxlength: 'Please enter 9-10 digit long'
                },
                cus_email: {
                    required: 'Please enter an email',
                    email: 'Please enter a valid email',
                    maxlength: 'Please enter not more than 40 character'
                },
                ser_weight: {
                    required: 'Please enter a current weight'
                },
                ser_arrivals_date: {
                    required: 'Please enter an arrivals date'
                },
                ser_arrivals_location: {
                    required: 'Please enter an arrivals location'
                },
                ser_departure_location: {
                    required: 'Please enter a departure location'
                }
            }
        })
    }

    if ($('#container_form').length > 0) {
        $('#container_form').validate({
            rules: {
                con_number: {
                    required: true,
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
                    minlength: 9,
                    maxlength: 10
                },
                agn_email: {
                    required: true,
                    email: true
                }

            },
            messages: {
                con_number: {
                    required: 'Please enter a container number'
                },
                con_max_weight: {
                    required: 'Please enter a max weight',
                    min: 'Minimum value is 0',
                    max: 'Maximum value is 40'
                },
                con_tare_weight: {
                    required: 'Please enter a tare weight',
                    min: 'Minimum value is 0',
                    max: 'Maximum value is 40'
                },
                con_net_weight: {
                    required: 'Please enter a net weight',
                    min: 'Minimum value is 0',
                    max: 'Maximum value is 40'
                },
                con_cube: {
                    required: 'Please enter a cube',
                    min: 'Minimum value is 0',
                    max: 'Maximum value is 100'
                },
                agn_company_name: {
                    required: 'Please enter a company name'
                },
                agn_tax: {
                    required: 'Please enter a tax number',
                    minlength: 'Please enter 13 digit long',
                    maxlength: 'Please enter 13 digit long'
                },
                agn_address: {
                    required: 'Please enter an address'
                },
                agn_firstname: {
                    required: 'Please enter a first name'
                },
                agn_lastname: {
                    required: 'Please enter a last name'
                },
                agn_tel: {
                    required: 'Please enter a contact number',
                    minlength: 'Please enter 9-10 digit long',
                    maxlength: 'Please enter 9-10 digit long'
                },
                agn_email: {
                    required: 'Please enter an email',
                    email: 'Please enter a valid email'
                }
            }
        })
    }
    
    if ($('#agent_form').length > 0) {
        $('#agent_form').validate({
            rules: {
                agn_company_name: {
                    required: true,
                    maxlength: 255
                },
                agn_tax: {
                    required: true,
                    number: true,
                    minlength: 13,
                    maxlength: 13
                },
                agn_address: {
                    required: true,
                    maxlength: 255
                },
                agn_firstname: {
                    required: true,
                    maxlength: 255
                },
                agn_lastname: {
                    required: true,
                    maxlength: 255
                },
                agn_tel: {
                    required: true,
                    minlength: 9,
                    maxlength: 10
                },
                agn_email: {
                    required: true,
                    email: true,
                    maxlength: 40
                }
            },
            messages: {
                agn_company_name: {
                    required: 'Please enter a company name',
                    maxlength: 'Please enter not more than 255 character'
                },
                agn_tax: {
                    required: 'Please enter a tax number',
                    minlength: 'Please enter 13 digit long',
                    maxlength: 'Please enter 13 digit long',
                    number: 'Pleaser enter only number'
                },
                agn_address: {
                    required: 'Please enter an address',
                    maxlength: 'Please enter not more than 255 character'
                },
                agn_firstname: {
                    required: 'Please enter a first name',
                    maxlength: 'Please enter not more than 255 character'
                },
                agn_lastname: {
                    required: 'Please enter a last name',
                    maxlength: 'Please enter not more than 255 character'
                },
                agn_tel: {
                    required: 'Please enter a contact number',
                    minlength: 'Please enter 9-10 digit long',
                    maxlength: 'Please enter 9-10 digit long'
                },
                agn_email: {
                    required: 'Please enter an email',
                    email: 'Please enter a valid email',
                    maxlength: 'Please enter not more than 40 character'
                }
            }
        })
    }

    if ($('#driver_form').length > 0) {
        $('#driver_form').validate({
            rules: {
                dri_name: {
                    required: true
                },
                dri_card_number: {
                    required: true,
                    minlength: 13,
                    maxlength: 13
                },
                dri_license: {
                    required: true,
                    minlength: 8,
                    maxlength: 8
                },
                dri_tel: {
                    required: true,
                    minlength: 9,
                    maxlength: 10
                },
                dri_car_id: {
                    required: true,
                },
                dri_license_type: {
                    required: true,
                },
                dri_status: {
                    required: true,
                },
                dri_date_start: {
                    required: true
                },
                dri_profile_image: {
                    required: true
                }
            },
            messages: {
                dri_name: {
                    required: 'Please enter a driver name'
                },
                dri_card_number: {
                    required: 'Please enter a card number',
                    minlength: 'Please enter 13 digit long',
                    maxlength: 'Please enter 13 digit long'
                },
                dri_license: {
                    required: 'Please enter a license number',
                    minlength: 'Please enter 8 digit long',
                    maxlength: 'Please enter 8 digit long'
                },
                dri_tel: {
                    required: 'Please enter a phone number',
                    minlength: 'Please enter 9-10 digit long',
                    maxlength: 'Please enter 9-10 digit long'
                },
                dri_car_id: {
                    required: 'Please select a car id'
                },
                dri_license_type: {
                    required: 'Please select a license type'
                },
                dri_status: {
                    required: 'Please select a driver status'
                },
                dri_date_start: {
                    required: 'Please enter start date'
                },
                dri_profile_image: {
                    required: 'Please upload profile image'
                }
            }
        })
    }

    if ($('#car_form').length > 0) {
        $('#car_form').validate({
            rules: {
                car_number: {
                    required: true
                },
                car_code: {
                    required: true
                },
                car_brand: {
                    required: true
                },
                car_branch: {
                    required: true
                },
                car_prov_id: {
                    required: true
                },
                car_chassis_number: {
                    required: true
                },
                car_register_year: {
                    required: true,
                    min: 1900,
                    max: 2099
                },
                car_weight: {
                    required: true,
                    min: 0
                },
                car_fuel_type: {
                    required: true
                },
                car_image: {
                    required: true
                }
            },
            messages: {
                car_number: {
                    required: 'Please enter a car number'
                },
                car_code: {
                    required: 'Please enter a car code'
                },
                car_brand: {
                    required: 'Please enter a brand'
                },
                car_branch: {
                    required: 'Please enter a branch'
                },
                car_prov_id: {
                    required: 'Please select a province'
                },
                car_chassis_number: {
                    required: 'Please enter a chassis number'
                },
                car_register_year: {
                    required: 'Please enter a register year',
                    min: 'Minimum value is 1900',
                    max: 'Maximum value is 2099'
                },
                car_weight: {
                    required: 'Please enter a weight',
                    min: 'Minimum value is 0'
                },
                car_fuel_type: {
                    required: 'Please enter a fuel type'
                },
                car_image: {
                    required: 'Please upload image'
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
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format(
        'YYYY-MM-DD'));
});

$('.applyBtn').attr({
    type: 'submit',
    form: 'form_date'
});
	</script>

        <!-- ?????????????????????????????? -->

        <style>
            .switch-block div button{
                margin-top: 10px !important;
            }
        </style>

        <div class="custom-template">
			<div class="title">Sum Link</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<div>
                            <button class="ui teal button"  onclick="window.open('\/\/semantic-ui.com/elements/button.html', '_blank')" > Semantic-ui </button>
                            <button class="ui orange button"  onclick="window.open('\/\/localhost/phpmyadmin/', '_blank')" > Database </button>
                            <button class="ui blue button"  onclick="window.open('\/\/themekita.com/demo-atlantis-lite-bootstrap/livepreview/examples/demo1/', '_blank')" > Template </button>
                        </div>
					</div>
				</div>
			</div>
			<div class="custom-toggle toggled" onclick="open_set()">
				<i class="flaticon-settings"></i>
			</div>
		</div>

        <script>
            function open_set(){
                if($('.custom-template').hasClass('open')){
                    $('.custom-template').removeClass('open');
                }else{
                    $('.custom-template').addClass('open');
                }
            }
        </script>

	</body>

	</html>

<?php
// Function: used to convert a string to revese in order
/*
* tel_format
* แสดงเบอร์โทรแบบ xxx-xxx-xxxx  
* @author 
* @Create Date 2564-07-30
* @Update Date
*/
  function tel_format(string $string)
  {
    return substr($string, 0, 3) . '-' . substr($string, 3, 3) . '-' . substr($string, 6);
  }
/*
* date_thai
* แสดงวันที่ foemat ไทย และเวลา ชม. กับนาที  
* @author Natdanai
* @Create Date 2564-07-30
* @Update Date
*/
  function date_thai($strDate)
  {
    $str_year = date("Y",strtotime($strDate))+543;
    $str_month= date("n",strtotime($strDate));
    $str_day= date("j",strtotime($strDate));
    $str_hour= date("H",strtotime($strDate));
    $str_min= date("i",strtotime($strDate));
    $str_month_cut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $str_month_thai=$str_month_cut[$str_month];
    return "$str_day $str_month_thai $str_year $str_hour:$str_min";
  } 
/*
* datetime_format_value
* แสดงวันที่ ในรูปแบบ yyyy/mm/ddThh/mm/ss เพื่อไว้แสดง value ใน v_service_edit
* @author Natdanai
* @Create Date 2564-08-08
* @Update Date
*/
  function datetime_format_value(string $string)
  {
      return substr($string, 0, 10) . 'T' . substr($string, 11); 
  }

  function show_add_service_form() {
    $elem = '<div class="container row">';
		$elem .= '<center>';
		$elem .= '<div class="form-group">';
		$elem .= '<label class="form-label">Step</label>';
		$elem .= '<div class="selectgroup w-100">';
    $elem .= '<label class="selectgroup-item">';
		$elem .= '<input type="radio" name="value" value="150" class="selectgroup-input" onclick="show_service_form()" id="service_step">';
		$elem .= '<span class="selectgroup-button selectgroup-button-icon">';
    $elem .= '<i class="flaticon-home"></i>';
    $elem .= '</span>';
		$elem .= '</label>';
    $elem .= '<label class="selectgroup-item">';
		$elem .= '<input type="radio" name="value" value="150" class="selectgroup-input" onclick="show_container_form()" id="container_step">';
		$elem .= '<span class="selectgroup-button">Container</span>';
		$elem .= '</label>';
		$elem .= '<label class="selectgroup-item">';
		$elem .= '<input type="radio" name="value" value="150" class="selectgroup-input" onclick="show_agent_form()" id="agent_step">';
		$elem .= '<span class="selectgroup-button">Agent</span>';
		$elem .= '</label>';
		$elem .= '<label class="selectgroup-item">';
		$elem .= '<input type="radio" name="value" value="200" class="selectgroup-input" onclick="show_customer_form()" id="customer_step">';
		$elem .= '<span class="selectgroup-button">Customer</span>';
		$elem .= '</label>';
		$elem .= '</div>';
		$elem .= '</div>';
		$elem .= '</center>';
		$elem .= '</div>';
    return $elem;
  }

  function show_agent_form() {
    $elem = '<div class="col-md-2 input-label">';
    $elem .= '<div class="form-group">';
    $elem .= '<label for="agn_tax">Tax number </label>';
    $elem .= '</div>';
    $elem .= '</div>';
    $elem .= '<div class="col-md-6 " style="margin-right: 10%;">';
    $elem .= '<input type="text" class="form-control" id="agn_tax" name="agn_tax" placeholder="12345678">';
    $elem .= '</div>';

    $elem .= '<div class="col-md-2 input-label">';
    $elem .= '<div class="form-group">';
    $elem .= '<label for="agn_address">Company location </label>';
    $elem .= '</div>';
    $elem .= '</div>';
    $elem .= '<div class="col-md-6 " style="margin-right: 10%;">';
    $elem .= '<textarea type="text" class="form-control" id="agn_address" name="agn_address" placeholder="Company location"></textarea>';
    $elem .= '</div>';
    $elem .= '</div>';
    $elem .= '<h3>2. Contact information</h3>';
    $elem .= '<div class="row">';
    $elem .= '<div class="col-md-2 input-label">';
    $elem .= '<div class="form-group">';
    $elem .= '<label for="agn_firstname">First name </label>';
    $elem .= '</div>';
    $elem .= '</div>';
    $elem .= '<div class="col-md-6 " style="margin-right: 10%;">';
    $elem .= '<input type="text" class="form-control" id="agn_firstname" name="agn_firstname" placeholder="First name">';
    $elem .= '</div>';
    $elem .= '<div class="col-md-2 input-label">';
    $elem .= '<div class="form-group">';
    $elem .= '<label for="agn_lastname">Last name </label>';
    $elem .= '</div>';
    $elem .= '</div>';
    $elem .= '<div class="col-md-6 " style="margin-right: 10%;">';
    $elem .= '<input type="text" class="form-control" id="agn_lastname" name="agn_lastname" placeholder="Last name">';
    $elem .= '</div>';
    $elem .= '<div class="col-md-2 input-label">';
    $elem .= '<div class="form-group">';
    $elem .= '<label for="agn_tel">Contact number </label>';
    $elem .= '</div>';
    $elem .= '</div>';
    $elem .= '<div class="col-md-6 ">';
    $elem .= '<div class="input-group" style="margin-right: 10%;">';
    $elem .= '<div class="input-group-prepend ">';
    $elem .= '<span class="input-group-text "><i class="fas fa-phone"></i></span>';
    $elem .= '</div>';
    $elem .= '<input type="tel" class="form-control" id="agn_tel" name="agn_tel" placeholder="xxx-xxx-xxxx ">';
    $elem .= '</div>';
    $elem .= '</div>';

    $elem .= '<div class="col-md-2 input-label">';
    $elem .= '<div class="form-group">';
    $elem .= '<label for="agn_email">Email </label>';
    $elem .= '</div>';
    $elem .= '</div>';
    $elem .= '<div class="col-md-6">';
    $elem .= '<div class="input-group" style="margin-right: 10%;">';
    $elem .= '<div class="input-group-prepend ">';
    $elem .= '<span class="input-group-text "><i class="fas fa-envelope"></i></span>';
    $elem .= '</div>';
    $elem .= '<input type="email" class="form-control" id="agn_email" name="agn_email" placeholder="example@gmail.com">';
    $elem .= '</div>';
    $elem .= '</div>';
    $elem .= '</div>';
    $elem .= '</div>';
    $elem .= '</div>';
    return $elem;
  }
  function show_customer_form() {
    $elem = '<div class="col-md-2 input-label">';
    $elem .='<div class="form-group">';
    $elem .='<label for="cus_branch">Branch <b style="color: #0F7EEA;">(Optional)</b></label>';
    $elem .='</div>';
    $elem .='</div>';
    $elem .='<div class="col-md-2">';
    $elem .='<input type="text" class="form-control" id="cus_branch" name="cus_branch" placeholder="Branch">';
    $elem .='</div>';

    $elem .='<div class="col-md-1">';
    $elem .='<div class="form-group">';
    $elem .='<label for="cus_tax">Tax number </label>';
    $elem .='</div>';
    $elem .='</div>';
    $elem .='<div class="col-md-3">';
    $elem .='<input type="text" class="form-control" id="cus_tax" name="cus_tax" placeholder="12345678">';
    $elem .='</div>';


    $elem .='<div class="col-md-2 input-label">';
    $elem .='<div class="form-group">';
    $elem .='<label for="cus_address">Company location </label>';
    $elem .='</div>';
    $elem .='</div>';
    $elem .='<div class="col-md-6" style="margin-right: 10%;">';
    $elem .='<textarea type="text" class="form-control" id="cus_address" name="cus_address" placeholder="Company location"></textarea>';
    $elem .='</div>';
    $elem .='</div>';

    $elem .='<h3>2. Contact information</h3>';
    $elem .='<div class="row">';
    $elem .='<div class="col-md-2 input-label">';
    $elem .='<div class="form-group">';
    $elem .='<label for="cus_firstname">First name </label>';
    $elem .='</div>';
    $elem .='</div>';
    $elem .='<div class="col-md-6" style="margin-right: 10%;">';
    $elem .='<input type="text" class="form-control" id="cus_firstname" name="cus_firstname" placeholder="First name">';
    $elem .='</div>';
    $elem .='<div class="col-md-2 input-label">';
    $elem .='<div class="form-group">';
    $elem .='<label for="cus_lastname">Last name </label>';
    $elem .='</div>';
    $elem .='</div>';
    $elem .='<div class="col-md-6" style="margin-right: 10%;">';
    $elem .='<input type="text" class="form-control" id="cus_lastname" name="cus_lastname" placeholder="Last name">';
    $elem .='</div>';
    $elem .='<div class="col-md-2 input-label">';
    $elem .='<div class="form-group">';
    $elem .='<label for="cus_tel">Contact number </label>';
    $elem .='</div>';
    $elem .='</div>';
    $elem .='<div class="col-md-6">';
    $elem .='<div class="input-group" style="margin-right: 10%;">';
    $elem .='<div class="input-group-prepend ">';
    $elem .='<span class="input-group-text "><i class="fas fa-phone"></i></span>';
    $elem .='</div>';
    $elem .='<input type="tel" class="form-control" id="cus_tel" name="cus_tel" placeholder="xxx-xxx-xxxx ">';
    $elem .='</div>';
    $elem .='</div>';
    $elem .='<div class="col-md-2 input-label">';
    $elem .='<div class="form-group">';
    $elem .='<label for="cus_email">Email </label>';
    $elem .='</div>';
    $elem .='</div>';
    $elem .='<div class="col-md-6">';
    $elem .='<div class="input-group" style="margin-right: 10%;">';
    $elem .='<div class="input-group-prepend ">';
    $elem .='<span class="input-group-text "><i class="fas fa-envelope"></i></span>';
    $elem .='</div>';
    $elem .='<input type="email" class="form-control" id="cus_email" name="cus_email" placeholder="example@gmail.com">';
    $elem .='</div>';
    $elem .='</div>';
    $elem .='</div>';
    $elem .='</div>';
    $elem .='</div>';
    return $elem; 
  }
?>
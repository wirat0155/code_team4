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

  function show_add_customer_form() {
    $elem = '<div class="container row">';
		$elem .= '<center>';
		$elem .= '<div class="form-group">';
		$elem .= '<label class="form-label">Step</label>';
		$elem .= '<div class="selectgroup w-100">';
		$elem .= '<label class="selectgroup-item">';
		$elem .= '<input type="radio" name="value" value="50" class="selectgroup-input" checked="">';
		$elem .= '<span class="selectgroup-button">Container</span>';
		$elem .= '</label>';
		$elem .= '<label class="selectgroup-item">';
		$elem .= '<input type="radio" name="value" value="100" class="selectgroup-input">';
		$elem .= '<span class="selectgroup-button">Service</span>';
		$elem .= '</label>';
		$elem .= '<label class="selectgroup-item">';
		$elem .= '<input type="radio" name="value" value="150" class="selectgroup-input" onclick="show_agent_form()">';
		$elem .= '<span class="selectgroup-button">Agent</span>';
		$elem .= '</label>';
		$elem .= '<label class="selectgroup-item">';
		$elem .= '<input type="radio" name="value" value="200" class="selectgroup-input" onclick="show_customer_form()">';
		$elem .= '<span class="selectgroup-button">Customer</span>';
		$elem .= '</label>';
		$elem .= '</div>';
		$elem .= '</div>';
		$elem .= '</center>';
		$elem .= '</div>';
    return $elem;
  }
?>
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
  
  function date_time($date_time) {
    $date = substr($date_time,0,10);
    $time = substr($date_time,10, 5);
    return date_thai($date) . ' ' . $time;

  }

?>
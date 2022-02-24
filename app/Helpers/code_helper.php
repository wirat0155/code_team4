<?php
// Function: used to convert a string to revese in order
/*
* tel_format
* แสดงเบอร์โทรแบบ xxx-xxx-xxxx
* @author Wirat
* @Create Date 2564-07-30
*/
  function tel_format(string $string = NULL)
  {
    return substr($string, 0, 3) . '-' . substr($string, 3, 3) . '-' . substr($string, 6);
  }
/*
* date_thai
* แสดงวันที่ format ไทย และเวลา ชม. กับนาที
* @author Natdanai
* @Create Date 2564-07-30
*/
  function date_thai($str_date = NULL, $time = false)
  {
    $str_year = date("Y",strtotime($str_date));
    $str_month= date("n",strtotime($str_date));
    $str_day = date("j",strtotime($str_date));
    $str_hour = date("H",strtotime($str_date));
    $str_min = date("i",strtotime($str_date));
    $str_month_cut = Array("","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
    $str_month_thai = $str_month_cut[$str_month];

    if ($time) {
      return "$str_day $str_month_thai $str_year $str_hour:$str_min";
    } else {
      if ($str_hour == '00') {
        return "$str_day $str_month_thai $str_year";
      }
      return "$str_day $str_month_thai $str_year $str_hour:$str_min";
    }
  }
  /*
  * datetime_format_value
  * แสดงวันที่ ในรูปแบบ yyyy/mm/ddThh/mm/ss เพื่อไว้แสดง value ใน v_service_edit
  * @author Natdanai
  * @Create Date 2564-08-08
  */
  function datetime_format_value(string $string = NULL) {
      return substr($string, 0, 10) . 'T' . substr($string, 11);
  }

  /*
  * diff_datetime
  * return difference between date
  * @author Benjapon
  * @Create Date  2564-12-08
  */
  function diff_datetime($date_input = NULL) {
    if ($date_input != NULL) {
      date_default_timezone_set("Asia/Bangkok");
      $date_now = Date("Y-m-d H:i:s");
  
      $sub_date = substr($date_now,0 , 10);
      $sub_date_input = substr($date_input, 0, 10);
      $datetime_now = date_create($sub_date);
      $datetime_input = date_create($sub_date_input);
      $diff = date_diff($datetime_input, $datetime_now);
  
      // substring hour
      $sub_hour = substr($date_now, 10, 3);
      intval($sub_hour);
      $sub_hour_input = substr($date_input, 10, 3);
      intval($sub_hour_input);
  
      // substring minute
      $sub_min = substr($date_now, 14, 2);
      intval($sub_min);
      $sub_min_input = substr($date_input, 14, 2);
      intval($sub_min_input);
  
      $day_diff = $diff->format("%R%a");
      $day_diff = intval($day_diff);
  
      // more than 3 days
      if ($day_diff > 3){ 
        echo date_thai($date_input);
      }
      // 1 - 3 days
      else if($day_diff >=1 && $day_diff <=3){
        $day_ago = "Days ago,";
        if ($day_diff ==1) {
          $day_ago = "Day ago,";
        }
        echo $day_diff. " " . $day_ago . " " . $sub_hour_input . ":" . $sub_min_input;
      }
      // same day
      else if($day_diff == 0){
        if($sub_hour-$sub_hour_input >=1){
          echo $sub_hour - $sub_hour_input . " Hours ago";
        }else{
          echo $sub_min - $sub_min_input . " Mins ago";
        }
      }
      else {
        echo "invalid datetime";
      }
    }
    else {
      return "";
    }
  }

  /*
  * short_date
  * return short date like "Dec 15"
  * @author Wirat
  * @Create Date  2565-01-08
  */
  function short_date($date) {
    // set array abbr month list
    $abbr_month = array("", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
    
    // first substring month
    $month = substr($date, 5, 2);
    // substring again if month < october
    if ($month[0] == "0") $month = substr($date, 6, 1);

    // substring date
    $date = substr($date, 8, 2);
    // substring again if date < 10
    if ($date[0] == "0") $date = substr($date, 1, 1);

    // return as mm dd format
    return $abbr_month[$month] . " " . $date;
  }
  function short_time($date_time = "2021-12-11 13:00:00") {
    return substr($date_time, 11, 5);
  }

  /*
  * format_date_invoice
  * เปลี่ยน format วันที่ในใบแจ้งหนี้
  * @author Wirat
  * @Create Date 2564-12-02
  */

  function format_date_invoice($full_date) {

    $abbr_month = array("", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $month = substr($full_date, 5, 2); // 02

    if ($month[0] == "0") {
      $month = substr($full_date, 6, 1); // 2
    }
    $date = substr($full_date, 8, 2);
    $year = substr($full_date, 0, 4);

    return $abbr_month[$month] . " " . $date . ", " . $year;
  }

  /*
  * convert_currency
  * เปลี่ยน format แสดงค่าเงิน
  * @author Natdanai
  * @Create Date 2564-12-02
  */
  function convert_currency($amount_number)
{
    $amount_number = number_format($amount_number, 2, ".","");
    $pt = strpos($amount_number , ".");
    $number = $fraction = "";
    if ($pt === false) 
        $number = $amount_number;
    else
    {
        $number = substr($amount_number, 0, $pt);
        $fraction = substr($amount_number, $pt + 1);
    }
    
    $ret = "";
    $baht = read_number ($number);
    if ($baht != "")
        $ret .= $baht . "บาท";
    
    $satang = read_number($fraction);
    if ($satang != "")
        $ret .=  $satang . "สตางค์";
    else 
        $ret .= "ถ้วน";
    return $ret;
}

  /*
  * read_number
  * อ่านตัวเลขเปลี่ยนเป็นตัวหนังสือ
  * @author Natdanai
  * @Create Date 2564-12-02
  */

function read_number($number)
{
    $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
    $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    $number = $number + 0;
    $ret = "";
    if ($number == 0) return $ret;
    if ($number > 1000000)
    {
        $ret .= read_number(intval($number / 1000000)) . "ล้าน";
        $number = intval(fmod($number, 1000000));
    }
    
    $divider = 100000;
    $pos = 0;
    while($number > 0)
    {
        $d = intval($number / $divider);
        $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" : 
            ((($divider == 10) && ($d == 1)) ? "" :
            ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
        $ret .= ($d ? $position_call[$pos] : "");
        $number = $number % $divider;
        $divider = $divider / 10;
        $pos++;
    }
    return $ret;
}
?>

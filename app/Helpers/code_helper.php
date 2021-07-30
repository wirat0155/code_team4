<?php
// Function: used to convert a string to revese in order
if (!function_exists("reverse_string")) {
    function tel_format(string $string)
    {
        return substr($string, 0, 3) . '-' . substr($string, 3, 3) . '-' . substr($string, 6);
    }
}

if (!function_exists("DateThai")) {
  function DateThai($strDate){
    
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strhour= date("H",strtotime($strDate));
    $strmin= date("i",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear $strhour:$strmin";
  } 

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv='Content-Type' content='text/html;charset=utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<style>
    html, body {
        margin: 0;
        font-family: "THSarabunNew";
        font-size: 15px;
    }

    img {
        width: 220px;
    }

    .company_name{
        font-size: 25px;
        font-weight: bold;
    }

    .contact{
        font-size: 15px;
    }

    .heading{
        font-size: 20px;
        color: #2258A5;
    }

    .title{
        font-size: 15px;
        color: #2258A5;
    }

    .data{
        font-size: 15px;
    }

    table, th, td{
        /* border: 1px solid black;
        border-collapse: collapse; */
    }

    .cost_detail th, .cost_detail td, .price td, .bank th, .bank td{
        border: 1px solid black;
        border-collapse: collapse;
        padding: 2px 10px 2px;
    }
    
    .cost_detail td{
        border-top: 0;
        border-bottom: 0;
        /* vertical-align: top; */
        /* height: 350px; */
    }

    

    table{
        width: 100%;
    }
</style>

<body>

    <!-- Company Information -->
    <table>
        <tbody>
            <tr>
                <td style="text-align: left; width: 35%;">
                    <img src="<?php echo base_url('/upload/img.png') ?>">
                </td>
                <td style="text-align: left; font-size: 10px;">
                    <div class="company_name">At Pro Solutions Co.,Ltd HeadOffice</div>
                    <div class="contact">
                        443/8 M.3 T.Surasak A.Sriracha Chonburi 20110 <br>
                        Tax ID : 0205560036887 <br>
                        E-mail : info@ibs-thailand.com <br>
                        Mobile : +66 63 348 7036, +66 91 731 1709 <br>
                    </div>
                </td>
            </tr>
            <tr>
            </tr>
            <br>
        </tbody>
    </table>
    <hr>

    <!-- Heading -->
    <table>
        <tbody >
            <tr>
                <td style="text-align: center;">
                    <div class="heading">ใบเสร็จรับเงิน/ใบกำกับภาษี</div>
                </td>
                <!-- <td>
                    ต้นฉบับ
                </td> -->
            </tr>
            <br>
        </tbody>
    </table>

    <!-- Detail -->
    <table>
        <tbody>

            <tr>
                <td style="text-align: left;" width="10%">
                    <div class="title title_detail"> ชื่อลูกค้า : </div>
                </td>
                <td class="data" width="50%">
                    Leschaco (Thailand) Ltd. 
                </td>
                <td style="text-align: right;" width="20%">
                    <div class="title title_detail" width="30%"> เลขที่ใบเสร็จรับเงิน : </div>
                </td>
                <td class="data">
                    &nbsp; RE2109003
                </td>
            </tr>

            <tr>
                <td style="text-align: left;" width="10%">
                    <div class="title title_detail"> ที่อยู่ : </div>
                </td>
                <td class="data" width="50%">
                    3354/36-39 1 1th Floor, Manorom Building, Rama 4 Rd.,
                    Klongton, Klongtoey, Bangkok 10110
                </td>
                <td style="text-align: right;" width="20%">
                    <div class="title title_detail" width="30%"> วันที่ : </div>
                </td>
                <td class="data">
                    &nbsp; November 30, -0001
                </td>
            </tr>

            <tr>
                <td style="text-align: left;" width="10%">
                    <div class="title title_detail"> เลขผู้เสียภาษี : </div>
                </td>
                <td class="data" width="50%">
                    0105542055418
                </td>
                <td style="text-align: right;" width="20%">
                    <div class="title title_detail" width="30%"> ครบกำหนดชำระ : </div>
                </td>
                <td class="data">
                    &nbsp; September 04, 2021
                </td>
            </tr>

            <tr>
                <td style="text-align: left;" width="10%">
                    <div class="title title_detail"> ชื่อผู้ติดต่อ : </div>
                </td>
                <td class="data" width="50%">
                    -
                </td>
                <td style="text-align: right;" width="20%">
                    <div class="title title_detail" width="30%">  </div>
                </td>
                <td class="data">
                    &nbsp; 
                </td>
            </tr>
            
            <tr>
                <td style="text-align: left;" width="10%">
                    <div class="title title_detail"> เบอร์โทรศัพท์ : </div>
                </td>
                <td class="data" width="50%">
                    -
                </td>
                <td style="text-align: right;" width="20%">
                    <div class="title title_detail" width="30%">  </div>
                </td>
                <td class="data">
                    &nbsp; 
                </td>
            </tr>

        </tbody>
    </table>

    <br>

    <!-- Cost Detail -->

    <table style="border: 1px solid black; border-collapse: collapse;">
        <thead>
            <tr class='cost_detail'>
                <th style="text-align: center;" width="7%">
                    <div class="title"> ลำดับ </div>
                </th>
                <th style="text-align: center;" width="40%">
                    <div class="title"> รายละเอียด </div>
                </th>
                <th style="text-align: center;">
                    <div class="title"> จำนวน </div>
                </th>
                <th style="text-align: center;">
                    <div class="title"> ราคา </div>
                </th>
                <th style="text-align: center;">
                    <div class="title"> จำนวนเงิน (บาท) </div>
                </th>
            </tr>
        </thead>
        <tbody>
            
            <?php for($i = 0; $i < 15 ;$i++){?>
                <tr class='cost_detail'>
                    <td style="text-align: center;" width="7%">
                        <div class="data">  </div>
                    </td>
                    <td style="text-align: left;" width="40%">
                        <div class="data"> &nbsp;  </div>
                    </td>
                    <td style="text-align: center;">
                        <div class="data">  </div>
                    </td>
                    <td style="text-align: center;">
                        <div class="data"> </div>
                    </td>
                    <td style="text-align: center;">
                        <div class="data">  </div>
                    </td>
                </tr>
            <?php } ?>

            <tr class="price">
                <td style="text-align: center;" colspan="3" rowspan="2">
                </td>
                <td style="text-align: right;">
                    <div class="data title"> รวมเป็นเงิน </div>
                </td>
                <td style="text-align: right;">
                    <div class="data"> 1,121.50 </div>
                </td>
            </tr>
            <tr class="price">
                <td style="text-align: right;">
                    <div class="data title"> ภาษีมูลค่าเพิ่ม 7% </div>
                </td>
                <td style="text-align: right;">
                    <div class="data"> 78.50 </div>
                </td>
            </tr>
            <tr class="price">
                <td style="text-align: center;" colspan="3">
                    หนึ่งพันสองร้อยบาทถ้วน
                </td>
                <td style="text-align: right;">
                    <div class="data title"> จำนวนเงินรวมทั้งสิ้น </div>
                </td>
                <td style="text-align: right;">
                    <div class="data"> 1,200.00 </div>
                </td>
            </tr>

        </tbody>
    </table>
    
    <table style="width: 80%; margin-top: 10px">
        <tbody>
            <tr>
                <td style="text-align: left; width: 15%">
                    ชำระเงินโดย : 
                </td>
                <td style="text-align: left; width: 15%">
                    ( &nbsp; ) เงินสด
                </td>   
                <td style="text-align: left; width: 20%">
                    ( &nbsp; ) โอนเงิน
                </td>   
                <td style="text-align: left; width: 25%">
                    วันที่......................................
                </td>   
                <td style="text-align: left; width: 25%">
                    ยอด......................................
                </td>      
            </tr>
            <tr>
                <td style="text-align: left;">
                    
                </td>
                <td style="text-align: left;" colspan="2">
                    ( &nbsp; ) เช็คธนาคาร......................................
                </td>   
                <td style="text-align: left;">
                    เลขที่.....................................
                </td>   
                <td style="text-align: left;">
                    วันที่......................................
                </td>      
            </tr>
        </tbody>
    </table>

    <table style="margin-top: 10px">
        <tbody>
            <tr>
                <td style="text-align: left;">
                    PAYMENT METHOD
                </td>   
            </tr>
        </tbody>
    </table>

    <!-- Bank Information -->
    <table style="border: 1px solid black; border-collapse: collapse;">
        <tbody>
            <tr class="bank">
                <th style="text-align: center;">
                    <div class="title"> ธนาคาร </div>
                </th>
                <th style="text-align: center;">
                    <div class="title"> ชื่อบัญชี </div>
                </th>
                <th style="text-align: center; width: 20%">
                    <div class="title"> สาขา </div>
                </th>
                <th style="text-align: center; width: 20%">
                    <div class="title"> เลขที่บัญชี </div>
                </th> 
            </tr>
            <tr class="bank">
                <td class="data" style="text-align: center;">
                    ธนาคารกสิกรไทย
                </td> 
                <td class="data" style="text-align: center;">
                    บริษัท แอท โปร โซลูชั่น จำกัด
                </td>
                <td class="data" style="text-align: center;">
                    โรบินสัน ศรีราชา
                </td> 
                <td class="data" style="text-align: center;">
                    101-1-28335-3
                </td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <td style="text-align: center;">
                    Leschaco (Thailand) Ltd. 
                </td> 
                <td style="text-align: center;">
                    At Pro Solutions Co.,Ltd
                </td>
            </tr>
        </thead>
    </table>
    
    <table style="margin-top: 20px">
        <tbody>
            <tr>
                <td style="text-align: center;">
                    ............................................................
                </td>
                <td style="text-align: center;">
                    ............................................................
                </td>
                <td style="text-align: center;">
                    ............................................................
                </td>
                <td style="text-align: center;">
                    ............................................................
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">
                    ผู้จ่าย
                </td>
                <td style="text-align: center;">
                    วันที่
                </td>
                <td style="text-align: center;">
                    ผู้รับเงิน
                </td>
                <td style="text-align: center;">
                    วันที่
                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>
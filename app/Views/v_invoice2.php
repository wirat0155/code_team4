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

    .cost_detail th, .cost_detail td, .price td{
        border: 1px solid black;
        border-collapse: collapse;
    }
    
    .cost_detail td{
        vertical-align: top;
        height: 350px;
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
            <tr class='cost_detail'>
                <td style="text-align: center;" width="7%">
                    <div class="data"> สำดำ </div>
                </td>
                <td style="text-align: left;" width="40%">
                    <div class="data"> &nbsp; รายละเอียด </div>
                </td>
                <td style="text-align: center;">
                    <div class="data"> จำนวน </div>
                </td>
                <td style="text-align: center;">
                    <div class="data"> ราคา </div>
                </td>
                <td style="text-align: center;">
                    <div class="data"> จำนวนเงิน (บาท) </div>
                </td>
            </tr>
            <tr class="price">
                <td style="text-align: center;" width="60%" colspan="3" rowspan="2">
                </td>
                <td style="text-align: center;">
                    <div class="data"> ราคา </div>
                </td>
                <td style="text-align: center;">
                    <div class="data"> จำนวนเงิน (บาท) </div>
                </td>
            </tr>
            <tr class="price">
                <td style="text-align: center;">
                    <div class="data"> ราคา </div>
                </td>
                <td style="text-align: center;">
                    <div class="data"> จำนวนเงิน (บาท) </div>
                </td>
            </tr>
            <tr class="price">
                <td style="text-align: center;" width="60%" colspan="3">
                    หนีึ่งร้อย
                </td>
                <td style="text-align: center;">
                    <div class="data"> ราคา </div>
                </td>
                <td style="text-align: center;">
                    <div class="data"> จำนวนเงิน (บาท) </div>
                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>
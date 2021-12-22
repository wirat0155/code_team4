<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv='Content-Type' content='text/html;charset=utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    html,
    body {
        margin: 0;
        font-family: "THSarabunNew";
        font-size: 20px;
    }

    img {
        width: 220px;
    }

    .company_name {
        font-size: 20px;
        font-weight: bold;
    }

    .contact {
        font-size: 20px;
    }

    .heading {
        font-size: 25px;
        color: #2258A5;
        font-weight: bold;
    }

    .title {
        font-weight: bold;
        font-size: 20px;
        color: #2258A5;
    }

    .data {
        font-size: 20px;
    }

    table,
    th,
    td {
        /* border: 1px solid black; */
        border-collapse: collapse;
    }

    .cost_detail th,
    .cost_detail td,
    .price td,
    .bank th,
    .bank td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 2px 10px 2px;
    }

    .cost_detail td {
        border-top: 0;
        border-bottom: 0;
        /* vertical-align: top; */
        /* height: 350px; */
    }



    table {
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
                <td style="text-align: left; font-size: 15px;">
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
    <hr style="color: black;">

    <!-- Heading -->
    <table>
        <tbody>
            <tr>
                <td style="padding-left: 37%; padding-top: -15px;">
                    <br>
                    <div class="heading">ใบเสร็จรับเงิน/ใบกำกับภาษี</div>
                </td>
                <td style="text-align: center; border: 1px solid black; border-collapse: collapse;">
                    <div class="heading script">ต้นฉบับ</div>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Detail -->
    <table>
        <tbody>

            <tr>
                <td style="text-align: left;" width="15%">
                    <div class="title title_detail"> ชื่อลูกค้า : </div>
                </td>
                <td class="data" width="40%">
                    <?php echo $arr_service_cost[0]->cus_company_name ?>
                </td>
                <td style="text-align: right;" width="20%">
                    <div class="title title_detail"> เลขที่ใบเสร็จรับเงิน : </div>
                </td>
                <td class="data" width="25%">
                    &nbsp; <?php echo $arr_service_cost[0]->ser_receipt ?>
                </td>
            </tr>

            <tr>
                
                <td style="text-align: left;" >
                    <div class="title title_detail"> ที่อยู่ : </div>
                </td>
                <td class="data" width="50%">
                    <?php echo $arr_service_cost[0]->cus_address ?>
                </td>
                <td style="text-align: right;">
                    <div class="title title_detail"> เลขที่ใบแจ้งหนี้ : </div>
                </td>
                <td class="data">
                    &nbsp;   <?php echo $arr_service_cost[0]->ser_invoice ?>
                </td>
            </tr>

            <tr>
                <td style="text-align: left;">
                    <div class="title title_detail"> เลขผู้เสียภาษี : </div>
                </td>
                <td class="data" width="50%">
                    <?php echo $arr_service_cost[0]->cus_tax ?>
                </td>
                <td style="text-align: right;">
                    <div class="title title_detail"> วันที่ : </div>
                </td>
                <td class="data">
                    &nbsp;  <?php echo format_date_invoice($date_today) ?>
                </td>
            </tr>

            <tr>
                <td style="text-align: left;">
                    <div class="title title_detail"> ชื่อผู้ติดต่อ : </div>
                </td>
                <td class="data" width="50%">
                    <?php echo $arr_service_cost[0]->cus_firstname . ' ' . $arr_service_cost[0]->cus_lastname ?>
                </td>
                <td style="text-align: right;">
                    <div class="title title_detail"> ครบกำหนดชำระ : </div>
                </td>
                <td class="data">
                    &nbsp; <?php echo format_date_invoice($arr_service_cost[0]->ser_due_date )?>
                </td>
            </tr>

            <tr>
                <td style="text-align: left;">
                    <div class="title title_detail"> เบอร์โทรศัพท์ : </div>
                </td>
                <td class="data">
                    <?php echo $arr_service_cost[0]->cus_tel ?>
                </td>
                <td style="text-align: right;">
                    <div class="title title_detail"> </div>
                </td>
                <td class="data">
                    &nbsp;
                </td>
            </tr>

        </tbody>
    </table>
    <!-- Cost Detail -->

    <table style="border: 1px solid black; border-collapse: collapse;">
        <thead>
            <tr class='cost_detail'>
                <th style="text-align: center;" width="10%">
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
            <?php for ($i = 0; $i < count($arr_service_cost); $i++) { ?>
                <tr class='cost_detail'>
                    <td style="text-align: center;">
                        <div class="data"> <?php echo $i+1 ?> </div>
                    </td>
                    <td style="text-align: left;">
                        <div class="data"> &nbsp; <?php echo $arr_service_cost[$i]->cosd_name ?> </div>
                    </td>
                    <td style="text-align: center;">
                        <div class="data" style="text-align: center;"> <?php echo $arr_service_cost[$i]->cosd_quantity ?> </div>
                    </td>
                    <td style="text-align: right;">
                        <div class="data"> <?php echo number_format($arr_service_cost[$i]->cosd_cost, 2, '.', ',') ?> </div>
                    </td>
                    <td style="text-align: right;">
                        <div class="data">
                            <?php
                            if ($arr_service_cost[$i]->cosd_quantity == 0) {
                                echo number_format($arr_service_cost[$i]->cosd_cost, 2, '.', ',');
                            } else {
                                echo number_format($arr_service_cost[$i]->cosd_cost * $arr_service_cost[$i]->cosd_quantity, 2, '.', ',');
                            } ?>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            <?php
            $count_entry = 10;
            $count_entry -= count($arr_service_cost);
            for ($i = 0; $i < $count_entry; $i++) { ?>
                <tr class='cost_detail'>
                    <td style="text-align: center;">
                        <div class="data"> </div>
                    </td>
                    <td style="text-align: left;">
                        <div class="data"> &nbsp; </div>
                    </td>
                    <td style="text-align: center;">
                        <div class="data"> </div>
                    </td>
                    <td style="text-align: center;">
                        <div class="data"> </div>
                    </td>
                    <td style="text-align: center;">
                        <div class="data"> </div>
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
                    <div class="data">
                        <?php
                        $subtotal = 0;
                        for ($i = 0; $i < count($arr_service_cost); $i++) {
                            if ($arr_service_cost[$i]->cosd_quantity == 0) {
                                $subtotal += $arr_service_cost[$i]->cosd_cost;
                            } else {
                                $subtotal += $arr_service_cost[$i]->cosd_cost * $arr_service_cost[$i]->cosd_quantity;
                            }
                        }
                        echo number_format($subtotal, 2, '.', ',');
                        ?>
                    </div>
                </td>
            </tr>
            <tr class="price">
                <td style="text-align: right;">
                    <div class="data title"> ภาษีมูลค่าเพิ่ม 7% </div>
                </td>
                <td style="text-align: right;">
                    <div class="data">
                        <?php
                        $tax = ($subtotal * $vat) / 100;
                        echo number_format($tax, 2, '.', ','); ?>
                    </div>
                </td>
            </tr>
            <tr class="price">
                <td style="text-align: center;" colspan="3">
                    <?php echo Convert($tax + $subtotal) ?>
                </td>
                <td style="text-align: right;">
                    <div class="data title"> จำนวนเงินรวมทั้งสิ้น </div>
                </td>
                <td style="text-align: right;">
                    <div class="data"> <?php echo number_format($tax + $subtotal, 2, '.', ',') ?> </div>
                </td>
            </tr>

        </tbody>
    </table>

    <table style="width: 100%; margin-top: 10px">
        <tbody>
            <tr>
                <td style="text-align: left; width: 15%">
                    ชำระเงินโดย :
                </td>
                <td style="text-align: left; width: 15%">
                    <?php if($arr_service_cost[0]->ser_pay_by == 1){ 
                        echo "( X ) เงินสด";
                    }else{
                        echo "( &nbsp; ) เงินสด";
                    } ?>
                    
                </td>
                <td style="text-align: left; width: 20%">
                    <?php if($arr_service_cost[0]->ser_pay_by == 2){ 
                        echo "( X ) เงินโอน";
                    }else{
                        echo "( &nbsp; ) เงินโอน";
                    } ?>
                </td>
                <td style="text-align: left; width: 20%;">
                    วันที่ &nbsp;<span style="border-bottom: 1px dotted black;"> <?php echo format_date_invoice($date_today) ?></span>
                </td>
                <td style="text-align: left; width: 25%">
                    ยอด &nbsp;<span style="border-bottom: 1px dotted black;"><?php echo number_format($tax + $subtotal, 2, '.', ',') ?></span>
                </td>
            </tr>
            <tr>
                <td style="text-align: left;">

                </td>
                <td style="text-align: left;" colspan="2">
                <?php if($arr_service_cost[0]->ser_pay_by == 3){ 
                        echo "( X ) เช็คธนาคาร..........................";
                    }else{
                        echo "( &nbsp; ) เช็คธนาคาร..........................";
                    } ?>
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
                <td style="padding-left: 22%;">
                    <?php echo $arr_service_cost[0]->cus_company_name ?>
                </td>
                <td>
                    At Pro Solutions Co.,Ltd
                </td>
            </tr>
        </thead>
    </table>

    <table style="margin-top: 20px">
        <tbody>
            <tr>
                <td style="text-align: center;">
                    ................................................
                </td>
                <td style="text-align: center;">
                    ................................................
                </td>
                <td style="text-align: center;">
                    ................................................
                </td>
                <td style="text-align: center;">
                    ................................................
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
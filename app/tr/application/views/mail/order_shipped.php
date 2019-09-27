<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Your order has been shipped ! | raisavanessa.com</title>
    </head>
    <body>
        <div style="background-color:#ffffff">
            <div style="background-color:#ffffff">
                <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#f7f7f7;background-color:#f7f7f7;width:100%">
                    <tr>
                        <td style="text-align: center;padding-top:15px;"><img width="170px" src="https://raisavanessa.com/assets/Front/images/rv-logo.svg" alt="Raisa Vanessa"></td>
                    </tr>
                    <tbody>
                        <tr>
                            <td>
                                <div style="margin:0px auto;max-width:600px">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%">
                                        <tbody>
                                            <tr>
                                                <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top">
                                                    <div class="m_6115659707320878835dys-column-per-100" style="direction:ltr;display:inline-block;font-size:13px;text-align:left;vertical-align:top;width:100%;">
                                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word">
                                                                        <div style="color:#006376;font-family:Oxygen,Helvetica neue,sans-serif;font-size:32px;font-weight:700;line-height:37px;text-align:center">Order Number: <b>#<?=$id?></b>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word">
                                                                        <div style="color:#777777;font-family:Oxygen,Helvetica neue,sans-serif;font-size:14px;line-height:21px;text-align:center">Your order has been shipped with the number : <?=$shipmentKey?>.</div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div style="background:#ffffff;background-color:#ffffff;margin:0px auto;max-width:600px">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%">
                        <tbody>
                            <tr>
                                <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top">
                                    <div class="m_6115659707320878835dys-column-per-100" style="direction:ltr;display:inline-block;font-size:13px;text-align:left;vertical-align:top;width:100%">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word">
                                                        <table border="0" cellpadding="0" cellspacing="0" style="color:#777777;font-family:'Oxygen','Helvetica Neue',helvetica,sans-serif;font-size:14px;line-height:21px;table-layout:auto;width:100%" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <th style="text-align:left;border-bottom:1px solid #cccccc;color:#4d4d4d;font-weight:700;padding-bottom:5px" width="5%">
                                                                        ID
                                                                    </th>
                                                                    <th style="text-align:left;border-bottom:1px solid #cccccc;color:#4d4d4d;font-weight:700;padding-bottom:5px" width="30%">
                                                                        Product Name
                                                                    </th>
                                                                    <th style="text-align:left;border-bottom:1px solid #cccccc;color:#4d4d4d;font-weight:700;padding-bottom:5px" width="10%">
                                                                        Size
                                                                    </th>
                                                                    <th style="text-align:left;border-bottom:1px solid #cccccc;color:#4d4d4d;font-weight:700;padding-bottom:5px" width="10%">
                                                                        Colur
                                                                    </th>
                                                                    <th style="text-align:left;border-bottom:1px solid #cccccc;color:#4d4d4d;font-weight:700;padding-bottom:5px" width="10%">
                                                                        Qty
                                                                    </th>
                                                                    <th style="text-align:center;border-bottom:1px solid #cccccc;color:#4d4d4d;font-weight:700;padding-bottom:5px" width="20%">
                                                                        Price
                                                                    </th>
                                                                    <th style="text-align:right;border-bottom:1px solid #cccccc;color:#4d4d4d;font-weight:700;padding-bottom:5px" width="15%">
                                                                        Total
                                                                    </th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <?php foreach ($lines as $key => $val) { ?>
                                                    <tr>
                                                        <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word">
                                                            <table border="0" cellpadding="0" cellspacing="0" style="color:#000000;font-family:Helvetica,Arial,sans-serif;font-size:13px;line-height:22px;table-layout:auto;width:100%" width="100%">
                                                                <tbody>
                                                                    <tr style="font-size:14px;line-height:19px;font-family:'Oxygen','Helvetica Neue',helvetica,sans-serif;color:#777777">
                                                                        <td width="5%">
                                                                            #<?=$val->product_id?>
                                                                        </td>
                                                                        <td style="text-align:left" width="30%">
                                                                            <?=$val->name?>
                                                                        </td>
                                                                        <td style="text-align:left" width="10%">
                                                                            <?=$val->size?>
                                                                        </td>
                                                                        <td style="text-align:left" width="10%">
                                                                            <?=$val->color?>
                                                                        </td>
                                                                        <td style="text-align:left" width="10%">
                                                                            <?=$val->qty?>
                                                                        </td>
                                                                        <td style="text-align:center" width="20%">
                                                                            <?=number_format($val->price,2,',','.')?> $
                                                                        </td>
                                                                        <td style="text-align:right" width="15%">
                                                                            <?=number_format($val->price*$val->qty,2,',','.')?> $
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                                <tr>
                                                    <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                        <table border="0" cellpadding="0" cellspacing="0" style="color:#000000;font-family:Helvetica,Arial,sans-serif;font-size:13px;line-height:22px;table-layout:auto;width:100%;border-top:1px solid #cccccc" width="100%">
                                                            <tbody>
                                                                <tr style="font-size:14px;line-height:19px;font-family:'Oxygen','Helvetica Neue',helvetica,sans-serif;color:#777777">
                                                                    <td width="60%"></td>
                                                                    <td style="text-align:right;padding-right:10px;">
                                                                        <span style="padding:8px 0px;display:inline-block">Price :</span> <br>
                                                                        <span style="padding-bottom:8px;display:inline-block">Fee :</span>  <br>
                                                                        <span style="padding-bottom:8px;display:inline-block">Cargo :</span> <br>
                                                                        <span style="display:inline-block;font-weight:bold;color:#4d4d4d">Total :</span>
                                                                    </td>
                                                                    <td style="text-align:right;">
                                                                        <span style="padding:8px 0px;display:inline-block"><?=number_format(($price)/1.18,2,',','.')?> $</span><br>
                                                                        <span style="padding-bottom:8px;display:inline-block"><?=number_format(($price)-(($price)/1.18),2,',','.')?> $</span><br>
                                                                        <span style="padding-bottom:8px;display:inline-block"><?=number_format($cargo,2,',','.')?> $</span><br>
                                                                        <span style="display:inline-block;font-weight:bold;color:#4d4d4d"><?=number_format($price+$cargo,2,',','.')?> $</span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#f7f7f7;background-color:#f7f7f7;width:100%">
                    <tbody>
                        <tr>
                            <td>
                                <div style="margin:0px auto;max-width:600px">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%">
                                        <tbody>
                                            <tr>
                                                <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top">
                                                    <div class="m_6115659707320878835dys-column-per-45" style="direction:ltr;display:inline-block;font-size:13px;text-align:left;vertical-align:top;width:100%">
                                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="background-color:#ffffff;border:1px solid #e5e5e5;padding:15px;vertical-align:top">
                                                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="left" style="font-size:0px;padding:0px;word-break:break-word">
                                                                                        <div style="color:#4d4d4d;font-family:Oxygen,Helvetica neue,sans-serif;font-size:15px;font-weight:700;line-height:25px;text-align:left;border-bottom:1px solid gray;">Shipping Address</div>
                                                                                    </td>
                                                                                    <td align="left" style="font-size:0px;padding:0px;word-break:break-word">
                                                                                        <div style="color:#4d4d4d;font-family:Oxygen,Helvetica neue,sans-serif;font-size:15px;font-weight:700;line-height:25px;text-align:left;border-bottom:1px solid gray;">Personal information</div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="50%" align="left" style="font-size:0px;padding:0px;word-break:break-word">
                                                                                        <div style="color:#777777;font-family:Oxygen,Helvetica neue,sans-serif;font-size:14px;line-height:23px;text-align:left">
                                                                                            <?=$address?>   <br>
                                                                                            <?=$city?> / <?=$town?><br>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td width="50%" align="left" style="font-size:0px;padding:0px;word-break:break-word">
                                                                                        <div style="color:#777777;font-family:Oxygen,Helvetica neue,sans-serif;font-size:14px;line-height:23px;text-align:left">
                                                                                            Name surname : <b><?=$name?> <?=$surname?></b><br>
                                                                                            GSM : <?=$phone?><br>
                                                                                            E-Mail : <?=$email?><br>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </body>
    </html>
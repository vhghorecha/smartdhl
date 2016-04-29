<html>
<head>
    <title>Commercial Invoice</title>

    <style>
        .mytable, .mytd {
            border: 1px solid #333333;
            border-spacing: 0;
            border-collapse: collapse;
            height: 40;
        }
        span {
            font-size: 12;
            font-weight: bold;
        }
        img.headerimg {
            height: 100%;
            max-height: 100px;
        }
        #wrapper {
            width:730px;
            margin: auto;
        }
        td.highlight {
            background-color:#333333;
            color: #FFFFFF;
        }
        div.letterhead {
            height: 105px;
            border-bottom: 1px solid #333333;
            margin-bottom: 5px;
        }
        @media print {
            .noPrint {
                display:none;
            }
        }
    </style>

</head>
<body topmargin="90">
<div id='wrapper'>
    <center><div class="noPrint"><input type="button" id="btnprint" class="btn btn-primary"  name="btnprint"  onclick="window.print();" style="background-color: #002a80;color: #ffffff;font-size:16px" value="Print"></div></center>
    <table align="center" class="mytable">
        <tr><td class="mytd highlight" colspan="4" align="center"><h2>Commercial Invoice</h2></td></tr>
        <tr>
            <td class="mytd" colspan="2" width="50%"><table width="100%"><tr><td><span>Date:</span></td><td align="right"><?php echo date("d-m-Y",strtotime($shipment["shp_date"])); ?></td></tr></table></td>
            <td class="mytd" colspan="2" width="50%"><table width="100%"><tr><td><span>Destination Country:</span></td><td align="right"><?php echo $receiver_address["cnt_name"]; ?></td></tr></table></td>
        </tr>
        <tr>
            <td class="mytd" colspan="2" width="50%"><table width="100%"><tr><td align="left">Shipper: <?php echo $sender_address["adr_contact"]; ?></td></tr></table></td>
            <td class="mytd" colspan="2" width="50%"><table width="100%"><tr><td align="left">Consignee: <?php echo $receiver_address["adr_contact"]; ?></td></tr></table></td>
        </tr>

        <tr>
            <td class="mytd" colspan="2" width="50%"><span>Shipper Address:</span>
                <div style="height:130">
                    <?php echo $sender_address["adr_street1"]; ?><br>
                    <?php echo $sender_address["adr_street2"]; ?><br>
                    <?php echo $sender_address["city_name"].",".$sender_address["state_name"]." ".$sender_address["adr_zip"]; ?> <br>
                    <?php echo $sender_address["adr_phone"]; ?> <br>
                    <?php echo $sender_address["adr_email"]; ?>
                </div>
            </td>
            <td class="mytd" colspan="2"  width="50%"><span>Receiver Address:</span>
                <div style="height:130">
                    <?php echo $receiver_address["adr_street1"]; ?><br>
                    <?php echo $receiver_address["adr_street2"]; ?><br>
                    <?php echo $receiver_address["city_name"].",".$receiver_address["state_name"]." ".$receiver_address["adr_zip"]; ?> <br>
                    <?php echo $receiver_address["adr_phone"]; ?> <br>
                    <?php echo $receiver_address["adr_email"]; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td class="mytd" width="25%"><table width="100%"><tr><td><span>Carrier:</span></td><td align="right">DHL&nbsp;</td></tr></table></td>
            <td class="mytd" width="25%"><table width="100%"><tr><td><span>Shipper Ref:</span></td><td align="right"></td></tr></table></td>
            <td class="mytd" width="25%">
                <table width="100%"><tr><td><span>ITN#:</span></td><td align="right"><?php echo $shipment["shp_eelpfc"]; ?></td></tr></table>
            </td>
            <td class="mytd" width="25%"><table width="100%"><tr><td><span>Terms of Trade:</span></td><td align="right"><?php echo $invoice["tt_name"]; ?></td></tr></table></td>
        </tr>
        <tr>
            <td class="mytd" width="25%"><table width="100%"><tr><td><span>Number of Pieces:</span></td><td align="right"><?php echo $shipment["shp_quantity"]; ?></td></tr></table></td>
            <td class="mytd" width="25%"><table width="100%"><tr><td><span>Total Weight:</span></td><td align="right"><?php echo $shipment["shp_weight"]; ?> lb(s)</td></tr></table></td>
            <td class="mytd" width="25%"><table width="100%"><tr><td><span>Waybill No.:</span></td><td align="right"><?php echo $shipment["shp_trackingcode"]; ?></td></tr></table></td>
            <td class="mytd" width="25%"><table width="100%"><tr><td><span>Receiver Tax ID/ <br>VAT NO.:</span></td><td align="right"><?php echo $invoice["inv_tax_id"]; ?></td></tr></table></td>
        </tr>
        <tr>
            <td class="mytd" width="50%" colspan="2"><table width="100%"><tr><td><span>Package Marks:</span></td><td align="right"><?php echo $invoice["inv_marks"]; ?></td></tr></table></td>
            <td class="mytd" width="50%" colspan="2"><table width="100%"><tr><td><span>Shipment Contents:</span></td><td align="right"><?php echo $shipment["shp_desc"]; ?></td></tr></table></td>
        </tr>
        <tr>
            <td class="mytd" colspan="4" height="100"><span>Invoice Items:</span>
                <div style="height:100">
                    <table class="mytable" width="100%" >
                        <tr>
                            <td class="highlight">Description of Merchandise</td>
                            <td class="highlight">HTS#</td>
                            <td class="highlight">Country of Origin</td>
                            <td class="highlight">Qty</td>
                            <td class="highlight">Unit</td>
                            <td class="highlight">Unit Value</td>
                            <td class="highlight">Total</td>
                        </tr>
                        <?php
                            foreach($customs as $custom)
                            {
                                ?>
                                <tr>
                                    <td><?php echo $custom['description']; ?></td>
                                    <td><?php echo $custom['hs_tariff_number']; ?></td>
                                    <td>US</td>
                                    <td><?php echo $custom['quantity']; ?></td>
                                    <td>EA</td>
                                    <td><?php echo $custom['value']; ?></td>
                                    <td><?php echo ($custom['quantity'] * $custom['value']); ?></td>
                                </tr>
                                <?php
                            }
                        ?>


                    </table>
                    <table width="50%" align="right" class="mytable">

                        <tr>
                            <td class="highlight">Miscellaneous Charges</td>
                            <td class="highlight" width="65">Amount</td>
                        </tr>
                        <tr>
                            <td><?php echo $invoice["inv_misc_desc"]; ?></td>
                            <td><?php echo $invoice["inv_mist_tot"]; ?></td>
                        </tr>
                        <tr>
                            <td class="highlight">Invoice Total</td>
                            <td class="highlight" width="65">Amount</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><?php echo $invoice["inv_total"]; ?></td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
        <tr>
            <td class="mytd" colspan="4" align="center" style="padding: 5 5 5 5">
                <table border="0" cellspacing="0" borderColor="white">
                    <tr>
                        <td>These commodities, technology or software were exported from the United States in accordance with the Export Administration Regulations.  Diversion contrary to U.S. law is prohibited.</td>
                    </tr>
                </table>
                <br/><br/>
                Signature:_________________________________________________________&nbsp;Date:____________________<br/>
                <br/><br/>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
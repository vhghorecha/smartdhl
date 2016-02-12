<html>
<head>
    <title>Shipping Lable</title>

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
            width:1000px;
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
    </style>

</head>
<body topmargin="0">
<div id='wrapper'>
    <table align="center" class="mytable" width="100%">
        <tr><td class="mytd highlight" align="center"><h2>Shipping Label</h2></td></tr>
        <tr><td align="right" height="50px" ><input type="button" id="btnprint" size="100px"  name="btnprint"  onclick="window.print();" style="background-color: #002a80;color: #ffffff;font-size:18px;width: 200px;height:40px" value="Print"> </td></tr>
        <tr><td><img src="<?php echo $shipment["shp_labelurl"]; ?>" border="0" /></td></tr>

    </table>
</div>
</body>
</html>
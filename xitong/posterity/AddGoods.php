<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>添加新闻</title>
    <link type="text/css" rel="stylesheet" href="../css/form.css"/>
</head>
<body>
<form id="form1" method="post" action="../dbtool/htGoods.class.php">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table0">
        <tr>
            <td style="width:12px; height:30px; background:url(../img/tab/tab_03.gif) no-repeat;"></td>
            <td style="height:30px; background:url(../img/tab/tab_05.gif);">
                <div class="topldiv"><img src="../img/tab/tb.gif"/>&nbsp; 你当前的位置：[系统管理]-[添加车辆]</div>
                <div class="toprdiv">
                    <input type="submit" value="" name="submit" class="submit"/>
                    <input type="hidden" value="add" name="action"/>
                    &nbsp; &nbsp; <a href="../posterity/GoodsManage.php"><img src="../img/htimg/return.gif"/></a>
                </div>
            </td>
            <td style="width:16px; height:30px; background:url(../img/tab/tab_07.gif)  no-repeat;"></td>
        </tr>
        <tr>
            <td style="width:12px;  background:url(../img/tab/tab_12.gif) repeat-y left;"></td>
            <td style=" padding:10px 0px;">
                <table class="table" cellspacing="1">
                    <caption>添加车辆</caption>
                    <tr>
                        <th>型号</th>
                        <td>
                        <input name="name" type="text" Class="textbox"/>
                        </td>
                    </tr>
                    <tr>
                        <th>入库数量</th>
                        <td><input name="number" type="text" Class="textbox"/></td>
                    </tr>
                    <tr>
                        <th>单价</th>
                        <td><input name="price" type="text" Class="textbox"/></td>
                    </tr>
                </table>
            </td>
            <td style="width:17px; height:30px; background:url(../img/tab/tab_15.gif) right;"></td>
        </tr>
        <tr>
            <td style="width:12px; height:30px; background:url(../img/tab/tab_18.gif) no-repeat;"></td>
            <td style="height:30px; background:url(../img/tab/tab_19.gif);">&nbsp;</td>
            <td style="width:16px; height:30px; background:url(../img/tab/tab_20.gif)  no-repeat;"></td>
        </tr>
    </table>
</form>
</body>
</html>

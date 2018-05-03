<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>查询车辆信息</title>
    <link type="text/css" rel="stylesheet" href="../css/form.css"/>
</head>
<body>
<form id="form1">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table0">
        <tr>
            <td style="width:12px; height:30px; background:url(../img/tab/tab_03.gif) no-repeat;"></td>
            <td style="height:30px; background:url(../img/tab/tab_05.gif);">
                <div class="topldiv"><img src="../img/tab/tb.gif"/>&nbsp; 你当前的位置：[系统管理]-[查询车辆信息]</div>
                <div class="toprdiv">
                    <input type="submit" value="" name="submit" class="submit"/>
                    <input type="hidden" value="search" name="action"/>
                    &nbsp; &nbsp; <a href="../posterity/GoodsManage.php"><img src="../img/htimg/return.gif"/></a>
                </div>
            </td>
            <td style="width:16px; height:30px; background:url(../img/tab/tab_07.gif)  no-repeat;"></td>
        </tr>
        <tr>
            <td style="width:12px;  background:url(../img/tab/tab_12.gif) repeat-y left;"></td>
            <td style=" padding:10px 0px;">
                <table class="table" cellspacing="1">
                    <caption>查询车辆信息</caption>
                    <tr>
                        <th>请输入您要查的车型号</th>
                        <td>
                            <input id='name'name="name" type="text" Class="textbox" value=""/>
                        </td>
                    </tr>

                    <tr>
                        <th>数量</th>
                        <td id="number"></td>
                    </tr>
                    <tr>
                        <th>单价</th>
                        <td id="price"></td>
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
<script src="../js/jquery-3.2.1.js"></script>
<script>
    $(function () {
        $(":submit").click(function (w) {
            w.preventDefault();
            $.get("../dbtool/searchGoods.php",{name:$("#name").val()},function(data,textStatus){
                var obj = eval ("(" + data + ")");
//                alert($("#name").val())
                $("#number").text(obj['number']);
                $("#price").text(obj['price']);
            });
        });
    });
</script>
</body>
</html>

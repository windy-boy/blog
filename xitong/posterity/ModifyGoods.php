<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>系统管理</title>
    <link type="text/css" rel="stylesheet" href="../css/form.css"/>
</head>
<body>
<form id="form1" name="form1" method="post" action="../dbtool/Good.class.php">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table0">
        <tr>
            <td style="width:12px; height:30px; background:url(../img/tab/tab_03.gif) no-repeat;"></td>
            <td style="height:30px; background:url(../img/tab/tab_05.gif);">
                <div class="topldiv"><img src="../img/tab/tb.gif"/>&nbsp; 你当前的位置：[系统管理]-[订单管理]</div>
                <div class="toprdiv">
                    <input type="submit" class="submit"  value="" name="submit" >
                    <input type="hidden" name="action" value="submit"/>
                    <input type="hidden" name="status" value="已发货"/>
                    &nbsp;
                </div>
            </td>
            <td style="width:16px; height:30px; background:url(../img/tab/tab_07.gif)  no-repeat;"></td>
        </tr>
        <tr>
            <td style="width:12px; background:url(../img/tab/tab_12.gif) repeat-y left;"></td>
            <td style=" padding:10px 0px;">
                <table class="list" cellspacing="0">
                    <caption>订单管理</caption>
                    <tr>
                        <th>型号</th>
                        <th>价格</th>
                        <th>数量</th>
                        <th>发货状态</th>
                        <th>确定发货</th>
                    </tr>
                    <?php
                    header('Content-type:text/html;charset=utf-8');
                    include '../dbtool/Good.class.php';
                    $result = Good::select();
                    while ($myrow = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td name="name" id="name"><input type="hidden" name='name' id='name' value="<?php echo $myrow['name']; ?>"><?php echo $myrow['name']; ?></td>
                            <td><?php echo $myrow['price']; ?> </td>
                            <td><?php echo $myrow['number']; ?><input type="hidden" name='number' id='number' value="<?php echo $myrow['number'];?>"></td>
                            <td><input type="hidden" name='newstatus' id='newstatus' value="<?php echo $myrow['status'];?>"><?php echo $myrow['status'];?></td>
                            <td style="text-align: center;"><input type="checkbox" name='chk[]' id='chk' value="<?php echo $myrow['id']; ?>"></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>

            </td>
            <td style="width:16px; height:30px; background:url(../img/tab/tab_15.gif);"></td>
        </tr>
        <tr>
            <td style="width:12px; height:30px; background:url(../img/tab/tab_18.gif) no-repeat;"></td>
            <td style="height:30px; background:url(../img/tab/tab_19.gif);">
            </td>
            <td style="width:16px; height:30px; background:url(../img/tab/tab_20.gif)  no-repeat;"></td>
        </tr>
    </table>


</form>
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>系统管理</title>
    <link type="text/css" rel="stylesheet" href="../css/form.css"/>
</head>
<body>
<form id="form1" name="form1" method="post" action="../dbtool/user.class.php">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table0">
        <tr>
            <td style="width:12px; height:30px; background:url(../img/tab/tab_03.gif) no-repeat;"></td>
            <td style="height:30px; background:url(../img/tab/tab_05.gif);">
                <div class="topldiv"><img src="../img/tab/tb.gif"/>&nbsp; 你当前的位置：[系统管理]-[留言管理]</div>
                <div class="toprdiv">
                    <input type="submit" class="delbtn" value=""
                           onclick="javascript:return window.confirm('是否要删除数据?');">
                    <input type="hidden" name="action" value="delete"/>
                    &nbsp;
                </div>
            </td>
            <td style="width:16px; height:30px; background:url(../img/tab/tab_07.gif)  no-repeat;"></td>
        </tr>
        <tr>
            <td style="width:12px; background:url(../img/tab/tab_12.gif) repeat-y left;"></td>
            <td style=" padding:10px 0px;">
                <table class="list" cellspacing="0">
                    <caption>留言管理</caption>
                    <tr>
                        <th>用户</th>
                        <th>联系方式</th>
                        <th>留言</th>
                        <th>批量删除</th>
                    </tr>
                    <?php
                    header('Content-type:text/html;charset=utf-8');
                    include '../dbtool/user.class.php';
                    $result = user::select();
                    while ($myrow = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td name="name" id="name"><?php echo $myrow['name']; ?></td>
                            <td><?php echo $myrow['phone']; ?> </td>
                            <td><?php echo $myrow['suggest']; ?></td>
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

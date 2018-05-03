<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>系统后台管理!</title>
    <meta http-equiv="X-UA-Compatible" content="IE=7"/>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            font-size:12px;
        }

        .STYLE1 {
            font-size: 12px;
            color: #FFFFFF;
        }
        .STYLE2 {font-size: 12px}
        .STYLE3 {
            color: #033d61;
            font-size: 12px;
        }
        .navPoint {
            COLOR: white; CURSOR: hand; FONT-FAMILY: Webdings; FONT-SIZE: 9pt
        }
    </style>
</head>

<body>
<?php
header('content-type:text/html;charset=utf-8');
session_start();
if(!isset($_SESSION['name']))
{
    header("location:login.php");
}
//?>
<form id="form1" runat="server" method="post" action="../dbtool/login.class.php">

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td height="70" background="../img/htimg/main_05.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td height="24"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="270" height="24" background="../img/htimg/main_03.gif">&nbsp;</td>
                                    <td width="505" background="../img/htimg/main_04.gif">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td width="21"><img src="../img/htimg/main_07.gif" width="21" height="24"></td>
                                </tr>
                            </table></td>
                    </tr>
                    <tr>
                        <td height="38">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td style="background-repeat: no-repeat" width="270px" height="38px" background="../img/htimg/main_09.gif">&nbsp;</td>
                                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="77%" height="25" valign="bottom">&nbsp;</td>
                                                <td width="280" valign="bottom"  nowrap="nowrap"><div align="right"><span class="STYLE1"><span class="STYLE2">■<?php echo $_SESSION['name'].",欢迎您"; ?></span> </span></div></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td width="21"><img src="../img/htimg/main_11.gif" width="21" height="38"></td>
                                </tr>
                            </table></td>
                    </tr>
                    <tr>
                        <td height="8" style=" line-height:8px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="270" background="../img/htimg/main_29.gif" style=" line-height:8px;">&nbsp;</td>
                                    <td width="505" background="../img/htimg/main_30.gif" style=" line-height:8px;">&nbsp;</td>
                                    <td style=" line-height:8px;">&nbsp;</td>
                                    <td width="21" style=" line-height:8px;"><img src="../img/htimg/main_31.gif" width="21" height="8"></td>
                                </tr>
                            </table></td>
                    </tr>
                </table></td>
        </tr>
        <tr>
            <td height="28" background="../img/htimg/main_36.gif">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td height="28" background="../img/htimg/main_36.gif">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td style="width:177px; text-align:center; color:#ffffff;font-size:12px;padding-top: 8px; background:url(../img/htimg/main_32.gif) no-repeat"  >管理菜单</td>
                                    <td>
                                        <input name="logout" type="submit" value=" " style="background:url(../img/htimg/out.gif);border:none;width:44px;height:20px; float:right;" />
                                        <input name="action" type="hidden" value="logout"/>
                                    </td>
                                    <td width="21"><img src="../img/htimg/main_37.gif" width="21" height="28"></td>
                                </tr>
                            </table></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="table-layout:fixed;">
        <tr>
            <td width="171" id="frmTitle" noWrap name="fmTitle" align="center" valign="top">
                <table width="171" border="0" cellpadding="0" cellspacing="0"
                       style="table-layout:fixed;">
                    <tr>
                        <td  bgcolor="#1873aa" style="width:6px;">&nbsp;</td>
                        <td  >
                            <img src="../img/htimg/main_40.gif" width="165" height="28" />
                        </td>
                    </tr>
                    <tr>
                        <td  bgcolor="#1873aa" style="width:6px;">&nbsp;</td>
                        <td width="160" height="614px" valign="top" runat="server" style="padding-left:5px;">
                            <div class="dropdown">
                                <button style="width:100%; background: #dedede;" type="button" class="btn dropdown-toggle" id="dropdownMenu1"
                                        data-toggle="dropdown">
                                    系统管理
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" target="I2" href="employees.php">员工管理</a>
                                    </li>
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" target="I2" href="GoodsManage.php">车辆管理</a>
                                    </li>
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" target="I2" href="SearchGoods.php">车辆查询</a>
                                    </li>
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" target="I2" href="ModifyGoods.php">订单管理</a>
                                    </li>
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" target="I2" href="UserSuggest.php">用户留言</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td  bgcolor="#1873aa" style="width:6px;">&nbsp;</td>
                        <td  >

                            <div style="background:url(../img/htimg/main_58.gif); width:165px; height:18px; line-height:18px;">版本：2017V1.0</div>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="6"  style="width:6px;"valign="middle" bgcolor="1873aa" onclick="switchSysBar()">
        <span class="navPoint" id="switchPoint" title="关闭/打开左栏">
            <img src="../img/htimg/main_55.gif" name="img1" width="6" height="40" id="img1">
        </span>
            </td>
            <td width="100%" height="660px" align="center" valign="top">
                <iframe name="I2" width="100%" height="100%"  frameborder="0" src="GoodsManage.php" > 浏览器不支持嵌入式框架，或被配置为不显示嵌入式框架。</iframe>
            </td>
            <td  bgcolor="#1873aa" style="width:6px;">&nbsp;</td>
        </tr>
    </table>
    <script language="javascript" type="text/javascript">
        function switchSysBar()
        {
            var locate=location.href.replace('htindex.php','');
            var ssrc=document.all("img1").src.replace(locate,'');
            console.log(ssrc)
            if (ssrc==="http://localhost:9009/xitong/img/htimg/main_55.gif")
            {
                document.all("img1").src="../img/htimg/main_55_1.gif";
                document.all("frmTitle").style.display="none"
            }
            else
            {
                document.all("img1").src="http://localhost:9009/xitong/img/htimg/main_55.gif";
                document.all("frmTitle").style.display=""
            }
        }

    </script>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="6" background="../img/htimg/main_59.gif" style="line-height:6px;"><img src="../img/htimg/main_59.gif" width="6" height="6" ></td>
            <td background="../img/htimg/main_61.gif" style="line-height:6px;">&nbsp;</td>
            <td width="6" background="../img/htimg/main_61.gif" style="line-height:6px;"><img src="../img/htimg/main_62.gif" width="6" height="6" ></td>
        </tr>
    </table>
</form>
</body>
</html>
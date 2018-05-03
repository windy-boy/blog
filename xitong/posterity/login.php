<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>登陆</title>
    <link type="text/css" rel="Stylesheet" href="../css/login.css" />
</head>
<body>
    <form id="form1" method="post" action="../dbtool/login.class.php">
    <div id="top"></div>
    <div id="middle">
        <div id="left"></div>
        <div id="center">
            <table width="100%" height="53px" cellpadding="0">
                    <tr>
                        <td>用户</td>
                    <td>
                        <input name="name" type="text" Class="textbox" value="<?php if(isset($_COOKIE['name'])) echo $_COOKIE['name'];?>" />
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>密码</td>
                    <td>
                        <input name="password" type="password" Class="textbox"/>
                        <input name="action" type="hidden" value="login" />
                    </td>
                    <td>
                        <input name="submit" type="submit" Class="dl" value=""/>
                    </td>
                </tr>
                <tr>
                    <td>验证码</td>
                    <td>
                        <input name="tbcaptcha" type="text" Class="textbox" />
                    </td>
                    <td><a id="change" href="#"><img id="code" src="code.php"/></a></td>
                    <script>
                        var change=document.getElementById("change");
                        var code=document.getElementById("code");
                        change.onclick=function()
                        {
                            code.src="code.php?t="+new Date();
                            return;
                        }
                    </script>
                </tr>
            </table>
        </div>
        <div id="right"></div>
    </div>
    <div id="bottom"></div>
    </form>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改密码</title>
    <link rel="stylesheet" href="../css/bodybackground.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <script src="../bootstrap/js"></script>
    <style>
        .bg{
            width: 100%;
            height: 600px;
            background-image: url("../img/logbg.jpg");
        }
        .panel{
            width: 400px;
            height: 250px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
<div class="bg">
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">修改密码</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" action="../dbtool/user.class.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" id="oldname" placeholder="请输入当前昵称" name="oldname">
        </div>
        <div class="form-group" style="margin-top: 20px;">
            <input type="password" class="form-control" id="newpwd" placeholder="请输入新的密码" name="newpwd">
        </div>
        <div class="form-group" style="margin-top: 20px;">
            <input type="password" class="form-control" id="newpwd1" placeholder="请再次确认密码">
        </div>
           <div class="box">
        <button type="submit" class="btn btn-default" style="background-color: #428bca;color: #fff;">确认</button>
        <input type="hidden" value="modify" name="action"/>
        <button type="reset" class="btn btn-default" style="background-color: #428bca;color: #fff;">取消</button>

           </div>
        </form>
    </div>
</div>
</div>
<?php include "footer.php";?>
</body>
</html>
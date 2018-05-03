<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bodybackground.css">
    <link rel="stylesheet" href="../css/top_nav.css"/>
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/css/bootstrap-theme.min.css"></script>
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <style>
        *{
            list-style: none;
        }
        .panel{
            width: 60%;
            height: 400px;
            margin: 0 auto;
        }
        body {
            height: 661px;
            background: url("../img/logbg.jpg") no-repeat;
            background-size: 100% 100%;
        }
        .footer{
            margin-top: 200px;
        }
        span{
            color: #f00;
        }
    </style>
</head>
<body>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">注册账号</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" action="../dbtool/user.class.php" method="post">
            <div class="form-group">
                <label for="zhanghao" class="col-sm-2 control-label">账号</label>
                <div class="col-sm-10 zhanghao" >
                    <input type="text" class="form-control zhanghao" id="zhanghao"  name="zhanghao" >

                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">密码</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control password" id="password"  name="password">
                </div>
            </div>
            <div class="form-group">
                <label for="password1" class="col-sm-2 control-label">确认密码</label>
                <div class="col-sm-10 password">
                    <input type="password" class="form-control password" id="password1"  name="password1">
                </div>
            </div>
            <div class="form-group">
                <label for="number" class="col-sm-2 control-label">手机号码</label>
                <div class="col-sm-10 phone">
                    <input type="number" class="form-control password" id="number"  name="number">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">邮箱</label>
                <div class="col-sm-10 email">
                    <input type="email" class="form-control password" id="email"  name="email">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">提交</button>
                    <input type="hidden" value="zhuce" name="action" />
                    <button type="reset" class="btn btn-default">重置</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(function () {
        $(':submit').click(function (e) {
            var zhanghao=$('#zhanghao').val();
            if (zhanghao==''){
                if($('.zhanghao').find('span').length==0){
                    $('<span>账号不能为空！</span>').appendTo($('.zhanghao'))
                }
                e.preventDefault();
            }
            var email=$('#email').val();
            var  reg = /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/;
            if (!reg.test(email)){
                if($('.email').find('span').length==0){
                    $('<span class="email">邮箱格式错误，请输入正确的邮箱！</span>').appendTo($('.email'))
                    e.preventDefault();
                }
            }
            var phone=$('#number').val();
            var reg1 = /^1\d{10}$/;
            if(!reg1.test(phone)){
               if($('.phone').find('span').length==0){
                   $('<span class="phone">手机号码输入有误，请重新输入！</span>').appendTo($('.phone'))
                   e.preventDefault();
               }
            }
            var password=$('#password').val();
            var password1=$('#password1').val();
            if(password!=password1){
                if($('.password').find('span').length==0){
                    $('<span class="phone">两次密码不一致！请重新输入</span>').appendTo($('.password'))
                    e.preventDefault();
                }
            }
        });
        $('input').focus(function () {
            $('span').remove();
        });





    })
</script>
<?php
include 'footer.php';
//?>
</body>
</html>
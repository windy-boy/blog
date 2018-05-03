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
    <link rel="stylesheet" href="../css/jquery.idcode.css">
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/jquery.idcode.js"></script>
    <style>
        * {
            list-style: none;
        }

        .panel {
            width: 50%;
            height: 350px;
            margin: 0 auto;
            /*position:relative;*/
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #warn {
            position: absolute;
            top: 15%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 50%;
            height: 100px;
            color: #f00;
            font-size: 18px;
            border: 1px solid #f00;
        }

        span {
            position: absolute;
            bottom: 0;
            right: 0;
            color: #f00;
            cursor: pointer;
        }

        body {
            height: 661px;
            background: url("../img/logbg.jpg") no-repeat;
            background-size: 100% 100%;
        }

    </style>
</head>
<body>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">个人登录</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="post" action="../dbtool/UserLogin.class.php">
            <div class="form-group">
                <label for="zhanghao" class="col-sm-2 control-label">账号</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control zhanghao" id="name" name="name">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">密码</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control password" id="password" name="password">
                </div>
            </div>
            <div class="form-group">
                <span for="Txtidcode" id="idcode" class="col-sm-2 control-label">验证码</span>
                <div class="col-sm-10">
                    <input type="text" class="txtVerification form-control " id="Txtidcode"/>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-12">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="check">下次自动登录
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-sm-12">
                    <button type="submit" class="btn btn-default" style="width: 100%;background-color: #7294ff">登录</button>
                    <input type="hidden" value="login" name="action"/>

                </div>
            </div>
            <span><a href="zhuce.php">注册账号>></a></span>
        </form>
    </div>
</div>
<div id="warn"></div>
<script>
    $(function () {
        $('#warn').hide();
        $(':input').focus(function () {
            $('#warn').hide();
        });
        $.idcode.setCode();   //加载生成验证码方法
        $(":submit").click(function (e) {
            e = e || window.event;
            var IsBy = $.idcode.validateCode()  //调用返回值，返回值结果为true或者false
            if (IsBy) {

            } else {
                $('#warn').show().text('验证码输入错误')
                e.preventDefault();
            }
        })

        var check = $('.check').eq(0)
        $('body').mousemove(function (e) {
//            e.preventDefault()
//            $.post('../dbtool/user.class.php',{name:$('#name').val(),password:$('#password').val()});
            if (check.is(':checked')) {
                var zhanghao = $('#zhanghao').val();
                var pwd = $('#password').val();
                var obj = {
                    zhanghao: zhanghao,
                    pwd: pwd
                }
                var objstr = JSON.stringify(obj);
                localStorage.setItem('value', objstr);
            } else {
                localStorage.removeItem('value')
            }
        });
        var value = localStorage.getItem('value');
        var result = JSON.parse(value);
        var name = result.zhanghao
        var password = result.pwd;
        $('.zhanghao').val(name);
        $('.password').val(password);
    })
</script>
</body>
</html>
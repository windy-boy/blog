<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="../js/jquery-3.2.1.js"></script>
    <script>
        $(function () {
            $('.center ul li').hover(function () {
                $(this).css({color: '#000', backgroundColor: '#fff'})
            }, function () {
                $(this).css({color: '#fff', backgroundColor: '#469EF5'})
            })
            $('.bigbox li').eq(0).click(function () {
                $(location).attr('href', './user.php');
            });
            $('.bigbox li').eq(4).click(function () {
                $(location).attr('href', './userlogin.php');
            });
            $('.bigbox li').eq(3).click(function () {
                $(location).attr('href', './ContactUs.php');
            });
        })
    </script>
</head>
<body>
<?php
header('content-type:text/html;charset=utf-8');
session_start();
if (!isset($_SESSION['user'])) {
    ?>
    <script>
        $(function () {
            $('#login').show();
            $('a').off('click');
            $('a').click(function () {
                alert('登录后才能购买哦！')
            });
        })
    </script>
<?php
}else{
?>
    <script>
        $(function () {
            $('#login').hide();
            $('<li style="text-align: center"  class="personal">个人中心</li>').appendTo('.bigbox')
            $('.personal').hover(function () {
                $(this).css({backgroundColor: '#fff', color: '#000'})
            }, function () {
                $(this).css({backgroundColor: '#469EF5', color: '#fff'})
            })
            $('.personal').click(function () {
                $(location).attr('href', './buycart.php');
            });
            $('.personal').hover(function () {
                $('.perSlide').slideDown(300);
            }, function () {

            })
            $('.perSlide').hover(function () {

            }, function () {
                $(this).slideUp(300);
            })
            $('.perSlide ul li button').hover(function () {
                $(this).css({color: '#000', backgroundColor: '#fff', cursor: 'pointer'});
            }, function () {
                $(this).css({color: '#fff', backgroundColor: '#469EF5'});
            })
            $('.perSlide ul button').eq(0).click(function (e) {
                e = e || window.event;
                console.log($(this))
                $(location).attr('href', './buycart.php');
            });
            $('#modify').click(function () {
                $(location).attr('href', './modify.php');
            });

        })
    </script>
    <?php
}
?>
<form action="../dbtool/UserLogin.class.php" method="post">
    <div class="bottom_nav">
        <div class="bottom_nav_bg">
            <div class="center" style="width: 1000px;margin: 0 auto">
                <ul class="bigbox">
                    <li style="text-align: center">店铺详情</li>
                    <li style="text-align: center">行业动态</li>
                    <li style="text-align: center">市场近况</li>
                    <li style="text-align: center" class="ContactUs">联系我们</li>
                    <li style="text-align: center" id="login">您好，请登录</li>
                </ul>
                <div class="perSlide"
                     style="width: 200px;height: 240px;background-color: #469EF5;position: absolute;top: 39px;right: 0px;display: none;">
                    <ul>
                        <li style="width: 200px;height: 80px;text-align: center;line-height: 80px;font-size: 18px;color: #fff;">

                            <button type="button"
                                    style="width: 100%;height: 100%;background-color: #469EF5;outline: none;font-size: 18px;color: #fff;">
                                订单详情
                            </button>
                        </li>
                        <li style="width: 200px;height: 80px;text-align: center;line-height: 80px;font-size: 18px;color: #fff;">

                            <button id="modify" type="button"
                                    style="width: 100%;height: 100%;background-color: #469EF5;outline: none;font-size: 18px;color: #fff;">
                                修改密码
                            </button>
                        </li>
                        <li style="width: 200px;height: 80px;text-align: center;line-height: 80px;font-size: 18px;color: #fff;">
                            <button type="submit"
                                    style="width: 100%;height: 100%;background-color: #469EF5;outline: none;font-size: 18px;color: #fff;">
                                注销账号
                            </button>
                            <input type="hidden" value="logout" name="action"/>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


</form>
</body>
</html>
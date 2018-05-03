<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../css/bodybackground.css">
    <link rel="stylesheet" href="../css/top_nav.css"/>
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <script src="../bootstrap/js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        #box {
            position: absolute;
            top: 100px;
            left: 100px;
            display: inline-block;
            padding: 5px;
            border: 1px solid #ccc;
        }

        #box img {
            width: 300px;
        }

        #show {
            border: 1px solid black;
            display: inline-block;
            position: absolute;
            overflow: hidden;

        }

    </style>
    <script src='../js/jquery-3.2.1.js'></script>
    <script>
        $(function () {
            var docWidth=$(document).width();
            if (docWidth<1001){
                $('#box').hide();
            }else {
                $('#box').show();
            }
            $(window).resize(function () {
                var docWidth=$(document).width();
                if (docWidth<1001){
                    $('#box').hide();
                }else {
                    $('#box').show();
                }
            });
        });
    </script>
    <script>
        $(function () {
            var result=localStorage.getItem('result');
            $('img').attr('src',result);
            $.getJSON('../JSON/package.json',function (data) {
                $.each(data,function (index,info) {
                    var src=info['src'];
                    var name=info['name'];
                    var price=info['price'];
                    if (result==src){
                        $('#name').val(name);
                        $('#price').val(price);
                        var num=$('#number').val();
                        var allprice=num*price;
                        $('#allprice').val(allprice);
                    }
                })
            })

            $('#box img').mouseenter(function () {
                var that = this;
                var imgLeft = $(this).offset().left;
                var imgTop = $(this).offset().top;
                var imgWidth = $(this).width();
                var imgHeight = $(this).height();

                var $showSpan = $('<span id="show" style="z-index: 1"></span>');
                // on('load')img从服务器 加载完成图片
                var $bigImage = $('<img>').prop('src', $(this).prop('src')).on('load', function () {//异步
                    //在 父元素span还没有设置css 宽高时先设置图片的大小
                    $(this).css({width: this.width});
                    $(this).appendTo($showSpan);
                    $(that).after($showSpan);
                    $showSpan.insertAfter($(that).parent()).css({
                        width: 300,
                        height: 300,
                        left: imgLeft + imgWidth + 5,
                        top: imgTop - 5
                    });
                    //鼠标移动
                    // 定义横轴数轴的缩放倍数  横竖轴等比缩放比例相同
                    var scale = $(this).width() / $(that).width();
                    //定义大图原生dom
                    var bigImg = this;

                    $(that).on('mousemove', function (e) {
                        //实时获取鼠标相对于与 小图片偏移量
                        var sOffsetX = e.clientX - imgLeft;
                        var sOffsetY = e.clientY - imgTop;
                        //获取大图的偏移量   =  小图偏移量 * 缩放倍数 - 展示span宽度的一半
                        var bOffsetX = (sOffsetX * scale) - ($(bigImg).parent().width() / 2);
                        var bOffsetY = (sOffsetY * scale) - ($(bigImg).parent().height() / 2);

                        $(bigImg).parent().scrollTop(bOffsetY).scrollLeft(bOffsetX)
                    })


                })
            }).mouseleave(function () {

                $('#show').remove();
                $('#box img').off('mousemove');

            })
        })
    </script>
</head>
<body>
<div class="shopmain" style="width: 100%;height: 600px;">
    <div id="box">
        <img src="">
    </div>
    <div class="panel  panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">车辆详情</h3>
        </div>
        <div class="panel-body">
            <div class="shopdata" style="width: 60%;margin-top:40px;float: right;z-index: -1 ;">
                <form class="form-horizontal" role="form" method="post" action="../dbtool/Good.class.php">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">车型号</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name"   readonly='true' value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-sm-2 control-label">单价</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="price"id="price" readonly='true' value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="number" class="col-sm-2 control-label">数量</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="number" id="number" value="1" min="1">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="allprice" class="col-sm-2 control-label">总计</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="allprice" readonly='true' value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default" id="submit">确认购买</button>
                            <input type="hidden" value="add" name="action" />
                            <input type="hidden"  name="status" value="未发货">
                            <button type="reset" class="btn btn-default" id="reset">取消购买</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>


<script>
    $(function () {
        $('#number').change(function () {
            var price=$('#price').val();
            var num=$(this).val();
            var allprice=price*num;
            $('#allprice').val(allprice);
        })
        $('#reset').click(function () {
            $(location).attr('href', 'http://localhost:9009/xitong/php/user.php');
        });
    })
</script>
<?php
include 'footer.php';
//?>
</body>
</html>
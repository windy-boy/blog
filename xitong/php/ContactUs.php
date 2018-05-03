<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="../css/bodybackground.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <script src="../bootstrap/js"></script>
    <style type="text/css">

        body, html {
            width: 100%;
            height: 100%;
            margin: 0;
            font-family: "微软雅黑";
        }

        #allmap {
            width: 100%;
            height: 400px;
        }

        p {
            margin-left: 5px;
            font-size: 14px;
        }

        .content {
            width: 400px;
            float: left;
        }

        .content ul {
            width: 100%;
        }

        .content ul li {
            list-style: none;
            margin-top: 20px;
        }

        .betterUs {
            width: 400px;
            height: 400px;
            float: right;
        }

    </style>
    <script type="text/javascript"
            src="http://api.map.baidu.com/api?v=2.0&ak=UTYVzzHVFbs8eGsAtlqldg5mRMKxT045"></script>
    <title>联系我们</title>
</head>
<body>
<div id="allmap"></div>
<div class="content">
    <ul>
        <li><span>地址：</span><span>东莞松山湖大学路三号</span></li>
        <li><span>电话：</span><span>13528096812</span></li>
        <li><span>email：</span><span>2789209069@qq.com</span></li>
    </ul>
</div>
<div class="betterUs">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">投诉与建议</h3>
        </div>
        <div class="panel-body">
            <form role="form" method="post" action="../dbtool/user.class.php">
                <div class="form-group">
                    <input type="text" class="form-control" id="name" placeholder="请输入名字" name="name">
                </div>
                <div class="form-group" style="margin-top: 20px;">
                    <input type="text" class="form-control" id="phone" placeholder="联系方式" name="phone">
                </div>
                <div class="form-group">
                    <label for="name">留言</label>
                    <textarea class="form-control" rows="3" placeholder="投诉与建议" name="suggest"></textarea>
                </div>
                <button type="submit" class="btn btn-default" style="background-color: #428bca;color: #fff;">提交</button>
                <input type="hidden" name="action" value="suggest">
            </form>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>
</body>
</html>
<script>
    var sContent =
        "<h4 style='margin:0 0 5px 0;padding:0.2em 0'>公司地址</h4>" +
        "<img style='float:right;margin:4px' id='imgDemo' src='../img/damen.jpg' width='139' height='104' title='公司地址'/>" +
        "<p style='margin:0;line-height:1.5;font-size:13px;text-indent:2em'>本公司的地址在东职院的七栋504……</p>" +
        "</div>";
    var map = new BMap.Map("allmap", {minZoom: 4, maxZoom: 14});
    var point = new BMap.Point(113.863433, 22.903042);
    var marker = new BMap.Marker(point);
    var infoWindow = new BMap.InfoWindow(sContent);  // 创建信息窗口对象
    map.centerAndZoom(point, 15);
    map.addOverlay(marker);
    marker.addEventListener("click", function () {
        this.openInfoWindow(infoWindow);
        //图片加载完毕重绘infowindow
        document.getElementById('imgDemo').onload = function () {
            infoWindow.redraw();   //防止在网速较慢，图片未加载时，生成的信息框高度比图片的总高度小，导致图片部分被隐藏
        }
    });

</script>

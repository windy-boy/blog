<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>购物车</title>
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
        table{
            width: 100%;
            height: auto;
            border: 1px solid #cccccc;
        }
        tr{

        }
    </style>
</head>
<body>
<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">购物车</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>宝贝名称</th>
                <th>宝贝价格</th>
                <th>宝贝数量</th>
                <th>发货状态</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include('../dbtool/Good.class.php');
            $result=  Good::select();
            while ($row=  mysqli_fetch_array($result))
            {
                ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['number']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include 'footer.php';
?>
<script>
    $(function () {
        var height=$('table').css('height');
        var hstr=height.substr(0,2);
       if (hstr<=600){
           $('.footer').css('margin-top','600px');
       }
    })
</script>
</body>
</html>
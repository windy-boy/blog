<?php
if (!empty($_GET['name'])){
    header('Content-type:text/html;charset=utf-8');
    $name=$_GET['name'];
    $link = mysqli_connect('localhost', 'root', 'root', 'Goods_cjc');
    $strsql = "SELECT * FROM Goodsinfo WHERE name= '$name'";
    $result = mysqli_query($link, $strsql);
//    $strsql = "select * from Goodsinfo";
    $row = mysqli_fetch_array($result);
    echo   json_encode($row);
    $link->close();
}
    ?>

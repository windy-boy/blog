<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
header('Content-type:text/html;charset=utf-8');
function __autoload($className)
{
    include "$className.class.php";
}
$dbconfig=array(
    'user'=>'root',
    'pwd'=>'root',
    'database'=>'Goods_cjc',
    'port'=>'9009'
);
function model($tableName)
{
    $model=$tableName.'Model';
    return new $model($tableName);
}
?>

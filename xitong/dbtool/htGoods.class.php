<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of News
 *
 * @author Admin
 */
include 'init.php';
include 'tool.php';
if(isset($_POST['action']))
{
    switch ($_POST['action'])
    {
        case 'add':
            htGoods::Insert($_POST['name'],$_POST['price'],$_POST['number']);
            break;
        case 'delete':
            htGoods::deleteByID($_POST['chk']);
            break;
        case 'update':
            htGoods::Update($_POST['name'],$_POST['number'],$_POST['price']);
            break;
        case 'search':
            htGoods::searchByName($_POST['name']);
            break;
            default :
            ;
    }
}
class htGoods {
    //put your code here
    public static function selectAll()
    {
        $db=phpDB::getInstanc($GLOBALS['dbconfig']);
        $sql="select id,name,price,number from Goodsinfo order by id ASC ";
        $result= $db->query($sql);
        return $result;
    }
    //查询当前页的记录
    public static function selectCurrentPage($currentPage,$pageSize)
    {
        $db=phpDB::getInstanc($GLOBALS['dbconfig']);
        $sql="select * from Goodsinfo order by id asc limit ".($currentPage-1)*$pageSize.",".$pageSize;
        $result= $db->query($sql);
        return $result;
    }
    //获取总记录数
    public static function getRecordNumber()
    {
        $db=phpDB::getInstanc($GLOBALS['dbconfig']);
        $sql="select ID from Goodsinfo";
        $result= $db->query($sql);
        return mysqli_num_rows($result);
    }
    public static function searchByName($name)
    {
        $db=phpDB::getInstanc($GLOBALS['dbconfig']);
        $sql="select * from Goodsinfo where name='.$name'";
        $result= $db->query($sql);
        return $result;
    }
    public static function Insert($name,$price,$number)
    {
        $db=phpDB::getInstanc($GLOBALS['dbconfig']);
        $sql="INSERT INTO Goodsinfo(name,price,number) values
            ('".$name."','".$price."','".$number."')";
        $result= $db->query($sql);
        if(!$result)
        {
            tool::alertBack('添加失败！');
        }
        else {
            tool::alertGo('添加成功!', '../posterity/GoodsManage.php');
        }
    }
    public static function Update($name,$number,$price)
    {
        $db=phpDB::getInstanc($GLOBALS['dbconfig']);
        $sql="update Goodsinfo set number=".$number.",price=".$price." where name='".$name."'";;
        $result= $db->query($sql);
        tool::alertGo("成功修改车辆信息",'../posterity/GoodsManage.php');
    }
    //根据ID删除用户信息
    public static function deleteByID($ID)
    {
        if(count($ID) <= 0)
        {						//判断提交的删除记录是否为空
            echo "<script>alert('请选择记录');history.go(-1);</script>";
        }
        $num=0;
        $db=phpDB::getInstanc($GLOBALS['dbconfig']);
        foreach ($ID as $v){
             $sql="delete from Goodsinfo where id = ".$v;
             $result=$db->query($sql);
             if($result==FALSE){
                 tool::alertBack("删除失败！");
             }
             $num++;
           
        }
        tool::alertGo("成功删除".$num."条记录！",'../posterity/GoodsManage.php');
    }
}

?>

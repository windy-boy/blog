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
            Good::Insert($_POST['name'],$_POST['price'],$_POST['number'],$_POST['status']);
            break;
        case 'delete':
            Good::Delete($_POST['check']);
            break;
        case 'zhuce':
            Good::zhuce($_POST['zhanghao'],$_POST['password'],$_POST['number'],$_POST['email']);
            break;
        case 'submit':
            $db=phpDB::getInstanc($GLOBALS['dbconfig']);
            $name=$_POST['name'];

            $sqlGoodsinfo="select * from goodsinfo where name= '$name'";
            $result= $db->query($sqlGoodsinfo);
            $myrow = mysqli_fetch_array($result);
            $b=$myrow['number'];
            $num=$_POST['number'];
            $newnumber=$b-$num;
            Good::UpdateByID($_POST['chk'],$_POST['status'],$_POST['newstatus']);
            Good::UpdateGoodsinfo($newnumber,$_POST['name'],$_POST['newstatus']);
            break;
            default :
            ;
    }
}
class Good {
    //put your code here

    public static function UpdateGoodsinfo($number,$name,$newstatus,$b,$result,$sql)
    {
        if($newstatus=="未发货"){
            $db=phpDB::getInstanc($GLOBALS['dbconfig']);
            $sql="update Goodsinfo set number=".$number." where name='".$name."'";;
            $result= $db->query($sql);
            echo "<script>alert('成功更新库存');history.go(-1);</script>";

        }
        echo "<script>history.go(-1);</script>";


    }
    public static function UpdateByID($ID,$status,$newstatus)
    {
        if(count($ID) <= 0)
        {						//判断提交的删除记录是否为空
            echo "<script>alert('请选择记录');history.go(-1);</script>";
        }else if($newstatus=="已发货"){
            echo "<script>alert('所选记录包含已发货，请重新选择');</script>";
        }
        else{
            $num=0;
            $db=phpDB::getInstanc($GLOBALS['dbconfig']);
            foreach ($ID as $v){
                $sql="update user_goods set status='".$status."'  where id = ".$v;
                $result=$db->query($sql);
                if($result==FALSE){
                    tool::alertBack("发货失败！");
                }
                $num++;

            }
            tool::alertGo("成功发货".$num."条记录！",'../posterity/ModifyGoods.php');

        }

    }
    public static function zhuce($name,$password,$phone,$email)
    {
        $db=phpDB::getInstanc($GLOBALS['dbconfig']);//数据操作类对象的实例化
        $sql="insert into userinfo(name,password,phone,email) values
            ('".$name."','".$password."','".$phone."','".$email."')";//根据函数功能写SQL语句
        $result= $db->query($sql);//通过数据库操作类的对象调用函数执行SQL语句
        if($result==FALSE)
        {
            tool::alertBack('添加失败');
        }
        else
        {
            tool::alertGo('添加成功','../php/userlogin.php');
        }
    }
    public static function select()
    {
        $db=phpDB::getInstanc($GLOBALS['dbconfig']);//数据操作类对象的实例化
        $sql="select * from user_goods";//根据函数功能写SQL语句
        $result= $db->query($sql);//通过数据库操作类的对象调用函数执行SQL语句
        return $result;
    }
    public static function selectByID($id)
    {
        $db=phpDB::getInstanc($GLOBALS['dbconfig']);//数据操作类对象的实例化
        $sql="select * from user_goods where ID='".$id."'";//根据函数功能写SQL语句
        $result= $db->query($sql);//通过数据库操作类的对象调用函数执行SQL语句
        return $result;
    }
//    public static function Update($name,$author,$price,$publish,$ptime,$id)
//    {
//        $db=phpDB::getInstanc($GLOBALS['dbconfig']);//数据操作类对象的实例化
//        $sql="update user_goods set name='".$name."',author='".$author.
//              "',price='".$price."',publish='".$publish."',ptime='".$ptime."' where ID='".$id."'";//根据函数功能写SQL语句
//        $result= $db->query($sql);//通过数据库操作类的对象调用函数执行SQL语句
//        if($result==FALSE)
//        {
//            tool::alertBack('修改失败');
//        }
//        else
//        {
//            tool::alertGo('修改成功','../infomanage/BookManage.php');
//        }
//    }
    public static function Insert($name,$price,$number,$status)
    {
        $db=phpDB::getInstanc($GLOBALS['dbconfig']);//数据操作类对象的实例化
        $sql="insert into user_goods(name,price,number,status) values
            ('".$name."','".$price."','".$number."','".$status."')";//根据函数功能写SQL语句
        $result= $db->query($sql);//通过数据库操作类的对象调用函数执行SQL语句
        if($result==FALSE)
        {
            tool::alertBack('添加失败');
        }
        else
        {
            tool::alertGo('添加成功','../php/user.php');
        }
    }
//    public static function Delete($id)
//    {
//        $db=phpDB::getInstanc($GLOBALS['dbconfig']);//数据操作类对象的实例化
//        foreach ($id as $value)
//        {
//            $sql="delete from user_goods where id=".$value."";
//            $result= $db->query($sql);//通过数据库操作类的对象调用函数执行SQL语句
//            if($result==FALSE)
//            {
//                tool::alertBack('删除失败');
//            }
//        }
//        tool::alertGo('删除成功','../infomanage/BookManage.php');
//    }
}

?>

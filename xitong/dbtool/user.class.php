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
        case 'zhuce':
            user::zhuce($_POST['zhanghao'],$_POST['password'],$_POST['number'],$_POST['email']);
            break;
        case 'login':
            user::userLogin($_POST['zhanghao'],$_POST['password']);
            break;
        case 'suggest':
            user::Suggest($_POST['name'],$_POST['phone'],$_POST['suggest']);
            break;
        case 'delete':
            user::deleteByID($_POST['chk']);
            break;
        case 'modify':
            user::Update($_POST['oldname'],$_POST['newpwd']);
            user::logOut();
            break;
            default:

    }
}
class user {
    public static function zhuce($name,$password,$phone,$email)
    {
        $db=phpDB::getInstanc($GLOBALS['dbconfig']);//数据操作类对象的实例化
        $sql="insert into userinfo(name,password,phone,email) values
            ('".$name."','".$password."','".$phone."','".$email."')";//根据函数功能写SQL语句
        $result= $db->query($sql);//通过数据库操作类的对象调用函数执行SQL语句
        if($result==FALSE)
        {
            tool::alertBack('注册失败');
        }
        else
        {
            tool::alertGo('注册成功','../php/userlogin.php');
        }
    }
    public static function userLogin($Name,$Password)
    {
        $sqlstr = "select * from userinfo where name='".$Name."' and password='".$Password."'";
        $db=phpDB::getInstanc($GLOBALS['dbconfig']);
        $result = $db->query($sqlstr);
        $myarray= mysqli_fetch_array($result);
        if (count($myarray)==0){
            echo "<script>alert('用户名或密码错误');history.go(-1);</script>";
        }else{
            session_start();
//            $_SESSION['name']=$_POST['tbName'];
            echo "<script>location='../php/user.php';</script>";
        }
    }
    public static function Update($name,$newpwd)
    {
        $db=phpDB::getInstanc($GLOBALS['dbconfig']);
        $sql="update userinfo set password=".$newpwd." where name='".$name."'";;
        $result= $db->query($sql);
    }
    public static function logOut()
    {
        session_start();
        unset($_SESSION['user']);
        echo "<script>location='http://localhost:9009/xitong/index.html';</script>";
    }

    public static function Suggest($name,$phone,$suggest)
    {
        $db=phpDB::getInstanc($GLOBALS['dbconfig']);
        $sql="INSERT INTO usersuggest(name,phone,suggest) values
            ('".$name."','".$phone."','".$suggest."')";
        $result= $db->query($sql);
        if(!$result)
        {
            tool::alertBack('留言失败！');
        }
        else {
            tool::alertGo('留言成功!', '../php/ContactUs.php');
        }
    }

    public static function select()
    {
        $db=phpDB::getInstanc($GLOBALS['dbconfig']);
        $sql="select * from usersuggest ";
        $result= $db->query($sql);
        return $result;
    }

    public static function deleteByID($ID)
    {
        if(count($ID) <= 0)
        {						//判断提交的删除记录是否为空
            echo "<script>alert('请选择记录');history.go(-1);</script>";
        }
        $num=0;
        $db=phpDB::getInstanc($GLOBALS['dbconfig']);
        foreach ($ID as $v){
            $sql="delete from usersuggest where id = ".$v;
            $result=$db->query($sql);
            if($result==FALSE){
                tool::alertBack("删除失败！");
            }
            $num++;

        }
        tool::alertGo("成功删除".$num."条记录！",'../posterity/UserSuggest.php');
    }


}


?>

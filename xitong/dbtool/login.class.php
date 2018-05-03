<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Administrator
 */
include 'init.php';
if(isset($_POST['action']))
{
    switch ($_POST['action'])
    {
        case 'add':
            User::addUser($_POST['name'],$_POST['password']);
            break;
        case 'login': 
            User::userLogin($_POST['name'], $_POST['password']);
            break;
        case 'update':
            User::updateUser($_POST['name'],$_POST['password']);
            break;
        case 'delete':
            User::deleteUserByID($_POST['chk']);
            break;
        case 'logout':
            User::logOut();
            break;
            default :
            ;
    }
}
class User {
    public static function selectAll()
    {
        $db=phpDB::getInstanc($GLOBALS['dbconfig']);
        $sql="select id,name,password from login order by id desc";
        $result= $db->query($sql);
        return $result;
    }
    public static function addUser($Name,$Password)
    {
        $sqlstr = "insert into login(name,password) values('".$Name. "','".$Password."')";
        $db=phpDB::getInstanc($GLOBALS['dbconfig']);
        $result = $db->query($sqlstr);
	if ($result){
		echo "<script>alert('添加成功');location='http://localhost:9009/xitong/posterity/employees.php';</script>";
	}else{
		echo "<script>alert('添加失败');history.go(-1);</script>";
	}
    }
    public static function updateUser($Name,$Password)
    {
        $sqlstr = "update login set password='".$Password."' where name='".$Name."'";
	 $db=phpDB::getInstanc($GLOBALS['dbconfig']);
         $result = $db->query($sqlstr);
	if ($result){
		echo "<script>alert('修改成功');location='http://localhost:9009/xitong/posterity/login.php';</script>";
	}else{
		echo "<script>alert('修改失败');history.go(-1);</script>";
	}
    }
    public static function userLogin($Name,$Password)
    {

        $sqlstr = "select * from login where name='".$Name."' and password='".$Password."'";
        $db=phpDB::getInstanc($GLOBALS['dbconfig']);
        $result = $db->query($sqlstr);
        $myarray= mysqli_fetch_array($result);  
        if (count($myarray)==0){
                echo "<script>alert('用户名或密码错误');history.go(-1);</script>";
        }else{
            session_start();
            $_SESSION['name']=$_POST['name'];
            checkLogin();

        }
    }

    //根据ID删除用户信息
    public static function deleteUserByID($ID)
    {
        if(count($ID) <= 0)
        {						//判断提交的删除记录是否为空
            echo "<script>alert('请选择记录');history.go(-1);</script>";
        }
        else
        {
            for($i = 0; $i < count(($ID)); $i++)
            {		//for语句循环读取复选框提交的值
                 $sqlstr = "delete from login where ID = ".$ID[$i];	//循环执行删除操作
                 $db=phpDB::getInstanc($GLOBALS['dbconfig']);
                 $result = $db->query($sqlstr);
            }
         echo "<script>alert('删除成功');location='http://localhost:9009/xitong/posterity/employees.php';</script>";
        }
    }
    public static function logOut()
    {
        session_start();
        unset($_SESSION['name']);
        echo "<script>location='http://localhost:9009/xitong/posterity/htindex.php';</script>";
    }
}
function checkLogin(){
    if(empty($_POST)) die ('没有表单提交，程序退出');
    $code=isset($_POST['tbcaptcha'])?trim($_POST['tbcaptcha']):'';
    if(empty($_SESSION['code'])) echo "<script>alert('验证码已过期，请重新登陆。');location:../login.php;</script>";
    if(strtolower($code)==  strtolower($_SESSION['code'])){
        echo "<script>location='http://localhost:9009/xitong/posterity/htindex.php';</script>";
    }  else {
        echo "<script>alert('验证码输入错误');history.go(-1);</script>";
    }
    unset($_SESSION['code']);
    die();

}

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
        case 'login':
            userinfo::login($_POST['name'], $_POST['password']);
            break;
        case 'logout':
            userinfo::logOut();
            break;
            default :
            ;
    }
}

class userinfo {
    public static function login($Name,$Password)
    {

        $sqlstr = "select * from userinfo where name='".$Name."' and password='".$Password."'";
        $db=phpDB::getInstanc($GLOBALS['dbconfig']);
        $result = $db->query($sqlstr);
        $myarray= mysqli_fetch_array($result);  
        if (count($myarray)==0){
                echo "<script>alert('用户名或密码错误');</script>";
            echo "<script>location='http://localhost:9009/xitong/php/userlogin.php';</script>";

        }else{
            session_start();
            $_SESSION['user']=$_POST['name'];
           echo "<script>location='http://localhost:9009/xitong/index.html';</script>";
        }
    }
    public static function logOut()
    {
        session_start();
        unset($_SESSION['user']);
        echo "<script>location='http://localhost:9009/xitong/index.html';</script>";
    }
}
?>

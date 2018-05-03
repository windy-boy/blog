<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tool
 *
 * @author Admin
 */
class tool {
    //put your code here
    public static $info='';
    public static function alertGo($info,$url)
    {
        echo "<script>alert('$info');location='$url';</script>";
    }
    public static function alertBack($info)
    {
        echo "<script>alert('$info');history.back();</script>";
    }
    //替换特殊字符
    public static function cutBadStr($inputStr)
    {
        $inputStr = str_replace(",", "■",$inputStr);
        $inputStr = str_replace("'", "∴",$inputStr);
        $inputStr = str_replace("’", "∴",$inputStr);
        $inputStr = str_replace("<", "&lt",$inputStr);
        $inputStr = str_replace(">", "&gt",$inputStr);
        return $inputStr;
    }
    //反向替换
    public static function htmlStr($strContent)
    {
        $strContent = str_replace("■", ",",$inputStr);
        $strContent = str_replace("∴", "'",$inputStr);
        $strContent = str_replace("&lt","<",$inputStr);
        $strContent = str_replace("&gt",">",$inputStr);
        $strContent = str_replace("<;", "<",$inputStr);
        $strContent = str_replace(">;", ">",$inputStr);
        return $strContent;
    }
}
?>

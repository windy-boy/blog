<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$imgWidth=50;//宽度
$imgHeight=18;//高度
$charLength=4;//验证码长度
$font=5;//字体大小
$char=  array_merge(range('a', 'z'), range('A', 'Z'),range('0', '9'));
$randKey=  array_rand($char,$charLength);//返回随机4个键,1,3,5,7
shuffle($randKey);//打乱顺序
$code='';
foreach ($randKey as $value)
{
    $code=$code.$char[$value];
}
session_start();
$_SESSION['code']=$code;
$img=  imagecreatetruecolor($imgWidth, $imgHeight);
$bgColor=  imagecolorallocate($img,0xde,0xde,0xde);
imagefill($img,0,0,$bgColor);
for($i=0;$i<200;$i++)
{
    $color=imagecolorallocate($img,  mt_rand(0, 255),mt_rand(0, 255),mt_rand(0, 255));//干扰点颜色
    imagesetpixel($img, mt_rand(0, $imgWidth),mt_rand(0, $imgHeight), $color);//绘制干扰点
}
$fontWidth=  imagefontwidth($font);
$codeWidth=$fontWidth*$charLength;
$fontHeight=  imagefontheight($font);
$color=imagecolorallocate($img,  mt_rand(0, 100),mt_rand(0, 100),mt_rand(0, 100));//设置验证码颜色
imagestring($img, $font, ($imgWidth-$codeWidth)/2, ($imgHeight-$fontHeight)/2, $code, $color);
header("Content-type:image/png");
imagepng($img);
imagedestroy($img);
?>

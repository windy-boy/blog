<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>网上车城</title>
    <link rel="stylesheet" href="../css/bodybackground.css">
    <link rel="stylesheet" href="../css/reset.css"/>
    <link rel="stylesheet" href="../css/ind_lunbo.css"/>
    <link rel="stylesheet" href="../css/main.css"/>
    <link rel="stylesheet" href="../css/top_nav.css"/>
    <link rel="stylesheet" href="../css/footer.css">
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../js/tool.js"></script>
    <script src="../js/lunbo.js"></script>
    <script src="../js/small-buy.js"></script>
    <script>
        $(function () {
            $('a').click(function (){
                var result= $(this).closest('li').find('img').attr('src');
                localStorage.setItem('result',result);
                $(this).attr('href', 'http://localhost:9009/xitong/php/shoppingcart.php');
            })
        })
    </script>

    <style>
        #bao_main {
            width: 100%;
            height: 300px;
            margin: 4px 2px;
            overflow: hidden;
        }
        #bao_main ul li {
            width: 133px;
            height: 300px;
            float: left;
            position: relative;


        }

        #bao_main ul li div {
            width: 100%;
            height: 300px;
        }
        #bao_main ul li div.des {
            position: absolute;
            left: 0;
            top: 0;

        }

    </style>
</head>
<body>
<div class="top_nav">
<?php
include 'nav.php';
?>
</div>
<div id="box">
    <ul>
        <li><img src="../img/lunbo_5.jpg"></li>
        <li><img src="../img/lunbo_1.jpg"></li>
        <li><img src="../img/lunbo_2.jpg"></li>
        <li><img src="../img/lunbo_3.jpg"></li>
        <li><img src="../img/lunbo_4.jpg"></li>
        <li><img src="../img/lunbo_5.jpg"></li>
        <li><img src="../img/lunbo_1.jpg"></li>
    </ul>
    <div id="left" style="color:#fff">&lt;</div>
    <div id="right" style="color:#fff">&gt;</div>
    <div id="count">
        <span class="bgcolor"></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>

<div id="sideNav">
    <ul>
        <li><span class="sidenav">宝马</span>BWM</li>
        <li><span class="sidenav">法拉利</span>Ferrari</li>
        <li><span class="sidenav">保时捷</span>Porsche</li>
        <li><span class="sidenav">奔驰</span>Benz</li>
        <li><span class="sidenav">玛莎拉蒂</span>Maserati</li>
        <li><span class="sidenav">布加迪</span>BUGATTI</li>
        <li><span class="sidenav">西贝尔</span>SSC</li>
        <li><span class="sidenav">莫斯勒</span>MOSLER</li>
        <li><span class="sidenav">世爵</span>SPYKER</li>
        <li class="last"><span class="sidenav">顶部</span>顶部</li>
    </ul>
</div>
<script>
    $(function(){
        var screenWidth=$(document).width();
        if(screenWidth<1200) {
            $('#sideNav').hide();
        }else{
            $('#sideNav').show();
        }
        $(window).resize(function(){
            var screenWidth=$(document).width();
            if(screenWidth<1200) {
                $('#sideNav').hide();
            }else{
                $('#sideNav').show();
            }
        });
    })
</script>
<div class="main">
    <div class="content" >
        <div class="banxin">
            <div class="left">
                <div class="l-top">
                    <ul>
                        <li><img src="../img/bmw_1.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/bmw_2.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/bmw_3.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/bmw_4.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                    </ul>
                </div>
                <div class="l-bottom">
                    <ul>
                        <li><img src="../img/bmw_5.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/bmw_6.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/bmw_7.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/bmw_8.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                    </ul>
                </div>
            </div>
            <div class="right">
                <div class="header">宝马</div>
                <div class="bmw_introduce">
                    <p> 宝马(BMW)是享誉世界的豪华汽车品牌。
                        宝马的车系有1、2、3、4、5、6、7、i、X、Z等几个系列，
                        还有在各系基础上进行改进的M系。我司是宝马的一个代理售点，
                        销售个别类型的宝马</p>
                </div>
            </div>
        </div>
    </div>
    <div class="content" >
        <div class="banxin">
            <div class="left">
                <div class="l-top">
                    <ul>
                        <li><img src="../img/Fer_1.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Fer_2.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Fer_3.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Fer_4.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                    </ul>
                </div>
                <div class="l-bottom">
                    <ul>
                        <li><img src="../img/Fer_5.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Fer_6.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Fer_7.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Fer_8.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                    </ul>
                </div>
            </div>
            <div class="right">
                <div class="header">法拉利</div>
                <div class="Fer_introduce">
                    <p>法拉利[1]  是举世闻名的赛车和运动跑车的生产厂家，
                        总部位于意大利马拉内罗（Maranello），由恩佐·法拉利（Enzo Ferrari）
                        于1947年创办，主要制造一级方程式赛车、赛车及高性能跑车。</p>
                </div>
            </div>
        </div>
    </div>
    <div class="content" >
        <div class="banxin">
            <div class="left">
                <div id="bao_main">
                    <ul>
                        <li>
                            <div class="des"></div>
                            <div style="background: url(../img/bao_918_1.jpg) center;"></div>
                        </li>
                        <li>
                            <div class="des"></div>
                            <div style="background: url(../img/bao_918_2.jpg) center;"></div>
                        </li>
                        <li>
                            <div class="des"></div>
                            <div style="background: url(../img/bao_918_3.jpg) center;"></div>
                        </li>
                        <li>
                            <div class="des"></div>
                            <div style="background: url(../img/bao_918_4.jpg) center;"></div>
                        </li>
                        <li>
                            <div class="des"></div>
                            <div style="background: url(../img/bao_918_1.jpg) center;"></div>
                        </li>
                        <li class="lastone">
                            <div class="des"></div>
                            <div style="background: url(../img/bao_918_2.jpg) center;"></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right" style="height: 300px">
                <div class="header">保时捷</div>
                <div class="bao_introduce">
                    <p> 保时捷（Porsche)是一家德国汽车生产商，
                        又叫波尔舍，总部位于德国斯图加特，是欧美汽车的主要代表。
                        主要车型有911、Boxster、Cayman、Panamera、Cayenne、Macan。</p>
                </div>
            </div>
        </div>

    </div>
    <script>
        $(function(){
            $('#bao_main').on('mouseenter','li',function(){
                $(this).css({width:400,cursor:'pointer'}).siblings().css({width:80});
//                $(this).find('.des').html('该车暂不支持购买敬请期待').css({color:'red',fontSize:16,padding:30,width:30,margin:'0 auto'})
            }).on('mouseleave','li',function(){
                $(this).css({width:133}).siblings().css({width:133})
//                $(this).find('.des').html('保时捷918').css({color:'blue',fontSize:28})
            })

        });
    </script>
    <div class="content" >
        <div class="banxin">
            <div class="left">
                <div class="l-top">
                    <ul>
                        <li><img src="../img/Benz_1.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Benz_2.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Benz_3.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Benz_4.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                    </ul>
                </div>
                <div class="l-bottom">
                    <ul>
                        <li><img src="../img/Benz_5.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Benz_6.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Benz_7.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Benz_8.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                    </ul>
                </div>
            </div>
            <div class="right">
                <div class="header">奔驰</div>
                <div class="ben_introduce">
                    <p> 奔驰，德国汽车品牌，汽车的发明者，被认为是世界上最成功的高档汽车品牌之一，其完美的技术水平、
                        过硬的质量标准、推陈出新的创新能力、以及一系列经典轿跑车款式令人称道。
                        奔驰三叉星已成为世界上最著名的汽车及品牌标志之一。</p>
                </div>
            </div>
        </div>
    </div>
    <div class="content" >
        <div class="banxin">
            <div class="left">
                <div class="l-top">
                    <ul>
                        <li><img src="../img/Maserati_1.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Maserati_2.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Maserati_3.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Maserati_4.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                    </ul>
                </div>
                <div class="l-bottom">
                    <ul>
                        <li><img src="../img/Maserati_5.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Maserati_6.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Maserati_7.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Maserati_8.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                    </ul>
                </div>
            </div>
            <div class="right">
                <div class="header">玛莎拉蒂</div>
                <div class="mas_introduce">
                    <p> 玛莎拉蒂（Maserati）是一家意大利豪华汽车制造商，1914年12月1日成立于博洛尼亚（Bologna），
                        公司总部现设于摩德纳（Modena），品牌的标志为一支三叉戟。1993年菲亚特（Fiat S.p.A.）
                        收购玛莎拉蒂，使品牌得以保留。</p>
                </div>
            </div>
        </div>
    </div>
    <div class="content" >
        <div class="banxin">
            <div class="left">
                <div class="l-top">
                    <ul>
                        <li><img src="../img/Bugatti_1.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Bugatti_2.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Bugatti_3.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Bugatti_4.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                    </ul>
                </div>
                <div class="l-bottom">
                    <ul>
                        <li><img src="../img/Bugatti_5.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Bugatti_6.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Bugatti_7.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Bugatti_8.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                    </ul>
                </div>
            </div>
            <div class="right">
                <div class="header">布加迪</div>
                <div class="bugatti_introduce">
                    <p> BUGATTI，这个创立至今已经有百余年历史的法国跑车品牌。提起奢侈品，
                        大家肯定会联想到来自法国的各种奢侈品牌。而汽车中的奢侈品——布加迪(Bugatti)
                        无疑是其中法国奢侈品牌中重要的一员.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="content" >
        <div class="banxin">
            <div class="left">
                <div class="l-top">
                    <ul>
                        <li><img src="../img/Siebel_1.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Siebel_2.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Siebel_3.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Siebel_4.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                    </ul>
                </div>
                <div class="l-bottom">
                    <ul>
                        <li><img src="../img/Siebel_5.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Siebel_6.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Siebel_7.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Siebel_8.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                    </ul>
                </div>
            </div>
            <div class="right">
                <div class="header">西尔贝</div>
                <div class="ssc_introduce">
                    <p>西尔贝是Shelby Supercars（又简称SSC）的中文译文，后面还有个Supercars，
                        表明公司的成立旨在只打造高端的超级跑车系列。公司于1999年由美国的汽车爱好者Jerod Shelby成立，
                        总部设在华盛顿。</p>
                </div>
            </div>
        </div>
    </div>
    <div class="content" >
        <div class="banxin">
            <div class="left">
                <div class="l-top">
                    <ul>
                        <li><img src="../img/Moseler_1.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Moseler_2.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Moseler_3.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Moseler_4.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                    </ul>
                </div>
                <div class="l-bottom">
                    <ul>
                        <li><img src="../img/Moseler_5.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Moseler_6.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Moseler_7.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/Moseler_8.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                    </ul>
                </div>
            </div>
            <div class="right">
                <div class="header">莫斯勒</div>
                <div class="mosler_introduce">
                    <p>莫斯勒是美国超级跑车生产商“MOSLER”旗下的跑车品牌，
                        1988 年，超级跑车生产商"MOSLER"在美国佛罗里达州成立，
                        创立者Warren Mosler 。</p>
                </div>
            </div>
        </div>
    </div>
    <div class="content" >
        <div class="banxin">
            <div class="left">
                <div class="l-top">
                    <ul>
                        <li><img src="../img/SPYKER_1.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/SPYKER_2.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/SPYKER_3.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/SPYKER_4.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                    </ul>
                </div>
                <div class="l-bottom">
                    <ul>
                        <li><img src="../img/SPYKER_5.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/SPYKER_6.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/SPYKER_7.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                        <li><img src="../img/SPYKER_8.jpg" alt=""/><span class="small-buy"><a href="">购买</a></span></li>
                    </ul>
                </div>
            </div>
            <div class="right">
                <div class="header">世爵</div>
                <div class="spyker_introduce">
                    <p> 世爵作为历史超过百年的老厂，一直保持着品牌独特的风格。他们生产的跑车全部为手工打造，多项指标采用F1标准。
                        作为知名的极品豪华运动汽车制造商，世爵制造的贵族运动汽车完全依据客户的需求量身定制。</p>
                </div>
            </div>
        </div>
    </div>
    <div class="content" ></div>
</div>
<script src="../js/sideNav.js"></script>

<?php
include 'footer.php';
?>
<?php
//header('content-type:text/html;charset=utf-8');
//session_start();
//echo $_SESSION['username'];
//if(!isset($_SESSION['username']))
//{
//
//}
//?>
</body>
</html>
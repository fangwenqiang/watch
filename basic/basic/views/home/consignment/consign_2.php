<?php
use yii\helpers\Url;
use app\Lib\Functions\Filtration;
use \yii\widgets\LinkPager;
?>
<script src="js/jquery.js"></script>
<link href="css/jimai.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/index.css" type="text/css" media="screen, projection" />
<style>
    #div1 ul li{float: left;}
    #div1 span{
        width: 45px;
        height: 16px;
        border: 1px solid #e6e6e6;
        color: #b01330;
        display: inline-block;
        font-size: 14px;
        padding: 10px 30px;
        padding-top: 15px;
        text-decoration: none;
    }
</style>
<div class="jimai_box">
    <div class="jimai_slider">
        <div class="mtsBanner" id="mtsBanner">
            <ul class="bannerWrap">
                <img src="images/banner2.jpg" />
            </ul>
        </div>
    </div>
    <div class="nav_box">
        <div class="jnav" id="fixed">
            <ul class="clearfix">
                <li><a class="aStyle navBtn01" href="<?php echo Url::to(['home/consignment/consign_1'])?>">寄卖说明</a></li>
                <li>

                    <a style="display:block; width:163px; height:44px;" href="<?php echo Url::to(['home/consignment/consign_2'])?>" target="_blank"><div class="nav_btn01">
                            <p class="clearfix">
                                &nbsp;寄卖方式流程
                            </p>
                        </div>
                    </a>
                <li>
                    <a class="aStyle navBtn02" href="<?php echo Url::to(['home/consignment/index'])?>">寄卖铺</a></li>
                </li>
                <li><a class="aStyle navBtn03" href="<?php echo Url::to(['home/consignment/my_apply'])?>">我的寄卖</a></li>
                <li class="anotherBtn">
                    <a class="aStyle navBtn02" href="<?php echo Url::to(['home/consignment/apply'])?>">立即寄卖</a>

                </li>
                <li class="anotherBtn">
                    <a class="aStyle navBtn02" href="<?php echo Url::to(['home/consignment/consult'])?>">寄卖咨询</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="content_box" id="floor">
        <div class="jimai_list01 bgcolor01">
            <p class="clearfix">
                <img src="Images/jimai_03.jpg" width="990" height="240" />
                <img src="Images/jimai_04.jpg" width="990" height="240" />
                <img src="Images/jimai_24.jpg" width="990" height="211" />
                <img src="Images/jimai_25.jpg" width="990" height="178" />
            </p>
        </div>
    </div>
</div>


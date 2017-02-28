<?php
use yii\helpers\Url;
use app\Lib\Functions\Filtration;
?>
<link href="css/jimai.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/index.css" type="text/css" media="screen, projection" />
<script src="js/global.js"></script>
<script type="text/javascript" src="js/index.js"></script>


<!--index banner start-->

<div class="jimai_box">
    <div class="jimai_slider">
        <div class="mtsBanner" id="mtsBanner">
            <ul class="bannerWrap">
                <img src="images/banner2.jpg" />
                <li style="background-image:url(Images/jimai_01.jpg)" ></li>
            </ul>
        </div>
    </div>
    <div class="nav_box">
        <div class="jnav" id="fixed">
            <ul class="clearfix">
                <li><a class="aStyle navBtn01" href="#">什么是寄卖</a></li>
                <li><a class="aStyle navBtn02" href="#">寄卖的方式与流程</a></li>
                <li>
                    <a style="display:block; width:163px; height:44px;" href="<?php echo Url::to(['home/consignment/index'])?> target="_blank"><div class="nav_btn01">
                            <p class="clearfix">
                                <span class="t1 pngfix"></span>&nbsp;寄卖铺
                            </p>
                        </div>
                    </a>
                </li>
                <li><a class="aStyle navBtn03" href="#">我的寄卖</a></li>
                <li class="anotherBtn">
                    <a class="aStyle navBtn02" href="<?php echo Url::to(['home/consignment/apply'])?>">立即寄卖</a>

                </li>
                <li class="anotherBtn">
                    <a class="aStyle navBtn02" href="#">寄卖咨询</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="content_box" id="floor">
        <div class="idxSet rankSet">
            <div class="tTit w1225">
                <span class="tNm">手表寄卖</span>
                <ul id="rankTit" class="tGud">
                    <li><a class="curr" href="#">综合排序</a></li>
                    <li><a href="#">最新发布</a></li>
                    <li><a href="#">信用排序</a></li>
                    <li><a href="">价格排序</a></li>
                </ul>

            </div>
            <div class="tBdy w1225" id="hotCon">
                <div class="tPdtLst">
                    <div class="tLnk">

                    </div>
                    <ul>
                        <?php
                        foreach($data as $key=>$val){
                            ?>
                            <li>
                                <a href="">
                                    <!-- <i class="c__tMsk"></i> -->
                                    <img src="<?php echo $val['g_img']?>"  width="250" height="250" />
                                    <div class="tNm"><?php echo $val['author']?></div >
                                    <div class="tNm"><span class="tPrc">￥<?php echo $val['shop_price']?></span>&nbsp;&nbsp;信用：<?php if($val['credit'] == 0){echo "暂无信用";}else {$val['credit'].'%';}?></div>
                                    <div class="tNm"><?php echo Filtration::formatTime($val['add_time'])?>---喜悦手表网</div>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <div class="mLnk">
                         <a>首页</a>
                         <a>下一页</a>
                         <a>上一页</a>
                         <a>尾页</a>
                    </div>
                </div>
                <div class="mLnk">

                </div>
            </div>
        </div>
    </div>
</div>


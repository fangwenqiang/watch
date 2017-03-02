<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<script src="js/jquery.js"></script>
<link rel="stylesheet" href="css/sxg.css">
<style type="text/css">
    <!--
    .STYLE1 {
        font-size: large
    }

    .STYLE3 {
        font-size: medium;
        color: #CC0000;
    }

    -->
</style>

<div class="banner" id="banner" >
    <a href="#" class="d1" style="background:url(Images/banner2.jpg) center no-repeat;"></a>
    <a href="#" class="d1" style="background:url(Images/banner1.jpg) center no-repeat;"></a>
    <a href="#" class="d1" style="background:url(Images/banner3.jpg) center no-repeat;"></a>
    <a href="#" class="d1" style="background:url(Images/banner4.jpg) center no-repeat;"></a>
    <div class="d2" id="banner_id">
        <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</div>

<script type="text/javascript">banner()</script>
<!--index banner end----------------------------------------------------------------------------------------------------->

<div class="idxBnd">
    <div class="tCnt w1225">
        <a   href="http:"" style="margin-right: 1px;_margin-right: 0px;"><a   href=""" style="margin-right: 1px;_margin-right: 0px;"><a   href=""" style="margin-right: 1px;_margin-right: 0px;"></a><a   href="http:"" style="margin-right: 1px;_margin-right: 0px;">
        <img src="Images/banimg1.jpg" alt=""  width="296" height="175"/></a><a   href="" style="margin-right: 1px;_margin-right: 0px;"><img width=298 height="175" src="Images/banimg2.jpg" alt="" /></a>
        <a   href="" style="margin-right: 1px;_margin-right: 0px;"><img width=300  height="175"src="Images/banimg5.jpg" alt="" /></a>
        <a   href=""><img  width=300 height="175" src="Images/banimg4.jpg" alt="" /></a>      </div>
</div>

<!--热销 start-->
<div id="hot_display_position"></div>
<div class="idxSet hotSet">

    <div class="tTit w1225">
        <span class="tNm">[特价推荐]</span>
        <ul id="hotTit" class="tGud">
            <?php foreach ($erRank as $key => $value) {?>
            <li><a  href="javascript:" class='whereCate' rank='特价' keyword='<?=$value["gt_name"]?>'><?=$value['gt_name']?></a></li>
            <?php } ?>
            <li><a href="<?= Url::toRoute(['home/bargain/price'])?>">更多</a></li> 
        </ul>
    </div>
    <div class="tBdy w1225" id="hotCon">
        <div class="tPdtLst">
            <div class="tLnk">

            </div>
            <ul>
               <?php foreach ($goodsData as $key => $value) {?>
                <li>
                    <a href=""   onclick="_gaq.push(['_trackEvent','首页商品','热销-男士-1','百达翡丽5146R-001@热销-男士-1']);">
                        <!-- <i class="c__tMsk"></i> -->
                        <img src="Images/<?=$value['g_img']?>"  width="250" height="250" />

                        <div class="tNm"><?=$value['goods_name']?></div >
                        <div class="tPrc">￥<?=$value['shop_price']?>&nbsp;<i class="del"><?=$value['market_price']?></i></div>
                        <div class="tInfo">已售出<b>&nbsp;13</b></div >                        </a>
                </li>
                <?php }?>
    
            </ul>
            <div class="mLnk">

            </div>
        </div>
        <div class="mLnk">

        </div>
    </div>

</div>

</div>
<p align="center">&nbsp;</p>

<!--热销 end-->



<div id="rank_display_position"></div>
<div class="idxSet rankSet">

    <div class="tTit w1225">
        <span class="tNm">[男士手表]</span>
        <ul id="rankTit" class="tGud">
            <?php foreach ($threeRank as $key => $value) {?>
            <li><a href="javascript:"  class='whereCate' rank='男士' keyword='<?=$value["gt_name"]?>'><?=$value['gt_name']?></a></li>       
            <?php }?>
            <li><a href="<?= Url::toRoute(['home/watch/boylist'])?>">更多</a></li> 
        </ul>
    </div>
    <p align="center"><img src="Images/ban1.jpg" /></p>

    <div class="tBdy w1225" id="hotCon">
        <div class="tPdtLst">
            <div class="tLnk">

            </div>
            <ul id='rankTwo'>
                 <?php foreach ($goodsData as $key => $value) {?>
                <li>
                    <a href=""   onclick="_gaq.push(['_trackEvent','首页商品','热销-男士-1','百达翡丽5146R-001@热销-男士-1']);">
                        <!-- <i class="c__tMsk"></i> -->
                        <img src="Images/<?=$value['g_img']?>"  width="250" height="250" />

                        <div class="tNm"><?=$value['goods_name']?></div >
                        <div class="tPrc">￥<?=$value['shop_price']?>&nbsp;<i class="del"><?=$value['market_price']?></i></div>
                        <div class="tInfo">已售出<b>&nbsp;13</b></div >                        </a>
                </li>
                <?php }?>
            </ul>
            <div class="mLnk">

            </div>
        </div>
        <div class="mLnk">

        </div>
    </div>
</div>

</div>
<!--销售排行榜 end-->

<div class="idxSet rankSet">

    <div class="tTit w1225">
        <span class="tNm">[女士手表]</span>
         <ul id="rankTit" class="tGud">
            <?php foreach ($threeRank as $key => $value) {?>
            <li><a href="javascript:" class='whereCate' rank='女士' keyword='<?=$value["gt_name"]?>'><?=$value['gt_name']?></a></li>       
            <?php }?>
            <li><a href="<?= Url::toRoute(['home/index/girllist'])?>">更多</a></li> 
        </ul>
    </div>
    <p align="center"><img src="Images/ban1.jpg" /></p>
    <div class="tBdy w1225" id="hotCon">
        <div class="tPdtLst">
            <div class="tLnk">

            </div>
            <ul>
                <?php foreach ($goodsData as $key => $value) {?>
                <li>
                    <a href=""   onclick="_gaq.push(['_trackEvent','首页商品','热销-男士-1','百达翡丽5146R-001@热销-男士-1']);">
                        <!-- <i class="c__tMsk"></i> -->
                        <img src="Images/<?=$value['g_img']?>"  width="250" height="250" />

                        <div class="tNm"><?=$value['goods_name']?></div >
                        <div class="tPrc">￥<?=$value['shop_price']?>&nbsp;<i class="del"><?=$value['market_price']?></i></div>
                        <div class="tInfo">已售出<b>&nbsp;13</b></div >                        </a>
                </li>
                <?php }?>

            </ul>
            <div class="mLnk">

            </div>
        </div>
        <div class="mLnk">

        </div>
    </div>
</div>
</div>
<script type="text/javascript">

    //根据条件获取商品
    $('.whereCate').hover(function(){
        var where = $(this).attr('keyword');
        var rank = $(this).attr('rank');
        $.ajax({
           url: "<?= Url::toRoute(['home/index/catedata'])?>",
           data: "where="+where+'&rank='+rank,
           dataType:'json',
           success: function(re_val){
             str=''
             $(re_val).each(function(i,v){
                str+='<li>\
                        <a href="">\
                        <img src="Images/'+this['g_img']+'"  width="250" height="250" />\
                        <div class="tNm">'+this["goods_name"]+'</div >\
                        <div class="tPrc">￥'+this["shop_price"]+'&nbsp;<i class="del">'+this['market_price']+'</i></div>\
                        <div class="tInfo">已售出<b>&nbsp;13</b></div ></a>\
                </li>'
             })
             $("#rankTwo").html(str);
           }
        });
    },function(){
    })

</script>


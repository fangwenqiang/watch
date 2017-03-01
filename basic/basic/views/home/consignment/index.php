<?php
use yii\helpers\Url;
use app\Lib\Functions\Filtration;
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
                <li style="background-image:url(Images/jimai_01.jpg)" ></li>
            </ul>
        </div>
    </div>
    <div class="nav_box">
        <div class="jnav" id="fixed">
            <ul class="clearfix">
                <li>
                    <a class="aStyle navBtn01" href="<?php echo Url::to(['home/consignment/consign_1'])?>">寄卖说明</a></li>

                <li><a class="aStyle navBtn02" href="<?php echo Url::to(['home/consignment/consign_2'])?>">寄卖的方式与流程</a></li>
                <li>
                <a style="display:block; width:163px; height:44px;" href="<?php echo Url::to(['home/consignment/index'])?>" target="_blank"><div class="nav_btn01">
                        <p class="clearfix">
                            <span class="t1 pngfix"></span>寄卖铺
                        </p>
                    </div>
                </a>
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
        <div class="idxSet rankSet">
            <div class="tTit w1225">
                <span class="tNm">手表寄卖</span>
                <ul id="rankTit" class="tGud">
                    <li><a <?php if($type == 0){ echo "class='curr'";}?> href="<?php echo Url::to(['home/consignment/index'])?>">综合排序</a></li>
                    <li><a <?php if($type == 1){ echo "class='curr'";}?> href="<?php echo Url::to(['home/consignment/index']).'&search=new'?>">最新发布</a></li>
                    <li><a <?php if($type == 2){ echo "class='curr'";}?> href="<?php echo Url::to(['home/consignment/index']).'&search=credit'?>">信用排序</a></li>
                    <li><a <?php if($type == 3){ echo "class='curr'";}?> href="<?php echo Url::to(['home/consignment/index']).'&search=price'?>">价格排序</a></li>
                </ul>

            </div>
            <div class="tBdy w1225" id="hotCon">
                <div class="tPdtLst">
                    <div class="tLnk">

                    </div>
                    <ul id="ul1">
                        <?php
                        foreach($data as $key=>$val){
                            ?>
                            <li>
                                <a href="">
                                    <!-- <i class="c__tMsk"></i> -->
                                    <img src="<?php echo $val['g_img']?>"  width="250" height="250" />
                                    <div class="tNm"><?php echo $val['author']?></div >
                                    <div class="tNm"><span class="tPrc">￥<?php echo $val['shop_price']?></span>&nbsp;&nbsp;信用：<?php if(empty($val['credit'])){echo "暂无信用";}else {echo $val['credit'].'%';}?></div>
                                    <div class="tNm"><?php echo Filtration::formatTime($val['add_time'])?>---喜悦手表网</div>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="mLnk">

                </div>
                <div id="div1" style="float: right">
                    <?php echo $page?>
                </div>
                <div class="mLnk">

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function page(p){
        var type = <?php echo $type;?>;
        $.ajax({
            type:'GET',
            url:'<?=url::to(['home/consignment/search'])?>',
            data:'p='+p+'&type='+type,
            dataType:'json',
            success: function (msg) {
                var ul = '';
                $.each(msg.data,function(k,v){
                    ul += '    <li>\
                    <a href="">\
                    <img src="'+ v.g_img+'"  width="250" height="250" />\
                    <div class="tNm">'+ v.author+'</div >\
                    <div class="tNm"><span class="tPrc">￥'+ v.shop_price+'</span>&nbsp;&nbsp;信用：';
                    if(v.credit.length == 0){
                       ul += '暂无信用';
                    } else{
                        ul += v.credit+'%';
                    }
                    ul+='</div>\
                    <div class="tNm">'+ jsDateDiff(v.add_time)+'---喜悦手表网</div>\
                    </a>\
                    </li>';
                });
                $('#ul1').html(ul);
                $('#div1').html(msg.page);
            }
        });
    }

    function jsDateDiff(publishTime){
        var d_minutes,d_hours,d_days;
        var timeNow = parseInt(new Date().getTime()/1000);
        var d;
        d = timeNow - publishTime;
        d_days = parseInt(d/86400);
        d_hours = parseInt(d/3600);
        d_minutes = parseInt(d/60);
        if(d_days>0 && d_days<4){
            return d_days+"天前";
        }else if(d_days<=0 && d_hours>0){
            return d_hours+"小时前";
        }else if(d_hours<=0 && d_minutes>0){
            return d_minutes+"分钟前";
        }else{
            var s = new Date(publishTime*1000);
            // s.getFullYear()+"年";
            return (s.getMonth()+1)+"月"+s.getDate()+"日";
        }
    }
</script>


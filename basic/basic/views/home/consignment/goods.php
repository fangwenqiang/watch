<?php

use yii\helpers\Url;
?>
<meta name="csrf-token" content="<?= Yii::$app->request->csrfToken ?>">
    <link rel="stylesheet" href="css/sxg.css">
    <script src="js/jquery.js"></script>

<link rel="stylesheet" href="css/goods.css">

<link rel="stylesheet" href="css/fancybox.css">

<div id="main2" style="margin-left: 100px;">
    <div id="bread_crumb">
        <div class="position">当前位置: <a href="http://www.sxgoing.com" rel="nofollow">首页</a>
            <code>&gt;</code>
            <a href="http://www.sxgoing.comepos-watches/">免费寄卖</a>
            <code>&gt;</code> <a href="http://www.sxgoing.comepos-watches/list-s257616.html">商品详情</a>
        </div>
        <span class="others"> <a href="http://www.sxgoing.comepos-watches/" title="更多EPOS手表" target="_blank" class="more_goods"></a> </span> </div>
    <div class="clearfix"></div>
    <div style="margin-top:25px;"></div>
    <div class="list_banner"> <a href="http://data.wbiao.cn/ad.php?ad_id=1138" target="_blank" rel="nofollow" onclick="_gaq.push(['_trackEvent','quan-zhan','heng-fu__1','http://data.wbiao.cn/ad.php?ad_id=1138']);"><img   src="Images/blank.gif" class="lazy" data-original="http://img2.wbiao.cn/ad/201403/21/139536510192630.jpg" alt="招行特惠" /></a> </div>
    <div style="clear:both">&nbsp;</div>
    <!--banner结束-->
    <div id="goods" style="width:1225px;margin-left: 30px;">
        <div class="main_info v-1223-998 v-intro-bg">
            <div class="all_info v-870-646">
                <div class="info v-634-410">
                    <h1><?php echo $data['author']?></h1>
                    <div class="clearfix"></div>
                    <div class="sa s13"id="wbiao_price" style="margin-top: 20px;">
                        <span class="sr w260">
                            <b class="s20 cd6 f30"id="price">
                                <font class="f12">￥</font><?php echo $data['shop_price']?>
                            </b>
                        </span>
                    </div>
                    <div class="clear"></div>
                    <div id="promote-info"class="hide"></div>
                    <div class="sb s13 w100 clearfix mt5" style="margin-top: 10px;">
                        <span class="sl">配送至</span>
                        <span class="sr"id="shipping">中国大陆，下单后17点前支付，当天发货</span>
                    </div>
                    <div class="clear"></div>
                    <div class="line"></div>
                    <div>
                        <div class="sa s13 w100 h21">
                            <span class="sl">品牌：</span><span><?php echo $data['g_brand']?></span>
                        </div>
                        <div class="sa s13 w100 h21" style="margin-top: 10px;">
                            <span class="sl">卖家信用：</span><span><?php if(empty($data['credit'])){echo "暂无信用";}else {echo $data['credit'].'%';}?></span>
                        </div>
                        <div class="sa s13 w100 h21" style="margin-top: 10px;width: 400px;height: auto;">
                            <div style="width: 70px;height;auto;float: left;">说明&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;：</div>
                            <div style="float: left;width: 320px;height;auto;">
                                <?php echo $data['describe']?>
                            </div>
                        </div>
                        <div class="sa s13 w100 h21" style="margin-top: 10px;">
                            <span class="sl">是否议价：</span>
                            <span>
                                <?php if($data['is_bargain'] == 1){echo "可议价";}else {echo "不可议价";}?>
                            </span>
                        </div>
                        <?php if($data['is_bargain'] == 1){ ?>
                        <div class="sa s13 w100 h21" style="margin-top: 10px;">
                            <span class="sl">输入议价：</span>
                            <input type="text" placeholder="请输入整数" id="prices">
                            <span id="span_msg">最低不能低于商品价格20%</span>
                        </div>
                        <?php } ?>
                            <?php if($data['is_bargain'] == 1){ ?>
                                    <img src="images/yijia.jpg" style="margin-top: 40px;margin-left: 40px;" id="yijia">
                                    <img src="images/gwc.jpg" style="margin-left: 40px;" id="gwc">
                                <?php } else {  ?>
                                    <img src="images/gwc.jpg" style="margin-top: 40px;margin-left: 150px;" id="gwc">
                            <?php } ?>

                    </div>
                </div>
            </div>
            <div class="images">
                <div class="big" style="border: 1px solid #dcdcdc">
                    <a href=""rel='gal1'id="image"onclick="javascript:$('#lookOver').trigger('click');">
                        <img src="images/3412_183_24_30_27_27885.jpg"class="lazy" class="middle_image"width="350"height="350"/>
                    </a>
                </div>
                <div class="thumbs">
                    <div class="context">
                        <ul id="sImg">
                            <li>
                                <a href='javascript:void(0);'><img src='images/3412_183_24_30_27_27885.jpg' class="lazy"/></a>
                            </li>
                            <li>
                                <a href='javascript:void(0);'><img src='images/3412_183_24_30_27_27885.jpg' class="lazy"/></a>
                            </li>
                            <li>
                                <a href='javascript:void(0);'><img src='images/3412_183_24_30_27_27885.jpg' class="lazy"/></a>
                            </li>
                            <li>
                                <a href='javascript:void(0);'><img src='images/3412_183_24_30_27_27885.jpg' class="lazy"/></a>
                            </li>
                            <li>
                                <a href='javascript:void(0);'><img src='images/3412_183_24_30_27_27885.jpg' class="lazy"/></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="gmtw">
                    <div class="gmt cl"><a rel="nofollow"href="javascript:void(0)"onclick="collection(25521,1)"title=""class="g__add_to_fav">
                        <div id="click_count">关注：<code class="red">31694</code>人
                        </div>
                    </div>
                </div>
            </div></div>
        <!--main_info:end-->
</div>
</div>

    <script>
        $(function(){
            var csrfToken = $('meta[name="csrf-token"]').attr("content");
           $('#yijia').click(function(){
               //获取议价价格
               var price = $('#prices').val();
               var id = "<?php echo $data['consignment_id'];?>";
               var prices = "<?php echo $data['shop_price'];?>";
               if((price/1) >= (prices/1)){
                   $('#span_msg').html("<font color='red'>非法出价</font>")
                   return false;
               } else {
                   $('#span_msg').html("最低不能低于商品价格20%")
               }
               if(price < (prices-(prices*0.2))){
                   $('#span_msg').html("<font color='red'>最低不能低于商品价格20%</font>")
                   return false;
               } else {
                   $('#span_msg').html("最低不能低于商品价格20%")
               }
               $.ajax({
                  type:'post',
                   url:"<?php echo Url::to(['home/consignment/bargain'])?>",
                   data:'id='+id+'&price='+price+'&_csrf='+csrfToken,
                   success:function(msg){
                      if(msg == -1){
                          $('#span_msg').html("<font color='red'>不能重复议价</font>")
                      } else if(msg == 0){
                           $('#span_msg').html("<font color='red'>议价失败</font>");
                       } else {
                           $('#span_msg').html("议价成功，请等待卖家同意")
                       }
                   }
               });


           });
        });
    </script>




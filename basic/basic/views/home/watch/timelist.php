<?php
use yii\helpers\Url;
?>
<style type="text/css">
    .cd-buttons{
        margin-top: 60px;
        font-size: 26px;
    }
</style>
<!-- 遮罩层样式 -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="Content/4c9039ca0c6c470d997c11ac48f3d914.css">
<!-- 遮罩层 -->
<div class="cd-popup" display="none">
    <div class="cd-popup-container">
        <br>
        <br>
        <div class="cd-buttons">
        </div>
        <a href="#0" class="cd-popup-close">关闭</a></div>
</div>
<!-- end遮罩层 -->
<div id="main">
    <?php foreach($data as $key=>$val){ ?>
    <div class="vip-f vip-f2">
        <h2>
                    <span>
                        <?=$key?>
                        <br/>
                        <i>
                            最高性价比
                        </i>
                    </span>
        </h2>
        <div class="vip-list vip-list2">
            <div class="display">
                <?php foreach($val as $k=>$v){ ?>
                    <a href="javascript:void(0)" add="<?=url::to(['home/goods-show/show','id'=>$v['g_id']])?>" target="_blank">
                        <img class="lazy" src="Images/<?=$v['g_img']?>"alt="" />
                        <p id="<?=$k?>" class="count-down" g_id='<?=$v['g_id'] ?>' endTime="<?=$v['promote_end_date']?>" >
                        </p>
                        <p class="p1">
                            <i>¥</i>
                            <span><?=$v['promote_price']?></span>
                            <code><b>3.5</b>折</code>
                            <del><?=$v['market_price']?></del>
                        </p>
                        <p class="p2">
                            <?=$v['goods_name'].' '.$v['keywords'] ?>
                        </p>
                        <p class="p3">中国</p>
                        <p class="p4">销量
                    <span>
                        <?=$v['click_count']?>
                    </span>
                        </p>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
    <!--    活动规则-->
    <div class="vip-gz">
        <dl>
            <dt>
                活动规则
                <i>
                    WBIAO.CN
                </i>
            </dt>
            <dd>
                <p>
                    1.客户需要在闪购活动时间内下单并付款，方可享受闪购价，以实际商品详情页价格为准；
                </p>
                <p>
                    2.闪购商品不参与其他优惠活动，优惠券、现金券不适用本会场活动商品；
                </p>
                <p>
                    3.万表网在法律允许的范围内，可以对活动细则进行调整，对活动拥有解释权；
                </p>
                <p>
                    4.闪购价商品限量供应，售完即止，先付先得；
                </p>
                <p>
                    5.闪购商品不支持7天无理由退换货；
                </p>
                <p>
                    6.如您在参与活动中遇到任何问题，请与万表网客服联系，全国电话：400-883-2688。
                </p>
            </dd>
        </dl>
    </div>
</div>
         <input type="hidden" class="_csrf" value="<?=Yii::$app->request->getCsrfToken() ?>">
<script src="js/jquery.js"></script>

<script>
    $(function(){
        count_dowd = $('.count-down');
        setTimeout("xianshi()",1000);
    });
    
    function xianshi()
    {
        var newTime = Date.parse(new Date())/1000;  //当前时间戳
        $.each(count_dowd, function (k,v) {
            endTime = $(this).attr('endTime'); //结束时间
            a = endTime-newTime;
            if(a > 0){
                $(this).parent().attr('href','javascript:shield("抢购还没开始")');
                $(this).parent().addClass('g__add_to_fav');
                intDiff = parseInt(a);//倒计时总秒数量
                day = Math.floor(intDiff / (60 * 60 * 24));
                hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
                minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
                second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
                if (minute <= 9) minute = '0' + minute;
                if (second <= 9) second = '0' + second;
                _this = $(this);
                $(this).html('<span class=stop-tips>离活动开始还有'+day+'天'+hour+'时'+minute+'分'+second+'秒</span>');
            }else if(a < 0){
                g_id = $(this).attr('g_id');    //商品id
                csrf = $('._csrf').val();   //yii csrf验证
                $.post('<?=url::to(['home/watch/count'])?>',{id:g_id,_csrf:csrf},function(msg){
                        // 库存不足
                        if(msg <= 0){
                            _this.html('<span class=stop-tips>库存不足</span>');
                            _this.parent().attr('href','javascript:shield("宝贝已经被抢购完了")');
                            _this.parent().addClass('g__add_to_fav');
                        }else{
                            // _this.html('<span class=stop-tips>正在抢购</span>');
                            add = $(this).parent().attr('add');
                            _this.parent().attr('href',add);
                        }
                })
            }else{
                $(this).removeClass('.count-down');
                $(this).parent().attr('href','javascript:shield("活动已经结束")');
                $(this).parent().addClass('g__add_to_fav');
                $(this).html('<span class=stop-tips>活动已经结束</span>');
            }
        });
        setTimeout("xianshi()",1000);
    }

// 遮罩层
    function shield(msg){
        //打开窗口
        $(document).delegate('.g__add_to_fav','click',function(event) {
            event.preventDefault();
            $('.cd-popup').addClass('is-visible');
            $('.cd-buttons').html(msg)
            //$(".dialog-addquxiao").hide()
        });

        //关闭窗口
        $('.cd-popup').on('click',
        function(event) {
            if ($(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup')) {
                event.preventDefault();
                $(this).removeClass('is-visible');
            }
        });
        //ESC关闭
        $(document).keyup(function(event) {
            if (event.which == '27') {
                $('.cd-popup').removeClass('is-visible');
            }
        });
    };

</script>



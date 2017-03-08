<!--<link rel="stylesheet" href="Content/a52171a7950f4e708694bcc84acd48a9.css">-->
<link rel="stylesheet" href="Content/d14ccfaff1ec468a9892026939bea808.css">

<link rel="stylesheet" href="Content/4c9039ca0c6c470d997c11ac48f3d914.css">


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
        <div class="vip-order">
            <dl>
                <dt>
                    排序：
                </dt>
                <dd class="cur" mode="0">
                    <a href="javascript:;">
                        默认
                    </a>
                </dd>
                <dd mode="0">
                    <a href="javascript:;">
                        折扣
                    </a>
                    <b>
                    </b>
                </dd>
                <dd mode="0">
                    <a href="javascript:;">
                        价格
                    </a>
                    <b>
                    </b>
                </dd>
            </dl>
        </div>
        <div class="vip-list vip-list2">
            <?php foreach($val as $k=>$v){ ?>
            <a href="javascript:void (0)" target="_blank">
                <img class="lazy" src="Images/<?=$v['g_img']?>"alt="" />
                <p id="<?=$k?>" class="count-down" endTime="<?=$v['promote_end_date']?>" >
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
                <p class="sale-out">
                    已抢光
                </p>
            </a>
            <?php } ?>
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

<script src="js/jquery.js"></script>
<script>
    $(function(){
        xianshi();
    });
    function xianshi()
    {
        var newTime = Date.parse(new Date())/1000;  //当前时间戳
        $.each($('.count-down'), function (k,v) {
            endTime = $(this).attr('endTime'); //结束时间
            a = endTime-newTime;
            if(a > 0){
                intDiff = parseInt(a);//倒计时总秒数量
                day = Math.floor(intDiff / (60 * 60 * 24));
                hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
                minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
                second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
                if (minute <= 9) minute = '0' + minute;
                if (second <= 9) second = '0' + second;
                $(this).html('<span class=stop-tips>离活动开始还有'+day+'天'+hour+'时'+minute+'分'+second+'秒</span>');
            }else{
                $(this).html('<span class=stop-tips>活动已经结束</span>');
            }
        });
        setInterval("xianshi()",1000);
    }
</script>
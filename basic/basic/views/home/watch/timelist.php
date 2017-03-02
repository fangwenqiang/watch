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
            <?php foreach($val as $v){ ?>
            <a href="/seagull-g48423.html?act=MTQxMzAwMQ==" target="_blank">
                <img class="lazy" src="Images/<?=$v['g_img']?>"
                     alt="" />
                <p id="CountDown" class="count-down" data-config="{'minDigit':0,'timeStamp':true,'interval':1000,'startTime':'2017-02-27 16:31:58','endTime':'2017-03-06 10:00:00','startTips':'<span class=stop-tips>离活动开始还有</span>','stopTips':'<span class=stop-tips>活动结束，欢迎关注</span>','endTips':'<span class=start-tips>仅剩：</span>'}">
                </p>
                <p class="p1">
                    <i>
                        ¥
                    </i>
                            <span>
                                <?=$v['promote_price']?>
                            </span>
                    <code>
                        <b>
                            3.5
                        </b>
                        折
                    </code>
                    <del>
                        <?=$v['market_price']?>
                    </del>
                </p>
                <p class="p2">
                    <?=$v['goods_name'].' '.$v['keywords'] ?>
                </p>
                <p class="p3">
                    中国
                </p>
                <p class="p4">
                    销量
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
<script src="Scripts/1ce8c5397e5f46a8999a4e14d720bf55.js">
</script>
<script type="text/javascript">
    function get_bonus(bonus_type_id) {
        $.ajax({
            type: "POST",
            cache: false,
            url: "/activity_index/get_activity_bonus?activity_id=141&bonus_type_id=" + bonus_type_id,
            success: function(msg) {
                if ($.trim(msg) != "") {
                    alert(msg);
                    if (msg.indexOf('登录') > 0) {
                        location.href = user_wbiao_cn + 'index/login';
                    }
                }
            }
        });
    }
</script>
<script type="text/javascript">
</script>
<div class="clear">
</div>
<div style="display:none;">
</div>
<script>
</script>
<script src="Scripts/c4b60ddc9fab4ef1aaf95cf7b8a766e6.js">
</script>
<script>
    var is_sy = 0
</script>
<script src="Scripts/e41ab836913142e5a0512b40234fb3bd.js">
</script>
<script language="javascript" type="text/javascript">
    if (typeof(getCookie) == "undefined") {
        function getCookie(objName) {
            var arrStr = document.cookie.split(";");
            for (var i = 0; i < arrStr.length; i++) {
                var temp = arrStr[i].split("=");
                if (temp[0].replace(/(^\s*)|(\s*$)/g, "") == objName) return unescape(temp[1]);
            }
        }
    } (function() {
        var ntnode = document.createElement('script');
        ntnode.type = 'text/javascript';
        ntnode.async = true;
        ntnode.src = 'https://dl.wbiao.com/js/xn6/ntkfstat.js?siteid=kf_9516';
        var snode = document.getElementsByTagName('script')[0];
        snode.parentNode.insertBefore(ntnode, snode);
    })();
</script>
<script language="javascript" type="text/javascript" src="Scripts/ntkfparam.js">
</script>


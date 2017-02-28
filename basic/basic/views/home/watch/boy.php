<?php
use yii\helpers\Url;
?>

<!-- End header -->
<link rel="stylesheet" href="css/list.css">
<!--<script src="Script/list.js"></script>-->

<!-- Main Begin -->
<div id="main2">

    <div class="position">
        <span>当前位置：</span>
        <a href="" rel="nofollow">首页</a>
        <i>&gt;</i>
        <h1><a href="">男士手表</a></h1>    </div>
    <div class="clearfix"></div>
    <div style="margin-top:25px;"></div>
    <div class="list_banner">
        <a href="http://data.wbiao.cn/ad.php?ad_id=1138"   rel="nofollow" onclick="_gaq.push(['_trackEvent','quan-zhan','heng-fu__1','http://data.wbiao.cn/ad.php?ad_id=1138']);"><img   src="Images/blank.gif" class="lazy" data-original="http://img2.wbiao.cn/ad/201403/21/139536510192630.jpg" alt="招行特惠" /></a>
    </div>
    <div style="clear:both">&nbsp;</div>    <!--banner结束-->
    <div class="rightArea w995">
        <div class="sift_tips">
            <div class="st_top">筛选结果</div>
            <div class="st_bot">找到&nbsp;“男士手表”&nbsp;<b class="red">18570</b>件</div>
        </div>
        <div class="sift_results">
            <a href="javascript:location.href='/shoubiao.html';" rel="nofollow" title="取消选择“男表”">男表<i>×</i></a></div>
        <!--        根据品牌搜索查询框-->
        <div class="sift_area">
            <div class="sa_mid">
                <div class="floor">
                    <div class="f_left">
                        <div class="f_tit">品牌</div>
                    </div>
                    <div class="f_right w920">
                        <dl class="s1 rel mb10">
                            <dt class="on"><a href="javascript:;" rel="nofollow">不限</a></dt>
                            <input type="text" id="brand_search" class="sa_search" value="输入品牌名" title="输入品牌名" />
                            <a href="<?=url::to(['home/watch/boylist']) ?>" id="showAll" class="all_brands">显示全部品牌</a>
                        </dl>
                        <?php foreach($data['brandList']as $val){ ?>
                            <dl id="level1" num="1" class="s2">
                                <dt><a href="javascript:;" rel="nofollow"><?=$val['sort']?></a></dt>
                                <dd><a href="javascript:void (0)"  brand_id="<?=$val['brand_id']?>"  title="<?=$val['brand_name']?>"><?=$val['brand_name']?></a></dd>
                            </dl>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!--end 根据品牌搜索-->

        <div class="clear"></div>
        <div class="show_area">
            <!--            排序-->
            <div class="sa_top">
                <dl class="order_by">
                    <dt>排序：</dt>
                    <dd class="on"><a href="javascript:void (0)" name="price_or" brand_id="all" rel="nofollow" title="点击排序">价格<i class="p_all"></i></a></dd>
                    <dd ><a href="javascript:void(0);" name="hot_or"  brand_id="all" class="down">热销</a></dd>
                    <dd><a href="javascript:void(0);" rel="nofollow"  brand_id="all" name="new_or" title="点击排序">最新<i class=""></i></a></dd>
                </dl>
            </div>
            <!--            end 排序-->
            <div class="sa_mid w930">
                <div id="goods_list" class="goods_list w930">
                    <!--                    商品展示-->
                    <ul class="ul_goods">
                        <?php if($data['goodsList'] == '1'){ ?>
                            <span><h2>该品牌下暂时没有商品</h2></span>
                        <?php }else{ ?>
                            <?php foreach($data['goodsList'] as $val){ ?>
                                <li>
                                    <div class="tImg"><img src="Images/<?=$val['g_img']?>"></div>
                                    <div class="tNm"><?=$val['goods_name'].'&nbsp;&nbsp;'.$val['keywords']?></div>
                                    <div class="tPrc">
                                        ￥<span><?=$val['shop_price']?></span>
                                        <i>欧洲同步价</i>
                                    </div>
                                    <div class="tInfo">
                                        销量<b>240</b>                                </div>
                                    </a>
                                    <label class="compare-off" id="compare_5561">对比
                                        <input autocomplete="off" type="checkbox" id="product_5561" title="勾选加入表款对比" onclick="javascript:addToCompareTable('5561','赫柏林Classic Gents系列12443/S01','http://imgb13.wbiao.cn/201312/18/12443_S01_97254.jpg','/michel-herbelin-g5561.html','￥2950',this)">
                                    </label>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                    <!--                    end 商品展示-->
                </div>
            </div>
            <!--            分页按钮-->
            <div class="sa_bot w930">
                <!-- 翻页 Begin -->
                <div id="page_nav">
                    <span class="pre">上一页</span>&nbsp;<span class="cur">1</span>&nbsp;<a href="">2</a>&nbsp;<a href="">3</a>&nbsp;<a href="">4</a>&nbsp;<span>&hellip;</span>&nbsp;<a href="">389</a>&nbsp;<span>&hellip;</span>&nbsp;<a  href="">774</a>&nbsp;<a  href="html" class="next">下一页</a>&nbsp;
                </div>
                <!-- 翻页 End -->

                <div id="record">
                    共有&nbsp;774&nbsp;页，跳到第&nbsp;<input id="jtp" type="text" class="txt" maxlength="4" maxpage="774" value="" />&nbsp;页&nbsp;<a id="btnJtp" href="javascript:void(0);" class="btn">确定</a>
                </div>
            </div>
            <!--            end 分页按钮-->
            <div class="sa_share w930">
                <span class="share"></span>
                <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
                    <!-- 将此,标记放在您希望显示like按钮的位置 -->
                    <div class="bdlikebutton"></div>
                    <!-- 将此代码放在适当的位置，建议在body结束前 -->
                    <script id="bdlike_shell"></script>
                </div>
            </div>
        </div>
    </div>

    <div id="hot_display_position"></div>
    <div class="leftArea w210">
        <div class="hot">
            <div class="h_top"><div class="h_tit">热销推荐</div></div>
            <!--热销系列展示 -->
            <div class="h_mid">
                <a rel="nofollow" class="h_link" href="">
                    <img src="Images/blank.gif" class="lazy" data-original="Images/16753956_91142.jpg" alt="法国精致腕表品牌：赫柏林-Classic Gents系列 12443/S01 男士石英表" />
                    <ul>
                        <li style="margin-top:28px;"><b>赫柏林</b></li>
                        <li>Classic Gents系列</li>
                        <li>男士石英表</li>
                        <li style="margin-top:10px;" class="red f14 bold">￥2950</li>
                        <li><del class="c666">￥2950</del></li>
                    </ul>
                </a>
            </div>
            <!--            end 热销系列-->
        </div>
        <!-- Hot End -->
        <!-- Side Ad Begin -->
        <div class="side_ad">
            <ul class="slides04">
                <li>
                    <a href=""   onclick="_gaq.push(['_trackEvent','shou-ye','jiao-dian-tu__1','http://data.wbiao.cn/ad.php?ad_id=']);"><img src="Images/138053732201270.jpg" alt="CYS" /></a>
                </li>
                <li>
                    <a href=""   onclick="_gaq.push(['_trackEvent','shou-ye','jiao-dian-tu__2','http://data.wbiao.cn/ad.php?ad_id=']);"><img src="Images/139589974044429.jpg" alt="赫柏林" /></a>
                </li>
            </ul>
        </div>
        <!-- Side Ad End -->
    </div>

    <script src="js/jquery.js"></script>
    <script type="text/javascript">
        $(function () {
            _csrf = $('._csrf').val();
            //提交搜索框
            $('.sa_search').blur(function () {
                var obj = new Object();
                obj['brand_name'] = $(this).val();
                where(obj);
            });

            //排序
            rel = '1';   //计数

            //搜索 品牌
            $('.s2 dd a').click(function () {
                var obj = new Object();
                var brand_id = $(this).attr('brand_id');
                $('.order_by dd a').attr('brand_id',brand_id);  //把品牌ID存放到排序按钮中
                obj['brand_id'] = brand_id;
                where(obj)
            });
            $('.order_by dd a').click(function () {
                var  objOrder = new Object();
                var or_name = $(this).attr('name');
                objOrder[or_name] = rel%2;
                rel++;
                objOrder['brand_id'] = $(this).attr('brand_id');
                $(this).parent().addClass('on').siblings().removeClass();    //选中样式
                where(objOrder);
            });

            //拼接值
            function where(obj)
            {
                var  alt = '';
                $.each(obj, function (k, v) {
                    alt +=k+'='+v+'&';
                });
                search(alt);
            }

            /*
             * 拼接条件 替换页面
             * */
            function search(alt){
                $.ajax({
                    type:'GET',
                    url:'<?=url::to(['home/watch/search'])?>',
                    data:alt,
                    dataType:'json',
                    success: function (msg) {
                        var str = '';
                        if(msg['res'] == '1'){
                            str +='<span><h2>'+msg['msg']+'</h2></span>'
                        }else{
                            $.each(msg, function (k,v) {
                                str += '<li><div class="tImg"><img src="Images/'+v.g_img+'"></div>';
                                str += '<div class="tNm">'+ v.goods_name+'&nbsp;&nbsp;'+v.keywords+'</div><div class="tPrc">';
                                str += '￥<span>'+v.shop_price+'</span><i>欧洲同步价</i></div>';
                                str += '<div class="tInfo">销量<b>240</b></div></a>';
                                str += '<label class="compare-off" id="compare_5561">对比';
                                str +='<input autocomplete="off" type="checkbox" id="product_5561" title="勾选加入表款对比"></label></li>';
                            })
                        }
//                        水电费
                        $('.ul_goods').html(str);
                    }
                });
            }
        })

    </script>
</div>


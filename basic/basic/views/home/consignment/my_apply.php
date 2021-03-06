<?php
use yii\helpers\Url;
use app\Lib\Functions\Filtration;
use \yii\widgets\LinkPager;
?>
<meta name="csrf-token" content="<?= Yii::$app->request->csrfToken ?>">
<script src="js/jquery.js"></script>
<link href="css/jimai.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/index.css" type="text/css" media="screen, projection" />
<style>
    #div1 ul li{float: left;}
    #div1 span{
        width: 50px;
        height: 16px;
        border: 1px solid #e6e6e6;
        color: #b01330;
        display: inline-block;
        font-size: 14px;

        text-decoration: none;
    }
    #div1 a{
        width: 50px;
        height: 16px;
        text-align: center;
        border: 1px solid #e6e6e6;
        color: #b01330;
        display: inline-block;
        font-size: 14px;
        line-height: 16px;
        text-decoration: none;
    }
    #div1 a:hover {
        background-color: #b01330;
        color: #FFF
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
                <li>
                    <a class="aStyle navBtn01" href="<?php echo Url::to(['home/consignment/consign_1'])?>">寄卖说明</a></li>

                <li><a class="aStyle navBtn02" href="<?php echo Url::to(['home/consignment/consign_2'])?>">寄卖的方式与流程</a></li>
                <li>
                    <a class="aStyle navBtn03" href="<?php echo Url::to(['home/consignment/index'])?>">寄卖铺</a></li>

                </li>
                <li>
                    <a style="display:block; width:163px; height:44px;" href="<?php echo Url::to(['home/consignment/my_apply'])?>" target="_blank"><div class="nav_btn01">
                            <p class="clearfix">
                                <span class="t1 pngfix"></span>我的寄卖
                            </p>
                        </div>
                    </a>
                <li class="anotherBtn">
                    <a class="aStyle navBtn02" href="<?php echo Url::to(['home/consignment/apply'])?>">立即寄卖</a>

                </li>
                <li class="anotherBtn">
                    <a class="aStyle navBtn02" href="<?php echo Url::to(['home/consignment/consult'])?>">寄卖咨询</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="content_box" id="floor" style="height: 520px;width:980px;margin-left:200px;">
        <div id="main">
            <div class="position">
                <a href="#"><strong>首页</strong></a>
                <i>&gt;</i>
                <a href="#" target="_blank" class="c0e7">免费寄卖</a>
                <i>&gt;</i>
                <span>我的寄卖</span>
            </div>
            <div class="rightArea">
                <!-- 便利提醒 Begin -->
                <div class="prompt">
                    <div class="pr_top">
                        <b class="tit">我的寄卖</b>
                        <div id="contact_kf_div" class="u__kf" onclick="javascript:NTKF.im_openInPageChat(&#39;kf_9988_1341905703263&#39;);_gaq.push([&#39;_trackEvent&#39;,&#39;kefuxiaochuang&#39;, &#39;tousu&#39;, location.href]);"></div>
                    </div>

                </div>
                <!-- 便利提醒 End -->

                <div class="clear"></div>
                <!-- order表单 Begin -->
                <div class="odrTab">
                    <div class="ot_top">
                        <form action="">
                            <div class="left">
                                <select name="datetime">
                                    <option selected="selected" value="">已上架商品</option>
                                    <option value="1">近一个月订单</option>
                                    <option value="2">近三个月订单</option>
                                    <option value="3">近一年订单</option>
                                </select>
                                <select name="order_status">
                                    <option value="">全部状态</option>
                                    <option value="1">未确认</option>
                                    <option value="2">确认中</option>
                                    <option value="3">已确认</option>
                                    <option value="4">待发货</option>
                                    <option value="5">分单发货中</option>
                                    <option value="6">已发货</option>
                                    <option value="7">已取消</option>
                                    <option value="8">待支付</option>
                                </select>

                            </div>
                            <div class="right">
                                &lt;订单编号：&gt;<!--订单编号：-->
                                <input type="text" class="txt" name="order_id" value="" onfocus="javascript:$(this).val(&#39;&#39;);">
                                <input type="submit" class="lookup" value="查询">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="account">
                    <div class="hisOrd">

                <?php if($type == 0){ ?>

                        <table class="ho_middle" cellpadding="0" cellspacing="0">
                            <tbody><tr class="t">
                                <td class="w120">手表名称</td>
                                <td class="w186">商品图片</td>
                                <td class="w75">商品品牌</td>
                                <td class="w111">商品金额</td>
                                <td class="w87">上架时间</td>
                                <td>是否议价</td>
                                <td class="w87">订单状态</td>

                                <td class="w130">操作</td>
                            </tr>
                            <?php  foreach($data as $key=>$val){  ?>
                                <tr class="c">
                                    <td class="w120 h70"><a class="c0e7" target="_blank" href="#"><?php echo $val['author']?></a></td>
                                    <td class="w186 adjust02" style="text-align:left;">
                                        <a target="_blank" title="瑞士爱宝时（EPOS）-Passion系列 3412.183.24.30.27 机械男表" href="#"><img alt="瑞士爱宝时（EPOS）-Passion系列 3412.183.24.30.27 机械男表" src="images/3412_183_24_30_27_27885.jpg"></a>
                                        <a target="_blank" title="瑞士爱宝时（EPOS）-Passion系列 3412.183.24.30.27 机械男表" href="#"><img alt="瑞士爱宝时（EPOS）-Passion系列 3412.183.24.30.27 机械男表" src="images/3412_183_24_30_27_27885.jpg"></a>
                                    </td>
                                    <td class="w75 h70"><font class="c333"><?php echo $val['g_brand']?></font></td>
                                    <td class="w111 adjust01">
                                        <font class="cb01">￥<?php echo $val['shop_price']?>.00</font><br>
                                    </td>
                                    <td class="w87 adjust01">
                                        <div><?php echo date('Y-m-d H:i:s',$val['add_time'])?></div>
                                    </td>
                                    <td class="w87 adjust01">
                                        <div><?php
                                               if($val['is_bargain'] == 1){
                                                   echo "是";
                                               } else {
                                                   echo "否";
                                               }
                                            ?></div>
                                    </td>
                                    <td class="w87 h70"><font class="c888">
                                            <?php
                                            if($val['shop_status'] == 1){
                                                echo "审核通过";
                                            } else {
                                                echo "审核中";
                                            }
                                            ?>
                                        </font>
                                    </td>
                                    <td class="w130 adjust03">
                                        <a class="c0e7" target="_blank" href="<?php echo Url::to(['home/consignment/apply']).'&id='.$val['consignment_id']?>">修改</a>
                                        <span>|</span>
                                        <a class="c0e7 del"  href="javascript:void(0);" data-id="<?php echo $val['consignment_id'];?>">删除</a>
                                    </td>
                                </tr>
                            <?php    } ?>
                            </tbody>
                        </table>
                    <div id="div1" style="margin-left: 450px;margin-top: 20px;">
                        <?= LinkPager::widget([   'pagination' => $page,
                            'firstPageLabel' => '首页',
                            'lastPageLabel' => '尾页',
                            'nextPageLabel' => '下一页',
                            'prevPageLabel' => '上一页',
                            'maxButtonCount' => 2,
                            'options' => ['class' => 'mLnk'],

                        ]); ?>
                    </div>
                       <?php } elseif($type == 1) { ?>
                        <table class="ho_middle" cellpadding="0" cellspacing="0">
                            <tbody><tr class="t">
                                <td class="w120">手表名称</td>
                                <td class="w186">商品图片</td>
                                <td class="w75">商品品牌</td>
                                <td>原价金额</td>
                                <td class="w111">议价金额</td>
                                <td class="w87">议价时间</td>
                                <td class="w130">操作</td>
                            </tr>
                            <?php  foreach($yijia as $key=>$val){  ?>
                                <tr class="c">
                                    <td class="w120 h70"><a class="c0e7" target="_blank" href="#"><?php echo $val['author']?></a></td>
                                    <td class="w186 adjust02" style="text-align:left;">
                                        <a target="_blank" title="瑞士爱宝时（EPOS）-Passion系列 3412.183.24.30.27 机械男表" href="#"><img alt="瑞士爱宝时（EPOS）-Passion系列 3412.183.24.30.27 机械男表" src="images/3412_183_24_30_27_27885.jpg"></a>
                                        <a target="_blank" title="瑞士爱宝时（EPOS）-Passion系列 3412.183.24.30.27 机械男表" href="#"><img alt="瑞士爱宝时（EPOS）-Passion系列 3412.183.24.30.27 机械男表" src="images/3412_183_24_30_27_27885.jpg"></a>
                                    </td>
                                    <td class="w75 h70"><font class="c333"><?php echo $val['g_brand']?></font></td>
                                    <td class="w87 adjust01">
                                        <font class="cb01">￥<?php echo $val['shop_price']?>.00</font><br>

                                    </td>
                                    <td class="w111 adjust01">
                                        <font class="cb01">￥<?php echo $val['bargain_price']?>.00</font><br>
                                    </td>
                                    <td class="w87 adjust01">
                                        <div><?php echo date('Y-m-d H:i:s',$val['bargain_time'])?></div>
                                    </td>

                                    <td class="w87 h70" id="yijia_msg-<?php echo $val['bargain_id'];?>">
                                        <?php
                                        if($val['bargain_status'] == 1){ ?>
                                            <a class="c0e7 yijia"  href="javascript:void(0);" >同意</a>
                                        <?php  } elseif($val['bargain_status'] == -1) { ?>
                                        <a class="c0e7 yijia"  href="javascript:void(0);" >拒接</a>

                                       <?php } else{  ?>
                                            <font class="c888">
                                                <a class="c0e7 yijia"  href="javascript:void(0);" data-type="1"  data-id="<?php echo $val['bargain_id'];?>">同意</a>
                                                <span>|</span>
                                                <a class="c0e7 yijia" href="javascript:void(0);" data-type="0" data-id="<?php echo $val['bargain_id'];?>">不同意</a>
                                            </font>
                                       <?php }
                                        ?>

                                    </td>
                                </tr>
                            <?php    } ?>
                            </tbody>
                        </table>
                        <?php  } elseif($type == 2){  ?>
                    <table class="ho_middle" cellpadding="0" cellspacing="0">
                        <tbody><tr class="t">
                            <td class="w120">手表名称</td>
                            <td class="w186">商品图片</td>
                            <td class="w75">商品品牌</td>
                            <td>原价金额</td>
                            <td class="w111">议价金额</td>
                            <td class="w87">议价时间</td>
                            <td class="w130">操作</td>
                        </tr>
                        <?php  foreach($oneself_yijia as $key=>$val){  ?>
                            <tr class="c">
                                <td class="w120 h70"><a class="c0e7" target="_blank" href="#"><?php echo $val['author']?></a></td>
                                <td class="w186 adjust02" style="text-align:left;">
                                    <a target="_blank" title="瑞士爱宝时（EPOS）-Passion系列 3412.183.24.30.27 机械男表" href="#"><img alt="瑞士爱宝时（EPOS）-Passion系列 3412.183.24.30.27 机械男表" src="images/3412_183_24_30_27_27885.jpg"></a>
                                    <a target="_blank" title="瑞士爱宝时（EPOS）-Passion系列 3412.183.24.30.27 机械男表" href="#"><img alt="瑞士爱宝时（EPOS）-Passion系列 3412.183.24.30.27 机械男表" src="images/3412_183_24_30_27_27885.jpg"></a>
                                </td>
                                <td class="w75 h70"><font class="c333"><?php echo $val['g_brand']?></font></td>
                                <td class="w87 adjust01">
                                    <font class="cb01">￥<?php echo $val['shop_price']?>.00</font><br>

                                </td>
                                <td class="w111 adjust01">
                                    <font class="cb01">￥<?php echo $val['bargain_price']?>.00</font><br>
                                </td>
                                <td class="w87 adjust01">
                                    <div><?php echo date('Y-m-d H:i:s',$val['bargain_time'])?></div>
                                </td>

                                <td class="w87 h70" id="yijia_msg1-<?php echo $val['bargain_id']?>">
                                    <?php
                                    if($val['bargain_status'] == 1){ ?>
                                        <a class="c0e7"  href="javascript:void(0);" >卖家同意，加入购物车</a>
                                    <?php  } elseif($val['bargain_status'] == -1) { ?>
                                        <a class="c0e7"  href="javascript:void(0);" >卖家拒接</a><br/>
                                        <input type="text" style="width: 65px;" placeholder="输入价格" id="two_yijia">
                                        <a class="c0e7 two_yijia"  href="javascript:void(0);" data-id="<?php echo $val['bargain_id']?>" data-prices="<?php echo $val['shop_price']?>">再次议价</a>
                                    <?php } else{  ?>
                                        <a class="c0e7"  href="javascript:void(0);" >等待卖家处理</a>
                                    <?php }
                                    ?>

                                </td>
                            </tr>
                        <?php    } ?>
                        </tbody>
                    </table>
               <?php } ?>

                    </div>
                </div>
                <!-- order表单 End -->

                <!-- 翻页 Begin -->
                <!-- 翻页 End -->

            </div>

            <!-- 左边菜单 Begin -->
            <div class="leftArea">
                <div class="leftArea">
                    <div class="u__mine"><a onclick="_gaq.push([&#39;_trackEvent&#39;,&#39;user&#39;,&#39;user_index&#39;,&#39;http://user.wbiao.cn/&#39;]);" href="http://user.wbiao.cn/" style="display: block; height: 100%;"></a></div>
                    <div class="floor">
                        <div class="t"><i class="u__trade"></i><font class="f_fixed">卖家中心</font></div>
                        <div class="c">
                            <ul>
                                <li><i class="u__point"></i><a  href="<?php echo Url::to(['home/consignment/my_apply'])?>" class="ccf0" title="我的订单" rel="nofollow">我的商品 (<span class="cb01"><?php echo $all_count?></span>)</a></li>
                                <li style="border:0;"><i></i><a  href="<?php echo Url::to(['home/consignment/my_apply'])."&type=1"?>" title="代金券/优惠券" rel="nofollow">收到出价(<span class="cb01"><?php echo $yijia_count?></span></span>)</a></li>
                                <li><i></i><a  href="javascript:void(0);" title="我的预售" rel="nofollow">发货中 (<span class="cb01">0</span>)</a></li>
                              </ul>
                        </div>
                    </div>
                    <div class="floor">
                        <div class="t"><i class="u__trade"></i><font class="f_fixed">买家中心</font></div>
                        <div class="c">
                            <ul>
                                <li><i class="u__point"></i><a  href="Script/yonghu.htm" class="ccf0" title="我的订单" rel="nofollow">待收货 (<span class="cb01">0</span>)</a></li>
                                <li style="border:0;"><i></i><a  href="#" title="代金券/优惠券" rel="nofollow">退货中(<span class="cb01">0</span>)</a></li>
                                <li style="border:0;"><i></i><a  href="<?php echo Url::to(['home/consignment/my_apply'])."&type=2"?>" title="代金券/优惠券" rel="nofollow">我的出价(<span class="cb01"><?php echo $oneself_yijia_count;?></span>)</a></li>
                            </ul>
                        </div>
                    </div>
                       <div class="floor">
                        <div class="t"><i class="u__trade"></i><font class="f_fixed">商户中心</font></div>
                        <div class="c">
                            <ul>
                                <li><i class="u__point"></i><a onclick="_gaq.push([&#39;_trackEvent&#39;,&#39;user&#39;,&#39;user_order&#39;,&#39;/order&#39;]);" href="Script/yonghu.htm" class="ccf0" title="我的订单" rel="nofollow">交易成功 (<span class="cb01">0</span>)</a></li>
                                <li style="border:0;"><i></i><a onclick="_gaq.push([&#39;_trackEvent&#39;,&#39;user&#39;,&#39;user_bonus&#39;,&#39;/bonus&#39;]);" href="#" title="代金券/优惠券" rel="nofollow">交易失败(<span class="cb01">0</span>)</a></li>
                                <li><i></i><a onclick="_gaq.push([&#39;_trackEvent&#39;,&#39;user&#39;,&#39;user_address&#39;,&#39;/address&#39;]);" href="#" title="收货地址" rel="nofollow">售后服务(<span class="cb01">0</span>)</a></li>
                            </ul>
                        </div>
                    </div>
                </div></div>
            <!-- 左边菜单 End -->

        </div>
    </div>
</div>

<script>
    $(function(){
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $('.del').click(function(){
          var id = $(this).data('id');
            var _this = $(this);
           $.ajax({
               type:'post',
               url:"<?php echo Url::to(['home/consignment/del'])?>",
               data:'id='+id+'&_csrf='+csrfToken,
               success:function(msg){
                  if(msg == 1){
                      alert("删除成功");
                      _this.parent().parent().remove();
                  } else {
                      alert("删除失败");
                  }
               }
           });
       });
        $('.two_yijia').click(function(){
            var id = $(this).data('id');
            var price = $('#two_yijia').val();
            var prices =  $(this).data('prices');
            if((price/1) >= (prices/1)){
                alert("非法出价");
                return false;
            }
            if(price < (prices-(prices*0.2))){
                alert("最低不能低于商品价格20%");
                return false;
            }
            $.ajax({
                type:'post',
                url:"<?php echo Url::to(['home/consignment/two_bargain'])?>",
                data:'id='+id+'&price='+price+'&_csrf='+csrfToken,
                success:function(msg){
                    if(msg == 1){
                        $('#yijia_msg1-'+id).html("<font>ok，等待卖家处理</font>")
                    }else {
                        $('#yijia_msg1-'+id).html("<font>议价失败</font>")
                    }
                }
            });
        });

        $('.yijia').click(function(){
            var id = $(this).data('id');
            var type = $(this).data('type');
            $.ajax({
                type:'post',
                url:"<?php echo Url::to(['home/consignment/consent_bargain'])?>",
                data:'id='+id+'&type='+type+'&_csrf='+csrfToken,
                success:function(msg){
                    if(msg == 1){
                        $('#yijia_msg-'+id).html("<font>已同意</font>")
                    } else if(msg == -1){
                        $('#yijia_msg-'+id).html("<font>拒接</font>")
                    } else {
                        $('#yijia_msg-'+id).html("<font>操作失败</font>")
                    }
                }
            });
        });
    });
</script>


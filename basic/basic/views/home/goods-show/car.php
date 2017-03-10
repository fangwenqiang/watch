<?php 
use yii\helpers\Url;
 ?>
<script src="js/jquery.js"></script>
<link rel="stylesheet" href="css/2.css">
<div id="main" style="margin-left:200px;">
    <div class="w930 m0a mt30">     
        <div class="bgf6f br10">
            

            <ul class="c999 f13 h40 mt10 li_left">
                <li class="w510 tl pl20">商品</li>
                <li class="w120 tc">售价</li>
                <li class="w120 tc">数量</li>
                <li class="w80 tr pr64">操作</li>
            </ul>

             <?php foreach ($cartShow as $key => $value): ?>
            <ul class="bt_1_eae bb_1_fff" id="goods_line_548546"></ul>
                
               
                <ul class="999 f13 h120 li_left" id="goods_list_548546">
                   <a>
                            
                    <li class="w510 tl pl20">
                       
                        <a href="#" target="_blank" class="fl">
                <img src="images/3412_183_24_30_27_27885.jpg" class="m_10_20_10_0" alt="" height="100px" width="100px">
                        </a>
                        <a href="#" target="_blank">
                            <span class="w390 bold c333 fl h20 mt35"><?=$value['goods_name'] ?></span>
                        </a>
                    </li>
                    <li class="w120 tc">
                        <span class="bold ccf0 f16">￥ <?=$value['price'] ?></span>
                    </li>
                    <li class="w120 tc">
                        <span class="btne3d w18 h22 inbl re-t0-l5 ie-t1_m50 ie_mi" oprtype="minus" oprid="548546">—</span>
                        <input id="goods_number_548546" name="goods_number" maxlength="4" size="2" 
                        value="<?=$value['num'] ?>" class="b_1_e5e p_0_5 tc w28 h20 ie-t1_m50 ie_mi goods_number c000 bold" oprid="548546" oprnum="1" type="text">
                        <span class="btne3d w18 h22 inbl re_t0-l5 ie-t1_m50 ie_mi" oprtype="add" oprid="548546">+</span>
                    </li>
                    <li class="w100 tr">
                       <a href="javascript:void(0)" data="548546" 
                       class="ul delete" cartId="<?=$value['cart_id'] ?>">删除</a>
                    </li>
                </ul>
        
            <ul class="bt_1_eae bb_1_fff"></ul>
                    <?php endforeach ?>

                <script>
                $('.delete').on('click',function(){
                     var id = $(this).attr('cartId');
                     parentNode = $(this).parent().parent();
                    $.get("<?=Url::toRoute('home/goods-show/del-cart') ?>"
                        ,{
                            'id':id,
                        },function(data){
                            if (data == 1) {
                                alert('删除成功');
                                parentNode.remove();
                            }else{
                                alert('删除失败');
                            }
                        });
                });
                </script>


            <!-- Cale 2014-03-13-->
            <div class="c999">
                <div class="fl w500">
                    <div class="m10">
                        折扣优惠：
                        <select id="" name="" onchange="javascript:if(this.value==122){pop_login();return false;}location.href='/index/select_activity?id='+this.value;">
                            <option value="-1">----- 选择参与的活动折扣形式 -----</option>
                        <option value="124">兴业银行活动</option>
<option value="123">招行特惠活动：最高立减2000元！</option>
                        </select>
                    </div>
                </div>
                            </div>


            <div class="clear"></div>
        </div>
        <div class="w930 m0a">
            <div class="fl">
                <div class="mt50">
                    <a href="#" class="f14 bold c999 b_1_efe btnf7f w146 h40 fl tc">继续购物</a>
                </div>
            </div>
            <div class="fr">
                <div class="tc cd00 mt20">
                    <span class="f13 bold">商品总额：￥</span>
                    <span class="f20" id="goods_amount"><?=$priceSum ?></span>
                </div>
                
                <div class="mt20 tr">
                    <input id="all_has_stock" value="1" type="hidden">
                <a rel="nofollow" id="real_checkout_now" href="http://cart.wbiao.cn/user/index/pop_login" class="iframe" style="display:none;">检查登录</a>
                <input onclick="location.href='/order';" class="btnd00 w146 h40 f16 bold" onmouseover="this.className='btnd00Hover w146 h40 f16 bold'" onmouseout="this.className='btnd00 w146 h40 f16 bold'" value="去结算" type="submit">
                </div>
                <div class="mt10">
                    <span class="c999">结算后可选择礼品或使用优惠券等操作</span>
                </div>
            </div>
                    </div>
    </div>
</div>
<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<script src="js/jquery.js"></script>
<div id="main">
    <div class="position">
        <a href="<?php echo Url::to(['home/index/index'])?>">
            <strong>首页</strong>
        </a>
        <i>&gt;</i>
        <a href="<?php echo Url::to(['home/personal/index'])?>" target="_blank" class="c0e7">
            我的喜悦手表
        </a>
        <i>&gt;</i>
        <span>我的分期</span>
    </div>
    <div class="rightArea">
        <div class="prompt">
            <div class="pr_top">
                <b class="tit">我的订单</b>
                <div id="__User_order_zixun" class="u__kf pc_to_ntalk"></div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="odrTab">

        </div>
        <div class="account">
            <div class="hisOrd">
                    <table class="ho_middle" cellpadding="0" cellspacing="0">
                        <tbody>
                        <tr class="t">
                            <td class="w120">商品名</td>
                            <td class="w75">商品价格</td>
                            <td class="w186">分期信息</td>
                            <td class="w111">本月还款</td>
                            <td class="w87">已还期数</td>
                            <td class="w87">未还期数</td>
                            <td class="w130">操作</td>
                        </tr>
                        <?php foreach($info as $key=>$val){  ?>
                            <tr>
                                <td><?php echo $val['g_name']?></td>
                                <td>1200</td>
                                <td><?php echo $val['periods_info']?></td>
                                <td><?php echo $val['refund_price'];
                                    if($val['status'] == 0){
                                        echo "(快速还款)";
                                    } else{
                                        echo "(已还)";
                                    }
                                    ?></td>
                                <td><?php echo $val['paid_periods'];?></td>
                                <td><?php echo $val['unpaid_periods']?></td>
                                <td><a href="javascript:void(0);" class="periods" data-id="<?php echo $val['periods_id']?>">查看分期</a></td>
                            </tr>
                        <?php  } ?>
                        </tbody>
                    </table>
<!--                    <div style="margin-left: 30%;margin-top: 10%;">-->
<!--                        <img src="../admin/images/weizhaodao.jpg" alt="未找到">-->
<!--                        <span style="color: #ff4b33;font-size: 18px;">暂无相关数据!</span>-->
<!--                    </div>-->
                     <div>

<!--                         <div style="margin-top: 50px;float: left">-->
<!--                             <div style="width: 100px;height: 25px;border-bottom: 5px solid green;float: left;">-->
<!--                                 <p style="font-weight: bold;font-size: 16px;text-align: center">-->
<!--                                     <a>还款记录</a>-->
<!--                                 </p>-->
<!--                             </div>-->
<!--                             <div style="width: 700px;height: 25px;border-bottom: 5px solid red;float: left"></div>-->
<!--                         </div>-->

                     <div style="display: none" id="hide">
                         <div class="prompt" style="margin-top: 50px;">
                             <div class="pr_top">
                                 <b class="tit">还款记录</b>
                             </div>
                         </div>
                         <div style="width: 800px;height: auto;border: 1px solid green;float: left;">
                             <table class="ho_middle" cellpadding="0" cellspacing="0" id="tables">
                                 <tbody>
                                 <tr class="t">
                                     <td class="w120">商品名称</td>
                                     <td class="w75">还款期数</td>
                                     <td class="w75">还款金额</td>
                                     <td class="w186">还款日期</td>
                                     <td class="w186">截止日期</td>
                                     <td class="w87">还款状态</td>
                                     <td class="w130">操作</td>
                                 </tr>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                      </div>
            </div>
        </div>

        <style>
            .pager {
                padding-left: 0;
                margin: 20px 0;
                text-align: center;
                list-style: none;
            }
            .pager li {
                display: inline;
            }
            .pager li > a,
            .pager li > span {
                display: inline-block;
                padding: 5px 14px;
                background-color: #fff;
                border: 1px solid #ddd;
                border-radius: 15px;
            }
            .pager li > a:hover,
            .pager li > a:focus {
                text-decoration: none;
                background-color: #eee;
            }
            .pager .previous > a,
            .pager .previous > span {
                float: left;
            }
            .pager .disabled > a,
            .pager .disabled > a:hover,
            .pager .disabled > a:focus,
            .pager .disabled > span {
                color: #777;
                cursor: not-allowed;
                background-color: #fff;
            }
            .pager .active > a,.pager .active > a:hover{
                background-color: #71d7f4;
                cursor: default;
            }
        </style>
<!--        <div class="pager">--><?//=yii\widgets\LinkPager::widget(['pagination' => $pages])?><!--</div>-->
    </div>
    <script>
       $('.periods').click(function(){
          var id = $(this).data('id');
           $('#hide').show();
           $.get("<?php echo  Url::to(['home/personal/select_periods'])?>",{id:id},function(msg){
               var html = '';
               $.each(msg,function(k,v){
                   html += '<tr ';
                   if(v.refund_status == 1){ html += 'bgcolor="#696969"';}
                   html += '>\
                   <td>'+v.goods_name+'</td>\
                   <td>第'+v.periods+'期</td>\
                   <td>'+v.money+'</td>\
                   <td>'+v.refund_date+'</td>\
                   <td>'+v.abort_date+'</td>\
                   <td>';
                   if(v.refund_status == 1){ html += '已还款';} else {html += '未还款';}
                   html += '</td>\
                   <td><a href="javascript:void(0);">';
                   if(v.refund_status == 1){ html += '<s>还款</s>'; } else { html += '<a href="javascript:void(0);">还款</a>';}
                   html += '</a></td></tr>'
               });
               $('#tables').append(html);
           },'json')
       });
    </script>
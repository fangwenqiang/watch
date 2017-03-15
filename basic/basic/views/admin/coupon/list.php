<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<div id="dcMain">
   <!-- 当前位置 -->
    <div id="urHere">DouPHP 管理中心<b>></b><strong>优惠券管理</strong> </div>   
    <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="<?php echo Url::to(['admin/coupon/add'])?>" class="actionBtn add">添加优惠券</a>优惠券列表</h3>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
        <tr>
            <th width="50" align="left">编号</th>
            <th width="100" align="left">名称</th>
            <th width="50" align="left">面值</th>
            <th width="60" align="center">所需消费</th>
            <th width="150" align="center">有效期</th>
            <th width="80" align="center">操作</th>
        </tr>
        <?php foreach($coupon_list['models'] as $key=>$value):?>
        <tr>
            <td align="left"><?php echo $value['coupon_sn']?></a></td>
            <td><?php echo $value['coupon_name']?></td>
            <td align="center"><?php echo $value['coupon_value']?></td>
            <td align="center"><?php echo $value['require_spend']?></td>
            <td align="center"><?php echo date('Y-d-m', $value['start_time']) . '至' . date('Y-d-m', $value['expire_time'])?></td>
            <td align="center">
            	<a href="<?php echo Url::to(['admin/coupon/update','coupon_id'=>$value['coupon_id']])?>">修改</a> |
            	<a href="<?php echo Url::to(['admin/coupon/delete','coupon_id'=>$value['coupon_id']])?>">删除</a>
            </td>
        </tr>
        <?php endforeach; ?>
        </table>
        <?php echo LinkPager::widget(['pagination' =>$coupon_list['pages']]);?>
    </div>
</div>
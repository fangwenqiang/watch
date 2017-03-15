<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<div id="dcMain">
   <!-- 当前位置 -->
    <div id="urHere">DouPHP 管理中心<b>></b><strong>评论管理</strong> </div>   
    <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3>评论列表</h3>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
        <tr>
            <th width="100" align="left">评论商品</th>
            <th width="100" align="left">评论人</th>
            <th width="100" align="left">评价</th>
            <th width="60" align="center">评论时间</th>
            <th width="80" align="center">图片</th>
            <th width="80" align="center">操作</th>
        </tr>
        <?php foreach($comment_list['models'] as $key=>$value):?>
        <tr>
            <td align="left"><a href="<?php echo Url::to(['home/goods-show/show','id'=>$value['goods_id']])?>"><?php echo $value['goods_name']?></a></td>
            <td><?php echo $value['comment_people']?></td>
            <td align="center"><?php echo $value['comment_rank']?></td>
            <td align="center"><?php echo date('Y-m-d H:i:s',$value['time'])?></td>
            <td align="center"><img src="../home/<?php echo $value['comment_img1']?>" alt="" width="50px" /></td>
            <td align="center">
            	<?php if($value['reply_status']==1) {?>
                <a href="javascript:void(0)" onclick="alert('你已经回复,不能修改')">已回复</a> | 
                <?php } else {?>
                <a href="<?php echo Url::to(['admin/comment/reply','comment_id'=>$value['comment_id']])?>">回复</a> | 
                <?php }?>
                <a href="<?php echo Url::to(['admin/comment/delete','comment_id'=>$value['comment_id']])?>">删除</a>
            </td>
        </tr>
        <?php endforeach; ?>
        </table>
        <?php echo LinkPager::widget(['pagination' =>$comment_list['pages']]);?>
    </div>
</div>
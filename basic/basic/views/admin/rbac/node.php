<?php
use yii\helpers\Url;
?>
<style>
    .tableBasic li{
        border:1px solid #e5e5e5;
    }
</style>
<div id="dcMain">
    <!-- 当前位置 -->
    <div id="urHere">DouPHP 管理中心<b>></b><strong>网站管理员</strong> </div>   <div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="<?=url::to(['admin/rbac/addnode'])?>" class="actionBtn">添加权限</a>权限列表</h3>

        <ul class="tableBasic" style="font-size: 20px">
        <?php foreach($data as $key=>$val) { ?>
            <li>
                <?php echo str_repeat("----", $val['level']);?><?=$val['node_name']?><span style="float:right"><a
                        href="<?=url::to(['admin/rbac/upnode','node_id'=>$val['node_id']])?>">编辑</a> | <a href="javascript:void(0)" class="del" node_id="<?=$val['node_id']?>">删除</a></span>
            </li>
        <?php } ?>
        </ul>

        <input type="hidden" class="_csrf" value="<?=Yii::$app->request->getCsrfToken() ?>">
    </div>
</div>
<script>
    $(function () {
        //删除权限
        $('.del').click(function () {
            var node_id = $(this).attr('node_id');    //权限ID
            var csrf = $('._csrf').val();
            var _this = $(this);
            if(confirm('确定删除此权限，该操作不可恢复！')){
                $.post("<?=url::to(['admin/rbac/delete'])?>",{node_id:node_id,_csrf:csrf}, function (msg) {
                    if(msg == 0){
                        _this.parent().parent().remove();
                    }else if(msg == 1){
                        alert('删除失败');
                    }else if(msg == 3){
                        alert('当前权限有角色正在使用，请解除管理后再进行删除操作')
                    }
                });
            }else{
                return false;
            }
        });

        //鼠标滑过
        $('.tableBasic li').mouseover(function() {
            $(this).attr("style","border:1px solid red;");
        });
        //鼠标离开
        $('.tableBasic li').mouseout(function() {
            $(this).attr("style","border:1px solid #e5e5e5;");
        });

     })
</script>
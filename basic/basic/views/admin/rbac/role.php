<?php
use yii\helpers\Url;
?>
<div id="dcMain">
    <!-- 当前位置 -->
    <div id="urHere">DouPHP 管理中心<b>></b><strong>网站管理员</strong> </div>   <div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="<?=url::to(['admin/rbac/addrole'])?>" class="actionBtn">添加角色</a>网站管理员</h3>
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
            <tr>
                <th align="center">编号</th>
                <th align="conter">角色名称</th>
                <th align="center">操作</th>
            </tr>
            <?php foreach($data as $key=>$val){ ?>
                <tr>
                    <td align="center"><?=$val['role_id']?></td>
                    <td align="center"><?=$val['role_name']?></td>
                    <td align="center"><a href="<?=url::to(['admin/rbac/updaterole','role_id'=>$val['role_id']])?>">编辑</a> | <a href="javascript:void(0)" class="del" role_id="<?=$val['role_id']?>">删除</a></td>
                </tr>
            <?php } ?>
        </table>
        <input type="hidden" class="_csrf" value="<?=Yii::$app->request->getCsrfToken() ?>">
    </div>
</div>
<script>
    $(function () {
        //删除管理员
        $('.del').click(function () {
            var role_id = $(this).attr('role_id');    //管理员ID
            var csrf = $('._csrf').val();
            var _this = $(this);
            if(confirm('确定删除此管理员，该操作不可恢复！')){
                $.post("<?=url::to(['admin/rbac/delete'])?>",{role_id:role_id,_csrf:csrf}, function (msg) {
                    if(msg == 0){
                        _this.parent().parent().remove();
                    }else{
                        alert('删除失败');
                    }
                });
            }else{
                return false;
            }
        })
    })
</script>
<?php
use yii\helpers\Url;
?>
<style>
    .ro_li{
        font-size: 20px;
    }
    .ro_li li{
        float: left;
        margin-left: 20px;
    }
</style>
<div id="dcMain">
    <!-- 当前位置 -->
    <div id="urHere">DouPHP 管理中心<b>></b><strong>网站管理员</strong> </div>   <div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="<?=url::to(['admin/rbac/admin'])?>" class="actionBtn">查看管理员</a>赋角色</h3>
        <form method="post" name="<?=url::to(['admin/rbac/addroad'])?>">
            <div class="tableBasic">
                <h3>给管理员<?=$adminOne['username']?>赋角色</h3>
                <ul class="ro_li">
                    <?php foreach($roleList as $key=>$val){ ?>
                        <li><input type="checkbox" name="role_id[]" value="<?=$val['role_id']?>"<?php
                            foreach($role_id as $v){
                                if($val['role_id'] == $v){
                            ?> checked <?php
                                }
                            }
                            ?>> <?=$val['role_name']?></li>
                    <?php } ?>
                </ul>
                <input type="hidden" name="admin_id" value="<?=$adminOne['admin_id']?>"/>
                <input type="submit" value="赋角色" style="margin-left: 20px" class="btn">
                <input name="_csrf" type="hidden" id="_csrf" value="<?= \Yii::$app->request->csrfToken ?>">
            </div>
        </form>
    </div>
</div>
<script>
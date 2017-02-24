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
    <div id="urHere">DouPHP 管理中心<b>></b><strong>角色列表</strong> </div>   <div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="<?=url::to(['role/rbac/role'])?>" class="actionBtn">查看管理员</a>赋角色</h3>
        <form method="post" name="<?=url::to(['role/rbac/addroad'])?>">
            <div class="tableBasic">
                <h3>给管理员<?=$roleOne['role_name']?>赋权限</h3>
                <ul class="ro_li">
                    <?php foreach($nodeList as $key=>$val){ ?>
                        <li><?=str_repeat("----", $val['level']);?>
                            <?php if($val['level'] != 0){ ?>
                                <input type="checkbox" name="node_id[]" value="<?=$val['node_id']?>" <?php
                                foreach($node_id as $v){
                                    if($val['node_id'] == $v){
                                        ?> checked <?php
                                    }
                                }
                                ?> >
                            <?php } ?>
                            <?=$val['node_name']?>
                            </li><br>
                    <?php } ?>
                </ul>
                <input type="hidden" name="role_id" value="<?=$roleOne['role_id']?>"/>
                <input type="submit" value="赋权限" style="margin-left: 20px" class="btn">
                <input name="_csrf" type="hidden" id="_csrf" value="<?= \Yii::$app->request->csrfToken ?>">
            </div>
        </form>
    </div>
</div>
<script>
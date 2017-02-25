<?php
use yii\helpers\Url;

?>
<div id="dcMain">
    <!-- 当前位置 -->
    <div id="urHere">DouPHP 管理中心<b>></b><strong>用户管理</strong></div>
    <div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3>用户列表</h3>
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
            <tr>
                <th align="center">编号</th>
                <th align="conter">用户名</th>
                <th align="center">电话</th>
                <th align="center">邮箱</th>
                <th align="center">性别</th>
                <th align="center">真实姓名</th>
                <th align="center">是否允许登录</th>
                <th align="center">操作</th>
            </tr>
            <?php foreach ($data as $k => $v) { ?>
                <tr>
                    <td align="center"><?= $v['user_id'] ?></td>
                    <td align="center"><?= $v['username'] ?></td>
                    <td align="center"><?= $v['tel'] ?></td>
                    <td align="center"><?= $v['email'] ?></td>
                    <td align="center">
                        <?php if ($v['sex'] == 1) {
                            echo "男";
                        } else {
                            echo "女";
                        } ?></td>
                    <td align="center"><?= $v['real_name'] ?></td>
                    <td align="center">
                        <select id="<?= $v['user_id'] ?>">
                            <option value="1"
                                <?php if ($v['is_login'] == 1) {
                                    echo "selected = 'selected'";
                                } ?> >允许登录
                            </option>
                            <option value="0"
                                <?php if ($v['is_login'] == 0) {
                                    echo "selected = 'selected'";
                                } ?>>拒绝登录
                            </option>
                        </select>
                    </td>
                    <td align="center">
                        <a href="javascript:void(0)" class="but" user_id="<?= $v['user_id'] ?>">
                            <input class="btn" value="保存" type="button">
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
    </div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>

    //保存修改
    $(".but").click(function () {
        var csrfToken = $('#_csrf').val();
        var id = $(this).attr('user_id');    //用户ID
        var val = $("#" + id + "").val();    //是否允许登录
        $.ajax({
            type: 'GET',
            timeout: '5000',
            url: "<?=Url::to(['admin/user/upuser']) ?>",
            data: "id=" + id + "&val=" + val + "&_csrf=" + csrfToken,
            async: true,
            success: function (msg) {
                if (msg == 1) {
                    alert("修改成功")
                    location.href = "<?=Url::to(['admin/user/user']) ?>";
                } else {
                    alert("修改失败")
                }
            }
        });
    })
</script>
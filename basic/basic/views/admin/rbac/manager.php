<?php
use yii\helpers\Url;
?>
 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>网站管理员</strong> </div>   <div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
    <h3><a href="<?=url::to(['admin/rbac/addadmin'])?>" class="actionBtn">添加管理员</a>网站管理员</h3>
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
     <tr>
      <th width="30" align="center">编号</th>
      <th align="left">管理员名称</th>
      <th align="center">E-mail地址</th>
      <th align="center">添加时间</th>
      <th align="center">最后登录时间</th>
      <th align="center">操作</th>
     </tr>
      <?php foreach($data as $key=>$val){ ?>
      <tr>
      <td align="center"><?=$val['admin_id']?></td>
      <td><?=$val['username']?></td>
      <td align="center"><?=$val['email']?></td>
      <td align="center">2016-02-25</td>
      <td align="center">2016-02-26 20:53:17</td>
      <td align="center"><a href="<?=url::to(['admin/rbac/update','id'=>$val['admin_id']])?>">编辑</a> | <a href="javascript:void(0)" class="del" admin_id="<?=$val['admin_id']?>">删除</a></td>
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
            var admin_id = $(this).attr('admin_id');    //管理员ID
            var csrf = $('._csrf').val();
            var _this = $(this);
            if(confirm('确定删除此管理员，该操作不可恢复！')){
                $.post("<?=url::to(['admin/rbac/delete'])?>",{admin_id:admin_id,_csrf:csrf}, function (msg) {
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
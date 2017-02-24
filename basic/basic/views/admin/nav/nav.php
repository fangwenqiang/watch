<?php
use yii\helpers\Url;
?>
<meta name="csrf-token" content="<?= Yii::$app->request->csrfToken ?>">
<link href="css/public.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/global.js"></script>
<script type="text/javascript" src="js/jquery.tab.js"></script>
<div id="dcMain">
        <!-- 当前位置 -->
    <div id="urHere">DouPHP 管理中心<b>></b><strong>自定义导航栏</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="<?php echo Url::to(['admin/nav/add_nav']);?>" class="actionBtn">添加导航</a>自定义导航栏</h3>
        <script type="text/javascript">

            $(function(){ $(".idTabs").idTabs(); });

        </script>
        <div class="idTabs">
            <ul class="tab">
                <li><a href="#main">主导航</a></li>
                <li><a href="#display">顶部</a></li>
                <li><a href="#defined">底部</a></li>
            </ul>
            <div class="items">
                <div id="main">
                        <table width="100%" border="0" cellpadding="10" cellspacing="0" class="tableBasic">
                            <tr>
                                <th width="113" align="center">导航名称</th>
                                <th width="113" align="center">导航类型</th>
                                <th align="left">链接地址</th>
                                <th align="left">导航图标</th>
                                <th width="80" align="center">排序</th>
                                <th width="120" align="center">操作</th>
                            </tr>
                            <?php
                               foreach($data as $key=>$val) { if($val['nav_place'] == 1) { ?>
                                   <tr>
                                       <td><?php echo $val['nav_name']?></td>
                                       <td><?php
                                           switch($val['nav_type']){
                                               case 1;echo "一级导航";break;
                                               case 2;echo "二级导航";break;
                                               case 3;echo "三级导航";break;
                                           }
                                           ?></td>
                                       <td><?php echo $val['nav_link']?></td>
                                       <td><img src="<?php echo $val['nav_icon']?>"></td>
                                       <td align="center"><?php echo $val['nav_sort']?></td>
                                       <td align="center"><a href="<?php echo Url::toRoute(['admin/nav/nav_compile','id'=>$val['nav_id']]);?>">编辑</a> | <a href="javascript:void(0);" class="del" data-id="<?php echo $val['nav_id']?>" data-type="<?php echo $val['nav_type']?>">删除</a></td>
                                   </tr>
                             <?php  } } ?>
                        </table>
                    </div>
                    <div id="display">
                        <table width="100%" border="0" cellpadding="10" cellspacing="0" class="tableBasic">
                            <tr>
                                <th width="113" align="center">导航名称</th>
                                <th width="113">导航类型</th>
                                <th align="left">链接地址</th>
                                <th align="left">导航图标</th>
                                <th width="80" align="center">排序</th>
                                <th width="120" align="center">操作</th>
                            </tr>
                            <?php  foreach($data as $key=>$val) { if($val['nav_place'] == 2) { ?>
                                <tr>
                                    <td><?php echo $val['nav_name']?></td>
                                    <td><?php
                                        switch($val['nav_type']){
                                            case 1;echo "一级导航";break;
                                            case 2;echo "二级导航";break;
                                            case 3;echo "三级导航";break;
                                        }
                                        ?></td>
                                    <td><?php echo $val['nav_link']?></td>
                                    <td><img src="<?php echo $val['nav_icon']?>"></td>
                                    <td align="center"><?php echo $val['nav_sort']?></td>
                                    <td align="center"><a href="<?php echo Url::toRoute(['admin/nav/nav_compile','id'=>$val['nav_id']]);?>">编辑</a> | <a href="javascript:void(0);" class="del" data-id="<?php echo $val['nav_id']?>" data-type="<?php echo $val['nav_type']?>">删除</a></td>
                                </tr>
                            <?php  } } ?>
                        </table>
                    </div>
                    <div id="defined">
                        <table width="100%" border="0" cellpadding="10" cellspacing="0" class="tableBasic">
                            <tr>
                                <th width="113" align="center">导航名称</th>
                                <th width="113">导航类型</th>
                                <th align="left">链接地址</th>
                                <th align="left">导航图标</th>
                                <th width="80" align="center">排序</th>
                                <th width="120" align="center">操作</th>
                            </tr>
                            <?php
                            foreach($data as $key=>$val) { if($val['nav_place'] == 3) { ?>
                                <tr>
                                    <td><?php echo $val['nav_name']?></td>
                                    <td><?php
                                        switch($val['nav_type']){
                                            case 1;echo "一级导航";break;
                                            case 2;echo "二级导航";break;
                                            case 3;echo "三级导航";break;
                                        }
                                        ?></td>
                                    <td><?php echo $val['nav_link']?></td>
                                    <td><img src="<?php echo $val['nav_icon']?>"></td>
                                    <td align="center"><?php echo $val['nav_sort']?></td>
                                    <td align="center"><a href="<?php echo Url::toRoute(['admin/nav/nav_compile','id'=>$val['nav_id']]);?>">编辑</a> | <a href="javascript:void(0);" class="del" data-id="<?php echo $val['nav_id']?>" data-type="<?php echo $val['nav_type']?>">删除</a></td>
                                </tr>
                            <?php  } } ?>
                        </table>
                    </div>
                 </div>
            </div>
        </div>
    </div>
    </div>
<script>
    $(function(){
//        导航删除
       $('.del').click(function(){
           var id = $(this).data('id');
           var check = confirm('确定删除吗？');
           var csrfToken = $('meta[name="csrf-token"]').attr("content");
           var _this = $(this);
           if(!check){ return false;}
           $.ajax({
               url:"<?php echo Url::to(['admin/nav/nav_del'])?>",
               type:'post',
               data:"id="+id+"&_csrf="+csrfToken,
               success:function(msg){
                   if(msg == 1){
                       alert('删除成功');
                       _this.parent().parent().remove();
                   } else if(msg == -1){
                       alert('该该导航下有子级导航，禁止删除')
                   } else {
                       alert('删除失败');
                   }
               }
           });
       });
    });
</script>
<?php
use yii\helpers\Url;
?>
<meta name="csrf-token" content="<?= Yii::$app->request->csrfToken ?>">
<link href="css/public.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/global.js"></script>
<script type="text/javascript" src="js/jquery.tab.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<style>
    span.error
    {
        padding-left: 16px;
        padding-bottom: 2px;
        font-weight: bold;
        color: #EA5200;
    }
</style>
 <div id="dcMain">
        <!-- 当前位置 -->
        <div id="urHere">DouPHP 管理中心<b>></b><strong>自定义导航栏</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="<?php echo Url::to(['admin/nav/index']);?>" class="actionBtn">返回列表</a>自定义导航栏</h3>
            <div class="idTabs">
                <ul class="tab">
                    <li><a href="#nav_add">添加站内导航</a></li>
                </ul>
                <div class="items">
                    <div id="nav_add">
                        <form action="<?php echo Url::to(['admin/nav/add_nav']);?>" method="post" id="form">
                            <table width="100%" border="0" cellpadding="5" cellspacing="1" class="tableBasic">
                                <tr>
                                    <td width="80" height="35" align="right">导航位置</td>
                                    <td>
                                        <input type="radio" id="nav_place"  name="nav_place"  required value="1" size="40" class="inpMain" />主导航栏&nbsp;&nbsp;
                                        <input type="radio" id="nav_place" name="nav_place" value="2" size="1" class="inpMain" />顶部导航栏&nbsp;&nbsp;
                                        <input type="radio" id="nav_place" name="nav_place" value="3" size="2" class="inpMain" />底部导航栏&nbsp;&nbsp;
                                        <span class="errorInfo"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="80" height="35" align="right">所属类型</td>
                                    <td>
                                        <span id="select">
                                            <select id="nav_type" name="nav_type" style="width: 120px;">
                                                <option value="">请选择导航位置</option>
                                            </select>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="80" height="35" align="right">导航名称</td>
                                    <td>
                                        <input type="text" id="nav_name" name="nav_name"  required value="" placeholder="请输入导航名称" size="40" class="inpMain" />
                                        <span class="errorInfo"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="80" height="35" align="right">导航链接</td>
                                    <td>
                                        <input type="text" id="nav_link" name="nav_link" required value="" placeholder="请输入导航链接:模板名/控制器/方法名" size="40" class="inpMain" />
                                        <span class="errorInfo"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="35" align="right">排序</td>
                                    <td>
                                        <input type="text" name="nav_sort"  size="5" required class="inpMain" placeholder="请输入排序"/>
                                        <span class="errorInfo"></span>
                                    </td>
                                </tr>
<!--                                <tr>-->
<!--                                    <td width="80" height="35" align="right">导航图标</td>-->
<!--                                    <td>-->
<!--                                        <input type="file" id="nav_icon" name="nav_icon" required data-rule-icon="true" value="" size="40" class="inpMain" />-->
<!--                                        <span class="errorInfo"></span>-->
<!--                                    </td>-->
<!--                                </tr>-->
                                <tr>
                                    <td></td>
                                    <td>
                                        <input name="_csrf" type="hidden" id="_csrf" value="<?= \Yii::$app->request->csrfToken ?>">
                                        <input name="submit" class="btn" type="submit" value="提交" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">

    $(function() {
        $(".idTabs").idTabs();

        //表单验证  -----   start
        $.validator.setDefaults({
            errorElement:'span',
            errorPlacement: function(error, element){
                error.appendTo(element.parent().find(".errorInfo"));
            }
        });

        jQuery.validator.addMethod("icon", function (value, element) {
            var chinese = /.(gif|jpg|jpeg|png|gif|jpg|png)$/i;
            return this.optional(element) || (chinese.test(value));
        }, "请正确选择图片");

        $("#form").validate({
            submitHandler: function (form) {
                form.submit();
            },
            rules:{
                nav_type:{
                    required:true
                }
            },
            messages:{
                nav_type:{required:'请选择导航位置'},
                nav_name:{required:'不能为空'},
                nav_place:{required:'请选择'},
                nav_link:{required:'不能为空'},
                nav_sort:{required:'不能为空'}
            }
        });
        //表单验证  -----   end

        //选择导航事件  -----   start
        $("input[name='nav_place']").click(function(){
            var nav_place = $(this).val();
            var csrfToken = $('meta[name="csrf-token"]').attr("content");
            $.ajax({
               url:"<?php echo Url::to(['admin/nav/nav_data'])?>",
               type:'post',
               data:"nav_place="+nav_place+"&_csrf="+csrfToken,
               dataType:'json',
               success:function(msg){
                   var html = '<select id="nav_type" name="nav_type" style="width: 120px;;"><option value="0">一级导航</option>';
                   if(msg.length != 0){
                       $.each(msg,function(k,v){
                           html += "<option value='"+ v.nav_id+"'";
                           if((v.depath.split('-').length-2) == 2){ html += "disabled"; }
                           html += ">";
                           var str='';
                           for(var i=0;i<v.depath.split('-').length-2;i++){ str += "---"; }
                           html += str+v.nav_name+"</option>"
                       })
                   } else {
                       html += "<option disabled>暂无，请添加</option>"
                   }
                   html += "</select>";
                   $('#select').html(html);
               }
            });
        });
        //选择导航事件  -----   end
    });

</script>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>DouPHP 管理中心 - 首页幻灯广告 </title>
<meta name="Copyright" content="Douco Design." />
<link href="css/public.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/global.js"></script>
</head>
<body>
<div id="dcWrap">
    <div id="dcMain">
   <!-- 当前位置 -->
     <div id="urHere">DouPHP 管理中心<b>></b><strong>首页轮播图</strong> </div>
     <div class="mainBox imgModule">
         <h3>首页轮播图</h3>
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
            <tr>
                <th>添加幻灯</th>
                <th>幻灯列表</th>
            </tr>
            <tr>
                <?php $form = yii\widgets\ActiveForm::begin(['method'=>'post','options' => ['enctype' => 'multipart/form-data'],'id'=>'carousel']) ?>
                <td width="350" valign="top">
                <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableOnebor">
                    <tr>
                        <td><b>轮播图</b>
                            <?= $form->field($carousel, 'image',['labelOptions' => ['label' => '']])->fileInput(['class'=>'inpFlie']) ?><font color="#ff4b33" id="imgError"></font>
                        </td>
                    </tr>
                    <tr>
                        <td><b>排序</b>
                            <?=$form->field($carousel,'sort',['labelOptions' => ['label' => '']])->textInput(['class'=>'inpMain','id'=>'sort','name'=>'sort'])?><font color="#ff4b33" id="sortError"></font>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php $carousel->is_show = 1;?><?=yii\helpers\Html::activeCheckbox($carousel, 'is_show', ['class' => 'inpMain','label'=>'是否显示','name'=>'is_show','id'=>'is_show','checked'=>'checked'])?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?= yii\helpers\Html::submitButton('上传', ['class' => 'btn']) ?>
                        </td>
                    </tr>
                </table>
            </td>
                <?php  yii\widgets\ActiveForm::end() ?>
            <td valign="top">
                <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableOnebor">
                    <tr>
                        <td width="100">幻灯名称</td>
                        <td></td>
                        <td width="50" align="center">排序</td>
                        <td width="80" align="center">操作</td>
                    </tr>
                    <tr>
                        <td><a href="#" target="_blank"><img src="" width="100" /></a></td>
                        <td>广告图片04</td>
                        <td align="center">4</td>
                        <td align="center"><a href="editshow.html?id=4">编辑</a> | <a href="delshow.htmlid=4">删除</a></td>
                    </tr>
                </table>
            </td>
        </tr>
        </table>
     </div>
    </div>
    <div class="clear"></div>
    <div class="clear"></div>
</div>
<script type="text/javascript" src="js/jquery.carousel.js"></script>
</body>
</html>
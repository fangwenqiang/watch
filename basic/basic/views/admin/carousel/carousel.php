
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>DouPHP 管理中心 - 轮播图管理 </title>
<meta name="Copyright" content="Douco Design." />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery.carousel.js"></script>
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
                <th align="center">添加轮播图</th>
                <th align="center">轮播图列表</th>
            </tr>
            <tr>
                <?php $form = yii\widgets\ActiveForm::begin(['method'=>'post','options' => ['enctype' => 'multipart/form-data'],'id'=>'carousel']) ?>
                <td width="350" valign="top"><br>
                    <table width="100%"  class="tableOnebor">

                        <tr>
                            <td>
                                <?= $form->field($carousel, 'image',['labelOptions' => ['label' => '选择图片']])->fileInput(['class'=>'inpFlie']) ?><font color="#ff4b33" id="imgError"></font>
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 80px;">
                                <?=$form->field($carousel,'sort',['labelOptions' => ['label' => '排序：']])->textInput(['class'=>'inpMain','id'=>'sort','name'=>'sort'])?><font color="#ff4b33" id="sortError"></font>
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 80px;" >
                                <?php $carousel->is_show = 1;?><?=yii\helpers\Html::activeCheckbox($carousel, 'is_show', ['class' => 'inpMain','label'=>'是否显示','name'=>'is_show','id'=>'is_show','checked'=>'checked'])?>
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 80px;">
                                <?= yii\helpers\Html::submitButton('上传', ['class' => 'btn']) ?>
                            </td>
                        </tr>
                    </table>
                </td>
                <?php  yii\widgets\ActiveForm::end() ?>
                <td valign="top">
                    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableOnebor" id="list">
                    <tr>
                        <td width="10" align="center">#</td>
                        <td width="100" align="center">轮播图</td>
                        <td width="50" align="center">路径</td>
                        <td width="80" align="center">是否显示</td>
                        <td width="80" align="center"><?= \yii\helpers\Html::a('排序', ['admin/carousel/index', 'sortStatus' => 1], ['title' => '点击排序','style'=>'color:blue;']) ?></td>
                        <td width="80" align="center">操作</td>
                    </tr>
                    <?php foreach ($data as $k => $v): ?>
                    <tr id="<?=$v['carousel_id']?>">
                        <td align="center"><?= $v['carousel_id'] ?></td>
                        <td align="center"><img src="<?= 'http://'.$_SERVER['SERVER_NAME'].'/'.$v['thumb'] ?>" alt="轮播图"></td>
                        <td align="center"><?= $v['thumb'] ?></td>
                        <td align="center">
                            <span class="sve" hid="<?=$v['carousel_id']?>" field="is_show" title="点击编辑">
                                <?php if($v['is_show']==1) echo '是';else echo '否'; ?>
                            </span>
                        </td>
                        <td align="center">
                            <span class="sve" hid="<?=$v['carousel_id']?>" field="sort" title="点击编辑">
                                <?= $v['sort'] ?>
                            </span>
                        </td>
                        <td align="center">
                            <span style="cursor: pointer;" title="删除" class="new_type_del" did="<?=$v['carousel_id']?>">
                                <a href="javascript:void(0)">删除</a>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </table>
                    <div class="pager"><?=yii\widgets\LinkPager::widget(['pagination' => $page])?></div>
                </td>
            </tr>
        </table>
     </div>
    </div>
    <div class="clear"></div>
    <div class="clear"></div>
</div>
<script>
    $(function () {
        url = "<?=\yii\helpers\Url::toRoute(['admin/carousel'])?>";
        csrf = $('input[name=_csrf]').val();
    });
</script>
</body>
</html>


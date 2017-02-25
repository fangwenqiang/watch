<?php
use yii\helpers\Url;

?>
<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DouPHP 管理中心</title>
    <meta name="Copyright" content="Douco Design."/>
    <base href="<?php echo Url::to('@web/public/admin/') ?>">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <link href="css/public.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/global.js"></script>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div id="dcWrap">
    <div id="dcHead">
        <div id="head">
            <div class="logo"><a href="index.html"><img src="images/dclogo.gif" alt="logo"></a></div>
            <div class="nav">
                <ul>
                    <li class="M"><a href="JavaScript:void(0);" class="topAdd">新建</a>
                        <div class="drop mTopad"><a href="product.php?rec=add">商品</a> <a
                                href="article.php?rec=add">文章</a> <a href="nav.php?rec=add">自定义导航</a> <a
                                href="show.html">首页幻灯</a> <a href="page.php?rec=add">单页面</a> <a
                                href="manager.php?rec=add">管理员</a> <a href="link.html"></a></div>
                    </li>
                    <li><a href="../index.php" target="_blank">查看站点</a></li>
                    <li><a href="index.php?rec=clear_cache">清除缓存</a></li>
                    <li><a href="http://help.douco.com" target="_blank">帮助</a></li>
                    <li class="noRight"><a href="module.html">DouPHP+</a></li>
                </ul>
                <ul class="navRight">
                    <li class="M noLeft"><a href="JavaScript:void(0);">
                            欢迎:<?php
                            $session = \Yii::$app->session;
                            $user = $session->get('user');
                            echo "$user";
                            ?>
                        </a>
                        <div class="drop mUser">
                            <a href="manager.php?rec=edit&id=1">编辑我的个人资料</a>
                            <a href="manager.php?rec=cloud_account">设置云账户</a>
                        </div>
                    </li>
                    <li class="noRight" id="out"><a href="JavaScript:">退出</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- dcHead 结束 -->
    <div id="dcLeft">
        <div id="menu">
            <ul class="top">
                <li><a href="<?php echo Url::to(['admin/index/index']);?>"><i class="home"></i><em>管理首页</em></a></li>
            </ul>
            <ul>
                <li class="gao"><a href="javascript:void(0)"><i class="system"></i><em>系统设置</em></a></li>
                <ul style="display:none">
                    <li><a href="<?php echo Url::to(['admin/system/index']);?>"><i class="article"></i><em>设置</em></a></li>
                </ul>
            </ul>
            <ul>
                <li class="gao"><a href="javascript:void(0)"><i class="system"></i><em>导航管理</em></a></li>
                <ul style="display:none">
                    <li><a href="<?php echo Url::to(['admin/nav/index']);?>"><i class="article"></i><em>导航列表</em></a></li>
                </ul>
            </ul>
            <ul>
                <li class="gao"><a href="javascript:void(0)"><i class="mobile"></i><em>首页设置</em></a></li>
                <ul style="display:none">
                    <li><a href="<?=\yii\helpers\Url::to(['admin/carousel/index'])?>"><i class="article"></i><em>轮播图</em></a></li>
                </ul>
            </ul>
            <ul>
                <li class="gao"><a href="javascript:void(0)"><i class="manager"></i><em>用户管理</em></a></li>
                <ul style="display:none">
                    <li><a href="nav.html"><i class="nav"></i><em>用户列表</em></a></li>
                </ul>
            </ul>
            <ul>
                <li class="gao"><a href="javascript:void(0)"><i class="productCat"></i><em>权限管理</em></a></li>
                <ul style="display:none">
                    <li><a href="<?=url::to(['admin/rbac/admin'])?>"><i class="product"></i><em>管理员</em></a></li>
                    <li><a href="<?=url::to(['admin/rbac/role'])?>"><i class="product"></i><em>角色</em></a></li>
                    <li><a href="<?=url::to(['admin/rbac/node'])?>"><i class="product"></i><em>权限</em></a></li>
                </ul>
            </ul>
            <ul>
                <li class="gao"><a href="javascript:void(0)"><i class="articleCat"></i><em>商品管理</em></a></li>
                <ul style="display:none">
                    <li><a href="<?php echo Url::to(['admin/goods/index'])?>"><i class="article"></i><em>商品展示</em></a></li>
                </ul>
            </ul>
            <ul>
                <li class="gao"><a href="javascript:void(0)"><i class="articleCat"></i><em>品牌管理</em></a></li>
                <ul style="display:none">
                    <li><a href="<?php echo Url::to(['admin/brand/list'])?>"><i class="article"></i><em>品牌展示</em></a></li>
                    <li><a href="<?php echo Url::to(['admin/brand/add'])?>"><i class="article"></i><em>品牌添加</em></a></li>
                </ul>
            </ul>
            <ul>
                <li class="gao"><a href="javascript:void(0)"><i class="articleCat"></i><em>商品分类管理</em></a></li>
                <ul style="display:none">
                    <li><a href="<?php echo Url::to(['admin/category/list'])?>"><i class="article"></i><em>分类展示</em></a></li>
                    <li><a href="<?php echo Url::to(['admin/category/add'])?>"><i class="article"></i><em>分类添加</em></a></li>
                </ul>
            </ul>
            <ul>
                <li class="gao"><a href="javascript:void(0)"><i class="articleCat"></i><em>商品类型管理</em></a></li>
                <ul style="display:none">
                    <li><a href="<?= \yii\helpers\Url::toRoute(['admin/goodstype/add']);?>"><i class="article"></i><em>添加</em></a></li>
                    <li><a href="<?= \yii\helpers\Url::toRoute(['admin/goodstype/show']);?>"><i class="article"></i><em>展示</em></a></li>
                </ul>
            </ul>
            <ul>
                <li class="gao"><a href="javascript:void(0)"><i class="backup"></i><em>订单管理</em></a></li>
                <ul style="display:none">
                    <li><a href="article.html"><i class="article"></i><em>订单列表</em></a></li>
                </ul>
            </ul>
            <ul>
                <li class="gao"><a href="javascript:void(0)"><i class="manager"></i><em>操作记录</em></a></li>
                <ul style="display:none">
                    <li><a href="<?php echo Url::to(['admin/log/index']);?>"><i class="article"></i><em>记录</em></a></li>
                </ul>
            </ul>
        </div>
    </div>
    <?= $content ?>
    <div class="clear"></div>
    <div id="dcFooter">
        <div id="footer">
            <div class="line"></div>
            <ul>
                版权所有 © 2013-2015 漳州豆壳网络科技有限公司，并保留所有权利。
            </ul>
        </div>
    </div><!-- dcFooter 结束 -->
    <div class="clear"></div>
</div>
</body>
</html>


<script>
    $('#out').click(function () {
        $.ajax({
            url: "<?=Url::to(['admin/login/logout']) ?>",
            success: function (msg) {
                if (msg == 0) {
                    alert("退出登录失败");
                } else {
                    alert("退出登录成功");
                    location.href = "<?=Url::to(['admin/login/login']) ?>";
                }
            }
        });
    })
    $(function(){
      $.easing.def = 'easeOutElastic';
      var oBtn = $('.gao');
      oBtn.click(function(){
        $(this).next('ul').slideToggle().siblings('ul').slideUp();
      });
    });
</script>
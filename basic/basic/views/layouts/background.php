<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DouPHP 管理中心</title>
    <meta name="Copyright" content="Douco Design." />
    <base href="<?php echo Url::to('@web/public/admin/')?>">
    <link href="css/public.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/global.js"></script>
</head>
<body>
<div id="dcWrap"> <div id="dcHead">
        <div id="head">
            <div class="logo"><a href="index.html"><img src="images/dclogo.gif" alt="logo"></a></div>
            <div class="nav">
                <ul>
                    <li class="M"><a href="JavaScript:void(0);" class="topAdd">新建</a>
                        <div class="drop mTopad"><a href="product.php?rec=add">商品</a> <a href="article.php?rec=add">文章</a> <a href="nav.php?rec=add">自定义导航</a> <a href="show.html">首页幻灯</a> <a href="page.php?rec=add">单页面</a> <a href="manager.php?rec=add">管理员</a> <a href="link.html"></a> </div>
                    </li>
                    <li><a href="../index.php" target="_blank">查看站点</a></li>
                    <li><a href="index.php?rec=clear_cache">清除缓存</a></li>
                    <li><a href="http://help.douco.com" target="_blank">帮助</a></li>
                    <li class="noRight"><a href="module.html">DouPHP+</a></li>
                </ul>
                <ul class="navRight">
                    <li class="M noLeft"><a href="JavaScript:void(0);">您好，admin</a>
                        <div class="drop mUser">
                            <a href="manager.php?rec=edit&id=1">编辑我的个人资料</a>
                            <a href="manager.php?rec=cloud_account">设置云账户</a>
                        </div>
                    </li>
                    <li class="noRight"><a href="login.php?rec=logout">退出</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- dcHead 结束 --> <div id="dcLeft"><div id="menu">
            <ul class="top">
                <li><a href="index.html"><i class="home"></i><em>管理首页</em></a></li>
            </ul>
            <ul>
                <li><a href="article_category.html"><i class="system"></i><em>系统设置</em></a></li>
                <li><a href="article.html"><i class="article"></i><em>子栏</em></a></li>
            </ul>
            <ul>
                <li><a href="article_category.html"><i class="mobile"></i><em>首页设置</em></a></li>
                <li><a href="article.html"><i class="article"></i><em>轮播图</em></a></li>
                <li><a href="article.html"><i class="article"></i><em>导航栏</em></a></li>
            </ul>
            <ul>
                <li><a href="system.html"><i class="manager"></i><em>用户管理</em></a></li>
                <li><a href="nav.html"><i class="nav"></i><em>子栏</em></a></li>
            </ul>
            <ul>
                <li><a href="product_category.html"><i class="productCat"></i><em>权限管理</em></a></li>
                <li><a href="product.html"><i class="product"></i><em>子栏</em></a></li>
            </ul>
            <ul>
                <li><a href="article_category.html"><i class="articleCat"></i><em>商品管理</em></a></li>
                <li><a href="article.html"><i class="article"></i><em>子栏</em></a></li>
            </ul>
            <ul>
                <li><a href="article_category.html"><i class="articleCat"></i><em>品牌管理</em></a></li>
                <li><a href="article.html"><i class="article"></i><em>子栏</em></a></li>
            </ul>
            <ul>
                <li><a href="article_category.html"><i class="articleCat"></i><em>商品分类管理</em></a></li>
                <li><a href="article.html"><i class="article"></i><em>子栏</em></a></li>
            </ul>
            <ul>
                <li><a href="article_category.html"><i class="articleCat"></i><em>商品类型管理</em></a></li>
                <li><a href="article.html"><i class="article"></i><em>子栏</em></a></li>
            </ul>
            <ul>
                <li><a href="article_category.html"><i class="backup"></i><em>订单管理</em></a></li>
                <li><a href="article.html"><i class="article"></i><em>子栏</em></a></li>
            </ul>
            <ul>
                <li><a href="article_category.html"><i class="manager"></i><em>操作记录</em></a></li>
                <li><a href="article.html"><i class="article"></i><em>子栏</em></a></li>
            </ul>
        </div>
    </div>
    <?=$content?>
    <div class="clear"></div>
    <div id="dcFooter">
        <div id="footer">
            <div class="line"></div>
            <ul>
                版权所有 © 2013-2015 漳州豆壳网络科技有限公司，并保留所有权利。
            </ul>
        </div>
    </div><!-- dcFooter 结束 -->
    <div class="clear"></div> </div>
</body>
</html>
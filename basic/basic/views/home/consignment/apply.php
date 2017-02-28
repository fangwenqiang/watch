<?php
use yii\helpers\Url;
?>
<meta name="csrf-token" content="<?= Yii::$app->request->csrfToken ?>">
<!-- End header -->
<link rel="stylesheet" href="css/index.css" type="text/css" media="screen, projection" />
<link href="css/jimai.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.validate.js"></script>
<style>
    .errorInfo{font-weight: bold;color: red}
</style>
<!--index banner start-->
<div class="jimai_box">
    <div class="jimai_slider">
        <div class="mtsBanner" id="mtsBanner">
            <ul class="bannerWrap">
                <img src="images/banner2.jpg" />
            </ul>
        </div>
    </div>
    <div class="nav_box">
        <div class="jnav" id="fixed">
            <ul class="clearfix">
                <li><a class="aStyle navBtn01" href="#">什么是寄卖</a></li>
                <li><a class="aStyle navBtn02" href="#">寄卖的方式与流程</a></li>
                <li>
                    <a class="aStyle navBtn02" href="<?php echo URL::to(['home/consignment/index'])?>">寄卖铺</a>

                </li>
                <li><a class="aStyle navBtn03" href="#">我的寄卖</a></li>
                <li class="anotherBtn">
                    <a style="display:block; width:163px; height:44px;" href="<?php echo Url::to(['home/consignment/apply'])?> target="_blank"><div class="nav_btn01">
                        <p class="clearfix">
                            <span class="t1 pngfix"></span>&nbsp;立即寄卖
                        </p>
                    </div>
                    </a>

                </li>
                <li class="anotherBtn">
                    <a class="aStyle navBtn02" href="#">寄卖咨询</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="content_box" id="floor">
        <div class="jimai_list01 bgcolor01">
            <!---在线寄卖开始---->
            <div class="J_list">
                <form action="<?php echo Url::to(['home/consignment/add'])?>" method="post" id="form" enctype="multipart/form-data">
                <div class="JcontentBox">

                    <div class="list02" style="margin-left: 100px;">
                        <div class="JcList"  >
                            <ul>
                                <li class="clearfixwatch">
                                    <div class="jclistleft fl"><span>*</span>手表名称：</div>
                                    <div class="jclistDown fl">
                                        <input id="author" name="author" required type="text" title="手表名称" class="jclistDownCon" />
                                        <span class="errorInfo"></span>
                                    </div>
                                </li>
                                <li class="clearfixwatch">
                                    <div class="jclistleft fl"><span>*</span>手表品牌：</div>
                                    <div class="jclistDown fl">
                                        <input id="g_brand" name="g_brand" required type="text" title="手表型号" class="jclistDownCon" />
                                        <span class="errorInfo"></span>
                                    </div>
                                </li>
                                <li class="clearfixwatch">
                                    <div class="jclistleft fl"><span>*</span>手表图片：</div>
                                    <div class="jclistDown fl">
                                        <div id="uf" style="width: 40%; display: none"></div>
                                        <img id="img" style="width: 100px; height: 100px; display: none" />
                                        <input runat="server" id="g_img" name="g_img" required data-rule-image="true" type="file" class="jclistDownCon" />
                                        <span class="errorInfo"></span>
                                    </div>
                                </li>
                                <li class="clearfixwatch">
                                    <div class="jclistleft fl"><span>*</span>销售价：</div>
                                    <div class="jclistDown fl">
                                        <input id="shop_price" name="shop_price" required  type="text" title="销售价" class="jclistDownCon" onblur="checkmoney(this)" />
                                        <span class="errorInfo"></span>
                                    </div>
                                </li>
                                <li class="clearfixwatch">
                                    <div class="jclistleft fl"><span>*</span>其他要求：</div>
                                    <div class="jclistDown fl">
                                        <textarea id="describe" name="describe" cols="20" rows="2"  class="jclistDownCon" style=" height:100px;"></textarea>
                                        <span class="errorInfo"></span>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="list02" style="margin-left: 200px;">
                        <div class="xuke">
                            <input id="checkAgree" runat="server" type="checkbox" checked="checked"/>我已阅读同意<a href="Agreement.aspx?pid=49" target="_blank">《喜悦手表在线收货协议》</a>，如需帮助请致电贵宾专线400-658-6659
                        </div>
                        <div class="jSubmit">
                            <input name="_csrf" type="hidden" id="_csrf" value="<?= \Yii::$app->request->csrfToken ?>">
                            <input id="Submit1" type="submit" value="提交信息" class="tjBtn"/>
                        </div>
                    </div>

                </div>
                </form>
            </div>
            <!---在线寄卖结束---->
            <div class="mask"></div>
        </div>
    </div>
</div>
<script>
    $(function() {
        //表单验证  -----   start
        $.validator.setDefaults({
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.appendTo(element.parent().find(".errorInfo"));
            }
        });
        jQuery.validator.addMethod("image", function (value, element) {
            var chinese = /.(gif|jpg|jpeg|png|gif|jpg|png)$/i;
            return this.optional(element) || (chinese.test(value));
        }, "请正确选择图片");



        $("#form").validate({
            submitHandler: function (form) {
                form.submit();
            },
            rules: {
            },
            messages: {
                author: {required: '不能为空'},
                g_brand: {required: '不能为空'},
                g_img: {required: '请选择图片'},
                shop_price: {required: '不能为空'}
            }
        });

    });
</script>


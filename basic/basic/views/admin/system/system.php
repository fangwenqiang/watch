<?php
use yii\helpers\Url;
?>
    <link href="css/public.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/global.js"></script>
    <script type="text/javascript" src="js/jquery.tab.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <style>
        .errorInfo{font-weight: bold;color: red}
    </style>
    <div id="dcMain">
        <!-- 当前位置 -->
        <div id="urHere">DouPHP 管理中心<b>></b><strong>系统设置</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3>系统设置</h3>
            <script type="text/javascript">

                $(function(){ $(".idTabs").idTabs(); });

            </script>
            <div class="idTabs">
                <ul class="tab">
                    <li><a href="#main">常规设置</a></li>
                </ul>
                <div class="items">
                    <form action="<?php echo Url::to(['admin/system/index'])?>" method="post" enctype="multipart/form-data" id="form">
                        <div id="main">
                            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                                <tr>
                                    <th width="131">名称</th>
                                    <th>内容</th>
                                </tr>
                                <tr>
                                    <td align="right">网站名称</td>
                                    <td>
                                        <input type="text" name="site_name" value="<?php if($data['code'] == 1){ echo $data['msg']['site_name'];}?>" size="80" class="inpMain" required/>
                                        <span class="errorInfo"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">网站标题</td>
                                    <td>
                                        <input type="text" name="site_title" value="<?php if($data['code'] == 1){ echo $data['msg']['site_title'];}?>" size="80" class="inpMain" required/>
                                        <span class="errorInfo"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">站点关键字</td>
                                    <td>
                                        <input type="text" name="site_keywords" value="<?php if($data['code'] == 1){ echo $data['msg']['site_keywords'];}?>" size="80" class="inpMain" required />
                                        <span class="errorInfo"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">站点描述</td>
                                    <td>
                                        <input type="text" name="site_description" value="<?php if($data['code'] == 1){ echo $data['msg']['site_description'];}?>" size="80" class="inpMain" required/>
                                        <span class="errorInfo"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">LOGO</td>
                                    <td>

                                        <input type="file" name="site_logo" id="site_logo" size="18" required data-rule-logo="true"/>
                                        <a href="../theme/default/images/logo.gif" target="_blank"></a>

                                        <a href="javascript:void(0)" onMouseOut="hideImg()"  onmouseover="showImg()">
                                            <img src="../../upload_files/logo_cdk.gif" id="image">
                                        </a>
                                        <div id="wxImg" style="display:none;back-ground:#f00;position:absolute;top: 20px;">
                                            <img src="../../upload_files/logo.gif" id="image">
                                        </div>

                                        <span class="errorInfo"></span>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td align="right">公司地址</td>
                                    <td>
                                        <input type="text" name="site_address" value="<?php if($data['code'] == 1){ echo $data['msg']['site_address'];}?>" size="80" class="inpMain" required/>
                                        <span class="errorInfo"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">是否关闭网站</td>
                                    <td>
                                        <input type="radio" id="site_closed"  name="site_closed"  required value="-1" size="40" class="inpMain" <?php if($data['code'] == 1 && $data['msg']['site_closed'] == -1){ echo "checked";}?>/>否&nbsp;&nbsp;
                                        <input type="radio" id="site_closed" name="site_closed" value="1" size="1" class="inpMain" <?php if($data['code'] == 1 && $data['msg']['site_closed'] == 1){ echo "checked";}?>/>是&nbsp;&nbsp;
                                        <span class="errorInfo"></span>
                                    </td>

                                </tr>
                                <tr>
                                    <td align="right">ICP备案证书号</td>
                                    <td>
                                        <input type="text" name="icp"  size="80" value="<?php if($data['code'] == 1){ echo $data['msg']['icp'];}?>" class="inpMain" required/>
                                        <span class="errorInfo"></span>
                                    </td>

                                </tr>
                                <tr>
                                    <td align="right">服务热线</td>
                                    <td>
                                        <input type="text" name="tel" value="<?php if($data['code'] == 1){ echo $data['msg']['tel'];}?>" size="80" class="inpMain" required/>
                                        <span class="errorInfo"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">传真</td>
                                    <td>
                                        <input type="text" name="fax" value="<?php if($data['code'] == 1){ echo $data['msg']['fax'];}?>" size="80" class="inpMain" required/>
                                        <span class="errorInfo"></span>
                                    </td>

                                </tr>
                                <tr>
                                    <td align="right">客服QQ号码</td>
                                    <td>
                                        <input type="text" name="qq" value="<?php if($data['code'] == 1){ echo $data['msg']['qq'];}?>" size="80" class="inpMain" required/>
                                        <span class="errorInfo"></span>
                                        <p class="cue">多个客服的QQ号码请以半角逗号（,）分隔，如果需要设定昵称则在号码后跟 /昵称。</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">邮件地址</td>
                                    <td>
                                        <input type="text" name="email" value="<?php if($data['code'] == 1){ echo $data['msg']['email'];}?>" size="80" class="inpMain" required/>
                                        <span class="errorInfo"></span>

                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">系统语言</td>
                                    <td>
                                        <select name="language" >
                                            <option value="-1" <?php if($data['code'] == 1 && $data['msg']['language'] == -1){ echo "selected";}?>>en_us</option>
                                            <option value="1" <?php if($data['code'] == 1 && $data['msg']['language'] == 1){ echo "selected";}?>>zh_cn</option>
                                        </select>
                                        <span class="errorInfo"></span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                            <tr>
                                <td width="131"></td>
                                <td>
                                    <input name="_csrf" type="hidden" id="_csrf" value="<?= \Yii::$app->request->csrfToken ?>">
                                    <input type="hidden" name="token" value="24760807" />
                                    <input name="submit" class="btn" type="submit" value="提交" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script>
    $(function() {
        $(".idTabs").idTabs();
        //表单验证  -----   start
        $.validator.setDefaults({
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.appendTo(element.parent().find(".errorInfo"));
            }
        });

        jQuery.validator.addMethod("logo", function (value, element) {
            var chinese = /.(gif|jpg|jpeg|png|gif|jpg|png)$/i;
            return this.optional(element) || (chinese.test(value));
        }, "请正确选择图片");

        $("#form").validate({
            submitHandler: function (form) {
                form.submit();
            },
            rules: {
                language:{
                    required:true
                }
            },
            messages: {
                site_name: {required: '不能为空'},
                site_title: {required: '不能为空'},
                site_keywords: {required: '不能为空'},
                site_description: {required: '不能为空'},
                site_logo: {required: '请选择文件'},
                site_closed: {required: '不能为空'},
                site_address: {required: '不能为空'},
                icp: {required: '不能为空'},
                tel: {required: '不能为空'},
                fax: {required: '不能为空'},
                email: {required: '不能为空'},
                language: {required: '不能为空'}

            }
        });
    });

    function  showImg(){
        document.getElementById("wxImg").style.display='block';
    }
    function hideImg(){
        document.getElementById("wxImg").style.display='none';
    }
</script>
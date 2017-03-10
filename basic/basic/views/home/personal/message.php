<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<script src="js/jquery.js"></script>
<div id="main">
    <div class="position">
        <a href="<?php echo Url::to(['home/index/index'])?>">
            <strong>首页</strong>
        </a>
        <i>&gt;</i>
        <a href="<?php echo Url::to(['home/personal/index'])?>" target="_blank" class="c0e7">
            我的喜悦手表
        </a>
        <i>&gt;</i>
        <span>最近访问</span>
    </div>
<div class="rightArea">
    <div style="background-color:#FEFFD0;border:1px solid #FF8E46;color:#FF3300;height:22px;line-height:22px;margin-bottom:15px;padding:8px 12px;position:relative;">
        <p>您的邮箱还未激活验证，激活验证邮箱后将立即赠送500积分！<a href="/profile/sendemail/" class="activate" style="position:absolute;top:7px;" rel="nofollow"><img src="//qd2.wbiao.co/img/4.0/user/activate.png" alt="马上验证" /></a></p>
    </div>
    <div class="prompt">
        <div class="pr_top">
            <b class="tit">个人资料</b>
        </div>
        <div class="pr_middle_02">
            <i class="u__horn" style="margin-right:6px;"></i>请完善您的个人信息，万表网会对您的个人资料隐私加以保密。(带
            <font class="cb01" style="margin:0 3px;">*</font>号的项目为必填项)
            <br />
            <i class="u__horn" style="margin:8px 6px 0 0;"></i>您填写完整，并完成手机验证的积分已经发送&nbsp;&nbsp;
            <a class="c0e7" href="https://user.wbiao.cn/points">点击查看</a>
        </div>
    </div>
    <div class="clear"></div>
    <div class="basicInfo">
        <form name="user_form" id="user_form" action="/profile/all" method="post">
            <div class="bi_top">
                <div class="bi_tit">
                    基本信息
                </div>
            </div>
            <div class="bi_middle">
                <div class="portrait">
                    <img id="user_head_img" style="width:130px;height:130px;" src="https://image2.wbiao.co/others/user/head/default.jpg?t=1489116766" />
                    <a id="setting_head_img" href="/index/setting_head_pop" style="display:none;" class="fancybox.iframe">&nbsp;</a>
                    <span class="c0e7" style="cursor:pointer;display:block;margin-top:10px;" onclick="javascript:$('#setting_head_img').click()">[修改头像]</span>
                </div>
                <ul>
                    <li><span class="left">会员账号：</span>
                        <div class="right">
                            <span class="user_name_s1" style="display:none;"><input type="text" id="user_name" name="user_name" maxlength="15" value="a1228289802" class="txt w150" /><a href="javascript:" class="c0e7 ml10">确定</a></span>
                            <span class="user_name_s2"><font class="bold">a1228289802</font></span>
                            <span class="form_tips">4-20个不含特殊字符的组合</span>
                        </div></li>
                    <li><span class="left"><i class="bi_required">*</i>会员昵称：</span><span class="right"><input type="text" name="nick_name" maxlength="15" value="棾天" class="txt w150" /></span></li>
                    <li><span class="left"><i class="bi_required">*</i>性别：</span><span class="right"><label><input type="radio" name="sex" value="0" checked="checked" />保密</label><label><input type="radio" name="sex" value="1" />男</label><label><input type="radio" name="sex" value="2" />女</label></span></li>
                    <li><span class="left"><i class="bi_required"></i>手机号码：</span><span class="right"><font class="bold">18911518273&nbsp;</font><a href="/profile/sendmobile" class="c0e7 ml10">修改</a></span></li>
                    <li><span class="left">电子邮件：</span><span class="right"><font class="bold">qqU403643B7CF5440C4EF455C6ED23FE2A6@qq.com&nbsp;</font><a href="/profile/modify_email" class="c0e7 ml10">修改</a></span></li>
                    <li><span class="left">真实姓名：</span><span class="right"><input type="text" name="real_name" class="txt w150" maxlength="15" value="王喜文" /></span></li>
                    <li><span class="left">所在地：</span><span class="right">
           <div id="area">
               <input type="hidden" name="country_id" id="selCountries_" value="1" />
               <select class="bi_slt" name="province_id" id="province"><option value="0">请选择</option></select>&nbsp;
               <select class="bi_slt" name="city_id" id="city"><option value="0">请选择</option></select>&nbsp;
               <select class="bi_slt" name="county_id" id="county"><option value="0">请选择</option></select>
           </div></span></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="bi_middle_02">
                <div class="bi_tit_02">
                    详细信息
                </div>
                <div class="choice">
                    <ul>
                        <li><span class="left">生日：</span><span>1994-06-27</span></li>
                        <li><span class="left">赠送手表对象：</span><span class="right rel"><select name="give"><option value="0">--</option><option value="1" selected="selected">本人</option><option value="2">家人</option><option value="3">朋友</option><option value="4">客户</option></select></span></li>
                        <li><span class="left">获知万表网的途径：</span><span class="right rel"><select name="get_way"><option value="0">----</option><option value="0" selected="selected">其他</option><option value="1">网络搜索</option><option value="2">朋友推荐</option><option value="3">广告活动</option><option value="4">杂志媒体</option></select></span></li>
                        <li><span class="left">年龄区间：</span><span class="right rel"><select name="age"><option value="0">----</option><option value="1" selected="selected">25岁以下</option><option value="2">26-30岁</option><option value="3">31-35岁</option><option value="4">36-40岁</option><option value="5">41-45岁</option><option value="6">46-50岁</option><option value="7">50岁以上</option></select></span></li>
                        <li><span class="left">喜欢表款：</span><span class="right rel"><input name="favor_watch[]" type="checkbox" value="1" />商务&nbsp;&nbsp;<input name="favor_watch[]" type="checkbox" value="2" />正装&nbsp;&nbsp;<input name="favor_watch[]" type="checkbox" value="3" />休闲&nbsp;&nbsp;<input name="favor_watch[]" type="checkbox" value="4" />运动&nbsp;&nbsp;<input name="favor_watch[]" type="checkbox" value="5" checked="checked" />时尚&nbsp;&nbsp;</span></li>
                        <li><span class="left">购买原因：</span><span class="right rel"><input name="buy_reason[]" type="checkbox" value="1" checked="checked" />自用&nbsp;&nbsp;<input name="buy_reason[]" type="checkbox" value="2" />伴侣使用&nbsp;&nbsp;<input name="buy_reason[]" type="checkbox" value="3" />家人&nbsp;&nbsp;<input name="buy_reason[]" type="checkbox" value="4" />朋友礼物&nbsp;&nbsp;<input name="buy_reason[]" type="checkbox" value="5" />商务送礼&nbsp;&nbsp;<input name="buy_reason[]" type="checkbox" value="6" />收藏&nbsp;&nbsp;<input name="buy_reason[]" type="checkbox" value="7" />活动礼品&nbsp;&nbsp;</span></li>
                        <li><span class="left">兴趣爱好：</span><span class="right rel"><input name="interest[]" type="checkbox" value="0" checked="checked" />其他&nbsp;&nbsp;<input name="interest[]" type="checkbox" value="1" />旅游&nbsp;&nbsp;<input name="interest[]" type="checkbox" value="2" checked="checked" />阅读&nbsp;&nbsp;<input name="interest[]" type="checkbox" value="3" />美食&nbsp;&nbsp;<input name="interest[]" type="checkbox" value="4" />养生&nbsp;&nbsp;<input name="interest[]" type="checkbox" value="5" />收藏&nbsp;&nbsp;</span></li>
                        <li><span class="left">&nbsp;</span><span class="right"><input type="submit" value="提交" class="sbt" /></span></li>
                    </ul>
                </div>
            </div>
        </form>
    </div></div>
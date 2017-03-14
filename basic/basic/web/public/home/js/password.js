/**
 * Created by 她说他叫强哥 on 2017/3/2.
 */
/**
 * 重置密码验证
 */
$(function () {
    //手机验证规则
    jQuery.validator.addMethod("mobile", function (value, element) {
        var mobile = /^1[3|4|5|7|8]\d{9}$/;
        return this.optional(element) || (mobile.test(value));
    }, "手机格式不对");
    $("#signForm").validate({
        submitHandler:function(){
            var user = $('input[name=user]').val();
            var pwd = $('input[name=confirm_password]').val();
            swal({
                title: "正在处理",
                text: "请耐心等待",
                imageUrl: SERVER_NAME+"/public/admin/images/jiazai.gif",
                animation: "slide-from-top",
                showConfirmButton: false
            });
            $.post(URL + '%2fupdate_pwd', {_csrf: CSRF, user: user,pwd:pwd}, function (msg) {
                if(msg){
                    swal({
                        title: "太帅了",
                        text: "密码已重置",
                        type: "success"
                    });
                    window.location.href=SERVER_NAME+'/OrderCentre.php?r=home/login/login'
                } else {
                    swal({
                        title: "哎呀，出错了",
                        text: "换个姿势再试一次",
                        type: "error"
                    });
                }
            });
        },
        rules: {
            user: {required: true,rangelength:[4,10],remote:{
                url: URL+"%2fcheck",
                type: "post",
                data: {
                    val: function () {
                        return $("#user").val();
                    }, type: 1,_csrf: CSRF
                }
            }},
            tel:{required: true, mobile:true},
            captcha:{required:true,minlength: 6,remote:{
                url: URL+"%2fcheck",
                type: "post",
                data: {
                    val: function () {
                        return $("#captcha").val();
                    }, type: 2,_csrf: CSRF
                }
            }},
            pwd:{required: true,rangelength:[6,15]},
            confirm_password: {required: true, equalTo: "#pwd"},
        },
        messages: {
            user: {required: "请输入用户名", rangelength: "输入长度必须为4-10位",remote:'该用户不存在'},
            tel:{required: "请输入手机号", mobile:'手机号错误'},
            captcha:{required: "请输入6位验证码", minlength: "请输入6位验证码", remote:'验证码错误'},
            pwd:{required: "请输入密码", rangelength: "输入长度必须为6-15位"},
            confirm_password:{required: "请输入密码", equalTo: "两次输入密码不一致"},
        }
    });

    //获取验证码
    $('#getCaptcha').click(function () {
        var telThis = $('input[name=tel]');
        var _this = $(this);
        var tel = telThis.val();

        if( !(/^1[3|4|5|7|8]\d{9}$/.test(tel)) ){
            if(telThis.parents().children('.error').length == 0){
                telThis.after('<label for="tel" class="error">请输入手机号</label>');
                telThis.focus();
            }
        } else {
            swal({
                title: "正在处理",
                text: "请耐心等待",
                imageUrl: SERVER_NAME+"/public/admin/images/jiazai.gif",
                animation: "slide-from-top",
                showConfirmButton: false
            });
         
            $.post(URL + '%2fget_captcha', {_csrf: CSRF, tel: tel}, function (msg) {
                $('#captchaMsg').html()
                if(msg.code == 1) {
                    swal({
                        title: "太帅了",
                        text: msg.message,
                        type: "success"
                    });
                    $('#getCaptcha').attr('disabled','true');
                    $('#getCaptcha').css('cursor','not-allowed');
                    i=60;
                    c = setInterval(goCount, 1000);
                } else {
                    swal({
                        title: "哎呀，出错了",
                        text: msg.message,
                        type: "error"
                    });
                }
            },'json');
        }
    });
    function goCount(){
        if(i>=0){
            $('#getCaptcha').val(i+'秒后再次获取');
            i--;
        }else{
            clearInterval(c);
            $('#getCaptcha').removeAttr('disabled');
            $('#getCaptcha').css('cursor','pointer');
            $('#getCaptcha').val('发送验证码');
        }
    }
});
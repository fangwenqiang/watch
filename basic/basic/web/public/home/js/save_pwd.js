/**
 * Created by 她说他叫强哥 on 2017/3/13.
 * 修改密码
 */

/**
 * 密码强度
 */
$(function () {
    $('#newPwd').keydown(fnPwd);
    $('#newPwd').keyup(fnPwd);
    function fnPwd() {
        var newPwd = $('#newPwd').val();
        var number = pwdStrong(newPwd);
        if ( number == 0 | number == 1 ) {
            $('.check').show(500);
            $('#strength_L').css({background:'#b01330',color:'#fff'}).siblings().removeAttr('style');
        } else if ( number == 2 ) {
            $('#strength_M').css({background:'#b01330',color:'#fff'}).siblings().removeAttr('style');
        } else if ( number == 3 ) {
            $('#strength_H').css({background:'#b01330',color:'#fff'}).siblings().removeAttr('style');
        } else {
            $('#strength_H').removeAttr('style').siblings().removeAttr('style');
        }

    }

    function pwdStrong(pwd){
        var num=0;
        var reg1=/\d/;//如果有数字
        if(reg1.test(pwd)){
            num++;
        }
        var reg2=/[a-zA-Z]/;//如果有字母
        if(reg2.test(pwd)){
            num++;
        }
        var reg3=/[^a-zA-Z0-9]/;//如果有特殊字符
        if(reg3.test(pwd)){
            num++;
        }
        if(pwd.length<7){
            num--;
        }
        return num;
    }
});

/***
 * 修改验证
 */
$(function () {
    $("#form").validate({
        submitHandler:function(){
            var oldPwd = $('#oldPwd').val();
            var newPwd = $('#newPwd').val();
            swal({
                title: "正在处理",
                text: "请耐心等待",
                imageUrl: SERVER_NAME+"/public/admin/images/jiazai.gif",
                animation: "slide-from-top",
                showConfirmButton: false
            });
            $.post(URL + '%2fsave_pwd_check', {_csrf: CSRF, oldPwd: oldPwd,newPwd:newPwd,type:3}, function (msg) {
                if(msg == 'true'){
                    swal({
                        title: "太帅了",
                        text: "密码已重置",
                        type: "success"
                    });
                    $("#form")[0].reset();
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
            oldPwd: {required: true,rangelength:[6,15],remote:{
                url: URL+"%2fsave_pwd_check",
                type: "post",
                data: {
                    pwd: function () {
                        return $("#oldPwd").val();
                    },type: 1,_csrf: CSRF
                }
            }},
            newPwd: {required: true,rangelength:[6,15],remote:{
                url: URL+"%2fsave_pwd_check",
                type: "post",
                data: {
                    pwd: function () {
                        return $("#newPwd").val();
                    },type: 2,_csrf: CSRF
                }
            }},
            repwd: {required: true, equalTo: "#newPwd"},
        },
        messages: {
            oldPwd: {required: "请填写密码", rangelength: "密码长度必须为6-15位",remote:'密码错误'},
            newPwd: {required: "请输入新写密码", rangelength: "密码长度必须为6-15位",remote:'不能与原密码一样'},
            repwd:{required: "请确认密码", equalTo: "两次输入密码不一致"},
        }
    });
});

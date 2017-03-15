/**
 * Created by 她说他叫强哥 on 2017/3/14.
 * 获取找回密码连接
 */
$(function () {
    $('#btn_pwd').click(function () {
        var email = $('#email').val();
        if (!email.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/)) {
            $('#email').focus();
            swal({
                title: "哎呀，出错了",
                text: "请填写正确邮箱地址!2秒后关闭",
                type: "error",
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        }
        swal({
            title: "正在处理",
            text: "请耐心等待",
            imageUrl: SERVER_NAME+"/public/admin/images/jiazai.gif",
            animation: "slide-from-top",
            showConfirmButton: false
        });
        $.post(URL + '%2fcheckemail', {_csrf: CSRF, email: email}, function (msg) {

            if(msg.code == 4) {
                $('#btn_pwd').attr('disabled','true');
                $('#btn_pwd').css('cursor','not-allowed');
                i=msg.message;
                count = setInterval(go, 1000);
                swal({
                    title: "哎呀，出错了",
                    text: '当前操作频繁，请'+msg.message+'秒后操作',
                    type: "error"
                });
            } else if(msg.code == 2){
                swal({
                    title: "太帅了",
                    text: msg.message,
                    type: "success"
                });

            } else {
                $('#email').focus();
                swal({
                    title: "哎呀，出错了",
                    text: msg.message,
                    type: "error"
                });
            }
        },'json');
    });

    /**
     * 倒计时
     */
    function go(){
        if(i>=0){
            $('#btn_pwd').html(i+'秒后重试');
            i--;
        }else{
            clearInterval(count);
            $('#btn_pwd').removeAttr('disabled');
            $('#btn_pwd').css('cursor','pointer');
            $('#email').focus();
            $('#btn_pwd').html('获取找回密码连接');
        }
    }
});
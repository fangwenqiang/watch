/**
 * Created by 她说他叫强哥 on 2017/2/24.
 * 轮播图
 */

    // 添加验证
$(function () {
    $('#carousel').submit(function () {
        var img = $('#carousel-image').val();
        var sort = $('#sort').val();
        var i=1;
        if(sort == '' || !/^\d{1,10}$/.test(sort)) {
            $('#sortError').html('请输入1-10位数字');
            i=i-2;
        } else {
            $('#sortError').html('');
            i++;
        }
        if(img == '') {
            $('#imgError').html('请选择文件');
            i=i-2;
        } else {
            $('#imgError').html('');
            i++;
        }
        if(i < 1){
            return false;
        }
    });
});

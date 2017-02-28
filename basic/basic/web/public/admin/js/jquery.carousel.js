/**
 * Created by 她说他叫强哥 on 2017/2/24.
 * 轮播图
 */


$(function () {
    // 添加验证
    $('#carousel').submit(function () {
        var img = $('#carousel-image').val();
        var sort = $('#sort').val();
        var i = 1;
        if (sort == '' || !/^\d{1,10}$/.test(sort)) {
            $('#sort').focus();
            $('#sortError').html('请输入1-10位数字');
            i = i - 2;
        } else {
            $('#sortError').html('');
            i++;
        }
        if (img == '') {
            $('#imgError').html('请选择文件');
            i = i - 2;
        } else {
            $('#imgError').html('');
            i++;
        }
        if (i < 1) {
            return false;
        }
    });

    /**
     * 即点击该
     */

    $(document).on('mouseover', '.sve', function () {
        $(this).css("background-color", "#abcdef");
    });

    $(document).on('mouseout', '.sve', function () {
        $(this).css("background-color", "white");
    });
    //编辑
    $(document).on('click', '.sve', function () {
        var firstValue = $(this).html();      //初始值
        var id = $(this).attr('hid');       //ID
        var field = $(this).attr('field');  //字段名
        $(this).parent('td').html('<input type="text" placeholder="' + firstValue + '" class="sed" style="width:200px;height: 30px;">');
        //聚焦
        $('.sed').focus();
        //编辑
        $('.sed').blur(function () {
            var lastValue = $(this).val();   //修改的值
            var _this = $(this);
            if (lastValue == firstValue || lastValue == '') {
                _this.parent('td').html('<span class="sve" hid="' + id + '" field="' + field + '">' + firstValue + '</span>');
            } else {
                swal({
                    title: "正在处理",
                    text: "请耐心等待",
                    imageUrl: "http://www.xiyue.com/public/admin/images/jiazai.gif",
                    animation: "slide-from-top",
                    showConfirmButton: false
                });
                $.post(url + '%2fedit', {_csrf: csrf, val: lastValue, id: id, field: field}, function (msg) {
                    if (msg == 0) {
                        _this.parent('td').html('<span class="sve" hid ="'+id+'"field = "'+field+'">'+firstValue+'</span >');
                        swal({
                            title: "哎呀，出错了",
                            text: "换个姿势再试一次",
                            type: "error"
                        });
                    } else {
                        _this.parent('td').html('<span class= "sve" hid = "' + id + '"field = "' + field + '" title = "点击编辑" > ' + lastValue + '</span >');
                        swal({
                            title: "太帅了",
                            text: "轻轻一点就修改成功了",
                            type: "success"
                        });
                    }
                });

            }

        });

    });


    /**
     * 删除
     */
    $(document).on('click', '.new_type_del', function () {
        var did = $(this).attr('did');
        var _this = $(this);
        swal({
            title: "您确定要删除这条信息吗",
            text: "删除后将无法恢复，请谨慎操作！",
            type: "info",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "是的，我要删除！",
            cancelButtonText: "让我再考虑一下…",
        }, function () {
            $.post(url + '%2fdelete', {_csrf: csrf,
                id: did}, function (msg) {
                if (msg == 0) {
                    swal("还整不了你了", "下次一定弄死你", "error");
                } else {
                    swal("都叫你不要和我作对了", "你看，作茧自缚吧！", "success");
                    $('#' + did).remove();

                }
            });
        });

    });


});

// 使用说明：把此文件复制到js文件夹中，然后引入此文件（前提要先引入jquery文件，然后再引入此插件）,
// 使用方法： 例：$("#div").center()

;(function($){
  $.fn.extend({
    center:function(loaded){
    var obj = this;
    body_width = parseInt($(window).width());
    body_height = parseInt($(window).height());
    block_width = parseInt(obj.width());
    block_height = parseInt(obj.height());
    left_position = parseInt((body_width / 2) - (block_width / 2) + $(window).scrollLeft());
    if (body_width < block_width) {
        left_position = 0 + $(window).scrollLeft();
    };

    top_position = parseInt((body_height / 2) - (block_height / 2) + $(window).scrollTop());
    if (body_height < block_height) {
        top_position = 0 + $(window).scrollTop();
    };

    if (!loaded) 
    {

        obj.css({
            'position': 'absolute'
        });
        obj.css({
            'top': ($(window).height() - $('#code').height()) * 0.5,
            'left': left_position
        });
        $(window).bind('resize', function() {
            obj.center(!loaded);
        });
        $(window).bind('scroll', function() {
            obj.center(!loaded);
        });

    } 
    else 
    {
        obj.stop();
        obj.css({
            'position': 'absolute'
        });
        obj.animate({
            'top': top_position
        }, 200, 'linear');
    }
}

})
})(jQuery);
$screen = window.screen.width;
$param = window.location.href;
$arr = $param.split("?s");
$small_version = !1;
void 0 !== $arr[1] && ($small_version = 0 >= $arr[1].length ? !0 : 0 == $arr[1].indexOf("&") ? !0 : !1);
$(function() {
    $("#leftArea").find("img.lazy").lazyload();
    $(".goodsImg img").attr("style",
    function(a, b) {
        return "margin-bottom:10px;max-width:750px;" + b
    });
    tabs(".rankList", "red", ".rankCon");
    $("ul.subnav li").click(function() {
        $("#rightArea").position();
        $(this).addClass("on").siblings().removeClass("on");
        var a = $(this).find("a").attr("alt");
        "" != $.trim(a) && "undefined" != a && ("#desc" == a ? ($(a).show().siblings("div.column").hide(), $("div.jumpHere").hide()) : $(a).show().siblings("div.column").hide().end().children("div.jumpHere").show(), $("div#comment").show(), $(".column:visible").scrollTo($(".column:visible").offset().top, 500))
    });
    var a = !1,
    b = !1,
    c = $("#fixed");
    load_member_status();
    $(window).scroll(function() {
        var d = $("#rightArea").position();
        if (!d) return ! 0;
        d = d.top + 30;
        $(window).scrollTop() > d ? 0 < navigator.userAgent.indexOf("MSIE 6.0") ? c.css("top", $(window).scrollTop()) : c.css("position", "fixed").css("top", "0") : c.removeAttr("style");
        var d = $("#history").offset(),
        e = $("#feedback_type_nav").offset();
        $(window).scrollTop() > d.top - $(window).height() - 60 && !a && null == $.cookie("_uname") && (recent_browse_goods(), a = !0);
        $(window).scrollTop() > e.top - $(window).height() - 60 && !b && (goods_feedback(), b = !0);
        var g = $(".video");
        0 < g.length && g.each(function() {
            $(window).scrollTop() > g.position().top - 30 && isNaN($(this).data("loaded")) && ($(this).html($(this).find(".cache").html().replace(/\[/g, "<").replace(/\]/g, ">")), $(this).data("loaded", 1))
        })
    });
    $("#tabComment").click(function() { ! 0 == isNaN(parseInt($(this).data("load_member_status"))) && (load_member_status(), $(this).data("load_member_status", 1))
    });
    $(".series>ul>li").each(function() {
        var a = $(this).text().split("\uff1a")[0];
        $('<a href="/goods/pop_error/?goods_id=' + $("#goods_id").val() + "&attr=" + encodeURIComponent(a) + '" class="fancybox.iframe iframe" rel="nofollow"></a>').fancybox({
            title: null,
            width: 490,
            height: 260,
            padding: 0,
            margin: 0,
            scrolling: "no",
            iframe: {
                scrolling: "no"
            },
            helpers: {
                overlay: {
                    closeClick: !1,
                    fixed: !1
                }
            }
        }).appendTo($(this))
    });
    $(".series>ul>li").hover(function() {
        $(this).find(".iframe").show().siblings().hide()
    },
    function() {
        $(this).find(".iframe").hide()
    });
    $("#sImg").bxSlider({
        infiniteLoop: !1,
        hideControlOnEnd: !0,
        pager: !1,
        slideWidth: 54,
        minSlides: 5,
        maxSlides: 5,
        moveSlides: 1
    });
    $("#image").jqzoom({
        zoomWidth: 456,
        zoomHeight: 456,
        preloadText: "\u5546\u54c1\u5927\u56fe\u52a0\u8f7d\u4e2d\uff0c\u8bf7\u7a0d\u5019...",
        preloadImages: !1,
        lens: !1,
        title: !1
    });
    if (0 < navigator.userAgent.indexOf("MSIE 6.0")) {
        var d = $("div.info div.bgf3 a:visible");
        $("#image div.zoomPad").hover(function() {
            $(d).hide()
        },
        function() {
            $(d).show()
        })
    }
    $("#goods_collection").fancybox({
        title: !1,
        width: 504,
        height: 303,
        padding: 0,
        margin: 0,
        closeBtn: !1,
        hideOnOverlayClick: !1,
        iframe: {
            scrolling: "no"
        },
        helpers: {
            overlay: {
                closeClick: !1,
                fixed: !1
            }
        }
    });
    interest_goods();
    $("#feedback_type_nav").find("li").click(function() {
        $(this).addClass("on").siblings("li").removeClass("on");
        $("#feedback_type").val($(this).attr("alt"));
        goods_feedback()
    });
    $("#feedback_submit").click(function() {
        var a = {
            act: "edit",
            type: $(':radio[name="fb_type"]:checked').val(),
            goods_id: $("#goods_id").val()
        },
        b = $(':input[name="feedback_content"]').val();
        if ("" == b || null == b) return alert("\u54a8\u8be2\u7684\u5185\u5bb9\u4e0d\u80fd\u4e3a\u7a7a"),
        !1;
        a.content = b;
        $.get(www_domain + "/goods/question/", a,
        function(a) {
            0 == a.status && ($(':input[name="feedback_content"]').val(""), _adwq.push(["_setAction", "2bx2l2", $.cookie("_uname_for_ntalker"), ""]));
            alert(a.message)
        },
        "json")
    });
    $("#lookOver").fancybox({
        title: null,
        width: 720,
        padding: 0,
        margin: 0,
        scrolling: "no",
        closeBtn: !1,
        closeBtn2: !0,
        iframe: {
            scrolling: "no"
        },
        helpers: {
            overlay: {
                closeClick: !1,
                fixed: !1
            }
        }
    });
    hover_tip();
    depreciate_notice();
    $("#iCon ul.slides li").hover(function() {
        $(this).closest("li").find("div.g_compare").show()
    },
    function() {
        $(this).closest("li").find("div.g_compare").hide()
    });
    1225 <= $screen && !$small_version ? $("#bc-slider").find("li").attr("style", "min-width:450px;max-width:450px;") : $("#bc-slider").find("li").attr("style", "min-width:720px;max-width:720px;");
    $("#bc-slider").bxSlider({
        prevText: '<span class="c__ls_pointer">&nbsp;</span>',
        nextText: '<span class="c__rs_pointer">&nbsp;</span>',
        hideControlOnEnd: !0,
        pager: !1,
        slideWidth: 54,
        minSlides: 1,
        maxSlides: 2,
        moveSlides: 1
    })
});
function pop_login(a) {
    location.href = cart_wbiao_cn + "order"
}
function recent_browse_goods() {
    $.ajax({
        url: www_domain + "/goods/browse_history/",
        type: "POST",
        data: {
            goods_id: $("#goods_id").val()
        },
        dataType: "json",
        cache: !0,
        ifModified: !0,
        success: function(a) {
            if (a) {
                var b = "<ul>",
                c;
                for (c in a) b += "<li" + (1 == c % 2 ? ' style="border-right:0px;width:103px;"': "") + '><a href="' + www_domain + a[c].url + '" target="_blank"><img src="' + qdimg_wbiao_cn + 'unit/blank.gif" class="lazy" data-original="' + a[c].goods_img + '" /><span>' + (0 < parseInt(a[c].brand_id) ? "<u>" + a[c].brand_name + "</u><u>" + a[c].series_name + "\u7cfb\u5217</u><u>" + a[c].crowd_name + a[c].machine_name + "\u8868</u>": "<u>" + a[c].goods_name + "</u>") + "<i>" + a[c].formated_price + "</i></span></a></li>";
                1 == a.length % 2 && (b += '<li style="border-right:0px;width:103px;">&nbsp;</li>');
                b = $(b + "</ul>").find("a").hover(function() {
                    $(this).find("span").stop().animate({
                        bottom: "0"
                    },
                    "fast")
                },
                function() {
                    $(this).find("span").stop().animate({
                        bottom: "-105px"
                    },
                    "fast")
                }).end();
                b = $(b).find("img.lazy").lazyload({
                    effect: "fadeIn"
                }).end();
                $("#recent_browse_goods").html(b)
            }
        }
    })
}
function goods_feedback(a) {
    a = a || 1;
    a = {
        goods_id: $("#goods_id").val(),
        page: a
    };
    var b = $("#feedback_type").val();
    "" != b && (a.type = b);
    $.ajax({
        url: www_domain + "/goods/question/",
        type: "GET",
        data: a,
        dataType: "json",
        cache: !1,
        success: function(a) {
            if (0 == a.status) {
                var b = "";
                if (a.feedback_list && 0 < a.feedback_list.length) {
                    for (var f in a.feedback_list) var e = new Date(1E3 * a.feedback_list[f].add_time),
                    e = e.getFullYear() + "-" + (e.getMonth() + 1) + "-" + e.getDate() + " " + padLeftStr(e.getHours(), 2) + ":" + padLeftStr(e.getMinutes(), 2) + ":" + padLeftStr(e.getSeconds(), 2),
                    b = b + '<div class="floor">',
                    b = b + '<div class="ask">',
                    b = b + ('<span class="word"><var>[' + a.types[a.feedback_list[f].type] + "]</var>" + a.feedback_list[f].content + "</span>"),
                    b = b + ('<span class="time">' + (a.feedback_list[f].user_name ? a.feedback_list[f].user_name.substring(0, 4) + "****": "\u533f\u540d\u7528\u6237") + "&nbsp;&nbsp;" + e + "</span>"),
                    b = b + "</div>",
                    b = b + '<div class="answer"><div class="arrow"><i>\u25c6</i></div>',
                    b = b + ("<var>\u5ba2\u670d\u56de\u590d\uff1a</var>" + a.feedback_list[f].reply_content),
                    b = b + "</div>",
                    b = b + "</div>";
                    $("#feedback_content").html(b);
                    a = pagination(a.pagination.page_nav, a.pagination.current_page, a.pagination.total_page);
                    $("#pagination_div").html($(a).find("a").click(function() {
                        goods_feedback($(this).attr("alt"))
                    }).end())
                } else b += '<div style="border:2px solid #E6E6E6;border-top:0px;color:#888;padding:10px 0;display:block;width:100%;font-weight:bold;text-align:center;">\u6682\u65e0\u54a8\u8be2</div>',
                $("#feedback_content").html(b)
            }
        }
    })
}
function send_feedback() {
    $.ajax({
        url: www_domain + "/goods/question/",
        type: "GET",
        data: {
            act: "login_status"
        },
        dataType: "json",
        cache: !1,
        success: function(a) {
            1 == a.status ? ($("#feedback_send").data("flag") || $("#feedback_send").toggle(), $("#feedback_ask")[$("#feedback_ask").hasClass("on") ? "removeClass": "addClass"]("on")) : ($("#login_for_comment").trigger("click"), $("#feedback_send").data("flag", !0))
        }
    })
}
function after_send_feedback() {
    var a = $("#feedback_ask"),
    b = $("#feedback_send");
    0 < a.attr("class").indexOf("on") ? a.removeClass("on") : a.addClass("on");
    b.toggle()
}
function addorminus(a, b) {
    var c = Number($("#goods_number_" + b).val()),
    d = 0;
    switch (a) {
    case "add":
        d = parseInt(c) + 1;
        $("#goods_number_" + b).val(d).siblings();
        $("#goods_number_" + b).focus();
        $("#goods_number_" + b).blur();
        break;
    case "minus":
        2 <= c && (d = parseInt(c) - 1, $("#goods_number_" + b).val(d).siblings(), $("#goods_number_" + b).focus(), $("#goods_number_" + b).blur())
    }
    if (isNaN(d)) return alert("\u8bf7\u8f93\u5165\u4e00\u4e2a\u6570\u5b57!"),
    !1;
    if (!/^\d+$/.test(d)) return alert("\u8bf7\u8f93\u5165\u4e00\u4e2a\u6574\u578b\u6570\u5b57!"),
    !1;
    $.post(www_domain + "/goods/check_stock/", {
        goods_id: b,
        goods_num: d
    },
    function(a) {
        1 == a.error && (alert(a.msg), $("#goods_number_" + b).val(c))
    },
    "json")
}
function load_member_status() {
    $.ajax({
        type: "GET",
        cache: !1,
        url: www_domain + "/common/get_comment_login_status/",
        success: function(a) {
            $("#user_name_container").replaceWith(a);
            $("#user_name_container .iframe").fancybox({
                title: null,
                width: 504,
                padding: 0,
                margin: 0,
                scrolling: "no",
                closeBtn: !1,
                iframe: {
                    scrolling: "no"
                },
                helpers: {
                    overlay: {
                        closeClick: !1,
                        fixed: !1
                    }
                },
                afterClose: function() {
                    load_member_status()
                }
            })
        }
    })
}
function comment_list_change_page(a, b, c) {
    $.ajax({
        type: "POST",
        cache: !1,
        url: www_domain + "/goods_comment/index/",
        data: "goods_id=" + b + "&page=" + a + "&tp=" + c,
        success: function(a) {
            $("#comment_list div:first").html(a).find("img.lazy").attr("src",
            function() {
                return $(this).attr("data-original")
            }).end();
            bdShare.fn.init();
            $("#c_tab").scrollTo($("#c_tab").offset().top, 500)
        }
    })
}
function collection(a) {
	var _csrf=$('.#csrf').val();
    $.post(www_domain + "home/collect/collect", {
        is_ajax: 1,
        ids: a,
        collection: 1,
        _csrf: _csrf
    },
    function(a) {
        $("#goods_collection").click()
    },"json")
}
function submitComment(a) {
    var b = $("#email");
    a = $.trim(b.val());
    var c = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)/;
    if ("" != a && !c.test(a)) return alert("\u90ae\u7bb1\u5730\u5740\u683c\u5f0f\u4e0d\u6b63\u786e"),
    b.focus(),
    b.select(),
    !1;
    a = $("#user_name");
    c = $.trim(a.val());
    if ("" == c) return alert("\u8bf7\u5148\u767b\u5f55\u6216\u6ce8\u518c\u518d\u8fdb\u884c\u8bc4\u8bba"),
    !1;
    var d = $("#content"),
    f = $.trim(d.val());
    if ("" == f || f == d.attr("title")) return alert("\u8bf7\u5148\u586b\u5199\u8bc4\u8bba\u5185\u5bb9"),
    d.focus(),
    !1;
    var e = $("#captcha"),
    g = $.trim(e.val());
    if ("" == g) return alert("\u8bf7\u5148\u586b\u5199\u9a8c\u8bc1\u7801"),
    e.focus(),
    !1;
    b = $("#email");
    a = $.trim(b.val());
    var b = $("#goods_id"),
    b = $.trim(b.val()),
    l = $('input:radio[name="comment_rank"]:checked').val(),
    m = $('input:radio[name="comment_type"]:checked').val(),
    h = "";
    $('input:checkbox[name="goods_comment_tag_ids"]:checked').each(function() {
        "" != h && (h += ",");
        h += $(this).val()
    });
    var k = "";
    $('input:text[name="goods_comment_tags"]').each(function() {
        "" != k && (k += ",");
        k += $(this).val()
    });
    $.ajax({
        type: "POST",
        cache: !1,
        url: www_domain + "/goods_comment/add_comment/",
        data: {
            user_name: c,
            email: a,
            comment_rank: l,
            content: f,
            goods_id: b,
            captcha: g,
            comment_type: m,
            goods_comment_tag_ids: h,
            goods_comment_tags: k
        },
        success: function(a) {
            a = parseInt(a);
            switch (a) {
            case 0:
                alert("\u9a8c\u8bc1\u7801\u4e0d\u6b63\u786e\uff0c\u8bf7\u91cd\u65b0\u8f93\u5165\u9a8c\u8bc1\u7801");
                e.val("");
                e.focus();
                e.trigger("click");
                break;
            case 1:
                alert("\u5f88\u62b1\u6b49\uff01\u7cfb\u7edf\u53d1\u751f\u9519\u8bef\uff01\u8bc4\u8bba\u63d0\u4ea4\u5931\u8d25\uff01");
                break;
            case 2:
                alert("\u8bc4\u8bba\u63d0\u4ea4\u6210\u529f\uff0c\u8bf7\u8010\u5fc3\u7b49\u5019\u5ba1\u6838\uff0c\u8c22\u8c22\u60a8\u7684\u8bc4\u8bba\uff01");
                d.val("");
                e.val("");
                $("#captchaid").trigger("click");
                _adwq.push(["_setAction", "2bwvz6", $.cookie("_uname_for_ntalker"), ""]);
                break;
            default:
                alert("\u9519\u8bef\u7684\u8fd4\u56de\u503c\uff1a" + a)
            }
        }
    });
    return ! 0
}
function operateComment(a, b, c) {
    2 > b && $.post(www_domain + "/goods_comment/operate_comment", {
        commentId: a,
        tp: b
    },
    function(a) {
        if ("1" == a) {
            a = $(c).html();
            var b = a.match(/(\d+)/g),
            b = parseInt(b) + 1;
            a = a.replace(/(\d+)/g, b);
            $(c).html(a)
        } else a && alert(a)
    })
}
function my_browse_history() {
    var a = $.trim($("#goods_id").val()),
    b = $.cookie("history_goods_ids");
    b ? ( - 1 != b.indexOf(a) && (b = b.replace("," + a, ""), b = b.replace(a + ",", "")), b = b ? b + ("," + a) : a) : b = a;
    $.cookie("history_goods_ids", b, {
        expires: 90,
        path: "/",
        domain: wb_domain
    })
}
function hover_tip() {
    $("#promise, #is_post_pay").find("i").mouseover(function(a) {
        var b = "<div id='tooltip' style='line-height:18px;position:absolute;border:solid #aaa 1px;background-color:#F9F9F9;padding:5px 10px;z-index:5001;'>" + $(this).attr("data") + "</div>";
        $("body").append(b);
        $("#tooltip").css({
            top: a.pageY + "px",
            left: a.pageX + "px"
        });
        $(this).mouseout(function() {
            $("#tooltip").remove()
        });
        $(this).mousemove(function(a) {
            $("#tooltip").css({
                top: a.pageY + 20 + "px",
                left: a.pageX + 10 + "px"
            })
        })
    })
}
function interest_goods() {
    tabs("#interest #iTab", "cur", "#iCon");
    $("#iTab>li").hover(function() {
        $("#iCon").find("div.hide:visible img.lazy").attr("src",
        function() {
            return $(this).attr("data-original")
        })
    });
    $(".slides").bxSlider({
        prevText: '<span class="c__ls_pointer">&nbsp;</span>',
        nextText: '<span class="c__rs_pointer">&nbsp;</span>',
        pager: !1,
        slideWidth: $("div.hide:visible").width(),
        minSlides: 1,
        maxSlides: 4,
        moveSlides: 4,
        onSlideAfter: function(a, b, c) {
            $(a).parent().find("img.lazy").attr("src",
            function() {
                return $(this).attr("data-original")
            })
        }
    })
}
function depreciate_notice() {
    $("#depreciate_pop").fancybox({
        title: !1,
        width: 504,
        height: 303,
        padding: 0,
        margin: 0,
        closeBtn: !1,
        closeBtn2: !1,
        hideOnOverlayClick: !1,
        iframe: {
            scrolling: "no"
        },
        helpers: {
            overlay: {
                closeClick: !1,
                fixed: !1
            }
        }
    })
};
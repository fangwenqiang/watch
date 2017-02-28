<!doctype html>
<html lang="en">
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>提示信息</title>
<style type="text/css">
*{ padding:0; margin:0; font-size:12px}
.showMsg .guery {white-space: pre-wrap; /* css-3 */white-space: -moz-pre-wrap; /* Mozilla, since 1999 */white-space: -pre-wrap; /* Opera 4-6 */white-space: -o-pre-wrap; /* Opera 7 */	word-wrap: break-word; /* Internet Explorer 5.5+ */}
a:link,a:visited{text-decoration:none;color:#0068a6}
a:hover,a:active{color:#ff6600;text-decoration: underline}
.showMsg{border: 1px solid #1e64c8; zoom:1; width:450px; height:174px;position:absolute;top:50%;left:50%;margin:-87px 0 0 -225px}
.showMsg .content{ padding:46px 12px 10px 45px; font-size:14px; height:66px;}
.showMsg .bottom{ background:#e4ecf7; margin: 0 1px 1px 1px;line-height:26px; *line-height:30px; height:26px; text-align:center}
.showMsg .guery{background-position: left -460px;}
.showMsg h5 {
    background-image: url("/public/admin/images/msg.png");
    background-repeat: no-repeat;
    color: #fff;
    font-size: 14px;
    height: 25px;
    line-height: 26px;
    overflow: hidden;
    padding-left: 35px;
    text-align: left;
}
</style>
<script src="js/jquery.min.js"></script>
<script src="js/admin_common.js"></script>
</head>
<body>
<div class="showMsg" style="text-align:center">
<h5>提示信息</h5>
	<div class="content guery" style="display:inline-block;display:-moz-inline-stack;zoom:1;*display:inline;max-width:330px"><?=$msg?> 大小：<?=$file_size?> KB</div>
	<div class="bottom">
	<a href="javascript:history.back();">[点这里返回上一页]</a>
	</div>
</div>
</body>
</html>

<script>
/**
 * 全局变量
 */
var SITE_URL  = 'http://www.xiaoer.com/ThinkSNS';
var UPLOAD_URL= 'http://www.xiaoer.com/ThinkSNS/data/upload';
var THEME_URL = 'http://www.xiaoer.com/ThinkSNS/resources/theme/stv1/_static';
var APPNAME   = 'public';
var MID		  = '0';
var UID		  = '0';
var initNums  =  '140';
var SYS_VERSION = '4.6.0'
// Js语言变量
var LANG = new Array();

//跳转
function Jump(){
  window.location.href = "<?= \yii\helpers\Url::toRoute([$url]);?>";
}
document.onload = setTimeout("Jump()" , 1* 1000);
</script>


<link href="" rel="stylesheet" type="text/css">
<base target="_self" />
<div class="Prompt" style='height:330px;'>
<div style="text-align: center;margin-top: 15px;">
</div>
  	<div class="Prompt-inner">
      <p>
      	<div style='font-size:44px;padding-left:560px;padding-top:120px;'><?=$msg?></div> 
      </p>
  </div>
 </div>    

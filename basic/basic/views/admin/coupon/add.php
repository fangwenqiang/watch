<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<style>
/*html{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;}*/
/*html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td{margin: 0;padding:0;}*/
/*article,aside,details,figcaption,figure,footer,header,hgroup,main,nav,section,summary{display:block;}*/
/*body{min-width:320px;word-wrap:break-word;line-height:1.5;font-family:'microsoft yahei',Verdana,"\5FAE\8F6F\96C5\9ED1",Helvetica,Tahoma,sans-serif,"\5b8b\4f53",Arial;background:#FFF;color:#000;-webkit-tap-highlight-color:rgba(255,255,255,0);-webkit-touch-callout:none;cursor:default;-ms-content-zooming:none;}*/
/*button,input,select,textarea{text-decoration: none;outline:none;-moz-outline:none;font: inherit;word-break:normal;text-transform:none;}*/
/*input, select, label {vertical-align: middle;-webkit-appearance : none ;-moz-appearance : none ;}*/
/*ul,ol,li,dl{list-style-type:none;}         i,em{font-style:normal;}     svg:not(:root){overflow:hidden;}*/
/*img{border:0;max-width:100%;height:auto;vertical-align:middle;-ms-interpolation-mode:bicubic;-webkit-tap-highlight-color:rgba(0,0,0,0);}*/ 
    .warpbox{max-width:1000px; height:auto!important;margin-left:auto; margin-right:auto; line-height:1.5;background-color: #fff; padding:30px 22px;box-shadow: 0px 2px 4px #aaa;}
	
    .datainp{ width:135px; height:30px; border:1px #ccc solid;}
    .jedatebox{width:268px;height:auto; border:1px #00A1CB solid;position: absolute;background-color:#fff;font-family:'microsoft yahei',Verdana,"\u5fae\u8f6f\u96c5\u9ed1","\5b8b\4f53",Arial;font-size:14px; display:none; cursor:default;}
    .jedatebox.dateshow{display:block;}
    .jedatebox .jedatetop{width:100%;background: #00A1CB; color:#fff; overflow:hidden;text-align:center;font-family:'\5B8B\4F53';}
    .jedatebox .jedateym{width:50%; float:left;height:40px; line-height:40px;}
    .jedateym span{width:70%;padding: 0;float:left;text-align: center;text-overflow: ellipsis; display:block;}
    /*.jedateym span input{width:100%;float:left;padding: 0;border:none;background-color:transparent;text-align: center;}*/
    .jedateym .prev,.jedateym .next{width:15%;height:40px; line-height:45px;float:left;display:block;text-align: center;}
    .jedateym .prev:before{width: 0;height: 0; display:inline-block;border-width: 7px; border-style: dashed;border-color: transparent;overflow: hidden;border-right-style:solid; border-right-color:#fff;content: "";margin: 0 9px 0 0;}
    .jedateym .next:before{width: 0;height: 0; display:inline-block;border-width: 7px; border-style: dashed;border-color: transparent;overflow: hidden;border-left-style:solid; border-left-color:#fff;content: "";margin: 0 0 0 6px;}
    .jedateym .pndrop{width:14px;height:14px; overflow:hidden;display: inline-block;position:relative;vertical-align: middle;}
    .jedateym .pndrop:before{width: 0;height: 0; display:inline-block;border-width:5px; border-style: dashed;border-color: transparent;overflow: hidden;border-top-style:solid; border-top-color:#fff;content: ""; position:absolute; top:4px; left:2px;}
    .jedatesety,.jedatesetm{width: 100%; position:absolute;left:0; top:40px; bottom:0;background-color: #fff;}
    .jedatesety .ymdropul,.jedatesetm .ymdropul{width:100%;height:210px;overflow:auto;}
    .jedatesety .ymdropul li{width:33.3%;float:left;text-align: center;height:40px; line-height:40px;}
    .jedatesetm .ymdropul li{width:33.3%;float:left;text-align: center;height:50px; line-height:50px;}
    .jedatesety .ymdropul li.action,.jedatesetm .ymdropul li.action{background: #00A1CB;color:#fff;}
    .jedatetopym p{overflow:auto; padding-top:4px;}
    .jedatetopym p span{width:31%; margin:0 1.1%;background-color: #00A1CB;color: #fff;display: block;height:28px;line-height:28px; border-radius:5px;text-align:center;font-family:'\5B8B\4F53';}
    .jedatetopym p span.jedateymchri{background-color: #ECF4FB;color: #1F547E;float:left;font-size: 16px;}
    .jedatetopym p span.jedateymchle{background-color: #ECF4FB;color: #1F547E;float:left;font-size: 16px;}
    .jedatetopym p span.jedateymchok{background-color: #00A1CB;color:#fff;float:right;font-size: 12px;}
    .jedatebox .jedaol{width:100%;overflow:auto;}
    .jedatebox .jedaul{ padding:0 4px;overflow:auto;}
    .jedatebox .jedaol li,.jedatebox .jedaul li{width:14.28%; float:left; height:30px; line-height:30px; text-align:center;}
    .jedatebox .jedaul li{width:14.28%;float:left;}
    .jedatebox .jedaol li.weeks{background:#f5f5f5;border-bottom: 1px solid #ddd;}
    .jedatebox .jedaul li.action{background: #00A1CB;color:#fff;}
    .jedatebox .jedaul li.prevdate,.jedatebox .jedaul li.nextdate{color:#4DDBFF;}
    .jedatebox .jedaul li.disabled{ color:#bbb;}
    .jedatebox .jedaul li:nth-child(7n){border-right:none;}
    .jedatebot{height:34px;line-height:34px; padding:0 3px 0 5px;overflow:hidden;}
    .jedatebot .botflex{width:50%;float:left;display:block;margin:0;padding-top:3px; overflow:hidden;}
    .jedatebot .botflex li{width:33.33%; float:left;text-align:center;}
    .jedatebot .botflex li em{width:70%;float:left;padding: 0;border:none;background:#eee;text-align: center;display:block;height:28px;line-height:28px;}
    .jedatebot .botflex li i{width:30%;float:left;height:24px;line-height:24px;border-top:2px solid #eee;border-bottom:2px solid #eee;font-style:normal;display:block;text-align: center;}
    .jedatebot .jedatebtn{text-align:center;font-size: 12px;font-family:'\5B8B\4F53';}
    .jedatebot .jedatebtn span{width:31%; float:left; margin:0 1.1%;background-color: #00A1CB;color: #fff;display: block;height:28px;line-height:28px; border-radius:5px;text-align:center;}
    .jedateh,.jedatems{width: 100%; position:absolute;left:0; bottom:40px;background-color: #fff;border-top: 1px solid #ccc;}
    .jedatehmstitle{width:100%;height:35px;line-height:35px;background: #f5f5f5; color:#000;position: relative; overflow:hidden;text-align:center;font-size: 15px;}
    .jedateh p{width:20%;float:left;text-align: center;height:32px; line-height:32px;}
    .jedatems p{width:10%;float:left;text-align: center;height:32px; line-height:32px;}
    .jedateh p.action,.jedatems p.action{background: #00A1CB;color:#fff;}
    .jedatehmsclose{width:30px; height:30px; line-height:26px; text-align:center;position: absolute;top:50%;right:4px; margin-top:-15px;z-index:150;font-size:24px;}
    </style>
<script type="text/javascript" src="rili/js/jeDate.js"></script>
<div id="dcMain">
    <!-- 当前位置 -->
    <div id="urHere">DouPHP 管理中心<b>></b><strong>添加优惠券</strong></div>
    <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="<?php echo Url::to(['admin/coupon/list'])?>" class="actionBtn">优惠卷列表</a>添加优惠券</h3>
        <form action="<?php echo Url::to(['admin/coupon/add'])?>" method="post" enctype="multipart/form-data">
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                <tr>
                    <td width="80" align="right">优惠券名称</td>
                    <td>
                        <input type="text" name="coupon_name" value="" size="40" class="inpMain" required=""/>
                    </td>
                </tr>
                <tr>
                    <td align="right">优惠券编号</td>
                    <td>
                        <input type="text" name="coupon_sn" size="40"  value="" class="inpMain" /> <span style="color: orange;">* </span> 不写系统自动生成
                    </td>
                </tr>
                <tr>
                    <td width="80" align="right">面值</td>
                    <td>
                        <input type="text" name="coupon_value" value="" size="20" class="inpMain" required=""/>
                    </td>
                </tr>
                <input name="_csrf" type="hidden" id="_csrf" value="<?= \Yii::$app->request->csrfToken ?>">
                <tr>
                    <td align="right">所需消费</td>
                    <td>
                        <input type="text" name="require_spend" value="" size="20" class="inpMain" required=""/>
                    </td>
                </tr>
                <tr>
                    <td align="right">有效期</td>
                    <td>
                        <input name="start_time" class="datainp" id="indate" type="text" placeholder="请选择"  readonly>
						<input name="expire_time" class="datainp" id="dateinfo" type="text" placeholder="请选择"  readonly>
                    </td>
                </tr>       
                <tr>
                    <td></td>
                    <td>
                        <input class="btn" type="submit" value="提交"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <script type="text/javascript">  
	 	jeDate({
			dateCell:"#indate",//isinitVal:true,
			format:"YYYY-MM-DD",
			isTime:false, //isClear:false,
			minDate:"2014-09-19 00:00:00"
		})
	        jeDate({
			dateCell:"#dateinfo",
			format:"YYYY-MM-DD",
			isTime:false, //isClear:false,
			minDate:"2014-09-19 00:00:00"
		}) 
	 </script>
</div>
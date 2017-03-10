<?php
use yii\helpers\Url;
?>
<style>
     div.page a{
        border:#aaaadd solid 1px;
        text-decoration:none;
        padding:2px 5px 2px 5px;
        margin:2px;
    }
    div.page span.current{
        border:#000099 1px solid;
        background-color:black;
        padding:4px 5px 4px 5px;
        margin:2px;
        color:#fff;
        font-weight:bold;
    }
    div.page span.disable{
        border:#eee 1px solid;
        padding:2px 5px 2px 5px;
        margin:2px;
        color:#ddd;
    }
</style>
<script src="js/jquery.js"></script>

<link rel="stylesheet" type="text/css" href="css/hot.css" />
<div id="main">

    <div class="hot_goods_list">
        <div class="context">
            <?php foreach($data['goodsList'] as $val){ ?>
            <ul>
                <li> <span class=""></span> <a href="<?=url::to(['home/goods-show/show','id'=>$val['g_id']])?>" target="_blank" class="img"><img src="Images/<?=$val['g_img']?>" alt="<?=$val['goods_name']?>" width="300" height="300" /></a>
                    <p> <b><?=$val['goods_name']?>品牌：<?=$val['brand_name']?></b><br>
                        <u></u><ins>￥<?=$val['shop_price']?></ins><del>原价：￥<?=$val['market_price']?></del><br>
                        <span class="cmt">已被评论<i><?=$val['comment']?></i>次</span> </p>
                    <a href="<?=url::to(['home/goods-show/show','id'=>$val['g_id']])?>" class="btn">立即抢购</a> </li>
            </ul>
            <?php } ?>
        </div>
    </div>

<!--    页码-->
    <div class="fr" style="margin: 20px 100px 20px 100px;font-size: 20px">
        <?=$data['pageStr']?>
    </div>
</div>
</div>

<script>
    /*
     * 拼接条件 替换页面
     * */
    function page(p){
        var limit = '12';
//        var gt_id = $('.gt_id').val();  //手表类型ID
        $.ajax({
            type:'GET',
            url:'<?=url::to(['home/watch/search'])?>',
            data:'p='+p+'&limit='+limit,
            dataType:'json',
            success: function (msg) {

                $('.fr').html(msg.pageStr);
                var str = '';
                if(msg['res'] == '1'){
                    str +='<span><h2>'+msg['msg']+'</h2></span>'
                }else{
                    $.each(msg.goodsList, function (k,v) {
                        url = "<?=url::to(['home/goods-show/show'])?>&id="+v.g_id;
                        str +='<ul><li> <span class=""></span><a href="'+url+'" target="_blank" class="img"><img src="Images/'+ v.g_img+'" alt="'+v.goods_name+'" width="300" height="300" /></a>';
                        str +='<p> <b>'+ v.goods_name+'品牌：'+ v.brand_name+'</b><br><u></u><ins>￥'+ v.shop_price+'</ins><del>原价：￥'+v.market_price+'</del><br>';
                        str +='span class="cmt">已被评论<i>'+ v.comment+'</i>次</span> </p><a href="javascript:addToCartT(5561, 1, 1);" class="btn">立即抢购</a> </li></ul>';
                    })
                }
                $('.context').html(str);
            }
        });
    }

</script>
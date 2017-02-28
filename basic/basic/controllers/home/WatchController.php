<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/27
 * Time: 8:46
 */

namespace app\controllers\home;

use app\models\Brand;
use app\models\Goods;
use app\models\Nav;
use yii\web\Controller;

class WatchController extends CommonController{

    public $layout = '/proscenium';
    public $onePage = '6';  //每页显示条数

    /*
     * 男士手表展示
     * */
    public function actionBoylist()
    {
        $goods = new Goods();   //商品
        $order = 'ASC';
        $data['goodsList'] = $goods->showType('2',$order);
        $data['brandList'] = $this->BrandAll(); //查询品牌

        $count = count($data['goodsList']);
        $data['pageStr'] = $this->pageStr($count,$this->onePage);

        return $this->render('boy',['data'=>$data]);
    }

    /*
     * 展示品牌等级  名称
     * */
    public function BrandAll()
    {
        $brand = new Brand();
        $brandList = $brand->brandWhere('is_show','1');

        foreach($brandList as $key=>$val){
            if($val['sort'] == 1){
                $brandList[$key]['sort'] = '[顶级]';
            }elseif($val['sort'] == 2){
                $brandList[$key]['sort'] = '[高档]';
            }elseif($val['sort'] == 3){
                $brandList[$key]['sort'] = '[中档]';
            }elseif($val['sort'] == 4){
                $brandList[$key]['sort'] = '[时尚]';
            }
        }
        return $brandList;
    }


    /*
     * 搜索 排序
     * */
    public function actionSearch()
    {
        $goods = new Goods();   //商品
        $brand = new Brand();   //品牌
        $request = \Yii::$app->request;
        $data = $request->get();
        $order = 'DESC';

        if(!empty($data['brand_name'])){
             $dataBrand = $brand->brandId($data['brand_name']);
            if(empty($dataBrand)){
                die(json_encode(array('res'=>'1','msg'=>'暂时没有该相似品牌')));
            }else{
                $data['brand_id'] = $dataBrand['brand_id'];
            }
        }

        // 价格排序
        if (!empty($data['price_or']) && $data['price_or'] == 0) {
            $orderField = 'shop_price';
            $order = 'DESC';
        }elseif(!empty($data['price_or']) && $data['price_or'] == 1){
            $orderField = 'shop_price';
            $order = 'ASC';
        }

        //销量
        if (!empty($data['hot_or']) && $data['hot_or'] == 0) {
            $orderField = 'click_count';
            $order = 'DESC';
        }elseif(!empty($data['hot_or']) && $data['hot_or'] == 1){
            $orderField = 'click_count';
            $order = 'ASC';
        }

        // 新品
        if (!empty($data['new_or']) && $data['new_or'] == 0) {
            $orderField = 'add_time';
            $order = 'DESC';
        }elseif(!empty($data['new_or']) && $data['new_or'] == 1){
            $orderField = 'add_time';
            $order = 'ASC';
        }

        $goodsList = $goods->showBrand('brand_id',$data['brand_id'],'2',$order,$orderField = '');
        if(empty($goodsList)){
            $goodsList = array('res'=>'1','msg'=>'该品牌下暂时没有商品');
        }
        die(json_encode($goodsList));
    }


    /*
     * 分页
     * */
    function pageStr($count,$onePage,$p= 1)
    {
        //总页数
        $sunPage = ceil($count/$onePage) ;
        //第一个
        $fistPage = '1';
        //上一页
        $upPage = $p - 1 < 1 ? 1 : $p - 1;
        //下一页
        $nextPage = $p + 1 > $sunPage ? $sunPage : $p + 1;

//                <div id="page_nav">
//                    <span class="pre">上一页</span>&nbsp;<span class="cur">1</span><a  href="html" class="next">下一页</a>&nbsp;
//                </div>
//
//                <div id="record">
//        共有&nbsp;774&nbsp;页，跳到第&nbsp;<input id="jtp" type="text" class="txt" maxlength="4" maxpage="774" value="" />&nbsp;页&nbsp;<a id="btnJtp" href="javascript:void(0);" class="btn">确定</a>
//                </div>


        $pageStr = '';
        $pageStr .='<div id="page_nav"><span class="pre"><a href="javascript:page('.$upPage.')">上一页</a></span>&nbsp;';
        $pageStr .='<a href="javascript:page('.$nextPage.')">下一页</a>&nbsp;</div>';

//        $pageStr .='共 '.$sunPage.' 页';
//        $pageStr .='当前页第 '.$p.' 页';
//        $pageStr .='每页 <input type="text" value="'.$onePage.'" class="onePage" alt="'.$p.'">';
//        $pageStr .='<a href="javascript:page('.$fistPage.')">第一页</a> ';
//        $pageStr .='<a href="javascript:page('.$upPage.')">上一页</a> ';
//        $pageStr .='<a href="javascript:page('.$nextPage.')">下一页</a> ';
//        $pageStr .='<a href="javascript:page('.$sunPage.')">末一页</a>';

        return $pageStr;
    }


}
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
use yii\data\Pagination;

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

        $count = Goods::find()->count();    //数据总条数

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

        $p = $data['p'];    //当前页

        $order = 'DESC';

        if(!empty($data['brand_name'])){
            $dataBrand = $brand->brandId($data['brand_name']);
            if(empty($dataBrand)){
                die(json_encode(array('res'=>'1','msg'=>'暂时没有该相似品牌')));
            }else{
                $brand_id = $dataBrand['brand_id'];
            }
        }

        if(!empty($data['sort'])){
            if($data['sort'] == 0){
                $orderField = 'shop_price';
                $order = 'DESC';
            }else if($data['sort'] == 1){
                $orderField = 'shop_price';
                $order = 'ASC';
            }else if($data['sort'] == 2){
                $orderField = 'click_count';
                $order = 'DESC';
            }else if($data['sort'] == 3){
                $orderField = 'add_time';
                $order = 'DESC';
            }
        }

        if(empty($data['brand_id'])){
            $brand_id = null;
        }else{
            $brand_id = $data['brand_id'];
        }

        $limit = ($p-1)*$this->onePage; //偏移量
        $count = Goods::find()->count();    //数据总条数

        $data['goodsList']= $goods->showBrand('brand_id',$brand_id,'2',$order,$orderField = '',$limit = '');
        if(empty($data['goodsList'])){
            die(json_encode(array('res'=>'1','msg'=>'该品牌下暂时没有商品')));
        }

        $data['pageStr'] = $this->pageStr($count,$this->onePage,$p);

        die(json_encode($data));
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
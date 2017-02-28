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
    public $onePage = '8';  //每页显示条数
    public $gt_id = '';  //手表分类ID

    /*
     * 男士手表展示
     * */
    public function actionBoylist()
    {
        $this->gt_id = '2';
        $goods = new Goods();   //商品
        $order = 'ASC';
        $data['goodsList'] = $goods->showType($this->gt_id,$order);
        $data['brandList'] = $this->BrandAll(); //查询品牌
        $count = Goods::find()->count();    //数据总条数
        $data['pageStr'] = $this->pageStr($count,$this->onePage);

        return $this->render('boy',['data'=>$data,'gt_id'=>$this->gt_id]);
    }

    /*
     * 女士手表展示
     * */
    public function actionGirllist()
    {
        $this->gt_id = '1';
        $goods = new Goods();   //商品
        $order = 'ASC';
        $data['goodsList'] = $goods->showType($this->gt_id,$order);
        $data['brandList'] = $this->BrandAll(); //查询品牌
        $count = Goods::find()->count();    //数据总条数
        $data['pageStr'] = $this->pageStr($count,$this->onePage);
        return $this->render('girl',['data'=>$data,'gt_id'=>$this->gt_id]);
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
        $this->gt_id = $data['gt_id'];
        $p = $data['p'];    //当前页

        $brand_id = isset($data['brand_id']) ? $data['brand_id'] : 'null';  //品牌ID

        // 根据商品名称获取商品ID
        if(!empty($data['brand_name'])){
            $dataBrand = $brand->brandId($data['brand_name']);
            if(empty($dataBrand)){
                die(json_encode(array('res'=>'1','msg'=>'暂时没有该相似品牌')));
            }else{
                $brand_id = $dataBrand['brand_id'];
            }
        }
        $order = 'DESC';    //默认排序方式
        if(!empty($data['sort'])){
            if($data['sort'] == 0){
                $orderField = 'shop_price';
            }else if($data['sort'] == 1){
                $orderField = 'shop_price';
                $order = 'ASC';
            }else if($data['sort'] == 2){
                $orderField = 'click_count';
            }else if($data['sort'] == 3){
                $orderField = 'add_time';
            }
        }else{
            $orderField = 'shop_price'; //默认排序字段
        }

        // 获取当前页 计算偏移量
        if(empty($p)){
            $limit = '0';
        }else{
            $limit = ($p-1)*$this->onePage; //偏移量
        }

        $data['goodsList']= $goods->showBrand('brand_id',$brand_id,$this->gt_id,$order,$orderField,$limit);

        if(empty($data['goodsList'])){
            die(json_encode(array('res'=>'1','msg'=>'该品牌下暂时没有商品')));
        }
        // 判断是否有条件 获取相应的商品数量
        if(is_numeric($brand_id)){
            $count = Goods::find()->where(['is_show'=>'1'])->andWhere(['gt_id'=>'2'])->andWhere(['brand_id'=>$brand_id])->count();    //数据总条数
        }else{
            $count = Goods::find()->where(['is_show'=>'1'])->andWhere(['gt_id'=>'2'])->count();    //数据总条数
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

        $pageStr = '';
        $pageStr .='<div id="page_nav"><a href="javascript:page('.$upPage.')">上一页</a>&nbsp;';
        $pageStr .='<a href="javascript:page('.$nextPage.')">下一页</a>&nbsp;</div>';

        return $pageStr;
    }

}
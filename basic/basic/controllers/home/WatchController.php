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

    /*
     * 男士手表展示
     * */
    public function actionBoylist()
    {
        $goods = new Goods();   //商品
        $request = \Yii::$app->request;
        $brand_id = $request->get('brand_id');

        if($request->isPost){
            //根据搜索框查询品牌下的所有男士手表
            $brandName = $request->post('brand_name');
            $goodsList = $this->brandname($brandName,'2');   //根据品牌名称查询商品
            if(empty($goodsList)){
                $data['goodsList'] = '1';
            }else{
                $data['goodsList'] = $goodsList;
            }
        }elseif(empty($brand_id)){
            //查询所有男士手表
            $data['goodsList'] = $goods->showType('2');
        }else{
            //根据品牌ID查询所有男士手表
            $goodsList = $goods->showBrand('brand_id',$brand_id,'2');
            if(empty($goodsList)){
                $data['goodsList'] = '1';
            }else{
                $data['goodsList'] = $goodsList;
            }
        }
        $data['brandList'] = $this->BrandAll(); //查询品牌
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
     * 根据品牌名称查询商品
     * */
    public function brandname($brandName,$gt_id)
    {
        $brand = new Brand();
        return $brand->brandGoods($brandName,$gt_id);    //获取到品牌下的所有商品
    }
}
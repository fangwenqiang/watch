<?php

namespace app\controllers\home;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Nav;  //模型层
use app\models\Category;  //模型层
use app\models\Goods;  //模型层



class IndexController extends CommonController
{
    //公共视图
    public  $layout = '/proscenium';


    /**
    * 首页
    * 
    * @param 
    * @author pjp
    */
    public function actionIndex()
    {
        //查询二三级分类
        $Category = new Category();
        $Goods = new Goods();
        $erRank = $Category->selectData(['rank'=>2]);
        $threeRank = $Category->selectData(['rank'=>3]);
        $goodsData = $Goods->whereData(['is_promote'=>1]);

        return $this->render('index',['erRank'=>$erRank,'threeRank'=>$threeRank,'goodsData'=>$goodsData]);
    }



    /**
    * 根据条件查询商品
    * 
    * @param 
    * @author pjp
    */
    public function actionCatedata()
    {
        $request = Yii::$app->request;
        $where = $request->get('where'); 
        $rank = $request->get('rank'); 
        if(Yii::$app->cache->get($where))
        {
            return Yii::$app->cache->get($where);
        }
        else
        {
            $Goods = new Goods();
            $goodsData = $Goods->whereData(['is_show'=>1]);
            Yii::$app->cache->set($where,json_encode($goodsData));

            return json_encode($goodsData);
        }


    }

}

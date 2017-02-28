<?php

namespace app\controllers\admin;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Session;
use app\models\Category;  //模型层
use app\models\Goods;  //模型层
use app\models\Nav;  //模型层

class IndexController extends  Controller
{
    //后台公共视图
    public $layout = '/background';

    /*
     * 导航-->首页
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /*  
     * 导航-->系统设置
     */
    public function actionSystem()
    {
        return $this->render('nav');
    }


    /**
    * 生成首页
    * 
    * @param
    * @author pjp
    */
    public function actionCreate_index()
    {
        $this->layout = '/proscenium';
        $file_path = './index.html';
        $msg = file_exists($file_path)?'首页更新成功！':'首页生成成功！';

        $nav_model = new Nav();
        $info = json_decode(file_get_contents('systemConfig.txt'),true);
        $nav_data = $nav_model->recursion();
        $view = YII::$app->view;
        $view->params['system'] = $info;
        $view->params['nav'] =    $nav_data;
        //查询二三级分类
        $Category = new Category();
        $Goods = new Goods();
        $erRank = $Category->selectData(['rank'=>2]);
        $threeRank = $Category->selectData(['rank'=>3]);
        $goodsData = $Goods->whereData(['is_promote'=>1]);
        //获取分类数据
        $Category = new Category();
        $categoryData = $Category->rank_select();
        $view->params['categoryData'] = $categoryData;
        $index = $this->render('/home/index/index',['erRank'=>$erRank,'threeRank'=>$threeRank,'goodsData'=>$goodsData]);
        file_put_contents('index.html', $index);
        //获取文件大小
        $file_size = round(filesize($file_path)/1024,2);
        $this->layout = false;
        return $this->render('message',['msg'=>$msg,'file_size'=>$file_size]);
    }
}

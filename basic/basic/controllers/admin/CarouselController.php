<?php
/** 
  * 轮播图
  */
namespace app\controllers\admin;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Admin\Test;  //模型层


class CarouselController extends Controller
{
    //后台公共视图
    public  $layout = '/background';
    /*
     * 导航-->首页
     */
    public function actionIndex()
    {
        return $this->render('carousel');
       
    }

 
}

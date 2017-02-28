<?php

namespace app\controllers\home;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Collect;  //模型层
use app\models\Integral_rule;  //模型层
use app\models\History;  //模型层


class PersonalController extends CommonController
{
    //前台公共视图
    public  $layout = '/proscenium';
    /*
     * 导航-->首页
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /*
     * 导航-->本期特价
     */
    public function actionSpecial()
    {

        return $this->render('special');
    }

    /*
     * 使用模型层
     */
    public function actionTest()
    {
        $model=new Test();
        echo $model->test();
    }
    public function actionMy_integral()
    {
    	$model=new Integral();
    	$user_id=2;
    	$integral_list=$model->show($user_id);
    	return $this->render('my_integral',['integral_list'=>$integral_list]);
    }
    public function actionIntegral_rule()
    {
    	$model=new Integral_rule();
    	$rule_list=$model->rule_show();
    	return $this->render('integral_rule',['rule_list'=>$rule_list]);
    }
    public function actionMy_collect()
    {
        $model=new Collect();
        $user_id=2;
        $collect_list=$model->show($user_id);
    	return $this->render('my_collect',['collect_list'=>$collect_list]);
    }
    
    public function actionMy_history()
    {
        $model=new History();
        $user_id=2;
        $history_list=$model->history_all($user_id);
        //var_dump($history_list);die;
        return $this->render('my_history',['history_list'=>$history_list]);
    } 
}

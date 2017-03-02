<?php

namespace app\controllers\home;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Collect;  //模型层
use app\models\Integral_rule;  //模型层
use app\models\History;  //模型层
use app\models\Comment;  //模型层


class PersonalController extends CommonController
{
    //前台公共视图
    public  $layout = '/personal';
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

    /*
     * 我的积分
     */
    public function actionMy_integral()
    {
    	$model=new Integral();
    	$integral_list=$model->show($_SESSION['user_id']);
    	return $this->render('my_integral',['integral_list'=>$integral_list]);
    }

    /*
     * 积分规则
     */
    public function actionIntegral_rule()
    {
    	$model=new Integral_rule();
    	$rule_list=$model->rule_show();
    	return $this->render('integral_rule',['rule_list'=>$rule_list]);
    }

    /*
     * 我的收藏
     */
    public function actionMy_collect()
    {
        $model=new Collect();
        $collect_list=$model->show($_SESSION['user_id']);
    	return $this->render('my_collect',['collect_list'=>$collect_list]);
    }
    
    /*
     * 最近访问
     */
    public function actionMy_history()
    {
        $model=new History();
        $history_list=$model->history_all($_SESSION['user_id']);
        return $this->render('my_history',['history_list'=>$history_list]);
    } 

    /*
     * 我的评论
     */
    public function actionMy_comment()
    {
        $model=new Comment();
        $comment_list=$model->people_comment($_SESSION['user_name']);
        return $this->render('my_comment',['comment_list'=>$comment_list]);
    }

    /*
     * 会员简介
     */
    public function actionMember_profile()
    {
        $model=new Comment();
        $comment_list=$model->people_comment($_SESSION['user_name']);
        return $this->render('member_profile');
    }

    /*
     * 礼品卡
     */
    public function actionGift_card()
    {
        $model=new Comment();
        $comment_list=$model->people_comment($_SESSION['user_name']);
        return $this->render('gift_card');
    }
}

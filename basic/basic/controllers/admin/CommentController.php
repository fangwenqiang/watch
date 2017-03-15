<?php

namespace app\controllers\admin;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Comment;  //模型层
use app\models\Reply;  //模型层


class CommentController extends CommonController
{
    //后台公共视图
    public  $layout = '/background';
	
    /*
     * 品牌-->展示页面
     */
    public function actionList()
    {
        $model=new Comment;
        //得到全部品牌下的数据
        $comment_list=$model->commentAll();
        return $this->render('list',['comment_list'=>$comment_list]);
    }
	
	/*
     * 评论回复页面
     */
    public function actionReply()
    {
    	if (Yii::$app->request->isPost) {
    		//接收数据
    		$post=Yii::$app->request->post();
			Yii::$app->db->createCommand()->update('mb_comment',['reply_status'=>1], 'comment_id=:id', array(':id' => $post['comment_id']))->execute();
    		$model=new Reply;
			//添加数据
	        $res=$model->replyAdd($post);
			if($res) {
				return $this->redirect(['admin/comment/msg', ['msg' => '回复成功','url'=>'/admin/comment/list']]);
			} else {
				return $this->redirect(['admin/comment/msg', ['msg' => '回复失败','url'=>'/admin/comment/list']]);
			}
		} else {
			$comment_id = Yii::$app->request->get('comment_id');
        	return $this->render('reply',['comment_id'=>$comment_id]);
		}		
        
    }
	
	/*
     * 评论回复页面
     */
    public function actionDelete()
    {
		$comment_id = Yii::$app->request->get('comment_id');
		$model = new Comment;
		$res = $model->commentDel($comment_id);
		if($res) {
			return $this->redirect(['admin/comment/msg', ['msg' => '删除成功','url'=>'/admin/comment/list']]);
		} else {
			return $this->redirect(['admin/comment/msg', ['msg' => '删除失败','url'=>'/admin/comment/list']]);
		}
        
    }
	
    /*
     * 跳转页面
     */
    public function actionMsg()
    {
        $request = Yii::$app->request;

        return $this->render('/error/msg',$request->get('1'));
    }
    
}

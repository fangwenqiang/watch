<?php
namespace app\models;
use Yii;

use yii\db\ActiveRecord;
use \yii\data\Pagination;
/*
 * 节点表模型
 * */
class Comment extends ActiveRecord{

    static public function tableName()
    {
        return '{{%comment}}';
    }

    /*
     * 查询数据
     * */
    public function show($goods_id)
    {
        return $this->find()
        ->select('*')
        ->leftJoin('mb_reply','mb_reply.comment_id=mb_comment.comment_id')
        ->where(['goods_id'=>$goods_id])->asArray()->All();
    }
	
	/*
     * 评论添加
     */
    public function commentAdd($post)
    {
    	unset($post['_csrf']);
		unset($post['order_id']);
        $res = Yii::$app->db->createCommand()->insert('mb_comment', $post)->execute();
        if($res)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	
	/*
     *查看全部数据
     */
    public function commentAll()
    {
        $arr = $this->find()
			->select('mb_comment.*,mb_goods.goods_name')
        	->leftJoin('mb_goods','mb_comment.goods_id=mb_goods.g_id');
		$pages = new Pagination([
			//'totalCount' => $countQuery->count(),
			'totalCount' => $arr->count(),
			'pageSize'   => 20   //每页显示条数
		]);
		$models = $arr->offset($pages->offset)
			->limit($pages->limit)->asArray()
			->all();
		$data['models'] = $models;
		$data['pages']  = $pages;
		return $data;
    }
	
	/*
     * 删除评论
     */
    public function commentDel($id)
    {
        $res = Yii::$app->db->createCommand()->delete('mb_comment','comment_id=:id', array(':id' => $id))->execute();
        if($res)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	
    public function people_comment($usere_name)
    {
        return $this->find()
        ->select('mb_comment.*,mb_goods.goods_name,mb_goods.shop_price')
        ->leftJoin('mb_goods','mb_comment.goods_id=mb_goods.g_id')
        ->where(['comment_people'=>$usere_name])
        ->asArray()
        ->All();
    }


}
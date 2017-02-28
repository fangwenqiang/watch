<?php
namespace app\models;
use Yii;

class Category extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'mb_category';
    }


    /*
     * 测试的方法
     */
    public function test()
    {
        return "欢迎使用后台模型";
    }



    /*
     * 分类-->查看单挑数据
     */
    public function cateOne($id)
    {
    	$data = Category::find()->where(['gt_id'=>$id])->one(); 
    	if($data)
    	{
    		return $data;
    	}
    	else
    	{
    		return false;
    	}
    }


    /*
     * 分类-->修改操作
     */
    public function cateUpdate($post)
    {
    	
    	$res = Yii::$app->db->createCommand()->update('mb_category',$post, 'gt_id=:id', array(':id' => $post['gt_id']))->execute();
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
     * 分类-->查看全部数据
     */
    public function cateAll()
    {
    	$data = Category::find()->asArray()->all(); 
    	if($data)
    	{
    		return $data;
    	}
    	else
    	{
    		return false;
    	}
    }


    /*
     * 分类-->删除单条数据
     */
    public function cateDel($id)
    {
        $res = Yii::$app->db->createCommand()->delete('mb_category','gt_id=:id', array(':id' => $id))->execute();
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
     * 分类-->添加数据
     */
    public function cateAdd($post)
    {
        $res = Yii::$app->db->createCommand()->insert('mb_category', $post)->execute();
        if($res) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    public function getall($arr,$gt_pid=0,$level=0)
    {
        static $temp=array();
        foreach ($arr as $key => $value) 
        {
            if($value['gt_pid']==$gt_pid)
            {
                $value['level']=$level;
                $value['str']=str_repeat('-',$level);
                $temp[]=$value;
                $this->getall($arr,$value['gt_id'],$level+1);
            }
            
        }
        return $temp;
    }


    /**
    * 分级查询分类
    * 
    * @param
    * @author pjp
    */
    public function rank_select()
    {
        $arr = $this->find()->where(['rank'=>1])->asArray()->all();
        foreach ($arr as $key => $value) 
        {
            if($value['gt_pid']==0)
            {
                $data[$key] = $value;
            }
            else
            {
                foreach ($data as $k => $v) 
                {
                    if($value['gt_pid']==$v['gt_id'])
                    {
                        $data[$k]['son'][] = $value; 
                    }
                }
            }
        }

        return $data;
    }


     /**
    * 分级查询分类
    * 
    * @param  $where 查询条件
    * @author pjp
    */
     public function selectData($where)
     {
        return  $this->find()->where($where)->asArray()->all();
     }
}
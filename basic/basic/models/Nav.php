<?php
namespace app\models;
use Yii;

class Nav extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%nav}}';
    }
    /*
     * 添加导航   0 添加  1 修改
     */
    public function add_Nav($arr,$type){
        $data = array_slice($arr,0,6);
        $data = array_filter($data);
        //查询所属导航的该条数据
        //value=0 提交过来为空，所以先赋值。
        if($data['nav_type'] == -1){
            $data['nav_type'] = 0;
        }
        $info =  Nav::find()->where(['nav_id' => $data['nav_type']])->asArray()->one();
        //导航
        $data['nav_link'] = '../../index.php?r='.$data['nav_link'];
        //拼接 nav_pid
        $data['nav_pid'] = $info['nav_pid']."-".$info['nav_id'];
        if($data['nav_type'] == 0){ $data['nav_pid'] =0;}
        //给nav_type赋值
        $data['nav_type'] = $info['nav_type']+1;
        if($type == 0){
            return \Yii::$app->db ->createCommand() ->insert('mb_nav',$data) ->execute();
        } else {
            return \Yii::$app->db ->createCommand()->update('mb_nav',$data,"nav_id=".$arr['id']) ->execute();
        }

    }
    /*
     *所有导航列表查询
     * $where  string
     */
    public function nav_List($where='')
    {
        $command=\Yii::$app->db->createCommand("SELECT `nav_id`, `nav_name`, `nav_place`, `nav_type`, `nav_link`, `nav_icon`, `nav_sort`, concat(nav_pid, '-', nav_id) AS `depath`, `nav_pid` FROM `mb_nav` ".$where."  ORDER BY `depath`");
        return $command->queryAll();
    }

    /*
     * 递归查询所有
     */

    public function recursion()
    {
        $arr =array();
        $arr1 = array();
        $info =  Nav::find()->asArray()->all();
        foreach($info as $key=>$val){
            if($val['nav_place'] == 1){
                $data['zhu'][] = $info[$key];
            } elseif($val['nav_place'] == 2) {
                $data['top'][] = $info[$key];
            } elseif($val['nav_place'] == 3 && $val['nav_type'] == 1){
                $arr[] = $info[$key];
            }else{
                $arr1[] = $info[$key];
            }
        }
        foreach($arr as $key=>$val){
            foreach($arr1 as $k=>$v){
                if($val['nav_pid'].'-'.$val['nav_id'] == $v['nav_pid']){
                    $arr[$key]['child'][] = $arr1[$k];
                }
            }
        }
        $data['bottom'] = $arr;
        return $data;
    }


    /*
     * 查询单条
     */
    public function selectOne($id)
    {
        return   Nav::find()->where(['nav_id' => $id])->asArray()->one();

    }


    /*
     * 删除导航
     */
    public function nav_del($id)
    {
        $info =  Nav::find()->where(['nav_id' => $id])->asArray()->one();
        if($info['nav_type'] == 3){
            return Nav::findOne($id)->delete();
        } else {
            return -1;
        }

    }

}
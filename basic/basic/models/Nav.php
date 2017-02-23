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
        $data = array_slice($arr,0,5);
        //查询所属导航的该条数据
        $info =  Nav::find()->where(['nav_id' => $data['nav_type']])->asArray()->one();
        //导航
        $data['nav_link'] = $_SERVER['SERVER_NAME'].'/'.$_SERVER['SCRIPT_NAME'].'?r='.$data['nav_link'];
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

    public function recursion($nav_pid=0)
    {
        $info =  Nav::find()->where(['nav_pid' => $nav_pid])->asArray()->all();
        if(count($info) >0){
            foreach($info as $key=>$val){
                $val['chind'][] = $this->recursion($val['nav_pid'].'-'.$val['nav_id']);
                $info[$key]= $val;
            }
        }
        return $info;
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
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/22
 * Time: 16:46
 */
namespace app\models;


use yii\base\Model;

class AdminForm extends Model{

    public $admin_id;
    public $username;
    public $password;
    public $espassword;
    public $email;

    /*
     * 验证
     * */
    public function rules()
    {
        return [
            [['username','email','password','espassword','admin_id'],'required','message'=>'{attribute}不能为空'],
            ['email','email','message'=>'{attribute}格式不正确'],
            ['password','match','pattern'=>'/^\w{4,20}$/','message'=>'{attribute}密码长度必须是4-9位字符'],
            ['espassword', 'compare','compareAttribute'=>'password','message'=>'{attribute}必须和密码相同']
        ];
    }

    /*
     * 添加数据入库
     * */
    public function create()
    {
        $transaction = \Yii::$app->db->beginTransaction();
        try{
            $model = new Admin();
            $model->username = $this->username;
            $model->password = substr(md5($this->password),0,20);
            $model->email = $this->email;
            if(!$model->save()){
                return \Exception('注册失败');
            }
            $transaction->commit();
            return true;
        }catch (\Exception $e){
            $transaction->rollBack();
            \Yii::$app->session->setFlash('waring',$e->getMessage());
            return false;
        }
    }

    /*
     * 修改数据
     * */
    public function update()
    {
        $transaction = \Yii::$app->db->beginTransaction();
        if($this->password == 20){
            $pwd = $this->password;
        }else{
            $pwd = md5($this->password);
        }
        try{
            $model = Admin::findOne($this->admin_id);
            $model->username = $this->username;
            $model->password = $pwd;
            $model->email = $this->email;
            if(!$model->save()){
                return \Exception('修改失败');
            }
            $transaction->commit();
            return true;
        }catch (\Exception $e){
            $transaction->rollBack();
            \Yii::$app->session->setFlash('waring',$e->getMessage());
            return false;
        }
    }

    /*
     * 指定名称
     * */
    public function attributeLabels()
    {
        return[
          'admin_id'=>'ID',
          'username'=>'管理员名称',
          'password'=>'密码',
          'espassword'=>'确认密码',
          'email'=>'E-mail地址'
        ];
    }


}
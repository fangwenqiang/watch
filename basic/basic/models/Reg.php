<?php

namespace app\models;


use yii\base\Model;

class Reg extends Model{

    public $user_id;
    public $username;
    public $password;
    public $espassword;
    public $email;
    public $tel;

    /*
     * 验证
     * */
    public function rules()
    {
        return [
            [['username','email','password','espassword'],'required','message'=>'{attribute}不能为空'],
            ['username','match','pattern'=>'/^[a-zA-Z0-9\x{4e00}-\x{9fa5}]{4,10}/u','message'=>'{attribute}用户名格式不符'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => '此用户名已被注册。'],
            ['email','email','message'=>'{attribute}邮箱格式不正确'],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => '此邮箱已被注册。'],
            ['tel','match','pattern'=>'/^[1][34578][0-9]{9}$/','message'=>'{attribute}手机号格式不正确'],
            ['tel', 'unique', 'targetClass' => '\app\models\User', 'message' => '此手机号已被注册。'],
            ['password','match','pattern'=>'/^^[a-zA-Z0-9]{6,15}$/','message'=>'{attribute}密码长度必须是6-15位字母或数字'],
            ['espassword', 'compare','compareAttribute'=>'password','message'=>'{attribute}必须和密码相同']
        ];
    }

    /*
     * 添加数据入库
     * */

    public function create()
    {
        return true();
    }


    /*
     * 指定名称
     * */
    public function attributeLabels()
    {
        return[
          'user_id'=>'ID',
          'username'=>'用户',
          'password'=>'密码',
          'espassword'=>'确认密码',
          'email'=>'E-mail地址',
          'tel'=>'手机号'
        ];
    }


}
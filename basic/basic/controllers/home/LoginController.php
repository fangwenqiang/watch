<?php

namespace app\controllers\home;

use app\models\User;
use app\models\Reg;
use app\models\Admin;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use app\models\Nav;  //模型层
/*
 * 前台登录注册
 * */

class LoginController extends CommonController
{
    // 前台公共视图
    public $layout = '/proscenium';

//登录
    public function actionLogin()
    {

        return $this->render('login');
    }

//注册

    public function actionReg()
    {
        $model = new Reg();
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if($model->load(\Yii::$app->request->post()) && $model->validate()) {
             echo"1";
            return $this->render('login');
        }
        return $this->render('reg',['model'=>$model]);
    }


//登录
    public function actionLogto()
    {
        $request = \Yii::$app->request->get();
        $user = $request['user'];
        $pwd = substr(md5($request['pwd']), 0, 20);
        $model = new User();
        $where['username'] = $user;
        $data = $model->select($where);
        if (empty($data)) {
            return 1;
        } else {
            if ($data[0]['password'] != $pwd) {
                return 2;
            } else {
                if ($data[0]['is_login'] == 0) {
                    return 3;
                } else {
                    $session = \Yii::$app->session;
                    $session->set('user_name', $user);
                    $session->set('user_id', $data[0]['user_id']);
                    return 0;
                }
            }
        }
    }

    //退出登录
    public
    function actionLogout()
    {
        $session = \Yii::$app->session;
        $session->remove('user_name');
        $session->remove('user_id');
        return $this->render('login');
    }


    /**
     * 页面跳转提示
     */
    public
    function actionMsg()
    {
        $layout = '/background';
        $request = \Yii::$app->request;
        return $this->render('/error/msg', $request->get('1'));
    }


    /**
     * 判断是否登录(ajax)
     */
    public
    function actionLogin_status()
    {
        $session = \Yii::$app->session;
        $user = $session->get('user_name');
        return $user ? $user : 0;
    }

    //发送手机验证码
    public function actionSend()
    {
        $session = \Yii::$app->session;
        //请求数据到短信接口，检查环境是否 开启 curl init。
        function Post($curlPost, $url)
        {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_NOBODY, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
            $return_str = curl_exec($curl);
            curl_close($curl);
            return $return_str;
        }

        //将 xml数据转换为数组格式。
        function xml_to_array($xml)
        {
            $reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
            if (preg_match_all($reg, $xml, $matches)) {
                $count = count($matches[0]);
                for ($i = 0; $i < $count; $i++) {
                    $subxml = $matches[2][$i];
                    $key = $matches[1][$i];
                    if (preg_match($reg, $subxml)) {
                        $arr[$key] = xml_to_array($subxml);
                    } else {
                        $arr[$key] = $subxml;
                    }
                }
            }
            return $arr;
        }

        //random() 函数返回随机整数。
        function random($length = 6, $numeric = 0)
        {
            PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
            if ($numeric) {
                $hash = sprintf('%0' . $length . 'd', mt_rand(0, pow(10, $length) - 1));
            } else {
                $hash = '';
                $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
                $max = strlen($chars) - 1;
                for ($i = 0; $i < $length; $i++) {
                    $hash .= $chars[mt_rand(0, $max)];
                }
            }
            return $hash;
        }

        //短信接口地址
        $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
        //获取手机号
        $mobile = $_GET['phone'];
        //获取验证码
        // $send_code = $_POST['send_code'];
        //生成的随机数
        $mobile_code = random(4, 1);
        if (empty($mobile)) {
            exit('手机号码不能为空');
        }
        //防用户恶意请求
        //        if(empty($_SESSION['send_code']) or $send_code!=$_SESSION['send_code']){
        //            exit('请求超时，请刷新页面后重试');
        //        }

        $post_data = "account=cf_chen1033&password=1693781072550ee8fe56f8b04b4fa6cc&mobile=" . $mobile . "&content=" . rawurlencode("您的验证码是：" . $mobile_code . "。请不要把验证码泄露给其他人。");
        //用户名是登录ihuyi.com账号名（例如：cf_demo123）
        //查看密码请登录用户中心->验证码、通知短信->帐户及签名设置->APIKEY
        $gets = xml_to_array(Post($post_data, $target));
        if ($gets['SubmitResult']['code'] == 2) {
            $session->set('mobile_code', $mobile_code);
        }
        echo $gets['SubmitResult']['msg'];

    }






}
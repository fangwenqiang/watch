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
use app\lib\cart;//基于cookie的自定义类
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

//QQ登录
    public function actionQqlogin()
    {
        //接收qq登录成功后返回的账号信息
        $request = \Yii::$app->request->get();
        $user = $request['a'];
        $sex = $request['b'];
        if ($sex == "男") {
            $sex = 1;
        } else {
            $sex = 0;
        }
        $model = new User();
        //判断之前是否登录过
        $where['username'] = $user;
        $data = $model->select($where);
        if (empty($data)) {
            //未登录则将账户写进数据库
            $model->username = $user;
            $model->sex = $sex;
            $model->save();
            $where['username'] = $user;
            $data2 = $model->select($where);
            $session = \Yii::$app->session;
            $session->set('user_name', $user);
            $session->set('user_id', $data2[0]['user_id']);
        } else {
            //登录过则跳过存库
            $session = \Yii::$app->session;
            $session->set('user_name', $user);
            $session->set('user_id', $data[0]['user_id']);
        }
        return $this->qt_success('home/index', '登录成功');

    }

//注册

    public function actionReg()
    {
        $model = new Reg();
        //验证表单
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            //验证通过后存库
            $model2 = new User;
            $request = \Yii::$app->request->post('Reg');
            $model2->username = $request['username'];
            $model2->password = substr(md5($request['password']), 0, 20);
            $model2->email = $request['email'];
            $model2->tel = $request['tel'];
            $model2->save();
            return $this->qt_success('home/login/login', '注册成功');

        }
        return $this->render('reg', ['model' => $model]);
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
            //判断账号是否存在
            return 1;
        } else {
            //判断密码是否正确
            if ($data[0]['password'] != $pwd) {
                return 2;
            } else {
                //判断该账户是否允许登录
                if ($data[0]['is_login'] == 0) {
                    return 3;
                } else {
                    //登录成功
                    $session = \Yii::$app->session;
                    $session->set('user_name', $user);
                    $session->set('user_id', $data[0]['user_id']);
                    //判断cookie中是否有购物车商品
                    $res = $this->actionAddcookie($data[0]['user_id']);

                    return 0;
                }
            }
        }
    }


    //cookie值加入购物车
    public function actionAddcookie($user_id)
    {
        $Cart = new cart();
        $res = $Cart->checkCart();
        if($res){
            $goods_desc = $Cart->CartView();
            foreach ($goods_desc[0] as $key => $value){
                $data[$key] = array_column($goods_desc,$key);
            }
            // var_dump($data);die;
            foreach ($data as $key => $value) {
                $cart_desc = \Yii::$app->db->createCommand("select * from mb_cart where goods_id=".$key." and user_id=".$user_id)->queryAll();
                if(empty($cart_desc)){
                    $arr['goods_id'] = $value[0];
                    $arr['goods_name'] = $value[1];
                    $arr['goods_sn'] = rand(1000,999999);
                    $arr['prices'] = $value[3]*$value[5];
                    $arr['price'] = $value[3];
                    $arr['num'] = $value[5];
                    $arr['user_id'] = $user_id;
                    $arr['type_attr_id'] = rand(1,9);
                    $res = \Yii::$app->db->createCommand()->insert('mb_cart',$arr)->execute(); 
                }else{
                    $update_value = ['num'=>$cart_desc[0]['num']+$value[5],'prices'=>($cart_desc[0]['num']+$value[5])*$cart_desc[0]['price']];
                    $res=\Yii::$app->db->createCommand()->update('mb_cart',$update_value,['goods_id'=>$value[0],'user_id'=>$user_id])->execute(); 
                }
            }

            //清空cookie
           $Cart->RemoveAll();
        }

        return $res;
    }


    //退出登录
    public function actionLogout()
    {
        $session = \Yii::$app->session;
        $session->remove('user_name');
        $session->remove('user_id');
        return $this->qt_success('home/login/login', '退出成功');
    }


    /**
     * 页面跳转提示
     */
    public function actionMsg()
    {
        $layout = '/background';
        $request = \Yii::$app->request;
        return $this->render('/error/msg', $request->get('1'));
    }


    /**
     * 判断是否登录(ajax)
     */
    public function actionLogin_status()
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
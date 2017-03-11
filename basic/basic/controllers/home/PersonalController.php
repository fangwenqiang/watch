<?php
/**
 * 个人中心、密码找回
 */
namespace app\controllers\home;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Collect;  //模型层
use app\models\Integral;  //模型层
use app\models\Integral_rule;  //模型层
use app\models\History;  //模型层
use app\models\Comment;  //模型层
use app\models\Order;
use app\lib\PHPMailer;

class PersonalController extends CommonController
{
    //前台公共视图
    public $layout = '/personal';

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
        $model = new Test();
        echo $model->test();
    }

	/*
     * 我的订单
     */
    public function actionMy_order()
    {
        $session = Yii::$app->session;
        $userId = $session->get('user_id');

        $whereArray = ['and','user_id='.$userId];

        //搜索条件
        $request = Yii::$app->request;
        if (Yii::$app->request->isPost) {
            $addTime = $request->post('addTime');
            $orderStatus = $request->post('orderStatus');
            $orderSn = addslashes($request->post('orderSn'));
            $whereArray = $this->getWhere($whereArray,['addTime'=>$addTime,'orderStatus'=>$orderStatus,'orderSn'=>$orderSn]);
        }


        //订单信息
        $orderInfo = (new \yii\db\Query())
            ->select(['order_id', 'order_sn', 'user_id', 'order_status', 'express_id', 'express_name', 'pay_id', 'pay_name', 'pay_status', 'goods_total_prices', 'add_time', 'country', 'province', 'city', 'district', 'address', 'mobile'])->from('{{%order_info}}')
            ->where($whereArray)
            ->all();

        //订单商品信息
        $orderId = array_column($orderInfo,'order_id');
        $orderGoods = (new \yii\db\Query())
            ->select([])->from('{{%order_goods}}')
            ->where(['in','order_id',$orderId])->all();

        $goodsId = array_column($orderGoods,'goods_id');
        //商品信息
        $goodsInfo = (new \yii\db\Query())
            ->select(['g_id','g_thumb'])->from('{{%goods}}')
            ->where(['in','g_id',$goodsId])->all();
        //处理商品图片
        foreach ($orderGoods as $k=>$v){
            foreach ($goodsInfo as $m=>$n){
                if($v['goods_id'] == $n['g_id']) $orderGoods[$k]['img'] = $n['g_thumb'];
            }
        }

        //合并订单信息与订单商品信息
        foreach ($orderInfo as $k=>$v){
            foreach ($orderGoods as $m=>$n){
                if( $n['order_id'] == $v['order_id']) $orderInfo[$k]['orderGoods'][] = $orderGoods[$m];
            }
        }

        return $this->render('my_order',['orderInfo'=>$orderInfo]);
    }

    protected function getWhere($where,$arr)
    {
        //订单号
        if(!empty($arr['orderSn'])) array_push($where,'order_sn="'.$arr['orderSn'].'"');
        //订单状态
        switch ($arr['orderStatus']){
            case '1': //查未确认订单
                array_push($where,'order_status=0');
                break;
            case '2'://已确认
                array_push($where,'order_status=1');
                break;
            case '3'://待发货
                array_push($where,'express_status=0');
                break;
            case '4'://已发货
                array_push($where,'order_status=2');
                break;
            case '5'://待支付
                array_push($where,'pay_status=0');
                break;
            case '6'://已支付
                array_push($where,'pay_status=1');
                break;
            case '7'://已取消
                array_push($where,'order_status=-1');
                break;
            case '8'://已退货
                array_push($where,'order_status=-2');
                break;
            case '9'://成功交易
                array_push($where,'order_status=3');
                break;
        }
        //订单创建时间
        switch ($arr['addTime']){
            case '1'://一个月订单
                array_push($where,['between', 'add_time',strtotime('-1 month'),time()]);
                break;
            case '2'://三个月
                array_push($where,['between', 'add_time',strtotime('-3 month'),time()]);
                break;
            case '3'://一年
                array_push($where,['between', 'add_time',strtotime('-1 year'),time()]);
                break;
        }
        return $where;

    }

    /*
     * 编辑资料
     */
    public function actionMessage()
    {
        return $this->render('message');
    }

	/*
     * 我的预售
     */
    public function actionMy_presell()
    {
        return $this->render('my_presell');
    }
	
	/*
     * 我的收货地址
     */
    public function actionMy_address()
    {
        return $this->render('my_address');
    }
	
    /*
     * 我的积分
     */
    public function actionMy_integral()
    {
        $model = new Integral();
        $integral_list = $model->show($_SESSION['user_id']);
        return $this->render('my_integral', ['integral_list' => $integral_list]);
    }

    /*
     * 积分规则
     */
    public function actionIntegral_rule()
    {
        $model = new Integral_rule();
        $rule_list = $model->rule_show();
        return $this->render('integral_rule', ['rule_list' => $rule_list]);
    }

    /*
     * 我的收藏
     */
    public function actionMy_collect()
    {
        $model = new Collect();
        $collect_list = $model->show($_SESSION['user_id']);
        return $this->render('my_collect', ['collect_list' => $collect_list]);
    }

    /*
     * 最近访问
     */
    public function actionMy_history()
    {
        $model = new History();
        $history_list = $model->history_all($_SESSION['user_id']);
        return $this->render('my_history', ['history_list' => $history_list]);
    }

    /*
     * 我的评论
     */
    public function actionMy_comment()
    {
        $model = new Comment();
        $comment_list = $model->people_comment($_SESSION['user_name']);
        return $this->render('my_comment', ['comment_list' => $comment_list]);
    }

    /*
     * 会员简介
     */
    public function actionMember_profile()
    {
        $model = new Comment();
        $comment_list = $model->people_comment($_SESSION['user_name']);
        return $this->render('member_profile');
    }

    /*
     * 礼品卡
     */
    public function actionGift_card()
    {
        $model = new Comment();
        $comment_list = $model->people_comment($_SESSION['user_name']);
        return $this->render('gift_card');
    }

    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    /**
     * 密码找回
     * @access public
     * @return string
     */
    public function actionBack_password()
    {
        $this->layout = '/proscenium' ;
        return $this->render('forgetPwd');
    }

    /**
     * 检测找回密码邮箱
     * @access public
     * @return mixed
     */
    public function actionCheckemail()
    {
        $request = Yii::$app->request;
        $email = $request->post('email');
        if (!preg_match_all('/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/', $email)) return json_encode(['code'=>0,'message'=>'请填写正确邮箱地址!']);

        $userArr = (new \yii\db\Query())
            ->select([])->from('{{%user}}')
            ->where('email=:email', [':email' => $email])->one();
        if (!$userArr) return json_encode(['code'=>1,'message'=>'该邮箱地址不存在!']);

        // 防止乱刷，一分钟只允许正确请求3次
        $cookies = Yii::$app->request->cookies;
        $cookie = Yii::$app->response->cookies;
        if(!$cookies->has('num')){
            $time = time();
            $cookie->add(new \yii\web\Cookie([
                'name' => 'num',
                'value' => 1,
                'expire'=>$time+60
            ]));
            $cookie->add(new \yii\web\Cookie([
                'name' => 'time',
                'value' => $time,
                'expire'=>$time+60
            ]));
        } else {
            $num = $cookies->get('num')->value;
            $time = $cookies->get('time')->value;
            $t = 60-(time()-$time);
            if($num > 2) return json_encode(['code'=>4,'message'=>$t]);

            $cookie->add(new \yii\web\Cookie([
                'name' => 'num',
                'value' => $num+1,
                'expire'=>$time+60
            ]));
        }

        //发送件进性修改密码
        $nowTime = time();
        $endTime = $nowTime+30*60;
        
        $url = 'http://'.$_SERVER['SERVER_NAME'].'/index.php?r=home/personal/back_pwd_html&n='.$nowTime.'&e='.$endTime.'&k='.($nowTime+3258);
        $content = '<h3>密码找回申请</h3><p>您收到这封电子邮件是因为您 (也可能是某人冒充您的名义)申请了一个找回密码的请求。假如这不是您本人所申请, 或者您曾持续收到这类的信件骚扰,请您尽快联络管理员。您可以点击如下链接重新设置您的密码。本链接30分钟有效</p>
        <a href="' . $url . '">立即找回</a>
        <p>如果点击无效，请把上面的连接拷贝到浏览器的地址栏中</p>';

        $res = $this->sendEmail(['email'=>$email,'content'=>$content]);
        return $res ? json_encode(['code'=>2,'message'=>'邮件已发送至你的邮箱，请及时查看']) : json_encode(['code'=>3,'message'=>'邮件发送失败，请重新发送！']);
    }

    /**
     * 找回密码页面
     * @access public
     * @return string
     */
    public function actionBack_pwd_html()
    {
        $request = Yii::$app->request;
        $startTime = $request->get('n');
        $endTime = $request->get('e');
        $nowTime = time();
        $url = \yii\helpers\Url::to(['home/personal/back_password']);

        //判断连接是否超过半小时
         if(($nowTime-$startTime)>60*30 | $nowTime > $endTime) return '该链接已失效<a href="'.$url.'">重新获取</a>';

        return $this->render('back_pwd_html');

    }

    /**
     * 修改密码
     * @return int
     * @throws \yii\db\Exception
     */
    public function actionUpdate_pwd()
    {
        $request = Yii::$app->request;
        $user = addslashes($request->post('user'));
        $pwd = addslashes($request->post('pwd'));
        $pwd = substr(md5($pwd),0,20);
        $connection = \Yii::$app->db;

        return $connection->createCommand()
            ->update('{{%user}}', ['password' => $pwd], 'username = "'.$user .'"')
            ->execute();

    }

    /**
     * 密码重置时验证用户名和验证码
     * @access public
     * @return string
     */
    public function actionCheck()
    {
        $request = Yii::$app->request;
        $type = $request->post('type');
        $val = addslashes($request->post('val'));

        if($type == 1 ){
            //验证用户名
            $user = (new \yii\db\Query())
                ->select([])->from('{{%user}}')
                ->where('username=:username', [':username' => $val])->one();
            return $user ? 'true' : 'false' ;

        } elseif($type == 2) {
            //验证验证码
            $cookies = Yii::$app->request->cookies;
            if(!$cookies->has('captcha')) return 'false';
            return ($cookies->get('captcha')->value == $val) ? 'true' : 'false' ;
        }
        return 'false';
    }

    /**
     * 获取验证码，3分钟有效
     * @access public
     * @return mixed
     */
    public function actionGet_captcha()
    {
        $request = Yii::$app->request;
        $tel = $request->post('tel');
        if (!preg_match_all('/^1[3|4|5|7|8]\d{9}$/', $tel)) return json_encode(['code'=>0,'message'=>'手机号错误!']);
        //防止重复刷
        $cookies = Yii::$app->request->cookies;
        if($cookies->has('captcha')) return json_encode(['code'=>0,'message'=>'您已获取，请稍后再试']);

        $num = $this->Random(6);
        $target    = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
        $post_data = "account=cf_fwq103&password=d82d57fe3e4a077f5661d24795b0e936&mobile=".$tel."&content=".rawurlencode("您的验证码是：".$num."。请不要把验证码泄露给其他人。");
        $gets =  $this->xml_to_array($this->Post($post_data, $target));

        if (($gets['SubmitResult']['code']==2)){
            $cookie = Yii::$app->response->cookies;
            $cookie->add(new \yii\web\Cookie([
                'name' => 'captcha',
                'value' => $num,
                'expire'=>time()+60*3
            ]));
            return json_encode(['code'=>1,'message'=>'验证码已发送至您的手机，3分钟内有效，请注意查收']);
        } else {
            return json_encode(['code'=>0,'message'=>'验证码发送失败']);
        }
    }

    //--------------------------------BEGIN短信验证---------------------------------------------

    /**
     * 请求数据到短信接口，检查环境是否 开启 curl init。
     * @param $curlPost
     * @param $url
     * @return mixed
     */
    private function Post($curlPost,$url)
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

    /**
     * 将 xml数据转换为数组格式。
     * @param $xml
     * @return mixed
     */
    private function xml_to_array($xml)
    {
        $reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
        if(preg_match_all($reg, $xml, $matches)){
            $count = count($matches[0]);
            for($i = 0; $i < $count; $i++){
                $subxml= $matches[2][$i];
                $key = $matches[1][$i];
                if(preg_match( $reg, $subxml )){
                    $arr[$key] = $this->xml_to_array( $subxml );
                }else{
                    $arr[$key] = $subxml;
                }
            }
        }
        return $arr;
    }

    /**
     * 获取指定位数随机数
     * @param $length 位数
     * @param bool $numeric 是否需要字母
     * @return string
     */
    private function Random($length , $numeric = false)
    {
        PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
        if(!$numeric) {
            $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
        } else {
            $hash = '';
            $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
            $max = strlen($chars) - 1;
            for($i = 0; $i < $length; $i++) {
                $hash .= $chars[mt_rand(0, $max)];
            }
        }
        return $hash;
    }

    //--------------------------------------END短信验证--------------------------------------------

    /**
     * 发送邮件
     * @param array $info
     * @return bool
     * @throws \app\lib\phpmailerException
     */
    protected function sendEmail($info)
    {
        $mail = new PHPMailer();
        /*服务器相关信息*/
        $mail->IsSMTP();                     //设置使用SMTP服务器发送
        $mail->SMTPAuth = true;           //开启SMTP认证
        $mail->Host = 'smtp.163.com';  //设置 SMTP 服务器,自己注册邮箱服务器地址,注册什么邮箱就写什么邮箱的服务器，如果是新浪就写smtp.sina.com
        $mail->Username = 'fwq_103@163.com';           //发信人的邮箱名称
        $mail->Password = 'hijq4236753';             //发信人的邮箱授权码不是密码，注册的时候要填写的

        /*内容信息*/
        $mail->IsHTML(true);          //指定邮件格式为：html 不加true默认为以text的方式进行解析
        $mail->CharSet = "UTF-8";                           //编码
        $mail->From = 'fwq_103@163.com';                 //发件人完整的邮箱名称
        $mail->FromName = '她说他叫强哥';              //发信人署名
        $mail->Subject = '密码找回页面申请';         //信的标题

        //QQ邮箱使用时
        // $mail->SMTPSecure   = 'ssl';
        // $mail->Port         ='465';

        $mail->MsgHTML($info['content']);                          //发信主体内容
        // $mail->AddAttachment("jquery.min.1.8.2.js");   //附件

        /*发送邮件*/
        $mail->AddAddress($info['email']);             //收件人地址

        //使用send函数进行发送
        return $mail->Send();
    }

}

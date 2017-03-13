<?php
namespace app\lib;
header("content-type:text/html;charset=utf-8");
class Pay 
{

    /*
     * $order_sn :订单号
     * $total_price :价格
     */
    public  function pay_url($order_sn,$total_price)
    {
        //合作身份者id，以2088开头的16位纯数字
        $config['alipay_config']['partner']   = '2088121321528708';
        //收款支付宝账号
        $config['alipay_config']['seller_email']  = 'itbing@sina.cn';
        $config['alipay_config']['key']     = '1cvr0ix35iyy7qbkgs3gwymeiqlgromm';
        $config['alipay_config']['sign_type']    = strtoupper('MD5');
        $config['alipay_config']['transport']    = 'http';

        //获取配置元素
        $alipay_config = $config['alipay_config'];
        $parameter = array(
            "service" => "create_direct_pay_by_user",
            "partner" => $alipay_config['partner'], // 合作身份者id
            "seller_email" => $alipay_config['seller_email'], // 收款支付宝账号
            "payment_type"  => '1', // 支付类型
            "notify_url"  => "http://www.superfay.com/1.php", // 服务器异步通知页面路径
            "return_url"  => "http://www.v.com/OrderCentre.php?r=home/order/check_order", // 页面跳转同步通知页面路径
            "out_trade_no"  => $order_sn, // 商户网站订单系统中唯一订单号
            "subject" => 'pjpmailorder', // 订单名称
            "total_fee" => $total_price, // 付款金额
            "body"  => "pjpmail", // 订单描述 可选
            "_input_charset"  => 'utf-8', // 字符编码格式
        );
        // 去除值为空的参数
        foreach ($parameter as $k => $v) {
            if (empty($v)) {
                unset($parameter[$k]);
            }
        }
        // 参数排序
        ksort($parameter);
        reset($parameter);

        // 拼接获得sign
        $str = "";
        foreach ($parameter as $k => $v) {
            if (empty($str)) {
                $str .= $k . "=" . $v;
            } else {
                $str .= "&" . $k . "=" . $v;
            }
        }
        $parameter['sign'] = md5($str . $alipay_config['key']); // 签名
        $parameter['sign_type'] = $alipay_config['sign_type'];
        //传输参数,生成链接
        $pay_url = "https://mapi.alipay.com/gateway.do?".$str."&sign=".$parameter['sign'].'&sign_type='.$alipay_config['sign_type'];

        return $pay_url;
    }
}
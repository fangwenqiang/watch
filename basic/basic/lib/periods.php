<?php
namespace app\lib;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/25
 * Time: 9:38
 */
class Periods
{
    private $interestRate=0.05;
    private $serviceCharge=0.01;


   /*
    * 自动计算分期
    * @paren $prices
    * @return Array
    */
    public function compute($prices)
    {
        $arr = array();
        // $arr['filed'] = array('goods_price'=>'商品总金额',
        //     'repayment_amount'=>'商品+利息总金额',
        //     'terminally_corpus'=>'每期本金',
        //     'terminally_interests' => '每期利息',
        //     'interest_rate' => '利率',
        //     'terminally_serviceCharge'=>'每期服务费',
        //     'terminally_price' => '每期还款金额'
        // );
        for($i=1;$i<=6;$i++){
           $periods = $i*3; //期数
           $arr[$periods]['goods_price'] = $prices;   //商品总金额
           $arr[$periods]['repayment_amount'] = $prices+$prices*$this->interestRate*$periods; //商品+利息总金额
           $arr[$periods]['terminally_corpus'] = $prices/$periods;   //每期本金
           $arr[$periods]['terminally_interests'] = $prices*$this->interestRate;   //每期利息
           ($periods != 3)? $arr[$periods]['terminally_serviceCharge'] = round(($prices/$periods)*0.01,2):$arr[$periods]['terminally_serviceCharge'] = 0;  //每期服务费
           $arr[$periods]['interest_rate'] = ($prices/$periods)*0.01;          //利率
           $arr[$periods]['terminally_price'] =  round($arr[$periods]['terminally_serviceCharge']+$arr[$periods]['terminally_corpus']+ $arr[$periods]['terminally_interests']+ $arr[$periods]['interest_rate'],2);          //利率
        }
        return $arr;
    }




   /*
    * 返回指定分期数据
    * @paren $prices
    * @return Array
    */
    public function assignStages($prices,$periods)
    {
        $arr = array();
        $arr['filed'] = array('goods_price'=>'商品总金额',
            'repayment_amount'=>'商品+利息总金额',
            'terminally_corpus'=>'每期本金',
            'terminally_interests' => '每期利息',
            'interest_rate' => '利率',
            'terminally_serviceCharge'=>'每期服务费',
            'terminally_price' => '每期还款金额'
        );
           $repayment_amount = $prices+$prices*$this->interestRate*$periods;  //商品+利息总金额
           $terminally_corpus =  $prices/$periods; //每期本金
           $terminally_interests =  $prices*$this->interestRate; //每期利息
           $terminally_serviceCharge =  ($prices/$periods)*$this->serviceCharge;  //利率
           $arr['goods_price'] = $prices;
           $arr['repayment_amount'] = $repayment_amount;
           $arr['terminally_corpus'] = $terminally_corpus;
           $arr['terminally_interests'] = $terminally_interests;
           $arr['interest_rate'] = $this->interestRate;
           ($periods != 3)? $arr['terminally_serviceCharge'] = $terminally_serviceCharge:$arr['terminally_serviceCharge']=0;  //每期服务费
           $arr['terminally_price'] = round($terminally_corpus + $terminally_interests + $terminally_serviceCharge,2);
        return $arr;
    }
}
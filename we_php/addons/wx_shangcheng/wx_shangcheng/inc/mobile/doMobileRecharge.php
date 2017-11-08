<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(dirname(__FILE__) . "/../../model/parConfig.php");
require_once(dirname(__FILE__) . "/../../model/picConfig.php");
require_once(dirname(__FILE__) . "/../../model/user.php");
require_once(dirname(__FILE__) . "/../../model/order.php");
require_once(dirname(__FILE__) . "/../../model/pay.php");

global $_GPC,$_W;
$sy_weid_sy = $_W['uniacid'];               //获取当前公众号ID
$level = $_W['account']['level'];//获取公众号类型
$sy_openid_sy=$_W['openid'];//获取用户openid
$sy_information_sy = $_W['fans'];//获取用户信息
$sy_op_sy=$_GPC['sy_op_sy'];//获取操作类型
if ($level != 4) $sy_information_sy = mc_fansinfo($openid);
if(empty($sy_openid_sy)||$sy_information_sy['follow']=='0'){
    $this->doMobilePrompt();
    exit;
}
$sy_wx_name_sy=ParConfigModel::getWxName();//获取当前配置的平台名称

$sy_user_sy=userModel::getUserByOpenId($sy_openid_sy);//获取当前用户信息

//操作类型为支付执行支付
if($sy_op_sy=="sy_pay_sy"){



    $sy_pay_price_sy=$_GPC['sy_pay_price_sy'];//获取要重置的价格
    $sy_order_id_sy=$_W['timestamp'];//将时间戳赋值给订单ID
    $sy_time_sy=date('Y-m-d H:i:s', $sy_order_id_sy);//将当前时间戳转换为时间格式

    //创建支付表要插入数据
    $sy_data_sy=array(
        'sy_weid_sy'=>$sy_weid_sy,
        'sy_uid_sy'=>$sy_user_sy['sy_id_sy'],
        'sy_order_id_sy'=>$sy_order_id_sy,
        'sy_num_sy'=>$sy_pay_price_sy,
        'sy_create_time_sy'=>$sy_time_sy,
        'sy_update_time_sy'=>$sy_time_sy,
    );


    //创建收银台要插入数据
    $params = array(
        'tid' => $sy_order_id_sy,      //充值模块中的订单号，此号码用于业务模块中区分订单，交易的识别码
        'ordersn' => $sy_order_id_sy,  //收银台中显示的订单号
        'title' => "余额充值",          //收银台中显示的标题
        'fee' => $sy_pay_price_sy,      //收银台中显示需要支付的金额,只能大于 0
        'user' => $sy_user_sy['sy_id_sy'],     //付款用户, 付款的用户名(选填项)
    );


    payModel::createPay($sy_data_sy);//插入一条新支付记录
    $this->pay($params);
    exit;

}
include $this->template('recharge');
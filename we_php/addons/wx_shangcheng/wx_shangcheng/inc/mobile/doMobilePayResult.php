<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once(dirname(__FILE__) . "/../../model/pay.php");
require_once(dirname(__FILE__) . "/../../model/user.php");
global $_W,$_GPC;
$weid=$_W['uniacid'];//获取当前公众号ID
$openid=$_W['openid'];//获得当前用户ID

$_GPC['sy_pid_sy']=$params['tid'];//获取支付编号
$result=payModel::getPay();//获取该支付应支付价格
/*判断输入金额与应付金额是否相同*/
if($params['result'] == 'success' && $params['from'] == 'notify'){
    if($params['fee']==$result['sy_num_sy']){
        exit('用户支付的金额与订单金额不符合');
    }

}

/*调微擎支付页面，并跟新未支付订单为已支付*/
if ($params['from'] == 'return') {
    if ($params['result'] == 'success') {


        $sy_timestamp_sy=$_W['timestamp'];//获得当前时间戳
        $sy_time_sy=date('Y-m-d H:i:s', $sy_timestamp_sy);//将当前时间戳转换为时间格式

        //创建更新支付状态的数据
        $sy_pay_data_sy=array(
            'sy_status_sy'=>1,       //支付状态为1=以支付
            'sy_update_time_sy'=>$sy_time_sy,
            );

        //创建更新用户的数据
        $sy_user_data_sy=array(
            'sy_add_price_sy'=>$params['fee'],
            'sy_last_time_to_recharge_sy'=>$sy_time_sy,
        );

        userModel::updateBalance($sy_user_data_sy,2);//更新用户信息
        payModel::updatePay($sy_pay_data_sy);//更新支付表支付状态

        message('支付成功！', '../../app/' . $this->createMobileUrl('personal'));
    } else {

        message('支付失败！', '../../app/' .  $this->createMobileUrl('personal'));
    }
}
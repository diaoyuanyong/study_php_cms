<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once(dirname(__FILE__) . "/../../model/parConfig.php");
require_once(dirname(__FILE__) . "/../../model/user.php");
require_once(dirname(__FILE__) . "/../../model/order.php");
global $_GPC,$_W;
$img=2;
$sy_op_sy=$_GPC['sy_op_sy'];//获取操作类型
$sy_id_sy=$_GPC['sy_id_sy'];//获取订单ID
$level = $_W['account']['level'];//获取公众号类型
$sy_openid_sy=$_W['openid'];//获取用户openid
$sy_information_sy = $_W['fans'];//获取用户信息
$img = isset($sy_information_sy['tag']['avatar'])?$sy_information_sy['tag']['avatar']:"";

if(empty($sy_openid_sy)||$sy_information_sy['follow']=='0'){
    $this->doMobilePrompt();
    exit;
}
$sy_timestamp_sy=$_W['timestamp'];//获得当前时间戳
$sy_time_sy=date('Y-m-d H:i:s', $sy_timestamp_sy);//将当前时间戳转化为时间格式
$sy_user_sy=userModel::getUserByOpenId($sy_openid_sy);//根绝openid获取用户信息
$sy_datas_sy=orderModel::getUserOrder();//获取当前用户发布的信息



if ($sy_op_sy=='del'){
    $sy_judge_openid_sy=orderModel::getOpenidByOid($sy_id_sy);//根绝订单ID 获取OPENID

    if ($sy_openid_sy===$sy_judge_openid_sy) {
        $type = 0;
        if (orderModel::delUserOrder($sy_id_sy, $type)){
            message("删除成功");
        }else{
            message("删除失败");
        }
    }else{
        message("操作错误");
    }
    exit;
}

$sy_wx_name_sy=ParConfigModel::getWxName();//获取当前配置的平台名称
$nickname  = $_W['fans']['nickname'];

$isOpenRecharge= ParConfigModel::getIsOpenRecharge(); //获得是否打开充值提示




include $this->template('personal');
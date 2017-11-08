<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(dirname(__FILE__) . "/../../model/picConfig.php");
require_once(dirname(__FILE__) . "/../../model/parConfig.php");
require_once(dirname(__FILE__) . "/../../model/user.php");
require_once(dirname(__FILE__) . "/../../model/order.php");
global $_W,$_GPC;
$img=0;
$weid=$_W['uniacid'];//获取当前公众号ID
$sy_op_sy=$_GPC['sy_op_sy'];//获取操作类型
$sy_user_num_sy=userModel::getUserCount();//获取用户总数
$sy_order_count_sy=orderModel::getListCount();//获取订单总数
orderModel::updataIstop();//更新所有置顶订单置顶状态

$sy_wx_name_sy=ParConfigModel::getWxName();//获取当前配置的平台名称
$sy_wx_logo_sy=ParConfigModel::getWxLogo();//获取当前微信端LOGO
$sy_pics_sy=PicConfigModel::getall($weid);//获取当前公众号所有轮播图片信息
include $this->template('index');

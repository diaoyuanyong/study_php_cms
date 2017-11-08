<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(dirname(__FILE__) . "/../../model/order.php");
require_once(dirname(__FILE__) . "/../../model/parConfig.php");

global $_W,$_GPC;
$weid=$_W['uniacid'];//获取当前公众号ID
$sy_id_sy=$_GPC['sy_id_sy'];//获取订单ID
$sy_data_sy=orderModel::getOrder($sy_id_sy);//查询当前订单详情信息
orderModel::AddClick();//点击量加1



$sy_wx_logo_sy=ParConfigModel::getWxLogo();//获取当前微信端LOGO

$sy_wx_name_sy=ParConfigModel::getWxName();//获取当前配置的平台名称

include $this->template('details');
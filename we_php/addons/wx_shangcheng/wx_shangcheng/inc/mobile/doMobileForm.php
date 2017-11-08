<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(dirname(__FILE__) . "/../../model/parConfig.php");
require_once(dirname(__FILE__) . "/../../model/user.php");
global $_GPC,$_W;
$img=1;
$level = $_W['account']['level'];//获取公众号类型
$sy_openid_sy=$_W['openid'];//获取用户openid
$sy_information_sy = $_W['fans'];//获取用户信息
if ($level != 4) $sy_information_sy = mc_fansinfo($openid);
if(empty($sy_openid_sy)||$sy_information_sy['follow']=='0'){
    $this->doMobilePrompt();
    exit;
}
$sy_user_sy=userModel::getUserByOpenId($sy_openid_sy);//获取当前用户信息
$sy_price_looking_for_passengers_sy=ParConfigModel::getPrice1();//获取商城找人价格
$sy_isTop_price1_sy=ParConfigModel::getIsTopPrice1();//获取商城找人置顶1天价格
$sy_isTop_price2_sy=ParConfigModel::getIsTopPrice2();//获取商城找人置顶3天价格
$sy_price_looking_for_driver_sy=ParConfigModel::getPrice2();//获取人找商城价格
$sy_isTop_price3_sy=ParConfigModel::getIsTopPrice3();//获取人找商城置顶1天价格
$sy_isTop_price4_sy=ParConfigModel::getIsTopPrice4();//获取人找商城置顶3天价格

$sy_wx_name_sy=ParConfigModel::getWxName();//获取当前配置的平台名称
$sy_role_text_sy=ParConfigModel::getWxText();//获取配置规则文本

$isOpenRecharge= ParConfigModel::getIsOpenRecharge(); //获得是否打开充值提示


$isStick = ParConfigModel::getIsStick(); //获得是否允许发布置顶信息





include $this->template('form');
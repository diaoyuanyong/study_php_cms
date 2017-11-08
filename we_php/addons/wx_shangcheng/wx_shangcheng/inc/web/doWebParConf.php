<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * 参数配置相关
 */
require_once(dirname(__FILE__) . "/../../model/parConfig.php");
global $_GPC,$_W;

if(isset($_GPC['sy_name_sy'])){
    ParConfigModel::setWxName($_GPC['sy_name_sy']);
}

if(isset($_GPC['sy_newUserPresent_sy'])){
    ParConfigModel::setNewUserPresent($_GPC['sy_newUserPresent_sy']);
}
if(isset($_GPC['sy_price1_sy'])){
    ParConfigModel::stePrice1   ($_GPC['sy_price1_sy']);
}

if(isset($_GPC['sy_isTop_price1_sy'])){
    ParConfigModel::steIsTopPrice1  ($_GPC['sy_isTop_price1_sy']);
}

if(isset($_GPC['sy_isTop_price2_sy'])){
    ParConfigModel::steIsTopPrice2   ($_GPC['sy_isTop_price2_sy']);
}

if(isset($_GPC['sy_price2_sy'])){
    ParConfigModel::stePrice2($_GPC['sy_price2_sy']);
}

if(isset($_GPC['sy_isTop_price3_sy'])){
    ParConfigModel::steIsTopPrice3   ($_GPC['sy_isTop_price3_sy']);
}

if(isset($_GPC['sy_isTop_price4_sy'])){
    ParConfigModel::steIsTopPrice4   ($_GPC['sy_isTop_price4_sy']);
}

if(isset($_GPC['sy_wx_logo_sy'])){
    ParConfigModel::setWxLogo($_GPC['sy_wx_logo_sy']);
}

if(isset($_GPC['sy_wx_code_sy'])){
    ParConfigModel::setWxCode($_GPC['sy_wx_code_sy']);
}

if(isset($_GPC['sy_role_text_sy'])){
    ParConfigModel::setWxText($_GPC['sy_role_text_sy']);
}

if(isset($_GPC['isOpenRecharge']) ){
    ParConfigModel::setIsOpenRecharge($_GPC['isOpenRecharge']);
}

if(isset($_GPC['isStick']) ){
    ParConfigModel::setIsStick($_GPC['isStick']);
}

if(isset($_GPC['isHidePastInfo']) ){
    ParConfigModel::setIsHidePastInfo($_GPC['isHidePastInfo']);
}

if(isset($_GPC['TplId'])){

    ParConfigModel::setTplId($_GPC['TplId']);
}


/*取出新用户赠送的积分*/
$sy_name_sy=ParConfigModel::getWxName();

/*取出新用户赠送的积分*/
$sy_newUserPresent_sy=ParConfigModel::getNewUserPresent();

/*取出车找人信息发布价格*/
$sy_price1_sy=ParConfigModel::getPrice1();

/*取出车找人置顶1天价格*/
$sy_isTop_price1_sy=ParConfigModel::getIsTopPrice1();

/*取出车找人置顶3天价格*/
$sy_isTop_price2_sy=ParConfigModel::getIsTopPrice2();

/*取出人找车信息发布价格*/
$sy_price2_sy=ParConfigModel::getPrice2();

/*取出人找车置顶1天价格*/
$sy_isTop_price3_sy=ParConfigModel::getIsTopPrice3();

/*取出人找车置顶3天价格*/
$sy_isTop_price4_sy=ParConfigModel::getIsTopPrice4();

/*获得微信二维码图片*/
$sy_wx_code_sy=ParConfigModel::getWxCode();

/*获得微信平台LOGO*/
$sy_wx_logo_sy=ParConfigModel::getWxLogo();

/*取出手机端规则文本*/
$sy_role_text_sy=ParConfigModel::getWxText();

$isOpenRecharge = ParConfigModel::getIsOpenRecharge();

$isStick = ParConfigModel::getIsStick(); /*是否允许发布置顶信息*/

$isHidePastInfo  = ParConfigModel::getIsHidePastInfo(); /*是否显示隐藏信息*/

$TplId = ParConfigModel::getTplId(); /*获得模版消息ID*/


include $this->template('parconf');
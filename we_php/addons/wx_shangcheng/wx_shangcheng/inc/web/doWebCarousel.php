<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(dirname(__FILE__) . "/../../model/picConfig.php");
global $_W,$_GPC;
$openid = $_W['openid'];//获取单前用户ID
$weid=$_W['uniacid'];//获取当前公众号ID
$sy_datas_sy=PicConfigModel::getall($weid);//查询当前公众号配置轮播图片
include $this->template('carousel');
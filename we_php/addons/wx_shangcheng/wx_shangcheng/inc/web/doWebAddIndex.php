<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(dirname(__FILE__) . "/../../model/picConfig.php");
global $_W,$_GPC;
$sy_id_sy=$_GPC['sy_id_sy'];//获取图片ID
$sy_data_sy=PicConfigModel::get($sy_id_sy);//根据图片ID 获取图信息
include $this->template('addcarousel');
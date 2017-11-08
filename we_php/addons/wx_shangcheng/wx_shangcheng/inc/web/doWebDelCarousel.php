<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once(dirname(__FILE__) . "/../../model/picConfig.php");
global $_GPC,$_W;
$sy_id_sy=$_GPC['sy_id_sy'];//获取图片ID
if (PicConfigModel::del($sy_id_sy)){
    message('操作成功！', '../../web/' .  $this->createWebUrl('carousel'));
}else{
    message('操作失败！', '../../web/' .  $this->createWebUrl('carousel'));
}

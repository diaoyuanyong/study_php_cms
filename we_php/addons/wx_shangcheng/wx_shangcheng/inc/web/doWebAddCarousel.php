<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(dirname(__FILE__) . "/../../model/picConfig.php");
global $_GPC,$_W;
$weid=$_W['uniacid'];//获取当前公众号
$sy_id_sy=$_GPC['sy_id_sy'];//获取图片ID
$sy_path_sy=$_GPC['carousel_pic'];//获取上传图片
$sy_title_sy=$_GPC['title'];//获取输入的图片标题
$sy_link_sy=$_GPC['link'];//获取输入的点击图片跳转链接
$sy_data_sy=array(
    'sy_title_sy'=>$sy_title_sy,
    'sy_path_sy'=>$sy_path_sy,
    'sy_link_sy'=>$sy_link_sy
);
//判断是否存在图片ID
if(empty($sy_id_sy)){
    $sy_data_sy['sy_weid_sy']=$weid;
 PicConfigModel::add($sy_data_sy);//不存在则执行添加
    message('操作成功！', '../../web/' .  $this->createWebUrl('carousel'));
}else{
    PicConfigModel::updata($sy_data_sy);//存在则执行更新
    message('操作成功！', '../../web/' .  $this->createWebUrl('carousel'));
}

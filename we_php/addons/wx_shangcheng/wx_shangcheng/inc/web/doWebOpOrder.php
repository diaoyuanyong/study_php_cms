<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(dirname(__FILE__) . "/../../model/order.php");
global $_W,$_GPC;
$op=$_GPC['op'];//获取操作类型
$sy_id_sy=$_GPC['sy_id_sy'];//获取订单ID

if ($op=='delete'){
    if (orderModel::delUserOrder($sy_id_sy)){
        message('操作成功','../web/'.$this->createWebUrl('manager4'));

    }
}else if ($op=='recovery'){
   if ( orderModel::recoveryUserOrder($sy_id_sy)){
       message('操作成功','../web/'.$this->createWebUrl('manager4'));
   }
}
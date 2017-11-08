
<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * 信息管理
 */
require_once(dirname(__FILE__) . "/../../model/order.php");
global $_GPC,$_W;


$sy_order_type_sy=-1; /*默认订单类型为全部*/
if(intval($_GPC['sy_order_type_sy'])>0){
    $sy_order_type_sy=intval($_GPC['sy_order_type_sy']);
}

$orderList=  orderModel::getOrderListByPage();
$orderCount= orderModel::getListCount();
$pages=intval($orderCount/10)+1;

$p=1;
if(isset($_GPC['p'])){

    if(intval($_GPC['p'])>0){
        $p=intval($_GPC['p']);
    }
}


include $this->template('info');
<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(dirname(__FILE__) . "/../../model/order.php");
global $_GPC,$_W;
$sy_id_sy=$_GPC['sy_id_sy'];//获取订单ID
$sy_order_sy=orderModel::getOrder($sy_id_sy,$type=0);//根据订单ID获取订单
include $this->template('orderDetails');
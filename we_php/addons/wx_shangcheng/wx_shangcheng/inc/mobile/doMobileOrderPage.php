<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*带条件的订单分页查询*/
require_once(dirname(__FILE__) . "/../../model/order.php");

global $_W,$_GPC;
$weid=$_W['uniacid'];//获取当前公众号ID
$sy_op_sy=$_GPC['op'];//获取操作类型
$sy_timestamp_sy=$_W['timestamp'];//获得当前时间戳
if ($sy_op_sy=="search"){
    $sy_data_sy= orderModel::getSearch();
    $sy_orderList_sy=$sy_data_sy[0];
    $count=$sy_data_sy[1]['count'];
}elseif ($sy_op_sy=="search_passenger"){ //找乘客
    $sy_orderList_sy=orderModel::getDriver(); //获取人找商城信息
    $count=orderModel::getDriverCount(); //获取商城找人信息的总数
}elseif ($sy_op_sy=="search_drive"){      //找司机
    $sy_orderList_sy=orderModel::getPassenger();  //获取商城找人信息
    $count=orderModel::getPassengerCount(); //获取人找商城信息的总数
}



include $this->template("orderpage");






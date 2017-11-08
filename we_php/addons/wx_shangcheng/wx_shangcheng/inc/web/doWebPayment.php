<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(dirname(__FILE__) . "/../../model/pay.php");
global $_GPC,$_W;
load()->func('tpl');            //调用模板

$_start_=$_GPC['time']['start'];//获取查询开始时间
$_end_=$_GPC['time']['end'];//获取查询结束时间

$_count_=payModel::getPayCount($_start_,$_end_);
$_pages_=intval($_count_['count']/10)+1; //根据总数计算页数
$p=1;       //设置分页初始值
if(isset($_GPC['p'])){
    if (intval($_GPC['p'])>0){
        $p=$_GPC['p'];
    }
}

$_payList_=payModel::getPayPaging($_start_,$_end_sy);
include $this->template('payment');
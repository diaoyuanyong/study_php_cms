<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once(dirname(__FILE__) . "/../../model/comment.php");

$orderCount = commentModel::getListCount();

$orderList = commentModel::getOrderListByPage();

$pages=intval($orderCount/10)+1;

$p=1;
if(isset($_GPC['p'])){

    if(intval($_GPC['p'])>0){
        $p=intval($_GPC['p']);
    }
}

include $this->template('CommentList');


<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(dirname(__FILE__) . "/../../model/comment.php");

global $_GPC;

$id =$_GPC['id'];


if (commentModel::del($id)){
    message('操作成功','../web/'.$this->createWebUrl('manager7'));
}else{
    message('操作失败');
}

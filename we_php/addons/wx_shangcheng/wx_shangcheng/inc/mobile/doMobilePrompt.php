<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(dirname(__FILE__) . "/../../model/parConfig.php");
$sy_pic_sy=ParConfigModel::getWxCode();//获取公众号二维码
include $this->template('prompt');
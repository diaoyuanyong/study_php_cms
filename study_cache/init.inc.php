<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


header('Content-Type:text/html;charset=utf-8');
//ROOT DIR
define('ROOT_PATH', dirname(__FILE__));

require ROOT_PATH.'/config/profile.inc.php';
require ROOT_PATH.'/includes/Templates.class.php';
require ROOT_PATH.'/includes/tool_function.php';
require 'cache.inc.php';
$_tpl = new Templates();





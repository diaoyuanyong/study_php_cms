<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$_strLen =  dirname(__FILE__); 
$_Loc = strlen($_strLen) - strrpos($_strLen, "/");

require   substr(dirname(__FILE__),0,-$_Loc).'/init.inc.php';

$_tpl->display('admin.tpl',0);

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 

//include './template.inc.php';
//require  dirname(__FILE__).'/init.inc.php';
global  $_tpl;dddddd
//声明一个变量
$_name = 'diaoyuanyong';
$_content = 'AAAA';
$_array = array(1,2,3,4,5,6 );
//注入一个变量
$_tpl->assign('header','镖头');
$_tpl->assign('center','中间内容');
$_tpl->assign('footer','页尾');
$_tpl->display('index.tpl',1);




//include TPL_DIR .'index.tpl';









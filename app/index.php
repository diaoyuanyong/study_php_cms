<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define('DB_HOST','localhost');										//主机IP
	define('DB_USER','root');												//账号
	define('DB_PASS','');										//密码
	define('DB_NAME','cms');
                $_mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
                 $_sql = "INSERT INTO `PHPCMS`.`tg_flower` (`tg_flower`) VALUES ('');";
                 $_result = $_mysqli->query($_sql);
                    
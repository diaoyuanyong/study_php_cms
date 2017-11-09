<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$_mysqli = new mysqli('localhost','root','diaoyuanyong.','PHPCMS');
 
$_mysqli->set_charset('utf8');

$_sql = "SELECT*FROM tg_user";

$_result = $_mysqli->query($_sql);
//print_r ($_result->fetch_row());  
//$_row = $_result->fetch_row();

//print_r($_row[0]); 

//遍历
//while ( $row  =  $_result -> fetch_row ()) {
//    
//    printf($row[3].'<br/>');
//    };

//$_assoc = $_result->fetch_assoc();
//print_r($_assoc['name']);

//while($_assoc = $_result->fetch_assoc()){
//    print_r($_assoc['name'].'<br />');
//}
   print_r($_result->fetch_array());

//$_result->free();
$_mysqli->close();


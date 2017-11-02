<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$_mysqli = new mysqli('localhost','root','5422F83E2005422F8E1F20C','PHPCMS');
if(mysqli_connect_errno()){
    echo mysqli_connect_error();   
    exit();
}
$_mysqli->set_charset("utf8");


$_sql =  "SELECT * FROM  tg_user";


$_result = $_mysqli ->query($_sql);

print_r ($_result->fetch_row());  
print_r ($_result->fetch_row());  
print_r ($_result->fetch_row());  
print_r ($_result->fetch_row());  
print_r ($_result->fetch_row());  


if($_mysqli->errno){
    echo $_mysqli->error;
} 


$_result->free();


$_mysqli->close();

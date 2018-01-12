<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('./file.php');
$data = array(
    'id'=>1,
    'name'=>'wwwww',
    'type'=>array(1,2,3,4),
    'test'=>array(4,5,6,7),
);

$file= new File();
//创建缓存
if ($file->cacheData('index_mk_cache',$data)){
    $file->cacheData('index_mk_cache');exit('eorro');
        echo "success";
    
}else{
        echo "eorro";  
}
//删除缓存
if ($file->cacheData('index_mk_cache',null)){
    $file->cacheData('index_mk_cache');exit('eorro');
        echo "success";
    
}else{
        echo "eorro";  
}

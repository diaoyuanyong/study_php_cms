<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$xml= simplexml_load_file('text.xml');
$dd=file_get_contents('text.xml');
$ddw='text.xml';
$aa= array();
$_patten = '/dasdasdas/';
if(preg_match($_patten, $dd)){
        foreach ($xml->number as $key=>$value){
            foreach ($value as $Mykey=>$Myvalue){
                print_r($Myvalue);
                
            }
          
        }
        
        
                //替换文件中的内容
        //    if(file_put_contents($ddw, preg_replace($_patten, "diaoyuanyong", $dd))){
        //        echo "write";
        //    }else{
        //        echo "no";
        //    }
}else{
    echo"对不起搜索的内容不存在";
};





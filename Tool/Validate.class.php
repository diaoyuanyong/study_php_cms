<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Validate{
    //是否为空
    /*
     * @param String $date 
     */
    static function checkNull($_date){
        if(trim($_date)=='')return true;
        return false;
        
    }
    //长度是否合法
    /*function chechLength 
     * @param String $_date  
     * @param  Integer $_length 
     * @param  Integer $_flag
     */
    static function checkLength($_date,$_length,$_flag){
        if($_flag=='min'){
           if(mb_strlen(trim($_date),'utf-8')<$_length) return true;
          
           return false;
        }elseif($_flag=='max'){
              if(mb_strlen(trim($_date),'utf-8')>$_length) return true;          
              return false;
        }else{
            Tool::alertBackLocation('Error:参数传递错误，必须是min，max！');
        }
    }
    //数据是否一致
    /*
     *@param String $_date 
     *@param Strting $_otherdate      
     */
    static function chackEquals($_date,$_otherdate){
        if(trim($_date) != trim($_otherdate)) return ture;
        return false;
        
    }
    
}
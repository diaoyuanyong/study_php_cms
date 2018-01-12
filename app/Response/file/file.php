<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  File{
    const EXT = '.txt';
    private $_dir;
    public  function __construct() {
          $this->_dir=dirname(__FILE__).'/';
    }
    /*
     * @param $key 文件; 
     * @$value bool 1=删除，
      *@$path 目录
     * 
     *       */
    public function cacheData($key,$value='',$path=''){
         $filename = $this->_dir.$path.$key.self::EXT;
         if(is_null($value)){
             return @unlink($filename);
         }
         if($value!==''){
               $dir= dirname($filename).PHP_EOL;
              if(is_dir($dir)){
                  mkdir( $dir);
                  chmod($dir,0777);
              }else{
                  echo "Eorro";
              }
              return file_put_contents($filename, json_encode($value));
         }
         if(!is_file($filename)){
             return false;
         }else{
             return json_encode(file_get_contents($filename),true);
         } 
         
         
    }
    
}

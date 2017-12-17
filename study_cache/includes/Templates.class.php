<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//tempalates class

class Templates{
    private $_vars  = array();    
    private $_config  = array();
    public function __construct(){
        if(!is_dir(TPL_DIR) || !is_dir(TPL_C_DIR) || !is_dir(CACHE)){
            exit('this  is  dir find not');
        }
        $_varXml =  'config/profile.xml';
            if(file_exists($_varXml)){   
                $_sxe = simplexml_load_file($_varXml);
            }else{
                $_sxe = simplexml_load_file('../config/profile.xml');
            }
        $_taglib = $_sxe->xpath('/root/taglib');
      foreach($_taglib as $_tag){
//print_r($_tag->name ); 
        $this->_config["$_tag->name"]=$_tag->value;
        }
//        print_r($this->_config);
      }
    
    //Injection a variable
    public  function assign($_var,$_value){
        if(isset($_var)&&!empty($_var)){
           $this->_vars[$_var]=$_value;
        }else{
            exit('Error:变量名不能为空');
        }
    }
    public function  display($_file,$_value){
        if($_value === 1){   
                $_tplFile = TPL_DIR.$_file;
        }elseif($_value === 0){
               $_tplFile = TPL_B_DIR.$_file;    
        }
            //判断tpl是否存在
              if (!file_exists( $_tplFile)){
                  exit('tpl不存在');
              }
              $_parFile =  TPL_C_DIR.md5($_file).$_file.'.php';
            $_cacheFile = CACHE.md5($_file).$_file.".html";
            if(IS_CACHE){
                if(file_exists($_cacheFile) && file_exists($_parFile)){
                        if(filemtime($_parFile) >= filemtime($_tplFile) && filemtime($_cacheFile)>= filemtime($_parFile)){                          
                            echo "直接执行了缓存文件";
                            include $_cacheFile;
                            return;
                        }
                }
            }
            
            if(!file_exists($_parFile) || filemtime($_parFile) < filemtime($_tplFile)){
                require ROOT_PATH.'/includes/Parser.class.php';
                $_parser = new Parser($_tplFile); //模板文件
                $_parser->compile($_parFile);//编译文件
                
            }
                include $_parFile;
                if(IS_CACHE){
                    
                    file_put_contents($_cacheFile,ob_get_contents());
                    
                    ob_end_clean();
                    
                    include $_cacheFile;
                  }
            }
            
            public  function create($_file,$_value){
                if($_value === 1){   
                         $_tplFile = TPL_DIR.$_file;
                     }elseif($_value === 0){
                        $_tplFile = TPL_B_DIR.$_file;    
                }
                if (!file_exists( $_tplFile)){
                      exit('tpl不存在');
                  }
                  $_parFile =  TPL_C_DIR.md5($_file).$_file.'.php';  
                  if(!file_exists($_parFile) || filemtime($_parFile) < filemtime($_tplFile)){                  
                      require_once ROOT_PATH.'/includes/Parser.class.php';
                      $_parser = new Parser($_tplFile); //模板文件
                      $_parser->compile($_parFile);//编译文件
                  }
                  include $_parFile; 
            }
            
}
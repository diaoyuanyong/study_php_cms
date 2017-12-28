<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//parser class 
class Parser{
   private $_tpl;
    
    public function __construct($_tplFile){
//        echo $_tplFile;
        if(!$this->_tpl = file_get_contents($_tplFile)){
            exit('Error:#A-1' );
            
        }
            // $this->_tpl = file_get_contents($_tplFile);
    }
    
    private function parVar(){
        $_pattern= '/\{\$([\w]+)\}/';
        if(preg_match( $_pattern, $this->_tpl)){
            $this->_tpl = preg_replace($_pattern, "<?php echo \$this->_vars['$1'];?>", $this->_tpl);
        }
    }
    
    private function parIf(){
        $_patternIf = '/\{if\s+\$([\w]+)\}/';
        $_patternEndIf= '/\{\/if\}/';
        $_patternElse='/\{else\}/';
        if(preg_match($_patternIf, $this->_tpl)){
            if(preg_match($_patternEndIf, $this->_tpl)){
                $this->_tpl = preg_replace($_patternIf, "<?php if (\$this->_vars['$1']) { ?>", $this->_tpl);
                $this->_tpl= preg_replace($_patternEndIf, "<?php } ?>", $this->_tpl);
                if(preg_match($_patternElse, $this->_tpl)){
                    $this->_tpl = preg_replace($_patternElse, "<?php } else {?>", $this->_tpl);
                }
              }else{
                      exit('Error:#1-3');
               }
        }
    }
    //解析include
    private  function parInclude(){
        $_pattenIn = '/\{include\s+file=(\"|\')([\w\.\-\/]+)(\"|\')\}/';
        if(preg_match($_pattenIn, $this->_tpl,$_file)){

            if (!file_exists($_file[2] ) || empty($_file[2])){
                exit('Error:#1-2');
            }
            $this->_tpl = preg_replace($_pattenIn, "<?php include '$2'?>", $this->_tpl);
            
        }
    }
    
    
    private  function parConmon(){
        $_patternC = '/\{#\}(.*)\{#\}/';
        if(preg_match($_patternC, $this->_tpl)){
                //echo  "有 php注释";
            $this->_tpl = preg_replace($_patternC, "<?php /*('$1')*/?>", $this->_tpl);
            
        }
    }
    
    private function parForeach() {
		$_pattenForeach = '/\{foreach\s+\$([\w]+)\(([\w]+),([\w]+)\)\}/';
		$_pattenEndForeach = '/\{\/foreach\}/';
		$_pattenVar = '/\{@([\w]+)([\w\-\>]|[\w\[\]]*)\}/';
		if (preg_match($_pattenForeach,$this->_tpl)) {
			if (preg_match($_pattenEndForeach,$this->_tpl)) {
				$this->_tpl = preg_replace($_pattenForeach,"<?php foreach (\$this->_vars['$1'] as \$$2=>\$$3) { ?>",$this->_tpl);
				$this->_tpl = preg_replace($_pattenEndForeach,"<?php } ?>",$this->_tpl);
				if (preg_match($_pattenVar,$this->_tpl)) {
					$this->_tpl = preg_replace($_pattenVar,"<?php echo \$$1$2?>",$this->_tpl);
				}
			} else {
				exit('Error : #1-1');
			}
		}
	}
    
    private function  parConfig(){
         $_pattenCon = '/<!--\{([\w]+)\}-->/';
        if(preg_match($_pattenCon, $this->_tpl)){
            $this->_tpl = preg_replace($_pattenCon, "<?php echo \$this->_config['$1']; ?>", $this->_tpl);
        }
    }
    //对外公共函数
    public function compile($_parFile){
        $this->parVar();
        $this->parIf();
        $this->parConmon();
        $this->parForeach();
        $this->parInclude();
        $this->parConfig();
        if(!file_put_contents($_parFile,$this->_tpl)){
            exit('Error:#1');
        }
    }
}


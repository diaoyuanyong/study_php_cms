<?php //

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Xml{
private function ToUrlParams($urlObj)
	{
		$buff = "";
		foreach ($urlObj as $k => $v)
		{
			$buff .= $k . "=" . $v . "&";
		}
		
		$buff = trim($buff, "&");
		return $buff;
	}
	

       public  $test_array = array(
            "0"=>array(
                'id'=>xml____id,
                'name' =>xml___name,
                ),
            '1'=>array(
                'id'=>架队夺得,
                'name'=>xiaohua,
            ),
        );

        public function ArrayToxML($arr,$node='root'){  
            if($node=='root'){  
                $simpleXmlElemnet=new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><root></root>');  
            }else{  
                $simpleXmlElemnet=$node;  
            }  
            foreach($arr as $k=>$v){  
                if(is_array($v)){  
                    $k ="number";
                    $this->ArrayToxML($v,$simpleXmlElemnet->addChild($k));//创建节点 并加在他的后面  
                }else{  
                    if(is_numeric($k)){  
                        $simpleXmlElemnet->addChild('das',$v);  
                    }else{  
                        $simpleXmlElemnet->addChild($k,$v);  
                    }  
                }  
            }  
            return $simpleXmlElemnet;  
        }  
}
$xmlElement= new Xml();
$SimpleXML=$xmlElement->ArrayToxML($xmlElement->test_array);  
$SimpleXML->asXML('text.xml');  
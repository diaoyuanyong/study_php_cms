<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class response{
    /*按xml的方式来输出数据
     * @param interger $code 状态码
     *@param string $message t提示信息      
     * @param array $data 数据
     *return string       
     */
    public static  function xmlEncode($code,$message,$data=array()){
        if(!is_numeric( $code)){
            return '';
        } 
        $result =  array(
            'code'=>$code,
            'message'=>$message,
            'data' => $data,
        );
        header("Content-Type:text/xml");
        $xml ="<?xml version='1.0' encoding='utf-8'?>";
        $xml.="<root>";
        $xml.= self::xmlToEncode($result);
        $xml.="</root>";
        echo $xml;
    }
    public static function xmlToEncode($data){
        $xml ="";
        foreach ($data as $key => $value){
            if(is_numeric($key)){
                $attr =" id='{$key}'";
                 $key ="item";
                } 
            $xml.= "<{$key}{$attr}>";
            $xml.=is_array($value)?self::xmlToEncode($value):$value;
            $xml.= "</{$key}>";
        }
        return $xml;
        
    }
}
$data =array(
    'id'=>'asd',
    'name'=>'diaoyuanyong',
    'only_code' =>'77777',
    'only_code' =>'ddd',
    'type'=>array(10,10,10),
    
);
response::xmlEncode(100,'success',$data);

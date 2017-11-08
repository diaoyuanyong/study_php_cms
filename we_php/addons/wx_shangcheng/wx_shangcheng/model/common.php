<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once(dirname(__FILE__) . "/user.php");


class commonModel{
    /**
     * 公共入口
     */
    static function entry(){
        self::autoRegUser();
    }

    /**
     * 自动注册用户
     */
    static function autoRegUser(){
        global $_W,$_GPC;
        $openid=$_W['openid'];
        if(trim($openid)==""){
            return;
        }
        $user=userModel::getUserByOpenId($openid);
        if(!$user){
            /*未查找到用户,创建新用户*/
            userModel::createUser();
        }

    }

}
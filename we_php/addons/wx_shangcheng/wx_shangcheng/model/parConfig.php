<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



class ParConfigModel{

    /**
     * 获得手机端平台名称
     */
    
    static function getWxName(){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID
        /*  试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'wx_name','sy_weid_sy'=>$weid ));
        if(!$ret) {
            /*配置不存在返回默认值*/
            return " ";
        }else{
            /*返回配置*/
            return  $ret['sy_value_sy'];
        }
    }

    /**
     * 设置手机端平台名称
     */
    static function setWxName($value){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'wx_name','sy_weid_sy'=>$weid ));

        if(!$ret){
            /*配置不存在插入新配置*/
            pdo_insert('wx_shangcheng_textconfig',array(
                'sy_weid_sy'=>$weid,
                'sy_text_sy' =>'wx_name',
                'sy_value_sy'=>(string)$value
            ));
        }else{
            /*配置已经存在更配置*/
            pdo_update('wx_shangcheng_textconfig',
                array('sy_value_sy'=>(string)$value),
                array('sy_id_sy'=>$ret['sy_id_sy']));
        }
    }


    /**
     * 获得手机端配置文本
     */
    static function getWxText(){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID
        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'wx_role_text','sy_weid_sy'=>$weid ));
        if(!$ret) {
            /*配置不存在返回默认值*/
            return " ";
        }else{
            /*返回配置*/
            return  $ret['sy_value_sy'];
        }
    }

    /**
     * 设置手机端配置文本
     */
    static function setWxText($value){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'wx_role_text','sy_weid_sy'=>$weid ));

        if(!$ret){
            /*配置不存在插入新配置*/
            pdo_insert('wx_shangcheng_textconfig',array(
                'sy_weid_sy'=>$weid,
                'sy_text_sy' =>'wx_role_text',
                'sy_value_sy'=>(string)$value
            ));
        }else{
            /*配置已经存在更配置*/
            pdo_update('wx_shangcheng_textconfig',
                array('sy_value_sy'=>(string)$value),
                array('sy_id_sy'=>$ret['sy_id_sy']));
        }
    }









    /**
     * 获得微信端拼品台LOGO
     */
    static function getWxLogo(){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID
        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'wx_logo','sy_weid_sy'=>$weid ));
        if(!$ret) {
            /*配置不存在返回默认值*/
            return " ";
        }else{
            /*返回配置*/
            return  $ret['sy_value_sy'];
        }
    }

    /**
     * 设置微信端拼平台LOGO
     */
    static function setWxLogo($value){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'wx_logo','sy_weid_sy'=>$weid ));

        if(!$ret){
            /*配置不存在插入新配置*/
            pdo_insert('wx_shangcheng_textconfig',array(
                'sy_weid_sy'=>$weid,
                'sy_text_sy' =>'wx_logo',
                'sy_value_sy'=>(string)$value
            ));
        }else{
            /*配置已经存在更配置*/
            pdo_update('wx_shangcheng_textconfig',
                array('sy_value_sy'=>(string)$value),
                array('sy_id_sy'=>$ret['sy_id_sy']));
        }
    }


    /**
     * 获得微信关注二维码
     */
    static function getWxCode(){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID
        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'wx_code_img','sy_weid_sy'=>$weid ));
        if(!$ret) {
            /*配置不存在返回默认值*/
            return " ";
        }else{
            /*返回配置*/
            return  $ret['sy_value_sy'];
        }
    }

    /**
     * 设置微信二维码图片
     */
    static function setWxCode($value){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'wx_code_img','sy_weid_sy'=>$weid ));

        if(!$ret){
            /*配置不存在插入新配置*/
            pdo_insert('wx_shangcheng_textconfig',array(
                'sy_weid_sy'=>$weid,
                'sy_text_sy' =>'wx_code_img',
                'sy_value_sy'=>(string)$value
            ));
        }else{
            /*配置已经存在更配置*/
            pdo_update('wx_shangcheng_textconfig',
                array('sy_value_sy'=>(string)$value),
                array('sy_id_sy'=>$ret['sy_id_sy']));
        }
    }


    /**
     * 获取新用户赠送的积分
     */
    static  function getNewUserPresent(){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'new_user_present','sy_weid_sy'=>$weid ));
        if(!$ret) {
            /*配置不存在返回默认值*/
            return 0;
        }else{
            /*返回配置*/
            return  intval($ret['sy_value_sy']);
        }
    }



    /**
     * 设置新用户赠送的积分
     */
    static  function setNewUserPresent($value){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'new_user_present','sy_weid_sy'=>$weid ));

        if(!$ret){
            /*配置不存在插入新配置*/
            pdo_insert('wx_shangcheng_textconfig',array(
                'sy_weid_sy'=>$weid,
                'sy_text_sy' =>'new_user_present',
                'sy_value_sy'=>(string)$value
            ));
        }else{
            /*配置已经存在更配置*/
            pdo_update('wx_shangcheng_textconfig',
                array('sy_value_sy'=>(string)$value),
                array('sy_id_sy'=>$ret['sy_id_sy']));
        }
    }


    /**
     * 获取价格1 （找人的价格）
     */
    static function getPrice1(){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'price1','sy_weid_sy'=>$weid ));
        if(!$ret) {
            /*配置不存在返回默认值*/
            return 1;
        }else{
            /*返回配置*/
            return  intval($ret['sy_value_sy']);
        }
    }

    /**
     * 设置价格1 （找人的价格）
     */
    static function stePrice1($value){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'price1','sy_weid_sy'=>$weid ));

        if(!$ret){
            /*配置不存在插入新配置*/
            pdo_insert('wx_shangcheng_textconfig',array(
                'sy_weid_sy'=>$weid,
                'sy_text_sy' =>'price1',
                'sy_value_sy'=>(string)$value
            ));
        }else{
            /*配置已经存在更配置*/
            pdo_update('wx_shangcheng_textconfig',
                array('sy_value_sy'=>(string)$value),
                array('sy_id_sy'=>$ret['sy_id_sy']));
        }
    }
    /**
     * 获取价格 找人置顶1天价格
     */
    static function getIsTopPrice1(){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'isTopPrice1','sy_weid_sy'=>$weid ));
        if(!$ret) {
            /*配置不存在返回默认值*/
            return 5;
        }else{
            /*返回配置*/
            return  intval($ret['sy_value_sy']);
        }
    }
    /**
     * 设置找人置顶一天的价格
     */
    static function steIsTopPrice1($value){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'isTopPrice1','sy_weid_sy'=>$weid ));

        if(!$ret){
            /*配置不存在插入新配置*/
            pdo_insert('wx_shangcheng_textconfig',array(
                'sy_weid_sy'=>$weid,
                'sy_text_sy' =>'isTopPrice1',
                'sy_value_sy'=>(string)$value
            ));
        }else{
            /*配置已经存在更配置*/
            pdo_update('wx_shangcheng_textconfig',
                array('sy_value_sy'=>(string)$value),
                array('sy_id_sy'=>$ret['sy_id_sy']));
        }
    }

    /**
     * 获取价格找人置顶3天价格
     */
    static function getIsTopPrice2(){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'isTopPrice2','sy_weid_sy'=>$weid ));
        if(!$ret) {
            /*配置不存在返回默认值*/
            return 10;
        }else{
            /*返回配置*/
            return  intval($ret['sy_value_sy']);
        }
    }
    /**
     * 设置找人置顶三天的价格
     */
    static function steIsTopPrice2($value){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'isTopPrice2','sy_weid_sy'=>$weid ));

        if(!$ret){
            /*配置不存在插入新配置*/
            pdo_insert('wx_shangcheng_textconfig',array(
                'sy_weid_sy'=>$weid,
                'sy_text_sy' =>'isTopPrice2',
                'sy_value_sy'=>(string)$value
            ));
        }else{
            /*配置已经存在更配置*/
            pdo_update('wx_shangcheng_textconfig',
                array('sy_value_sy'=>(string)$value),
                array('sy_id_sy'=>$ret['sy_id_sy']));
        }
    }



    /**
     * 获取价格2 （人找的价格）
     */
    static function getPrice2(){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'price2','sy_weid_sy'=>$weid ));
        if(!$ret) {
            /*配置不存在返回默认值*/
            return 1;
        }else{
            /*返回配置*/
            return  intval($ret['sy_value_sy']);
        }
    }

    /**
     * 设置价格2 （人找的价格）
     */
    static function stePrice2($value){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'price2','sy_weid_sy'=>$weid ));

        if(!$ret){
            /*配置不存在插入新配置*/
            pdo_insert('wx_shangcheng_textconfig',array(
                'sy_weid_sy'=>$weid,
                'sy_text_sy' =>'price2',
                'sy_value_sy'=>(string)$value
            ));
        }else{
            /*配置已经存在更配置*/
            pdo_update('wx_shangcheng_textconfig',
                array('sy_value_sy'=>(string)$value),
                array('sy_id_sy'=>$ret['sy_id_sy']));
        }
    }


    /**
     * 获取价格人找置顶1天价格
     */
    static function getIsTopPrice3(){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'isTopPrice3','sy_weid_sy'=>$weid ));
        if(!$ret) {
            /*配置不存在返回默认值*/
            return 5;
        }else{
            /*返回配置*/
            return  intval($ret['sy_value_sy']);
        }
    }
    /**
     * 设置人找置顶一天的价格
     */
    static function steIsTopPrice3($value){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'isTopPrice3','sy_weid_sy'=>$weid ));

        if(!$ret){
            /*配置不存在插入新配置*/
            pdo_insert('wx_shangcheng_textconfig',array(
                'sy_weid_sy'=>$weid,
                'sy_text_sy' =>'isTopPrice3',
                'sy_value_sy'=>(string)$value
            ));
        }else{
            /*配置已经存在更配置*/
            pdo_update('wx_shangcheng_textconfig',
                array('sy_value_sy'=>(string)$value),
                array('sy_id_sy'=>$ret['sy_id_sy']));
        }
    }

    /**
     * 获取价格人找置顶3天价格
     */
    static function getIsTopPrice4(){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'isTopPrice4','sy_weid_sy'=>$weid ));
        if(!$ret) {
            /*配置不存在返回默认值*/
            return 10;
        }else{
            /*返回配置*/
            return  intval($ret['sy_value_sy']);
        }
    }
    /**
     * 设置人找服装置顶3天的价格
     */
    static function steIsTopPrice4($value){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'isTopPrice4','sy_weid_sy'=>$weid ));

        if(!$ret){
            /*配置不存在插入新配置*/
            pdo_insert('wx_shangcheng_textconfig',array(
                'sy_weid_sy'=>$weid,
                'sy_text_sy' =>'isTopPrice4',
                'sy_value_sy'=>(string)$value
            ));
        }else{
            /*配置已经存在更配置*/
            pdo_update('wx_shangcheng_textconfig',
                array('sy_value_sy'=>(string)$value),
                array('sy_id_sy'=>$ret['sy_id_sy']));
        }
    }

    /**
     * 获取是否打开充值
     */
    static function getIsOpenRecharge(){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'isOpenRecharge','sy_weid_sy'=>$weid ));
        if(!$ret) {
            /*配置不存在返回默认值*/
            return 1;
        }else{
            /*返回配置*/
            return  intval($ret['sy_value_sy']);
        }
    }

    /*
     * 设置是否打开充值
     */
    static function setIsOpenRecharge($value){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'isOpenRecharge','sy_weid_sy'=>$weid ));

        if(!$ret){
            /*配置不存在插入新配置*/
            pdo_insert('wx_shangcheng_textconfig',array(
                'sy_weid_sy'=>$weid,
                'sy_text_sy' =>'isOpenRecharge',
                'sy_value_sy'=>(string)$value
            ));
        }else{
            /*配置已经存在更配置*/
            pdo_update('wx_shangcheng_textconfig',
                array('sy_value_sy'=>(string)$value),
                array('sy_id_sy'=>$ret['sy_id_sy']));
        }
    }



    /**
     * 获取是否支持发布置顶信息
     */
    static function getIsStick(){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'isStick','sy_weid_sy'=>$weid ));
        if(!$ret) {
            /*配置不存在返回默认值*/
            return 1;
        }else{
            /*返回配置*/
            return  intval($ret['sy_value_sy']);
        }
    }


    /**
     * 设置是否支持置顶信息的发布
     */
    static function setIsStick($value){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'isStick','sy_weid_sy'=>$weid ));

        if(!$ret){
            /*配置不存在插入新配置*/
            pdo_insert('wx_shangcheng_textconfig',array(
                'sy_weid_sy'=>$weid,
                'sy_text_sy' =>'isStick',
                'sy_value_sy'=>(string)$value
            ));
        }else{
            /*配置已经存在更配置*/
            pdo_update('wx_shangcheng_textconfig',
                array('sy_value_sy'=>(string)$value),
                array('sy_id_sy'=>$ret['sy_id_sy']));
        }
    }


    /**
     * 获取是否显示过期信息
     */
    static function  getIsHidePastInfo(){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'isHidePastInfo','sy_weid_sy'=>$weid ));
        if(!$ret) {
            /*配置不存在返回默认值*/
            return 1;
        }else{
            /*返回配置*/
            return  intval($ret['sy_value_sy']);
        }
    }

    /**
     * 设置是否显示过期信息
     */
    static function setIsHidePastInfo($value){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'isHidePastInfo','sy_weid_sy'=>$weid ));

        if(!$ret){
            /*配置不存在插入新配置*/
            pdo_insert('wx_shangcheng_textconfig',array(
                'sy_weid_sy'=>$weid,
                'sy_text_sy' =>'isHidePastInfo',
                'sy_value_sy'=>(string)$value
            ));
        }else{
            /*配置已经存在更配置*/
            pdo_update('wx_shangcheng_textconfig',
                array('sy_value_sy'=>(string)$value),
                array('sy_id_sy'=>$ret['sy_id_sy']));
        }
    }



    /**
     * 获取模版消息ID
     */
    static function  getTplId(){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'TplId','sy_weid_sy'=>$weid ));
        if(!$ret) {
            /*配置不存在返回默认值*/
            return "";
        }else{
            /*返回配置*/
            return  $ret['sy_value_sy'];
        }
    }



    /**
     * 设置模版消息
     */
    static function setTplId($value){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID

        /*试图查询配置*/
        $ret= pdo_get('wx_shangcheng_textconfig', array('sy_text_sy' =>'TplId','sy_weid_sy'=>$weid ));

        if(!$ret){
            /*配置不存在插入新配置*/
            pdo_insert('wx_shangcheng_textconfig',array(
                'sy_weid_sy'=>$weid,
                'sy_text_sy' =>'TplId',
                'sy_value_sy'=>(string)$value
            ));
        }else{
            /*配置已经存在更配置*/
            pdo_update('wx_shangcheng_textconfig',
                array('sy_value_sy'=>(string)$value),
                array('sy_id_sy'=>$ret['sy_id_sy']));
        }
    }








}
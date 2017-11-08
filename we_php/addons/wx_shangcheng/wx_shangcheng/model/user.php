<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(dirname(__FILE__) . "/parConfig.php");

class userModel{
    /**
     * 通过openid 获得用户信息
     * @param $openId
     *
     */
    static function getUserByOpenId($openId){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID
        return pdo_get('wx_shangcheng_user',
            array(
                'sy_weid_sy' => $weid,
                'sy_openid_sy'=>$openId
            ));
    }

    /**
     * 通过openid 和用户ID更新用户余额
     * @param $sy_user_data_sy
     * @param $type = 1 消费  $type = 2 充值
     */
    static function updateBalance($sy_user_data_sy,$type=1){
        global $_W,$_GPC;
        $sy_weid_sy = $_W['uniacid'];               //获取当前公众号ID
        $sy_openid_sy=$_W['openid'];//获取当前用户openid
        $sy_last_time_to_recharge_sy=$sy_user_data_sy['sy_last_time_to_recharge_sy']; //获取更新时间

        if($type==2){

            /*充值操作*/
            $sy_add_price_sy=$sy_user_data_sy['sy_add_price_sy'];
        }else{
            /*消费操作*/
            $sy_add_price_sy=$sy_user_data_sy;
        }

        if($type==2){
            /*充值操作*/
            return pdo_fetch("UPDATE ".tablename('wx_shangcheng_user')." 
        SET sy_balance_sy=sy_balance_sy+$sy_add_price_sy,sy_last_time_to_recharge_sy='$sy_last_time_to_recharge_sy'  
        WHERE sy_weid_sy=$sy_weid_sy AND sy_openid_sy='$sy_openid_sy'  ");
        }else{
            /*消费操作*/
            return pdo_fetch("UPDATE ".tablename('wx_shangcheng_user')." 
        SET sy_balance_sy=  $sy_add_price_sy  
        WHERE sy_weid_sy=$sy_weid_sy AND sy_openid_sy='$sy_openid_sy'  ");
        }

    }

    /**
     * 创建一个新用户
     */
    static function createUser(){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID
        $openid=$_W['openid'];
        pdo_insert('wx_shangcheng_user',array(
            'sy_weid_sy'=>$weid,
            'sy_openid_sy' =>$openid,
            'sy_create_time_sy'=>date('y-m-d h:i:s',time()),
            'sy_balance_sy'=> ParConfigModel::getNewUserPresent()
        ));

    }


    /**
     * 获得用户总数
     * @return int
     */
    static function getUserCount(){
        global $_W,$_GPC;

        $weid=$_W['weid'];

        $sy_table_wx_shangcheng_user_sy=tablename("wx_shangcheng_user");
        $sy_sql_sy = "select count(*) as count from $sy_table_wx_shangcheng_user_sy 
        where sy_weid_sy = $weid ";
        $ret=pdo_fetch($sy_sql_sy);
        return intval($ret['count']);
    }

    /*获得用户列表*/
    static function getUserList(){
        global $_W,$_GPC;
        $weid=$_W['weid'];

        /*获得总数*/
        $count=self::getUserCount();
        /*获得分页信息*/
        $p=1;
        if(isset($_GPC['p'])){
            if(intval($_GPC['p'])>0){
                $p=intval($_GPC['p']);
            }
        }
        $sy_table_wx_shangcheng_user_sy=tablename("wx_shangcheng_user");
        $sy_pagesize_sy=10;
        $sy_start_sy=(($p-1)*$sy_pagesize_sy);
        $sy_end_sy=$sy_start_sy+$sy_pagesize_sy;
        $sy_sql_sy="select * from $sy_table_wx_shangcheng_user_sy
        where sy_weid_sy = $weid
        order by sy_balance_sy desc
        limit $sy_start_sy , $sy_end_sy";
        return pdo_fetchall($sy_sql_sy);
    }

}
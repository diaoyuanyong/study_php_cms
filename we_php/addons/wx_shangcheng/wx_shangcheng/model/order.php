<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once(dirname(__FILE__) . "/parConfig.php");


class orderModel
{

    /*获得查询条件*/
    static function getWhere(){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID
        $where= " where sy_weid_sy= $weid";
        $sy_order_type_sy=-1; /*默认商城类型为全部*/
        if(intval($_GPC['sy_order_type_sy'])>0){
            $sy_order_type_sy=intval($_GPC['sy_order_type_sy']);
        }
        if($sy_order_type_sy==1){
            $where.= " and  sy_order_type_sy= 0 ";
        }
        if($sy_order_type_sy==2){
            $where.= " and  sy_order_type_sy= 1 ";
        }
        return $where;
    }

    /*获得订单的数量*/
    static function getListCount(){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID
        $table_wx_shangcheng_order=tablename('wx_shangcheng_order');
        $sql="select count(*) as count from $table_wx_shangcheng_order ";
        $sql.=self::getWhere();
        $result= pdo_fetch($sql);
        return $result['count'];
    }
  

    /*带分页订单查询*/
    static function getOrderListByPage(){
        global $_W,$_GPC;

        /*取得当前页码*/
        $p=intval($_GPC['p']);
        if($p<=0){
            $p=1;
        }

        
        
        $weid = $_W['uniacid'];               //获取当前公众号ID
        $table_wx_shangcheng_order=tablename('wx_shangcheng_order');
        $sql="select  * from $table_wx_shangcheng_order ";

        $sy_pagesize_sy=10;
        $sy_start_sy=(($p-1)*$sy_pagesize_sy);
        $sy_end_sy=$sy_start_sy+$sy_pagesize_sy;
        $sql.=self::getWhere();
        $sql.=" limit $sy_start_sy , 10";
        $result= pdo_fetchall($sql);
        return $result;
    }


    /**
     * 查询当前用户发布的订单置顶时间排序
     * @param $weid要查询订单的公众号ID
     */
    static function getUserOrder()
    {
        global $_W,$_GPC;
        $sy_openid_sy=$_W['openid'];//获取当前用的OPENID
        $sy_weid_sy = $_W['uniacid'];               //获取当前公众号ID


        return $result=pdo_fetchall("select * from".tablename('wx_shangcheng_order')." where sy_openid_sy='$sy_openid_sy' AND sy_weid_sy=$sy_weid_sy AND sy_state_for_manager_sy=1 AND sy_state_for_user_sy=1 order by sy_departure_time_sy Desc ,sy_order_create_time_sy Desc");
    }
    /**
     * 查询所有找乘客的订单
     * @param $weid要查询订单的公众号ID
     */
    static function getPassenger()
    {
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID
/*        $timestamp=$_W['timestamp'];//获得当前时间戳
        $time=date('Y-m-d H:i:s', $timestamp);//将当前时间戳转化为时间格式*/
        $sql="select * from".tablename('wx_shangcheng_order')."where sy_weid_sy=$weid ";


        /*是否显示过期信息*/
        $isHidePastInfo = ParConfigModel::getIsHidePastInfo();
        if($isHidePastInfo ==0){
            /*不显示过期信息*/
            $sql.= " AND sy_departure_time_sy  > " .    "'"  .   date('Y-m-d H:i:s', $_W['timestamp'])   ."'";
        }


        $sql.= " AND sy_state_for_user_sy=1 AND sy_state_for_manager_sy=1 AND sy_order_type_sy=1  order by sy_isTop_sy Desc,sy_order_create_time_sy Desc";

        $p=1;
        if(intval($_GPC['p'])>=1){
            $p=intval($_GPC['p']);
        }

        $start=($p-1)*10;
        $sql.=" limit $start,10";

        return $result=pdo_fetchall($sql);
    }

    /**
     * 查询所有找乘客的订单总数
     * @param $weid要查询订单的公众号ID
     */
    static function getPassengerCount()
    {
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID
        /*        $timestamp=$_W['timestamp'];//获得当前时间戳
                $time=date('Y-m-d H:i:s', $timestamp);//将当前时间戳转化为时间格式*/
        $sql="select count(*) as count from".tablename('wx_shangcheng_order')."where  sy_weid_sy=$weid ";

        /*是否显示过期信息*/
        $isHidePastInfo = ParConfigModel::getIsHidePastInfo();
        if($isHidePastInfo ==0){
            /*不显示过期信息*/
            $sql.= " AND sy_departure_time_sy  > " .    "'"  .   date('Y-m-d H:i:s', $_W['timestamp'])   ."'";
        }

        $sql .="  AND sy_state_for_user_sy=1 AND sy_state_for_manager_sy=1 AND sy_order_type_sy=1 ";
        $result=pdo_fetch($sql);
        return $result['count'];
    }
    /**
     * 查询所有找司机的订单
     * @param $weid要查询订单的公众号ID
     */
    static function getDriver()
    {
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID
/*        $timestamp=$_W['timestamp'];//获得当前时间戳
        $time=date('Y-m-d H:i:s', $timestamp);//将当前时间戳转化为时间格式*/
        $sql="select * from".tablename('wx_shangcheng_order')."where sy_weid_sy=$weid ";


        /*是否显示过期信息*/
        $isHidePastInfo = ParConfigModel::getIsHidePastInfo();
        if($isHidePastInfo ==0){
            /*不显示过期信息*/
            $sql.= " AND sy_departure_time_sy  > " .    "'"  .   date('Y-m-d H:i:s', $_W['timestamp'])   ."'";
        }

        $sql.=" AND sy_order_type_sy=0  AND sy_state_for_user_sy=1 AND sy_state_for_manager_sy=1  order by sy_isTop_sy Desc,sy_order_create_time_sy Desc";

        $p=1;
        if(intval($_GPC['p'])){
            $p=intval($_GPC['p']);
        }
        $start=($p-1)*10;
        $sql.=" limit $start,10";
        return $result=pdo_fetchall($sql);
    }

    /**
     * 查询所有找司机的订单总数
     * @param $weid要查询订单的公众号ID
     */
    static function getDriverCount()
    {
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID
        /*        $timestamp=$_W['timestamp'];//获得当前时间戳
                $time=date('Y-m-d H:i:s', $timestamp);//将当前时间戳转化为时间格式*/
        $sql="select count(*) as count from".tablename('wx_shangcheng_order')."where sy_weid_sy=$weid  ";

        /*是否显示过期信息*/
        $isHidePastInfo = ParConfigModel::getIsHidePastInfo();
        if($isHidePastInfo ==0){
            /*不显示过期信息*/
            $sql.= " AND sy_departure_time_sy  > " .    "'"  .   date('Y-m-d H:i:s', $_W['timestamp'])   ."'";
        }
        $sql.=" AND sy_order_type_sy=0  AND sy_state_for_user_sy=1 AND sy_state_for_manager_sy=1  ";

       $result=pdo_fetch($sql);
        return  $result['count'];
    }

    /**
     * 根据搜索条件查询信息
     * @param $weid要查询订单的公众号ID
     */
    static function getSearch()
    {
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID
        $sy_fromPlace_sy=$_GPC['fromPlace'];//获取出发地
        $sy_toPlace_sy=$_GPC['toPlace'];//获取出发地
        $where="sy_weid_sy=$weid";

        /*是否显示过期信息*/
        $isHidePastInfo = ParConfigModel::getIsHidePastInfo();
        if($isHidePastInfo ==0){
            /*不显示过期信息*/
            $where.= " AND sy_departure_time_sy  > " .    "'"  .   date('Y-m-d H:i:s', $_W['timestamp'])   ."'";
        }




        if(!empty($sy_fromPlace_sy)){
            $where.=" AND sy_place_of_departure_sy LIKE '$sy_fromPlace_sy'";
        }
        if(!empty($sy_toPlace_sy)){
            $where.=" AND sy_destination_sy LIKE '$sy_toPlace_sy'";
        }
/*        $timestamp=$_W['timestamp'];//获得当前时间戳
        $time=date('Y-m-d H:i:s', $timestamp);//将当前时间戳转化为时间格式*/

        $sql="select * from".tablename('wx_shangcheng_order')." where ".$where."   AND sy_state_for_user_sy=1 AND sy_state_for_manager_sy=1 order by sy_isTop_sy Desc,sy_order_create_time_sy Desc";

        $p=1;
        if(intval($_GPC['p'])>=1){
            $p=intval($_GPC['p']);
        }

        $start=($p-1)*10;

        $sql.= " limit $start,10 ";
         $result1=pdo_fetchall($sql);

        //统计信息总数
        $sql="select count(*) as count from".tablename('wx_shangcheng_order')." where ".$where."   AND sy_state_for_user_sy=1 AND sy_state_for_manager_sy=1 ";
        $result2=pdo_fetch($sql);
        return array($result1,$result2);
    }




    /**
     * 根据订单ID查询当前订单
     * @param $sy_id_sy要查询订单的订单ID
     */
    static function getOrder($sy_id_sy,$type=1)
    {
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID
        if($type==0){
            return $result=pdo_get('wx_shangcheng_order',array('sy_weid_sy'=>$weid,'sy_id_sy'=>$sy_id_sy));
        }else{
        return $result=pdo_get('wx_shangcheng_order',array('sy_weid_sy'=>$weid,'sy_id_sy'=>$sy_id_sy,'sy_state_for_manager_sy'=>1,'sy_state_for_user_sy'=>1));
        }
    }

    /**
     * 加一点击量
     * @param $sy_id_sy添加点击量订单的订单ID
     */
    static function AddClick()
    {
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID
        $sy_id_sy=$_GPC['sy_id_sy'];//获取订单ID
        $sql="UPDATE".tablename('wx_shangcheng_order')." SET sy_attention_degree_sy=sy_attention_degree_sy+1 WHERE sy_weid_sy=$weid AND sy_id_sy=$sy_id_sy AND sy_state_for_manager_sy=1 AND sy_state_for_user_sy=1 ";
        pdo_fetchall($sql);
    }

    /**
     * 更新所有订单置顶状态
     * @param
     */
    static function updataIstop()
    {
        global $_W,$_GPC;
        $sy_weid_sy = $_W['uniacid'];               //获取当前公众号ID
        $sy_timestamp_sy=$_W['timestamp'];//获得当前时间戳
        $sy_time_one_sy=date('Y-m-d H:i:s', $sy_timestamp_sy-24*60*60);//将当前一天前的时间戳转化为时间格式
        $sy_time_three_sy=date('Y-m-d H:i:s', $sy_timestamp_sy-24*60*60*3);//将当前3天前的时间戳转化为时间格式
        pdo_fetchall("UPDATE ".tablename('wx_shangcheng_order')." SET sy_isTop_sy=0  WHERE sy_weid_sy=$sy_weid_sy AND sy_isTop_sy=1 AND sy_order_create_time_sy<'$sy_time_one_sy' ");
        pdo_fetchall("UPDATE ".tablename('wx_shangcheng_order')." SET sy_isTop_sy=0  WHERE sy_weid_sy=$sy_weid_sy AND sy_isTop_sy=2 AND sy_order_create_time_sy<'$sy_time_three_sy' ");
    }

    /**
     * 创建订单
     * @param   $data 要创建订单的值
     */
    static function createOrder($sy_data_sy)
    {
        return pdo_insert('wx_shangcheng_order',$sy_data_sy);
    }

    /**
     * 用户删除过期订单
     * @param   $sy_id_sy要删除订单的ID
     */
    static function delUserOrder($sy_id_sy,$type=1)
    {
        if ($type==0){
        return pdo_update('wx_shangcheng_order',
            array("sy_state_for_user_sy"=>-1),
            array("sy_id_sy"=>$sy_id_sy));
        }elseif ($type==1){
            return pdo_update('wx_shangcheng_order',
                array("sy_state_for_manager_sy"=>-1),
                array("sy_id_sy"=>$sy_id_sy));
        }
    }

    /**
     * 用户删除过期订单
     * @param   $sy_id_sy要恢复订单的ID
     */
    static function getOpenidByOid($sy_id_sy)
    {
       $result=pdo_get('wx_shangcheng_order',
            array("sy_id_sy"=>$sy_id_sy),
            sy_openid_sy);
        return $result['sy_openid_sy'];
    }

    /**
     * 用户删除过期订单
     * @param   $sy_id_sy要恢复订单的ID
     */
    static function recoveryUserOrder($sy_id_sy)
    {
            return pdo_update('wx_shangcheng_order',
                array("sy_state_for_manager_sy"=>1),
                array("sy_id_sy"=>$sy_id_sy));
    }

}
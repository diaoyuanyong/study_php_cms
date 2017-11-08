<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class commentModel
{
    //根据订单ID新增一条评论
    static function addComment($data){
        if (!isset($data)) return 0;
        return pdo_insert('wx_shangcheng_comment',$data);
    }



    /*获得查询条件*/
    static function getWhere(){
        global $_W,$_GPC;
        $weid = $_W['uniacid'];               //获取当前公众号ID
        $where= " where sy_weid_sy= $weid";
        return $where;
    }


    /*获得订单的数量*/
    static function getListCount(){
        global $_W,$_GPC;
        $table_wx_shangcheng_comment=tablename('wx_shangcheng_comment');
        $sql="select count(*) as count from $table_wx_shangcheng_comment ";
        $sql.=self::getWhere();
        $result= pdo_fetch($sql);
        return $result['count'];
    }


    static function del($id){

        return pdo_delete('wx_shangcheng_comment',array(
            'sy_id_sy'=>$id
        ));

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
        $table_wx_shangcheng_order=tablename('wx_shangcheng_comment');
        $sql="select  * from $table_wx_shangcheng_order ";
        $sy_pagesize_sy=10;
        $sy_start_sy=(($p-1)*$sy_pagesize_sy);
        $sy_end_sy=$sy_start_sy+$sy_pagesize_sy;
        $sql.=self::getWhere();
        $sql.=" limit $sy_start_sy , 10";
        $result= pdo_fetchall($sql);
        return $result;
    }




    //根据订单ID获取所有评论
    static function allComment($sy_order_id_sy,$sy_num_sy){
        global $_W;
        $sy_weid_sy = $_W['uniacid'];               //获取当前公众号ID
        if (!isset($sy_order_id_sy)) return "";
        $sql="select count(*) as count  from".tablename('wx_shangcheng_comment')."where sy_order_id_sy=$sy_order_id_sy AND sy_weid_sy=$sy_weid_sy";
        $count=pdo_fetch($sql);
        if ($sy_num_sy==5){
            $sql="select *  from".tablename('wx_shangcheng_comment')."where sy_order_id_sy=$sy_order_id_sy AND sy_weid_sy=$sy_weid_sy order by sy_create_time_sy DESC limit 0,5";
            $result=pdo_fetchall($sql);
            return array($count['count'],$result);
        }else{
            $sql="select * from".tablename('wx_shangcheng_comment')."where sy_order_id_sy=$sy_order_id_sy AND sy_weid_sy=$sy_weid_sy order by sy_create_time_sy DESC";
            $result=pdo_fetchall($sql);
            return array($count['count'],$result);
        }
    }

}
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class payModel
{
    /**
     * 创建一个新的支付记录
     * @param    $sy_data_sy要插入新支付记录的数据
     */
    static function createPay($sy_data_sy)
    {
        return pdo_insert('wx_shangcheng_pay',$sy_data_sy);
    }

    /**
     * 更新支付记录支付状态
     * @param    $sy_data_sy要更新的支付状态
     */
    static function updatePay($sy_data_sy)
    {
        global $_GPC,$_W;
        $sy_weid_sy=$_W['uniacid'];//获取当前公众号ID
        $sy_openid_sy=$_W['openid'];//获得当前用户ID
        $sy_pid_sy=$_GPC['sy_pid_sy'];//获取支付ID

/*        var_dump($sy_data_sy);*/

        return pdo_update('wx_shangcheng_pay',$sy_data_sy,
            array(
/*                'sy_openid_sy'=>$sy_openid_sy,*/
                'sy_weid_sy'=>$sy_weid_sy,
                'sy_order_id_sy'=>$sy_pid_sy,
            ));
    }

    /**
     * 获取支付订单充值金额信息
     * @param
     */
    static function getPay()
    {
        global $_GPC,$_W;
        $sy_weid_sy=$_W['uniacid'];//获取当前公众号ID
        $sy_pid_sy=$_GPC['sy_pid_sy'];//获取支付ID
        return pdo_get('wx_shangcheng_pay',array(
            'sy_order_id_sy'=>$sy_pid_sy,
            'sy_weid_sy'=>$sy_weid_sy,
        ),'sy_num_sy');
    }



    /**
     * 获取支付订单总数
     * @param
     */
    static function getPayCount($start,$end)
    {
        global $_W;
        $sy_weid_sy=$_W['uniacid'];//获取当前公众号ID

        $where="where sy_weid_sy=$sy_weid_sy" ;
        if (isset($start)){
            $where.=" AND sy_create_time_sy>='$start'";
        }
        if (isset($end)){
            $where.=" AND sy_create_time_sy<='$end'";
        }
        $sql="select count(*) as count from ".tablename('wx_shangcheng_pay').$where;
        return pdo_fetch($sql);
    }
    /**
     * 根据分页获取所有支付订单信息
     * @param
     */
    static function getPayPaging($sy_start_sy,$sy_end_sy)
    {
        global $_GPC,$_W;
        $sy_weid_sy=$_W['uniacid'];//获取当前公众号ID
        $where=" where sy_weid_sy=$sy_weid_sy";
        if(isset($sy_start_sy)){
            $where.=" AND sy_create_time_sy>='$sy_start_sy'";
        }
        if(isset($sy_end_sy)){
            $where.=" AND sy_create_time_sy<='$sy_end_sy'";

        }


        $sql="select * from ".tablename('wx_shangcheng_pay').$where;
        $p=1;
        if (intval($_GPC['p']>=1)){
            $p=intval($_GPC['p']);
        }
        $start=($p-1)*10;
        $sql.=" limit $start,10";
        return pdo_fetchall($sql);

    }

}
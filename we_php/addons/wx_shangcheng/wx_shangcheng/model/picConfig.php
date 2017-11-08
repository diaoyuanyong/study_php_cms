<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class PicConfigModel
{
   /**
     * 添加修改图片
     * @param $data 要添加的数据
     */
    static function add($data)
    {

        return pdo_insert('wx_shangcheng_picconfig', $data);
    }
    /**
     * 更新修改图片
     * @param $data要更新的数据
     */
    static function updata($data)
    {
        global $_W,$_GPC;
        $sy_id_sy=$_GPC['sy_id_sy'];//获取图片ID
        $weid = $_W['uniacid'];               //获取当前公众号ID
        return $result=pdo_update('wx_shangcheng_picconfig',$data,array('sy_id_sy'=>$sy_id_sy,'sy_weid_sy' => $weid));
    }
    /**
     * 获取图片
     * @param $weid 要获取配置图片的公众号ID
     */
    static function getall($weid)
    {
        return pdo_getall('wx_shangcheng_picconfig', array('sy_weid_sy' => $weid));
    }
    /**
     * 获取图片
     * @param $id 要获取配置图片的ID
     */
    static function get($id)
    {
        return pdo_get('wx_shangcheng_picconfig', array('sy_id_sy' => $id));
    }
    /**
     * 删除图片
     * @param $id 要删除配置图片的ID
     */
    static function del($id)
    {
        global $_W;
        $weid=$_W['uniacid'];//获取当前公众号
        return pdo_delete('wx_shangcheng_picconfig', array('sy_id_sy' => $id,'sy_weid_sy'=>$weid));
    }

}
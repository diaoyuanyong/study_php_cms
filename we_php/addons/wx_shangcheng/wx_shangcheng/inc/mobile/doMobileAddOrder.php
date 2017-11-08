<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(dirname(__FILE__) . "/../../model/user.php");
require_once(dirname(__FILE__) . "/../../model/order.php");
require_once(dirname(__FILE__) . "/../../model/parConfig.php");
global $_W,$_GPC;
$sy_openid_sy=$_W['openid'];//获取用户openid
$sy_weid_sy=$_W['uniacid'];//获取当前公众号ID
$sy_timestamp_sy=$_W['timestamp'];//获得当前时间戳
$sy_time_sy=date('Y-m-d H:i:s', $sy_timestamp_sy);//将当前的时间戳转化为时间格式

$sy_uid_sy=$_GPC['sy_uid_sy'];//获取传过来的用户ID
$sy_order_type_sy=$_GPC['sy_order_type_sy']; /*订单类型*/
$sy_place_of_departure_sy=$_GPC['sy_place_of_departure_sy']; /*出发地*/
$sy_destination_sy =$_GPC['sy_destination_sy']; /*目的地*/
$sy_pathway_sy = $_GPC['sy_pathway_sy'];  /*途径地*/
$sy_departure_time_sy = $_GPC['sy_departure_time_sy']; /*出发时间*/
$sy_replenishment_time_sy = $_GPC['sy_replenishment_time_sy'];/*补充时间*/
$sy_phone_sy= $_GPC['sy_phone_sy']; /*手机号*/
$sy_name_sy= $_GPC['sy_name_sy'];/*联系人*/
$sy_number_sy= $_GPC['sy_number_sy'];  /*空位或乘客数量*/
$sy_isTop_sy = $_GPC['sy_isTop_sy']; /*是否置顶*/
$sy_describe_sy = $_GPC['sy_describe_sy']; /*描述*/



$sy_data_sy=array(
  'sy_openid_sy'=>$sy_openid_sy,
    'sy_weid_sy'=>$sy_weid_sy,
    'sy_order_type_sy'=>$sy_order_type_sy,
    'sy_uid_sy'=>$sy_uid_sy,
    'sy_place_of_departure_sy'=>$sy_place_of_departure_sy,
    'sy_destination_sy'=>$sy_destination_sy,
    'sy_pathway_sy'=>$sy_pathway_sy,
    'sy_departure_time_sy'=>$sy_departure_time_sy,
    'sy_replenishment_time_sy'=>$sy_replenishment_time_sy,
    'sy_phone_sy'=>$sy_phone_sy,
    'sy_name_sy'=>$sy_name_sy,
    'sy_number_sy'=>$sy_number_sy,
    'sy_isTop_sy'=>$sy_isTop_sy,
    'sy_describe_sy'=>$sy_describe_sy,
    'sy_order_create_time_sy'=>$sy_time_sy,
);




$sy_user_sy=userModel::getUserByOpenId($sy_openid_sy);//获取用户信息

if($sy_order_type_sy==0){         //人找商城

    $sy_price_sy=ParConfigModel::getPrice2();//获取人找商城价格
    $sy_new_balance_sy=$sy_user_sy['sy_balance_sy']-$sy_price_sy;//计算余额

    if ($sy_new_balance_sy<0){
        echo json_encode(array("success"=>false,"data"=>"余额不足"));  //返回false
        exit;
    }
    if ($sy_isTop_sy==0&&$sy_new_balance_sy>=0){  //不置顶

        userModel::updateBalance($sy_new_balance_sy);             //更新余额
        orderModel::createOrder($sy_data_sy);                     //插入新订单
        echo json_encode(array("success"=>true));  //返回true


    }elseif($sy_isTop_sy==1&&$sy_new_balance_sy>=0){  //置顶一天

        $sy_isTop_price3_sy=ParConfigModel::getIsTopPrice3();//获取人找商城获取一天置顶价格
        $sy_new_balance_sy-=$sy_isTop_price3_sy;
        if ($sy_new_balance_sy>=0){

            userModel::updateBalance($sy_new_balance_sy);             //更新余额
            orderModel::createOrder($sy_data_sy);                     //插入新订单
            echo json_encode(array("success"=>true));  //返回true

        }else{
            echo json_encode(array("success"=>false,"data"=>"余额不足"));  //返回false
        }


    }elseif ($sy_isTop_sy==2&&$sy_new_balance_sy>=0){ //置顶3天

        $sy_isTop_price4_sy=ParConfigModel::getIsTopPrice4();//获取人找商城获取三天置顶价格
        $sy_new_balance_sy-=$sy_isTop_price4_sy;
        if ($sy_new_balance_sy>=0){

            userModel::updateBalance($sy_new_balance_sy);             //更新余额
            orderModel::createOrder($sy_data_sy);                     //插入新订单
            echo json_encode(array("success"=>true));  //返回true

        }else{
            echo json_encode(array("success"=>false,"data"=>"余额不足"));  //返回false
        }

    }

}elseif($sy_order_type_sy==1){    //商城找人

    $sy_price_sy=ParConfigModel::getPrice1();//获取商城找人价格
    $sy_new_balance_sy=$sy_user_sy['sy_balance_sy']-$sy_price_sy;//计算余额

    if ($sy_new_balance_sy<0){
        echo json_encode(array("success"=>false,"data"=>"余额不足"));  //返回false
        exit;
    }
    if ($sy_isTop_sy==0&&$sy_new_balance_sy>=0){  //不置顶

        userModel::updateBalance($sy_new_balance_sy);             //更新余额
        orderModel::createOrder($sy_data_sy);                     //插入新订单
        echo json_encode(array("success"=>true));  //返回true

    }elseif($sy_isTop_sy==1&&$sy_new_balance_sy>=0){  //置顶一天

        $sy_isTop_price1_sy=ParConfigModel::getIsTopPrice1();//获取商城找人一天置顶价格
        $sy_new_balance_sy-=$sy_isTop_price1_sy;
        if ($sy_new_balance_sy>=0){

            userModel::updateBalance($sy_new_balance_sy);             //更新余额
            orderModel::createOrder($sy_data_sy);                     //插入新订单
            echo json_encode(array("success"=>true));  //返回true

        }else{
            echo json_encode(array("success"=>false,"data"=>"余额不足"));  //返回false
        }


    }elseif ($sy_isTop_sy==2&&$sy_new_balance_sy>=0){ //置顶3天

        $sy_isTop_price2_sy=ParConfigModel::getIsTopPrice2();//获取商城找人三天置顶价格
        $sy_new_balance_sy-=$sy_isTop_price2_sy;
        if ($sy_new_balance_sy>=0){

            userModel::updateBalance($sy_new_balance_sy);             //更新余额
            orderModel::createOrder($sy_data_sy);                     //插入新订单
            echo json_encode(array("success"=>true));  //返回true

        }else{
            echo json_encode(array("success"=>false,"data"=>"余额不足"));  //返回false
        }

    }


}


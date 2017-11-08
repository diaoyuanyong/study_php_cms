<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(dirname(__FILE__) . "/../../model/comment.php");
require_once(dirname(__FILE__) . "/../../model/parConfig.php");
require_once(dirname(__FILE__) . "/../../model/order.php");


global $_GPC,$_W;

$weid = $_W['uniacid'];               //获取当前公众号ID
$sy_openid_sy=$_W['openid'];//获取用户openid
$sy_information_sy = $_W['fans'];//获取用户信息
$img = isset($sy_information_sy['tag']['avatar'])?$sy_information_sy['tag']['avatar']:"";
$sy_order_id_sy=$_GPC['orderId'];
$sy_comment_sy=$_GPC['content'];
$nickname  = $_W['fans']['nickname'];
$sy_timestamp_sy=$_W['timestamp'];//获得当前时间戳
$sy_time_one_sy=date('Y-m-d H:i:s', $sy_timestamp_sy);//将当前一天前的时间戳转化为时间格式
if (isset($sy_openid_sy)){
    $data=array(
        'sy_weid_sy'=>$weid,
        'sy_order_id_sy'=>$sy_order_id_sy,
        'sy_comment_sy'=>$sy_comment_sy,
        'sy_create_time_sy'=>$sy_time_one_sy,
        'sy_comment_user_openid_sy'=>$sy_openid_sy,
        'sy_nickname_sy'=>$nickname,
        'sy_img_sy'=>$img
    );
    $result=commentModel::addComment($data);
    if ($result){

        $tplid= ParConfigModel::getTplId();

        if($tplid!=""){
            $order = orderModel::getOrder($sy_order_id_sy,0);
            $openid = $order['sy_openid_sy'];
            $content = array(
                'first'    => array(
                    'value' => '你好，你有一条客户留言',
                ),
                'keyword1' => array(
                    'value' => $sy_comment_sy,
                ),
                'keyword2' => array(
                    'value' => date("Y-m-d H:i,TIMESTAMP"),
                ),
                'remark'   => array(
                    'value' => '请登录“我的消息”页面进行处理，谢谢。！',
                ),
            );

            $this->sendtpl($openid,'',$tplid,$content);
        }


        echo json_encode(array('status'=>true,'result'=>"评论成功"));
    }else{
        echo json_encode(array('status'=>false,'result'=>'评论错误请重试'));
    }

}else{
    echo json_encode(array('status'=>false,'result'=>'请先关注公众号'));
}
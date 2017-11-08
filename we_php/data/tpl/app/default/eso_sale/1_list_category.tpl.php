<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>分类列表</title>
	<meta content="telephone=no" name="format-detection" />
	<link rel="apple-touch-icon-precomposed" href="../addons/eso_sale/recouse/images/apple-touch-icon.png"/>
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="viewport" content="width=320, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link href="../addons/eso_sale/recouse/css/reset.css" rel="stylesheet" type="text/css" />
	<link href="../addons/eso_sale/recouse/css/search_new.css" rel="stylesheet" type="text/css" />
	<link href="../addons/eso_sale/recouse/css/foot.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../addons/eso_sale/recouse/css/xmapp.css"/>
    <link href="../addons/eso_sale/recouse/css/xin_v3.s.min.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../addons/eso_sale/recouse/js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="../addons/eso_sale/recouse/js/search.js"></script>
	<script type="text/javascript" src="../addons/eso_sale/recouse/js/iscroll.js"></script>
	<script type="text/javascript" src="../addons/eso_sale/recouse/js/jquery.lazyload.js"></script>
<script type="text/javascript" src="../addons/eso_sale/recouse/js/fbi.js"></script>
	<script type="text/javascript">
    jQuery(document).ready(
    function($){
		$(".productlist img").lazyload({
         placeholder : "../addons/eso_sale/recouse/images/img_bg4.png",
         effect      : "fadeIn"
    });
    });
    </script>
	<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".row_list img").lazyload({
            placeholder: "../addons/eso_sale/recouse/images//img_bg4.png",
            effect: "fadeIn"
        });
        $("#submit").click(function() {
            if($("#search_word").val()){
                $("#searchForm").submit();
            } else {
                alert("请输入关键词！");
                return false;
            }
        });
    });
</script>
</head>
<script type="text/javascript">
	document.write('<div id="global_loading" style="width: 100%;height: 100%;position: fixed;top: 0;left: 0;background-color: #eee;z-index:999"><div style="width: 100px;height: 75px;margin:auto;top:50%;position:relative"><span style="display:block;float:left;width:32px;height:32px;background:url(/../addons/eso_sale/recouse/images/spacer.gif);margin-top:-5px;"></span>&nbsp;&nbsp;加载中...</div></div>');
</script>
<body>
	<!--<div class="search">
<div class="header_03">
  <div class="back"> <a href="<?php  echo $this->mturl('list')?>" class="arrow"></a> </div>
  <div style="" class="tit">
    <h3>分类浏览</h3>
  </div>
  <div class="nav">
    <ul>
      <li class="cart"> <a href="<?php  echo $this->mturl('mycart')?>">购物车</a> <span style="display:none" id="ShoppingCartNum"></span> </li>
    </ul>
  </div>
</div>		锚点-->

<div class="WX_search" id="mallHead">
    <div class="WX_bar_cate">
        <a href="<?php  echo $this->mturl('listCategory')?>" id="__cate"></a>
    </div>
    <form role="form" class="WX_search_frm" method="get" id="searchForm" name="searchForm" action="./index.php">
		<input type="hidden" name="i" value="<?php  echo $uniacid;?>" />
		<input type="hidden" name="do" value="Search" />
        <input type="hidden" name="c" value="entry" />
        <input type="hidden" name="m" value="eso_sale" >
        <input name="keyword" id="search_word" class="WX_search_txt hd_search_txt_null" placeholder="请输入商品名进行搜索！" ptag="37080.5.2" type="search"  AUTOCOMPLETE="off"/>
      
    <div class="WX_me">
        <a href="javascript:;" id="submit" class="WX_search_btn_blue" >搜索</a>
    </div>
	 </form>
</div>
<div class="WX_tab Top_tab" id="toolbarHead">
    <div class="WX_tab_wrap">
      
        <span class="WX_tab_inner">
            <a href="<?php  echo $this->mturl('list')?>">首页</a>
            <a href="<?php  echo $this->mturl('list2',array('isnew'=>1))?>">新品</a>
            <a href="<?php  echo $this->mturl('list2',array('isdiscount'=>1))?>">特价</a>
            <a href="<?php  echo $this->mturl('list2',array('istime'=>1))?>">限时</a>
        </span>
    </div>
</div>

<div class="tab">

        <!--Tab 标签end-->

<!-- 分类浏览begin -->
<div class="category">
<ul>
    <?php  if(is_array($category)) { foreach($category as $item) { ?>
    <li class="clearfix">
        <div class="info">
            <p class="name"><a href="<?php  echo $this->mturl('list2', array('pcate' => $item['id']))?>"><?php  echo $item['name'];?></a></p>
                <div class="data">
                    <?php  if(is_array($children[$item['id']])) { foreach($children[$item['id']] as $child) { ?>
                    <a href="<?php  echo $this->mturl('list2', array('ccate' => $child['id']))?>"><?php  echo $child['name'];?></a>
                    <?php  } } ?>
                </div>
        </div>
    </li>
    <?php  } } ?>
</ul>
</div>
<!-- 分类浏览end -->
    </div>
</div>
<!--页面底部-->
<div class="viewport">
    <div id="footer" class="footer">
        <div class="row g_1">
            <a href="<?php  echo $this->mturl('list')?>">首页</a>
            <a href="<?php  echo $this->mturl('myorder')?>">我的订单</a>
            <a href="<?php  echo $this->mturl('mycart')?>">购物车</a>
        </div>
        <div class="row g_2">
            <a href="javascript:window.scrollTo(0,0);">返回顶部</a>
        </div>
        <div class="row g_3">
            <p>@<?php  echo $_W['account']['name'];?></p>
        </div>
    </div>
</div>

<div class="wx_nav"><a href="<?php  echo $this->mturl('list')?>" data-href="###" ptag="37080.1.1" class="nav_index on">首页</a>
    <a href="<?php  echo $this->mturl('listCategory')?>"  ptag="37080.1.2" class="nav_search" style="display:">分类</a>
    <a href="<?php  echo $this->mturl('mycart')?>"  ptag="37080.1.3" class="nav_shopcart">购物车</a>
    <a href="<?php  echo $this->mturl('myorder')?>"  ptag="37080.1.4" class="nav_me">我的订单</a>
    <a href="<?php  echo $ydyy;?>"  ptag="37080.1.4" class="nav_fav">一键关注</a>
</div>

<script src="../addons/eso_sale/recouse/js/zepto.min.js" type="text/javascript"></script>
<script type="text/javascript">
Zepto(function($){
   var $nav = $('.global-nav'), $btnLogo = $('.global-nav__operate-wrap');
   //点击箭头，显示隐藏导航
   $btnLogo.on('click',function(){
     if($btnLogo.parent().hasClass('global-nav--current')){
       navHide();
     }else{
       navShow();
     }
   });
   var navShow = function(){
     $nav.addClass('global-nav--current');
   }
   var navHide = function(){
     $nav.removeClass('global-nav--current');
   }
   
   $(window).on("scroll", function() {
		if($nav.hasClass('global-nav--current')){
			navHide();
		}
	});
})
function get_search_box(){
	try{
		document.getElementById('get_search_box').click();
	}catch(err){
		document.getElementById('keywordfoot').focus();
 	}
}
</script><script type="text/javascript">
		var global_loading=document.getElementById("global_loading");
		global_loading.parentNode.removeChild(global_loading);
</script>
<script type="text/javascript">
//获取指定cookes函数
function getCookie(name) {
    var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
    if (arr = document.cookie.match(reg))
        return unescape(arr[2]);
    else
        return null;
}
</script>
</body>
<?php 
    require_once IA_ROOT."/jssdk.class.php";
    $appid = $this->module['config']['appid'];
    $secret = $this->module['config']['secret'];
    $weixin = new jssdk($appid,$secret);
    $wx = $weixin->get_sign();
?>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
    wx.config({
        appId: "<?php  echo $wx['appId'];?>",
        timestamp: <?php  echo $wx['timestamp'];?>,
        nonceStr: "<?php  echo $wx['nonceStr'];?>",
        signature: "<?php  echo $wx['signature'];?>",
        jsApiList: [
            'checkJsApi',
            'onMenuShareTimeline',
            'onMenuShareAppMessage',
            'onMenuShareQQ',
            'onMenuShareWeibo',
            'hideMenuItems',
            'showMenuItems',
            'hideAllNonBaseMenuItem',
            'showAllNonBaseMenuItem',
            'translateVoice',
            'startRecord',
            'stopRecord',
            'onRecordEnd',
            'playVoice',
            'pauseVoice',
            'stopVoice',
            'uploadVoice',
            'downloadVoice',
            'chooseImage',
            'previewImage',
            'uploadImage',
            'downloadImage',
            'getNetworkType',
            'openLocation',
            'getLocation',
            'hideOptionMenu',
            'showOptionMenu',
            'closeWindow',
            'scanQRCode',
            'chooseWXPay',
            'openProductSpecificView',
            'addCard',
            'chooseCard',
            'openCard'
        ]
    });
    wx.ready(function () {
        var mid=getCookie("mid");
        var shareData = {
            title: '<?php  echo $_W['account']['name'];?>',
            desc: '看你能捞多少佣金',
            link: "<?php  echo $wx['url'];?>",
            imgUrl: '<?php  echo $_W['attachurl'];?><?php  echo $logo;?>',
        };
        //分享朋友
        wx.onMenuShareAppMessage({
            title: shareData.title,
            desc: shareData.desc,
            link: shareData.link,
            imgUrl:shareData.imgUrl,
            trigger: function (res) {
            },
            success: function (res) {
                window.location.href ='<?php  echo $_W['siteroot']."app/".$this->mturl('list',array('id'=>$id))?>&mid='+mid;
                TopBox.alert("分享后成功,等着收佣金吧!");
            },
            cancel: function (res) {
                TopBox.alert("分享后获得积分,还有可能得到佣金哦!不要错过发大财的机会!");
            },
            fail: function (res) {
                alert(JSON.stringify(res));
            }
        });
        //朋友圈
        wx.onMenuShareTimeline({
            title: shareData.title+"---"+shareData.desc,
            link: shareData.link,
            imgUrl:shareData.imgUrl,
            trigger: function (res) {
            },
            success: function (res) {
                window.location.href ='<?php  echo $_W['siteroot']."app/".$this->mturl('list',array('id'=>$id))?>&mid='+mid;
            },
            cancel: function (res) {
            },
            fail: function (res) {
                alert(JSON.stringify(res));
            }
        });

        //显示分享
        wx.showOptionMenu();
    });
</script>
</html>
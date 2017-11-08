<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title><?php  echo $_W['page']['copyright']['sitename'];?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- CSS -->
		<link type="text/css" rel="stylesheet" href="./resource/daqi_login/page.css" />
        <link rel="stylesheet" href="./resource/daqi_login/reset.css">
        <link rel="stylesheet" href="./resource/daqi_login/supersized.css">
        <link rel="stylesheet" href="./resource/daqi_login/style.css">
		<style>
		.lo {}
		.lo a{color:#fff;text-decoration:none;font-size:14px}
		</style>
    </head>

    <body>

        <div class="page-container">
            <h1><?php  echo $_W['page']['copyright']['sitename'];?></h1>
          	<form name="form1" method="post" action="" id="form1" class="myform">
                <input type="text" name="username" class="username" placeholder="用户名">
                <input type="password" name="password" class="password" placeholder="密码">				
<?php  if(!empty($_W['setting']['copyright']['verifycode'])) { ?>
				<input name="verify" type="text" placeholder="请输入验证码">
				<img style="height: 37px;left: 161px;position: absolute;top: 167px;" title="点击图片更换验证码" src="<?php  echo url('utility/code')?>" onclick="this.src=this.src+&quot;&amp;&quot;+Math.random()" id="toggle">
					
<?php  } ?>
				
                <button name="submit" type="submit" value="登录">登录</button>
<?php  if(!$_W['siteclose']) { ?>				<a style="padding-top:5px;font-size:14px;float:right;color:#fff;text-decoration:none;" href="<?php  echo url('user/register');?>">注册账号>></a>
<?php  } ?>                <div class="error"><span>+</span></div>
            <input name="token" value="<?php  echo $_W['token'];?>" type="hidden" />
			</form>
           
        </div>
           <div class="lo" style="clear:both;margin-top:80px"><?php  if($_W['setting']['copyright']['footerright']) { ?><?php  echo $_W['setting']['copyright']['footerright'];?><?php  } else { ?><a target="_blank" href="http://www.haoid.cn"><b>好站长资源网</b></a><?php  } ?></div>
           <div class="lo" style="margin-top:5px"><?php  if($_W['setting']['copyright']['footerleft']) { ?><?php  echo $_W['setting']['copyright']['footerleft'];?><?php  } else { ?><a target="_blank" href="http://www.haoid.cn"><b>www.haoid.cn</b></a><?php  } ?></div>
  
        <!-- Javascript -->
        <script src="./resource/daqi_login/jquery-1.8.2.min.js"></script>
        <script src="./resource/daqi_login/supersized.3.2.7.min.js"></script>
        <script src="./resource/daqi_login/supersized-init.js"></script>
        <script src="./resource/daqi_login/scripts.js"></script>

    </body>

</html>
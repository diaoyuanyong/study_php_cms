<?php
/**
 * [WeEngine System] Copyright (c) 2014 176dj.com
 * WeEngine is NOT a free software, it under the license terms, visited http://www.haoid.cn/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
if (!empty($_W['uid'])) {
	header('Location: '.url('account/display'));
	exit;
}
$settings = $_W['setting'];
$copyright = $settings['copyright'];
$copyright['slides'] = iunserializer($copyright['slides']);
if (isset($copyright['showhomepage']) && empty($copyright['showhomepage'])) {
	header("Location: ".url('user/login'));
	exit;
}
load()->model('article');
$notices = article_notice_home();
$news = article_news_home();

$them = $_GET[a];
if($them){
	template('account/'.$them);
}else{
	template('account/welcome');
}

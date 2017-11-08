<?php
/**
 * 好站长资源网
 * http://www.haoid.cn
 */
if($action != 'entry') {
	define('FRAME', 'setting');
	$frames = buildframes(array(FRAME));
	$frames = $frames[FRAME];
}

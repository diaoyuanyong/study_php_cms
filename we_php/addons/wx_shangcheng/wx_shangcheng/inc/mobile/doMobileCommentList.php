<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(dirname(__FILE__) . "/../../model/comment.php");
global $_GPC;
$sy_id_sy=$_GPC['id'];
$sy_num_sy=$_GPC['num'];
$sy_data_sy=commentModel::allComment($sy_id_sy,$sy_num_sy);
$sy_comments_sy=$sy_data_sy[1];
$sy_count_sy=$sy_data_sy[0];
include $this->template('commentList');

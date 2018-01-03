<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Tool{
    //弹窗跳转
    /*
     *Tool::funciton alertLocation 返回倒指定的连接
     * @param String $_info; 弹出向用户的描述
     * @param String $_url; 连接
     */
    static public function alertLocation($_info,$_url){
            echo "<script type='text/javascript'>alert('$_info');location.href='$_url'</script>";
            exit();
    }
    //弹窗返回
   
    /*
     * Tool::funciton alertBackLocation  返回上一个页面
     * @param String $_info;  弹出向用户的描述
     */
    static public function alertBackLocation($_info){
            echo "<script type='text/javascript'>alert('$_info');history.back()</script>";
            exit();
    }
 } 
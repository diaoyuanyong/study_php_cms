<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.b
 */
namespace Article;

const PATH = '/article';

function getCommentTotal() {
    $aa =  500;
    return $aa;
    
}

class Comment { }


namespace MessageBoard;

const PATH = '/message_board';

function getCommentTotal() {
    return 300;
}

class Comment { }
echo \Article\PATH;
$comment = new Comment();

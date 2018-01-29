<?php
return [
    //news/sport/13
//    'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',

//    'news/77' => 'news/view',
//    'news/15' => 'news/view',
    'news/([0-9]+)' => 'news/view/$1',       //actionView in NewsController
    'news' => 'news/index',       //actionIndex in NewsController


    'products' => 'product/list'  //actionList in ProductController
];
/**
 * Created by PhpStorm.
 * User: Kostiantyn
 * Date: 29.01.2018
 * Time: 0:20
 */
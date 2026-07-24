<?php

session_start();

$map=[
    'category'=>'CategoryController'
];

$actions=[
    'index',
    'create',
    'edit',
    'delete'
];

$controller=$_GET['controller'] ?? 'category';
$action=$_GET['action'] ?? 'index';

if(!isset($map[$controller]) || !in_array($action,$actions)){
    die("404");
}

require "../controllers/".$map[$controller].".php";

$c=new $map[$controller];

$c->$action();
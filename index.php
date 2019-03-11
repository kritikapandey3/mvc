<?php

define("BASEDIR", __DIR__);
include_once BASEDIR."/vendor/autoload.php";
$user = new \App\Models\User();
$user->select('name, address')->offset(offset: 1)->limit(limit: 1);
//$user->select( 'name, address');
//$user->offset(  1);
//$user->limit( 1);
//$mysql = new \System\DB\Database();
//dump($mysql);
//$db = new System\DB\Database;
dump($dbuser);

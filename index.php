<?php

define("BASEDIR", __DIR__);

include_once BASEDIR."/vendor/autoload.php";

$app = new \System\Core\Initialize;
$app->start();

//    echo date_default_timezone_get();


//    $user = new \App\Models\User();
//    $users = $user->select('name, address')->offset( 1)->limit(1)->where('name', 'ram')->orWhere('address', '!=')->single();
//    $users = $user->select('name, address')->order('age', 'DESC')->get();
//    foreach ($users as $item){
//      echo "NAme: {$item->name}<br>Adresss: {$item->address}";
//    }







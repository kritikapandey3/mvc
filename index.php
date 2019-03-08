<?php

define("BASEDIR", __DIR__);
include_once BASEDIR."/vendor/autoload.php";
$mysql = new \System\DB\Database();
dump($mysql);
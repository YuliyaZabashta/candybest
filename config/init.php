<?php

define("DEBUG", 0);
define("ROOT",dirname(__DIR__));
define("WWW", ROOT.'/public');
define("APP", ROOT. '/app');
define("CORE", ROOT. '/vendor/myproject/core');
define("LIBS", ROOT. '/vendor/myproject/core/libs');
define("CACHE", ROOT. '/tmp/cache');
define("CONF", ROOT. '/config');
define("LAYOUT", 'candyes');

//http://localhost:3000/config/init.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";

//http://localhost:3000/public/
$app_path = preg_replace("#[^/]+$#", '', $app_path);

//http://localhost:3000
$app_path = str_replace('/public/', '', $app_path);

define("PATH", $app_path);
define("ADMIN", PATH. '/admin');

require_once ROOT. '/vendor/autoload.php';

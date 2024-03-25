<?php

use Dotenv\Dotenv;

require __DIR__."/../vendor/autoload.php";
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
use App\Router;


define('STORAGE_PATH',__DIR__.'/../storage/');
$router = new Router();

$router->get("/",['\App\Controllers\HomeController','index'])
       ->post("/dashboard",['\App\Controllers\HomeController','dashboard'])
        ->get("/dashboard",["\App\Controllers\HomeController",'index']);




(new \App\App($router,(new \App\Config($_ENV))))->run(
    [
        "requestMethod"=>strtolower($_SERVER["REQUEST_METHOD"]),
        "route" => $_SERVER["REQUEST_URI"]
    
    ]
);





?>
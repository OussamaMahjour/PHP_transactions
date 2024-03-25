<?php

namespace App;
class App{

    public static DB $db; 

    public function __construct(
        protected Router $router,
        protected Config $config,
    )
    {
        static::$db=new DB($config->db??[]);
    }
    public static function db():DB{
        return static::$db;
    }
    public function run($server){
        $this->router->resolve($server["requestMethod"],$server["route"]);
    }
}

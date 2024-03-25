<?php

namespace App;

class Config{
    protected array $config=[];
    public function __construct(array $env)
    {
        $this->config = [
            "db" =>[
                'driver'=>$env['DB_DRIVER']?? 'mysql',
                'host'=>$env['DB_HOST'],
                'database'=>$env['DB_DATABASE'],
                'user'=>$env['DB_USER'],
                'password'=>$env['DB_PASS']
            ]
            ];
        
    }
    public function __get(string $name){
        return $this->config[$name] ??null;
    }
    
}


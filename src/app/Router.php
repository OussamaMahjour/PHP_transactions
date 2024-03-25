<?php
namespace App;

use App\Exceptions\RouteNotFoundException;

class Router{
    protected array $routes = [];
    public function registre(string $requestMethod,string $route,callable|array $action):self{

        $this->routes[$requestMethod][$route] = $action;

        
        
        return $this;

    }
    public function get(string $route,callable|array $action):self{
        return $this->registre('get',$route,$action);
    }
    public function post(string $route,callable|array $action):self{
        return $this->registre('post',$route,$action);
    }
    public function resolve(string $requestMethod,$route){
        $action = $this->routes[$requestMethod][$route] ?? null;
        try{
        if(is_callable($action)){
            call_user_func($action,[]);
        }
        else if(is_array($action)){
            [$class,$method] = $action;
            if(class_exists($class)){
                $class = new $class();
                $class->addObserver($this);
                if(is_callable([$class,$method])){
                    call_user_func_array([$class,$method],[]);
                }
            }
        }
        else{
                
               throw new RouteNotFoundException();
               
    
            }
        }catch(RouteNotFoundException $e){
            echo $action;
            header("HTTP/1.0 404 Not Found");
            \App\View::make('errors/404',[]);
        }

    }
    function update(){
        $this->resolve('get','/');
    }

}
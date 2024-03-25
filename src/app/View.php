<?php
namespace App;

use App\Exceptions\ViewNotFoundException;
use Exception;

class View{
    public function __construct(
        protected string $view,
        protected array $param
        )        
    {
        
    }
    public function render(){
        $param = $this->param;
        try{
        include __DIR__."/../views/".$this->view.".php";
        }
        catch(Exception $e){
            throw new ViewNotFoundException();
        }
        return $this;
    }
    public static function make(string $view,array $param){
        return (new static($view,$param))->render();

    }
}
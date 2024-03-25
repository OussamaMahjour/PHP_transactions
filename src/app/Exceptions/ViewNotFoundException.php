<?php

namespace App\Exceptions;
class ViewNotFoundException extends \Exception{
    protected $message = "404 View Not Found";
    public function __invoke()
    {
        header("HTTP/1.0 404 Not Found");
        \App\View::make('404',[]);
    }
}
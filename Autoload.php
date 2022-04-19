<?php

class Autoload{

    public function __construct()
    {
        spl_autoload_register(function($class){
            if(file_exists('DAO/' . $class . '.php'))
                include 'DAO/' . $class . '.php';

            if(file_exists('Model/' . $class . '.php'))
                include 'Model/' . $class . '.php';   
                
            if(file_exists('Controller/' . $class . '.php'))
                include 'Controller/' . $class . '.php';    
        });
    }
}

new Autoload();
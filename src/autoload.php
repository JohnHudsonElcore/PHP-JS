<?php

    spl_autoload_register(function($className){
        if(stristr($className , 'PHPJS\\'))
        {
            # make sure it is a PHPJS class. 
            
            $path = str_replace('\\' , '/' , $className) . '.php';
            
            if ( !file_exists ( __DIR__ . '/' . $path ) )
            {
                   throw new \Exception("PHPJS: Cannot find class: {$className}");
            }
            
            require_once ( __DIR__ . '/' . $path );
        }
    });

?>

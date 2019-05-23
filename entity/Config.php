<?php

spl_autoload_register(function($className){
    
    $dirClass = "entity";
    $fileName = $dirClass.DIRECTORY_SEPARATOR.$className."php";
    if(file_exists($fileName))
        require_once($fileName);
        
});
<?php

spl_autoload_register(function($class)
{
    //echo $class;
    $filename = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
    //var_dump($filename);
    
    if(file_exists($filename))
    {
        include($class.'.php');
    }
    elseif(file_exists("./src/".$filename))
    {
        include("./src/".$filename);
    }
})
?>
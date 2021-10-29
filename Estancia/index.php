<?php

if(isset($_GET['action']))
{
    
    $rutas=explode("/",$_GET['action']);
    if(count($rutas)>=2)
    {
        $controller=$rutas[0];
        $action=$rutas[1];
    }
    else if(count($rutas)==1)
    {
        $controller="index";
        $action=$rutas[0];
    }
    else
    {
        $controller=$rutas[0];
        $action="index";
    }
}
else
{
    $controller='index';
    $action='index';
}

require_once("routes.php");
?>
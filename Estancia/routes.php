<?php

function Call($action,$controller)
{
    if($controller=="index" || $controller=="Exercise" || $controller=="User")
    {
        $url='controllers/'.$controller.'_Controller.php';
        require_once($url);
        
        if($controller=='User')
        {
            require_once('Models/User.php');
            $controller= new User_Controller;
        }
        else if($controller=='index')
        {
            require_once('Models/Principal.php');
            $controller= new Principal_Controller;
        }
        else if($controller=='Exercise')
        {
            require_once('Models/Ejercicios.php');
            $controller= new Ejercicios_Controller;
        }
        else
        {
            require_once("Views/error.php");
        }
        $controller->{ $action}();
    }
    else {
        require_once("Views/error.php");
    }

}

switch ($controller) {

    case 'User':
        $controllers=array(
            'User'=>['Perfil','error', 'Logout']
        );
        break;
    case 'Exercise':
        $controllers=array(
            'Exercise'=>['Intensidad','Agrado','error','Umbral', 'Preferencias','UmbralAmargo', 'UmbralGraso']
        );
        break;
    default:
        $controllers=array(
            'index'=>['index','Acerca', 'Registro','Login','error','Updatelist','AgradoResult', 'IntensidadResult','PreferenciaResult','AmargoUmbralResult','GrasoUmbralResult', 'real', 'Results']
        );
        break;
}

if(array_key_exists($controller, $controllers))
{
    if(in_array($action,$controllers[$controller]))
    {
        Call($action,$controller);
        
    }
    else
    {
        Call("error",$controller);
    }
}
else
{
    echo Call("error",$controller);
    
}


?>
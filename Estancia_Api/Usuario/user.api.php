<?php
if(isset($_GET['action']))
{
    $rutas=explode("/",$_GET['action']);
    $action=$rutas[0];
    
    if($action=="Usuario" && $rutas[1]=="All")
    {
        $actions=$rutas[1];
        require_once("Usuario/index.php");
        
    }
    else if($action=="Usuario" && $rutas[1]=="GETCONCEN" && $rutas[2])
    {
        $id=$rutas[2];
        $actions=$rutas[1];
        require_once("Usuario/index.php");
        
    }
    else if($action=="Usuario" && $rutas[1]=="GETVIS" && $rutas[2])
    {
        $id=$rutas[2];
        $actions=$rutas[1];
        require_once("Usuario/index.php");
        
    }
    else if($action=="Usuario" && $rutas[1]=="ALLVIS" && $rutas[2])
    {
        $id=$rutas[2];
        $actions="ALLVIS";
        require_once("Usuario/index.php");
        
    }

    else if($action=="Usuario" && $rutas[1]=="GET" && $rutas[2])
    {
        $id=$rutas[2];
        $actions=$rutas[1];
        require_once("Usuario/index.php");
    }
    else if($action=="Usuario" && $rutas[1]=="GETCONT" && $rutas[2])
    {
        $ids=$rutas[2];
        $actions=$rutas[1];
        require_once("Usuario/index.php");
    }
    else if($action=="Usuario" && $rutas[1]=="PUT" && $rutas[2])
    {
        if(isset($_POST['action']))
        {
            if($_POST['action']=="PUT")
            {
                $id=$rutas[2];
                $actions=$rutas[1]; 
                $name=$_POST['Nombre'];
                $peso=$_POST['Peso'];
                $gen=$_POST['Genero'];
                $edad=$_POST['Edad'];
                $altura=$_POST['Altura'];
                $cintura=$_POST['Cintura'];
               
                $imc=$peso/(round($altura*$altura));
                require_once("Usuario/index.php");
            }       
        }
        
    }
    elseif($action == "Usuario"  && $rutas[1]=="POST")
    {
        if(isset($_POST['action']))
        {
            if($_POST['action']=="POST")
            {
                try {
                    $name=$_POST['Nombre'];
                    $peso=$_POST['Peso'];
                    $gen=$_POST['Genero'];
                    $edad=$_POST['Edad'];
                    $altura=$_POST['Altura'];
                    $cintura=$_POST['Cintura'];
                    $actions="POST";
                    if($name=="")
                    {
                        echo json_encode("Error");
                    }
                    else if($peso=="")
                    {
                        echo json_encode("Error");
                    }
                    else if($edad=="")
                    {
                        echo json_encode("Error");
                    }
                    else if($altura=="")
                    {
                        echo json_encode("Error");
                    }
                    else if($cintura=="")
                    {
                        echo json_encode("Error");
                    }
                    else if($gen=="")
                    {
                        echo json_encode("Error");
                    }
                    else
                    {
                        $imc=$peso/(round($altura*$altura));
                        require_once("Usuario/index.php");
                    }
                    
                } catch (\Throwable $th) {
                   
                }
            }   
        }
    }
    elseif($action=="Usuario"  && $rutas[1]=="POSTVIS")
    {
        if(isset($_POST['action']))
        {
            if($_POST['action']=="POSTVIS")
            {
                // try {
                    $id=$_POST['numero'];
                    $peso=$_POST['Peso'];
                    $edad=$_POST['Edad'];
                    $altura=$_POST['Altura'];
                    $cintura=$_POST['Cintura'];
                    $actions="POSTVIS";
                    $imc=$peso/(round($altura*$altura));
                    require_once("Usuario/index.php");
                // } catch (\Throwable $th) {
                //    echo json_encode($th);
                // }
            }
        }
    }
    
    elseif($action=="Usuario"  && $rutas[1]=="POSTCON")
    {
        if(isset($_POST['action']))
        {
            if($_POST['action']=="POSTCON")
            {
                // try {
                    $id=$_POST['id'];
                    $respuesta="Aceptar";
                    $actions="POSTCON";
                    
                    require_once("Usuario/index.php");
                // } catch (\Throwable $th) {
                //    echo json_encode($th);
                // }
            }
        }
    }
}
else
{
    
}

?>
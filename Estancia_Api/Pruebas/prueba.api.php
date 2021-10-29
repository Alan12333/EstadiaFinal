<?php
if(isset($_GET['action']))
{
    $rutas=explode("/",$_GET['action']);
    $action=$rutas[0];

   try 
   {
        if($action=="Prueba" && $rutas[1]=="POSTINT")
        {
            if(isset($_POST['action']))
            {
                if($_POST['action']=="POSTINT")
                {
                    try 
                    {
                        $id_U=$_POST['id_usuario'];
                        $cal=$_POST['calificacion'];
                        $fechas=$_POST['fecha'];
                        $actions=$rutas[1];
                        require_once("Pruebas/index.php");
                    }
                    catch (\Throwable $th)
                    {
                        echo json_encode("error");
                    }
                }
            }
        }
         else if($action=="Prueba" && $rutas[1]=="FILTERINT")
        {
           if(isset($_POST['action']))
           {
                if($_POST['action']=="FILTERINT")
            {
                try 
                {
                    $fechas=$_POST['fecha'];
                    $actions=$rutas[1];
                    require_once("Pruebas/index.php");
                }
                catch (\Throwable $th)
                {
                    echo json_encode("error");
                }
            }
           }
        }
         else if($action=="Prueba" && $rutas[1]=="FILTEREST")
        {
           if(isset($_POST['action']))
           {
                if($_POST['action']=="FILTEREST")
            {
                try 
                {
                    $fechas=$_POST['fecha'];
                    $actions=$rutas[1];
                    require_once("Pruebas/index.php");
                }
                catch (\Throwable $th)
                {
                    echo json_encode("error");
                }
            }
           }
        }
        else if($action=="Prueba" && $rutas[1]=="FILTERPREF")
        {
           if(isset($_POST['action']))
           {
                if($_POST['action']=="FILTERPREF")
            {
                try 
                {
                    $fechas=$_POST['fecha'];
                    $actions=$rutas[1];
                    require_once("Pruebas/index.php");
                }
                catch (\Throwable $th)
                {
                    echo json_encode("error");
                }
            }
           }
        }
        elseif($action=="Prueba" && $rutas[1]=="GETINT" && $rutas[2])
        {
            try
            {
                $id_U=$rutas[2];
                $actions=$rutas[1];
                require_once("Pruebas/index.php");
            }
            catch (\Throwable $th)
            {
                echo json_encode("error");
            }
        }
        elseif($action=="Prueba" && $rutas[1]=="UPDATELIST")
        {
            try
            {
                $actions=$rutas[1];
                require_once("Pruebas/index.php");
            }
            catch (\Throwable $th)
            {
                echo json_encode("error");
            }
        }
        elseif($action=="Prueba" && $rutas[1]=="GETUMBRALGRASO")
        {
            try
            {
                $actions=$rutas[1];
                require_once("Pruebas/index.php");
            }
            catch (\Throwable $th)
            {
                echo json_encode("error");
            }
        }
        elseif($action=="Prueba" && $rutas[1]=="GETUMBRALAMARGO")
        {
            try
            {
                $actions=$rutas[1];
                require_once("Pruebas/index.php");
            }
            catch (\Throwable $th)
            {
                echo json_encode("error");
            }
        }
        elseif($action=="Prueba" && $rutas[1]=="GETPREF")
        {
            try
            {
                $actions=$rutas[1];
                require_once("Pruebas/index.php");
            }
            catch (\Throwable $th)
            {
                echo json_encode("error");
            }
        }
        elseif($action=="Prueba" && $rutas[1]=="GETPREFCOUNT" && $rutas[2])
        {
            try
            {
                $id_U=$rutas[2];
                $actions=$rutas[1];
                require_once("Pruebas/index.php");
            }
            catch (\Throwable $th)
            {
                echo json_encode("error");
            }
        }
        elseif($action=="Prueba" && $rutas[1]=="POSTEST")
        {
            if(isset($_POST['action']))
            {
                if($_POST['action']=="POSTEST")
                {
                    try 
                    {
                        $id_U=$_POST['id_usuario'];
                        $cal=$_POST['calificacion'];
                        $fechas=$_POST['fecha'];
                        $actions=$rutas[1];
                        require_once("Pruebas/index.php");
                    }
                    catch (\Throwable $th)
                    {
                        echo json_encode("error");
                    }
                }
            }
        }
        elseif($action=="Prueba" && $rutas[1]=="POSTPREF")
        {
            if(isset($_POST['action']))
            {
                if($_POST['action']=="POSTPREF")
                {
                    try 
                    {
                        $id_U=$_POST['id_usuario'];
                        $gusto=$_POST['gusto'];
                        $nogusto=$_POST['nogusto'];
                        $lista=$_POST['lista'];
                        $sesion = $_POST['sesion'];
                        $fecha = $_POST['fecha'];
                        $posicion = $_POST['posicion'];
                        $actions=$rutas[1];
                        require_once("Pruebas/index.php");
                    }
                    catch (\Throwable $th)
                    {
                        echo json_encode("error");
                    }
                }
            }
        }
        elseif($action=="Prueba" && $rutas[1]=="GETTEST" && $rutas[2])
        {
            try
            {
                $id_U=$rutas[2];
                $actions=$rutas[1];
                require_once("Pruebas/index.php");
            }
            catch (\Throwable $th)
            {
                echo json_encode("error");
            }
        }
        elseif ($action=="Prueba" && $rutas[1]=="GETINTRES") 
        {
            try
            {
                $actions=$rutas[1];
                require_once("Pruebas/index.php");
            }
            catch (\Throwable $th)
            {
                echo json_encode("error");
            }
        }
        elseif ($action=="Prueba" && $rutas[1]=="GETAGRRES") 
        {
            try
            {
                $actions=$rutas[1];
                require_once("Pruebas/index.php");
            }
            catch (\Throwable $th)
            {
                echo json_encode("error");
            }
        }
        elseif ($action=="Prueba" && $rutas[1]=="GETPREFRES") 
        {
            try
            {
                $actions=$rutas[1];
                require_once("Pruebas/index.php");
            }
            catch (\Throwable $th)
            {
                echo json_encode("error");
            }
        }
        else
        {
            echo json_encode("No API load here");
        }
   }
    catch (\Throwable $th)
    {
       echo json_encode("No API load here");
   }
}

?>
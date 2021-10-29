<?php

    if(isset($_GET['action']))
    {
        $rutas=explode("/",$_GET['action']);
        $action=$rutas[0];

        if($action=="Umbral" && $rutas[1]=="GET" && $rutas[2])
        {
            
            $actions=$rutas[1];
            $id=$rutas[2];
            require_once("Umbral/index.php");
            
        }
         else if($action=="Umbral" && $rutas[1]=="GETCANTA" && $rutas[2])
        {
            $actions=$rutas[1];
            $id=$rutas[2];
            require_once("Umbral/index.php");
        }
         else if($action=="Umbral" && $rutas[1]=="GETCANTARES")
        {
            $actions=$rutas[1];
            require_once("Umbral/index.php");
        }
        else if($action=="Umbral" && $rutas[1]=="GETCANTGRES")
        {
            $actions=$rutas[1];
            require_once("Umbral/index.php");
        }
        if($action=="Umbral" && $rutas[1]=="GETG" && $rutas[2])
        {
            
            $actions=$rutas[1];
            $id=$rutas[2];
            require_once("Umbral/index.php");
            
        }
        else if($action=="Umbral" && $rutas[1]=="GETCANTG" && $rutas[2])
        {
            $actions=$rutas[1];
            $id=$rutas[2];
            require_once("Umbral/index.php");
        }
         else if($action=="Umbral" && $rutas[1]=="SPECIALCASE" && $rutas[2])
        {
            $actions=$rutas[1];
            $id=$rutas[2];
            require_once("Umbral/index.php");
        }
        
        if(isset($_POST['action']))
        {
            if($_POST['action']=="POSTA")
            {
                $id=$_POST['id_usuario'];
                $response=$_POST['respuesta'];
                $idnumero=$_POST['id_numero'];
                $tipo="Amargo";
                $actions="POST";
                require_once("Umbral/index.php");
            }
             if($_POST['action']=="POSTG")
            {
                $id=$_POST['id_usuario'];
                $response=$_POST['respuesta'];
                $idnumero=$_POST['id_numero'];
                $tipo="Graso";
                $actions="POST";
                require_once("Umbral/index.php");
            }
        }
    }
?>
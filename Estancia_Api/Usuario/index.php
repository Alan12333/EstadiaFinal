<?php
//Llamamos los encabezados para transformar los datos a json
header("Content-Type:application/json");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
include('UserModel.php');
require_once('config/connection.php');
require_once('config/configurate.php');


    if($actions=="All")
    {
        $usuario = new UserModel;
        $resultado = $usuario->GET();
        $array=$resultado->fetchAll();
        echo json_encode($array);
    }
    else if($actions=="GETVIS")
    {
        $usuario = new UserModel;
        $resultado = $usuario->GETVISIT($id);
        $array=$resultado->fetch(PDO::FETCH_ASSOC);
        echo json_encode($array);
    }
    else if($actions=="GETCONCEN")
    {
        $usuario = new UserModel;
        $resultado = $usuario->GETCONCEN($id);
        $array=$resultado->fetch(PDO::FETCH_ASSOC);
        echo json_encode($array);
    }
    
    elseif($actions=="ALLVIS")
    {
        $usuario = new UserModel;
        $usuario->id=$id;
        $resultado = $usuario->GETALLVISIT();
        $array=$resultado->fetchAll();
        echo json_encode($array);
    }
    else if($actions=="POSTCON")
    {
        $usuario = new UserModel;
        $usuario->id=$id;
        $resultado = $usuario->POSTCON();
        echo json_encode($resultado);
    }
    else if($actions=="GETCONT")
    {
        $usuario = new UserModel;
        $id=$ids;
        echo $ids;
        $resultado = $usuario->GETCONT($id);
        $array=$resultado->fetchAll();
        echo json_encode($array);
    }
    if($actions=="GET" && $id)
    {

        $usuario = new UserModel;
        $usuario->id=$id;
        $resultado = $usuario->GETID();
        $array=$resultado->fetch(PDO::FETCH_ASSOC);
        echo json_encode($array);
    }


    if($actions=="POST")
    {
        $usuario = new UserModel;
        $usuario->Nombre=$name;
        $usuario->Genero=$gen;
        $usuario->Peso=$peso;
        $usuario->Cintura=$cintura;
        $usuario->Altura=$altura;
        $usuario->Imc=$imc;
        $usuario->Edad=$edad;
        $resultado = $usuario->POST();
        echo json_encode($resultado);
    }

    if($actions=="PUT")
    {
        $usuario = new UserModel;
        $usuario->id=$id;
        $usuario->Nombre=$name;
        $usuario->Genero=$gen;
        $usuario->Peso=$peso;
        $usuario->Cintura=$cintura;
        $usuario->Altura=$altura;
        $usuario->Imc=$imc;
        $usuario->Edad=$edad;
        $resultado = $usuario->PUT();
        echo json_encode($resultado);
    }

    if($actions=="POSTVIS")
    {
        $usuario = new UserModel;
        $usuario->id=$id;
        $usuario->Peso=$peso;
        $usuario->Cintura=$cintura;
        $usuario->Altura=$altura;
        $usuario->Imc=$imc;
        $usuario->Edad=$edad;
        $visita=GETVISITA($id);
        $visit=$visita+1;
        $resultado=$usuario->POSTVISITA($visit);
        echo json_encode($resultado);
    }


    function GETVISITA($id)
    {
        $usuario = new UserModel;
        $resultado=$usuario->GETVISIT($id);
        $contador="";
        while ($a = $resultado->fetch(PDO::FETCH_ASSOC)) {
           $contador= $a['contvi'];
        }
        return $contador;
    }

?>
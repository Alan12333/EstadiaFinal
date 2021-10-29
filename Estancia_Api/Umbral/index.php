<?php
//Llamamos los encabezados para transformar los datos a json
header("Content-Type:application/json");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
include('UmbralModel.php');
require_once('config/connection.php');
require_once('config/configurate.php');


if($actions=="GET")
{
    $umbral = new Umbral;
    $umbral->id_u = $id;
    $umbral->tipo="Amargo";
    $resultado = $umbral->GetCalificacion();
    echo json_encode($resultado);
}

if($actions=="SPECIALCASE")
{
    $umbral = new Umbral;
    $resultado = $umbral->SpecialCase($id);
    echo json_encode($resultado);
}

if($actions=="POST")
{
    $umbral = new Umbral;
    $umbral->id_u = $id;
    $umbral->tipo=$tipo;
    $umbral->id_numero=$idnumero;
    $umbral->respuesta=$response;
    $resultado=$umbral->Postumbral();
    echo json_encode($resultado);
}
if($actions=="GETCANTA")
{
    $umbral = new Umbral;
    $umbral->id_u = $id;
    $umbral->tipo="Amargo";
    $resultado = $umbral-> CountNumber();
    $array=$resultado->fetch(PDO::FETCH_ASSOC);
    echo json_encode($array);
}

if($actions=="GETG")
{
    $umbral = new Umbral;
    $umbral->id_u = $id;
    $umbral->tipo="Graso";
    $resultado = $umbral->GetCalificacion();
    echo json_encode($resultado);
}

if($actions=="GETCANTG")
{
    $umbral = new Umbral;
    $umbral->id_u = $id;
    $umbral->tipo="Graso";
    $resultado = $umbral-> CountNumber();
    $array=$resultado->fetch(PDO::FETCH_ASSOC);
    echo json_encode($array);
}

if($actions=="GETCANTARES")
{
    $umbral = new Umbral;
    $resultado = $umbral->GETresultamargo();
    $array=$resultado->fetchAll();
    echo json_encode($array);
}

if($actions=="GETCANTGRES")
{
    $umbral = new Umbral;
    $resultado = $umbral->GETresultgraso();
    $array=$resultado->fetchAll();
    echo json_encode($array);
}

?>
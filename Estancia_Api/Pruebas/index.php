<?php
//Llamamos los encabezados para transformar los datos a json
header("Content-Type:application/json");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
include('PruebaModel.php');
require_once('config/connection.php');
require_once('config/configurate.php');

if($actions=="POSTINT")
{
    $pruebas = new PruebasModel;
    $pruebas->id_user=$id_U;
    $pruebas->fecha=$fechas;
    $pruebas->calificacion=$cal;
    $resultado=$pruebas->POSTIntensidad();
    echo json_encode($resultado);
}

if($actions=="FILTERINT")
{
    $pruebas = new PruebasModel;
    $pruebas->fecha=$fechas;
    $resultado=$pruebas->FilterIntensidad();
    $arreglo = $resultado->fetchAll();
    echo json_encode($arreglo);
}

if($actions=="FILTEREST")
{
    $pruebas = new PruebasModel;
    $pruebas->fecha=$fechas;
    $resultado=$pruebas->FilterEstimulaciones();
    $arreglo = $resultado->fetchAll();
    echo json_encode($arreglo);
}

if($actions=="FILTERPREF")
{
    $pruebas = new PruebasModel;
    $pruebas->fecha=$fechas;
    $resultado=$pruebas->FilterPref();
    $arreglo = $resultado->fetchAll();
    echo json_encode($arreglo);
}

if($actions=="GETINT")
{
    $pruebas = new PruebasModel;
    $pruebas->id_user=$id_U;
    $resultado=$pruebas->GETInt2();
    $arreglo = $resultado->fetch(PDO::FETCH_ASSOC);
    echo json_encode($arreglo);
}

if($actions=="POSTEST")
{
    $pruebas = new PruebasModel;
    $pruebas->id_user=$id_U;
    $pruebas->calificacion=$cal;
    $pruebas->fecha=$fechas;
    $resultado=$pruebas->POSTEstimulacion();
    echo json_encode($resultado);
}

if($actions=="GETTEST")
{
    $pruebas = new PruebasModel;
    $pruebas->id_user=$id_U;
    $resultado=$pruebas->GETEst2();
    $arreglo = $resultado->fetch(PDO::FETCH_ASSOC);
    echo json_encode($arreglo);
}

if($actions=="UPDATELIST")
{
    $pruebas = new PruebasModel;
    $result="";
    for($i=0; $i<10; $i++)
    {
        $result=$pruebas->UpdateListaUmbral($i,"Amargo");
    }
    for($i=0; $i<10; $i++)
    {
        $result=$pruebas->UpdateListaUmbral($i,"Graso");
    }
    echo json_encode($result);
}

if($actions=="GETUMBRALGRASO")
{
    $pruebas = new PruebasModel;
    $resultado=$pruebas->GETUMBRALG();
    $result=$resultado->fetchAll();
    echo json_encode($result);
}


if($actions=="GETUMBRALAMARGO")
{
    $pruebas = new PruebasModel;
    $resultado=$pruebas->GETUMBRALA();
    $result=$resultado->fetchAll();
    echo json_encode($result);
}

if($actions=="GETPREF")
{
    $pruebas = new PruebasModel;
    $resultado=$pruebas->GETPREFERENCIA();
    $result=$resultado->fetchAll();
    echo json_encode($result);
}

if($actions=="POSTPREF")
{
    $pruebas = new PruebasModel;
    $pruebas->id_user=$id_U;
    $resultado=$pruebas->InsertarPreferencia($gusto, $nogusto, $lista, $fecha, $sesion, $posicion);
    echo json_encode($resultado);
}

if($actions=="GETPREFCOUNT")
{
    $pruebas = new PruebasModel;
    $pruebas->id_user=$id_U;
    $resultado=$pruebas->ObtenerPreferencias();
    $arreglo = $resultado->fetch(PDO::FETCH_ASSOC);
    echo json_encode($arreglo);
}
if($actions=="GETINTRES")
{
    $pruebas = new PruebasModel;
    $resultado=$pruebas->GetCaliInt();
    $arreglo = $resultado->fetchAll();
    echo json_encode($arreglo);
}

if($actions=="GETAGRRES")
{
    $pruebas = new PruebasModel;
    $resultado=$pruebas->GetCaliAgr();
    $arreglo = $resultado->fetchAll();
    echo json_encode($arreglo);
}

if($actions=="GETPREFRES")
{
    $pruebas = new PruebasModel;
    $resultado=$pruebas->GetCaliPref();
    $arreglo = $resultado->fetchAll();
    echo json_encode($arreglo);
    exit();
}

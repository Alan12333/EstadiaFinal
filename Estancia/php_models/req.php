<?php

function HeadTitle($Nombre)
{
    return $Nombre;
}


function ScriptPage($script)
{
    $data = file_get_contents("config.json");
    $products = json_decode($data, true);
    
    $newscript="<script src='".$products['route']."/".$products['ProyectName']."/Views/app/".$script.".js'></script>";
    return $newscript;
}
function StylePage($style)
{
    $data = file_get_contents("config.json");
    $products = json_decode($data, true);
    $newstyle="<link rel='stylesheet' href='".$products['route']."/".$products['ProyectName']."/Views/app/".$style.".css'>";
    return $newstyle;
}


function Script($script)
{
    $data = file_get_contents("config.json");
    $products = json_decode($data, true);
    $newscript="<script src='".$products['route']."/".$products['ProyectName']."/Views/".$script."/".$script.".script.js'></script>";
    return $newscript;
}
function Style($style)
{
    $data = file_get_contents("config.json");
    $products = json_decode($data, true);
    $newstyle="<link rel='stylesheet' href='".$products['route']."/".$products['ProyectName']."/Views/".$style."/".$style.".style.css'>";
    return $newstyle;
}

function GlobalStyle()
{
    $data = file_get_contents("config.json");
    $products = json_decode($data, true);
    $directorio = 'public/css';
    $ficheros1  = scandir($directorio);

    for($i=2; $i<count($ficheros1); $i++)
    {
        echo "<link rel='stylesheet' href='".$products['route']."/".$products['ProyectName']."/public/css/".$ficheros1[$i]."'>";
    }
    
   
}

function GlobalScript()
{
    $data = file_get_contents("config.json");
    $products = json_decode($data, true);
    $directorio = 'public/js';
    $ficheros1  = scandir($directorio);

    for($i=2; $i<count($ficheros1); $i++)
    {
        echo "<script src='".$products['route']."/".$products['ProyectName']."/public/js/script.js'></script>";
    }
    
}

function Vuex()
{
    $newscript='<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.js"></script>';
    return $newscript;
}

function Vue()
{
    $newscript='<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>';
    return $newscript;
}
?>
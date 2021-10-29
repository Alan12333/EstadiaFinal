<?php
 function init(){
     
}

    function nombres(){
        $array = [ " Alan", "Yanai", "Fernando", "Luis"];
        for ($i = 0; $i<count($array); $i++)
        {
            echo "<h1 class='pad8'>".$array [$i]."</h1> ";
        }
    }

    function Muestra1(){
        $array = [ " salado", "salado", "Amargo", "salado"];
        for ($i = 0; $i<count($array); $i++)
        {
            echo "<h1 class='pad8'>".$array [$i]."</h1> ";
        }
    }

    function Muestra2(){
        
        $array = [ " amargo", "amargo", "salado", "salado"];
        for ($i = 0; $i<count($array); $i++)
        {
            echo "<h1 class='pad8'>".$array [$i]."</h1> ";
        }
    }
    

    function Muestra3(){
        $array = [ " salado", "amargo", "salado", "amargo"];
        for ($i = 0; $i<count($array); $i++)
        {
            echo "<h1 class='pad8'>".$array [$i]."</h1> ";
        }
    }

    if (isset($_GET["id"]))
    {
        echo json_encode("45");
    }

    else{
        ?>
        <link rel="stylesheet" href="public/css/style.css">
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>vista intencidad</title>
        <?php

    }
?>






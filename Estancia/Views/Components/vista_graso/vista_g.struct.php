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

    function edad(){
        $array = [ " 20", "30", "15", "42"];
        for ($i = 0; $i<count($array); $i++)
        {
            echo "<h1 class='pad8'>".$array [$i]."</h1> ";
        }
    }

    function calificacion(){
        $array = [ " 100", "7", "6", "2"];
        for ($i = 0; $i<count($array); $i++)
        {
            if ($array [$i]<"50") {
                echo "<h1 class='pad8 r'>".$array [$i]."</h1> ";

            }
            else{
                echo "<h1 class='pad8 gr'>".$array [$i]."</h1> ";
            }
        }
    }

    function Numero(){
        $array = [ " 32", "30", "100", "25"];
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
                <title>Vista Graso</title>
        <?php

    }
?>






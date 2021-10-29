<?php

function LoadFile()
    {
        $fp = fopen("php_models/file.spl", "r");
        while (!feof($fp)){
            $linea = fgets($fp);
            echo $linea;
        }
    fclose($fp);
}


?>

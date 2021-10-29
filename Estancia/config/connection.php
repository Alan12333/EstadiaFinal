<?php

class DB
{
    function __construct()
    {
        
    }
    
    function Con()
    {
        $conection= new mysqli("localhost","fronter6_216030256","alan1346790","fronter6_estancia");
        mysqli_set_charset($conection, "utf8");
        return $conection;
    }

    function Close()
    {
        return mysqli_close($this->Con());
    }
    function __destruct()
    {
        
    }
}
?>
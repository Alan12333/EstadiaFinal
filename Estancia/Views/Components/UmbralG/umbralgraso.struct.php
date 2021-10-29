<?php


if(isset($_SESSION['log'])==true)
{
    
    function Init()// Se cargan los funciones o metodos inicialmente
    {
        return $_SESSION['id'];
    }
}
else {
    function Init()
    {
        
    }
}
?>

<link rel="stylesheet" href="../public/css/style.css"> 
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Prueba UmbralAmargo</title>
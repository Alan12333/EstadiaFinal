<?php

function Init()// Se cargan los funciones o metodos inicialmente
{
    
}

if(isset($_POST['action']))
{
    session_start();
    $user=$_POST['numero'];
    $_SESSION['log']=true;
    $_SESSION['id']=$user;
    $_SESSION['Start']=time();
    $_SESSION['expire'] = $_SESSION['Start'] + (1000 * 6000);
    if(isset($_SESSION['id'])==true)
    {
        echo json_encode("Si");
    }
    else{
        echo json_encode("Error");
    }
}

else
{
    ?>
    <!--Se realiza la carga de componentes-->
<link rel="stylesheet" href="public/css/style.css">
<!-- <script src="public/js/fucntion.js"></script> Toma el script global-->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Iniciar Sesion</title>
    <?php
}

?>
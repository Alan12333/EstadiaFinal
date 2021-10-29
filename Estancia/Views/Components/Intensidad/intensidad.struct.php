<?php



if(isset($_SESSION['log'])==true)
{
    
    function Init()// Se cargan los funciones o metodos inicialmente
    {
        return $_SESSION['id'];
    }

    if(isset($_POST['action']))
    {
        if (count($_FILES) <= 0 || empty($_FILES["video"])) {
            exit("No hay archivos");
        }
        
        # De dónde viene el vídeo y en dónde lo ponemos
        $rutaVideoSubido = $_FILES["video"]["tmp_name"];
        $nuevoNombre = "Intensidad-Sustancia3-76".$_SESSION['id']."mp4";
        $rutaDeGuardado = "../Videos" . "/" . $nuevoNombre;
        echo $rutaDeGuardado;
        // Mover el archivo subido a la ruta de guardado
        move_uploaded_file($_FILES["video"]["tmp_name"], $rutaDeGuardado);
    }
    else {
        
       ?>
                <link rel="stylesheet" href="../public/css/style.css"> 
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Prueba Intensidad</title>
       <?php
    }
    
}
else {
    function Init()
    {
        
    }
}



?>
<?php
if(isset($_POST['post']))
{
    $numero = $_POST['numero'];
    if($numero=="3323" || $numero == "5896")
    {
       echo json_encode("True");
    }
    else
    {
        echo json_encode("False");
    }
}
else if(isset($_POST['usuario']))
{
    require_once("../../../config/connection.php");
    require_once("../../../php_models/modules.php");
    $con = new DB();
    $obj = new Modules();
    $result="";
    $cmd = "SELECT * FROM pru_in WHERE state='activa'";
    $result = $obj->ExecuteQueryJSON($cmd, $con->Con());
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
else if(isset($_POST['real']))
{
    $id =$_POST['id'];
    require_once("../../../config/connection.php");
    require_once("../../../php_models/modules.php");
    $con = new DB();
    $obj = new Modules();
    $result="";
     $cmd = "SELECT * FROM calificacion_umbrales c JOIN resultados r WHERE c.id_usuario = r.id_usuario AND c.id_usuario='$id' AND c.tipo='Amargo'";
    $result = $obj->ExecuteQueryJSON($cmd, $con->Con());
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
else
{
    ?>
    <link rel="stylesheet" href="public/css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medida en tiempo real</title>
    <?php
}
?>

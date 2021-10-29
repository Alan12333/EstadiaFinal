<?php
if(isset($_POST['intensidad']))
{
    $inicio = $_POST['inicio'];
    $final =$_POST['final'];
    require_once("../../../config/connection.php");
    require_once("../../../php_models/modules.php");
    $con = new DB();
    $obj = new Modules();
    $cmd = "SELECT id_usuario, tipo, calificacion, sesion, fecha, visita FROM calificacion_estimulaciones WHERE id_usuario BETWEEN '$inicio' AND '$final'  ORDER BY id_usuario ASC";
    $result = $obj->ExecuteQueryJSON($cmd, $con->Con());
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
}
else if(isset($_POST['Agrado']))
{
    require_once("../../../config/connection.php");
    require_once("../../../php_models/modules.php");
    $con = new DB();
    $obj = new Modules();
    $cmd = "SELECT * FROM calificacion_intensidad";
    $result = $obj->ExecuteQueryJSON($cmd, $con->Con());
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
}
else if(isset($_POST['Preferencias']))
{
    require_once("../../../config/connection.php");
    require_once("../../../php_models/modules.php");
    $con = new DB();
    $obj = new Modules();
    $cmd = "SELECT * FROM calificacion_preferencias";
    $result = $obj->ExecuteQueryJSON($cmd, $con->Con());
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
}
else if(isset($_POST['Amargo']))
{
    require_once("../../../config/connection.php");
    require_once("../../../php_models/modules.php");
    $con = new DB();
    $obj = new Modules();
    $cmd = "SELECT id_usuario, tipo, prueba, visita, respuesta FROM calificacion_umbrales c WHERE c.tipo='Amargo';";
    $result = $obj->ExecuteQueryJSON($cmd, $con->Con());
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
}
else if(isset($_POST['Graso']))
{
    require_once("../../../config/connection.php");
    require_once("../../../php_models/modules.php");
    $con = new DB();
    $obj = new Modules();
    $result="";
    // for($i=29; $i<386; $i++)
    // {
    //     $cmd = "INSERT INTO concentimiento(Id_U, Respuesta)VALUES('$i', 'No')";
    //     $result = $obj->ExecuteQuery($cmd, $con->Con());
    // }

    $cmd = "SELECT id_usuario, tipo, prueba, visita, respuesta FROM calificacion_umbrales c WHERE c.tipo='Graso'";
    $result = $obj->ExecuteQueryJSON($cmd, $con->Con());
     echo json_encode($result,JSON_UNESCAPED_UNICODE);
}
else if(isset($_POST['Concen']))
{
    $respuesta=$_POST['respuesta'];
    require_once("../../../config/connection.php");
    require_once("../../../php_models/modules.php");
    $con = new DB();
    $obj = new Modules();
    $result="";
    $cmd = "SELECT * FROM concentimiento WHERE Respuesta='$respuesta'";
    $result = $obj->ExecuteQueryJSON($cmd, $con->Con());
     echo json_encode($result,JSON_UNESCAPED_UNICODE);
}


else if(isset($_POST['intensidadf']))
{
    $filtro = $_POST['filtro'];
    require_once("../../../config/connection.php");
    require_once("../../../php_models/modules.php");
    $con = new DB();
    $obj = new Modules();
    $cmd = "SELECT id_usuario, tipo, calificacion, sesion, fecha, visita FROM calificacion_estimulaciones WHERE id_usuario = '$filtro'";
    $result = $obj->ExecuteQueryJSON($cmd, $con->Con());
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
}
else if(isset($_POST['AgradoF']))
{
    $filtro = $_POST['filtro'];
    require_once("../../../config/connection.php");
    require_once("../../../php_models/modules.php");
    $con = new DB();
    $obj = new Modules();
    $cmd = "SELECT * FROM calificacion_intensidad WHERE id_usuario = '$filtro'";
    $result = $obj->ExecuteQueryJSON($cmd, $con->Con());
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
}
else if(isset($_POST['PreferenciasF']))
{
    $filtro = $_POST['filtro'];
    require_once("../../../config/connection.php");
    require_once("../../../php_models/modules.php");
    $con = new DB();
    $obj = new Modules();
    $cmd = "SELECT * FROM calificacion_preferencias WHERE id_usuario = '$filtro'";
    $result = $obj->ExecuteQueryJSON($cmd, $con->Con());
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
}
else if(isset($_POST['AmargoF']))
{
    $filtro = $_POST['filtro'];
    require_once("../../../config/connection.php");
    require_once("../../../php_models/modules.php");
    $con = new DB();
    $obj = new Modules();
    $cmd = "SELECT id_usuario, tipo, prueba, visita, respuesta FROM calificacion_umbrales c WHERE c.tipo='Amargo' AND  id_usuario = '$filtro'";
    $result = $obj->ExecuteQueryJSON($cmd, $con->Con());
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
}
else if(isset($_POST['GrasoF']))
{
    $filtro = $_POST['filtro'];
    require_once("../../../config/connection.php");
    require_once("../../../php_models/modules.php");
    $con = new DB();
    $obj = new Modules();
    $result="";
    $cmd = "SELECT id_usuario, tipo, prueba, visita, respuesta FROM calificacion_umbrales c WHERE c.tipo='Graso' AND  id_usuario = '$filtro'";
    $result = $obj->ExecuteQueryJSON($cmd, $con->Con());
     echo json_encode($result,JSON_UNESCAPED_UNICODE);
}
else if(isset($_POST['ConcenF']))
{
    $filtro = $_POST['filtro'];
    $respuesta=$_POST['respuesta'];
    require_once("../../../config/connection.php");
    require_once("../../../php_models/modules.php");
    $con = new DB();
    $obj = new Modules();
    $result="";
    $cmd = "SELECT * FROM concentimiento WHERE Respuesta='$respuesta' AND  Id_U = '$filtro'";
    $result = $obj->ExecuteQueryJSON($cmd, $con->Con());
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
}
else if(isset($_POST['load']))
{
    require_once("../../../config/connection.php");
    require_once("../../../php_models/modules.php");
    $con = new DB();
    $obj = new Modules();
    $maximo = ObtenerCantidad(ObtenerMaximo($obj, $con));
    echo json_encode($maximo, JSON_UNESCAPED_UNICODE);
}
else
{
    ?>
        <link rel="stylesheet" href="public/css/style.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultados</title>
    <?php
}
        

function ObtenerMaximo($obj, $con)
{
    $cmd = "SELECT MAX(id_usuario) AS id FROM calificacion_estimulaciones";
    $row = $obj->Asociate($cmd, $con->Con());
    return $row['id'];
}

function ObtenerCantidad($maximo)
{
    $resultado = ($maximo-35)/10;
    return round($resultado);
}

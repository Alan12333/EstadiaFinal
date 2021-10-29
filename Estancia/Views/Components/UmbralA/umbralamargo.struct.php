<?php
if(isset($_POST['insertar']))
{
    $id = $_POST['id'];
    require_once("../../../config/connection.php");
    require_once("../../../php_models/modules.php");
    $con = new DB();
    $obj = new Modules();
    $result="";
    $results="";
    $query = "SELECT COUNT(idpru_in) as numero, state FROM pru_in p WHERE id_u='$id'";
    $results=$obj->Asociate($query, $con->Con());
    if($results['numero']=='0')
    {
        $cmd = "INSERT INTO pru_in(id_u, name, state)VALUES('$id','umbral amargo','activa')";
        $result = $obj->ExecuteQuery($cmd, $con->Con());
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    else
    {
        if($results['state']=="desactiva")
        {
            $cmd = "UPDATE pru_in SET state='activa' WHERE id_u ='$id'";
            $result = $obj->ExecuteQuery($cmd, $con->Con());
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
        }
        else{
            echo json_encode("true");
        }
    }
}
else if(isset($_POST['desactivar']))
{
    $id = $_POST['id'];
    require_once("../../../config/connection.php");
    require_once("../../../php_models/modules.php");
    $con = new DB();
    $obj = new Modules();
    $result="";
    $cmd = "UPDATE pru_in SET state='desactiva' WHERE id_u ='$id'";
    $result = $obj->ExecuteQuery($cmd, $con->Con());
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
else if(isset($_POST['postactiva']))
{
    $id = $_POST['id'];
    $resultado = $_POST['resultado'];
    require_once("../../../config/connection.php");
    require_once("../../../php_models/modules.php");
    $con = new DB();
    $obj = new Modules();
    $result="";
    $cmd = "INSERT INTO resultados(id_usuario, Tipo, Resultado) VALUES ('$id','Amarga','$resultado')";
    $result = $obj->ExecuteQuery($cmd, $con->Con());
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
else
{
    echo "error";
}
if(isset($_SESSION['log'])==true)
{
    
    function Init()
    {
        return $_SESSION['id'];
    }
}
else 
{
    function Init()
    {
        
    }
}
?>
